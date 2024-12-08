<template>
    <div
        class="min-h-screen flex flex-col bg-gradient-to-br from-gray-900 to-gray-800 text-white"
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
        <main class="flex-grow container mx-auto px-4 pt-24 pb-12">
            <!-- Camera Categories -->
            <div class="container mx-auto py-12">
                <h1 class="text-4xl font-bold text-center mb-8">Camera Shop</h1>

                <!-- Category Filter -->
                <section class="mb-16">
                    <div class="flex flex-wrap justify-between gap-4">
                        <!-- "All Cameras" Option -->
                        <div
                            @click="selectedCategory = ''"
                            class="flex-1 min-w-[120px] text-center p-6 transition-all duration-300 hover:shadow-2xl hover:scale-105 cursor-pointer rounded-lg shadow-lg"
                            :class="{
                                'bg-purple-900 text-white':
                                    selectedCategory !== '',
                                'bg-purple-850 text-white':
                                    selectedCategory === '',
                                'ring-2 ring-orange-500':
                                    selectedCategory === '',
                            }"
                        >
                            <h3 class="text-xl font-semibold">All Cameras</h3>
                        </div>

                        <!-- Other Categories -->
                        <div
                            v-for="category in categories"
                            :key="category"
                            @click="selectedCategory = category"
                            class="flex-1 min-w-[120px] text-center p-6 transition-all duration-300 hover:shadow-2xl hover:scale-105 cursor-pointer rounded-lg shadow-lg"
                            :class="{
                                'bg-purple-900 text-white':
                                    selectedCategory !== category,
                                'bg-purple-850 text-white':
                                    selectedCategory === category,
                                'ring-2 ring-orange-500':
                                    selectedCategory === category,
                            }"
                        >
                            <h3 class="text-xl font-semibold">
                                {{ category }}
                            </h3>
                        </div>
                    </div>
                </section>

                <!-- Search Bar -->
                <div class="mb-12">
                    <div class="max-w-xl mx-auto relative">
                        <input
                            v-model="searchQuery"
                            type="text"
                            placeholder="Search cameras..."
                            class="w-full pl-12 pr-4 py-3 rounded-full bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500"
                        />
                        <svg
                            class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"
                            width="20"
                            height="20"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            ></path>
                        </svg>
                    </div>
                </div>

                <!-- Camera Products Grid -->
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8"
                >
                    <div
                        v-for="camera in filteredCamerasWithImages"
                        :key="camera.camera_id"
                        class="bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300"
                    >
                        <img
                            :src="camera.image"
                            alt="Camera image"
                            class="camera-image mx-auto mb-4 w-full h-64 object-cover rounded-t-lg transform transition-all hover:scale-110"
                        />
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 text-white">
                                {{ camera.camera_name }}
                            </h3>
                            <p class="text-gray-400 mb-4">
                                {{ camera.camera_category }}
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-orange-400"
                                    >${{ camera.camera_price }}</span
                                >
                                <button
                                    @click="openRentModal(camera)"
                                    class="bg-purple-600 hover:bg-orange-500 text-white font-bold py-2 px-4 rounded-full transition duration-300"
                                >
                                    Rent Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-gray-900 py-8">
            <div class="container mx-auto px-4 text-center text-gray-400">
                <p>
                    &copy; {{ new Date().getFullYear() }} ZoomPro. All rights
                    reserved.
                </p>
            </div>
        </footer>

        <!-- Updated Rent Modal -->
        <div
            v-if="showRentModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 p-4"
        >
            <div
                class="bg-gray-800 p-6 md:p-8 rounded-lg shadow-lg text-white w-full max-w-4xl"
            >
                <h3 class="text-2xl md:text-3xl font-semibold mb-6 text-center">
                    Rent {{ selectedCamera.name }}
                </h3>
                <div class="flex flex-col md:flex-row items-start md:space-x-8">
                    <!-- Camera Image -->
                    <div class="w-full md:w-1/3 mb-6 md:mb-0">
                        <img
                            :src="selectedCamera.image"
                            :alt="selectedCamera.name"
                            class="w-full h-auto rounded-lg shadow-md"
                        />
                    </div>

                    <!-- Rental Details -->
                    <div class="w-full md:w-2/3 space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label
                                    class="block text-gray-300 mb-2 font-medium"
                                    >Start Date:</label
                                >
                                <input
                                    v-model="rentStartDate"
                                    type="date"
                                    class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                    :min="today"
                                    @change="updateEndDateMin"
                                />
                            </div>
                            <div>
                                <label
                                    class="block text-gray-300 mb-2 font-medium"
                                    >End Date:</label
                                >
                                <input
                                    v-model="rentEndDate"
                                    type="date"
                                    class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                    :min="minEndDate"
                                />
                            </div>
                        </div>
                        <div
                            class="flex flex-col sm:flex-row justify-between items-center bg-gray-700 p-4 rounded-lg"
                        >
                            <p
                                class="text-orange-400 font-bold text-xl md:text-2xl mb-2 sm:mb-0"
                            >
                                Total Cost: ${{ calculateTotalCost }}
                            </p>
                            <p
                                class="text-green-400 font-bold text-xl md:text-2xl"
                            >
                                Days to Rent: {{ rentalDays }}
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="mt-8 flex flex-col sm:flex-row justify-end space-y-4 sm:space-y-0 sm:space-x-4"
                >
                    <button
                        @click="closeRentModal"
                        class="w-full sm:w-auto bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300"
                    >
                        Cancel
                    </button>
                    <button
                        @click="showConfirmationModal"
                        class="w-full sm:w-auto bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300"
                        :disabled="!isFormValid"
                        :class="{
                            'opacity-50 cursor-not-allowed': !isFormValid,
                        }"
                    >
                        Confirm Rental
                    </button>
                </div>
            </div>
        </div>

        <!-- Updated Confirmation Modal -->
        <div
            v-if="showConfirmModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 p-4"
        >
            <div
                class="bg-gray-800 p-6 md:p-8 rounded-lg shadow-lg text-white w-full max-w-4xl"
            >
                <h3 class="text-2xl md:text-3xl font-semibold mb-6 text-center">
                    Confirm Rental Details
                </h3>
                <div class="flex flex-col md:flex-row items-start md:space-x-8">
                    <div class="w-full md:w-2/3 space-y-4 mb-6 md:mb-0">
                        <p class="text-lg md:text-xl">
                            <strong>Camera:</strong> {{ selectedCamera.name }}
                        </p>
                        <p class="text-lg md:text-xl">
                            <strong>Start Date:</strong> {{ rentStartDate }}
                        </p>
                        <p class="text-lg md:text-xl">
                            <strong>End Date:</strong> {{ rentEndDate }}
                        </p>
                        <div
                            class="bg-gray-700 p-4 rounded-lg flex flex-col sm:flex-row justify-between items-center"
                        >
                            <p
                                class="text-orange-400 font-bold text-xl md:text-2xl mb-2 sm:mb-0"
                            >
                                Total Cost: ${{ calculateTotalCost }}
                            </p>
                            <p
                                class="text-green-400 font-bold text-xl md:text-2xl"
                            >
                                Days to Rent: {{ rentalDays }}
                            </p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3">
                        <img
                            :src="selectedCamera.image"
                            :alt="selectedCamera.name"
                            class="w-full h-auto rounded-lg shadow-md"
                        />
                    </div>
                </div>
                <div
                    class="mt-8 flex flex-col sm:flex-row justify-end space-y-4 sm:space-y-0 sm:space-x-4"
                >
                    <button
                        @click="closeConfirmModal"
                        class="w-full sm:w-auto bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300"
                    >
                        Go Back
                    </button>
                    <button
                        @click="confirmRent"
                        class="w-full sm:w-auto bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300"
                    >
                        Confirm and Checkout
                    </button>
                </div>
            </div>
        </div>

        <!-- Updated Rent Successfully Placed Modal -->
        <div
            v-if="showRentSuccessModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 p-4"
        >
            <div
                class="bg-gray-800 p-6 md:p-8 rounded-lg shadow-lg text-white w-full max-w-4xl"
            >
                <h3
                    class="text-3xl md:text-4xl font-semibold mb-8 text-center text-green-400"
                >
                    Rent Successfully Placed!
                </h3>
                <div class="flex flex-col md:flex-row items-start md:space-x-8">
                    <div class="w-full md:w-1/2 space-y-4 mb-6 md:mb-0">
                        <p class="text-lg md:text-xl">
                            <strong>Camera:</strong> {{ selectedCamera.name }}
                        </p>
                        <p class="text-lg md:text-xl">
                            <strong>Start Date:</strong> {{ rentStartDate }}
                        </p>
                        <p class="text-lg md:text-xl">
                            <strong>End Date:</strong> {{ rentEndDate }}
                        </p>
                        <p class="text-lg md:text-xl">
                            <strong>Payment Method:</strong> {{ paymentMethod }}
                        </p>
                        <div class="bg-gray-700 p-4 rounded-lg">
                            <p
                                class="text-orange-400 font-bold text-xl md:text-2xl mb-2"
                            >
                                Total Cost: ${{ calculateTotalCost }}
                            </p>
                            <p
                                class="text-green-400 font-bold text-xl md:text-2xl"
                            >
                                Days to Rent: {{ rentalDays }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="w-full md:w-1/2 flex items-center justify-center"
                    >
                        <img
                            :src="selectedCamera.image"
                            :alt="selectedCamera.name"
                            class="w-full h-auto rounded-lg shadow-md"
                        />
                    </div>
                </div>
                <div
                    class="mt-8 flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4"
                >
                    <button
                        @click="goBackToHome"
                        class="w-full sm:w-auto bg-purple-500 hover:bg-purple-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 text-lg md:text-xl"
                    >
                        Go Back to Home
                    </button>
                    <button
                        @click="closeRentSuccessModal"
                        class="w-full sm:w-auto bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 text-lg md:text-xl"
                    >
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { Link } from "@inertiajs/vue3";

import { ref, computed } from "vue";
import { usePage, router } from "@inertiajs/vue3";
import { defineProps } from "vue";

import Canon_EOS_R5 from "/public/img/Canon_EOS_R5.png";
import Sony_A7_III from "/public/img/Sony-A7-III-.png";
import Nikon_Z6 from "/public/img/Nikon_Z6.png";
import Fujifilm_X_T4 from "/public/img/Fujifilm_X-T4.png";
import Panasonic_Lumix_GH5 from "/public/img/Panasonic_Lumix_GH5.png";
import Blackmagic_Pocket_6K from "/public/img/Blackmagic_Pocket_6K.png";

// Define the props passed from the backend
const props = defineProps({
    cameras: Array, // Array of cameras
});

// State variables
const selectedCategory = ref("");
const searchQuery = ref("");

// Compute available categories dynamically
const categories = computed(() => {
    const uniqueCategories = new Set(
        props.cameras.map((camera) => camera.camera_category)
    );
    return Array.from(uniqueCategories);
});

// Filter cameras with images
const filteredCamerasWithImages = computed(() => {
    return camerasWithImages.value.filter((camera) => {
        const matchesCategory = selectedCategory.value
            ? camera.camera_category === selectedCategory.value
            : true; // Show all if no category is selected
        const matchesSearch = camera.camera_name
            .toLowerCase()
            .includes(searchQuery.value.toLowerCase());
        return matchesCategory && matchesSearch;
    });
});

// State Variables
const showingNavigationDropdown = ref(false);
const showRentModal = ref(false);
const showConfirmModal = ref(false);
const selectedCamera = ref({});
const rentStartDate = ref("");
const rentEndDate = ref("");
const today = ref(new Date().toISOString().split("T")[0]); // Get today's date
const minEndDate = ref(today.value);

// Computed Properties
const camerasWithImages = computed(() => {
    const cameraImages = [
        Canon_EOS_R5,
        Sony_A7_III,
        Nikon_Z6,
        Fujifilm_X_T4,
        Panasonic_Lumix_GH5,
        Blackmagic_Pocket_6K,
    ];

    return props.cameras.map((camera, index) => ({
        ...camera,
        image: cameraImages[index % cameraImages.length],
    }));
});

const rentalDays = computed(() => {
    if (rentStartDate.value && rentEndDate.value) {
        const startDate = new Date(rentStartDate.value);
        const endDate = new Date(rentEndDate.value);
        return Math.max((endDate - startDate) / (1000 * 60 * 60 * 24), 0);
    }
    return 0;
});
console.log("Selected Camera:", selectedCamera.value);

const calculateTotalCost = computed(() => {
    return (rentalDays.value * selectedCamera.value.camera_price).toFixed(2);
});

const isFormValid = computed(() => {
    return rentStartDate.value && rentEndDate.value && rentalDays.value > 0;
});

// Functions
const openRentModal = (camera) => {
    selectedCamera.value = camera;
    showRentModal.value = true;
};

const closeRentModal = () => {
    showRentModal.value = false;
    clearForm();
};

const showConfirmationModal = () => {
    showConfirmModal.value = true;
};

const closeConfirmModal = () => {
    showConfirmModal.value = false;
};

const updateEndDateMin = () => {
    minEndDate.value = rentStartDate.value;
    if (rentEndDate.value < rentStartDate.value) {
        rentEndDate.value = "";
    }
};
const confirmRent = () => {
    const page = usePage();
    console.log("Auth Data:", page.props.auth);
    const userId = page.props.auth?.user?.id;

    if (!userId) {
        console.error("User ID is missing or invalid!");
        return;
    }
    // Validate selectedCamera
    if (!selectedCamera.value.camera_id || !selectedCamera.value.camera_price) {
        alert("Invalid camera data. Please try again.");
        return;
    }

    // Prepare the payment data
    const paymentData = {
        user_id: userId,
        camera_id: selectedCamera.value.camera_id,
        camera_name: selectedCamera.value.camera_name,
        camera_category: selectedCamera.value.camera_category,
        camera_price: selectedCamera.value.camera_price,
        total_price: calculateTotalCost.value,
        days_rent: rentalDays.value,
        rent_date: rentStartDate.value,
        return_date: rentEndDate.value,
    };

    // Use Inertia's router to send a POST request
    router.post("shop", paymentData, {
        onSuccess: () => {
            alert("Rental confirmed and payment processed successfully!");
            closeConfirmModal();
            closeRentModal();
        },
        onError: (errors) => {
            console.error("Error processing payment:", errors);
            alert(
                "There was an issue processing the payment. Please try again."
            );
        },
    });
};

const clearForm = () => {
    rentStartDate.value = "";
    rentEndDate.value = "";
    selectedCamera.value = {};
    showRentModal.value = false;
    showConfirmModal.value = false;
};
</script>
<style>
@import "tailwindcss/base";
@import "tailwindcss/components";
@import "tailwindcss/utilities";
</style>
