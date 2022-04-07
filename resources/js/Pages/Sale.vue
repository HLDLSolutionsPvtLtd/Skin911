<template>
    <app-layout title="Sale">
        <div class="flex justify-center relative">
            <div v-show="success" class="modal z-50 w-5/6 md:w-1/4" id="modal">
                <div class='modal__container shadow-md border bg-white'>
                                        
                    <div class="modal__content flex flex-col items-center justify-center pt-6 relative">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102" viewBox="0 0 24 24"  class="absolute -top-20 right-1/4 fill-current transition transform translate-Y-60 duration-700 text-blue-400 rounded-full p-0 bg-white">
                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.959 17l-4.5-4.319 1.395-1.435 3.08 2.937 7.021-7.183 1.422 1.409-8.418 8.591z"/>
                        </svg> -->
                        <p class="text-black text-sm tracking-wider font-bold text-center w-full">PRODUCT WAS SUCCESSFULLY ADDED TO YOUR CART</p>
                        <a href="/cart">
                            <button class="border border-black rounded-sm p-2 px-8 mt-4 tracking-widest font-bold text-black text-xs">VIEW CART</button>
                        </a>
                    </div>
                    
                    <i @click="success=!success" class="absolute  right-4 top-4 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-800 hover:text-red-500" width="15" height="15" viewBox="0 0 24 24">
                            <path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/>
                        </svg>
                    </i>
                </div>
            </div>
        </div>
        <div v-if="products[0]" class="flex justify-center w-full min-h-screen bg-white">
            <div class="w-full sm:m-0 sm:w-11/12 md:11/12 xl:w-10/12">
                <div class="sm:grid sm:grid-cols-6 m-2 sm:mt-12 mb-12">
                    <div class="sm:col-span-5">
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
                                                <span v-else-if="product.brand.discounts[0]" class="flag-discount transform rotate-90">
                                                    <template v-if="product.brand.discounts[0].type == 'percentage'">
                                                        {{product.brand.discounts[0].amount}}%
                                                    </template>
                                                    <template v-else>
                                                        -{{product.brand.discounts[0].amount}}
                                                    </template>
                                                </span>
                                                <span v-else-if="product.category.discounts[0]" class="flag-discount transform rotate-90">
                                                    <template v-if="product.category.discounts[0].type == 'percentage'">
                                                        {{product.category.discounts[0].amount}}%
                                                    </template>
                                                    <template v-else>
                                                        -{{product.category.discounts[0].amount}}
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
                                                <template v-if="product.variant[0]">
                                                    <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{product.variant[0].price}}</span>
                                                    <template v-if="product.discounts[0].type == 'percentage'">
                                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{product.variant[0].price - (product.variant[0].price * product.discounts[0].amount / 100)}}</span>
                                                    </template>
                                                    <template v-else>
                                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{product.variant[0].price - product.discounts[0].amount}}</span>
                                                    </template>
                                                </template>
                                                <template v-else>
                                                    <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{product.price}}</span>
                                                    <template v-if="product.discounts[0].type == 'percentage'">
                                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price - (product.price * product.discounts[0].amount / 100)}}</span>
                                                    </template>
                                                    <template v-else>
                                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price - product.discounts[0].amount}}</span>
                                                    </template>
                                                </template>
                                            </template>
                                            <template v-else-if="product.brand.discounts[0]">
                                                <template v-if="product.variant[0]">
                                                    <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{product.variant[0].price}}</span>
                                                    <template v-if="product.brand.discounts[0].type == 'percentage'">
                                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{product.variant[0].price - (product.variant[0].price * product.brand.discounts[0].amount / 100)}}</span>
                                                    </template>
                                                    <template v-else>
                                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{product.variant[0].price - product.brand.discounts[0].amount}}</span>
                                                    </template>
                                                </template>
                                                <template v-else>
                                                    <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{product.price}}</span>
                                                    <template v-if="product.brand.discounts[0].type == 'percentage'">
                                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price - (product.price * product.brand.discounts[0].amount / 100)}}</span>
                                                    </template>
                                                    <template v-else>
                                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price - product.brand.discounts[0].amount}}</span>
                                                    </template>
                                                </template>
                                            </template>
                                            <template v-else-if="product.category.discounts[0]">
                                                <template v-if="product.variant[0]">
                                                    <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{product.variant[0].price}}</span>
                                                    <template v-if="product.category.discounts[0].type == 'percentage'">
                                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{product.variant[0].price - (product.variant[0].price * product.category.discounts[0].amount / 100)}}</span>
                                                    </template>
                                                    <template v-else>
                                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{product.variant[0].price - product.category.discounts[0].amount}}</span>
                                                    </template>
                                                </template>
                                                <template v-else>
                                                    <span class="line-through text-xs text-gray-300 pr-2">&#8377;{{product.price}}</span>
                                                    <template v-if="product.category.discounts[0].type == 'percentage'">
                                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price - (product.price * product.category.discounts[0].amount / 100)}}</span>
                                                    </template>
                                                    <template v-else>
                                                        <span class="text-sm text-gray-700 font-bold">&#8377;{{product.price - product.category.discounts[0].amount}}</span>
                                                    </template>
                                                </template>
                                            </template>
                                            <template v-else>
                                                <template v-if="product.variant[0]">
                                                    <span class="text-xs text-gray-900 pr-2">&#8377;{{product.variant[0].price}}</span>
                                                </template>
                                                <template v-else>
                                                    <span class="text-xs text-gray-900 pr-2">&#8377;{{product.price}}</span>
                                                </template>
                                            </template>
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
            </div>
        </div>
        <div v-else class="min-h-screen flex items-center justify-center">
            <span class="text-red-400 font-semibold">No result found</span>
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
    },
    methods: {
        nextProd()
        {
            axios.get(this.next)
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
            
            axios.get('/products/sale', {params: {'var' : this.sortVar, 'val': this.sortVal}})
            .then(res => {
                res.data.data.forEach(element => {
                    this.products.push(element);
                });
                this.next = res.data.next_page_url;
            });
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
