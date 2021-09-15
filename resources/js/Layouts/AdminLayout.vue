<template>
<div class="grid grid-cols-7">
    <!-- side navbar -->
    <side-nav class="col-span-1 bg-gray-900 h-full ">
        <div class="p-1 pb-6 flex justify-center mt-4">
            <h4 class="text-xl font-serif font-bold text-blue-900">Skin911</h4>
        </div>
        <div class="flex justify-start ml-4">
            <ul>
               
                <li class="text-sm text-white p-2">
                     <inertia-link :href="route('admin.dashboard')">
                        <!-- <jet-application-mark class="block h-9 w-auto" /> -->
                        <h4 class="text-white font-serif font-bold ml-2">Dashboard</h4>
                    </inertia-link>
                </li>
                 <li class="text-sm text-white p-2">
                     <inertia-link :href="route('admin.products')">
                        <!-- <jet-application-mark class="block h-9 w-auto" /> -->
                        <h4 class="text-white font-serif font-bold ml-2">Products</h4>
                    </inertia-link>
                </li>
                 <li class="text-sm text-white p-2">
                     <inertia-link>
                        <!-- <jet-application-mark class="block h-9 w-auto" /> -->
                        <h4 class="text-white font-serif font-bold ml-2">Orders</h4>
                    </inertia-link>
                </li>
                 <li class="text-sm text-white p-2">
                     <inertia-link>
                        <!-- <jet-application-mark class="block h-9 w-auto" /> -->
                        <h4 class="text-white font-serif font-bold ml-2">Settings</h4>
                    </inertia-link>
                </li>
            </ul>
        </div>
    </side-nav>
    <main class="col-span-6 w-full h-screen">
        <header class="bg-white shadow" v-if="$slots.header">
            <div class="">
                <slot name="header"></slot>
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
        
        },

        data() {
            return {
                showingNavigationDropdown: false,
                touchstartX : 0,
                touchendX : 0,
                touchtravelX: 0,
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
