<template>
    <app-layout title="Dashboard">
        <div class="flex justify-center relative">
            <div v-show="success" class="modal z-50 w-5/6 md:w-1/4" id="modal">
               <div class="js-container container" style="top:0px !important;"></div>
                <div class='modal__container shadow-md border bg-white'>
                                        
                    <div class="modal__content flex flex-col items-center justify-center pt-6 relative">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102" viewBox="0 0 24 24"  class="absolute -top-20 right-1/4 fill-current transition transform translate-Y-60 duration-700 text-blue-400 rounded-full p-0 bg-white">
                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.959 17l-4.5-4.319 1.395-1.435 3.08 2.937 7.021-7.183 1.422 1.409-8.418 8.591z"/>
                        </svg> -->
                        <p class="text-black text-sm tracking-wider font-bold text-center w-full">PRODUCT WAS SUCCESSFULLY ADDED TO YOUR CART</p>
                        <a href="/cart">
                            <button class="border border-black rounded-sm p-2 px-8 mt-4 tracking-widest font-bold text-black text-xs">VIEW CART</button>
                        </a>
                    </div>
                    
                    <i @click="success=!success" class="absolute  right-4 top-4 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-800 hover:text-red-500" width="15" height="15" viewBox="0 0 24 24">
                            <path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/>
                        </svg>
                    </i>
                </div>
            </div>
            <div v-show="discount_popup" class="modal mx-2 bg-pink-900 sm:m-0 w-5/6 md:w-1/4 z-50" id="modal">
                <div class='bg-yellow-100 border shadow-lg p-4'>
                    
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ">
                            
                            <div class="flex text-pink-600 openSans flex-col items-center justify-center flex-1 ">
                                <span class="text-lg font-semibold tracking-wider mt-2 uppercase">{{Discount.name}}</span>
                                <p v-if="Discount.type == 'percentage'" class="text-xl tracking-wider font-semibold mt-2">UPTO</p>
                                <span class="text-4xl my-2 font-bold">{{Discount.amount}}<span class="pr-2 text-4xl" v-if="Discount.type == 'percentage'">%</span><span class="text-4xl"> OFF</span> </span>
                                <span class="text-lg font-semibold tracking-wider mt-2">ON SELECTED PRODUCTS</span>
                            </div>
                        </div>
                        <a :href="'/products?key='+Discount.name">
                            <button class="modal__button bg-transparent bg-pink-600 border border-pink-500 text-white text-xs font-semibold tracking-wider mt-4 uppercase">view products</button>
                        </a>
                    </div>
                    <div class="ribbon2 ribbon2-top-left">
                        <span>DISCOUNT</span>
                    </div>
                    <i @click="discount_popup=!discount_popup" class="absolute -right-5 rounded-full border p-1 border-gray-100 -top-5 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-100 hover:text-red-500" width="15" height="15" viewBox="0 0 24 24">
                            <path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/>
                        </svg>
                    </i>
                </div>
            </div>
            <div v-show="" class="fixed w-5/6 z-50 transform shadow-lg sm:w-1/4 top-1/4">
                <div class=" bg-white rounded-sm">
                    <div class="bg-pink-300 p-2 flex justify-center">
                        <div class="p-4 flex flex-col justify-center">
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 24 24"  class="fill-current transition transform translate-Y-60 duration-700 text-green-400">
                                    <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.959 17l-4.5-4.319 1.395-1.435 3.08 2.937 7.021-7.183 1.422 1.409-8.418 8.591z"/>
                                </svg>
                            </div>
                            <div class="mt-2">
                                <span class="font-bold text-md tracking-wider text-white">ADDED TO CART</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center m-2 p-2">
                        <button @click="success=!success" class="p-2 bg-pink-300 rounded-md font-bold tracking-wider text-white">OK</button>
                    </div>
                </div>
                
            </div>
        </div>
       <div class="bg-white">
           <div class="relative h-full">
                 <!-- <div class="absolute z-30 top-1/2 left-1/4">
                    <span class="text-lg uppercase ">{{this.currentImg.description}}</span>
                </div>   -->
                <div class="">
                       
                    <transition-group style="" class="carousel h-[calc(100vh-350px)] sm:h-screen" name="fade" tag="div">
                        <div class="w-full h-full" @touchstart="touchstart($event)" @touchend="touchend($event)" v-for="i in [currentIndex]" :key="i">
                            <img @click="redirectTo()" :class="{'slide-in':slidein,'slide-out':slideout}" :src="'/storage/'+currentImg.image" class="w-full h-full transition-transform ease-in-out duration-700" />
                        </div>
                    </transition-group> 
                </div>
                <div class="relative">
                    
                    <ul class="absolute bottom-2 dots">
                        <li :class="{liactive : currentIndex === index}" 
                            v-for="(banner, index) in banners" 
                            :key="banner.id"
                            @click="jump(index)">
                        </li>
                    </ul>
                </div>
           </div>

           <div class="md:mx-4 md:my-12">
               <div class="flex justify-center">
                   <span class="text-gray-700 p-2 font-bold sm:text-3xl">TOP SELLING PRODUCTS</span>
               </div>
               <div class="overflow-y-hidden whitespace-nowrap no-scrollbar p-2 overflow-x-scroll sm:overflow-x-hidden sm:grid sm:grid-cols-6  md:px-4">
                    <div class="border w-7/12 sm:w-auto mr-1 inline-block border-gray-100" v-for="tproduct in topselling" :key="tproduct">
                        <div class="">
                            <a :href="'/product/'+tproduct.id+'/details'" class="overflow-hidden relative">
                                <div class="relative pb-48 overflow-hidden">
                                    <img  style="height:200px" class="absolute inset-0 h-full w-full object-cover" :src="'/storage/'+tproduct.image[0].link" alt="">
                                     <div v-if="tproduct.quantity <= 0 && !nproduct.variant[0]" class="absolute top-10 flex items-center justify-center w-full">
                                        <span class="text-xs rounded-md p-1 m-1 border text-pink-500 bg-white border-gray-100 tracking-wider my-3 font-serif">Out Of Stock</span>
                                    </div>
                                </div>
                                <div class="absolute top-5 left-0">
                                    <span v-if="tproduct.discounts[0]" class="flag-discount transform rotate-90">
                                        <template v-if="tproduct.discounts[0].type == 'percentage'">
                                            {{tproduct.discounts[0].amount}}%
                                        </template>
                                        <template v-else>
                                            -{{tproduct.discounts[0].amount}}
                                        </template>
                                    </span>
                                </div>
                               
                            </a>
                            <div class="px-2 pt-4">
                                <p class="text-sm w-full truncate overflow-hidden text-gray-600 font-bold tracking-wide">{{tproduct.name}}</p>
                            </div>
                            <!-- <div class="px-2">
                                <span class="italic text-sm text-gray-600 tracking-wide font-thin">{{tproduct.description}}</span>
                            </div> -->
                            <div class="px-2 h-6">
                                
                                <template v-if="tproduct.discounts[0]">
                                    <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{tproduct.price}}</span>
                                    <template v-if="tproduct.discounts[0].type == 'percentage'">
                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{tproduct.price - (tproduct.price * tproduct.discounts[0].amount / 100)}}</span>
                                    </template>
                                    <template v-else>
                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{tproduct.price - tproduct.discounts[0].amount}}</span>
                                    </template>
                                </template>
                                <span v-else class="text-xs text-gray-900 pr-2">&#8377;{{tproduct.price}}</span>
                            </div>
                            
                        </div>  
                        <div v-if="!tproduct.variant[0]" class="mt-2">
                            <button :disabled="tproduct.quantity <= 0" @click="addToCart(tproduct.id)" class="p-2 w-full font-bold bg-pink text-gray-800 text-xs tracking-widest">ADD TO CART</button>
                        </div> 
                        <div v-else class="mt-2">
                            <a :href="'/product/'+tproduct.id+'/details'">
                                <button class="p-2 w-full font-bold bg-pink text-gray-800 text-xs tracking-widest">VIEW</button>
                            </a>
                        </div>
                    </div>
               </div>
           </div> 

           <!-- <div class="md:p-12 md:my-12 bg-yellow-100">
               <div class="flex justify-center m-4">
                   <span class="col-span-3 text-lg tracking-wider sm:text-4xl text-center p-2 font-bold text-gray-700">TO SKIN CARE GOALS AND BEYOND</span>
               </div>
               <div class="flex justify-center m-4">
                   <span class="text-md my-2 mx-6 sm:text-lg font-thin  text-gray-500 text-center leading-loose">
                       Begin your skincare journey confidently and shop from the best curated K-Beauty innovations With Skin 911. Every good decision counts.
                   </span>
               </div>
           </div> -->

           
           <div class=" p-1 sm:my-12 sm:mx-4">
               <div class="m-4 flex justify-center">
                   <span class="col-span-3 sm:text-4xl font-bold text-gray-700">SHOP ALL</span>
               </div>
               <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8">
                    <div class="m-2 border border-gray-100" v-for="nproduct in products" :key="nproduct">
                        <div class="">
                            <a :href="'/product/'+nproduct.id+'/details'" class="overflow-hidden relative">
                                <div class="relative pb-48 overflow-hidden">
                                    <img  style="height:200px" class="absolute inset-0 h-full w-full object-cover" :src="'/storage/'+nproduct.image[0].link" alt="">
                                    <div v-if="nproduct.quantity <= 0 && !nproduct.variant[0]" class="absolute top-10 flex items-center justify-center w-full">
                                        <span class="text-xs rounded-md p-1 m-1 border text-pink-500 bg-white border-gray-100 tracking-wider my-3 font-serif">Out Of Stock</span>
                                    </div>
                                </div>
                                <div class="absolute top-5 left-0">
                                    <span v-if="nproduct.discounts[0]" class="flag-discount transform rotate-90">
                                        <template v-if="nproduct.discounts[0].type == 'percentage'">
                                            {{nproduct.discounts[0].amount}}%
                                        </template>
                                        <template v-else>
                                            -{{nproduct.discounts[0].amount}}
                                        </template>
                                    </span>
                                </div>
                            </a>
                            <div class="px-2 pt-4">
                                <p class="text-sm w-full truncate overflow-hidden text-gray-600 font-bold tracking-wide">{{nproduct.name}}</p>
                            </div>
                            <!-- <div class="px-2">
                                <span class="italic text-sm text-gray-600 tracking-wide font-thin">{{nproduct.description}}</span>
                            </div> -->
                            <div class="px-2 h-6">
                                
                                <template v-if="nproduct.discounts[0]">
                                    <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{nproduct.price}}</span>
                                    <template v-if="nproduct.discounts[0].type == 'percentage'">
                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{nproduct.price - (nproduct.price * nproduct.discounts[0].amount / 100)}}</span>
                                    </template>
                                    <template v-else>
                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{nproduct.price - nproduct.discounts[0].amount}}</span>
                                    </template>
                                </template>
                                <span v-else class="text-xs text-gray-900 pr-2">&#8377;{{nproduct.price}}</span>
                            </div>
                            
                            <div v-if="!nproduct.variant[0]" class="mt-2">
                                <button :disabled="nproduct.quantity <= 0" @click="addToCart(nproduct.id)" class="p-2 w-full font-bold bg-pink text-gray-800 text-xs tracking-widest">ADD TO CART</button>
                            </div> 
                            <div v-else class="mt-2">
                                <a :href="'/product/'+nproduct.id+'/details'">
                                    <button class="p-2 w-full font-bold bg-pink text-gray-800 text-xs tracking-widest">VIEW</button>
                                </a>
                            </div>
                        </div>  
                        
                    </div>
                </div> 
                <div class="m-4 flex justify-center">
                    <a href="/products">
                        <button class="sm:p-2 p-2 text-xs font-bold border tracking-widest rounded-sm text-gray-600 border-gray-300">VIEW ALL PRODUCTS</button>
                    </a>
                </div>
           </div>
           <div class=" p-1 mt-2 sm:my-12 sm:mx-4">
               <div class="flex justify-center">
                   <span class="col-span-3 text-center sm:text-4xl font-bold text-gray-700">FEATURED BRANDS</span>
               </div>
               <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 2xl:grid-cols-6 4xl:grid-cols-8">
                    <div class="m-2 border" v-for="brand in brands" :key="brand">
                        <div class="">
                            <a :href="'/products?key='+brand.name" >
                                <div>
                                    <img style="height:250px" class="w-full" :src="'/storage/'+brand.img" alt="">
                                </div>
                                <div class="flex justify-center">
                                    <span class="p-2 font-semibold text-gray-900 tracking-wider">{{brand.name}}</span>
                                </div>
                            </a>
                            <div class="">
                                <a :href="'/products?key='+brand.name" class="p-2 w-full flex justify-center bg-pink text-pink-dark text-xs font-bold">EXPLORE</a>
                            </div>
                        </div>  
                    </div>
                </div> 
                <div class="m-4 flex justify-center sm:my-12 sm:mx-24">
                    <a href="/view/brands" class="sm:p-2 p-2 text-xs font-bold border tracking-widest rounded-sm text-gray-600 border-gray-300">VIEW ALL FEATURED BRANDS</a>
                </div>
           </div>

           <div class="md:mx-4 md:my-12 mt-2">
               <div class="flex justify-center">
                   <span class="text-gray-700 p-2 mt-4 font-bold sm:text-3xl">NEW ARRIVALS</span>
               </div>
               <div class="overflow-y-hidden whitespace-nowrap no-scrollbar p-2 overflow-x-scroll sm:overflow-x-hidden sm:grid sm:grid-cols-6  md:px-4">
                    <div class="border w-5/12 sm:w-auto mr-1 inline-block border-gray-100" v-for="nproduct in newarrivals" :key="nproduct">
                        <div class="">
                            <a :href="'/product/'+nproduct.id+'/details'" class="overflow-hidden relative">
                                <div class="relative pb-48 overflow-hidden">
                                    <img class="absolute inset-0 h-full w-full object-cover" :src="'/storage/'+nproduct.image[0].link" alt="">
                                </div>
                                <div class="absolute ribbon top-4 left-0">
                                    <span v-if="nproduct.discounts[0]" class="flag-discount transform rotate-90">
                                        <template v-if="nproduct.discounts[0].type == 'percentage'">
                                            {{nproduct.discounts[0].amount}}%
                                        </template>
                                        <template v-else>
                                            -{{nproduct.discounts[0].amount}}
                                        </template>
                                    </span>
                                </div>
                            </a>
                            <div class="px-2 pt-4">
                                <p class="text-sm w-full truncate overflow-hidden text-gray-600 font-bold tracking-wide">{{nproduct.name}}</p>
                            </div>
                            <!-- <div class="px-2">
                                <span class="italic text-sm text-gray-600 tracking-wide font-thin">{{nproduct.description}}</span>
                            </div> -->
                            <div class="px-2 h-6">
                                
                                <template v-if="nproduct.discounts[0]">
                                    <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{nproduct.price}}</span>
                                    <template v-if="nproduct.discounts[0].type == 'percentage'">
                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{nproduct.price - (nproduct.price * nproduct.discounts[0].amount / 100)}}</span>
                                    </template>
                                    <template v-else>
                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{nproduct.price - nproduct.discounts[0].amount}}</span>
                                    </template>
                                </template>
                                <span v-else class="text-xs text-gray-900 pr-2">&#8377;{{nproduct.price}}</span>
                            </div>
                            
                        </div>  
                        <div v-if="!nproduct.variant[0]" class="mt-2">
                            <button @click="addToCart(nproduct.id)" class="p-2 w-full font-bold bg-pink text-gray-800 text-xs tracking-widest">ADD TO CART</button>
                        </div> 
                        <div v-else class="mt-2">
                            <a :href="'/product/'+nproduct.id+'/details'">
                                <button class="p-2 w-full font-bold bg-pink text-gray-800 text-xs tracking-widest">VIEW</button>
                            </a>
                        </div>
                    </div>
               </div>
           </div> 
       </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    
    export default defineComponent({
        components: {
            AppLayout,
        },
        data()
        {
            return{
                banners: [],
                Discount: '',
                discount_popup: false,
                slidein: false,
                slideout:false,
                currentImg:  {},
                ouchstartX : 0,
                touchendX : 0,
                currentIndex: 0,
                timer: null,
                popup:false,
                form: this.$inertia.form({
                    variant : '',
                    quantity : 1,
                }),
                topselling: [],
                newarrivals: [],
                brands: [],
                success: false,
                products:[],
                duration : 15 * 1000,
                animationEnd : Date.now() + this.duration,
                defaults : { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 },
                end : Date.now() + (15 * 1000),
                colors : ['#bb0000', '#ffffff']

            }
        },
         methods: {
            addToCart(id){
                this.form.post('/cart/product/'+id+'/add',
                {
                    preserveScroll: true,
                    onFinish: () =>  {
                        this.success = true;
                    }
                       
                })
            },
            startSlide: function() {
                this.timer = setInterval(this.next, 4000);
            },
            jump: function(index){
                clearInterval(this.timer);
                this.currentIndex = index;
                this.startSlide();
            },
            next: function() {
                if(this.currentIndex == this.banners.length-1)
                {
                    this.currentIndex = 0;
                    this.slideout = true;
                    setTimeout(this.sliderout, 500);
                    
                }
                else
                {
                    this.currentIndex += 1;
                     this.slideout = true;
                    setTimeout(this.sliderout, 500);
                    
                }
            },
            prev: function() {
                if(this.currentIndex == 0)
                {
                    this.currentIndex = this.banners.length-1;
                     this.slideout = true;
                    setTimeout(this.sliderout, 500);
                }
                else
                {
                    this.currentIndex -= 1;
                     this.slideout = true;
                    setTimeout(this.sliderout, 500);
                }
            },
            sliderin()
            {
                this.slidein = false;
            },
             sliderout()
            {
                this.slideout = false;
                this.slidein = true;
                setTimeout(this.sliderin, 500);
            },
            touchstart: function(e){
                this.touchstartX = e.changedTouches[0].screenX;
            },
            touchend: function(e){
                this.touchendX = e.changedTouches[0].screenX;
                if (this.touchendX < this.touchstartX)
                {
                    this.next();
                }
                if (this.touchendX > this.touchstartX)
                {
                    this.prev();
                }
                clearInterval(this.timer);
                this.startSlide();
            },
            redirectTo()
            {
                if(this.currentImg.type == 'single')
                {
                    this.$inertia.get('/product/'+this.currentImg.id);
                }
                else if(this.currentImg.type == 'multiple')
                {
                    this.$inertia.get('/products?key='+this.currentImg.key);
                }
            },
            randomInRange(min, max) {
                return Math.random() * (max - min) + min;
            },
            pops()
            {
                confetti({
                    particleCount: 200,
                    angle: 55,
                    spread: 62,
                    scalar: 0.5,
                    origin: { y: 0.6 },
                    colors: this.colors
                });
                confetti({
                    particleCount: 120,
                    angle: 125,
                    spread: 62,
                    scalar: 0.5,
                    origin: { y: 0.6 },
                    colors: this.colors
                });
            },
            showPopup(check)
            {
                
                console.log(check);
                 if(!check)
                 {
                     axios.get('/discount/get/random')
                    .then(res => this.Discount = res.data[0])
                    .then( ()=>{
                        if(this.Discount)
                        {
                             setTimeout(() =>{
                                this.discount_popup = true;
                                this.pops();
                                // setTimeout(() =>{
                                //     this.discount_popup = true;
                                //     this.pops();
                                //     this.pops();
                                // }, 1000) ;
                            }, 1000) ;

                            axios.post('/updatepop', {val : 'true'});
                        }
                    })
                
                 }
            },
            // mouseEnter: function(e)
            // {
            //     this.touchstartX = e.screenX;
            // },
            // mouseLeave: function(e){
            //     this.touchendX = e.screenX;
            //     if (this.touchendX < this.touchstartX)
            //     {
            //         this.next();
            //     }
            //     if (this.touchendX > this.touchstartX)
            //     {
            //         this.prev();
            //     }
            //     clearInterval(this.timer);
            //     this.startSlide();
            // }
        },

        watch: {
            currentIndex() {
                console.log( )
                this.currentImg =  this.banners[Math.abs(this.currentIndex)% this.banners.length];
            },
        },
        mounted: function() {
            this.startSlide();
            axios.get('/banner/all')
            .then(res => {
                this.banners = res.data;
                this.currentImg = this.banners[0]
            });
            axios.get('/checkpop')
            .then(res => this.showPopup(res.data));
            axios.get('/topselling')
            .then(res => this.topselling = res.data);

            axios.get('/newarrivals')
            .then(res => this.newarrivals = res.data);

             axios.get('/brands/all')
            .then(res => this.brands = res.data);

            axios.get('/products/shopall')
            .then(res => this.products = res.data);

        },
    })
</script>
