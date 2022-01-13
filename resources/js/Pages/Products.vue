<template>
    <app-layout>
        <div class="flex justify-center w-full min-h-screen bg-white">
            <div class="sm:w-11/12 md:11/12 xl:w-10/12">
                <div class="grid grid-cols-6 mt-12 mb-12">
                    <div class="col-span-1 justify-end p-2">
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
                    <div class="col-span-5">
                        <div class="flex justify-between">
                            <span class="text-lg text-gray-700 font-bold p-2">Products</span>
                            <div class="flex bg-white border border-gray-200 rounded-sm">
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
                            <div class="p-1 border border-gray-100" v-for="product in products" :key="product">
                                    <div class="">
                                        <a :href="'/product/'+product.id+'/details'" class="overflow-hidden">
                                            <div class="relative pb-48 overflow-hidden">
                                                <img class="absolute inset-0 h-full w-full object-cover" :src="'/storage/'+product.image[0].link" alt="">
                                            </div>
                                        </a>
                                        <div class="px-2">
                                            <span class="font-serif text-sm text-gray-900 font-thin">{{product.name}}</span>
                                        </div>
                                        <div class="px-2">
                                            <span class="font-serif text-sm text-gray-900 font-thin">{{product.description}}</span>
                                        </div>
                                        <div class="p-2">
                                            <span class="line-through text-sm text-gray-500 pr-2">$5000</span>
                                            <span class="text-sm">${{product.price}}</span>
                                        </div>
                                        <div class="mt-2">
                                            <button class="p-2 w-full font-extrabold bg-pink text-pink-dark text-sm tracking-widest">VIEW</button>
                                        </div>
                                    </div>  
                                </div>
                        </div>
                        <div class="w-full flex self-center justify-center bg-gray-400 h-8 ml-2 mr-2">
                            <ul class="flex self-center m-1 p-1">
                                <li class="bg-gray-200 p-1 m-1">1</li>
                                <li class="bg-gray-200 p-1 m-1">2</li>
                                <li class="bg-gray-200 p-1 m-1">3</li>
                            </ul>
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
