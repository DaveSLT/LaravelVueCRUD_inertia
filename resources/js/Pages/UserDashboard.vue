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
                            class="text-white font-semibold underline decoration-teal-500 underline-offset-4"
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
        <div class="container mx-auto py-2 px-4">
            <h1 class="text-2xl font-bold mb-6 text-center">User Dashboard</h1>

            <!-- User Table -->
            <div class="overflow-x-auto">
                <table
                    class="table-auto w-full border-collapse bg-gray-950 text-center text-sm shadow-md rounded-lg overflow-hidden"
                >
                    <thead>
                        <tr class="bg-gray-300">
                            <th class=" text-black px-4 py-2">ID</th>
                            <th class=" text-black px-4 py-2">
                                Name
                            </th>
                            <th class=" text-black  px-4 py-2">
                                Email
                            </th>
                            <th class="text-black  px-4 py-2 ">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="user in users"
                            :key="user.id"
                            class="hover:bg-teal-800"
                        >
                            <td class=" px-4 py-2">
                                {{ user.id }}
                            </td>
                            <td class=" px-4 py-2">
                                {{ user.name }}
                            </td>
                            <td class=" px-4 py-2">
                                {{ user.email }}
                            </td>
                            <td class=" px-4 py-2">
                                <button
                                    @click="deleteUser(user.id)"
                                    class="bg-red-900 text-white px-4 py-2 rounded-lg hover:bg-red-600"
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
