<template>
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-center mb-6">Admin Dashboard</h1>
        <table class="min-w-full bg-gray-800 text-white rounded-lg shadow-lg">
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
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-center mb-6">User Management</h1>
        <table class="min-w-full bg-gray-800 text-white rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-700">
                    <th class="py-3 px-4 text-left">Name</th>
                    <th class="py-3 px-4 text-left">Email</th>
                    <th class="py-3 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="user in users"
                    :key="user.id"
                    class="border-t border-gray-600"
                >
                    <td class="py-3 px-4">{{ user.name }}</td>
                    <td class="py-3 px-4">{{ user.email }}</td>
                    <td class="py-3 px-4">
                        <button
                            @click="confirmDelete(user)"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Confirmation Modal -->
        <div
            v-if="showConfirmation"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center"
        >
            <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-4">Confirm Deletion</h2>
                <p>Are you sure you want to delete {{ selectedUser.name }}?</p>
                <div class="mt-4 flex justify-end space-x-4">
                    <button
                        @click="showConfirmation = false"
                        class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg"
                    >
                        Cancel
                    </button>
                    <button
                        @click="deleteUser"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg"
                    >
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { router, usePage } from "@inertiajs/vue3";

const props = defineProps({
    cameras: Array, // Passed from the backend
    users: Array,
});
console.log("Users:", props.users);

// Function to update price
const updatePrice = (camera) => {
    router.post(route("cameras.updatePrice", camera.camera_id), {
        price: camera.camera_price,
    });
};

//delete user

// State for confirmation modal
const showConfirmation = ref(false);
const selectedUser = ref(null);

// Show confirmation modal
const confirmDelete = (user) => {
    selectedUser.value = user;
    showConfirmation.value = true;
};

// Delete user
const deleteUser = () => {
    router.delete(route("users.delete", selectedUser.value.id));
    showConfirmation.value = false;
};
</script>

<style scoped>
table {
    border-collapse: collapse;
    width: 100%;
}
</style>
