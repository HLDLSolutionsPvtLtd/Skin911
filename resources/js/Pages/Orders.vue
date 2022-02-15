<template>
    <app-layout>
        <div class="sm:flex justify-center">
            <div class="sm:w-7/12 m-2">
                <div class="w-full border">
                    <div class="flex w-full bg-white shadow-md justify-center">
                        <span class="text-md text-pink-dark p-2">ORDERS</span>
                    </div>
                </div>
                <div class="border w-full">
                    <div class="w-full ">
                        <div v-for="order in orders.slice().reverse()" :key="order.id" class="bg-white shadow-lg mt-2 rounded-sm">
                            <div class="p-2 bg-pink-300 flex justify-between rounded-t-sm text-white">
                                <div class="">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white h-5 w-5" viewBox="0 0 24 24">
                                            <path d="M21.698 10.658l2.302 1.342-12.002 7-11.998-7 2.301-1.342 9.697 5.658 9.7-5.658zm-9.7 10.657l-9.697-5.658-2.301 1.343 11.998 7 12.002-7-2.302-1.342-9.7 5.657zm12.002-14.315l-12.002-7-11.998 7 11.998 7 12.002-7z"/>
                                        </svg>
                                        <div class="">
                                            <span class="pl-2 uppercase text-xs sm:text-sm font-bold tracking-wider">{{order.status}}</span>
                                        </div>
                                    </div>
                                    <div class="pl-8">
                                        <span class="text-xs sm:tracking-widest font-bold">On {{formatDate(order.updated_at)}}</span>
                                    </div>
                                </div>
                                <div v-if="order.status == 'placed' || order.status == 'accepted'" class="flex border-l-2 pl-2 items-center">
                                    <button @click="cancel(order.id)" class="text-xs sm:text-md font-bold tracking-wider p-2">CANCEL</button>
                                </div>
                               
                            </div>
                            <div class="m-2 p-2" v-for="product in order.products" :key="product.id">
                                <div class="flex sm:justify-between bg-white border mb-2">
                                    <div class="flex flex-col sm:flex-row p-1">
                                        <img :src="'/storage/'+product.image[0].link" alt="" class="w-24 h-24 self-center ">
                                    </div>
                                    <div class="flex flex-col sm:w-full sm:flex-row justify-start sm:justify-between items-start sm:items-center">
                                        <div class="flex text-gray-700 text-sm font-sans text-thin items-center">
                                                <span class="font-semibold p-2 text-gray-600 smtracking-wider">{{product.name}}</span>
                                        </div>
                                        <div class="p-1 text-xs">
                                            <div class="flex items-center">
                                                <span class="flex tems-center font-semibold text-gray-600 p-1">QTY : {{product.pivot.quantity}}</span>
                                            </div>
                                        </div>
                                        <div class="flex items-center p-1">
                                            <div class="flex">
                                                <span class="p-1 text-sm sm:text-md font-semibold text-gray-600">&#8377; {{product.price}}</span>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="ml-2 p-2 pb-4 flex justify-between">
                                <div class="" v-if="order.payment_type == 'rzp'">
                                    <span class="text-xs bg-pink-400 text-white p-2 rounded-sm font-semibold tracking-wider">Payment status : {{order.transaction.status}}</span>
                                    <div v-if="order.transaction.status === 'pending'" class="pt-2">
                                        <button @click="selectedOrder = order.transaction" class="p-2 bg-green-400 rounded-sm font-bold text-xs tracking-wider">Pay Now</button>
                                    </div>
                                </div>
                                <div v-else>
                                    <span class="uppercase text-xs bg-pink-400 text-white p-2 rounded-md font-bold tracking-wider">Cash On Delivery</span>
                                </div>
                                <div>
                                    <span class="text-xs sm:text-sm tracking-widest text-gray-600 uppercase font-bold mr-8">Total : &#8377;{{order.total}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue'
export default {
    components:
    {
        AppLayout,
    },
    props: ['orders'],
    data(){
        return{
            selectedOrder: '',
            RZPScript: '',
            options: ''
        }
    },
    methods:{
        formatDate(val)
        {
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            var d = new Date(val)
            return d.toLocaleDateString("en-US", options); 
        },
        pay()
        {
            this.RZPScript = new Razorpay(this.options);
            this.RZPScript.on('payment.failed', function (response){
                    window.location.replace("/myorder");
            });
            this.RZPScript.open();
        },
        cancel(id){
            this.$inertia.post("/order/"+id+"/cancel", {
                onSuccess: () =>{
                    alert("success!");
                }
            })
        }
    },
    mounted(){
        this.RZPScript = document.createElement('script');
        this.RZPScript.setAttribute('src', 'https://checkout.razorpay.com/v1/checkout.js');
        document.head.appendChild(this.RZPScript);
    },
    watch: {
        selectedOrder()
        {
                this.options = {
                    "key": 'rzp_test_znof4x4ZLxITZX', // Enter the Key ID generated from the Dashboard
                    "amount": this.selectedOrder['amount']*100, // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
                    "currency": this.selectedOrder['currency'],
                    "name": "Modern Shoe Store",
                    "description": "Test Transaction",
                    "image": "https://www.nicesnippets.com/image/imgpsh_fullsize.png",
                    "order_id": this.selectedOrder['razorpay_order_id'], 
                    "handler": function (response){
                        axios.post('/order/transaction',response)
                        .then(res => console.log(res.data))
                        .then( alert("success!"))
                        .then(window.location.replace(`/myorder`));
                    },
                    "prefill": {
                        "name": "Terinao",
                        "email": "terinao86@gmail.com",
                        "contact": "8974393643"
                    },
                    "notes": {
                        "address": "test test"
                    },
                    "theme": {
                        "color": "#F37254"
                    },
                    // "modal": {
                    //     // "ondismiss": function(){
                    //     //     window.location.replace(`/alert/payment/aborted`);
                    //     }
                    // }
        
                }
                this.pay();
        }
   },

}
</script>