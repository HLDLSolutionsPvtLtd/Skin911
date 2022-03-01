<template>
   <AdminLayout >
       <template #header>
            Dashboard
       </template>
       <div class="h-screen">
           <div class="">
                    <div class="m-4 grid grid-cols-4">
                        <div class="p-6 col-span-3 rounded-sm w-full bg-white shadow-sm">
                            <div class="p-1 flex justify-between">
                                    <div>
                                        <div  class="font-bold text-blue-500 tracking-wider">
                                            <span style="font-size:13px">SALES</span>
                                        </div>
                                        <div class="flex pt-2 pb-2 text-md text-gray-600">
                                                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" class="fill-current text-blue-500" fill-rule="evenodd" clip-rule="evenodd">
                                                    <path d="M12.628 21.412l5.969-5.97 1.458 3.71-12.34 4.848-4.808-12.238 9.721 9.65zm-1.276-21.412h-9.352v9.453l10.625 10.547 9.375-9.375-10.648-10.625zm4.025 9.476c-.415-.415-.865-.617-1.378-.617-.578 0-1.227.241-2.171.804-.682.41-1.118.584-1.456.584-.361 0-1.083-.408-.961-1.218.052-.345.25-.697.572-1.02.652-.651 1.544-.848 2.276-.106l.744-.744c-.476-.476-1.096-.792-1.761-.792-.566 0-1.125.227-1.663.677l-.626-.627-.698.699.653.652c-.569.826-.842 2.021.076 2.938 1.011 1.011 2.188.541 3.413-.232.6-.379 1.083-.563 1.475-.563.589 0 1.18.498 1.078 1.258-.052.386-.26.763-.621 1.122-.451.451-.904.679-1.347.679-.418 0-.747-.192-1.049-.462l-.739.739c.463.458 1.082.753 1.735.753.544 0 1.087-.201 1.612-.597l.54.538.697-.697-.52-.521c.743-.896 1.157-2.209.119-3.247zm-9.678-7.476c.938 0 1.699.761 1.699 1.699 0 .938-.761 1.699-1.699 1.699-.938 0-1.699-.761-1.699-1.699 0-.938.761-1.699 1.699-1.699z"/>
                                                </svg>
                                                <span class="text-md text-blue-500 ml-2">{{no_sales}}</span>
                                        </div>
                                    </div>
                                    <div class="pr-3">
                                        <div class=" text-blue-500 flex gap-1">
                                            <button style="font-size:10px" :class="{'bg-blue-400 text-white': filter=='month'}" @click="filter = 'month'" class="border border-blue-300 p-2 font-bold rounded-md tracking-wider">MONTHLY</button>
                                            <button style="font-size:10px" :class="{'bg-blue-400 text-white': filter=='year'}" @click="filter = 'year'" class="border border-blue-300 p-2 font-bold rounded-md tracking-wider">YEARLY</button>
                                            <button style="font-size:10px" :class="{'bg-blue-400 text-white': filter=='day'}" @click="filter = 'day'" class="border border-blue-300 p-2 font-bold rounded-md tracking-wider">DAILY</button>
                                        </div>
                                    </div>
                            </div>
                            <new-sales-chart v-if="filter== 'day'" v-on:sales="setSales" :filter="filter" />
                            <new-sales-chart v-if="filter== 'year'" v-on:sales="setSales" :filter="filter" />
                            <new-sales-chart v-if="filter== 'month'" v-on:sales="setSales" :filter="filter" />
                        </div>
                        <div class="rounded-sm col-span-1 p-2 ml-2 bg-white shadow-sm">
                                <div class="flex uppercase my-4">
                                    <span style="font-size:12px" class="p-2 font-bold tracking-wider text-blue-500">Order Status</span>
                                    <!-- <div class="p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" class="fill-current text-blue-400" viewBox="0 0 24 24">
                                            <path d="M13.012 5.007v-1.668l2.802-2.771c.409.136.809.293 1.197.471l-3.999 3.968zm7.089-1.93l-7.089 7.058v.853h.877l7.044-7.076c-.263-.292-.541-.57-.832-.835zm-7.089-1.468l1.437-1.406c-.46-.094-.96-.163-1.437-.203v1.609zm10.789 7.962l-1.386 1.417h1.585c-.04-.47-.106-.964-.199-1.417zm-.363-1.366c-.135-.41-.292-.81-.469-1.199l-3.951 3.982h1.668l2.752-2.783zm-1.063-2.337c-.205-.346-.426-.682-.664-1.004l-6.093 6.124h1.668l5.089-5.12zm-3.225-3.57c-.322-.238-.657-.459-1.003-.665l-5.135 5.104v1.668l6.138-6.107zm-8.15 10.702v-13c-6.161.519-11 5.683-11 11.978 0 6.639 5.382 12.022 12.021 12.022 6.296 0 11.46-4.839 11.979-11h-13z"/>
                                        </svg>
                                    </div> -->
                                </div>
                                <orders-status  class="flex"/>

                        </div>
                    </div>
            </div>
            <div>
                <div class="mx-4 flex">
                    <div class="rounded-sm p-2 w-1/3 bg-white shadow-sm">
                        <div class="p-2">
                            <span style="font-size:12px" class="p-2 text-sm uppercase text-blue-500 font-bold tracking-wider">Orders</span>
                            <div class="flex p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-blue-500 " width="20" height="20" viewBox="0 0 24 24">
                                        <path d="M21.698 10.658l2.302 1.342-12.002 7-11.998-7 2.301-1.342 9.697 5.658 9.7-5.658zm-9.7 10.657l-9.697-5.658-2.301 1.343 11.998 7 12.002-7-2.302-1.342-9.7 5.657zm12.002-14.315l-12.002-7-11.998 7 11.998 7 12.002-7z"/>
                                    </svg>
                                    <span class="text-md text-blue-500 ml-2">{{no_orders}}</span>
                            </div>
                        </div>
                        <order-chart v-on:orders="setOrders" class="p-4"/>
                    </div>
                    <div class="rounded-sm p-2 ml-2 w-1/3 bg-white shadow-sm">
                        <div class="p-2">
                            <span style="font-size:12px" class="p-2 text-sm uppercase font-bold tracking-wider text-blue-500">New Users</span>
                            <div class="p-2 flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-blue-500" width="20" height="20" viewBox="0 0 24 24">
                                        <path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/>
                                    </svg>
                                    <span class="text-md text-blue-500 ml-2">{{newusers}}</span>
                            </div>
                        </div>
                        <new-user-chart v-on:newuser="setNewusers" class=""/>
                    </div>
                    <div class="rounded-sm p-2 ml-2 w-1/3 bg-white shadow-sm">
                        <div class="p-2">
                            <span style="font-size:12px" class="p-2 text-sm uppercase font-bold tracking-wider text-blue-500">Traffic</span>
                            <div class="p-2 flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-blue-500" width="20" height="20" viewBox="0 0 24 24">
                                        <path d="M16.488 20l3.414 4h-2.627l-3.42-4h2.633zm1.512-14h-4v1h4v-1zm-7 18h2v-4h-2v4zm-6.918 0h2.628l3.42-4h-2.633l-3.415 4zm13.918-16h-4v1h4v-1zm0 2h-4v1h4v-1zm-8.5 3c1.762 0 3.205-1.306 3.45-3h-3.95v-3.95c-1.694.245-3 1.688-3 3.45 0 1.933 1.567 3.5 3.5 3.5zm.5-6.95v2.95h2.95c-.221-1.529-1.421-2.729-2.95-2.95zm8 5.95h-4v1h4v-1zm5-9h-1v15h-20v-15h-1v-3h22v3zm-3 0h-16v13h16v-13z"/>
                                    </svg>
                                    <span class="text-md text-blue-500 ml-2">{{no_traffic}}</span>
                            </div>
                        </div>
                        <Traffic v-on:traffic="setTraffic" class="p-4"/>
                    </div>
                </div>
            </div>
            
       </div>
   </AdminLayout>    
