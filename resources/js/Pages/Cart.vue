<template>
    <app-layout>
        <div class="w-full sm:flex justify-center">
            <div class="sm:w-10/12 m-2 mb-4">
                <div class="w-full mb-2 border">
                    <div class="flex w-full bg-white shadow-md justify-center">
                        <span class="text-md text-pink-dark p-2">CART</span>
                    </div>
                </div>
                <div v-show="products[0]" class="flex flex-col sm:grid sm:grid-cols-5 sm:m-2 ">
                    <div  class="sm:col-span-3 sm:mr-8">
                        <div v-for="product in products.slice().reverse()" :key="product">
                            <!-- <div class="flex bg-g text-center self-center p-1   ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="39.855" height="34.257" viewBox="0 0 47.855 30.257">
                                    <path id="box" d="M13.468,1022.923h0a.616.616,0,0,0-.2.05l-12.9,5.6a.615.615,0,0,0-.118,1.061l5.534,4.023-5.534,4.023a.615.615,0,0,0,.118,1.062l5.779,2.51v9.012a1.258,1.258,0,0,0,.382.848l12.891,5.5a.6.6,0,0,0,.077.023h.017l.024.012.048.012H19.6a.617.617,0,0,0,.12,0l.053-.012H19.8l.046-.012.058-.02.024-.012,12.893-5.5a1.269,1.269,0,0,0,.382-.848v-9.065l5.779-2.51a.615.615,0,0,0,.118-1.059l-5.748-4.179,0-.012,0-.012,5.188-3.771a.615.615,0,0,0-.118-1.062l-12.9-5.6a.606.606,0,0,0-.608.065l-5.5,4-5.534-4.023a.615.615,0,0,0-.406-.118Zm-.031,1.321,5.022,3.653L6.8,1032.881l-4.955-3.6,11.589-5.034Zm11.913.02,11.589,5.034-4.729,3.437-11.656-4.984,4.8-3.488Zm-5.673,4.451,11.534,4.933-11.534,4.933-3.713-1.588-4.768-2.037-3.06-1.309,11.541-4.933Zm12.893,5.692,4.936,3.589-11.589,5.034-5.005-3.639Zm-25.741.02,3.884,1.66,4.768,2.039,3,1.285-5.046,3.67-11.589-5.034,4.981-3.62Zm13.462,6.033,5.188,3.771a.615.615,0,0,0,.605.068l5.889-2.558v8.4l-11.683,4.986V1040.46Zm-1.23.048v14.62L7.38,1050.141v-8.351l5.889,2.558a.614.614,0,0,0,.605-.068l5.188-3.773Zm6.118,6.812h-.007a.618.618,0,0,0-.219.053l-3.271,1.4a.615.615,0,1,0,.485,1.131l3.269-1.4a.615.615,0,0,0-.257-1.186Zm3.269.838h-.007a.615.615,0,0,0-.219.052l-3.269,1.4-3.271,1.4a.615.615,0,1,0,.485,1.129l3.269-1.4,3.269-1.4a.615.615,0,0,0-.257-1.187Z" transform="translate(0.251 -1022.659)" fill="#fff" stroke="#fff" stroke-width="0.5" fill-rule="evenodd"/>
                                </svg>
                                <span class="text-xs text-white text-center self-center font-bold ml-2">Delivered On Monday,16 October 2021</span>
                            </div> -->
                            <div class="flex justify-between bg-white border mb-2">
                                <div class="flex p-1">
                                    <img :src="'/storage/'+product.image[0].link" alt="" class="w-24 h-24 self-center ">
                                    <div class="flex m-4 text-gray-700 text-sm font-sans text-thin self-center">
                                        <div class="p-2">
                                            <div class="p-1">
                                                <span class="font-bold tracking-wider text-md">{{product.name}}</span>
                                            </div>
                                            <span v-if="product.pivot.variant" class="p-1 font-semibold">&#8377; {{getPrice(product)}}</span>
                                            <span v-else class="p-1 font-semibold">&#8377; {{product.price}}</span>
                                            <div class="my-2 flex gap-1">
                                                 <div @click="setQuantity('de', product)" class="bg-white cursor-pointer py-0 px-2 border flex items-center shadow-sm rounded-full">
                                                    <span class="">&#8722;</span>
                                                </div>

                                                <div class="bg-white py-0 px-4 flex items-center shadow-md border rounded-sm">
                                                    <span class="">{{product.pivot.quantity}}</span>
                                                </div>
                                               
                                                <div @click="setQuantity('in', product)" class="bg-white cursor-pointer flex items-center border py-0 px-2 shadow-sm rounded-full">
                                                    <span class="flex">&#43;</span>
                                                </div>
                                            </div>
                                            <div class="m-2 text-xs tracking-wider text-blue-400 flex items-center" v-show="qerror">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" class="fill-current text-red-600 mr-1" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2.033 16.01c.564-1.789 1.632-3.932 1.821-4.474.273-.787-.211-1.136-1.74.209l-.34-.64c1.744-1.897 5.335-2.326 4.113.613-.763 1.835-1.309 3.074-1.621 4.03-.455 1.393.694.828 1.819-.211.153.25.203.331.356.619-2.498 2.378-5.271 2.588-4.408-.146zm4.742-8.169c-.532.453-1.32.443-1.761-.022-.441-.465-.367-1.208.164-1.661.532-.453 1.32-.442 1.761.022.439.466.367 1.209-.164 1.661z"/></svg>
                                                <span>{{qerror}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex p-2 m-1">
                                    <div class="flex">
                                        <svg @click="removeProduct(product)" xmlns="http://www.w3.org/2000/svg" class="self-center fill-current cursor-pointer hover:text-black text-gray-400" width="18" height="18" viewBox="0 0 24 24">
                                            <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 16.538l-4.592-4.548 4.546-4.587-1.416-1.403-4.545 4.589-4.588-4.543-1.405 1.405 4.593 4.552-4.547 4.592 1.405 1.405 4.555-4.596 4.591 4.55 1.403-1.416z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="w-full">

                        </div>
                    </div>
                    <div class="sm:col-span-2 sm:ml-8 relative">
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
                                <div class="flex font-semibold tracking-widest text-xs  border-b p-4 justify-between">
                                    <span class="">
                                        <span class="uppercase">Shipping fee</span>
                                        <div class="pt-2">
                                            <!-- <span>&#8377; 10</span> -->
                                            <span class="text-blue-400">Shipping fee will be calculated during checkout</span>
                                        </div>
                                    </span>
                                    
                                </div>
                                <div class="flex font-bold tracking-widest text-sm uppercase p-4 justify-between">
                                    <span>Total </span>
                                    <span>&#8377; {{total}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="w-full flex justify-center mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-500 mr-2" width="24" height="24" viewBox="0 0 24 24"><path d="M5.48 10.089l1.583-1.464c1.854.896 3.028 1.578 5.11 3.063 3.916-4.442 6.503-6.696 11.311-9.688l.516 1.186c-3.965 3.46-6.87 7.314-11.051 14.814-2.579-3.038-4.301-4.974-7.469-7.911zm14.407.557c.067.443.113.893.113 1.354 0 4.962-4.038 9-9 9s-9-4.038-9-9 4.038-9 9-9c1.971 0 3.79.644 5.274 1.723.521-.446 1.052-.881 1.6-1.303-1.884-1.511-4.271-2.42-6.874-2.42-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11c0-1.179-.19-2.313-.534-3.378-.528.633-1.052 1.305-1.579 2.024z"/></svg>
                            <span class="text-md tracking-wider font-serif text-gray-500 text font-bold">Safe and Secure Payments powered by Razorpay</span>
                        </div>

                        <div class="w-full mt-4">
                            <button @click="checkout()" class="p-2 font-bold tracking-wide bg-pink rounded-sm w-full text-pink-dark">PROCEED TO CHECKOUT</button>
                        </div>
                       
                    </div>
                </div>
                <div v-show="!products[0]">
                    <div class="flex justify-center my-12">
                        <span class="text-sm tracking-widest text-blue-500 font-bold">your cart is empty!</span>
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
    props: ['products'],
    data(){
        return{
            subtotal: 0,
            n_items: 0,
            qerror: '',
            total : 0,
        }
    },
    methods:{
        getPrice(product)
        {
           var index =  product.variant.findIndex(el =>{
                if(el.name == product.pivot.variant)
                {
                    return true;
                }
            })

            return product.variant[index].price;
        },

        setQuantity(q, product)
        {
            if(q == 'in')
            {
                if(product.pivot.quantity >= 6)
                {
                    this.qerror = "max quantity exceeded!!";
                }
                else
                {
                    this.qerror = "";
                    this.$inertia.post('/cart/product/quantity/update', {
                        'qty': ++product.pivot.quantity,
                        'id' : product.pivot.id,
                        'p_id': product.id,
                        onSuccess: () =>{
                            alert('successss')
                        }
                    })
                }
            }
            else
            {
                 if(product.pivot.quantity <= 1)
                {
                    this.qerror = "min quantity exceeded!!";
                }
                else
                {
                    this.qerror = "";
                    this.$inertia.post('/cart/product/quantity/update', {
                        'qty': --product.pivot.quantity,
                        'id' : product.pivot.id,
                        'p_id': product.id,
                        onSuccess: () =>{
                            alert('successss')
                        }
                    })
                }
            }
        },
        
        removeProduct(product)
        {
            this.$inertia.post('/cart/'+product.pivot.cart_id+'/product/'+product.id+'/delete', {
                'id': product.pivot.id,
                onSuccess: () =>
                {
                    alert('success');
                    
                }
            })
        },
        calculate()
        {
            this.subtotal = 0;
            this.n_items = 0;
            this.products.forEach(element => {
                if(element.pivot.variant)
                {
                    var index =  element.variant.findIndex(el =>{
                        if(el.name == element.pivot.variant)
                        {
                            return true;
                        }
                    })

                    this.subtotal = this.subtotal + element.variant[index].price * element.pivot.quantity;
                    this.n_items = this.n_items + parseInt(element.pivot.quantity);
                }
                else
                {
                    this.subtotal = this.subtotal + element.price * element.pivot.quantity;
                    this.n_items = this.n_items + parseInt(element.pivot.quantity);
                }
            });
            this.total = this.subtotal;
        },
        checkout()
        {
            window.location.href = "/checkout"
        }
    },
    mounted(){
       this.calculate();
    },
    watch: {
        products()
        {
            this.calculate();
        }
   },

}
</script>