<template>
    <app-layout>
        <div class="flex justify-center w-full min-h-screen bg-white">
            <div class="w-full sm:m-0 sm:w-11/12 md:11/12 xl:w-10/12">
                <div class="sm:grid sm:grid-cols-6 m-2 sm:mt-12 mb-12">
                    <div class="sm:col-span-6">
                        <div class="flex justify-between">
                            <span class="text-sm sm:text-lg text-gray-600 font-bold p-2">Results</span>
                            <!-- <div class="hidden sm:flex bg-white border border-gray-200 rounded-sm">
                                <div class="text-sm text-gray-700">
                                    <select name="" id="" value="" class="border-0 placeholder-gray-700 text-sm focus:ring-0">
                                        <option value="" disabled selected>SORT BY</option>
                                        <option class="py-1" @click="sortVal = 'asc', sortVar = 'name', productAll()">Name A-Z</option>
                                        <option class="py-1" @click="sortVal = 'desc', sortVar = 'name', productAll()">Name Z-A</option>
                                        <option class="py-1" @click="sortVal = 'asc', sortVar = 'price', productAll()">Price Low-High</option>
                                        <option class="py-1" @click="sortVal = 'desc', sortVar = 'price', productAll()">Price High-Low</option>
                                        <option class="py-1" @click="sortVal = 'asc', sortVar = 'created_at', productAll">Latest</option>
                                    </select>
                                </div>
                            </div> -->
                        </div>
                        <div class="w-full grid grid-cols-2 sm:grid-cols-5">
                            <div class="p-1 border border-gray-100 mt-2 mr-1" v-for="product in products" :key="product">
                                    <div class="">
                                        <a :href="'/product/'+product.id+'/details'" class="overflow-hidden relative">
                                            <div class="relative pb-48 overflow-hidden">
                                                <img class="absolute inset-0 h-full w-full object-cover" :src="'/storage/'+product.image[0].link" alt="">
                                            </div>
                                            <div class="absolute ribbon top-4 left-0">
                                                <span v-if="product.discounts[0]" class="flag-discount transform rotate-90">
                                                    <template v-if="product.discounts[0].type == 'percentage'">
                                                        {{product.discounts[0].amount}}%
                                                    </template>
                                                    <template v-else>
                                                        -{{product.discounts[0].amount}}
                                                    </template>
                                                </span>
                                            </div>
                                        </a>
                                        <div class="px-2">
                                            <p class="text-sm w-full truncate overflow-hidden text-gray-600 font-bold tracking-wide">{{product.name}}</p>
                                        </div>
                                        <!-- <div class="px-2">
                                            <span class="italic text-sm text-gray-600 tracking-wide font-thin">{{product.description}}</span>
                                        </div> -->
                                        <div class="px-2 h-6">
                                            
                                            <template v-if="product.discounts[0]">
                                                <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{product.price}}</span>
                                                <template v-if="product.discounts[0].type == 'percentage'">
                                                    <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price - (product.price * product.discounts[0].amount / 100)}}</span>
                                                </template>
                                                <template v-else>
                                                    <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price - product.discounts[0].amount}}</span>
                                                </template>
                                            </template>
                                            <span v-else class="text-xs text-gray-900 pr-2">&#8377;{{product.price}}</span>
                                        </div>
                                       
                                    </div>  
                                    <div class="mt-2">
                                        <a :href="'/product/'+product.id+'/details'" class="overflow-hidden">
                                            <button class="p-2 w-full font-bold bg-pink text-gray-800 text-xs tracking-widest">VIEW</button>
                                        </a>
                                    </div> 
                                </div>
                        </div>
                        <div v-show="next" class="w-full flex self-center mt-6 justify-center">
                            <button @click="nextProd" class="flex items-center px-4 p-2 border-2 text-pink-700 hover:bg-pink-700 hover:text-white rounded-full font-bold tracking-wider">Show More
                                <div class="animate-bounce flex items-center ml-2">
                                    <svg width="15" height="9" viewBox="0 0 24 24" class="" xmlns="http://www.w3.org/2000/svg" >
                                        <path d="M23.245 4l-11.245 14.374-11.219-14.374-.781.619 12 15.381 12-15.391-.755-.609z"/>
                                    </svg>                         
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="relative sm:hidden">
                    <div class="fixed bottom-0 bg-white border-t w-full flex">
                        <div class="flex flex-1 justify-center items-center">
                            <button @click="sort=!sort" class="p-3 text-sm tracking-wider text-gray-500 font-semibold">SORT</button>
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
                                    <li class="py-1 cursor-pointer" @click="sortVal = 'asc', sortVar = 'name', sort=!sort, productAll()">Name A-Z</li>
                                    <li class="py-1 cursor-pointer" @click="sortVal = 'desc', sortVar = 'name', sort=!sort, productAll()">Name Z-A</li>
                                    <li class="py-1 cursor-pointer" @click="sortVal = 'asc', sortVar = 'price', sort=!sort, productAll()">Price Low-High</li>
                                    <li class="py-1 cursor-pointer" @click="sortVal = 'desc', sortVar = 'price', sort=!sort, productAll()">Price High-Low</li>
                                    <li class="py-1 cursor-pointer" @click="sortVal = 'asc', sortVar = 'created_at', sort=!sort, productAll()">Latest</li>
                                </ul>
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
    props: ['products'],
    data()
        {
            return{
                sortVal:'asc',
                sortVar: 'name',
                key: '',
                sort: false,
                filter: false,
                filters: 'brands',
            }
        },
    mounted() {
        console.log(this.products);
       
    },
    methods: {
        nextProd()
        {
            axios.get(this.next)
            .then(res => {
                console.log(res)
            });
        },
        
    },
}
</script>
