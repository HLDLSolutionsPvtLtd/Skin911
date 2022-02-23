<template>
    <div>
        <Head :title="title" />

        <jet-banner />

        <div class="min-h-screen bg-transparent">
            
            <nav :class="{'bg-transparent fixed ' : bgSet, 'bg-white sticky shadow-md' : !bgSet}" class="top-0 z-10 w-full transition-all duration-700  border-gray-100  checkpoint">
                <div :class="{'transform -translate-y-24 h-0' : bgSet, 'transform translate-0': !bgSet}" class="w-full bg-pink-200 py-1 text-pink-dark transition-all duration-700">
                    <div class="flex items-center justify-center">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="p-1" viewBox="0 0 24 24">
                                <path fill="#814252" d="M24 0l-6 22-8.129-7.239 7.802-8.234-10.458 7.227-7.215-1.754 24-12zm-15 16.668v7.332l3.258-4.431-3.258-2.901z"/>\
                            </svg>
                        </div>
                        <span class="text-xs tracking-wider font-thin">Free shipping on all orders over</span>
                        <span class="pl-2 text-xs tracking-wider text-pink-dark font-semibold">&#8377;2800</span>
                    </div>
                </div>
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-50">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex justify-center text-center text-gray-700 items-center self-center">
                                <Link class="flex" href="/">
                                    <jet-logo></jet-logo>                                        
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div @mouseover="shop = true" @mouseleave="shop = false" class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <div  class="font-bold color-icon  hover:text-gray-700 text-sm flex items-center hover:border-b-4 hover:border-white ">
                                    <a :href="route('categories')" > CATEGORIES</a>
                                    <div :class="{'modal-open': shop, 'modal-close': !shop}" class="absolute shadow-md z-10 w-full left-0 right-0 top-20 bg-white">
                                        <div class="grid grid-cols-12 bg- m-4">
                                            <div class="col-span-2">

                                            </div>
                                            <div class="col-span-10 text-gray-700 border-gray-200">
                                                <span class="">FEATURED CATEGORIES</span>
                                                <ul class="grid grid-cols-4">
                                                    <li v-for="category in categories" :key="category.id" class="hover:text-gray-300 pt-2">
                                                        <a :href="'/products?key='+category.name"> <span>{{category.name}}</span></a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            <div class="col-span-2">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <jet-nav-link class="font-bold color-icon  hover:text-gray-700 hover:border-b-4 hover:border-white" :href="route('products')" >
                                    PRODUCTS
                                </jet-nav-link>
                            </div>
                            
                            <div @mouseover="brands = true" @mouseleave="brands = false" class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <div class="font-bold color-icon text-pink-dark flex items-center text-sm hover:text-gray-700 hover:border-b-4 hover:border-white">
                                    <a :href="route('brands')"> BRANDS</a>
                                    <div :class="{'modal-open': brands, 'modal-close': !brands}" class="absolute shadow-md w-full left-0 right-0 top-20 bg-white ">
                                        <div class="grid grid-cols-12 m-4">
                                            <div class="col-span-2">

                                            </div>
                                            <div class="col-span-10 px-12 text-gray-700 border-gray-200">
                                                <span class="">FEATURED BRANDS</span>
                                                <ul class="grid grid-cols-4">
                                                    <li v-for="brand in lbrands" :key="brand.id"  class="hover:text-gray-300 pt-2">
                                                       <a :href="'/products?key='+brand.name"><span>{{brand.name}}</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-span-2">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <jet-nav-link class="font-bold color-icon  hover:text-gray-700 hover:border-b-4 hover:border-white" href="/">
                                    SALE
                                </jet-nav-link>
                            </div>
                        </div>
                        <div class="hidden sm:flex-shrink-1 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <div class="font-bold rounded-md border border-gray-100 flex justify-center self-center">
                                <div class="ml-2" @click=" search()">
                                    <svg width="20" height="20" class="h-10" viewBox="0,0,24,24">
                                        <path fill="#747b88" d="M3.438 9.754a6.415 6.415 0 016.408-6.409 6.415 6.415 0 016.409 6.409 6.416 6.416 0 01-6.409 6.408 6.416 6.416 0 01-6.408-6.408M21.816 20.87l-5.974-6.02a7.839 7.839 0 001.88-5.097c0-4.343-3.534-7.875-7.876-7.875-4.342 0-7.875 3.532-7.875 7.875 0 4.342 3.533 7.875 7.875 7.875a7.837 7.837 0 004.946-1.753l5.983 6.029a.73.73 0 001.037.004.733.733 0 00.004-1.038">
                                        </path>
                                    </svg>
                                </div>
                                <input type="search" placeholder="SEARCH" v-model="key" @keyup.enter="search()" style="placeholder: bold" class="w-full bg-transparent border-0 placeholder-opacity-90 text-sm rounded-md focus:ring-0">
                            </div>
                        </div>
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <div class="">
                                <a href="/cart" class="font-bold flex justify-center self-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                                        <path fill="#000" d="M6 23.73l-3-2.122v-14.2l3 1.359v14.963zm2-14.855v15.125l13-1.954v-15.046l-13 1.875zm5.963-7.875c-2.097 0-3.958 2.005-3.962 4.266l-.001 1.683c0 .305.273.54.575.494.244-.037.425-.247.425-.494v-1.681c.003-1.71 1.416-3.268 2.963-3.268.537 0 1.016.195 1.384.564.422.423.654 1.035.653 1.727v1.747c0 .305.273.54.575.494.243-.037.423-.246.423-.492l.002-1.749c.002-1.904-1.32-3.291-3.037-3.291zm-6.39 5.995c.245-.037.427-.247.427-.495v-2.232c.002-1.71 1.416-3.268 2.963-3.268l.162.015c.366-.283.765-.513 1.188-.683-.405-.207-.858-.332-1.35-.332-2.096 0-3.958 2.005-3.962 4.266v2.235c0 .306.272.538.572.494z"/>
                                    </svg>
                                    <div v-show="newItemCart" class="relative">
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
                            <div v-if="$page.props.user" class="ml-3 relative">
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

                                        <jet-dropdown-link :href="route('myorder.view')">
                                            Orders
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
                            <div v-else class="flex gap-2 ml-4">
                                <div>
                                    <a class="px-2 p-1 text-blue-400 font-bold text-sm border-blue-400 border rounded-md" :href="route('login')"><span>Log In</span></a>
                                </div>
                                <div>
                                    <a class="px-2 p-1 text-blue-400 font-bold text-sm border-blue-400 border rounded-md" :href="route('register')"><span>Register</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-3 items-center">
                            <div @click="search_mobile = !search_mobile" class="cursor-pointer sm:hidden"> 
                                <svg width="22" height="22" class="fill-current text-gray-500" viewBox="0,0,24,24">
                                    <path d="M23.822 20.88l-6.353-6.354c.93-1.465 1.467-3.2 1.467-5.059.001-5.219-4.247-9.467-9.468-9.467s-9.468 4.248-9.468 9.468c0 5.221 4.247 9.469 9.468 9.469 1.768 0 3.421-.487 4.839-1.333l6.396 6.396 3.119-3.12zm-20.294-11.412c0-3.273 2.665-5.938 5.939-5.938 3.275 0 5.94 2.664 5.94 5.938 0 3.275-2.665 5.939-5.94 5.939-3.274 0-5.939-2.664-5.939-5.939z"/>
                                </svg>
                            </div>
                            <div class="flex items-center sm:hidden">
                                <a href="/cart" class="font-bold flex justify-center self-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-500" width="26" height="26" viewBox="0 0 24 24">
                                        <path d="M6 23.73l-3-2.122v-14.2l3 1.359v14.963zm2-14.855v15.125l13-1.954v-15.046l-13 1.875zm5.963-7.875c-2.097 0-3.958 2.005-3.962 4.266l-.001 1.683c0 .305.273.54.575.494.244-.037.425-.247.425-.494v-1.681c.003-1.71 1.416-3.268 2.963-3.268.537 0 1.016.195 1.384.564.422.423.654 1.035.653 1.727v1.747c0 .305.273.54.575.494.243-.037.423-.246.423-.492l.002-1.749c.002-1.904-1.32-3.291-3.037-3.291zm-6.39 5.995c.245-.037.427-.247.427-.495v-2.232c.002-1.71 1.416-3.268 2.963-3.268l.162.015c.366-.283.765-.513 1.188-.683-.405-.207-.858-.332-1.35-.332-2.096 0-3.958 2.005-3.962 4.266v2.235c0 .306.272.538.572.494z"/>
                                    </svg>
                                    <div class="relative">
                                        <span class="rounded-full left-0 top-0 absolute h-2 w-2 bg-pink-500"></span>
                                    </div>
                                </a>
                            </div>
                            <!-- Hamburger -->
                            <div class="-mr-2 flex items-center sm:hidden">
                                <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-1 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                    <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-show="search_mobile" class="m-2 pb-2">
                    <div class="font-bold rounded-md border border-gray-200 flex justify-center self-center">
                        <div class="ml-2" @click=" search()">
                            <svg width="20" height="20" class="h-10 " viewBox="0,0,24,24">
                                <path fill="#747b88" d="M3.438 9.754a6.415 6.415 0 016.408-6.409 6.415 6.415 0 016.409 6.409 6.416 6.416 0 01-6.409 6.408 6.416 6.416 0 01-6.408-6.408M21.816 20.87l-5.974-6.02a7.839 7.839 0 001.88-5.097c0-4.343-3.534-7.875-7.876-7.875-4.342 0-7.875 3.532-7.875 7.875 0 4.342 3.533 7.875 7.875 7.875a7.837 7.837 0 004.946-1.753l5.983 6.029a.73.73 0 001.037.004.733.733 0 00.004-1.038">
                                </path>
                            </svg>
                        </div>
                        <input type="search" placeholder="SEARCH" v-model="key" @keyup.enter="search()" class="w-full bg-transparent text-sm border-0 placeholder-opacity-50 rounded-md focus:ring-0">
                    </div>                
                </div>
                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden absolute bg-white w-full shadow-lg">
                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <!-- <div class="flex items-center px-4">
                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="flex-shrink-0 mr-3" >
                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                            </div>

                            <div>
                                <div class="font-medium text-base text-gray-800">{{ $page.props.user.name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ $page.props.user.email }}</div>
                            </div>
                        </div> -->

                        <div class="mt-3 font-bold space-y-1">
                            <div v-if="!$page.props.user" class="flex ml-4 gap-2">
                                <div>
                                    <a class="px-2 p-1 text-blue-400 font-bold text-sm border-blue-400 border rounded-md" :href="route('login')"><span>Log In</span></a>
                                </div>
                                <div>
                                    <a class="px-2 p-1 text-blue-400 font-bold text-sm border-blue-400 border rounded-md" :href="route('register')"><span>Register</span></a>
                                </div>
                            </div>
                            <jet-responsive-nav-link :href="route('products')" :active="route().current('products')">
                                Products
                            </jet-responsive-nav-link>
                            
                            <jet-responsive-nav-link :href="route('categories')" :active="route().current('categories')">
                                Categories
                            </jet-responsive-nav-link>
                            <jet-responsive-nav-link :href="route('brands')" :active="route().current('brands')">
                                Brands
                            </jet-responsive-nav-link>
                            <jet-responsive-nav-link v-if="$page.props.user" :href="route('myorder.view')" :active="route().current('myorder.view')">
                                My Orders
                            </jet-responsive-nav-link>
                            <jet-responsive-nav-link v-if="$page.props.user" :href="route('profile.show')" :active="route().current('profile.show')">
                                Profile
                            </jet-responsive-nav-link>
                            <!-- Authentication -->
                            <form v-if="$page.props.user" method="POST" @submit.prevent="logout">
                                <jet-responsive-nav-link as="button">
                                    Log Out
                                </jet-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="w-full h-full">
                <slot></slot>
            </main>
            <footer class="sm:flex w-full sm:justify-center p-2 bg-gray-400 ">
                <div class="sm:grid sm:grid-cols-4 m-4">  
                    <div class="m-2">
                        <span class="text-pink-dark font-bold text-xs">CUSTOMER CARE</span>
                        <ul class="text-gray-600 text-sm font-semibold">
                            <li>My Account</li>
                            <li>Exchange and Refund Policy</li>
                            <li>Rewards</li>
                            <li>Shipping</li>
                            <li>Terms And Condition</li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="m-2">
                        <span class="text-pink-dark font-bold text-xs">ABOUT</span>
                        <ul class="text-gray-600 text-sm font-semibold">
                            <li>About Us</li>
                            <li>Store Locator</li>
                            <li>Conscious Beauty</li>
                        </ul>
                    </div>
                    <div class="m-2">
                        <span class="text-pink-dark font-bold text-xs ">CONTACT US</span>
                        <ul class="flex text-gray-600 text-sm mt-2">
                            <li class="pr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 30">
                                    <path fill="#814252" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </li>
                            <li class="pr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 30">
                                    <path fill="#814252" d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/>
                                </svg>
                            </li>
                            <li  class="pr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 30">
                                    <path fill="#814252" d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </li>
                        </ul>
                    </div>
                    <div class="m-2">
                        <span class="text-pink-dark font-bold text-xs">HELP</span>
                        <ul class="text-sm text-gray-600 font-semibold">
                            <li class="flex">
                                <span class=" text-gray-600 text-sm font-semibold">care@skin911.com</span>
                            </li>
                            <li class="">
                                <div class="flex">
                                    <span class="pr-2">Customer Care: + 918974336234</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 32">
                                        <path d="M20 22.621l-3.521-6.795c-.008.004-1.974.97-2.064 1.011-2.24 1.086-6.799-7.82-4.609-8.994l2.083-1.026-3.493-6.817-2.106 1.039c-7.202 3.755 4.233 25.982 11.6 22.615.121-.055 2.102-1.029 2.11-1.033z"/>
                                    </svg>
                                </div>
                            </li>
                            <li class="">
                                <div class="flex">
                                    <span class="pr-2">Business hours: 09:30 AM - 5:30 PM</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 32">
                                        <path fill="#814252" d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 14h-7v-8h2v6h5v2z"/>
                                    </svg>
                                </div>
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
    import JetLogo from '@/Jetstream/logo.vue'
    import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
    import JetBanner from '@/Jetstream/Banner.vue'
    import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import { computed } from 'vue'
    import { usePage } from '@inertiajs/inertia-vue3'
    import axios from 'axios'

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
            JetLogo,
            JetResponsiveNavLink,
            Link,
        },
           
        data() {
            return {
                newItemCart:  computed(() => usePage().props.value.cart.new),
                categories: [],
                lbrands: [],
                search_mobile : false,
                showingNavigationDropdown: false,
                shop:false,
                bgSet: false,
                stick: false,
                brands:false,
                sales:false,
                key: '',
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

            },
            search()
            {
                this.$inertia.get('/products/search', {
                    'key' : this.key
                });
            },
            handleSCroll (event) {
                let header = document.querySelector("#checkpoint");
                if (window.scrollY > 100) {
                    this.bgSet = false;
                } else if (window.scrollY < 100) {
                   this.bgSet = true;
                }
            },
        },
        mounted() {

            axios.get('/brands/all')
            .then(res => this.lbrands = res.data);

            axios.get('/categories/all')
            .then(res => this.categories = res.data);

            if(this.title == 'Dashboard')
            {
                this.bgSet = true;

                window.addEventListener('scroll', this.handleSCroll);
            }
            else
            {
                this.bgSet =false;
                this.stick = true;
            }
        },
        watch:{
        }
    })
</script>
