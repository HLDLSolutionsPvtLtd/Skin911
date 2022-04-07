<template>
    <app-layout class="Buynow">
        <div class="w-full flex justify-center">
            <div v-show="success" class='modal__container shadow-md border bg-white'>
                <div class="modal__content pt-12 relative">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102" viewBox="0 0 24 24"  class="absolute -top-20 right-1/4 fill-current transition transform translate-Y-60 duration-700 text-blue-400 rounded-full p-0 bg-white">
                        <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.959 17l-4.5-4.319 1.395-1.435 3.08 2.937 7.021-7.183 1.422 1.409-8.418 8.591z"/>
                    </svg> -->
                    <h1 class="sm:text-2xl"><span style="font-family: 'Whitney' !important;" class="text-blue-800 italic tracking-wider font-semibold">ORDER PLACED</span></h1>
                    <a href="/myorder">
                        <button class="modal__button mt-8 tracking-widest  font-bold text-pink-500 text-xs border border-blue-400 w-full">VIEW ORDERS</button>
                    </a>
                </div>
                <i @click="success=!success" class="absolute  right-4 top-4 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-800 hover:text-red-500" width="20" height="20" viewBox="0 0 24 24">
                        <path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/>
                    </svg>
                </i>
            </div>
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
                                <div v-if="addresses.length" class="m-2">
                                    <div class="pt-4" v-for="address in addresses" :key="address.id">
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
                                    
                                </div>
                                <div v-else class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" class="fill-current mr-2 text-blue-400" viewBox="0 0 24 24">
                                        <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-.001 5.75c.69 0 1.251.56 1.251 1.25s-.561 1.25-1.251 1.25-1.249-.56-1.249-1.25.559-1.25 1.249-1.25zm2.001 12.25h-4v-1c.484-.179 1-.201 1-.735v-4.467c0-.534-.516-.618-1-.797v-1h3v6.265c0 .535.517.558 1 .735v.999z"/>
                                    </svg>
                                    <span class="text-sm tracking-wider font-semibold text-blue-400">Please add new Address first</span>
                                </div>
                                <div class="pt-2 border-t">
                                    <a href="/address/new" class="text-white text-xs font-bold tracking-wider bg-green-500 rounded-md shadow-lg p-2">NEW ADDRESS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="addresses[0]" class="sm:col-span-2 sm:ml-8 mt-2 sm:mt-0">
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
                                    <span>&#8377; {{fee}}</span>
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
import { usePage } from '@inertiajs/inertia-vue3';
export default {
    components:
    {
        AppLayout,
    },
    props: ['product', 'variant', 'quantity'],
    data(){
        return{
            RZPScript: '',
            order: '',
            success: false,
            subtotal: 0,
            n_items: 0,
            fee: 0,
            user: usePage().props.value.user,
            addresses: [],
            total : 0,
            form: this.$inertia.form({
                cod: false,
                selectedAddress: '',
                quantity: this.quantity,
                variant: this.variant,
                pincode: '',
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
            var index =  this.addresses.findIndex(el =>{
                if(el.id == this.form.selectedAddress)
                {
                    return true;
                }
            })
            this.form.pincode = this.addresses[index].pincode;
            axios.post('/order/product/'+this.product.id+'/create', this.form)
            .then(res => this.order = res.data);
        },
        
    },
    mounted(){
            this.subtotal = 0;
            
            if(this.variant)
            {
                if(this.product.discounts[0])
                {
                    if(this.product.discounts[0].type == 'percentage')
                    {
                        this.subtotal = ((this.variant.price * this.quantity) - ((this.product.discounts[0].amount * this.variant.price/100)));
                    }
                    else
                    {
                        this.subtotal = this.variant.price * this.quantity - this.product.discounts[0].amount;
                    }
                }
                else if(this.product.brand.discounts[0])
                {
                   if(this.product.brand.discounts[0].type == 'percentage')
                    {
                        this.subtotal = ((this.variant.price * this.quantity) - ((this.product.brand.discounts[0].amount * this.variant.price/100)));
                    }
                    else
                    {
                        this.subtotal = this.variant.price * this.quantity - this.product.brand.discounts[0].amount;
                    }
                }
                else if(this.product.category.discounts[0])
                {
                    if(this.product.category.discounts[0].type == 'percentage')
                    {
                        this.subtotal = ((this.variant.price * this.quantity) - ((this.product.category.discounts[0].amount * this.variant.price/100)));
                    }
                    else
                    {
                        this.subtotal = this.variant.price * this.quantity - this.product.category.discounts[0].amount;
                    }
                }
                else
                {
                    this.subtotal = this.variant.price * this.quantity;
                }
            }
            else
            {
                if(this.product.discounts[0])
                {
                    if(this.product.discounts[0].type == 'percentage')
                    {
                        this.subtotal = ((this.product.price * this.quantity) - ((this.product.discounts[0].amount * this.product.price/100)));
                    }
                    else
                    {
                        this.subtotal = this.product.price * this.quantity - this.product.discounts[0].amount;
                    }
                }
                else if(this.product.brand.discounts[0])
                {
                   if(this.product.brand.discounts[0].type == 'percentage')
                    {
                        this.subtotal = ((this.product.price * this.quantity) - ((this.product.brand.discounts[0].amount * this.product.price/100)));
                    }
                    else
                    {
                        this.subtotal = this.product.price * this.quantity - this.product.brand.discounts[0].amount;
                    }
                }
                else if(this.product.category.discounts[0])
                {
                    if(this.product.category.discounts[0].type == 'percentage')
                    {
                        this.subtotal = ((this.product.price * this.quantity) - ((this.product.category.discounts[0].amount * this.product.price/100)));
                    }
                    else
                    {
                        this.subtotal = this.product.price * this.quantity - this.product.category.discounts[0].amount;
                    }
                }
                else
                {
                    this.subtotal = this.product.price * this.quantity;
                }
            }
            this.n_items = this.quantity;

        axios.get('/address/all')
        .then(res => this.addresses = res.data);

        this.RZPScript = document.createElement('script');
        this.RZPScript.setAttribute('src', 'https://checkout.razorpay.com/v1/checkout.js');
        document.head.appendChild(this.RZPScript);
    },
    watch: {
        
        order()
        {
            var index =  this.addresses.findIndex(el =>{
                if(el.id == this.form.selectedAddress)
                {
                    return true;
                }
            })
            if(this.order.razorpayId)
            {
                this.options = {
                    "key": "rzp_test_yRUXwmjCqNPY0r", // Enter the Key ID generated from the Dashboard
                    "amount": this.order['amount'], // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
                    "currency": this.order['currency'],
                    "name": "SKIN911",
                    "description": "Test Transaction",
                    "image": "http://143.110.244.125/storage/skin911.png",
                    "order_id": this.order['razorpayId'], 
                    "handler":  (response) => {
                        axios.post('/order/transaction',response)
                        .then(res => console.log(res.data))
                        .then( this.success = true);
                    },
                    "prefill": {
                        "name": this.user.name,
                        "email": this.user.email,
                        "contact": this.addresses[index].phone_number
                    },
                    "notes": {
                        "address": this.addresses[index].state + ',' +this.addresses[index].city +',' + this.addresses[index].street +',' + this.addresses[index].pincode +',' + this.addresses[index].house_no
                    },
                    "theme": {
                        "color": "#F37254"
                    },
                    "modal": {
                        "ondismiss": function(){
                            window.location.replace(`/myorder`);
                        }
                    }
        
                }
                this.pay();
            }
            else
            {
                this.payloading = false;
                this.success = true;
                // window.location.replace('/myorder');
            }
        },
        addresses()
        {
            if(this.addresses[0])
            {
                this.form.selectedAddress = this.addresses[0].id;
                var index =  this.addresses.findIndex(el =>{
                    if(el.id == this.form.selectedAddress)
                    {
                        return true;
                    }
                })
                axios.get('/admin/shippingfee/calculate', {params: {'pincode': this.addresses[index].pincode , 'amount' : this.subtotal}})
                .then(res => this.fee = res.data)
                .then( ()=> {
                    if(this.fee != 'free')
                    {
                        this.total = this.subtotal + this.fee;

                    }
                    else
                    {
                        this.total = this.subtotal;
                    }
                })
            }
        }
   },

}
</script>