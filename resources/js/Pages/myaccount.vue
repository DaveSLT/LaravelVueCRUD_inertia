
<template>
    <div
        class="min-h-screen bg-gradient-to-r from-teal-950 via-teal-900 to-teal-950 text-white"
    >
        <!-- Header with Navbar -->
        <header
            class="bg-black bg-opacity-50 backdrop-filter backdrop-blur-lg fixed w-full z-10"
        >
            <div class="container mx-auto px-4 py-3">
                <div class="container mx-auto flex justify-between items-center">
                <Link :href="route('home')" class="text-2xl font-bold tracking-tighter group">
                    <span class="inline-block text-transparent bg-clip-text bg-gradient-to-r from-purple-300 to-blue-500 group-hover:from-blue-500 group-hover:to-purple-400 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        ZoomPro
                    </span>
                </Link>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex space-x-6 items-center">
                        <Link
                            v-if="
                                $page.props.auth?.user?.email ===
                                'salte@salte.com'
                            "
                            :href="route('CameraDashboard')"
                            class="text-white hover:text-purple-400"
                        >
                            Dashboard
                        </Link>
                        <Link
                            :href="route('home')"
                            class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
                            >
                            
                            <span class="relative z-10 transition-colors duration-300 group-hover:text-gray-900">Home</span>
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300  rounded-full"></span>
                            
                            
                            </Link
                        >
                        <Link
                            :href="route('shop')"
                            class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
                            >
                            
                            <span class="relative z-10 transition-colors duration-300 group-hover:text-gray-900">Shop</span>
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300  rounded-full"></span>
                            
                            
                            </Link
                        >
                        <Link
                            :href="route('myaccount')"
                            class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
                            >
                            
                            <span class="relative z-10 transition-colors duration-300 group-hover:text-gray-900">Account</span>
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300  rounded-full"></span>
                            
                            
                            </Link
                        >
                        <Link
                            :href="route('support')"
                            class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
                            >
                            
                            <span class="relative z-10 transition-colors duration-300 group-hover:text-gray-900">Support</span>
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300  rounded-full"></span>
                            
                            
                            </Link
                        >

                        <!-- Settings Dropdown -->
                        <div class="relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button
                                        class="inline-flex items-center text-white bg-transparent border border-transparent px-3 py-2 text-sm font-medium hover:text-green-400 focus:outline-none"
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

        <!-- Account Page Content -->
        <main class="container mx-auto px-4 pt-24 pb-12">
            <h2 class="text-4xl font-bold mb-8 text-center">My Account</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Account Details Section -->
                <div class="bg-gray-900 rounded-lg shadow-lg p-6">
                    <h3 class="text-2xl font-semibold mb-4 text-blue-400">
                        Account Details
                    </h3>
                    <p class="text-gray-300 mb-2">
                        <strong>Name:</strong> {{ $page.props.auth.user.name }}
                    </p>
                    <p class="text-gray-300 mb-2">
                        <strong>Email:</strong>
                        {{ $page.props.auth.user.email }}
                    </p>
                    <p class="text-gray-300 mb-2">
                        <strong>Membership Status:</strong>
                        Active
                    </p>
                    <h3
                        class="text-2xl font-semibold mb-4 mt-8 text-blue-400"
                    >
                        Settings
                    </h3>
                    <Link :href="route('profile.edit')">Profile Settings</Link>
                </div>
                <!-- Cameras Rented Section -->
                <div class="bg-gray-900 rounded-lg shadow-lg p-6">
                    <h3 class="text-2xl font-semibold mb-4 text-red-700">
                        Cameras Rented
                    </h3>
                    <!-- <ul v-if="rentedCameras.length > 0" class="space-y-4">
                        <li
                            v-for="(rental, index) in rentedCameras"
                            :key="index"
                            class="text-gray-300 flex justify-between items-center"
                        >
                            <div>
                                <p>{{ rental.camera }}</p>
                                <p class="text-sm text-gray-400">
                                    Rented from {{ rental.startDate }} to
                                    {{ rental.endDate }}
                                </p>
                            </div>
                            <button
                                @click="openCancelModal(index)"
                                class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
                            >
                                Cancel
                            </button>
                        </li>
                    </ul> -->
                    <!-- <p v-else class="text-gray-300">No Cameras Rented Yet</p> -->
                </div>
            </div>
        </main>

        <!-- Modals -->
        <div
            v-if="currentModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50"
        >
            <div
                class="bg-gray-800 p-6 rounded-lg shadow-lg text-white max-w-md w-full"
            >
                <!-- Profile Settings Modal -->
                <div v-if="currentModal === 'profileSettings'">
                    <h3 class="text-xl font-semibold mb-4">Profile Settings</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-300">Name:</label>
                            <input
                                v-model="editedAccount.name"
                                class="w-full p-2 rounded-md bg-gray-700 text-white"
                                type="text"
                            />
                        </div>
                        <div>
                            <label class="block text-gray-300">Email:</label>
                            <input
                                v-model="editedAccount.email"
                                class="w-full p-2 rounded-md bg-gray-700 text-white"
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="mt-4 flex justify-end">
                        <button
                            @click="saveAccountDetails"
                            class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded"
                        >
                            Save Changes
                        </button>
                    </div>
                </div>

                <!-- Payment Settings Modal -->
                <div v-if="currentModal === 'paymentSettings'">
                    <h3 class="text-xl font-semibold mb-4">Payment Settings</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-300"
                                >Payment Method:</label
                            >
                            <select
                                v-model="selectedPaymentMethod"
                                class="w-full p-2 rounded-md bg-gray-700 text-white"
                            >
                                <option value="paypal">PayPal</option>
                                <option value="bank">Bank Account</option>
                                <option value="credit">Credit Card</option>
                            </select>
                        </div>
                        <div v-if="selectedPaymentMethod === 'paypal'">
                            <label class="block text-gray-300"
                                >PayPal Email:</label
                            >
                            <input
                                v-model="paypalEmail"
                                class="w-full p-2 rounded-md bg-gray-700 text-white"
                                type="email"
                            />
                        </div>
                        <div v-if="selectedPaymentMethod === 'bank'">
                            <label class="block text-gray-300"
                                >Bank Account Number:</label
                            >
                            <input
                                v-model="bankAccountNumber"
                                class="w-full p-2 rounded-md bg-gray-700 text-white"
                                type="text"
                            />
                            <label class="block text-gray-300 mt-2"
                                >Routing Number:</label
                            >
                            <input
                                v-model="routingNumber"
                                class="w-full p-2 rounded-md bg-gray-700 text-white"
                                type="text"
                            />
                        </div>
                        <div v-if="selectedPaymentMethod === 'credit'">
                            <label class="block text-gray-300"
                                >Credit Card Number:</label
                            >
                            <input
                                v-model="creditCardNumber"
                                class="w-full p-2 rounded-md bg-gray-700 text-white"
                                type="text"
                            />
                            <label class="block text-gray-300 mt-2"
                                >Expiration Date:</label
                            >
                            <input
                                v-model="expirationDate"
                                class="w-full p-2 rounded-md bg-gray-700 text-white"
                                type="text"
                                placeholder="MM/YY"
                            />
                            <label class="block text-gray-300 mt-2">CVV:</label>
                            <input
                                v-model="cvv"
                                class="w-full p-2 rounded-md bg-gray-700 text-white"
                                type="text"
                            />
                        </div>
                    </div>
                    <div class="mt-4 flex justify-end">
                        <button
                            @click="savePaymentSettings"
                            class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded"
                        >
                            Save Payment Settings
                        </button>
                    </div>
                </div>

                <!-- Notification Preferences Modal -->
                <div v-if="currentModal === 'notificationPreferences'">
                    <h3 class="text-xl font-semibold mb-4">
                        Notification Preferences
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="flex items-center">
                                <input
                                    v-model="
                                        notificationPreferences.returnReminder
                                    "
                                    type="checkbox"
                                    class="form-checkbox h-5 w-5 text-purple-600"
                                />
                                <span class="ml-2 text-gray-300"
                                    >Notify me when my camera needs to be
                                    returned</span
                                >
                            </label>
                        </div>
                        <div>
                            <label class="flex items-center">
                                <input
                                    v-model="notificationPreferences.paymentDue"
                                    type="checkbox"
                                    class="form-checkbox h-5 w-5 text-purple-600"
                                />
                                <span class="ml-2 text-gray-300"
                                    >Notify me when a payment is due</span
                                >
                            </label>
                        </div>
                        <div>
                            <label class="flex items-center">
                                <input
                                    v-model="
                                        notificationPreferences.paymentConfirmation
                                    "
                                    type="checkbox"
                                    class="form-checkbox h-5 w-5 text-purple-600"
                                />
                                <span class="ml-2 text-gray-300"
                                    >Notify me when a payment is confirmed</span
                                >
                            </label>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-end">
                        <button
                            @click="saveNotificationPreferences"
                            class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded"
                        >
                            Save Preferences
                        </button>
                    </div>
                </div>

                <!-- Cancel Rental Confirmation Modal -->
                <div v-if="currentModal === 'cancelRental'">
                    <h3 class="text-xl font-semibold mb-4">Cancel Rental</h3>
                    <p class="text-gray-300 mb-4">
                        Are you sure you want to cancel this rental?
                    </p>
                    <div class="flex justify-end space-x-4">
                        <button
                            @click="confirmCancelRental"
                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
                        >
                            Confirm
                        </button>
                        <button
                            @click="closeModal"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded"
                        >
                            Go Back
                        </button>
                    </div>
                </div>

                <button
                    v-if="currentModal !== 'cancelRental'"
                    @click="closeModal"
                    class="mt-4 text-gray-400 hover:text-white"
                >
                    Close
                </button>
            </div>
        </div>
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
import { ref, reactive, onMounted } from "vue";

