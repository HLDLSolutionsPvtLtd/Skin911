<template>
   <AdminLayout>
       <template #header>
           Orders
       </template>
       <div class="">
          
           <div style="height:calc(100vh - 80px);" class="m-2 mx-4 container-fluid bg-white rounded p-1 relative">
                <!-- <div :class="{'modal-open': errors.msg, 'modal-close': !errors}" class="absolute shadow-md w-full left-0 right-0 top-20 bg-white ">
                    <span>{{errors.msg}}</span>
                </div> -->
              
               <div class="flex justify-between m-4">
                    <div class="flex gap-2">
                        <div>
                            <span @click="searchFilter('all')" class="text-xs cursor-pointer tracking-wider text-gray-500 p-2 border border-gray-200 shadow-sm font-bold rounded-md">ALL</span>
                        </div>
                        <div class="">
                            <span @click="searchFilter('accepted')" class="p-2 border border-gray-200 shadow-sm cursor-pointer rounded-md font-bold text-xs text-gray-500">ACCEPTED</span>
                        </div>
                        <div class="">
                            <span @click="searchFilter('denied')" class="p-2 border border-gray-200 shadow-sm cursor-pointer rounded-md font-bold text-xs text-gray-500">DENIED</span>
                        </div>
                        <div class="">
                            <span @click="searchFilter('cancelled')" class="p-2 border border-gray-200 shadow-sm cursor-pointer rounded-md font-bold text-xs text-gray-500">CANCELLED</span>
                        </div>
                        <div class="">
                            <span @click="searchFilter('out_for_delivery')" class="p-2 border border-gray-200 shadow-sm cursor-pointer rounded-md font-bold text-xs text-gray-500">OUT FOR DELIVERY</span>
                        </div>
                        <div class="">
                            <span @click="searchFilter('delivered')" class="p-2 border border-gray-200 shadow-sm cursor-pointer rounded-md font-bold text-xs text-gray-500">DELIVERED</span>
                        </div>
                        <div class="">
                            <span @click="searchFilter('placed')" class="p-2 border border-gray-200 shadow-sm cursor-pointer rounded-md font-bold text-xs text-gray-500">PLACED</span>
                        </div>
                    </div>
                    <div class="">
                        <input type="search" v-model="key" @keyup.enter="search()" class="h-8 border border-gray-300 rounded-md pl-8 text-blue-400 placeholder-gray-300 text-sm tracking-wider" placeholder="Search order  by id">
                        <div class="relative">
                            <svg @click="search()" xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="fill-current text-blue-500 absolute -top-6 left-2" viewBox="0 0 24 24">
                                <path d="M13 8h-8v-1h8v1zm0 2h-8v-1h8v1zm-3 2h-5v-1h5v1zm11.172 12l-7.387-7.387c-1.388.874-3.024 1.387-4.785 1.387-4.971 0-9-4.029-9-9s4.029-9 9-9 9 4.029 9 9c0 1.761-.514 3.398-1.387 4.785l7.387 7.387-2.828 2.828zm-12.172-8c3.859 0 7-3.14 7-7s-3.141-7-7-7-7 3.14-7 7 3.141 7 7 7z"/>\
                            </svg>
                        </div>
                    </div>
                </div>
                <div v-show="visible" class="absolute h-4/5 w-full inset-0 overflow-y-scroll bg-white shadow-lg">
                    <div class="flex justify-between border-b p-4">
                        <div>
                            <span class="text-sm font-semibold tracking-wider">ITEMS</span>
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
                                        <div class="p-1 flex flex-col gap-2">
                                            <span class="font-semibold tracking-wider text-md">{{product.name}}</span>
                                            <span v-if="product.pivot.variant">{{variantName(product.pivot.variant, product.variant)}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center text-xs font-semibold tracking-wider ">
                                <span>QUANTITY : {{product.pivot.quantity}}</span>
                            </div>
                            <div class="flex items-center p-2 text-sm m-1">
                                <span class="p-1 font-semibold" v-if="product.pivot.variant != ''">&#8377; {{variantPrice(product.pivot.variant, product.variant, product.pivot.quantity)}}</span>
                                <span v-else class="p-1 font-semibold">&#8377; {{product.price}}</span>
                            </div>
                        </div>
                        
                    </div>
               </div>
               <div style="height:calc(100vh - 180px);scrollbar-width:thin" class="overflow-y-scroll m-4 border-t-2 py-4">
                   
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
                        
                        <tr v-for="(order, index) in orders.data" :key="order.id" class="border-b-2 text-sm font-semibold text-gray-500 tracking-wider border-gray-200">   
                            <td class="p-1 font-bold text-left text-gray-500 py-4">
                               {{order.id}}
                            </td>
                            
                            <td class="text-left font-bold p-1">
                                <div v-if="order.address" class="flex flex-col">
                                    <span>{{order.customer.name}}</span>
                                    <div class="flex gap-2">
                                        <span>{{order.address.name}},</span>
                                        <span>{{order.address.state}},</span>
                                        <span>{{order.address.district}},</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <span>Near {{order.address.landmark}},</span>
                                        <span>{{order.address.house_no}},</span>
                                        <span>{{order.address.pincode}}.</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-left font-bold p-1">&#8377; {{order.total}}</td>
                            <td class="text-center p-1  mr-2">
                                    <span @click="this.products = order.products, visible = !visible" class="text-xs tracking-wider py-1 cursor-pointer text-blue-500">{{order.products.length}}ITEMS</span>
                            </td>
                            <td class="text-left p-1 text-xs uppercase">{{formatDate(order.created_at)}}</td>
                            <td class="text-left p-1 text-xs uppercase">
                                <span v-if="order.status === 'denied' || order.status === 'cancelled'" class="mr-4 font-bold text-red-400">{{order.status}} </span>
                                <span v-else-if="order.status == 'placed'" class="mr-4 font-bold border-b-2 border-green-400 px-2 text-green-500">{{order.status}} </span>
                                <span v-else class="mr-4 font-bold bg-green-200 px-2 text-green-500">{{order.status}} </span>
                            </td>
                            <td class="flex flex-col p-1 text-xs uppercase py-6">
                                <div v-if="order.status == 'placed'" class="mb-2">
                                    <input v-model="remarks[index]" type="text" class="border-gray-400 w-full h-8 rounded-md mr-2 focus:ring-0 focus:border-gray-400" placeholder="Remarks" name="" id="">
                                </div>
                                <select name="" id="" @change="markAs(order, index)" v-model="status" class="bg-green-200 border-0 text-green-800 focus:ring-0 text-xs uppercase rounded-md">
                                    <option value="" selected>Mark As</option>
                                    <option v-if="order.status != 'accepted'&& order.status != 'denied'&& order.status != 'cancelled' && order.status != 'out_for_delivery' && order.status != 'returned' && order.status != 'delivered'" value="accepted">Accepted</option>
                                    <option v-if="order.status != 'accepted' && order.status != 'denied'&& order.status != 'cancelled' && order.status != 'out_for_delivery' && order.status != 'returned' && order.status != 'delivered'" value="denied">Denied</option>
                                    <option v-if="order.status != 'placed' && order.status != 'denied'&& order.status != 'cancelled' && order.status != 'out_for_delivery' && order.status != 'returned' && order.status != 'delivered'" value="cancelled">Cancelled</option>
                                    <option v-if="order.status != 'placed' && order.status != 'denied'&& order.status != 'cancelled' && order.status != 'out_for_delivery' && order.status != 'returned' && order.status != 'delivered'" value="out_for_delivery">Out For Delivery</option>
                                    <option v-if="order.status != 'placed' && order.status != 'accepted' && order.status != 'denied'&& order.status != 'cancelled' && order.status != 'returned' && order.status != 'delivered'" value="delivered">Delivered</option>
                                </select>
                            </td>
                            <td v-if="order.payment_type == 'rzp' && order.transaction"  class="text-left p-1">
                                <span v-if="order.transaction.status == 'paid'" class="text-green-500 bg-green-200 px-2 uppercase font-bold text-xs">{{order.transaction.status}}</span>
                                <span v-else class="text-red-400 uppercase font-bold text-xs">{{order.transaction.status}}</span>
                            </td>
                            <td v-else-if="order.payment_type == 'cod'" class="text-left p-1">
                                <span class="text-green-500 uppercase bg-green-200 font-bold text-xs">
                                    CASH ON DELIVERY
                                </span>
                            </td>
                            <td v-else class="text-left p-1">
                                <span class="text-red-400 uppercase font-bold text-xs">
                                    PAYMENT ERROR
                                </span>
                            </td>
                            <td v-if="order.payment_type == 'rzp'  && order.transaction && order.status != 'accepted' && order.status != 'out_for_delivery' && order.status != 'delivered' && order.status != 'placed'">
                                <button @click="refund(order)" v-if="order.transaction.status == 'paid'" class="p-2 ml-2 text-xs rounded-md tracking-wider font-bold shadow-sm bg-pink  -400 text-white">REFUND</button>
                            </td>
                        </tr>
                        
                    </table>
                    <div class="w-full mt-8">
                        <div class="w-full flex justify-center items-center">
                            <div class="flex gap-2 border justify-center items-center text-blue-500" v-for="(link, index) in orders.links">
                                <button @click="fetchData(link.url)" :disbled="link.active" :class="{'bg-gray-200': !link.active}" v-if="index == 0" class="border border-blue-400 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="p-1 fill-current text-blue-500" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M13 12l11-7v14l-11-7zm-11 0l11-7v14l-11-7zm-2 6h2v-12h-2v12z"/>
                                    </svg>
                                </button>
                                <button @click="fetchData(link.url)" :disbled="link.active" :class="{'bg-gray-200': !link.active}" v-else-if="index == orders.links.length - 1" class="border border-blue-400 cursor-pointer">
                                    <svg class="p-1 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M0 19v-14l11 7-11 7zm11 0v-14l11 7-11 7zm13-13h-2v12h2v-12z"/>
                                    </svg>
                                </button>
                                <button @click="fetchData(link.url)" :disbled="link.active" :class="{'bg-gray-200': !link.active}" v-else class="px-2 font-bold border border-blue-400 cursor-pointer">
                                    <span>{{link.label}}</span>
                                </button>
                            </div>
                        </div>
                    </div>
               </div>
                
           </div>
       </div>
   </AdminLayout>    
</template>

<script>
 
 import AdminLayout from '@/Layouts/AdminLayout'
import { usePage } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';


 export default{
    props: ['orders'],
    data(){
        return{
            visible: false,
            products: [],
            status: '',
            key: '',
            remarks: [],
            index: '',
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
            if(this.status == 'cancelled')
            {
               this.$inertia.put('/admin/order/'+order.id+'/markas',{
                    'status': this.status,
                    'remarks': this.remarks[index],
                    
                });
            }
            else
            {
                this.$inertia.put('/admin/order/'+order.id+'/markas',{
                    'status': this.status,
                    'remarks': this.remarks[index],
                });
            }
            this.status = ''
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
            this.$inertia.get("/admin/order/search", {
                'key': this.key
            })
        },

        searchFilter(filter){
            this.$inertia.get("/admin/order/getby/status", {
                status: filter,
            })
        },

        variantPrice(id, variant, quantity)
        {
            this.index = variant.findIndex(element => {
                if(element.id == id)
                {
                    return true;
                }
            });

            return variant[this.index].price * quantity;
            
        },

        variantName(id, variant)
        {
            this.index = variant.findIndex(element => {
                if(element.id == id)
                {
                    return true;
                }
            });

            return variant[this.index].name;
            
        },
        fetchData(url)
        {
            Inertia.get(url)
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

