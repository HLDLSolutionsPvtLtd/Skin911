<template>
    <app-layout>
        <div class="flex justify-center w-full min-h-screen bg-white">
            <div class="w-full sm:m-0 sm:w-11/12 md:11/12 xl:w-10/12">
                <div class="sm:grid sm:grid-cols-6 m-2 sm:mt-12 mb-12">
                    <div class="hidden sm:block col-span-1 justify-end p-2">
                        <span class="text-md font-bold text-gray-700">Browse</span>
                        <div >
                            <div>
                                <span class="text-md font-semibold text-pink-dark">Brands</span>
                                <ul class="text-gray-500 font-semibold text-sm border-l p-2">
                                    <template v-for="brand in brands" :key="brand.id">
                                        <li class="p-1">{{brand.name}}</li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <span class="text-md font-semibold text-pink-dark">Product Type</span>
                            <div>
                                <ul class="text-gray-500 font-semibold text-sm border-l p-2">
                                    <template v-for="category in categories" :key="category.id">
                                        <li class="p-1">{{category.name}}</li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-5">
                        <div class="flex justify-between">
                            <span class="text-sm sm:text-lg text-gray-600 font-bold p-2">Products</span>
                            <div class="hidden sm:flex bg-white border border-gray-200 rounded-sm">
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
                        <div class="w-full grid grid-cols-2 sm:grid-cols-4">
                            <div class="p-1 border border-gray-100 mt-2" v-for="product in products" :key="product">
                                    <div class="">
                                        <a :href="'/product/'+product.id+'/details'" class="overflow-hidden">
                                            <div class="relative pb-48 overflow-hidden">
                                                <img class="absolute inset-0 h-full w-full object-cover" :src="'/storage/'+product.image[0].link" alt="">
                                            </div>
                                        </a>
                                        <div class="px-2">
                                            <span class="text-sm text-gray-600 font-bold tracking-wide">{{product.name}}</span>
                                        </div>
                                        <div class="px-2">
                                            <span class="italic text-sm text-gray-600 tracking-wide font-thin">{{product.description}}</span>
                                        </div>
                                        <div class="px-2">
                                            <span class="line-through text-xs text-gray-300 pr-2">&#8377;5000</span>
                                            <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price}}</span>
                                        </div>
                                        <div class="mt-2">
                                            <button class="p-2 w-full font-bold bg-pink text-gray-800 text-xs tracking-widest">VIEW</button>
                                        </div>
                                    </div>  
                                </div>
                        </div>
                        <div class="w-full flex self-center mt-2 justify-center bg-gray-400 h-8 ">
                            <ul class="flex self-center m-1 p-1">
                                <li class="bg-gray-200 p-1 m-1">1</li>
                                <li class="bg-gray-200 p-1 m-1">2</li>
                                <li class="bg-gray-200 p-1 m-1">3</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="fixed bottom-0 bg-white border-t w-full flex">
                        <div class="flex flex-1 justify-center items-center">
                            <button @click="sort=!sort" class="p-3 text-sm tracking-wider text-gray-500 font-semibold">SORT</button>
                        </div>
                        <div class="flex flex-1 items-center justify-center">
                            <button @click="filter=!filter" class="p-3 text-sm tracking-wider text-gray-500 font-semibold">FILTER</button>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div v-show="sort" class="fixed bottom-0 bg-white shadow-lg border-t w-full flex">
                        <div class="m-2 w-full">
                            <div class="border-b p-2 w-full flex justify-between">
                                <span class="text-gray-400 font-semibold text-sm">SORT BY</span>
                                <div>
                                    <span @click="sort=!sort" class="text-gray-400 cursor-pointer font-semibold text-sm">CLOSE</span>
                                </div>
                            </div>
                            <div class="p-2">
                                <ul class="text-sm tracking-wider font-semibold text-gray-500">
                                    <li class="py-1">Name A-Z</li>
                                    <li class="py-1">Name Z-A</li>
                                    <li class="py-1">Price Low-High</li>
                                    <li class="py-1">Price High-Low</li>
                                    <li class="py-1">Latest</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div v-show="filter" class="fixed h-full z-50 bottom-0 bg-white shadow-xl border-t w-full flex">
                        <div class="m-2 w-full">
                            <div class="border-b p-2 w-full flex justify-between">
                                <span class="text-gray-400 font-semibold text-sm">FILTERS</span>
                                <div>
                                    <span @click="filter=!filter" class="text-gray-400 cursor-pointer font-semibold text-sm">CLOSE</span>
                                </div>
                            </div>
                            <div  class="flex">
                                <div class="w-1/2 text-sm text-gray-500 font-semibold tracking-widest">
                                    <div @click="filters = 'brands'" :class="{'bg-gray-100 text-gray-600':filters == 'brands'}" class="p-2 w-full cursor-pointer">
                                        <span class="">Brands</span>
                                    </div>
                                     <div @click="filters = 'categories'" :class="{'bg-gray-100 text-gray-600':filters == 'categories'}" class="p-2 w-full cursor-pointer">
                                        <span>Categories</span>
                                    </div>
                                </div>
                                <div class="w-1/2 h-screen text-sm pb-12 bg-gray-100 overflow-y-scroll pl-4">
                                   <ul v-show="filters == 'categories'" class="overflow-y-scroll" >
                                        <template v-for="brand in brands" class="" :key="brand.id">
                                            <li class="p-1 mt-2 list-none">{{brand.name}}</li>
                                        </template>
                                        
                                   </ul>
                                   <ul v-show="filters == 'brands'">
                                       <template v-for="category in categories" :key="category.id">
                                            <li class="p-1 mt-2 list-none">{{category.name}}</li>
                                        </template>
                                   </ul>
                                </div>
                            
                            </div>
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
                sort: false,
                filter: false,
                filters: 'brands',
                products: [],
                brands: [],
                categories: []
            }
        },
    mounted() {
        axios.get('/products/all')
        .then(res => this.products = res.data);
        axios.get('/brands/all')
        .then(res => this.brands = res.data);
        axios.get('/categories/all')
        .then(res => this.categories = res.data);
    },

}
</script>
