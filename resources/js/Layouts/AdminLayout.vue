<template>
<div class="grid grid-cols-12 min-h-screen ">
    <!-- side navbar -->
    <sidenav class="col-span-2 bg-white shadow-lg border-r h-screen">
            <div class="border-b">
                <div class="bg-white p-4 flex justify-center">
                    <jet-logo></jet-logo>
                </div>
            </div>
            <div class="">
                <div class="m-1 h-full">
                    <div class="p-3 pl-6">
                        <span class="text-sm text-gray-500 font-bold">MENU</span>
                    </div>
                    <ul class="h-full p-2">
                        <li class="flex m-1 hover:bg-blue-900 p-3 w-full">
                            <Link class="flex text-sm text-pink-700" :href="route('admin.dashboard')" :active="route().current('admin.products')">
                                <!-- <jet-application-mark class="block h-9 w-auto" /> -->
                                <div class="flex justify-center self-center items-center">
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-pink-700 mr-4" fill-rule="evenodd" clip-rule="evenodd">
                                            <path d="M13 23h-10l-.002-10.016 8.974-7.989 9.011 7.989.017 10.016h-3v-7h-5v7zm-6-7h-2v3h2v-3zm4 0h-2v3h2v-3zm1-15l11.981 10.632-1.328 1.493-10.672-9.481-10.672 9.481-1.328-1.493 12.019-10.632z"/>
                                        </svg>
                                        <span class="text-xs uppercase font-bold text-black">Dashboard</span>
                                </div>
                            </Link>
                        </li>
                        <li class="w-full m-1 cursor-pointer">
                            <div @click="collapse_product=!collapse_product" class="p-3 flex justify-between" >
                                    <div class="flex justify-center self-center items-center">
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-pink-700 mr-4" fill-rule="evenodd" clip-rule="evenodd">
                                            <path d="M11.499 12.03v11.971l-10.5-5.603v-11.835l10.5 5.467zm11.501 6.368l-10.501 5.602v-11.968l10.501-5.404v11.77zm-16.889-15.186l10.609 5.524-4.719 2.428-10.473-5.453 4.583-2.499zm16.362 2.563l-4.664 2.4-10.641-5.54 4.831-2.635 10.474 5.775z"/>
                                        </svg>
                                        <span class="text-xs uppercase font-bold text-black">Products</span>
                                    </div>
                                    <svg width="18" height="18" :class="{'rotate90': collapse_product}" viewBox="0 0 24 24" class="fill-current p-1 text-pink-700" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                        <path d="M4 .755l14.374 11.245-14.374 11.219.619.781 15.381-12-15.391-12-.609.755z"/>
                                    </svg>
                            </div>
                            <ul :class="{'h-0': !collapse_product}" class="overflow-hidden ml-8 list-inside transition-all duration-800 ease-in-out ">
                                <li class="hover:bg-blue-900 p-4">
                                    <Link class="text-gray-400" :active="route().current('allproducts')" :href="route('allproducts')">
                                        <!-- <jet-application-mark class="block h-9 w-auto" /> -->
                                        <span class="text-xs uppercase font-bold">All</span>
                                    </Link>
                                </li>
                                <li class="hover:bg-blue-900 p-4">
                                    <Link class="text-gray-400" :href="route('addproduct')">
                                        <!-- <jet-application-mark class="block h-9 w-auto" /> -->
                                        <span class="text-xs uppercase font-bold">Add</span>
                                    </Link>
                                </li>
                            </ul>
                        </li>
                        <li class="w-full m-1">
                            <Link :href="route('admin.brands')" class="p-3 flex justify-between" >
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" class="fill-current text-pink-700 mr-4" height="24" viewBox="0 0 24 24">
                                            <path d="M10.605 0h-10.605v10.609l13.392 13.392 10.608-10.605-13.395-13.396zm4.477 10.687l3.535 3.533-.547.547-3.533-3.534.545-.546zm-11.496-4.273c-.781-.782-.781-2.048 0-2.829s2.049-.78 2.828-.001c.781.783.782 2.048 0 2.83-.781.782-2.046.78-2.828 0zm9.651 13.189l-3.536-3.535.547-.546 3.534 3.536-.545.545zm1.115-1.117l-3.534-3.534.728-.729 3.535 3.536-.729.727zm1.31-1.311l-3.534-3.533.546-.546 3.535 3.536-.547.543zm1.135-1.135l-3.533-3.534.729-.729 3.534 3.536-.73.727zm2.404-2.4l-3.537-3.535.4-.4 3.537 3.535-.4.4z"/>
                                        </svg>
                                        <span class="text-xs uppercase font-bold text-black">Brands</span>
                                    </div>
                            </Link>
                        </li>
                        <li class="w-full m-1">
                            <div class="p-3 flex justify-between" >
                                    <div class="flex items-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-pink-700 mr-4" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M21.698 10.658l2.302 1.342-12.002 7-11.998-7 2.301-1.342 9.697 5.658 9.7-5.658zm-9.7 10.657l-9.697-5.658-2.301 1.343 11.998 7 12.002-7-2.302-1.342-9.7 5.657zm12.002-14.315l-12.002-7-11.998 7 11.998 7 12.002-7z"/>
                                        </svg>
                                        <span class="text-xs uppercase font-bold text-black">Orders</span>
                                    </div>
                                    
                                    <svg width="18" height="18" :class="{'rotate90': collapse_orders}" viewBox="0 0 24 24" class="fill-current p-1 text-pink-700" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                        <path d="M4 .755l14.374 11.245-14.374 11.219.619.781 15.381-12-15.391-12-.609.755z"/>
                                    </svg>
                            </div>
                        </li>
                        <li class="w-full m-1">
                            <Link :href="route('admin.categories')">
                                <div class="p-3 flex justify-between" >
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-pink-700 mr-4" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M22 13v-13h-20v24h8.409c4.857 0 3.335-8 3.335-8 3.009.745 8.256.419 8.256-3zm-4-7h-12v-1h12v1zm0 3h-12v-1h12v1zm0 3h-12v-1h12v1zm-2.091 6.223c2.047.478 4.805-.279 6.091-1.179-1.494 1.998-5.23 5.708-7.432 6.881 1.156-1.168 1.563-4.234 1.341-5.702z"/>
                                        </svg>
                                        <span class="text-xs uppercase font-bold text-black">Categories</span>
                                    </div>
                                </div>
                            </Link>
                        </li>
                        <li class="w-full m-1">
                            <div class="p-3 flex justify-between" >
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="fill-current text-pink-700 mr-4" viewBox="0 0 24 24">
                                        <path d="M0 2v20h14v-2h-12v-16h12v-2h-14zm18 7.408l2.963 2.592-2.963 2.592v-1.592h-8v-2h8v-1.592zm-2-4.408v4h-8v6h8v4l8-7-8-7z"/>
                                    </svg>
                                    <span class="text-xs uppercase font-bold text-black">Logout</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
        </div>
    </sidenav>
    <main class="col-span-10 bg-gray-100 w-full overflow-hidden h-screen">
        <header class="" >
            <div class="">
               <nav class="bg-white rounded-sm ml-4 mr-4 shadow-lg">
                    <div class="flex justify-between self-center p-3">
                        <div class="flex items-center ml-3">
                            <h4 class="text-md font-semibold text-gray-400">
                                <slot name="header"></slot>
                            </h4>
                        </div>
                        <div class="mr-3 flex items-center">
                            <div class="relative m-2">
                                <svg class="h-5 w-5" viewBox="0 0 512 512">
                                    <path fill="#000" d="M16,112V496H496V112ZM236.8,341.6a32.167,32.167,0,0,0,38.4,0L298.667,324,464,448v16H48V448L213.333,324ZM256,316,48,160V144H464v16ZM48,200,186.667,304,48,408ZM464,408,325.333,304,464,200Z"></path>
                                </svg>
                                <span class="absolute text-vs -m-1 top-0 right-0 bg-blue-500 rounded-full  p-1"></span>
                            </div>
                            <div class="m-2 relative mr-3">
                                <svg class="h-5 w-5" viewBox="0 0 500 500">
                                    <path fill="#000" d="M450.27,348.569,406.6,267.945V184c0-83.813-68.187-152-152-152s-152,68.187-152,152v83.945L58.928,348.568A24,24,0,0,0,80.031,384h86.935c-.238,2.636-.367,5.3-.367,8a88,88,0,0,0,176,0c0-2.7-.129-5.364-.367-8h86.935a24,24,0,0,0,21.1-35.431ZM310.6,392a56,56,0,1,1-111.419-8H310.018A56.14,56.14,0,0,1,310.6,392ZM93.462,352,134.6,276.055V184a120,120,0,0,1,240,0v92.055L415.736,352Z"></path>
                                </svg>
                                <span class="absolute text-vs -m-1 top-0 right-0 bg-red-500 rounded-full  p-1"></span>
                            </div>
                            <jet-dropdown align="right" width="48">
                                <template #trigger>
                                    <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-6 w-6 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
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
            </div>
        </header>
        <slot></slot>
        
    </main>
