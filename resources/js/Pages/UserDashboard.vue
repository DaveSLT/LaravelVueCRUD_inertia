<template>
    <div class="bg-gray-900 text-white min-h-screen">
        <!-- Navigation -->
        <div class="bg-gray-800 shadow-lg py-4">
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
                            class="text-gray-300 hover:text-white"
                        >
                            Camera Management
                        </Link>
                    </div>
                </nav>
            </div>
        </div>
        <Link
            :href="route('home')"
            class="flex items-center text-blue-500 hover:text-blue-700"
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
        <div class="container mx-auto py-8 px-4">
            <h1 class="text-2xl font-bold mb-6 text-center">User Dashboard</h1>

            <!-- User Table -->
            <div class="overflow-x-auto">
                <table
                    class="table-auto w-full border-collapse bg-gray-800 text-sm shadow-md rounded-lg overflow-hidden"
                >
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="border border-gray-600 px-4 py-2">ID</th>
                            <th class="border border-gray-600 px-4 py-2">
                                Name
                            </th>
                            <th class="border border-gray-600 px-4 py-2">
                                Email
                            </th>
                            <th class="border border-gray-600 px-4 py-2">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="user in users"
                            :key="user.id"
                            class="hover:bg-gray-700"
                        >
                            <td class="border border-gray-600 px-4 py-2">
                                {{ user.id }}
                            </td>
                            <td class="border border-gray-600 px-4 py-2">
                                {{ user.name }}
                            </td>
                            <td class="border border-gray-600 px-4 py-2">
                                {{ user.email }}
                            </td>
                            <td class="border border-gray-600 px-4 py-2">
                                <button
                                    @click="deleteUser(user.id)"
                                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600"
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
import { router, Link } from "@inertiajs/vue3";
</script>
<script>
export default {
    props: {
        users: Array,
    },
    methods: {
        deleteUser(id) {
            if (confirm("Are you sure you want to delete this user?")) {
                router.delete(`/users/${id}`, {
                    preserveState: true,
                    onSuccess: () => alert("User deleted successfully."),
                });
            }
        },
    },
};
</script>

<style scoped>
/* Optional: Custom additional styles */
</style>
