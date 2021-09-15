<template>
   <AdminLayout>
       <template #header>
           <div class="bg-blue-400 pb-32 -mb-32">
                <div class="flex justify-between p-4">
                    <div>
                        <h5 class="text-md text-white font-mono font-semibold">PRODUCTS</h5>
                    </div>
                    <div class="flex">
                        <div class="p-1"> 
                            <a href="admin.addbrand" type="button" class="flex text-md text-gray-500 bg-white p-2 font-mono rounded-md">
                            <i class="flex far">
                                 <svg class="h-6 w-6" viewBox="0 0 32 32">
                                    <path fill="#282C3F" d='M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z'></path>
                                </svg>
                            </i>
                               
                        ADD BRAND</a>
                        </div>
                        <div class="p-1">
                            <a href="admin.addproduct" type="button" class="flex text-md text-gray-500 bg-white p-2 font-mono rounded-md">
                            <i class="flex far">
                                 <svg class="h-6 w-6" viewBox="0 0 32 32">
                                    <path fill="#282C3F" d='M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z'></path>
                                </svg>
                            </i>
                               
                        ADD PRODUCT</a>
                        </div>
                    </div>
                </div>
           </div>
       </template>
       <div>
           <div class="m-2 container-fluid bg-white rounded p-1">
                <div class="flex m-2 justify-between border">
                    <div class="flex">
                        <div class="p-3 border">
                            <span class="text-sm font-semibold text-gray-500">All</span>
                        </div>
                        <div class="p-3 border">
                            <span class="text-sm font-semibold text-gray-500">Active</span>
                        </div>
                        <div class="p-3 border">
                            <span class="text-sm font-semibold text-gray-500">Draft</span>
                        </div>
                        <div class="p-3 border">
                            <span class="text-sm font-semibold text-gray-500">Out of Stock</span>
                        </div>
                    </div>
                    <div class="flex border justify-center text-gray-500 text-center p-3">
                        
                        <div class="flex">
                            <svg viewBox="0 0 24 24" class="h-6 w-6">
                                <path class="fill-current" d="M5.293 2.293a.997.997 0 0 1 1.414 0l3 3a1 1 0 0 1-1.414 1.414L7 5.414V13a1 1 0 1 1-2 0V5.414L3.707 6.707a1 1 0 0 1-1.414-1.414l3-3zM13 7a1 1 0 0 1 2 0v7.585l1.293-1.292a.999.999 0 1 1 1.414 1.414l-3 3a.997.997 0 0 1-1.414 0l-3-3a.997.997 0 0 1 0-1.414.999.999 0 0 1 1.414 0L13 14.585V7z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-sm font-mono">Sort</span>
                    </div>
                </div>

               <table class="border-none w-full">
                   
                    <tr class="border-b">
                        <th class="text-left p-2">Name</th>
                        <th class="text-center p-2">Type</th>
                        <th class="text-center p-2">Categories</th>
                        <th class="text-center p-2">Actions</th>
                    </tr>
                   
                    <tr class="border-b">   
                        <td class="p-2 flex justify-start"><img class="rounded-full h-8 w-8" src="" alt="">Nike Air Max</td>
                        <td class="text-center p-2">casual shoe</td>
                        <td class="text-center p-2">Man</td>
                        <td class="text-center p-2">Edit</td>
                    </tr>
                    <tr class="border-b">   
                        <td class="p-2 flex justify-start"><img class="rounded-full h-8 w-8" src="" alt="">Nike Air Max</td>
                        <td class="text-center p-2">casual shoe</td>
                        <td class="text-center p-2">Man</td>
                        <td class="text-center p-2">Edit</td>
                    </tr>
                    <tr class="border-b">   
                        <td class="p-2 flex justify-start"><img class="rounded-full h-8 w-8" src="" alt="">Nike Air Max</td>
                        <td class="text-center p-2">casual shoe</td>
                        <td class="text-center p-2">Man</td>
                        <td class="text-center p-2">Edit</td>
                    </tr>
                    <tr class="border-b">   
                        <td class="p-2 flex justify-start"><img class="rounded-full h-8 w-8" src="" alt="">Nike Air Max</td>
                        <td class="text-center p-2">casual shoe</td>
                        <td class="text-center p-2">Man</td>
                        <td class="text-center p-2">Edit</td>
                    </tr>
                    <tr class="border-b">   
                        <td class="p-2 flex justify-start"><img class="rounded-full h-8 w-8" src="" alt="">Nike Air Max</td>
                        <td class="text-center p-2">casual shoe</td>
                        <td class="text-center p-2">Man</td>
                        <td class="text-center p-2">Edit</td>
                    </tr>
                    <tr class="border-b">   
                        <td class="p-2 flex justify-start"><img class="rounded-full h-8 w-8" src="" alt="">Nike Air Max</td>
                        <td class="text-center p-2">casual shoe</td>
                        <td class="text-center p-2">Man</td>
                        <td class="text-center p-2">Edit</td>
                    </tr>
                    <tr class="border-b">   
                        <td class="p-2 flex justify-start"><img class="rounded-full h-8 w-8" src="" alt="">Nike Air Max</td>
                        <td class="text-center p-2">casual shoe</td>
                        <td class="text-center p-2">Man</td>
                        <td class="text-center p-2">Edit</td>
                    </tr>
                    <tr class="border-b">   
                        <td class="p-2 flex justify-start"><img class="rounded-full h-8 w-8" src="" alt="">Nike Air Max</td>
                        <td class="text-center p-2">casual shoe</td>
                        <td class="text-center p-2">Man</td>
                        <td class="text-center p-2">Edit</td>
                    </tr>
                    <tr class="border-b">   
                        <td class="p-2 flex justify-start"><img class="rounded-full h-8 w-8" src="" alt="">Nike Air Max</td>
                        <td class="text-center p-2">casual shoe</td>
                        <td class="text-center p-2">Man</td>
                        <td class="text-center p-2">Edit</td>
                    </tr>
                    
               </table>
           </div>
       </div>
   </AdminLayout>    
</template>

<script>
 
 import AdminLayout from '@/Layouts/AdminLayout'


 export default{
    
     components:
    {
        AdminLayout,
    },
    methods:
    {

    }
 }
</script>

