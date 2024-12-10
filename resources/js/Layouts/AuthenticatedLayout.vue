<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
</script>
<template>
    <div
        class="min-h-screen bg-gradient-to-r from-teal-950 via-teal-900 to-teal-950 text-white"
    >
        <!-- Header with Navbar -->
        <header
            class="bg-black bg-opacity-50 backdrop-filter backdrop-blur-lg fixed w-full z-10"
        >
            <div class="container mx-auto px-4 py-3">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <Link :href="route('home')" class="text-2xl font-bold tracking-tighter group">
                    <span class="inline-block text-transparent bg-clip-text bg-gradient-to-r from-purple-300 to-blue-500 group-hover:from-blue-500 group-hover:to-purple-400 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        ZoomPro
                    </span>
                </Link>

                    <!-- Desktop Navigation -->
<nav class="hidden md:flex space-x-6 items-center">
    <Link
        v-if="$page.props.auth?.user?.email === 'salte@salte.com','andresalvadorgregorio@gmail.com'"
        :href="route('CameraDashboard')"
        class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
    >
    <span class="relative z-10 transition-colors duration-300 group-hover:text-gray-900">Dashboard</span>
    <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300  rounded-full"></span>
    </Link>
    <Link
        :href="route('home')"
        class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
        :class="{
            'bg-gradient-to-r from-blue-500 to-green-600 opacity-100 scale-x-100 text-gray-900': route().current('home')
        }"
    >
        <span
            class="relative z-10 transition-colors duration-300"
            :class="{ 'text-gray-900': route().current('home') }"
        >
            Home
        </span>
        <span
            class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300 rounded-full"
            :class="{ 'opacity-100 scale-x-100': route().current('home') }"
        ></span>
    </Link>
    <Link
        :href="route('shop')"
        class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
        :class="{
            'bg-gradient-to-r from-blue-500 to-green-600 opacity-100 scale-x-100 text-gray-900': route().current('shop')
        }"
    >
        <span
            class="relative z-10 transition-colors duration-300"
            :class="{ 'text-gray-900': route().current('shop') }"
        >
            Shop
        </span>
        <span
            class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300 rounded-full"
            :class="{ 'opacity-100 scale-x-100': route().current('shop') }"
        ></span>
    </Link>
    <Link
        :href="route('myaccount')"
        class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
        :class="{
            'bg-gradient-to-r from-blue-500 to-green-600 opacity-100 scale-x-100 text-gray-900': route().current('myaccount')
        }"
    >
        <span
            class="relative z-10 transition-colors duration-300"
            :class="{ 'text-gray-900': route().current('myaccount') }"
        >
            Account
        </span>
        <span
            class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300 rounded-full"
            :class="{ 'opacity-100 scale-x-100': route().current('myaccount') }"
        ></span>
    </Link>
    <Link
        :href="route('support')"
        class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
        :class="{
            'bg-gradient-to-r from-blue-500 to-green-600 opacity-100 scale-x-100 text-gray-900': route().current('support')
        }"
    >
        <span
            class="relative z-10 transition-colors duration-300"
            :class="{ 'text-gray-900': route().current('support') }"
        >
            Support
        </span>
        <span
            class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300 rounded-full"
            :class="{ 'opacity-100 scale-x-100': route().current('support') }"
        ></span>
    </Link>


                        <!-- Settings Dropdown -->
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <button
                                    class="inline-flex items-center text-white bg-transparent border border-transparent px-3 py-2 text-sm font-medium hover:text-purple-400 focus:outline-none"
                                >
                                    {{ $page.props.auth.user.name }}
                                    <svg
                                        class="ml-2 h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                            </template>
                            <template #content>
                                <DropdownLink :href="route('profile.edit')">
                                    Profile
                                </DropdownLink>
                                <DropdownLink
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                >
                                    Log Out
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </nav>

                    <!-- Mobile Menu Button -->
                    <button
                        @click="
                            showingNavigationDropdown =
                                !showingNavigationDropdown
                        "
                        class="md:hidden inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none"
                    >
                        <svg
                            class="h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                :class="{
                                    hidden: showingNavigationDropdown,
                                    block: !showingNavigationDropdown,
                                }"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                            <path
                                :class="{
                                    hidden: !showingNavigationDropdown,
                                    block: showingNavigationDropdown,
                                }"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <!-- Responsive Navigation Menu -->
        <div
            :class="{
                block: showingNavigationDropdown,
                hidden: !showingNavigationDropdown,
            }"
            class="md:hidden bg-black bg-opacity-50"
        >
            <div class="space-y-1 pb-3 pt-2 px-4">
                <ResponsiveNavLink
                    :href="route('home')"
                    :active="route().current('home')"
                >
                    Home
                </ResponsiveNavLink>
                <ResponsiveNavLink
                    :href="route('shop')"
                    :active="route().current('shop')"
                >
                    Shop
                </ResponsiveNavLink>
                <ResponsiveNavLink
                    :href="route('myaccount')"
                    :active="route().current('myaccount')"
                >
                    My Account
                </ResponsiveNavLink>
                <ResponsiveNavLink
                    :href="route('support')"
                    :active="route().current('support')"
                >
                    Support
                </ResponsiveNavLink>
            </div>

            <div class="border-t border-gray-700 pb-4 pt-4 px-4">
                <div class="text-base font-medium text-white">
                    {{ $page.props.auth.user.name }}
                </div>
                <div class="text-sm font-medium text-gray-400">
                    {{ $page.props.auth.user.email }}
                </div>
                <div class="mt-3 space-y-1">
                    <ResponsiveNavLink :href="route('profile.edit')">
                        Profile
                    </ResponsiveNavLink>
                    <ResponsiveNavLink
                        :href="route('logout')"
                        method="post"
                        as="button"
                    >
                        Log Out
                    </ResponsiveNavLink>
                </div>
            </div>
        </div>

        <!-- Page Heading -->
        <header class="bg-gray-800 shadow-lg" v-if="$slots.header">
            <div class="mx-auto max-w-7xl px-4 py-1 sm:px-6 lg:px-8">
                <slot name="header" />
            </div>
        </header>

        <!-- Page Content -->
        <main class="mt-16">
            <slot />
        </main>
    </div>
</template>
<!-- 
<script>
// export default {
//     data() {
//         return {
//             showingNavigationDropdown: false,
//         };
//     },
// };
//
</script> -->
