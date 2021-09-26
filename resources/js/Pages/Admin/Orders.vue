<template>
   <AdminLayout>
       <template #header>
           Orders
       </template>
       <div class="">
           <div class="m-2 container-fluid bg-dark-header rounded p-1">
                <div class="flex m-2 justify-between border border-gray-600">
                    <div class="">
                        <div class="m-1">
                            <button @click="back()" class="flex text-xs text-blue-500 border border-white font-mono p-2 rounded-xs">
                                
                                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                    <path fill="#fff" d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm-4.828 11.5l4.608 3.763-.679.737-6.101-5 6.112-5 .666.753-4.604 3.747h11.826v1h-11.828z"/>
                                </svg>
                       </button>
                        </div>
                    </div>
                    <div>
                        <div class="flex m-1 rounded-sm border border-blue-500">
                            <input class="w-full text-ct h-full border-0 rounded-sm focus:ring-0 bg-dark-header" placeholder="Search Order" type="text">
                            <button class="justify-center items-center border-1 rounded-sm font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                <i class="fas fa-search fa-sm pl-2 pr-2 text-blue-600"></i>
                            </button>
                        </div>
                    </div>
                    
                </div>

               <div class="m-2">
                   <table class="border border-gray-600 w-full text-ct">
                        <tr class="border-b border-gray-600">
                            <th class="text-left border-r border-gray-600 p-2">
                                <div class="flex">
                                    <span class="flex pr-1">Order ID</span>
                                </div>
                            </th>
                            <th class="text-center border-r border-gray-600 p-2">
                                <div class="flex justify-center">
                                    <span class="flex pr-1">Order date</span>
                                </div>
                            </th>
                            <th class="text-left border-r border-gray-600 p-2">
                                <div class="flex justify-center">
                                    <span class="flex pr-1">Customer</span>
                                </div>
                            </th>
                            <th class="text-left border-r border-gray-600 p-2">
                                <div class="flex justify-center">
                                    <span class="flex pr-1">Total</span>
                                </div>
                            </th>
                            <th class="text-left border-r border-gray-600 p-2">
                                <div class="flex justify-center">
                                    <span class="flex pr-1">Payment Status</span>
                                </div>
                            </th>
                            <th class="text-left border-r border-gray-600 p-2">
                                <div class="flex justify-center">
                                    <span class="flex pr-1">Items</span>
                                </div>
                            </th>
                            <th class="text-left border-r border-gray-600 p-2">
                                <div class="flex justify-center">
                                    <span class="flex pr-1">Delivery Methods</span>
                                </div>
                            </th>
                        </tr>
                        
                        <tr v-for="order in orders" :key="order.id" class="border-b border-gray-600 hover:bg-blue-500">   
                            <td class="text-center border-r border-gray-600 p-2">#{{order.id}}</td>
                            <td class="text-center border-r border-gray-600 p-2">{{formatdate(order.created_at)}}</td>
                            <td class="text-center border-r border-gray-600 p-2">{{order.user.name}}</td>
                            <td class="text-center border-r border-gray-600 p-2">{{order.price}}</td>
                            <td class="text-center border-r border-gray-600 p-2">{{order.status}}</td>
                            <td class="text-center border-r border-gray-600 p-2">{{order.products.length}}</td>
                            <td class="text-center border-r border-gray-600 p-2">{{order.payment_type}}</td>
                        </tr>
                    </table>
                    <div class="flex border border-gray-600 justify-center w-full">
                        <button class="bg-gray-600 p-1 m-1">Prev</button>
                        <button class="bg-gray-600 p-1 m-1">1</button>
                        <button class="bg-gray-600 p-1 m-1">Next</button>
                    </div>
               </div>
           </div>
       </div>
   </AdminLayout>    
</template>

<script>
 
 import AdminLayout from '@/Layouts/AdminLayout'
import { watch } from '@vue/runtime-core'
import Button from '../../Jetstream/Button.vue'


 export default{
    data(){
        return{
           orders: [],
           response: []
        }
    },
     components:
    {
        AdminLayout
    },
    methods:
    {
        formatdate(date)
        {
            var date = new Date(date);
            return date.toDateString();
        },
        back()
        {
            window.history.back();
        },
    },
    mounted()
    {
        axios.get('admin.getOrderAll')
        .then(res => this.response = res.data)
        .then(error => {
            console.error(error);
        })
    },
    watch:
    {
        response()
        {
            this.orders = this.response.data;
        },
        
    }
 }
</script>

