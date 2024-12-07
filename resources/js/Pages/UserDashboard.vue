<template>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">User Dashboard</h1>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
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
</template>

<script>
import { router } from "@inertiajs/vue3";

export default {
    props: {
        users: Array,
    },
    methods: {
        deleteUser(id) {
            if (confirm("Are you sure you want to delete this user?")) {
                router.delete(`/users/${id}`, {
                    preserveState: true, // Keeps the current state of the page
                    onSuccess: () => alert("User deleted successfully."),
                });
            }
        },
    },
};
</script>

<style scoped>
/* Add your custom styles here */
</style>
