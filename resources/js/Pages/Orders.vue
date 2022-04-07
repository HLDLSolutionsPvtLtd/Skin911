<template>
    <app-layout>
        <div class="sm:flex justify-center">
            <div class="sm:w-7/12 m-2">
                <div class="w-full border">
                    <div class="flex w-full bg-white shadow-sm justify-center">
                        <span class="text-md text-pink-dark p-2">ORDERS</span>
                    </div>
                </div>
                <div class="w-full">
                    <div v-if="orders.length" class="w-full flex flex-col gap-4 mt-4">
                        <div v-for="order in orders.slice().reverse()" :key="order.id" class="bg-white shadow-lg rounded-sm">
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
                                    <div class="pl-7">
                                        <span class="text-xs sm:tracking-widest font-bold italic">On {{formatDate(order.updated_at)}}</span>
                                    </div>
                                </div>
                                <div v-if="order.status == 'placed'" class="flex border-l-2 pl-2 items-center">
                                    <button @click="cancel(order.id)" class="text-xs sm:text-md font-bold tracking-wider p-2">CANCEL</button>
                                </div>
                               
                            </div>
                            <div class="m-2" v-for="product in order.products" :key="product.id">
                                <div class="flex sm:justify-between bg-white border">
                                    <div class="flex flex-col sm:flex-row p-1">
                                        <img :src="'/storage/'+product.image[0].link" alt="" class="w-24 h-24 self-center ">
                                    </div>
                                    <div class="flex flex-col sm:w-full sm:flex-row justify-start sm:justify-between items-start sm:items-center">
                                        <div class="flex text-gray-700 text-xs text-thin items-center">
                                            <span class="font-semibold p-2 tracking-wider text-gray-600 smtracking-wider">{{product.name}}</span>
                                        </div>
                                        <div class="p-1 flex justify-between">
                                            <div class="flex items-center">
                                                <span class="flex tems-center tracking-wider text-xs font-semibold text-gray-600 p-1">&#8377; {{product.pivot.subtotal}}  X  {{product.pivot.quantity}}  =</span>
                                            </div>
                                            <div class="flex">
                                                <span class="p-1 text-xs sm:text-md tracking-wider font-semibold text-gray-600">&#8377; {{product.pivot.subtotal * product.pivot.quantity}}</span>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                
                            </div>
                            <div class="ml-2 p-2 flex justify-between">
                                <div class="flex items-center gap-2" v-if="order.payment_type == 'rzp' && order.transaction">
                                    <span style="font-size: 10px;" class=" bg-pink-400 text-white p-2 rounded-sm font-bold tracking-widest uppercase">{{order.transaction.status}}</span>
                                    <div v-if="order.transaction.status === 'pending' && order.status != 'denied' && order.status != 'cancelled'" class="">
                                        <button @click="selectedOrder = order.transaction" class="p-2 text-white bg-green-400 rounded-sm font-bold text-xs tracking-wider">Pay Now</button>
                                    </div>
                                </div>
                                <div v-else-if="order.payment_type == 'cod'">
                                    <span class="uppercase text-xs bg-pink-400 text-white p-2 rounded-sm font-bold tracking-wider">Cash On Delivery</span>
                                </div>
                                <div v-else class="">
                                    <span class="uppercase text-xs bg-pink-400 text-white p-2 rounded-sm font-bold tracking-wider">Payment Error</span>
                                </div>
                                <div>
                                    <div>
                                        <span class="text-xs tracking-widest text-gray-600 uppercase mr-8">Shipping fee : &#8377;{{order.shipping_fee}}</span>
                                    </div>
                                    <span class="text-xs tracking-widest text-gray-600 uppercase mr-8">Total : &#8377;{{order.total}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else class="w-full flex justify-center">
                        <span class="text-sm text-blue-400 font-bold my-4">Empty</span>
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
                    "key": 'rzp_test_yRUXwmjCqNPY0r', // Enter the Key ID generated from the Dashboard
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