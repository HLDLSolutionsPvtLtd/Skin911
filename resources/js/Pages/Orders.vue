<template>
    <app-layout>
        <div class="w-full flex justify-center">
            <div class="w-10/12 m-2">
                <div class="w-full m-2 border">
                    <div class="flex w-full bg-white shadow-md justify-center">
                        <span class="text-md text-pink-dark p-2">ORDERS</span>
                    </div>
                </div>
                <div class="grid grid-cols-5 m-2 ">
                    <div class="col-span-5">
                        <div v-for="order in orders.slice().reverse()" class="bg-white shadow-lg mt-2 rounded-sm">
                            <div class="p-2 bg-pink-300 flex justify-between rounded-t-sm text-white">
                                <div class="">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-WHITE" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M21.698 10.658l2.302 1.342-12.002 7-11.998-7 2.301-1.342 9.697 5.658 9.7-5.658zm-9.7 10.657l-9.697-5.658-2.301 1.343 11.998 7 12.002-7-2.302-1.342-9.7 5.657zm12.002-14.315l-12.002-7-11.998 7 11.998 7 12.002-7z"/>
                                        </svg>
                                        <div class="">
                                            <span class="pl-2 uppercase text-sm font-bold tracking-wider">{{order.status}}</span>
                                        </div>
                                    </div>
                                    <div class="pl-8">
                                        <span class="text-xs tracking-widest font-bold">On {{formatDate(order.updated_at)}}</span>
                                    </div>
                                </div>
                                <div class="flex border-l-2 pl-2 items-center">
                                    <button class="text-md font-bold tracking-wider p-2">CANCEL</button>
                                </div>
                            </div>
                            <div class="m-4 p-2" v-for="product in order.products">
                                <div class="flex justify-between bg-white border mb-2">
                                    <div class="flex p-1">
                                        <img :src="'/storage/'+product.image[0].link" alt="" class="w-24 h-24 self-center ">
                                        <div class="flex m-4 text-gray-700 text-sm font-sans text-thin self-center">
                                            <div class="p-2">
                                                <div class="p-1">
                                                    <span class="font-semibold text-gray-600 tracking-wider">{{product.name}}</span>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="p-1 mt-2 text-xs font-bold">
                                            <div class="flex items-center font-semibold text-gray-600 tracking-wider">
                                                <span>QTY : {{product.pivot.quantity}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-2 m-1">
                                        <div class="flex">
                                            <span class="p-1 font-semibold text-gray-600 tracking-wider">&#8377; {{product.price}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-4 p-2 pb-4 flex justify-between">
                                <div class="" v-if="order.payment_type == 'rzp'">
                                    <span class="uppercase text-xs bg-pink-400 text-white p-2 rounded-md font-bold tracking-wider">Payment status : {{order.transaction.status}}</span>
                                    <div v-if="order.transaction.status === 'pending'" class="pt-2">
                                        <button @click="selectedOrder = order.transaction" class="p-2 bg-green-400 rounded-md font-bold text-xs tracking-wider">Pay Now</button>
                                    </div>
                                </div>
                                <div v-else>
                                    <span class="uppercase text-xs bg-pink-400 text-white p-2 rounded-md font-bold tracking-wider">Cash On Delivery</span>
                                </div>
                                <div>
                                    <span class="text-sm tracking-widest text-gray-600 uppercase font-bold mr-8">Total : {{order.total}}</span>
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
                    window.location.replace("/order");
            });
            this.RZPScript.open();
        },
    },
    mounted(){
        
    },
    watch: {
        selectedOrder()
        {
                this.options = {
                    "key": 'rzp_test_znof4x4ZLxITZX', // Enter the Key ID generated from the Dashboard
                    "amount": this.selectedOrder['amount'], // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
                    "currency": this.selectedOrder['currency'],
                    "name": "Modern Shoe Store",
                    "description": "Test Transaction",
                    "image": "https://www.nicesnippets.com/image/imgpsh_fullsize.png",
                    "order_id": this.selectedOrder['razorpayId'], 
                    "handler": function (response){
                        axios.post('/order/transaction',response)
                        .then(res => console.log(res.data))
                        .then( alert("success!"))
                        .then(window.location.replace(`/order`));
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