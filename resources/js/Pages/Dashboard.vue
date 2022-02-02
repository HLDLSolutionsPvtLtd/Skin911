<template>
    <app-layout title="Dashboard">
       <div class="bg-white">
           <div class="h-1/3 m-4">
                <div class="carousel">
                    <transition-group class="carousel" name="fade" tag="div">
                        <div class="w-full h-full" @touchstart="touchstart($event)" @touchend="touchend($event)" v-for="i in [currentIndex]" :key="i">
                            <img :class="{'slide-in':slidein,'slide-out':slideout}" :src="currentImg" class="w-full h-full transition-transform ease-in-out duration-700" />
                        </div>
                    </transition-group> 
                    
                </div>
                <div class="relative">
                    <ul class="absolute bottom-2 dots">
                        <li :class="{liactive : currentIndex === image.id}" 
                            v-for="image in images" 
                            :key="image.id"
                            @click="jump(image.id)">
                        </li>
                    </ul>
                </div>
           </div>

           <div class="md:mx-4 md:my-12 mt-2">
               <div class="flex justify-start sm:justify-center">
                   <span class="text-gray-700 p-2 mt-4 font-bold sm:text-4xl">TRENDING</span>
               </div>
               <div class="overflow-y-hidden whitespace-nowrap no-scrollbar p-2 overflow-x-scroll sm:overflow-x-hidden sm:grid sm:grid-cols-6 md:mx-12 md:px-4">
                    <div class="border w-5/12 sm:w-auto mr-1 inline-block border-gray-100" v-for="image in images" :key="image">
                        <div class="">
                            <a href="/ProductDetail" class="overflow-hidden">
                                <div class="relative pb-48 overflow-hidden">
                                    <img class="absolute inset-0 h-full w-full object-cover" :src="image.img" alt="">
                                </div>
                            </a>
                            <div class="">
                                <button class="p-2 w-full bg-pink text-white text-sm font-bold tracking-wide">ADD TO CART</button>
                            </div>
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
                    <div class="p-1 border-gray-100" v-for="image in products" :key="image">
                        <div class="">
                            <a href="/ProductDetail" class="overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" :src="image.img" alt="">
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
                    <div class="p-1" v-for="image in brands" :key="image">
                        <div class="">
                            <a href="/ProductDetail" class="overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" :src="image.img" alt="">
                            </div>
                            </a>
                            <div class="">
                                <button class="p-2 w-full bg-pink text-pink-dark text-xs font-bold">EXPLORE</button>
                            </div>
                        </div>  
                    </div>
                </div> 
                <div class="m-4 flex justify-center sm:my-12 sm:mx-24">
                    <button class="sm:p-2 p-2 text-xs font-bold border-2 border-gray-900">VIEW ALL FEATURED BRANDS</button>
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
                slidein: false,
                slideout:false,
                ouchstartX : 0,
                touchendX : 0,
                currentIndex: 0,
                timer: null,
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
                brands:[
                    {
                        id:0,
                        img:'https://i.pinimg.com/originals/66/70/e3/6670e3d671398b842511a522ae879a0a.png',
                    },
                    {
                        id:1,
                        img:'https://www.dior.com/couture/var/dior/storage/images/horizon/logo-dior/25334685-1-fre-FR/logo-dior_mobile_share.jpg',
                    },
                    {
                        id:2,
                        img:'https://thumbs.dreamstime.com/b/logo-mac-cosmetics-201939806.jpg',
                    },
                    {
                        id:3,
                        img:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2-2Y25e11r4cuXrN0GUHrtf8z54JwsJe-oA&usqp=CAU',
                    },
                    
                ]
            }
        },
         methods: {

            startSlide: function() {
                this.timer = setInterval(this.next, 4000);
            },
            jump: function(index){
                clearInterval(this.timer);
                this.currentIndex = index;
                this.startSlide();
            },
            next: function() {
                if(this.currentIndex == this.images.length-1)
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
                    this.currentIndex = this.images.length-1;
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
       computed: {
            currentImg: function() {
            return this.images[Math.abs(this.currentIndex) % this.images.length].img;
            }
        },
        mounted: function() {
            this.startSlide();
        },
    })
</script>
