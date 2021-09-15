<template>
   <AdminLayout>
       <template #header>
            <nav class=" bg-blue-400 ">
                <div class="flex justify-between self-center h-12">
                    <div class="flex items-center ml-3">
                        <h4 class="text-md font-semiblod font-mono text-white">DASHBOARD</h4>
                    </div>
                    <div class="mr-3 flex items-center">
                        <jet-dropdown align="right" width="48">
                            <template #trigger>
                                <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                </button>

                                <span v-else class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ $page.props.user.name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Manage Account
                                </div>

                                <jet-dropdown-link :href="route('profile.show')">
                                    Profile
                                </jet-dropdown-link>


                                <!-- Authentication -->
                                <form @submit.prevent="logout">
                                    <jet-dropdown-link as="button">
                                        Log Out
                                    </jet-dropdown-link>
                                </form>
                            </template>
                        </jet-dropdown>
                    </div>
                </div>
            </nav>
       </template>
       <div>
           <div class="m-2 container-fluid bg-white">
                <div class="w-full h-1/2 bg-dark">
                    <div class="pl-8 pt-2 text-sm text-gray-100">
                        Sales Chart
                    </div>
                    <div class="flex">
                        <order-chart class="h-full m-8"/>  
                    </div>
                </div>
           </div>
       </div>
       <div class="flex">
            <div class="w-1/2">
                    <sales-chart class="" />  
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
 import SalesChart from '../Admin/Components/SalesChart.vue'
 import OrderChart from '../Admin/Components/OrderChart.vue'


 export default{
    
     components:
    {
        JetApplicationMark,
        JetBanner,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
        SalesChart,
        OrderChart,
        AdminLayout,
    }
 }
</script>

