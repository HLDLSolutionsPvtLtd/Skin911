<template>
    <app-layout title="Dashboard">
        <div class="flex justify-center relative">
            <div v-show="success" class="fixed w-full z-50 transform shadow-lg sm:w-1/4 top-1/4">
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
           <div class="h-1/3 m-4">
                <div class="carousel">
                    <transition-group class="carousel" name="fade" tag="div">
                        <div class="w-full h-full" @touchstart="touchstart($event)" @touchend="touchend($event)" v-for="i in [currentIndex]" :key="i">
                            <img :class="{'slide-in':slidein,'slide-out':slideout}" :src="'/storage/'+currentImg" class="w-full h-full transition-transform ease-in-out duration-700" />
                        </div>
                    </transition-group> 
                </div>
                <div class="relative">
                    <ul class="absolute bottom-2 dots">
                        <li :class="{liactive : currentIndex === index}" 
                            v-for="(banner, index) in banners" 
                            :key="banner.id"
                            @click="jump(banner.id)">
                        </li>
                    </ul>
                </div>
           </div>

           <div class="md:mx-4 md:my-12 mt-2">
               <div class="flex justify-center">
                   <span class="text-gray-700 p-2 mt-4 font-bold sm:text-3xl">TOP SELLING PRODUCTS</span>
               </div>
               <div class="overflow-y-hidden whitespace-nowrap no-scrollbar p-2 overflow-x-scroll sm:overflow-x-hidden sm:grid sm:grid-cols-6  md:px-4">
                    <div class="border w-5/12 sm:w-auto mr-1 inline-block border-gray-100" v-for="tproduct in topselling" :key="tproduct">
                        <div class="">
                            <a :href="'/product/'+tproduct.id+'/details'" class="overflow-hidden relative">
                                <div class="relative pb-48 overflow-hidden">
                                    <img class="absolute inset-0 h-full w-full object-cover" :src="'/storage/'+tproduct.image[0].link" alt="">
                                </div>
                                <div class="absolute ribbon top-4 left-0">
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
                            <div class="px-2">
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
                            <button @click="addToCart(tproduct.id)" class="p-2 w-full font-bold bg-pink text-gray-800 text-xs tracking-widest">ADD TO CART</button>
                        </div> 
                        <div v-else class="mt-2">
                            <a :href="'/product/'+tproduct.id+'/details'">
                                <button class="p-2 w-full font-bold bg-pink text-gray-800 text-xs tracking-widest">VIEW</button>
                            </a>
                        </div>
                    </div>
               </div>
           </div> 

           <div class="md:p-12 md:my-12 bg-yellow-100">
               <div class="flex justify-center m-4">
                   <span class="col-span-3 text-lg tracking-wider sm:text-4xl text-center p-2 font-bold text-gray-700">TO SKIN CARE GOALS AND BEYOND</span>
               </div>
               <div class="flex justify-center m-4">
                   <span class="text-sm sm:text-lg font-thin w-3/5 text-gray-500 text-center leading-loose">
                       Begin your skincare journey confidently and shop from the best curated K-Beauty innovations With Skin 911. Every good decision counts.
                   </span>
               </div>
           </div>

           
           <div class="sm:p-16 p-1 sm:my-12 sm:mx-24">
               <div class="m-4 flex justify-center">
                   <span class="col-span-3 sm:text-4xl font-bold text-gray-700">SHOP ALL</span>
               </div>
               <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4">
                    <div class="p-1 border-gray-100" v-for="nproduct in products" :key="nproduct">
                        <div class="">
                            <a href="/ProductDetail" class="overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" :src="nproduct.img" alt="">
                            </div>
                            </a>
                            <div class="">
                                <button class="p-2 w-full bg-pink text-pink-dark text-xs font-bold tracking-wider">ADD TO CART</button>
                            </div>
                        </div>  
                    </div>
                </div> 
                <div class="m-4 flex justify-center">
                    <button class="sm:p-2 p-1 text-xs font-bold tracking-wider sm:text-sm border-2 border-gray-900">VIEW ALL PRODUCTS</button>
                </div>
           </div>
           <div class="sm:p-16 p-1 mt-2 sm:my-12 sm:mx-24">
               <div class="flex justify-center">
                   <span class="col-span-3 text-center sm:text-4xl font-bold text-gray-700">FEATURED BRANDS</span>
               </div>
               <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4">
                    <div class="m-2 border" v-for="brand in brands" :key="brand">
                        <div class="">
                            <a :href="'/products?key='+brand.name" >
                                <div>
                                    <img class="w-full" :src="'/storage/'+brand.img" alt="">
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
                    <a href="/view/brands" class="sm:p-2 p-2 text-sm font-bold border rounded-md text-gray-600 border-gray-400">VIEW ALL FEATURED BRANDS</a>
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
                slidein: false,
                slideout:false,
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
                images:[
                    {
                        id:0,
                        img:'https://cdn.nrf.com/sites/default/files/styles/crop_1027_547/public/2020-09/mens%20cosmetics.png?itok=7EAMtlgNhttps://beautybarn.in/product/mandelic-acid-5-skin-prep-water/',
                    },
                    {
                        id:1,
                        img:'https://www.ics-world.com/wp-content/uploads/2021/03/Sustainable-2.jpg',
                    },
                    {
                        id:2,
                        img:'https://cdn.shopify.com/s/files/1/1280/5953/files/Blog-1-UPDATED_1024x1024.jpg?v=1520984057',
                    },
                    {
                        id:3,
                        img:'https://www.kingdomofbeauty.co/wp-content/uploads/2019/02/1.jpg',
                    },
                     {
                        id:4,
                        img:'https://www.harrods.com/BWStaticContent/50000/ba521560-2bbd-41d8-b3bc-382e7fae0dbd_d-hero-new-helena-rubenstein-08-21.jpg',
                    },
                    {
                        id:5,
                        img:'https://cdn-a.william-reed.com/var/wrbm_gb_food_pharma/storage/images/publications/cosmetics/cosmeticsdesign-europe.com/article/2020/01/22/male-beauty-brand-war-paint-wants-to-overhaul-stigma-and-mainstream-make-up-for-men/10622219-7-eng-GB/Male-beauty-brand-War-Paint-wants-to-overhaul-stigma-and-mainstream-make-up-for-men.jpg',
                    },
                    
                ],
                products:[
                    {
                        id:0,
                        img:'https://cdsco.gov.in/opencms/export/system/modules/CDSCO.WEB/resources/img/slider/cosmetic4.jpg',
                    },
                    {
                        id:1,
                        img:'https://www.ics-world.com/wp-content/uploads/2021/03/Sustainable-2.jpg',
                    },
                    {
                        id:2,
                        img:'https://imgscf.slidemembers.com/docs/1/1/334/natural_cosmetic_presentation_ppt_333010.jpg',
                    },
                    {
                        id:3,
                        img:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfz8UYc1CQyXKs1tRDEj8i_fDGLUPCqSSuFg&usqp=CAU',
                    },
                    
                ],
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
                this.currentImg =  this.banners[Math.abs(this.currentIndex)% this.banners.length].image;
            }
        },
        mounted: function() {
            this.startSlide();
            axios.get('/banner/all')
            .then(res => this.banners = res.data);
            axios.get('/topselling')
            .then(res => this.topselling = res.data);
            axios.get('/newarrivals')
            .then(res => this.newarrivals = res.data);
             axios.get('/brands/all')
            .then(res => this.brands = res.data);
        },
    })
</script>
