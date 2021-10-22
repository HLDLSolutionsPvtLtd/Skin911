<template>
    <app-layout>
        <div class="w-full flex justify-center">
            <div class="w-10/12 m-2">
                <div class="w-full m-2 border">
                    <div class="flex w-full bg-white shadow-md justify-center">
                        <span class="text-md text-pink-dark p-2">CART</span>
                    </div>
                </div>
                <div class="grid grid-cols-5 m-2 ">
                    <div class="col-span-3 mr-8">
                        <div v-for="product in products" :key="product">
                            <!-- <div class="flex bg-g text-center self-center p-1   ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="39.855" height="34.257" viewBox="0 0 47.855 30.257">
                                    <path id="box" d="M13.468,1022.923h0a.616.616,0,0,0-.2.05l-12.9,5.6a.615.615,0,0,0-.118,1.061l5.534,4.023-5.534,4.023a.615.615,0,0,0,.118,1.062l5.779,2.51v9.012a1.258,1.258,0,0,0,.382.848l12.891,5.5a.6.6,0,0,0,.077.023h.017l.024.012.048.012H19.6a.617.617,0,0,0,.12,0l.053-.012H19.8l.046-.012.058-.02.024-.012,12.893-5.5a1.269,1.269,0,0,0,.382-.848v-9.065l5.779-2.51a.615.615,0,0,0,.118-1.059l-5.748-4.179,0-.012,0-.012,5.188-3.771a.615.615,0,0,0-.118-1.062l-12.9-5.6a.606.606,0,0,0-.608.065l-5.5,4-5.534-4.023a.615.615,0,0,0-.406-.118Zm-.031,1.321,5.022,3.653L6.8,1032.881l-4.955-3.6,11.589-5.034Zm11.913.02,11.589,5.034-4.729,3.437-11.656-4.984,4.8-3.488Zm-5.673,4.451,11.534,4.933-11.534,4.933-3.713-1.588-4.768-2.037-3.06-1.309,11.541-4.933Zm12.893,5.692,4.936,3.589-11.589,5.034-5.005-3.639Zm-25.741.02,3.884,1.66,4.768,2.039,3,1.285-5.046,3.67-11.589-5.034,4.981-3.62Zm13.462,6.033,5.188,3.771a.615.615,0,0,0,.605.068l5.889-2.558v8.4l-11.683,4.986V1040.46Zm-1.23.048v14.62L7.38,1050.141v-8.351l5.889,2.558a.614.614,0,0,0,.605-.068l5.188-3.773Zm6.118,6.812h-.007a.618.618,0,0,0-.219.053l-3.271,1.4a.615.615,0,1,0,.485,1.131l3.269-1.4a.615.615,0,0,0-.257-1.186Zm3.269.838h-.007a.615.615,0,0,0-.219.052l-3.269,1.4-3.271,1.4a.615.615,0,1,0,.485,1.129l3.269-1.4,3.269-1.4a.615.615,0,0,0-.257-1.187Z" transform="translate(0.251 -1022.659)" fill="#fff" stroke="#fff" stroke-width="0.5" fill-rule="evenodd"/>
                                </svg>
                                <span class="text-xs text-white text-center self-center font-bold ml-2">Delivered On Monday,16 October 2021</span>
                            </div> -->
                            <div class="flex justify-between bg-white border mb-2">
                                <div class="flex p-1">
                                    <img :src="product.img" alt="" class="w-24 h-24 self-center ">
                                    <div class="flex m-4 text-gray-700 text-sm font-sans text-thin self-center">
                                        <div class="p-2">
                                            <div class="p-1">
                                                <span>{{product.name}}</span>
                                            </div>
                                            <span class="p-1 font-semibold">&#8377; 1231</span>
                                            <div class="p-1 my-1 text-xs font-bold">
                                                <div>
                                                    <span class="p-1 border bg-gray-400">&#8722;</span>
                                                    <span class="p-1 border bg-gray-400">1</span>
                                                    <span class="p-1 border bg-gray-400">&#x2B;</span>
                                                </div>
                                            </div>
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