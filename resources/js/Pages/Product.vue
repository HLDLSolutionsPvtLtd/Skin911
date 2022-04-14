<template>
    <app-layout title="Product">
        <div class="sm:flex justify-center relative overflow-x-hidden">
            <div v-show="success" class="modal z-50 w-5/6 md:w-1/4" id="modal">
                <div class='modal__container shadow-md border bg-white'>
                                        
                    <div class="modal__content flex flex-col items-center justify-center pt-6 relative">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102" viewBox="0 0 24 24"  class="absolute -top-20 right-1/4 fill-current transition transform translate-Y-60 duration-700 text-blue-400 rounded-full p-0 bg-white">
                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.959 17l-4.5-4.319 1.395-1.435 3.08 2.937 7.021-7.183 1.422 1.409-8.418 8.591z"/>
                        </svg> -->
                        <p class="text-gray-700 text-sm tracking-wider font-bold text-center w-full">PRODUCT WAS SUCCESSFULLY ADDED TO YOUR CART</p>
                        <a href="/cart">
                            <button class="border border-blue-200 rounded-sm p-2 px-8 mt-4 tracking-widest font-bold text-gray-700 text-xs">VIEW CART</button>
                        </a>
                    </div>
                    
                    <i @click="success=!success" class="absolute  right-4 top-4 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-800 hover:text-red-500" width="15" height="15" viewBox="0 0 24 24">
                            <path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/>
                        </svg>
                    </i>
                </div>
            </div>
            <div v-if="product" class=" sm:flex xxl:w-1/2 lg:w-7/12 sm:m-6">
                <div class="flex flex-col sm:flex-1 bg-white p-2 border-b sm:border-0 shadow-lg sm:shadow-none">
                    <div class="flex border" style="height:calc(100vh - 400px)" >
                        <div :class="{'fixed z-20 top-0 left-0 h-screen w-screen overflow-y-hidden flex items-center justify-center bg-white': zoom}">
                            <img  :src="'/storage/'+currentImg" alt="" :class="{'h-auto w-auto': zoom}" class="w-full h-full">
                            <svg v-if="zoom" xmlns="http://www.w3.org/2000/svg" @click="zoom = !zoom" class="fill-current cursor-pointer text-red-400 absolute right-6 top-6" width="24" height="24" viewBox="0 0 24 24">
                               <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/>
                            </svg>
                        </div>
                       
                        <div class="relative">
                            <svg v-if="!zoom" xmlns="http://www.w3.org/2000/svg" @click="zoom = !zoom" class="fill-current cursor-pointer text-gray-400 absolute right-4 top-4" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M24 22h-24v-20h24v20zm-1-19h-22v18h22v-18zm-4 7h-1v-3.241l-11.241 11.241h3.241v1h-5v-5h1v3.241l11.241-11.241h-3.241v-1h5v5z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex mt-2">
                        <ul class="flex flex-col mr-1 border" v-for="image in product.image" :key="image">
                            <li class="w-full" @click="currentimg(image.link)" >
                                <img :src="'/storage/'+image.link" alt="" class="h-12 w-10 cursor-pointer border-gray-600 hover:border" >
                            </li>
                        </ul>
                    </div>
                </div>
                <div class=" sm:flex-1 bg-white p-2 mt-2 sm:mt-0 shadow-lg border-t sm:border-0 sm:shadow-none">
                    <div class="p-2">
                        <span class="text-md tracking-wider font-semibold text-gray-500">{{product.name}}</span>
                        <div class="py-2 mr-2" v-if="product.variant[0]">
                            <span style="font-size: 10px" class="font-semibold text-gray-500 tracking-wider">SELECT VARIANT</span>
                            <div class="flex gap-2 pt-2">
                                <div v-for="(variantq, index) in product.variant" :key="variantq.id">
                                    <span @click="this.form.variant = variantq.id, sIndex = index" :class="{'bg-transparent border-green-200 text-green-300':variantq.id == form.variant}" class="p-2 font-bold cursor-pointer rounded-md tracking-widest uppercase text-gray-400 border" style="font-size:10px">{{variantq.name}}</span>
                                </div>
                            </div>
                        </div>
                        <div v-if="!product.variant[0]" class="mt-2">
                            <span v-if="product.quantity <= 0" class="text-red-500 text-sm flex items-center tracking-wider">
                                <svg width="14" height="14" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current mr-2 text-green-500" fill-rule="evenodd" clip-rule="evenodd">
                                    <path d="M16.142 2l5.858 5.858v8.284l-5.858 5.858h-8.284l-5.858-5.858v-8.284l5.858-5.858h8.284zm.829-2h-9.942l-7.029 7.029v9.941l7.029 7.03h9.941l7.03-7.029v-9.942l-7.029-7.029zm-5.971 6h2v8h-2v-8zm1 12.25c-.69 0-1.25-.56-1.25-1.25s.56-1.25 1.25-1.25 1.25.56 1.25 1.25-.56 1.25-1.25 1.25z"/>
                                </svg>
                                Out Of Stock
                            </span>
                            <span v-else class="text-green-500 text-sm flex items-center tracking-wider">
                                <svg width="14" height="14" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current mr-2 text-green-500" fill-rule="evenodd" clip-rule="evenodd">
                                    <path d="M24 4.685l-16.327 17.315-7.673-9.054.761-.648 6.95 8.203 15.561-16.501.728.685z"/>
                                </svg>
                                In Stock
                            </span>
                        </div>
                        <div v-else class="mt-2">
                            <span v-if="!check" class="text-green-500 text-sm flex items-center tracking-wider">
                                <svg width="14" height="14" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current mr-2 text-green-500" fill-rule="evenodd" clip-rule="evenodd">
                                    <path d="M24 4.685l-16.327 17.315-7.673-9.054.761-.648 6.95 8.203 15.561-16.501.728.685z"/>
                                </svg>
                                In Stock
                            </span>
                            <span v-else class="text-red-500 text-sm flex items-center tracking-wider">
                                <svg width="14" height="14" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current mr-2 text-red-500" fill-rule="evenodd" clip-rule="evenodd">
                                    <path d="M16.142 2l5.858 5.858v8.284l-5.858 5.858h-8.284l-5.858-5.858v-8.284l5.858-5.858h8.284zm.829-2h-9.942l-7.029 7.029v9.941l7.029 7.03h9.941l7.03-7.029v-9.942l-7.029-7.029zm-5.971 6h2v8h-2v-8zm1 12.25c-.69 0-1.25-.56-1.25-1.25s.56-1.25 1.25-1.25 1.25.56 1.25 1.25-.56 1.25-1.25 1.25z"/>
                                </svg>
                                Out Of Stock
                            </span>
                        </div>
                    </div>
                    <div class="p-2">
                        <template v-if="product.discounts[0]">
                            <template v-if="product.variant[0]">
                                <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{product.variant[sIndex].price}}</span>
                                <template v-if="product.discounts[0].type == 'percentage'">
                                    <span class="text-sm text-gray-700 font-bold">&#8377;{{product.variant[sIndex].price - (product.variant[sIndex].price * product.discounts[0].amount / 100)}}</span>
                                </template>
                                <template v-else>
                                    <span class="text-sm text-gray-700 font-bold">&#8377;{{product.variant[sIndex].price - product.discounts[0].amount}}</span>
                                </template>
                            </template>
                            <template v-else>
                                <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{product.price}}</span>
                                <template v-if="product.discounts[0].type == 'percentage'">
                                    <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price - (product.price * product.discounts[0].amount / 100)}}</span>
                                </template>
                                <template v-else>
                                    <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price - product.discounts[0].amount}}</span>
                                </template>
                            </template>
                        </template>
                        <template v-else-if="product.brand.discounts[0]">
                            <template v-if="product.variant[0]">
                                <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{product.variant[sIndex].price}}</span>
                                <template v-if="product.brand.discounts[0].type == 'percentage'">
                                    <span class="text-sm text-gray-700 font-bold">&#8377;{{product.variant[sIndex].price - (product.variant[sIndex].price * product.brand.discounts[0].amount / 100)}}</span>
                                </template>
                                <template v-else>
                                    <span class="text-sm text-gray-700 font-bold">&#8377;{{product.variant[sIndex].price - product.brand.discounts[0].amount}}</span>
                                </template>
                            </template>
                            <template v-else>
                                <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{product.price}}</span>
                                <template v-if="product.brand.discounts[0].type == 'percentage'">
                                    <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price - (product.price * product.brand.discounts[0].amount / 100)}}</span>
                                </template>
                                <template v-else>
                                    <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price - product.brand.discounts[0].amount}}</span>
                                </template>
                            </template>
                        </template>
                        <template v-else-if="product.category.discounts[0]">
                            <template v-if="product.variant[0]">
                                <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{product.variant[sIndex].price}}</span>
                                <template v-if="product.category.discounts[0].type == 'percentage'">
                                    <span class="text-sm text-gray-700 font-bold">&#8377;{{product.variant[sIndex].price - (product.variant[sIndex].price * product.category.discounts[0].amount / 100)}}</span>
                                </template>
                                <template v-else>
                                    <span class="text-sm text-gray-700 font-bold">&#8377;{{product.variant[sIndex].price - product.category.discounts[0].amount}}</span>
                                </template>
                            </template>
                            <template v-else>
                                <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{product.price}}</span>
                                <template v-if="product.category.discounts[0].type == 'percentage'">
                                    <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price - (product.price * product.category.discounts[0].amount / 100)}}</span>
                                </template>
                                <template v-else>
                                    <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price - product.category.discounts[0].amount}}</span>
                                </template>
                            </template>
                        </template>
                        <template v-else>
                            <template v-if="product.variant[0]">
                                <span class="text-xs text-gray-900 pr-2">&#8377;{{product.variant[sIndex].price}}</span>
                            </template>
                            <template v-else>
                                <span class="text-xs text-gray-900 pr-2">&#8377;{{product.price}}</span>
                            </template>
                        </template>
                    </div>
                    <div v-show="!check" class="m-2 flex gap-1">
                        <div @click="setQuantity('in')" class="bg-white border cursor-pointer flex items-center py-0 px-2 shadow-sm rounded-full">
                            <span class="flex">&#43;</span>
                        </div>
                        <div class="bg-white py-0 px-4 flex items-center border shadow-sm rounded-sm">
                            <span class="">{{form.quantity}}</span>
                        </div>
                        <div @click="setQuantity('de')" class="bg-white border cursor-pointer py-0 px-2 flex items-center shadow-sm rounded-full">
                             <span class="">&#8722;</span>
                        </div>
                    </div>
                    <div class="m-2 text-xs tracking-wider text-blue-400 flex items-center" v-show="qerror">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" class="fill-current text-red-600 mr-1" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2.033 16.01c.564-1.789 1.632-3.932 1.821-4.474.273-.787-.211-1.136-1.74.209l-.34-.64c1.744-1.897 5.335-2.326 4.113.613-.763 1.835-1.309 3.074-1.621 4.03-.455 1.393.694.828 1.819-.211.153.25.203.331.356.619-2.498 2.378-5.271 2.588-4.408-.146zm4.742-8.169c-.532.453-1.32.443-1.761-.022-.441-.465-.367-1.208.164-1.661.532-.453 1.32-.442 1.761.022.439.466.367 1.209-.164 1.661z"/></svg>
                        <span>{{qerror}}</span>
                    </div>
                    <div v-show="!check" class="mt-2 flex justify-start">
                        <button  @click="addtocart()" class="p-2 w-1/2 rounded-sm font-semibold bg-pink text-pink-dark text-sm m-2">ADD TO CART</button>
                        <button  @click="buyNow()" class="p-2 w-1/2 border border-gray-700 rounded-sm font-semibold text-pink-dark text-sm m-2">BUY IT NOW</button>
                    </div>
                    <div class="mt-8 mb-8 border-t">
                        <div>
                            <ul class="flex text-gray-500 font-light text-sm">
                                <li class="p-2 tracking-wider cursor-pointer"></li>
                                <li class="p-2 tracking-wider cursor-pointer">{{product.description}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white my-2 shadow-lg sm:shadow-none border-t sm:border-0 md:mx-12 md:my-12 ">
               <div class="flex justify-between pt-4 px-2 sm:px-16 items-center">
                   <span class="text-gray-700 text-md font-bold sm:text-lg">RELATED PRODUCTS</span>
                   <div class="flex items-center">
                       <a :href="'/products?related='+product.brand.name+'&key='+product.category.name">
                           <span class="text-xs text-blue-500 font-semibold underline tracking-widest">SEE ALL</span>
                       </a>
                   </div>
               </div>
               <div class="overflow-y-hidden whitespace-nowrap p-2 overflow-x-scroll no-scrollbar sm:overflow-x-hidden sm:grid sm:grid-cols-6 md:mx-12 md:px-4">
                    <div class="border w-5/12 sm:w-auto inline-block border-gray-100 mr-1 relative" v-for="sproduct in products" :key="sproduct.id">
                            <a :href="'/product/'+sproduct.id+'/details'" class="overflow-hidden relative">
                                <div class="relative pb-48 overflow-hidden">
                                    <img v-if="sproduct.image[0]" style="height:250px" class="absolute  inset-0 h-full w-full object-cover" :src="'/storage/'+sproduct.image[0].link" alt="">
                                </div>
                                <div class="absolute ribbon top-4 left-0">
                                    <span v-if="sproduct.discounts[0]" class="flag-discount transform rotate-90">
                                        <template v-if="sproduct.discounts[0].type == 'percentage'">
                                            {{sproduct.discounts[0].amount}}%
                                        </template>
                                        <template v-else>
                                            -{{sproduct.discounts[0].amount}}
                                        </template>
                                    </span>
                                    <span v-else-if="sproduct.brand.discounts[0]" class="flag-discount transform rotate-90">
                                        <template v-if="sproduct.brand.discounts[0].type == 'percentage'">
                                            {{sproduct.brand.discounts[0].amount}}%
                                        </template>
                                        <template v-else>
                                            -{{sproduct.brand.discounts[0].amount}}
                                        </template>
                                    </span>
                                    <span v-else-if="sproduct.category.discounts[0]" class="flag-discount transform rotate-90">
                                        <template v-if="sproduct.category.discounts[0].type == 'percentage'">
                                            {{sproduct.category.discounts[0].amount}}%
                                        </template>
                                        <template v-else>
                                            -{{sproduct.category.discounts[0].amount}}
                                        </template>
                                    </span>
                                </div>
                            </a>
                            <div class="px-2 pt-4">
                                <p class="text-sm w-full truncate overflow-hidden text-gray-600 font-bold tracking-wide">{{sproduct.name}}</p>
                            </div>
                            <!-- <div class="px-2">
                                <span class="italic text-sm text-gray-600 tracking-wide font-thin">{{sproduct.description}}</span>
                            </div> -->
                            <div class="px-2 h-6">
                                 <template v-if="sproduct.discounts[0]">
                                    <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{sproduct.price}}</span>
                                    <template v-if="sproduct.discounts[0].type == 'percentage'">
                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{sproduct.price - (sproduct.price * sproduct.discounts[0].amount / 100)}}</span>
                                    </template>
                                    <template v-else>
                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{sproduct.price - sproduct.discounts[0].amount}}</span>
                                    </template>
                                </template>
                                <template v-else-if="sproduct.brand.discounts[0]">
                                    <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{sproduct.price}}</span>
                                    <template v-if="sproduct.brand.discounts[0].type == 'percentage'">
                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{sproduct.price - (sproduct.price * sproduct.brand.discounts[0].amount / 100)}}</span>
                                    </template>
                                    <template v-else>
                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{sproduct.price - sproduct.brand.discounts[0].amount}}</span>
                                    </template>
                                </template>
                                <template v-else-if="sproduct.category.discounts[0]">
                                    <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{sproduct.price}}</span>
                                    <template v-if="sproduct.category.discounts[0].type == 'percentage'">
                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{sproduct.price - (sproduct.price * sproduct.category.discounts[0].amount / 100)}}</span>
                                    </template>
                                    <template v-else>
                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{sproduct.price - sproduct.category.discounts[0].amount}}</span>
                                    </template>
                                </template>
                                <span v-else class="text-xs text-gray-900 pr-2">&#8377;{{sproduct.price}}</span>
                            </div>
                        <div class="mt-2">
                            <a :href="'/product/'+sproduct.id+'/details'" class="overflow-hidden">
                                <button class="p-2 w-full font-bold bg-pink text-gray-800 text-xs tracking-widest">VIEW</button>
                            </a>
                        </div>  
                    </div>
               </div>
           </div> 
    </app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Inertia } from '@inertiajs/inertia';