export default {
    setup() {
        const mobileMenuOpen = ref(false);
        const currentModal = ref(null);
        const cancelIndex = ref(null);

        const userAccount = reactive({
            name: "",
            email: "",
            membershipStatus: "Active",
        });

        const editedAccount = reactive({
            name: "",
            email: "",
        });

        const rentedCameras = ref([]);

        const selectedPaymentMethod = ref("paypal");
        const paypalEmail = ref("");
        const bankAccountNumber = ref("");
        const routingNumber = ref("");
        const creditCardNumber = ref("");
        const expirationDate = ref("");
        const cvv = ref("");

        const notificationPreferences = reactive({
            returnReminder: true,
            paymentDue: true,
            paymentConfirmation: true,
        });

        const loadFromStorage = () => {
            const storedAccount = JSON.parse(
                localStorage.getItem("userAccount")
            );
            if (storedAccount) {
                Object.assign(userAccount, storedAccount);
                Object.assign(editedAccount, storedAccount);
            }

            const storedCameras = JSON.parse(
                localStorage.getItem("rentedCameras")
            );
            if (storedCameras) {
                rentedCameras.value = storedCameras;
            }

            const storedPreferences = JSON.parse(
                localStorage.getItem("notificationPreferences")
            );
            if (storedPreferences) {
                Object.assign(notificationPreferences, storedPreferences);
            }
        };

        const saveToStorage = () => {
            localStorage.setItem("userAccount", JSON.stringify(userAccount));
            localStorage.setItem(
                "rentedCameras",
                JSON.stringify(rentedCameras.value)
            );
            localStorage.setItem(
                "notificationPreferences",
                JSON.stringify(notificationPreferences)
            );
        };

        const toggleMobileMenu = () => {
            mobileMenuOpen.value = !mobileMenuOpen.value;
        };

        const openModal = (modalType) => {
            currentModal.value = modalType;
        };

        const closeModal = () => {
            currentModal.value = null;
            cancelIndex.value = null;
        };

        const saveAccountDetails = () => {
            Object.assign(userAccount, editedAccount);
            saveToStorage();
            closeModal();
        };

        const savePaymentSettings = () => {
            console.log("Saving payment settings:", {
                method: selectedPaymentMethod.value,
                paypalEmail: paypalEmail.value,
                bankAccountNumber: bankAccountNumber.value,
                routingNumber: routingNumber.value,
                creditCardNumber: creditCardNumber.value,
                expirationDate: expirationDate.value,
                cvv: cvv.value,
            });
            closeModal();
        };

        const saveNotificationPreferences = () => {
            saveToStorage();
            closeModal();
        };

        const openCancelModal = (index) => {
            cancelIndex.value = index;
            currentModal.value = "cancelRental";
        };

        const confirmCancelRental = () => {
            if (cancelIndex.value !== null) {
                rentedCameras.value.splice(cancelIndex.value, 1);
                saveToStorage();
                closeModal();
            }
        };

        onMounted(() => {
            loadFromStorage();
        });

        return {
            mobileMenuOpen,
            currentModal,
            userAccount,
            editedAccount,
            rentedCameras,
            selectedPaymentMethod,
            paypalEmail,
            bankAccountNumber,
            routingNumber,
            creditCardNumber,
            expirationDate,
            cvv,
            notificationPreferences,
            toggleMobileMenu,
            openModal,
            closeModal,
            saveAccountDetails,
            savePaymentSettings,
            saveNotificationPreferences,
            openCancelModal,
            confirmCancelRental,
        };
    },
};
</script>

<style>
@import "tailwindcss/base";
@import "tailwindcss/components";
@import "tailwindcss/utilities";
</style>
```
