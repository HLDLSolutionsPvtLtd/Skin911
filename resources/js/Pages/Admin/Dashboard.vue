<template>
   <AdminLayout>
       <template #header>
            Dashboard
       </template>
       <div>
           <div class="m-4 flex">
               <div class="rounded-sm p-2 w-1/2 mr-2 bg-white shadow-sm">
                   <div class="p-2">
                       <span class="p-2 text-sm uppercase text-gray-500">Orders</span>
                       <div class="flex p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path  fill="#000" d="M21.698 10.658l2.302 1.342-12.002 7-11.998-7 2.301-1.342 9.697 5.658 9.7-5.658zm-9.7 10.657l-9.697-5.658-2.301 1.343 11.998 7 12.002-7-2.302-1.342-9.7 5.657zm12.002-14.315l-12.002-7-11.998 7 11.998 7 12.002-7z"/>
                            </svg>
                            <span class="text-md text-gray-600 ml-2">25</span>
                       </div>
                   </div>
                   <order-chart class=""/>
               </div>
               <div class="rounded-sm p-2 ml-2 w-1/2 bg-white shadow-sm">
                   <div class="p-2">
                       <span class="p-2 text-sm uppercase text-gray-500">New Users</span>
                       <div class="p-2 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-black" width="20" height="20" viewBox="0 0 24 24">
                                <path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/>
                            </svg>
                            <span class="text-md text-gray-600 ml-2">45</span>
                       </div>
                   </div>
                   <new-user-chart class=""/>
               </div>
           </div>
       </div>
       <div class="">
            <div class="m-4">
                   <div class="p-6 rounded-sm w-full bg-white shadow-sm">
                       <div class="p-1 flex justify-between">
                            <div>
                                <div class="text-sm font-mono text-gray-500">
                                    <span>SALES</span>
                                </div>
                                <div class="flex pt-2 pb-2 text-md text-gray-600">
                                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                            <path fill="#000" d="M12.628 21.412l5.969-5.97 1.458 3.71-12.34 4.848-4.808-12.238 9.721 9.65zm-1.276-21.412h-9.352v9.453l10.625 10.547 9.375-9.375-10.648-10.625zm4.025 9.476c-.415-.415-.865-.617-1.378-.617-.578 0-1.227.241-2.171.804-.682.41-1.118.584-1.456.584-.361 0-1.083-.408-.961-1.218.052-.345.25-.697.572-1.02.652-.651 1.544-.848 2.276-.106l.744-.744c-.476-.476-1.096-.792-1.761-.792-.566 0-1.125.227-1.663.677l-.626-.627-.698.699.653.652c-.569.826-.842 2.021.076 2.938 1.011 1.011 2.188.541 3.413-.232.6-.379 1.083-.563 1.475-.563.589 0 1.18.498 1.078 1.258-.052.386-.26.763-.621 1.122-.451.451-.904.679-1.347.679-.418 0-.747-.192-1.049-.462l-.739.739c.463.458 1.082.753 1.735.753.544 0 1.087-.201 1.612-.597l.54.538.697-.697-.52-.521c.743-.896 1.157-2.209.119-3.247zm-9.678-7.476c.938 0 1.699.761 1.699 1.699 0 .938-.761 1.699-1.699 1.699-.938 0-1.699-.761-1.699-1.699 0-.938.761-1.699 1.699-1.699z"/>
                                        </svg>
                                        <span class="text-md text-gray-600 ml-2">55</span>
                                </div>
                            </div>
                            <div class="pr-3">
                                <div class="text-xs text-gray-400 flex gap-1">
                                    <button class="border border-gray-300 p-2 font-bold">MONTHLY</button>
                                    <button class="border border-gray-300 p-2 font-bold">WEEKLY</button>
                                    <button class="border border-gray-300 p-2 font-bold">DAILY</button>
                                </div>
                            </div>
                       </div>
                       <new-sales-chart class="" />  
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
 import OrderChart from '../Admin/Components/OrderChart.vue'
 import NewUserChart from '../Admin/Components/NewUserChart.vue'



 export default{
    
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
        AdminLayout,
    },
    
 }
</script>

