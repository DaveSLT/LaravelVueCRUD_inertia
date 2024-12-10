<template>
    <div class="bg-gradient-to-r from-gray-900 via-teal-950 to-gray-900 text-white min-h-screen">
        <!-- Navigation -->
        <div class="bg-gradient-to-r from-teal-950 via-teal-900 to-teal-950 shadow-lg py-4">
            <div
                class="container mx-auto flex justify-between items-center px-4"
            >
                <h1 class="text-3xl font-bold">Admin Panel</h1>
                <nav>
                    <div class="space-x-4">
                        <Link
                            :href="route('UserDashboard')"
                            class="text-gray-300 hover:text-white"
                        >
                            User Management
                        </Link>
                        <Link
                            :href="route('CameraDashboard')"
                            class="text-white font-semibold underline decoration-teal-500 underline-offset-4"
                        >
                            Camera Management
                        </Link>
                    </div>
                </nav>
            </div>
        </div>
        <Link
            :href="route('home')"
            class="flex items-center text-white-500 hover:text-teal-700 py-3 ml-3"
        >
            <!-- Back Icon -->
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                class="w-6 h-6"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15 19l-7-7 7-7"
                />
            </svg>
            <!-- Text -->
            <span class="ml-2">Back</span>
        </Link>
        <!-- Content -->
        <div class="container mx-auto py-3 px-4">
            <h2 class="text-2xl font-bold mb-6 text-center">Manage Cameras</h2>

            <!-- Camera Table -->
            <div class="overflow-x-auto">
                <table
                    class="table-auto w-full border-collapse bg-gray-950 text-sm shadow-md rounded-lg overflow-hidden"
                >
                    <thead>
                        <tr class="bg-sky-800">
                            <th
                                class="px-4 py-2 text-left"
                            >
                                Camera Name
                            </th>
                            <th
                                class=" px-4 py-2 text-left"
                            >
                                Category
                            </th>
                            <th
                                class=" px-4 py-2 text-left"
                            >
                                Price ($)
                            </th>
                            <th
                                class=" px-4 py-2 text-left"
                            >
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="camera in cameras"
                            :key="camera.camera_id"
                            class="hover:bg-teal-800"
                        >
                            <td class=" px-4 py-2">
                                {{ camera.camera_name }}
                            </td>
                            <td class="px-4 py-2">
                                {{ camera.camera_category }}
                            </td>
                            <td class=" px-4 py-2">
                                <input
                                    type="number"
                                    v-model="camera.camera_price"
                                    class="w-full rounded-lg bg-gray-950 text-white text-center border border-teal-100 px-1 py-1"
                                />
                            </td>
                            <td class=" px-4 py-2 text-center">
                                <button
                                    @click="updatePrice(camera)"
                                    class="bg-sky-800 hover:bg-sky-500 text-white px-4 py-2 rounded-lg "
                                >
                                    Update
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup>
import { router, Link } from "@inertiajs/vue3";

const props = defineProps({
    cameras: Array,
});

// Function to update price
const updatePrice = (camera) => {
    router.post(route("cameras.updatePrice", camera.camera_id), {
        price: camera.camera_price,
    });
};
</script>

<style scoped>
/* Optional: Add specific styles */
</style>