import axios from 'axios';
 export default{
    props: ['product'],
    components:
    {
        AppLayout
    },
    data() {
        return {
            quantityPop: false,
            sIndex: 0,
            form : this.$inertia.form({
                variant: '',
                quantity : 1,
            }),
            products:[],
            qerror: '',
            currentImg:'',
            success : false,
            zoom:false,
        }
    },
    methods:
    {
        
        currentimg(img)
        {
            this.currentImg = img;
        },
        addtocart()
        {
            this.form.post('/cart/product/'+this.product.id+'/add', {
                onSuccess: () =>
                {
                    this.success = true;
                }
            })
        },
        buyNow()
        {
            this.form.get("/"+this.product.id+"/buynow");
        },
        setQuantity(q)
        {
            if(q == 'in')
            {
               if(this.form.variant)
               {
                    var index = this.product.variant.findIndex( el=> {
                        if(el.id == this.form.variant)
                        {
                            return true;
                        }
                    })
                    console.log(this.product.variant[index].quantity)
                    if(this.form.quantity == this.product.variant[index].quantity)
                    {
                        this.qerror = "max quantity exceeded!!";
                    }
                    else
                    {
                        if(this.form.quantity >= 6)
                        {
                            this.qerror = "max quantity exceeded!!";
                        }
                        else
                        {
                            this.form.quantity++;
                        }
                    }
               }
               else
               {
                   if(this.form.quantity == this.product.quantity)
                    {
                        this.qerror = "max quantity exceeded!!";
                    }
                    else
                    {
                        if(this.form.quantity >= 6)
                        {
                            this.qerror = "max quantity exceeded!!";
                        }
                        else
                        {
                            this.form.quantity++;
                        }
                    }
               }
            }
            else
            {
                 if(this.form.quantity <= 1)
                {
                    this.qerror = "min quantity exceeded!!";
                }
                else
                {
                    this.form.quantity--;
                }
            }
        }
    },
    computed:{
        check(){
            if(this.form.variant)
            {
                var index = this.product.variant.findIndex(el =>{
                    if(el.id == this.form.variant)
                    {
                        return true;
                    }
                })
                if(this.product.variant[index].quantity <= 0)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                if(this.product.quantity <= 0)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            
           
        },
    },
    mounted() {
        this.currentImg = this.product.image[0].link;
        if(this.product.variant[0])
        {
            this.form.variant = this.product.variant[0].id;
        }
        axios.get('/products/related', {params: {'id': this.product.id,'brand_id': this.product.brand_id, 'category_id': this.product.category_id}})
        .then(res => this.products = res.data);
    },
}
</script>
