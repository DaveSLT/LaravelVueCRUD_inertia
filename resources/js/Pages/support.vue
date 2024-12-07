<template>
    <div
        class="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800 text-white"
    >
        <!-- Header with Navbar -->
        <header
            class="bg-black bg-opacity-50 backdrop-filter backdrop-blur-lg fixed w-full z-10"
        >
            <div class="container mx-auto px-4 py-4">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <h1
                        class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600"
                    >
                        ZoomPro
                    </h1>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex space-x-6 items-center">
                        <Link
                            :href="route('home')"
                            class="text-white hover:text-purple-400"
                            >Home</Link
                        >
                        <Link
                            :href="route('shop')"
                            class="text-white hover:text-purple-400"
                            >Shop</Link
                        >
                        <Link
                            :href="route('myaccount')"
                            class="text-white hover:text-purple-400"
                            >Account</Link
                        >
                        <Link
                            :href="route('support')"
                            class="text-white hover:text-purple-400"
                            >Support</Link
                        >

                        <!-- Settings Dropdown -->
                        <div class="relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button
                                        class="inline-flex items-center text-white bg-transparent border border-transparent px-3 py-2 text-sm font-medium hover:text-purple-400 focus:outline-none"
                                    >
                                        {{ $page.props.auth.user.name }}
                                        <svg
                                            class="ml-2 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
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
                        </div>
                    </nav>

                    <!-- Mobile Menu Button -->
                    <button
                        @click="
                            showingNavigationDropdown =
                                !showingNavigationDropdown
                        "
                        class="md:hidden text-white focus:outline-none"
                    >
                        <svg
                            :class="
                                !showingNavigationDropdown ? 'block' : 'hidden'
                            "
                            class="h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                        </svg>
                        <svg
                            :class="
                                showingNavigationDropdown ? 'block' : 'hidden'
                            "
                            class="h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>

                <!-- Mobile Navigation -->
                <div
                    :class="showingNavigationDropdown ? 'block' : 'hidden'"
                    class="md:hidden mt-4 bg-gray-800 rounded-lg shadow-md"
                >
                    <nav class="space-y-4 p-4">
                        <Link
                            :href="route('home')"
                            class="block text-white hover:text-purple-400"
                            >Home</Link
                        >
                        <Link
                            :href="route('shop')"
                            class="block text-white hover:text-purple-400"
                            >Shop</Link
                        >
                        <Link
                            :href="route('myaccount')"
                            class="block text-white hover:text-purple-400"
                            >Account</Link
                        >
                        <Link
                            :href="route('support')"
                            class="block text-white hover:text-purple-400"
                            >Support</Link
                        >

                        <!-- Responsive Settings Dropdown -->
                        <div class="border-t border-gray-700 mt-4 pt-4">
                            <div class="text-white">
                                <p>{{ $page.props.auth.user.name }}</p>
                                <p class="text-sm text-gray-400">
                                    {{ $page.props.auth.user.email }}
                                </p>
                            </div>
                            <Link
                                :href="route('profile.edit')"
                                class="block mt-2 text-white hover:text-purple-400"
                            >
                                Profile
                            </Link>
                            <Link
                                :href="route('logout')"
                                method="post"
                                as="button"
                                class="block mt-2 text-white hover:text-purple-400"
                            >
                                Log Out
                            </Link>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- Main content -->
        <main class="container mx-auto px-4 pt-24 pb-12">
            <h2 class="text-4xl font-bold mb-8 text-center">Support</h2>

            <!-- How to Rent Section -->
            <section class="mb-12 bg-gray-800 rounded-lg p-6 shadow-lg">
                <h3 class="text-2xl font-semibold mb-4 text-purple-400">
                    How to Rent
                </h3>
                <ol class="list-decimal list-inside space-y-2 text-gray-300">
                    <li>
                        Browse our collection of cameras and equipment on the
                        <Link
                            :href="route('shop')"
                            class="text-purple-400 hover:underline"
                            >Shop</Link
                        >
                        page.
                    </li>
                    <li>
                        Select the item you'd like to rent, and click "Rent
                        Now".
                    </li>
                    <li>
                        Once you're ready, proceed to checkout and log in to
                        your account.
                    </li>
                    <li>
                        Choose your Start Rental and End Rental period, and
                        complete the payment process.
                    </li>
                    <li>
                        You'll receive an email confirmation with pick-up
                        instructions or delivery options.
                    </li>
                </ol>
            </section>

            <!-- Book an Equipment Test Section -->
            <section class="mb-12 bg-gray-800 rounded-lg p-6 shadow-lg">
                <h3 class="text-2xl font-semibold mb-4 text-purple-400">
                    Book an Equipment Test
                </h3>
                <p class="text-gray-300 mb-4">
                    If you'd like to test the equipment before renting, you can
                    book an in-store test. Please note that tests are subject to
                    availability.
                </p>
            </section>

            <!-- Terms and Conditions Section -->
            <section class="mb-12 bg-gray-800 rounded-lg p-6 shadow-lg">
                <h3 class="text-2xl font-semibold mb-4 text-purple-400">
                    Terms and Conditions
                </h3>
                <ul class="list-disc list-inside space-y-2 text-gray-300">
                    <li>
                        Rentals are subject to availability and must be
                        confirmed through a completed booking.
                    </li>
                    <li>
                        Rental periods are charged on a daily basis. Late
                        returns will incur additional fees.
                    </li>
                    <li>
                        Damage to equipment during the rental period is the
                        responsibility of the renter.
                    </li>
                    <li>
                        Cancellation of rentals must be made at least 24 hours
                        in advance to avoid a cancellation fee.
                    </li>
                </ul>
                <router-link
                    to="aboutus"
                    class="text-purple-400 hover:underline mt-4 inline-block"
                >
                    View Full Terms and Conditions
                </router-link>
            </section>

            <!-- Privacy Policy Section -->
            <section class="mb-12 bg-gray-800 rounded-lg p-6 shadow-lg">
                <h3 class="text-2xl font-semibold mb-4 text-purple-400">
                    Privacy Policy
                </h3>
                <p class="text-gray-300">
                    We value your privacy. All personal information collected
                    during the rental process will be handled in accordance with
                    our privacy policy.
                </p>
                <router-link
                    to="aboutus"
                    class="text-purple-400 hover:underline mt-4 inline-block"
                >
                    View Privacy Policy
                </router-link>
            </section>

            <!-- Contact Us Section -->
            <section class="bg-gray-800 rounded-lg p-6 shadow-lg">
                <h3 class="text-2xl font-semibold mb-4 text-purple-400">
                    Contact Us
                </h3>
                <form @submit.prevent="submitContactForm" class="space-y-4">
                    <div>
                        <label
                            for="name"
                            class="block text-lg font-medium text-gray-300"
                            >Name</label
                        >
                        <!-- <input
                            v-model="contactForm.name"
                            type="text"
                            id="name"
                            class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm p-2 text-white"
                            required
                        /> -->
                    </div>

                    <div>
                        <label
                            for="email"
                            class="block text-lg font-medium text-gray-300"
                            >Email</label
                        >
                        <!-- <input
                            v-model="contactForm.email"
                            type="email"
                            id="email"
                            class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm p-2 text-white"
                            required
                        /> -->
                    </div>

                    <div>
                        <label
                            for="message"
                            class="block text-lg font-medium text-gray-300"
                            >Message</label
                        >
                        <!-- <textarea
                            v-model="contactForm.message"
                            id="message"
                            rows="4"
                            class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm p-2 text-white"
                            required
                        ></textarea> -->
                    </div>

                    <button
                        type="submit"
                        class="bg-orange-600 text-white py-3 px-6 rounded-lg hover:bg-purple-700 transition duration-300"
                    >
                        Send Message
                    </button>
                </form>
            </section>
        </main>

        <footer class="bg-gray-900 py-8">
            <div class="container mx-auto px-4 text-center text-gray-400">
                <p>
                    &copy; {{ new Date().getFullYear() }} ZoomPro. All rights
                    reserved.
                </p>
            </div>
        </footer>
    </div>
</template>

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

<script>
import { ref } from "vue";

export default {
    setup() {
        const mobileMenuOpen = ref(false);
        const contactForm = ref({
            name: "",
            email: "",
            message: "",
        });

        const toggleMobileMenu = () => {
            mobileMenuOpen.value = !mobileMenuOpen.value;
        };

        const submitContactForm = () => {
            console.log("Form submitted:", contactForm.value);
            alert("Thank you for contacting us! We will respond shortly.");
            contactForm.value = { name: "", email: "", message: "" };
        };

        return {
            mobileMenuOpen,
            contactForm,
            toggleMobileMenu,
            submitContactForm,
        };
    },
};
</script>

<style>
@import "tailwindcss/base";
@import "tailwindcss/components";
@import "tailwindcss/utilities";
</style>