</div>
</template>
<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetLogo from '@/Jetstream/logo.vue'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
    import { Link } from '@inertiajs/inertia-vue3'
    import Button from '../Jetstream/Button.vue'

    export default {
        
        components: {
                JetApplicationMark,
                JetBanner,
                JetDropdown,
                JetDropdownLink,
                JetNavLink,
                JetLogo,
                JetResponsiveNavLink,
                Link
        },

        data() {
            return {
                showingNavigationDropdown: false,
                touchstartX : 0,
                touchendX : 0,
                touchtravelX: 0,
                collapse_product: false,
            }
        },

        methods: {

            logout() {
                this.$inertia.post(route('logout'));
            },
            close()
            {
                this.showingNavigationDropdown = false;
            },
            toggleSearch()
            {
                this.search = !this.search;
                console.log(this.search);
            },
            touchstart: function(e){
                this.touchstartX = e.changedTouches[0].screenX;
                console
               
            },
            touchend: function(e){
                this.touchendX = e.changedTouches[0].screenX;
                if (this.touchendX > this.touchstartX)
                {
                    this.touchtravelX = this.touchendX - this.touchstartX;
                    if(this.touchtravelX > 100)
                    {
                        this.close();
                    }
                        
                    
                }
            },
        
        },  
    }
</script>
