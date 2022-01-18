<template>
   <AdminLayout>
       <template #header>
           Orders
       </template>
       <div class="">
           <div style="height:calc(100vh - 80px);" class="m-2 mx-4 container-fluid bg-white rounded p-1 relative">
               <div v-show="visible" class="absolute h-4/5 w-full overflow-y-scroll bg-white shadow-lg">
                    <div class="flex justify-between border-b p-4">
                        <div>
                            <span class="text-sm font-bold tracking-wider">ITEMS</span>
                        </div>
                        <div @click="visible = !visible" class="p-2 bg-red-400 border  rounded-full border-red-400 hover:bg-gray-400 hover:border-green-400">
                            <svg  xmlns="http://www.w3.org/2000/svg" width="15" height="15" class="fill-current text-white hover:text-red-600" viewBox="0 0 24 24">
                                <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/>
                            </svg>
                        </div>                            
                    </div>
                    <div v-for="product in products" :key="product" class="m-4">
                        <div class="flex justify-between bg-white border text-gray-700 mb-2">
                            <div class="flex p-1">
                                <img :src="'/storage/'+product.image[0].link" alt="" class="w-24 p-2 h-24 self-center ">
                                <div class="flex m-4 text-gray-700 text-sm font-sans text-thin self-center">
                                    <div class="p-2">
                                        <div class="p-1">
                                            <span class="font-bold tracking-wider text-md">{{product.name}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center text-sm font-bold tracking-wider ">
                                <span>QUANTITY : {{product.pivot.quantity}}</span>
                            </div>
                            <div class="flex items-center p-2 m-1">
                                <span class="p-1 font-semibold">&#8377; {{product.price}}</span>
                            </div>
                        </div>
                        
                    </div>
               </div>
               <div class="flex  m-2">
                   <table class="border border-gray-300 w-full text-ct">
                        <tr class="border-b border-gray-300 text-gray-400 tracking-wider text-xs font-bold uppercase">
                            <th class="text-center border-r border-gray-300 p-2">
                                <span class="">Id</span>
                            </th>
                            <th class="text-center border-r border-gray-300 p-2">
                                <span class="">Status</span>
                            </th>
                            <th class="text-center border-r border-gray-300 p-2">
                                <span class="">Customer</span>
                            </th>
                            <th class="text-center border-r border-gray-300 p-2">
                                <span class="">Total Price</span>
                            </th>
                            <th class="text-center border-r border-gray-300 p-2">
                                <span class="">Items</span>
                            </th>
                            <th class="text-center border-r border-gray-300 p-2">
                                <span class="">Created-At</span>
                            </th>
                            <th class="text-center p-2">Payment</th>
                        </tr>
                        
                        <tr v-for="(order, index) in orders" :key="order.id" class="border-b text-sm font-bold text-gray-400 tracking-wider border-gray-300">   
                            <td class="p-2 text-center border-r border-gray-300">{{order.id}}</td>
                            <td class="text-center border-r p-2 text-xs uppercase">
                                <span class="mr-4 text-white font-bold bg-green-400 p-2 rounded-md shadow-lg">{{order.status}} </span>
                                <select name="" id="" @change="markAs(order, index)" v-model="status" class="border border-pink-500 text-green-400 focus:ring-0 text-xs uppercase rounded-md">
                                    <option value="" selected>Mark As</option>
                                    <option value="accepted">Accepted</option>
                                    <option value="denied">Denied</option>
                                    <option value="cancelled">Cancelled</option>
                                    <option value="out_for_delivery">Out For Delivery</option>
                                    <option value="delivered">Delivered</option>
                                </select>
                            </td>
                            <td class="text-center border-r p-2">{{order.customer.name}}</td>
                            <td class="text-center border-r p-2">&#8377; {{order.total}}</td>
                            <td class="text-center border-r p-2 flex flex-col">{{order.products.length}}
                                <span @click="this.products = order.products, visible = !visible" class="text-xs tracking-wider p-2 cursor-pointer font-thin text-blue-500">VIEW ITEMS</span>
                            </td>
                            <td class="text-center border-r p-2 font-thin">{{formatDate(order.created_at)}}</td>
                            <td class="text-center border-r p-2"><span class="text-green-400 uppercase font-bold text-xs">{{order.transaction.status}}</span>
                                <button @click="refund(order)" v-if="order.transaction.status == 'paid'" class="p-2 ml-2 text-xs rounded-md tracking-wider font-bold shadow-lg bg-blue-400 text-white">REFUND</button>
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
    props: ['orders'],
    data(){
        return{
            visible: false,
            products: [],
            status: '',
        }
    },
     components:
    {
        AdminLayout,
    },
    methods:
    {
        formatDate(val)
        {
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            var d = new Date(val)
            return d.toLocaleDateString("en-US", options); 
        },

        markAs(order, index)
        {
            this.$inertia.put('/admin/order/'+order.id+'/markas',{
                'status': this.status,
                onSuccess: () =>
                {

                }
            });
            this.status = '';
        },
        refund(order)
        {
            this.$inertia.post('/admin/order/'+order.id+'/payment/refund',
            {
                onSuccess: () =>
                {
                    alert("success");
                }
            });
        }
    },
    mounted()
    {
        
    },
    watch:
    {
        
    }
 }
</script>

