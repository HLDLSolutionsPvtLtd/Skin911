<template>
   <AdminLayout>
       <template #header>
           Products
       </template>
       <div class="">
           <div style="height:calc(100vh - 80px);" class="m-2 mx-4 container-fluid bg-white rounded p-1">
               <div class="flex  m-2">
                   <table class="border border-gray-300 w-full text-ct">
                        <tr class="border-b border-gray-300 text-gray-400 tracking-wider text-sm">
                            <th class="text-left border-r border-gray-300 p-2">
                                <span class="flex pr-1">Name</span>
                            </th>
                            <th class="text-center border-r border-gray-300 p-2">
                                <span class="flex pr-1">Type</span>
                            </th>
                            <th class="text-left border-r border-gray-300 p-2">
                                <span class="flex pr-1">Categories</span>
                            </th>
                            <th class="text-left border-r border-gray-300 p-2">
                                <span class="flex pr-1">Price</span>
                            </th>
                            <th class="text-left border-r border-gray-300 p-2">
                                <span class="flex pr-1">Quantity</span>
                            </th>
                            <th class="text-left border-r border-gray-300 p-2">
                                <span class="flex pr-1">Variant</span>
                            </th>
                            <th class="text-center p-2">Actions</th>
                        </tr>
                        
                        <tr v-for="product in products" :key="product.id" class="border-b text-sm text-gray-500 tracking-wider border-gray-300">   
                            <td class="p-2 flex border-r border-gray-300"><img v-if="product.image[0]" class="h-14 w-14 flex mr-1" :src="'/storage/'+product.image[0].link" alt=""><span class="flex self-center justify-center text-lg text-center font-bold">{{product.name}}</span></td>
                            <td class="text-center border-r border-gray-300 p-2">{{product.type}}</td>
                            <td class="text-center border-r border-gray-300 p-2">{{product.categories}}</td>
                            <td class="text-center border-r border-gray-300 p-2">{{product.price}}</td>
                            <td class="text-center border-r border-gray-300 p-2">{{product.quantity}}</td>
                            <td class="text-center border-r border-gray-300 p-2">{{product.variant.length}}</td>
                            <td class="p-2">
                                <div class="flex gap-2 justify-center items-center">
                                    <a :href="'/admin/product/'+product.id+'/edit'" class="flex items-center justify-center font-bold text-sm text-red-600 p-2 bg-green-400 rounded-md shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="fill-current text-red-800" viewBox="0 0 24 24">
                                            <path d="M18.363 8.464l1.433 1.431-12.67 12.669-7.125 1.436 1.439-7.127 12.665-12.668 1.431 1.431-12.255 12.224-.726 3.584 3.584-.723 12.224-12.257zm-.056-8.464l-2.815 2.817 5.691 5.692 2.817-2.821-5.693-5.688zm-12.318 18.718l11.313-11.316-.705-.707-11.313 11.314.705.709z"/>
                                        </svg>
                                    </a>
                                    <button @click="deleteProduct(product)" class="flex items-center justify-center font-bold text-sm text-red-600 p-2 bg-green-400 rounded-md shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="fill-current text-red-800" viewBox="0 0 24 24">
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
    data(){
        return{
            products: [],
            response: []
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
        }
    },
    mounted()
    {
        axios.get('admin.getproducts')
        .then(res => this.response = res.data)
        .then(error => {
            console.error(error);
        })
    },
    watch:
    {
        response()
        {
            this.products = this.response;
        }
    }
 }
</script>

