<template>
    <app-layout>
        <div class="w-full flex justify-center">
            <div class="sm:w-10/12 m-2">
                <div class="w-full border">
                    <div class="flex w-full bg-white shadow-md justify-center">
                        <span class="text-md text-pink-dark p-2">CHECKOUT</span>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-5 mt-2">
                    <div class="sm:col-span-3 sm:mr-8">
                        <div class="bg-white p-4 shadow-md">
                            <div class="flex items-center">
                                <input type="checkbox" class="mr-2" v-model="form.cod">
                                <span class="text-xs font-bold tracking-wider">CASH ON DELIVERY<span class="text-green-600 tracking-widest">(Available)</span></span>
                            </div>
                        </div>
                        <div class="bg-white mt-2 p-4 shadow-md">
                            <div class="">
                                <div>
                                    <span class="text-xs font-bold tracking-wider">BILLING ADDRESS</span>
                                </div>
                                <div class="m-2">
                                    <div v-if="addresses.length" class="pt-4" v-for="address in addresses" :key="address.id">
                                        <div>
                                            <input type="radio" :value="address.id" v-model="form.selectedAddress" :checked="form.selectedAddress === address.id" class="mr-2">
                                            <span class="text-xs font-bold uppercase tracking-wider text-gray-800">{{address.name}}</span>
                                            <div class="flex text-xs m-2 tracking-wider font-semibold text-gray-700">
                                                <span>{{address.house_no}}, {{address.street}}, Near {{address.landmark}}, {{address.district}}, {{address.state}}, 
                                                    Phone No - {{address.phone_number}},
                                                    {{address.pincode}}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="pt-2 flex gap-2">
                                            <a :href="'/address/'+address.id+'/edit'" class="p-1 rounded-sm shadow-lg text-xs bg-green-500 font-bold tracking-wider text-white flex items-center flex-wrap">
                                                <span>Edit</span>
                                               
                                            </a>
                                            <button @click="deleteAddress(address)" class="p-1 rounded-sm shadow-lg text-xs text-white bg-red-400 font-bold">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                    <div v-else class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" class="fill-current mr-2 text-blue-400" viewBox="0 0 24 24">
                                            <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-.001 5.75c.69 0 1.251.56 1.251 1.25s-.561 1.25-1.251 1.25-1.249-.56-1.249-1.25.559-1.25 1.249-1.25zm2.001 12.25h-4v-1c.484-.179 1-.201 1-.735v-4.467c0-.534-.516-.618-1-.797v-1h3v6.265c0 .535.517.558 1 .735v.999z"/>
                                        </svg>
                                        <span class="text-sm tracking-wider font-semibold text-blue-400">Please add new Address first</span>
                                    </div>
                                </div>
                                <div class="pt-2 border-t">
                                    <a href="/address/new" class="text-white text-xs font-bold tracking-wider bg-green-500 rounded-md shadow-lg p-2">NEW ADDRESS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-2 sm:ml-8 mt-2 sm:mt-0">
                        <div class="border bg-white">
                            <div class="m-4 text-gray-600">
                                <div class="flex border-b p-4 font-semibold tracking-widest text-xs uppercase justify-between">
                                    <span class="">Subtotal</span>
                                    <span>&#8377; {{subtotal}}</span>
                                </div>
                                <div class="flex border-b p-4 font-semibold tracking-widest text-xs uppercase justify-between">
                                    <span>ITEMS</span>
                                    <span>{{this.n_items}}</span>
                                </div>
                                <div class="flex font-semibold tracking-widest text-xs uppercase border-b p-4 justify-between">
                                    <span>Shipping fee</span>
                                    <span>&#8377; 150</span>
                                </div>
                                <div class="flex font-bold tracking-widest text-sm uppercase p-4 justify-between">
                                    <span>Total </span>
                                    <span>&#8377; {{total}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="w-full flex mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-500 mr-2" width="24" height="24" viewBox="0 0 24 24"><path d="M5.48 10.089l1.583-1.464c1.854.896 3.028 1.578 5.11 3.063 3.916-4.442 6.503-6.696 11.311-9.688l.516 1.186c-3.965 3.46-6.87 7.314-11.051 14.814-2.579-3.038-4.301-4.974-7.469-7.911zm14.407.557c.067.443.113.893.113 1.354 0 4.962-4.038 9-9 9s-9-4.038-9-9 4.038-9 9-9c1.971 0 3.79.644 5.274 1.723.521-.446 1.052-.881 1.6-1.303-1.884-1.511-4.271-2.42-6.874-2.42-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11c0-1.179-.19-2.313-.534-3.378-.528.633-1.052 1.305-1.579 2.024z"/></svg>
                            <span class="text-md tracking-wider font-serif text-gray-500 font-bold">Safe and Secure Payments powered by Razorpay</span>
                        </div>

                        <div class="w-full mt-4">
                            <button @click="checkout" class="p-2 bg-pink rounded-sm w-full text-pink-dark">PLACE ORDER</button>
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

    data(){
        return{
            RZPScript: '',
            order: '',
            products:[],
            subtotal: 0,
            n_items: 0,
            addresses: [],
            total : 0,
            form: this.$inertia.form({
                cod: false,
                selectedAddress: '',
            }),
        }
    },
    methods:{
        deleteAddress(address)
        {
            if(confirm("Address will be deleted permanently!"))
            {
                this.$inertia.delete('/address/'+address.id+'/delete', {
                    onSuccess: () =>
                    {
                        location.reload();
                    }
                });
            }
        },
        pay()
        {
            this.RZPScript = new Razorpay(this.options);
            this.RZPScript.on('payment.failed', function (response){
                    window.location.replace("/myorder");
            });
            this.RZPScript.open();
        },
        checkout()
        {
            axios.post('/order/create', this.form)
            .then(res => this.order = res.data);
        },
        
    },
    mounted(){
        axios.get('cart/all')
        .then(res => this.products = res.data);
        axios.get('/address/all')
        .then(res => this.addresses = res.data);

        this.RZPScript = document.createElement('script');
        this.RZPScript.setAttribute('src', 'https://checkout.razorpay.com/v1/checkout.js');
        document.head.appendChild(this.RZPScript);
    },
    watch: {
        products()
        {
            if(!this.products[0])
            {
                window.location = "/cart";

            }
            this.subtotal = 0;
            this.n_items = 0;
            this.products.forEach(element => {
                this.subtotal = this.subtotal + element.price * element.pivot.quantity;
                this.n_items = this.n_items + parseInt(element.pivot.quantity);
            });
            this.total = this.subtotal + 150;
        },
        order()
        {
            if(this.order.razorpayId)
            {
                this.options = {
                    "key": 'rzp_test_znof4x4ZLxITZX', // Enter the Key ID generated from the Dashboard
                    "amount": this.order['amount'], // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
                    "currency": this.order['currency'],
                    "name": "Modern Shoe Store",
                    "description": "Test Transaction",
                    "image": "https://www.nicesnippets.com/image/imgpsh_fullsize.png",
                    "order_id": this.order['razorpayId'], 
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
                    "modal": {
                        "ondismiss": function(){
                            window.location.replace(`/alert/payment/aborted`);
                        }
                    }
        
                }
                this.pay();
            }
            else
            {
                this.payloading = false;
                alert('Order Placed');
                window.location.replace('/myorder');
            }
        },
        addresses()
        {
            this.form.selectedAddress = this.addresses[0].id;
        }
   },

}
</script>