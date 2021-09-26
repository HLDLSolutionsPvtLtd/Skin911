<template>
    <app-layout>
        <div class="w-full flex justify-center">
            <div class="w-10/12 m-2">
                <div class="w-full m-2 border">
                    <div class="flex w-full justify-center">
                        <span class="text-md text-pink-dark p-2">CART</span>
                    </div>
                </div>
                <div class="grid grid-cols-5 m-2 ">
                    <div class="col-span-3 mr-8">
                        <div v-for="product in products" :key="product" class="flex justify-between bg-white border mb-2">
                            <div class="flex p-1">
                                <img :src="product.img" alt="" class="w-24 h-24 self-center ">
                                <div class="flex m-4 text-gray-700 text-sm font-sans text-thin self-center">
                                    <div class="p-2">
                                        <div class="p-1">
                                            <span>{{product.name}}</span>
                                        </div>
                                        <span class="p-1">&#8377;1231</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex p-2 m-1">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="self-center fill-current cursor-pointer hover:text-black text-gray-400" width="18" height="18" viewBox="0 0 24 24">
                                        <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 16.538l-4.592-4.548 4.546-4.587-1.416-1.403-4.545 4.589-4.588-4.543-1.405 1.405 4.593 4.552-4.547 4.592 1.405 1.405 4.555-4.596 4.591 4.55 1.403-1.416z"/>
                                    </svg>
                                </div>
                            </div>
                            
                        </div>
                        <div class="w-full">

                        </div>
                    </div>
                    <div class="col-span-2 ml-8">
                        <div class="border bg-white">
                            <div class="m-4 ">
                                <div class="flex border-b p-4 justify-between">
                                    <span>Subtotal</span>
                                    <span>&#8377; 4006</span>
                                </div>
                                <div class="flex border-b p-4 justify-between">
                                    <span>5 ITEMS</span>
                                </div>
                                <div class="flex border-b p-4 justify-between">
                                    <span>Shipping fee</span>
                                    <span>&#8377; 150</span>
                                </div>
                                <div class="flex p-4 justify-between">
                                    <span>Total </span>
                                    <span>&#8377; 4156</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-2">
                            <button class="p-2 bg-pink rounded-sm w-full text-pink-dark">PROCEED TO CHECKOUT</button>
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
            products:[
                    {
                        id:0,
                        name:'Dear Klairs Supple Preparation Unscented Toner Mini 30ml',
                        img:'https://cdsco.gov.in/opencms/export/system/modules/CDSCO.WEB/resources/img/slider/cosmetic4.jpg',
                    },
                    {
                        id:1,
                        name:'Dear Klairs Supple Preparation Unscented Toner Mini 30ml',
                        img:'https://www.ics-world.com/wp-content/uploads/2021/03/Sustainable-2.jpg',
                    },
                    {
                        id:2,
                        name:'Dear Klairs Supple Preparation Unscented Toner Mini 30ml',
                        img:'https://imgscf.slidemembers.com/docs/1/1/334/natural_cosmetic_presentation_ppt_333010.jpg',
                    },
                    {
                        id:3,
                        name:'Dear Klairs Supple Preparation Unscented Toner Mini 30ml',
                        img:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfz8UYc1CQyXKs1tRDEj8i_fDGLUPCqSSuFg&usqp=CAU',
                    },
                    
                ],
        }
    }

}
</script>