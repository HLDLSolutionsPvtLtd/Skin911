<template>
<div class="sm:grid sm:grid-cols-12 min-h-screen overflow-hidden">
    <!-- side navbar -->
    <div class="col-span-2 bg-white shadow-lg border-r h-screen">
            <div class="border-b my-1">
                <div class="p-4 flex justify-center">
                    <jet-logo></jet-logo>
                </div>
            </div>
            <div class="">
                <div class="m-1 h-full ">
                    <div class="p-3 pl-6">
                        <span class="text-sm text-gray-700 font-bold tracking-wider">MENU</span>
                    </div>
                    <ul style="height:calc(100vh - 250px)" class="p-2 overflow-y-scroll 2xl:overflow-hidden">
                        <li class="flex m-1 hover:bg-gray-100 p-3 w-full">
                            <Link class="flex text-sm text-pink-700" :href="route('admin.dashboard')" :active="route().current('admin.products')">
                                <!-- <jet-application-mark class="block h-9 w-auto" /> -->
                                <div class="flex justify-center self-center items-center">
                                        <div class="bg-gray-200 shadow-lg p-1 flex items-center justify-center rounded-md mr-2">
                                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-pink-400" fill-rule="evenodd" clip-rule="evenodd">
                                                <path d="M22 11.414v12.586h-20v-12.586l-1.293 1.293-.707-.707 12-12 12 12-.707.707-1.293-1.293zm-6 11.586h5v-12.586l-9-9-9 9v12.586h5v-9h8v9zm-1-7.889h-6v7.778h6v-7.778z"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs uppercase font-bold text-gray-500 tracking-wider">Dashboard</span>
                                </div>
                            </Link>
                        </li>
                        <li class="w-full m-1 cursor-pointer">
                            <div @click="collapse_product=!collapse_product" class="p-3 flex justify-between" >
                                    <div class="flex justify-center self-center items-center">
                                        <div class="bg-gray-200 shadow-lg p-1 flex items-center justify-center rounded-md mr-2">
                                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-pink-400" fill-rule="evenodd" clip-rule="evenodd">
                                                <path d="M23 6.066v12.065l-11.001 5.869-11-5.869v-12.131l11-6 11.001 6.066zm-21.001 11.465l9.5 5.069v-10.57l-9.5-4.946v10.447zm20.001-10.388l-9.501 4.889v10.568l9.501-5.069v-10.388zm-5.52 1.716l-9.534-4.964-4.349 2.373 9.404 4.896 4.479-2.305zm-8.476-5.541l9.565 4.98 3.832-1.972-9.405-5.185-3.992 2.177z"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs uppercase font-bold text-gray-500 tracking-wider">Products</span>
                                    </div>
                            </div>
                            <div  class="overflow-hidden ml-8 list-inside transition-all duration-800 ease-in-out ">
                                <Link class="text-gray-500 tracking-wider" :active="route().current('allproducts')" :href="route('allproducts')">
                                    <div class="hover:bg-gray-100 p-4">
                                        <!-- <jet-application-mark class="block h-9 w-auto" /> -->
                                        <span class="text-xs uppercase font-bold tracking-wider">All</span>
                                    </div>
                                </Link>
                                <Link class="text-gray-500 tracking-wider " :href="route('addproduct')">
                                    <div class="hover:bg-gray-100 p-4">
                                        <!-- <jet-application-mark class="block h-9 w-auto" /> -->
                                        <span class="text-xs uppercase font-bold tracking-wider">Add</span>
                                    </div>
                                </Link>
                            </div>
                        </li>
                        <li class="w-full m-1">
                            <Link :href="route('admin.brands')" class="p-3 hover:bg-gray-100 flex justify-between" >
                                    <div class="flex items-center">
                                        <div class="bg-gray-200 shadow-lg p-1 flex items-center justify-center rounded-md mr-2">
                                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-pink-400" fill-rule="evenodd" clip-rule="evenodd">
                                                <path d="M12.434 22.586l7.859-7.858.707.707-8.565 8.565-.001-.001v.001l-12.434-12.434.707-.707 11.727 11.727zm-.033-1.7l-12.401-12.405v-8.481h8.441l12.445 12.401-8.485 8.485zm-4.373-19.886h-7.028v7.067l11.401 11.405 7.07-7.07s-7.534-7.506-11.443-11.402zm-1.598 2.594c.78.78.78 2.048 0 2.828-.781.781-2.048.781-2.829 0-.78-.78-.78-2.048 0-2.828.781-.781 2.048-.781 2.829 0zm-.707.707c.39.39.39 1.024 0 1.414-.391.39-1.024.39-1.414 0-.391-.39-.391-1.024 0-1.414.39-.39 1.023-.39 1.414 0z"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs uppercase font-bold text-gray-500 tracking-wider">Brands</span>
                                    </div>
                            </Link>
                        </li>
                        <li class="w-full m-1">
                            <Link href="/admin/order">
                                 <div class="p-3 flex hover:bg-gray-100 justify-between" >
                                    <div class="flex items-center">
                                        <div class="bg-gray-200 shadow-lg p-1 flex items-center justify-center rounded-md mr-2">
                                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-pink-400" fill-rule="evenodd" clip-rule="evenodd">
                                                <path d="M10 20.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.305-15l-3.432 12h-10.428l-3.777-9h-2.168l4.615 11h13.239l3.474-12h1.929l.743-2h-4.195zm-5.805 0h-2v-2h-2v2h-2v2h2v2h2v-2h2v-2zm0 5h-6v2h6v-2zm0 3h-6v2h6v-2z"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs uppercase font-bold text-gray-500 tracking-wider">Orders</span>
                                    </div>
                                </div>
                            </Link>
                        </li>
                        <li class="w-full m-1">
                            <Link :href="route('admin.categories')">
                                <div class="p-3 hover:bg-gray-100 flex justify-between" >
                                    <div class="flex items-center">
                                        <div class="bg-gray-200 shadow-lg p-1 flex items-center justify-center rounded-md mr-2">
                                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-pink-400" fill-rule="evenodd" clip-rule="evenodd">
                                                <path d="M9.484 15.696l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm0-5l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm0-5l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm10.516 11.304h-8v1h8v-1zm0-5h-8v1h8v-1zm0-5h-8v1h8v-1zm4-5h-24v20h24v-20zm-1 19h-22v-18h22v18z"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs uppercase font-bold text-gray-500 tracking-wider">Categories</span>
                                    </div>
                                </div>
                            </Link>
                        </li>
                        <li class="w-full m-1">
                            <Link :href="route('admin.banners')">
                                <div class="p-3 hover:bg-gray-100 flex justify-between" >
                                    <div class="flex items-center">
                                        <div class="bg-gray-200 shadow-lg p-1 flex items-center justify-center rounded-md mr-2">
                                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-pink-400" fill-rule="evenodd" clip-rule="evenodd">
                                                <path d="M24 22h-24v-20h24v20zm-1-19h-22v18h22v-18zm-1 16h-19l4-7.492 3 3.048 5.013-7.556 6.987 12zm-11.848-2.865l-2.91-2.956-2.574 4.821h15.593l-5.303-9.108-4.806 7.243zm-4.652-11.135c1.38 0 2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5-2.5-1.12-2.5-2.5 1.12-2.5 2.5-2.5zm0 1c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5z"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs uppercase font-bold text-gray-500 tracking-wider">Banners</span>
                                    </div>
                                </div>
                            </Link>
                        </li>
                        <li class="w-full m-1">
                            <Link :href="route('admin.shipping')">
                                <div class="p-3 hover:bg-gray-100 flex justify-between" >
                                    <div class="flex items-center">
                                        <div class="bg-gray-200 shadow-lg p-1 flex items-center justify-center rounded-md mr-2">
                                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-pink-400" fill-rule="evenodd" clip-rule="evenodd">
                                                <path d="M5 11v1h8v-7h-10v-1c0-.552.448-1 1-1h10c.552 0 1 .448 1 1v2h4.667c1.117 0 1.6.576 1.936 1.107.594.94 1.536 2.432 2.109 3.378.188.312.288.67.288 1.035v4.48c0 1.089-.743 2-2 2h-1c0 1.656-1.344 3-3 3s-3-1.344-3-3h-4c0 1.656-1.344 3-3 3s-3-1.344-3-3h-1c-.552 0-1-.448-1-1v-6h-2v-2h7v2h-3zm3 5.8c.662 0 1.2.538 1.2 1.2 0 .662-.538 1.2-1.2 1.2-.662 0-1.2-.538-1.2-1.2 0-.662.538-1.2 1.2-1.2zm10 0c.662 0 1.2.538 1.2 1.2 0 .662-.538 1.2-1.2 1.2-.662 0-1.2-.538-1.2-1.2 0-.662.538-1.2 1.2-1.2zm-3-2.8h-10v2h.765c.549-.614 1.347-1 2.235-1 .888 0 1.686.386 2.235 1h5.53c.549-.614 1.347-1 2.235-1 .888 0 1.686.386 2.235 1h1.765v-4.575l-1.711-2.929c-.179-.307-.508-.496-.863-.496h-4.426v6zm1-5v3h5l-1.427-2.496c-.178-.312-.509-.504-.868-.504h-2.705zm-16-3h8v2h-8v-2z"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs uppercase font-bold text-gray-500 tracking-wider">Shipping</span>
                                    </div>
                                </div>
                            </Link>
                        </li>
                        <li class="w-full m-1">
                            <Link :href="route('admin.discounts')">
                                <div class="p-3 hover:bg-gray-100 flex justify-between" >
                                    <div class="flex items-center">
                                        <div class="bg-gray-200 shadow-lg p-1 flex items-center justify-center rounded-md mr-2">
                                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-pink-400" fill-rule="evenodd" clip-rule="evenodd">
                                                <path d="M12.628 21.412l5.969-5.97 1.458 3.71-12.34 4.848-4.808-12.238 9.721 9.65zm-1.276-21.412h-9.352v9.453l10.625 10.547 9.375-9.375-10.648-10.625zm4.025 9.476c-.415-.415-.865-.617-1.378-.617-.578 0-1.227.241-2.171.804-.682.41-1.118.584-1.456.584-.361 0-1.083-.408-.961-1.218.052-.345.25-.697.572-1.02.652-.651 1.544-.848 2.276-.106l.744-.744c-.476-.476-1.096-.792-1.761-.792-.566 0-1.125.227-1.663.677l-.626-.627-.698.699.653.652c-.569.826-.842 2.021.076 2.938 1.011 1.011 2.188.541 3.413-.232.6-.379 1.083-.563 1.475-.563.589 0 1.18.498 1.078 1.258-.052.386-.26.763-.621 1.122-.451.451-.904.679-1.347.679-.418 0-.747-.192-1.049-.462l-.739.739c.463.458 1.082.753 1.735.753.544 0 1.087-.201 1.612-.597l.54.538.697-.697-.52-.521c.743-.896 1.157-2.209.119-3.247zm-9.678-7.476c.938 0 1.699.761 1.699 1.699 0 .938-.761 1.699-1.699 1.699-.938 0-1.699-.761-1.699-1.699 0-.938.761-1.699 1.699-1.699z"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs uppercase font-bold text-gray-500 tracking-wider">Discounts</span>
                                    </div>
                                </div>
                            </Link>
                        </li>
                        <li class="w-full m-1">
                            <Link :href="route('admin.blog')">
                                <div class="p-3 hover:bg-gray-100 flex justify-between" >
                                    <div class="flex items-center">
                                        <div class="bg-gray-200 shadow-lg p-1 flex items-center justify-center rounded-md mr-2">
                                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-pink-400" fill-rule="evenodd" clip-rule="evenodd">
                                                <path d="M13 16h-2v-6h2v6zm-1-10.25c.69 0 1.25.56 1.25 1.25s-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25.56-1.25 1.25-1.25zm0-2.75c5.514 0 10 3.592 10 8.007 0 4.917-5.145 7.961-9.91 7.961-1.937 0-3.383-.397-4.394-.644-1 .613-1.595 1.037-4.272 1.82.535-1.373.723-2.748.602-4.265-.838-1-2.025-2.4-2.025-4.872-.001-4.415 4.485-8.007 9.999-8.007zm0-2c-6.338 0-12 4.226-12 10.007 0 2.05.738 4.063 2.047 5.625.055 1.83-1.023 4.456-1.993 6.368 2.602-.47 6.301-1.508 7.978-2.536 1.418.345 2.775.503 4.059.503 7.084 0 11.91-4.837 11.91-9.961-.001-5.811-5.702-10.006-12.001-10.006z"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs uppercase font-bold text-gray-500 tracking-wider">Blog</span>
                                    </div>
                                </div>
                            </Link>
                        </li>
                        <li class="w-full m-1">
                            <div @click="logout()" class="p-3 hover:bg-gray-100 flex cursor-pointer justify-between" >
                                <div class="flex items-center">
                                    <div class="bg-gray-200 shadow-lg p-1 flex items-center justify-center rounded-md mr-2">
                                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-pink-400" fill-rule="evenodd" clip-rule="evenodd">
                                            <path d="M0 2v20h14v-2h-12v-16h12v-2h-14zm18 7.408l2.963 2.592-2.963 2.592v-1.592h-8v-2h8v-1.592zm-2-4.408v4h-8v6h8v4l8-7-8-7z"/>
                                        </svg>
                                    </div>
                                    <span class="text-xs uppercase font-bold text-gray-500 tracking-wider">Logout</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
        </div>
    </div>
    <main class="col-span-10 bg-gray-100 w-full overflow-y-scroll 2xl:overflow-hidden h-screen">
        <header class="" >
            <div class="">
               <nav class="rounded-sm bg-white mt-1 ml-4 mr-4 shadow-lg">
                    <div class="flex justify-between self-center p-3">
                        <div class="flex items-center ml-3">
                            <h4 class="text-md font-semibold text-gray-500">
                                <slot name="header"></slot>
                            </h4>
                        </div>
                        <div class="mr-3 flex items-center">
                            <!-- <div class="relative m-2">
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
                            </div> -->
                            <jet-dropdown align="right" width="48">
                                <template #trigger>
                                    <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
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
                this.$inertia.post(route('admin.logout'));
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
