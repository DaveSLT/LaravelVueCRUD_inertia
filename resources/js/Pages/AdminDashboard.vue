<template>
    <div class="min-h-screen bg-gradient-to-r from-teal-900 via-teal-950 to-teal-900  ">

  <!-- Header with Navbar -->
 
                
    <div class="container mx-auto px-4 py-10 ">

        <h1 class="text-3xl font-bold text-center mb-6 text-white">Admin Dashboard</h1>

        <!-- Cameras Management Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-white">Manage Cameras</h2>
            <table
                class="min-w-full bg-gray-800 text-white rounded-lg shadow-lg"
            >
                <thead>
                    <tr class="bg-gray-700">
                        <th class="py-3 px-4 text-left">Camera Name</th>
                        <th class="py-3 px-4 text-left">Category</th>
                        <th class="py-3 px-4 text-left">Price ($)</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="camera in cameras"
                        :key="camera.camera_id"
                        class="border-t border-gray-600"
                    >
                        <td class="py-3 px-4">{{ camera.camera_name }}</td>
                        <td class="py-3 px-4">{{ camera.camera_category }}</td>
                        <td class="py-3 px-4">
                            <input
                                type="number"
                                v-model="camera.camera_price"
                                class="w-full rounded-lg bg-gray-700 text-white border border-gray-600 px-2 py-1"
                            />
                        </td>
                        <td class="py-3 px-4">
                            <button
                                @click="updatePrice(camera)"
                                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg"
                            >
                                Update
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Users Management Section -->
        <div>
            <h2 class="text-2xl font-bold mb-4 text-white">User Dashboard</h2>
            <table
                class="table-auto w-full border-collapse border border-gray-300"
            >
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-white">ID</th>
                        <th class="border border-gray-300 px-4 py-2 text-white">Name</th>
                        <th class="border border-gray-300 px-4 py-2 text-white">Email</th>
                        <th class="border border-gray-300 px-4 py-2 text-white">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td class="border border-gray-300 px-4 py-2">
                            {{ user.id }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ user.name }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ user.email }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button
                                @click="deleteUser(user.id)"
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700"
                            >
                                Delete
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
import { router } from "@inertiajs/vue3";

const props = defineProps({
    users: Array,
    cameras: Array,
});

// Methods for managing users and cameras
const deleteUser = (id) => {
    if (confirm("Are you sure you want to delete this user?")) {
        router.delete(`/users/${id}`, {
            preserveState: true,
            onSuccess: () => alert("User deleted successfully."),
        });
    }
};

const updatePrice = (camera) => {
    router.post(route("cameras.updatePrice", camera.camera_id), {
        price: camera.camera_price,
    });
};
</script>

<style>
@import "tailwindcss/base";
@import "tailwindcss/components";
@import "tailwindcss/utilities";
</style>