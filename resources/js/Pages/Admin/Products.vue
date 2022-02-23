<template>
   <AdminLayout>
       <template #header>
           Products
       </template>
       <div class="">
           <div style="height:calc(100vh - 80px);" class="m-2 mx-4 container-fluid bg-white rounded p-1">
               <div class="flex justify-between m-4">
                    <div class="flex gap-2">
                        <div>
                            <span @click="all()" class="text-xs cursor-pointer tracking-wider text-gray-500 p-2 bg-gray-200 font-bold rounded-md">ALL</span>
                        </div>
                        <div class="">
                            <span @click="outOfStock()" class="p-2 bg-gray-200 cursor-pointer rounded-md font-bold text-xs text-gray-500">OUT OF STOCK</span>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <input type="search" v-model="key" @keydown.enter="search()" class="h-8 border border-gray-300 rounded-md pl-8 text-blue-400 placeholder-gray-300 text-sm tracking-wider" placeholder="Search products">
                        <svg @click="search()" xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="fill-current cursor-pointer text-blue-500 absolute top-2 left-2" viewBox="0 0 24 24">
                           <path d="M13 8h-8v-1h8v1zm0 2h-8v-1h8v1zm-3 2h-5v-1h5v1zm11.172 12l-7.387-7.387c-1.388.874-3.024 1.387-4.785 1.387-4.971 0-9-4.029-9-9s4.029-9 9-9 9 4.029 9 9c0 1.761-.514 3.398-1.387 4.785l7.387 7.387-2.828 2.828zm-12.172-8c3.859 0 7-3.14 7-7s-3.141-7-7-7-7 3.14-7 7 3.141 7 7 7z"/>\
                        </svg>
                    </div>
                </div>
                <div v-show="selectedItems[0]" class="flex items-center mx-4 gap-2">
                    <button @click="markAs('trending')" class="text-xs flex items-center p-2 border border-blue-200 rounded-md text-blue-400  font-bold tracking-wider shadow-sm">ADD TO TRENDING
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" class="fill-current text-blue-400 ml-2">
                            <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm2 12l-4.5 4.5 1.527 1.5 5.973-6-5.973-6-1.527 1.5 4.5 4.5z"/>
                        </svg>
                    </button>
                    <button @click="markAs('just here')" class="text-xs flex items-center p-2 border border-blue-200 rounded-md text-blue-400  font-bold tracking-wider shadow-sm">ADD TO NEW-ARRIVAL
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" class="fill-current text-blue-400 ml-2">
                            <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm2 12l-4.5 4.5 1.527 1.5 5.973-6-5.973-6-1.527 1.5 4.5 4.5z"/>
                        </svg>
                    </button>
                </div>
               <div style="height:calc(100vh - 180px)" class="overflow-y-scroll overflow-x-hidden m-2">
                   <table class="m-2 w-full text-ct border-collapse table-auto">
                        <tr class="border-t-2 shadow-sm border-gray-100 text-gray-500 uppercase tracking-wider text-xs p-2">
                            <td>

                            </td>
                            <th class="flex p-4">
                                <span class="flex pr-1">ID</span>
                            </th>
                            <th class="text-left py-4">
                                <span class="flex pr-1">Name</span>
                            </th>
                            <th class="text-center  py-4">
                                <span class="flex pr-1">Type</span>
                            </th>
                            <th class="text-left  py-4">
                                <span class="flex pr-1">Categories</span>
                            </th>
                            <th class="text-left  py-4">
                                <span class="flex pr-1">Price</span>
                            </th>
                            <th class="text-left  py-4">
                                <span class="flex pr-1">Tag</span>
                            </th>
                            <th class="text-left  py-4">
                                <span class="flex pr-1">Quantity</span>
                            </th>
                            <th class="text-left  py-4">
                                <span class="flex pr-1">Variant</span>
                            </th>
                            <th class="text-center py-4">Actions</th>
                        </tr>
                        
                        <tr v-for="product in products" :key="product.id" class="border-t-2 shadow-sm text-sm text-gray-500 tracking-wider border-gray-100">
                            <td>
                                <input type="checkbox" :value="product.id" v-model="selectedItems">
                            </td>   
                            <td class="text-left p-4">{{product.id}}</td>
                            <td class="p-2 flex "><img v-if="product.image[0]" class="h-12 w-12 flex mr-3" :src="'/storage/'+product.image[0].link" alt=""><span class="flex self-center justify-center text-md text-center font-bold">{{product.name}}</span></td>
                            <td class="text-left  p-1">{{product.brand_id}}</td>
                            <td class="text-left  p-1">{{product.category_id}}</td>
                            <td class="text-left  p-1">{{product.price}}</td>
                            <td class="text-left  p-1">{{product.tag}}</td>
                            <td class="text-left  p-1">{{product.quantity}}</td>
                            <td class="text-left  p-1">{{product.variant.length}}</td>
                            <td class="p-1">
                                <div class="flex gap-2 justify-center items-center">
                                    <a :href="'/admin/product/'+product.id+'/edit'" class="flex items-center justify-center font-bold text-sm text-red-600 p-2 bg-green-400 rounded-md shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="fill-current text-white" viewBox="0 0 24 24">
                                            <path d="M18.363 8.464l1.433 1.431-12.67 12.669-7.125 1.436 1.439-7.127 12.665-12.668 1.431 1.431-12.255 12.224-.726 3.584 3.584-.723 12.224-12.257zm-.056-8.464l-2.815 2.817 5.691 5.692 2.817-2.821-5.693-5.688zm-12.318 18.718l11.313-11.316-.705-.707-11.313 11.314.705.709z"/>
                                        </svg>
                                    </a>
                                    <button @click="deleteProduct(product)" class="flex items-center justify-center font-bold text-sm text-red-600 p-2 bg-green-400 rounded-md shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="fill-current text-white" viewBox="0 0 24 24">
                                            <path d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                    </table>
               </div>
           </div>
       </div>
   </AdminLayout>    
</template>

<script>
 
 import AdminLayout from '@/Layouts/AdminLayout'


 export default{
    props: ['products'],
    data(){
        return{
            key: '',
            selectedItems: []
        }
    },
     components:
    {
        AdminLayout,
    },
    methods:
    {
        // check(product)
        // {
        //     if(product.has('image'))
        //     {
        //         return true;
        //     }
        //     else
        //     {
        //         return false;
        //     }
        // },

        back()
        {
            window.history.back();
        },
        deleteProduct(product){
            var index = this.products.findIndex( element => {
                if (element === product) {
                    return true;
                }
            });
            if(confirm('This Product will be permanently deleted!!')){
                axios.delete("/admin/product/"+product.id+"/delete")
                .then
                {
                    this.products.splice(index, 1);
                }
            }
        },
        markAs(itag)
        {
            var items = this.selectedItems;
            this.selectedItems = [];
            this.$inertia.post('/admin/product/markas', {
                ids: items,
                tag: itag,
                preserveState: false,
                
            })
        },
        search()
        {
            this.$inertia.get('/admin/product/search', {
                'key': this.key
            })
        },

        outOfStock()
        {
            this.$inertia.get('/admin/product/outofstock',
            )
        },
        all()
        {
            this.$inertia.get('/admin/allproducts')
        }
       
    },
    mounted(){
        this.selectedItems = [];
    },
    watch:
    {
        
    }
 }
</script>