</template>

<script>
 import JetApplicationMark from '@/Jetstream/ApplicationMark'
 import JetBanner from '@/Jetstream/Banner'
 import JetDropdown from '@/Jetstream/Dropdown'
 import JetDropdownLink from '@/Jetstream/DropdownLink'
 import JetNavLink from '@/Jetstream/NavLink'
 import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
 import AdminLayout from '@/Layouts/AdminLayout'
 import NewSalesChart from '../Admin/Components/NewSalesChart.vue'
 import Traffic from '../Admin/Components/Traffic.vue'
 import OrdersStatus from '../Admin/Components/OrdersStatus.vue'
 import OrderChart from '../Admin/Components/OrderChart.vue'
 import NewUserChart from '../Admin/Components/NewUserChart.vue'



 export default{
    data() {
        return {
            no_traffic: 0,
            newusers: 0,
            no_sales: 0,
            no_orders: 0,
            filter: 'month'
        }
    },
     components:
    {
        JetApplicationMark,
        JetBanner,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
        NewSalesChart,
        OrderChart,
        NewUserChart,
        OrdersStatus,
        Traffic,
        AdminLayout,
    },

    methods: {
        setTraffic(num)
        {
            this.no_traffic = num;
        },

        setNewusers(num)
        {
            this.newusers = num;
        },

        setSales(num)
        {
            this.no_sales = num;
        },

        setOrders(num)
        {
            this.no_orders = num;
        }
    },

    mounted() {
        
    },
    
 }
</script>

