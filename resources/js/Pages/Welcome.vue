<script setup>
import { Head, Link } from "@inertiajs/vue3"; // Correct imports
import Panasonic_Lumix_GH5 from "/public/img/Panasonic_Lumix_GH5.png";

// Props passed to the component
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

// Method to handle image error (Ensure matching IDs exist in the template)
function handleImageError() {
    const screenshotContainer = document.getElementById("screenshot-container");
    const docsCard = document.getElementById("docs-card");
    const docsCardContent = document.getElementById("docs-card-content");
    const background = document.getElementById("background");

    screenshotContainer?.classList.add("!hidden");
    docsCard?.classList.add("!row-span-1");
    docsCardContent?.classList.add("!flex-row");
    background?.classList.add("!hidden");
}
</script>

<template>
    <div
        class="min-h-screen flex flex-col bg-gradient-to-br from-gray-900 to-gray-800 text-white"
    >
        <!-- Navbar -->
        <header
            class="bg-black bg-opacity-50 backdrop-filter backdrop-blur-lg fixed w-full z-10"
        >
            <div
                class="container mx-auto flex justify-between items-center py-4 px-4"
            >
                <h1
                    class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600"
                >
                    ZoomPro
                </h1>
                <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                    <Link
                        v-if="$page.props.auth?.user"
                        :href="route('home')"
                        class="rounded-md px-3 py-2 text-white hover:text-gray-300 transition"
                    >
                        Home
                    </Link>

                    <template v-else>
                        <Link
                            :href="route('shop_guest')"
                            class="rounded-md px-3 py-2 text-white hover:text-gray-300 transition"
                        >
                            Shop
                        </Link>
                        <Link
                            :href="route('login')"
                            class="rounded-md px-3 py-2 text-white hover:text-gray-300 transition"
                        >
                            Log in
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="rounded-md px-3 py-2 text-white hover:text-gray-300 transition"
                        >
                            Register
                        </Link>
                    </template>
                </nav>
            </div>
        </header>

        <!-- Hero Section -->
        <section
            class="hero pt-24 py-12 flex-grow bg-gradient-to-br from-green-900 to-green-700"
        >
            <div
                class="container mx-auto flex flex-col md:flex-row items-center"
            >
                <!-- Left Content -->
                <div class="md:w-1/2 px-5">
                    <h1
                        class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600"
                    >
                        Discover top-tier cameras
                    </h1>
                    <p class="mt-3 text-lg mb-5 text-gray-400">
                        Find top-quality cameras for every occasion, available
                        at affordable rental prices.
                    </p>
                    <Link
                        v-if="$page.props.auth?.user"
                        :href="route('home')"
                        class="bg-orange-600 hover:bg-orange-700 text-white py-2 px-4 rounded transition duration-300"
                    >
                        Start Renting
                    </Link>
                    <template v-else>
                        <Link
                            :href="route('shop_guest')"
                            class="bg-orange-600 hover:bg-orange-700 text-white py-2 px-4 rounded transition duration-300"
                        >
                            Start Renting
                        </Link>
                    </template>
                </div>

                <!-- Right Image -->
                <div class="md:w-1/2 mt-6 md:mt-0 relative">
                    <img
                        :src="camera[0].img"
                        alt="Camera"
                        class="rounded-lg w-full h-auto max-w-md mx-auto animate-camera"
                        @error="handleImageError"
                    />
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-6 bg-gradient-to-br from-gray-900 to-gray-900">
            <div class="container mx-auto text-center text-gray-400">
                <p>
                    &copy; {{ new Date().getFullYear() }} ZoomPro. All rights
                    reserved.
                </p>
            </div>
        </footer>
    </div>
</template>

<script>
// Proper Vue 3 component definition
export default {
    data() {
        return {
            camera: [{ img: Panasonic_Lumix_GH5 }],
        };
    },
};
</script>

<style scoped>
/* Hero animation */
.hero {
    position: relative;
    overflow: hidden;
}

.animate-camera {
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%,
    100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-15px);
    }
}

/* Responsive styles */
@media (max-width: 768px) {
    header {
        padding: 1rem 0;
    }

    .hero h1 {
        font-size: 2rem;
    }

    .hero p {
        font-size: 1rem;
    }

    footer p {
        font-size: 0.75rem;
    }
}

@media (max-width: 640px) {
    footer p {
        font-size: 0.75rem;
    }
}
</style>
