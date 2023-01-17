<template>
    <!-- <header
        class="border-b border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 w-full sticky top-0 z-50"
    >
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div
                    class="text-xl font-serif text-white-900 dark:text-white-300 font-bold text-center"
                >
                    <Link :href="route('listing.index')" class="text-white"
                        ><i class="logo fab fa-accusoft"
                            ><span class="brand">ccusoft</span></i
                        ></Link
                    >
                    <Link
                        :href="route('listing.index')"
                        class="text-base font-medium font-sans text-gray-300 pl-9"
                        >Products</Link
                    >
                    <Link
                        :href="route('listing.create')"
                        class="text-base font-medium font-sans text-gray-300 pl-6"
                    >
                        Add Product
                    </Link>
                </div>
                <div v-if="user" class="flex text-white gap-4">
                    <div><i class="fas fa-user mr-2"></i>{{ user.name }}</div>
                    <div>
                        <Link
                            :href="route('logout')"
                            method="delete"
                            as="button"
                            ><i class="fas fa-sign-out-alt mr-2"></i
                            >logout</Link
                        >
                    </div>
                </div>
                <div v-else>
                    <Link :href="route('login')" class="text-white"
                        >Sign-In</Link
                    >
                </div>
            </nav>
        </div>
    </header> -->

    <header
        class="border-b border-gray-500 dark:border-gray-800 bg-white dark:bg-gray-800 shadow-2xl w-full sticky top-0 z-50"
    >
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div
                    class="text-xl font-serif text-white-900 dark:text-white-300 font-bold text-center"
                >
                    <Link :href="route('listing.index')" class="text-white">
                        <i class="logo fab fa-accusoft">
                            <span class="brand">ccusoft</span>
                        </i>
                    </Link>
                    <Link
                        :href="route('listing.index')"
                        class="text-lg font-bold font-nunito text-gray-300 pl-9"
                        >Properties</Link
                    >
                    <Link
                        :href="route('listing.create')"
                        class="text-lg font-bold font-nunito text-gray-300 pl-9"
                    >
                        Add new
                    </Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4 mt-1 w-full">
        <div
            v-if="successMessage"
            id="alert-border-3"
            class="flex p-4 mb-4 text-white bg-green-100 border-t-4 border-black dark:text-black dark:bg-gray-400 shadow-md rounded-md"
            role="alert"
        >
            <i class="fa-solid fa-circle-info"></i>
            <div class="ml-3 text-sm font-medium">
                Good job.
                {{ successMessage }}
            </div>
        </div>

        <slot>Default</slot>
    </main>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

const page = usePage();
const flashSuccess = computed(() => page.props.value.flash.success);
</script>
