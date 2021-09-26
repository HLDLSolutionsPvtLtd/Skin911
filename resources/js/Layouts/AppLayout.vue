<template>
    <div>
        <Head :title="title" />

        <jet-banner />

        <div class="min-h-screen bg-gray-100">
            <div class="w-full bg-pink-200 text-pink-dark">
                <div class="flex justify-center">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="p-1" viewBox="0 0 24 24">
                            <path fill="#814252" d="M24 0l-6 22-8.129-7.239 7.802-8.234-10.458 7.227-7.215-1.754 24-12zm-15 16.668v7.332l3.258-4.431-3.258-2.901z"/>\
                        </svg>
                    </div>
                    <span class="pl-2 text-sm">Free shipping across India on all orders over</span>
                    <span class="pl-2 text-sm text-pink-dark font-semibold">&#8377;2800</span>
                </div>
            </div>
            <nav class="bg-pink sticky top-0 z-10 w-full border-b border-gray-100 border-b shadow-md">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-50">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex justify-center text-center text-white items-center self-center">
                                <Link class="flex" :href="route('dashboard')">
                                    <span class="text-4xl font-serif mr-1 font-bold">SKIN</span>
                                    <span class="text-md pt-1 font-mono font-bold">911</span>
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div @mouseover="shop = true" @mouseleave="shop = false" class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <jet-nav-link :href="route('products')"  class="font-bold text-white hover:text-white hover:border-b-4 hover:border-white ">
                                    CATEGORIES
                                    <div :class="{'modal-open': shop, 'modal-close': !shop}" class="absolute z-10 w-full left-0 right-0 top-16 bg-pink">
                                        <div class="grid grid-cols-12 bg-pink m-4">
                                            <div class="col-span-1">

                                            </div>
                                            <div class="col-span-2 border-r text-white border-gray-200">
                                                <span class="">FEATURED BRANDS</span>
                                                <ul>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>All Products</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>New Arrivals</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Best Sellers</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-span-2 ml-2 text-white justify-center">
                                                <span class="">SKIN CARE</span>
                                                <ul>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Double-Cleanse</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Exfoliator</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Toner</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-span-2 text-white justify-center">
                                                <span class="">SKIN CONCERN</span>
                                                <ul>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Acne</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Anti-Aging</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Dyness</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Oil Control</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Redness</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Sensitive</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Pigmentation</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-span-2 text-white justify-center">
                                                <span class="">SKIN TYPE</span>
                                                <ul>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Dry</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Oily</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Combination</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Normal</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </jet-nav-link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <jet-nav-link class="font-bold text-white hover:text-white hover:border-b-4 hover:border-white" :href="route('dashboard')" >
                                    BEST SELLER
                                </jet-nav-link>
                            </div>
                            <div @mouseover="routine = true" @mouseleave="routine = false" class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <jet-nav-link class="font-bold text-white hover:text-white hover:border-b-4 hover:border-white" :href="route('dashboard')">
                                    ROUTINES
                                     <div :class="{'modal-open': routine, 'modal-close': !routine}" class="absolute top-16 bg-pink">
                                         <ul class="m-2 ">
                                            <li class="hover:text-white text-pink-dark pt-2">
                                                <span>Collections</span>
                                            </li>
                                            <li class="hover:text-white text-pink-dark pt-2">
                                                <span>Gifts & Sets</span>
                                            </li>
                                            <li class="hover:text-white text-pink-dark pt-2">
                                                <span>Travels Kits & Minis</span>
                                            </li>
                                        </ul>
                                    </div>
                                </jet-nav-link>
                            </div>
                            <div @mouseover="brands = true" @mouseleave="brands = false" class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <jet-nav-link class="font-bold text-white hover:text-white hover:border-b-4 hover:border-white" :href="route('dashboard')">
                                    BRANDS
                                    <div :class="{'modal-open': brands, 'modal-close': !brands}" class="absolute w-full left-0 right-0 top-16 bg-pink transition transform translate duration-700 ease-in-out">
                                        <div class="grid grid-cols-12 bg-pink m-4">
                                            <div class="col-span-1">

                                            </div>
                                            <div class="col-span-2 border-r text-white border-gray-200">
                                                <span class="">FEATURED BRANDS</span>
                                                <ul>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>All Products</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>New Arrivals</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Best Sellers</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-span-2 ml-2 text-white justify-center">
                                                <span class="">SKIN CARE</span>
                                                <ul>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Double-Cleanse</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Exfoliator</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Toner</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-span-2 text-white justify-center">
                                                <span class="">SKIN CONCERN</span>
                                                <ul>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Acne</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Anti-Aging</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Dyness</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Oil Control</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Redness</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Sensitive</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Pigmentation</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-span-2 text-white justify-center">
                                                <span class="">SKIN TYPE</span>
                                                <ul>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Dry</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Oily</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Combination</span>
                                                    </li>
                                                    <li class="hover:text-gray-300 pt-2">
                                                        <span>Normal</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </jet-nav-link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <jet-nav-link class="font-bold text-white hover:text-white hover:border-b-4 hover:border-white" :href="route('dashboard')">
                                    SALE
                                </jet-nav-link>
                            </div>
                        </div>
                        <div class="hidden sm:flex-shrink-1 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <div class="font-bold rounded-md border border-gray-100 flex justify-center bg-white self-center">
                                <div class="ml-2">
                                    <svg width="20" height="20" class="h-10" viewBox="0,0,24,24">
                                        <path fill="#747b88" d="M3.438 9.754a6.415 6.415 0 016.408-6.409 6.415 6.415 0 016.409 6.409 6.416 6.416 0 01-6.409 6.408 6.416 6.416 0 01-6.408-6.408M21.816 20.87l-5.974-6.02a7.839 7.839 0 001.88-5.097c0-4.343-3.534-7.875-7.876-7.875-4.342 0-7.875 3.532-7.875 7.875 0 4.342 3.533 7.875 7.875 7.875a7.837 7.837 0 004.946-1.753l5.983 6.029a.73.73 0 001.037.004.733.733 0 00.004-1.038">
                                        </path>
                                    </svg>
                                </div>
                                <input type="search" placeholder="SEARCH" class="w-full border-0 placeholder-opacity-50 rounded-md focus:ring-0">
                            </div>
                        </div>
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <div class="">
                                <a href="/cart" class="font-bold flex justify-center self-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                                        <path fill="#fff" d="M6 23.73l-3-2.122v-14.2l3 1.359v14.963zm2-14.855v15.125l13-1.954v-15.046l-13 1.875zm5.963-7.875c-2.097 0-3.958 2.005-3.962 4.266l-.001 1.683c0 .305.273.54.575.494.244-.037.425-.247.425-.494v-1.681c.003-1.71 1.416-3.268 2.963-3.268.537 0 1.016.195 1.384.564.422.423.654 1.035.653 1.727v1.747c0 .305.273.54.575.494.243-.037.423-.246.423-.492l.002-1.749c.002-1.904-1.32-3.291-3.037-3.291zm-6.39 5.995c.245-.037.427-.247.427-.495v-2.232c.002-1.71 1.416-3.268 2.963-3.268l.162.015c.366-.283.765-.513 1.188-.683-.405-.207-.858-.332-1.35-.332-2.096 0-3.958 2.005-3.962 4.266v2.235c0 .306.272.538.572.494z"/>
                                    </svg>
                                    <div class="relative">
                                        <span class="rounded-full left-0 top-0 absolute h-2 w-2 bg-pink-900"></span>
                                    </div>
                                </a>
                            </div>
                            <div class="ml-3 relative">
                                <!-- Teams Dropdown -->
                                <jet-dropdown align="right" width="60" v-if="$page.props.jetstream.hasTeamFeatures">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                                {{ $page.props.user.current_team.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <div class="w-60">
                                            <!-- Team Management -->
                                            <template v-if="$page.props.jetstream.hasTeamFeatures">
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    Manage Team
                                                </div>

                                                <!-- Team Settings -->
                                                <jet-dropdown-link :href="route('teams.show', $page.props.user.current_team)">
                                                    Team Settings
                                                </jet-dropdown-link>

                                                <jet-dropdown-link :href="route('teams.create')" v-if="$page.props.jetstream.canCreateTeams">
                                                    Create New Team
                                                </jet-dropdown-link>

                                                <div class="border-t border-gray-100"></div>

                                                <!-- Team Switcher -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    Switch Teams
                                                </div>

                                                <template v-for="team in $page.props.user.all_teams" :key="team.id">
                                                    <form @submit.prevent="switchToTeam(team)">
                                                        <jet-dropdown-link as="button">
                                                            <div class="flex items-center">
                                                                <svg v-if="team.id == $page.props.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                                <div>{{ team.name }}</div>
                                                            </div>
                                                        </jet-dropdown-link>
                                                    </form>
                                                </template>
                                            </template>
                                        </div>
                                    </template>
                                </jet-dropdown>
                            </div>

                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
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

                                        <jet-dropdown-link :href="route('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                                            API Tokens
                                        </jet-dropdown-link>

                                        <div class="border-t border-gray-100"></div>

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

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <jet-responsive-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </jet-responsive-nav-link>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="flex-shrink-0 mr-3" >
                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                            </div>

                            <div>
                                <div class="font-medium text-base text-gray-800">{{ $page.props.user.name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ $page.props.user.email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">
                                Profile
                            </jet-responsive-nav-link>

                            <jet-responsive-nav-link :href="route('api-tokens.index')" :active="route().current('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                                API Tokens
                            </jet-responsive-nav-link>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout">
                                <jet-responsive-nav-link as="button">
                                    Log Out
                                </jet-responsive-nav-link>
                            </form>

                            <!-- Team Management -->
                            <template v-if="$page.props.jetstream.hasTeamFeatures">
                                <div class="border-t border-gray-200"></div>

                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Manage Team
                                </div>

                                <!-- Team Settings -->
                                <jet-responsive-nav-link :href="route('teams.show', $page.props.user.current_team)" :active="route().current('teams.show')">
                                    Team Settings
                                </jet-responsive-nav-link>

                                <jet-responsive-nav-link :href="route('teams.create')" :active="route().current('teams.create')" v-if="$page.props.jetstream.canCreateTeams">
                                    Create New Team
                                </jet-responsive-nav-link>

                                <div class="border-t border-gray-200"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Switch Teams
                                </div>

                                <template v-for="team in $page.props.user.all_teams" :key="team.id">
                                    <form @submit.prevent="switchToTeam(team)">
                                        <jet-responsive-nav-link as="button">
                                            <div class="flex items-center">
                                                <svg v-if="team.id == $page.props.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <div>{{ team.name }}</div>
                                            </div>
                                        </jet-responsive-nav-link>
                                    </form>
                                </template>
                            </template>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="w-full h-full">
                <slot></slot>
            </main>
            <footer class="flex w-full bg-gray-400 ">
                <div class="grid grid-cols-5 m-4">
                    <div class="flex justify-center">
                        <span class="text-4xl text-pink-dark self-center">SKIN 911</span> 
                    </div>  
                    <div class="m-2">
                        <span class="text-pink-dark text-lg">Customer Care</span>
                        <ul class="text-gray-600">
                            <li>My Account</li>
                            <li>Exchange and Refund Policy</li>
                            <li>Rewards</li>
                            <li>Shipping</li>
                            <li>Terms And Condition</li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="m-2">
                        <span class="text-pink-dark text-lg">About</span>
                        <ul class="text-gray-600">
                            <li>About Us</li>
                            <li>Store Locator</li>
                            <li>Conscious Beauty</li>
                        </ul>
                    </div>
                    <div class="m-2">
                        <ul class="flex text-gray-600">
                            <li class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="#814252" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </li>
                            <li class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="#814252" d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/>
                                </svg>
                            </li>
                            <li  class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="#814252" d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </li>
                        </ul>
                        <div class="text-gray-600">
                            <span class="p-2">care@Skin911.com</span>
                        </div>
                        <div class="text-gray-600">
                            <span class="p-2 flex">Near Aizawl Hospital, 796001 , Aizawl, Mizoram</span>
                        </div>
                    </div>
                    <div class="m-2">
                        <ul class="text-pink-dark text-md text-gray-600">
                            <li class="flex">
                                <div class="p-2 flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="#814252" d="M20 22.621l-3.521-6.795c-.008.004-1.974.97-2.064 1.011-2.24 1.086-6.799-7.82-4.609-8.994l2.083-1.026-3.493-6.817-2.106 1.039c-7.202 3.755 4.233 25.982 11.6 22.615.121-.055 2.102-1.029 2.11-1.033z"/>
                                    </svg>
                                </div>
                                <span class="pl-2 ">Customer Care: + 918974336234</span>
                            </li>
                            <li class="flex">
                                <div class="p-2 flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="#814252" d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 14h-7v-8h2v6h5v2z"/>
                                    </svg>
                                </div>
                                <span class="p-2">Business hours: 09:30 AM - 5:30 PM</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
    import JetBanner from '@/Jetstream/Banner.vue'
    import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        props: {
            title: String,
        },

        components: {
            Head,
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            Link,
        },

        data() {
            return {
                showingNavigationDropdown: false,
                shop:false,
                bestSeller:false,
                routine:false,
                brands:false,
                sales:false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
            hover()
            {

            }
        }
    })
</script>
