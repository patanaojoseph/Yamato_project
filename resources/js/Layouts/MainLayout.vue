<template>
    <header
        class="border-b border-none dark:border-gray-800 dark:bg-white drop-shadow-2xl w-full sticky top-0 z-50"
    >
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div
                    class="text-xl font-serif text-white-900 dark:text-white-300 font-bold text-center"
                >
                    <Link :href="route('listing.index')" class="text-gray-700">
                        <i class="logo fab fa-accusoft">
                            <span class="brand font-bold">ccusoft</span>
                        </i>
                    </Link>
                    <Link
                        :href="route('listing.index')"
                        class="text-base font-bold font-nunito text-gray-600 pl-9"
                        >Properties</Link
                    >
                </div>
                <div v-if="user" class="flex text-white gap-4">
                    <Link
                        :href="route('notification.index')"
                        class="text-gray-800 relative pr-2 py-0 text-md"
                    >
                        <i class="fas fa-bell mr-2 text-gray-500"></i>
                        <div
                            v-if="notificationCount"
                            class="absolute right-0 top-0 w-4 h-4 bg-red-400 text-white font-medium border-none rounded-full text-xs text-center"
                        >
                            {{ notificationCount }}
                        </div>
                    </Link>
                    <Link
                        class="text-gray-500"
                        :href="route('realtor.listing.index')"
                    >
                        <i class="fas fa-user mr-1 text-gray-500"></i
                        >{{ user.name }}
                    </Link>
                    <div>
                        <i class="fas fa-sign-out-alt mr-1 text-gray-500"></i>
                        <Link
                            :href="route('logout')"
                            method="delete"
                            class="text-gray-500"
                            as="button"
                            >logout</Link
                        >
                    </div>
                </div>
                <div v-else>
                    <Link
                        :href="route('user-account.create')"
                        class="text-gray-600 mr-5"
                        ><i class="fa-solid fa-user-plus mr-2"></i
                        >Register</Link
                    >
                    <Link :href="route('login')" class="text-gray-600"
                        ><i class="fas fa-sign-in mr-2"></i>Sign-In</Link
                    >
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4 my-2 w-full">
        <div
            v-if="successMessage"
            id="alert-border-3"
            class="flex p-4 mb-4 text-white border-t-4 border-gray-700 dark:text-black dark:bg-gray-200 drop-shadow-2xl rounded-md"
            role="alert"
        >
            <i class="fa-solid fa-circle-info"></i>
            <div class="ml-3 text-sm font-medium">
                Good job!
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
const successMessage = computed(() => page.props.value.flash.success);
const user = computed(() => page.props.value.user);
const notificationCount = computed(() =>
    Math.min(page.props.value.user.notificationCount, 9)
);

// const btn = document.querySelector("button.mobile-menu-button");
// const menu = document.querySelector(".mobile-menu");

// btn.addEventListener("click", () => {
//     menu.classList.toggle("hidden");
// });
</script>
