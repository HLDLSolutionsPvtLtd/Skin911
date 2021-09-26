<template>
<div class="grid grid-cols-12 min-h-screen ">
    <!-- side navbar -->
    <sidenav class="col-span-2 bg-dark h-screen">
            <div class="">
                <div class="bg-dark-header flex justify-center">
                    <h4 class="text-xl font-serif font-bold text-blue-900 p-4">SKIN911</h4>
                </div>
            </div>
            <div class="">
                <div class="m-1 h-full rounded-2xl bg-dark-header border-2 border-blue-900">
                    <ul class="h-full p-2">
                        <li class="flex hover:bg-blue-900 bg-blue-900 p-2 w-full rounded-md">
                            <inertia-link class="p-2 pl-2 flex text-ct" :href="route('admin.dashboard')" :active="route().current('admin.products')">
                                <!-- <jet-application-mark class="block h-9 w-auto" /> -->
                                <div class="flex w-full justify-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" height="20" viewBox="0 0 24 24">
                                            <path fill="#fff" d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.617 0-12 5.383-12 12s5.383 12 12 12 12-5.383 12-12-5.383-12-12-12zm8.021 9.593c-.141-.427-.314-.844-.516-1.242l-2.454 1.106c.217.393.39.81.517 1.242l2.453-1.106zm-12.573-.904c.271-.354.58-.674.919-.957l-1.89-1.968c-.328.294-.637.615-.918.957l1.889 1.968zm1.715-1.514c.379-.221.781-.396 1.198-.523l-1.034-2.569c-.41.142-.812.318-1.198.524l1.034 2.568zm-2.759 3.616c.121-.435.288-.854.498-1.25l-2.47-1.067c-.197.403-.364.823-.498 1.25l2.47 1.067zm9.434-6.2c-.387-.205-.79-.379-1.2-.519l-1.024 2.573c.417.125.82.299 1.2.519l1.024-2.573zm2.601 2.13c-.282-.342-.59-.664-.918-.957l-1.89 1.968c.339.283.647.604.918.957l1.89-1.968zm-5.791-3.059c-.219-.017-.437-.026-.649-.026s-.431.009-.65.026v2.784c.216-.025.434-.038.65-.038.216 0 .434.013.649.038v-2.784zm-.648 13.782c-1.294 0-2.343-1.049-2.343-2.343 0-.883.489-1.652 1.21-2.051l1.133-5.31 1.133 5.309c.722.399 1.21 1.168 1.21 2.051 0 1.295-1.049 2.344-2.343 2.344z"/>
                                        </svg>
                                        <span class="text-sm pl-8 text-center">Dashboard</span>
                                </div>
                            </inertia-link>
                        </li>
                        <li class="w-full m-1">
                            <div @click="collapse_product=!collapse_product" class="p-4 flex justify-between" >
                                    <span class="text-sm text-white">Products</span>
                                    <svg width="18" height="18" :class="{'rotate90': collapse_product}" viewBox="0 0 24 24" class="fill-current p-1 text-white" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                        <path d="M4 .755l14.374 11.245-14.374 11.219.619.781 15.381-12-15.391-12-.609.755z"/>
                                    </svg>
                            </div>
                            <ul :class="{'expand': collapse_product}" class="hidden list-disc ml-4 list-inside transition duration-700 ease-in-out -translate-y-10">
                                <li class="hover:bg-blue-900 p-4">
                                    <inertia-link class="text-gray-400" :active="route().current('admin.products')" :href="route('admin.products')">
                                        <!-- <jet-application-mark class="block h-9 w-auto" /> -->
                                        <span class="text-sm font-bold">All</span>
                                    </inertia-link>
                                </li>
                                <li class="hover:bg-blue-900 p-4">
                                    <inertia-link class="text-gray-400" :href="route('admin.addproduct')">
                                        <!-- <jet-application-mark class="block h-9 w-auto" /> -->
                                        <span class="text-sm font-bold">Add</span>
                                    </inertia-link>
                                </li>
                            </ul>
                        </li>
                        <li class="w-full m-1">
                            <div class="p-4 flex justify-between" >
                                    <span class="text-sm text-white">Brands</span>
                                    <svg width="18" height="18" :class="{'rotate90': collapse_product}" viewBox="0 0 24 24" class="fill-current p-1 text-white" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                        <path d="M4 .755l14.374 11.245-14.374 11.219.619.781 15.381-12-15.391-12-.609.755z"/>
                                    </svg>
                            </div>
                        </li>
                        <li class="w-full m-1">
                            <div class="p-4 flex justify-between" >
                                    <span class="text-sm text-white">Orders</span>
                                    <svg width="18" height="18" :class="{'rotate90': collapse_product}" viewBox="0 0 24 24" class="fill-current p-1 text-white" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                        <path d="M4 .755l14.374 11.245-14.374 11.219.619.781 15.381-12-15.391-12-.609.755z"/>
                                    </svg>
                            </div>
                        </li>
                        <li class="w-full m-1">
                            <div class="p-4 flex justify-between" >
                                    <span class="text-sm text-white">Categories</span>
                                    <svg width="18" height="18" :class="{'rotate90': collapse_product}" viewBox="0 0 24 24" class="fill-current p-1 text-white" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                        <path d="M4 .755l14.374 11.245-14.374 11.219.619.781 15.381-12-15.391-12-.609.755z"/>
                                    </svg>
                            </div>
                        </li>
                        <li class="w-full m-1">
                            <div class="p-4 flex justify-between" >
                                    <span class="text-sm text-white">Logout</span>
                                    
                            </div>
                        </li>
                    </ul>
                </div>
        </div>
    </sidenav>
    <main class="col-span-10 bg-dark-header w-full overflow-hidden h-screen">
        <header class="bg-white shadow" >
            <div class="">
               <nav class="bg-dark">
                    <div class="flex justify-between self-center p-3">
                        <div class="flex items-center ml-3">
                            <h4 class="text-md font-semiblod font-serif text-gray-500">
                                <slot name="header"></slot>
                            </h4>
                        </div>
                        <div class="mr-3 flex items-center">
                            <div class="relative m-2">
                                <svg class="h-4 w-4" viewBox="0 0 512 512">
                                    <path fill="#ffffffbf" d="M16,112V496H496V112ZM236.8,341.6a32.167,32.167,0,0,0,38.4,0L298.667,324,464,448v16H48V448L213.333,324ZM256,316,48,160V144H464v16ZM48,200,186.667,304,48,408ZM464,408,325.333,304,464,200Z"></path>
                                </svg>
                                <span class="absolute text-vs -m-1 top-0 right-0 bg-blue-500 rounded-full  p-1"></span>
                            </div>
                            <div class="m-2 relative mr-3">
                                <svg class="h-4 w-4" viewBox="0 0 500 500">
                                    <path fill="#ffffffbf" d="M450.27,348.569,406.6,267.945V184c0-83.813-68.187-152-152-152s-152,68.187-152,152v83.945L58.928,348.568A24,24,0,0,0,80.031,384h86.935c-.238,2.636-.367,5.3-.367,8a88,88,0,0,0,176,0c0-2.7-.129-5.364-.367-8h86.935a24,24,0,0,0,21.1-35.431ZM310.6,392a56,56,0,1,1-111.419-8H310.018A56.14,56.14,0,0,1,310.6,392ZM93.462,352,134.6,276.055V184a120,120,0,0,1,240,0v92.055L415.736,352Z"></path>
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
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
    import Button from '../Jetstream/Button.vue'

    export default {
        
        components: {
                JetApplicationMark,
                JetBanner,
                JetDropdown,
                JetDropdownLink,
                JetNavLink,
                JetResponsiveNavLink,
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
