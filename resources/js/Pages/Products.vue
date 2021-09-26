<template>
    <app-layout>
        <div class="flex justify-center w-full  bg-white">
            <div class="sm:w-11/12 md:11/12 xl:w-10/12">
                <div class="grid grid-cols-6 mt-12 mb-12">
                    <div class="col-span-1 justify-end p-2">
                        <span class="text-md font-bold text-gray-700">Browse</span>
                        <div >
                            <div>
                                <span class="text-md font-semibold text-pink-dark">Brands</span>
                                <ul class="text-gray-500 font-semibold text-sm border-l p-2">
                                    <li class="p-1">3ce</li>
                                    <li class="p-1">Acwell</li>
                                    <li class="p-1">Benton</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <span class="text-md font-semibold text-pink-dark">Product Type</span>
                            <div>
                                <ul class="text-gray-500 font-semibold text-sm border-l p-2">
                                    <li class="p-1">Toner</li>
                                    <li class="p-1">Exfoliator</li>
                                    <li class="p-1">Cleanser</li>
                                    <li class="p-1">Eye care</li>
                                    <li class="p-1">Cream</li>
                                    <li class="p-1">Eye Cream</li>
                                    <li class="p-1"></li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                    <li class="p-1">Cosrx</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-5">
                        <div class="flex justify-between">
                            <span class="text-lg text-gray-700 font-bold p-2">Products</span>
                            <div class="flex bg-white border border-gray-200 rounded-sm bg-white">
                                <div class="text-sm text-gray-700">
                                    <select name="" id="" value="" class="border-0 placeholder-gray-700 text-sm focus:ring-0">
                                        <option value="" disabled selected>SORT BY</option>
                                        <option value="">Name A-Z</option>
                                        <option value="">Name Z-A</option>
                                        <option value="">Price Low-High</option>
                                        <option value="">Price High-Low</option>
                                        <option value="">Latest</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="w-full grid grid-cols-4 m-2">
                            <div class="p-1 border border-gray-100" v-for="image in products" :key="image">
                                    <div class="">
                                        <a href="/product" class="overflow-hidden">
                                            <div class="relative pb-48 overflow-hidden">
                                                <img class="absolute inset-0 h-full w-full object-cover" :src="image.img" alt="">
                                            </div>
                                        </a>
                                        <div class="p-2">
                                            <span class="font-serif text-sm text-gray-900 font-thin">Example Description</span>
                                        </div>
                                        <div class="p-2">
                                            <span class="line-through text-sm text-gray-500 pr-2">$5000</span>
                                            <span class="text-sm">$2323</span>
                                        </div>
                                        <div class="mt-2">
                                            <button class="p-2 w-full bg-pink text-pink-dark text-md">Add To Cart</button>
                                        </div>
                                    </div>  
                                </div>
                        </div>
                        <div class="w-full bg-gray-400 h-8 ml-2 mr-2">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
export default{
    components:
    {
        AppLayout
    },

    data()
        {
            return{
                products:
                [
                    {
                        img:'https://beautybarn.in/wp-content/uploads/2021/08/Offer-Green-Peace-Trio-1.jpg'
                    },
                     {
                        img:'https://beautybarn.in/wp-content/uploads/2021/09/Mini-Set-600x800.jpg'
                    },
                     {
                        img:'https://beautybarn.in/wp-content/uploads/2021/08/Offer-Fantastic-4-Brightening-Set-1.jpg'
                    },
                     {
                        img:'https://beautybarn.in/wp-content/uploads/2021/08/Offer-Anti-aging-Brightening-Powerhouse-Duo-1.jpg'
                    },
                     {
                        img:'https://beautybarn.in/wp-content/uploads/2021/08/Play-Color-Eye-Palette-Rose-Bomb.jpg'
                    },
                     {
                        img:'https://beautybarn.in/wp-content/uploads/2021/08/Vitamin-C-Brightening-Serum-30ml.jpg'
                    },
                     {
                        img:'https://beautybarn.in/wp-content/uploads/2021/08/Vitamin-C-Brightening-Serum-30ml.jpg'
                    },
                     {
                        img:'https://beautybarn.in/wp-content/uploads/2021/08/Offer-Calm-Brightening-Duo-1.jpg'
                    },
                     {
                        img:'https://beautybarn.in/wp-content/uploads/2021/08/Offer-Mist-er-Brightside-Duo-1.jpg'
                    },
                     {
                        img:'https://beautybarn.in/wp-content/uploads/2021/08/Deep-Green-Cleansing-Foam-120g.jpg'
                    },
                     {
                        img:'https://beautybarn.in/wp-content/uploads/2021/08/Offer-RefreshingGlow-Mini-Hydrators.jpg'
                    },
                     {
                        img:'https://beautybarn.in/wp-content/uploads/2021/06/Smoothing-Lip-Tint-HAVE-A-BLAST-WITH-MODEL.jpg'
                    },
                     {
                        img:'https://beautybarn.in/wp-content/uploads/2021/07/Etude-House-Soon-Jung-10-Panthenososide-Cica-Ballm-50ml.jpg'
                    },
                     {
                        img:'https://beautybarn.in/wp-content/uploads/2021/06/MOOD-RECIPE-LIP-COLOR-220-HIT-ME-UP-WITH-MODEL.jpg'
                    },
                    {
                        img:'https://beautybarn.in/wp-content/uploads/2019/07/VELVET-LIP-TINT-KNOW-BETTER-WITH-MODEL.jpg'
                    },
                    {
                        img:'https://beautybarn.in/wp-content/uploads/2020/10/LIP-COLOR-MATTE231-BAKED-ORANGE-with-model.jpg'
                    }
                ]
            }
        }

}
</script>
