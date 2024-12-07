<template>
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-center mb-8">Camera Shop</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div
                v-for="camera in cameras"
                :key="camera.camera_id"
                class="bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300"
            >
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-white">
                        {{ camera.camera_name }}
                    </h3>
                    <p class="text-gray-400 mb-4">
                        {{ camera.camera_category }}
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-orange-400">
                            ${{ camera.camera_price }}
                        </span>
                        <button
                            class="bg-purple-600 hover:bg-orange-500 text-white font-bold py-2 px-4 rounded-full transition duration-300"
                        >
                            Rent Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from "vue";

// Define the props passed from the backend
const props = defineProps({
    cameras: Array, // Array of cameras
});
</script>
