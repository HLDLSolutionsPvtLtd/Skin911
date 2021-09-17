<template>
    <app-layout title="Dashboard">
       <div class="m-2">
           <div class="h-1/3">
                <div class="carousel ">
                    <transition-group class="carousel" name="fade" tag="div">
                        <div class="w-full h-full" @touchstart="touchstart($event)" @touchend="touchend($event)" v-for="i in [currentIndex]" :key="i">
                            <img :class="{'slide-in':slidein,'slide-out':slideout}" :src="currentImg" class="w-full pl-4 pr-4 h-full transition-transform ease-in-out duration-700" />
                        </div>
                    </transition-group> 
                    
                </div>
                <div class="relative">
                    <ul class="absolute bottom-1 dots">
                        <li :class="{liactive : currentIndex === image.id}" 
                            v-for="image in images" 
                            :key="image.id"
                            @click="jump(image.id)">
                        </li>
                    </ul>
                </div>
           </div>
           <div class="p-12 bg-yellow-100">
               <div class="flex justify-center m-4">
                   <span class="col-span-3 text-4xl font-bold text-gray-700">TO SKIN CARE GOALS AND BEYOND</span>
               </div>
               <div class="flex justify-center m-4">
                   <span class="text-xl font-thin w-3/5 text-gray-500 text-center leading-loose">
                       Begin your skincare journey confidently and shop from the best curated K-Beauty innovations With Skin 911. Every good decision counts.
                   </span>
               </div>
           </div>

           <div class="bg-blue-200">
               <div class="flex justify-center">
                   <ul class="flex text-lg font-semibold text-gray-500">
                       <li class="m-2">SHOP BY SKINCARE</li>
                       <li class="m-2">SHOP BY SKINTYPE</li>
                       <li class="m-2">SHOP BY ROUTINE</li>
                       <li class="m-2">SHOP BY BESTSELLER</li>
                   </ul>
               </div>
               <div class="grid grid-cols-6 p-16">
                    <div class="p-1 border border-gray-100" v-for="image in images" :key="image">
                        <div class="">
                            <a href="/ProductDetail" class="overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" :src="image.img" alt="">
                            </div>
                            </a>
                            <div class="">
                                <button class="p-2 w-full bg-pink text-pink-dark text-md">Add To Cart</button>
                            </div>
                        </div>  
                    </div>
               </div>
           </div> 
           <div class="p-16 bg-yellow-100">
               <div class="m-4 flex justify-center">
                   <span class="col-span-3 text-4xl font-bold text-gray-700">SHOP ALL</span>
               </div>
               <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4">
                    <div class="p-1 border border-gray-100" v-for="image in products" :key="image">
                        <div class="">
                            <a href="/ProductDetail" class="overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" :src="image.img" alt="">
                            </div>
                            </a>
                            <div class="">
                                <button class="p-2 w-full bg-pink text-pink-dark text-md">Add To Cart</button>
                            </div>
                        </div>  
                    </div>
                </div> 
                <div class="m-4 flex justify-center">
                    <button class="p-3 border-2 border-gray-900">VIEW ALL PRODUCTS</button>
                </div>
           </div>
           <div class="p-16 bg-blue-100">
               <div class="m-4 flex justify-center">
                   <span class="col-span-3 text-4xl font-bold text-gray-700">FEATURED BRANDS</span>
               </div>
               <div class="grid grid-cols-2 m-4 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4">
                    <div class="p-1 border border-gray-100" v-for="image in brands" :key="image">
                        <div class="">
                            <a href="/ProductDetail" class="overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" :src="image.img" alt="">
                            </div>
                            </a>
                            <div class="">
                                <button class="p-2 w-full bg-pink text-pink-dark text-md">EXPLORE</button>
                            </div>
                        </div>  
                    </div>
                </div> 
                <div class="m-4 flex justify-center">
                    <button class="p-3 border-2 border-gray-900">VIEW ALL FEATURED BRANDS</button>
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
                     {
                        id:4,
                        img:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ50FK7obnjKOi-tIj4f1pihzPg3Nmu9m_bXg&usqp=CAU',
                    },
                    {
                        id:5,
                        img:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXxqZf5Btz3rjG-3s5GizZXgLjr5I3iRaptQ&usqp=CAU',
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
