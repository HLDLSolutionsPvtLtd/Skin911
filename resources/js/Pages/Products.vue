<template>
    <app-layout>
        <div class="flex justify-center relative">
            <div v-show="success" class="modal z-50" id="modal">
                <div class='modal__container bg-pink-300'>
                   <div class="modal__content pt-12 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102" viewBox="0 0 24 24"  class="absolute -top-20 hidden sm:block right-1/3 fill-current transition transform translate-Y-60 duration-700 text-pink-400 rounded-full">
                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.959 17l-4.5-4.319 1.395-1.435 3.08 2.937 7.021-7.183 1.422 1.409-8.418 8.591z"/>
                        </svg>
                        <h1 ><span class="text-white text-xl font-semibold sm:text-4xl">ADDED TO CART</span></h1>
                        <a href="/cart">
                            <button class="modal__button mt-4 tracking-widest text-sm font-bold bg-blue-400 w-full">VIEW CART</button>
                        </a>
                    </div>
                    <i @click="success=!success" class="absolute right-4 top-4 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-800 hover:text-red-500" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/>
                        </svg>
                    </i>
                </div>
            </div>
        </div>
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
                                        <li class="p-1 cursor-pointer" @click="key = brand.name, productAll()">{{brand.name}}</li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <span class="text-md font-semibold text-pink-dark">Product Type</span>
                            <div>
                                <ul class="text-gray-500 font-semibold text-sm border-l p-2">
                                    <template v-for="category in categories" :key="category.id">
                                        <li class="p-1 cursor-pointer" @click="key = category.name, productAll()">{{category.name}}</li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                         <div>
                            <span class="text-md font-semibold text-pink-dark">Discounts</span>
                            <div>
                                <ul class="text-gray-500 font-semibold text-sm border-l p-2">
                                    <template v-for="discount in discounts" :key="discount.id">
                                        <li class="p-1 cursor-pointer" @click="key = discount.name, productAll()">{{discount.name}}</li>
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
                                        <option class="py-1" @click="sortVal = 'asc', sortVar = 'name', productAll()">Name A-Z</option>
                                        <option class="py-1" @click="sortVal = 'desc', sortVar = 'name', productAll()">Name Z-A</option>
                                        <option class="py-1" @click="sortVal = 'asc', sortVar = 'price', productAll()">Price Low-High</option>
                                        <option class="py-1" @click="sortVal = 'desc', sortVar = 'price', productAll()">Price High-Low</option>
                                        <option class="py-1" @click="sortVal = 'asc', sortVar = 'created_at', productAll">Latest</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="w-full  grid grid-cols-2 sm:grid-cols-4">
                            <div class="p-1 border border-gray-100 mt-2" v-for="product in products" :key="product">
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
                                        <div class="px-2 pt-4">
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
                                         <div v-if="!product.variant[0]" class="mt-2">
                                            <button @click="addToCart(product.id)" class="p-2 w-full font-bold bg-pink text-gray-800 text-xs tracking-widest">ADD TO CART</button>
                                        </div> 
                                        <div v-else class="mt-2">
                                            <a :href="'/product/'+product.id+'/details'">
                                                <button class="p-2 w-full font-bold bg-pink text-gray-800 text-xs tracking-widest">VIEW</button>
                                            </a>
                                        </div>
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
                                    <div @click="filters = 'discounts'" :class="{'bg-gray-100 text-gray-600':filters == 'discounts'}" class="p-2 w-full cursor-pointer">
                                        <span>Discounts</span>
                                    </div>
                                </div>
                                <div class="w-1/2 h-screen text-sm pb-12 bg-gray-100 overflow-y-scroll pl-4">
                                   <ul v-show="filters == 'brands'" class="overflow-y-scroll" >
                                        <template v-for="brand in brands" class="" :key="brand.id">
                                            <li class="p-1 mt-2 list-none cursor-pointer" @click="key = brand.name, filter=!filter, productAll()">{{brand.name}}</li>
                                        </template>
                                        
                                   </ul>
                                   <ul v-show="filters == 'categories'">
                                       <template v-for="category in categories" :key="category.id">
                                            <li class="p-1 mt-2 list-none cursor-pointer" @click="key= category.name, filter=!filter, productAll()">{{category.name}}</li>
                                        </template>
                                   </ul>
                                   <ul v-show="filters == 'discounts'">
                                       <template v-for="discount in discounts" :key="discount.id">
                                            <li class="p-1 mt-2 list-none cursor-pointer" @click="key= discount.name, filter=!filter, productAll()">{{discount.name}}</li>
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
                sortVal:'asc',
                sortVar: 'name',
                key: '',
                sort: false,
                filter: false,
                filters: 'brands',
                products: [],
                brands: [],
                categories: [],
                res: [],
                form: this.$inertia.form({
                    variant : '',
                    quantity : 1,
                }),
                next: '',
                success: false,
            }
        },
    mounted() {
        this.key = new URL(location.href).searchParams.get("key");
        this.productAll();
        axios.get('/brands/all')
        .then(res => this.brands = res.data);
        axios.get('/categories/all')
        .then(res => this.categories = res.data);
        axios.get('/discounts/all')
        .then(res => this.discounts = res.data);
    },
    methods: {
        nextProd()
        {
            axios.get(this.next, {params: {'filter' : this.key, 'var' : this.sortVar, 'val': this.sortVal}})
            .then(res => {
                res.data.data.forEach(element => {
                    this.products.push(element);
                });
                this.next = res.data.next_page_url;
            });
        },
        productAll()
        {
            this.products = [];
            if(this.key)
            {
                console.log(this.key)
                axios.get('/products/all', {params: {'filter' : this.key, 'var' : this.sortVar, 'val': this.sortVal}})
                .then(res => {
                    res.data.data.forEach(element => {
                        this.products.push(element);
                    });
                    this.next = res.data.next_page_url;
                });

            }
            else
            {
                axios.get('/products/all', {params: {'var' : this.sortVar, 'val': this.sortVal}})
                .then(res => {
                    res.data.data.forEach(element => {
                        this.products.push(element);
                    });
                    this.next = res.data.next_page_url;
                });
            }
        },

        addToCart(id){
                this.form.post('/cart/product/'+id+'/add',
                {
                    preserveScroll: true,
                    onFinish: () =>  {
                        this.success = true;
                        
                    }
                       
                })
            },
    },
}
</script>
