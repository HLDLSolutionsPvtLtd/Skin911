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
               <div class="flex justify-between m-4">
                    <div class="flex gap-2">
                        <div>
                            <span @click="searchFilter('all')" class="text-xs cursor-pointer tracking-wider text-gray-500 p-2 bg-gray-200 font-bold rounded-md">ALL</span>
                        </div>
                        <div class="">
                            <span @click="searchFilter('accepted')" class="p-2 bg-gray-200 cursor-pointer rounded-md font-bold text-xs text-gray-500">ACCEPTED</span>
                        </div>
                        <div class="">
                            <span @click="searchFilter('denied')" class="p-2 bg-gray-200 cursor-pointer rounded-md font-bold text-xs text-gray-500">DENIED</span>
                        </div>
                        <div class="">
                            <span @click="searchFilter('cancelled')" class="p-2 bg-gray-200 cursor-pointer rounded-md font-bold text-xs text-gray-500">CANCELLED</span>
                        </div>
                        <div class="">
                            <span @click="searchFilter('out_for_delivery')" class="p-2 bg-gray-200 cursor-pointer rounded-md font-bold text-xs text-gray-500">OUT FOR DELIVERY</span>
                        </div>
                        <div class="">
                            <span @click="searchFilter('delivered')" class="p-2 bg-gray-200 cursor-pointer rounded-md font-bold text-xs text-gray-500">DELIVERED</span>
                        </div>
                    </div>
                    <div class="">
                        <input type="search" v-model="key" @keyup.enter="search()" class="h-8 border border-gray-300 rounded-md pl-8 text-blue-400 placeholder-gray-300 text-sm tracking-wider" placeholder="Search Order">
                        <div class="relative">
                            <svg @click="search()" xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="fill-current text-blue-500 absolute -top-6 left-2" viewBox="0 0 24 24">
                                <path d="M13 8h-8v-1h8v1zm0 2h-8v-1h8v1zm-3 2h-5v-1h5v1zm11.172 12l-7.387-7.387c-1.388.874-3.024 1.387-4.785 1.387-4.971 0-9-4.029-9-9s4.029-9 9-9 9 4.029 9 9c0 1.761-.514 3.398-1.387 4.785l7.387 7.387-2.828 2.828zm-12.172-8c3.859 0 7-3.14 7-7s-3.141-7-7-7-7 3.14-7 7 3.141 7 7 7z"/>\
                            </svg>
                        </div>
                    </div>
                </div>
               <div class="flex m-4 border-t-2 py-4">
                   
                   <table class="w-full text-ct">
                        <tr class="border-b border-gray-300 text-blue-500 font-bold tracking-wider text-xs font-bold uppercase">
                            <th class="text-left p-1 py-4">
                                <span class="">Id</span>
                            </th>
                            
                            <th class="text-left p-1 py-4">
                                <span class="">Customer</span>
                            </th>
                            <th class="text-left p-1">
                                <span class="">Total Price</span>
                            </th>
                            <th class="text-center p-1 py-4">
                                <span class="">Items</span>
                            </th>
                            <th class="text-left p-1 py-4">
                                <span class="">Created-At</span>
                            </th>
                            <th class="text-left p-1 py-4">
                                <span class="">Status</span>
                            </th>
                            <th class="text-center p-1 py-4">
                                <span class="">Action</span>
                            </th>
                            <th class="text-left p-1 py-4">Payment</th>
                        </tr>
                        
                        <tr v-for="(order, index) in orders" :key="order.id" class="border-b-2 text-sm font-semibold text-gray-500 tracking-wider border-gray-200">   
                            <td class="p-1 font-bold text-left text-gray-500 py-4">
                               {{order.id}}
                            </td>
                            
                            <td class="text-left font-bold p-1">{{order.customer.name}}</td>
                            <td class="text-left font-bold p-1">&#8377; {{order.total}}</td>
                            <td class="text-center p-1  mr-2">
                                    <span @click="this.products = order.products, visible = !visible" class="text-xs tracking-wider py-1 cursor-pointer text-blue-500">{{order.products.length}}ITEMS</span>
                            </td>
                            <td class="text-left p-1 text-xs uppercase">{{formatDate(order.created_at)}}</td>
                            <td class="text-left p-1 text-xs uppercase">
                                <span class="mr-4 font-bold text-yellow-500">{{order.status}} </span>
                                
                            </td>
                            <td class="text-left p-1 text-xs uppercase py-6">
                                <select name="" id="" @change="markAs(order, index)" v-model="status" class="bg-green-200 border-0 text-green-800 focus:ring-0 text-xs uppercase rounded-md">
                                    <option value="" selected>Mark As</option>
                                    <option value="accepted">Accepted</option>
                                    <option value="denied">Denied</option>
                                    <option value="cancelled">Cancelled</option>
                                    <option value="out_for_delivery">Out For Delivery</option>
                                    <option value="delivered">Delivered</option>
                                </select>
                            </td>
                            <td v-if="order.payment_type == 'rzp' && order.transaction"  class="text-left p-1">
                                <span class="text-red-400 uppercase font-bold text-xs">{{order.transaction.status}}</span>
                            </td>
                            <td v-else-if="order.payment_type == 'cod'" class="text-left p-1">
                                <span class="text-red-400 uppercase font-bold text-xs">
                                    CASH ON DELIVERY
                                </span>
                            </td>
                            <td v-else class="text-left p-1">
                                <span class="text-red-400 uppercase font-bold text-xs">
                                    PAYMENT ERROR
                                </span>
                            </td>
                            <td v-if="order.payment_type == 'rzp'  && order.transaction">
                                <button @click="refund(order)" v-if="order.transaction.status == 'paid'" class="p-2 ml-2 text-xs rounded-md tracking-wider font-bold shadow-sm bg-pink  -400 text-white">REFUND</button>
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
            key: '',
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
        },
        search(){
            axios.get("/admin/order/search", {params: {'key': this.key}})
            .then(res => this.orders = res.data);
        },

        searchFilter(filter){
            this.$inertia.get("/admin/order/getby/status", {
                status: filter,
            })
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

