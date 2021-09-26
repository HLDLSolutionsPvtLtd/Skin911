<template>
   <AdminLayout>
       <template #header>
           Products
       </template>
       <div class="">
           <div class="m-2 container-fluid bg-dark-header rounded p-1">
                <div class="flex m-2 justify-between border border-gray-600">
                    <div class="flex">
                        <div class="m-1">
                            <button @click="back()" class="flex text-xs text-blue-500 border border-white font-mono p-2 rounded-xs">
                                
                                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                    <path fill="#fff" d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm-4.828 11.5l4.608 3.763-.679.737-6.101-5 6.112-5 .666.753-4.604 3.747h11.826v1h-11.828z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="m-1">
                            <a href="admin.addproduct" type="button" class="flex text-md text-blue-500 border border-blue-600 font-mono p-2 rounded-xs">
                                <svg  width="24" height="24" class="mr-1">
                                    <path fill="#0f3fc7" d='M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z'></path>
                                </svg> 
                        NEW</a>
                        </div>
                    </div>
                    <div>
                        <div class="flex m-1 rounded-sm border border-blue-500">
                            <input class="w-full text-ct h-full border-0 rounded-sm focus:ring-0 bg-dark-header" placeholder="Search product" type="text">
                            <button class="justify-center items-center border-1 rounded-sm font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                <i class="fas fa-search fa-sm pl-2 pr-2 text-blue-600"></i>
                            </button>
                        </div>
                    </div>
                </div>

               <div class="flex  m-2">
                   <table class="border border-gray-600 w-full text-ct">
                        <tr class="border-b border-gray-600">
                            <th class="text-left border-r border-gray-600 p-2">
                                <div class="flex">
                                    <span class="flex pr-1">Name</span>
                                    <svg viewBox="0 0 24 24" class="flex h-4 w-4">
                                        <path class="fill-current" d="M5.293 2.293a.997.997 0 0 1 1.414 0l3 3a1 1 0 0 1-1.414 1.414L7 5.414V13a1 1 0 1 1-2 0V5.414L3.707 6.707a1 1 0 0 1-1.414-1.414l3-3zM13 7a1 1 0 0 1 2 0v7.585l1.293-1.292a.999.999 0 1 1 1.414 1.414l-3 3a.997.997 0 0 1-1.414 0l-3-3a.997.997 0 0 1 0-1.414.999.999 0 0 1 1.414 0L13 14.585V7z">
                                        </path>
                                    </svg>
                                </div>
                            </th>
                            <th class="text-center border-r border-gray-600 p-2">
                                <div class="flex justify-center">
                                    <span class="flex pr-1">Type</span>
                                    <svg viewBox="0 0 24 24" class="flex h-4 w-4">
                                        <path class="fill-current" d="M5.293 2.293a.997.997 0 0 1 1.414 0l3 3a1 1 0 0 1-1.414 1.414L7 5.414V13a1 1 0 1 1-2 0V5.414L3.707 6.707a1 1 0 0 1-1.414-1.414l3-3zM13 7a1 1 0 0 1 2 0v7.585l1.293-1.292a.999.999 0 1 1 1.414 1.414l-3 3a.997.997 0 0 1-1.414 0l-3-3a.997.997 0 0 1 0-1.414.999.999 0 0 1 1.414 0L13 14.585V7z">
                                        </path>
                                    </svg>
                                </div>
                            </th>
                            <th class="text-left border-r border-gray-600 p-2">
                                <div class="flex justify-center">
                                    <span class="flex pr-1">Categories</span>
                                    <svg viewBox="0 0 24 24" class="flex h-4 w-4">
                                        <path class="fill-current" d="M5.293 2.293a.997.997 0 0 1 1.414 0l3 3a1 1 0 0 1-1.414 1.414L7 5.414V13a1 1 0 1 1-2 0V5.414L3.707 6.707a1 1 0 0 1-1.414-1.414l3-3zM13 7a1 1 0 0 1 2 0v7.585l1.293-1.292a.999.999 0 1 1 1.414 1.414l-3 3a.997.997 0 0 1-1.414 0l-3-3a.997.997 0 0 1 0-1.414.999.999 0 0 1 1.414 0L13 14.585V7z">
                                        </path>
                                    </svg>
                                </div>
                            </th>
                            <th class="text-center p-2">Actions</th>
                        </tr>
                        
                        <tr v-for="product in products" :key="product.id" class="border-b border-gray-600">   
                            <td class="p-2 flex border-r border-gray-600"><img class="h-14 w-14 flex mr-1" :src="'/images/'+product.img" alt=""><span class="flex self-center justify-center text-center">{{product.name}}</span></td>
                            <td class="text-center border-r border-gray-600 p-2">{{product.type}}</td>
                            <td class="text-center border-r border-gray-600 p-2">{{product.categories}}</td>
                            <td class="text-center p-2">Edit</td>
                        </tr>
                        
                    </table>
               </div>
           </div>
       </div>
   </AdminLayout>    
</template>

<script>
 
 import AdminLayout from '@/Layouts/AdminLayout'
import { watch } from '@vue/runtime-core'


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
        back()
        {
            window.history.back();
        },
    },
    mounted()
    {
        // axios.get('admin.getproducts')
        // .then(res => this.response = res.data)
        // .then(error => {
        //     console.error(error);
        // })
    },
    watch:
    {
        response()
        {
            this.products = this.response.data;
        }
    }
 }
</script>

