<template>
    <div class="flex gap-1 mt-9">
        <Link
            v-for="(link, index) in links"
            :key="index"
            class="py-2 px-4 rounded-lg"
            :href="link.url"
            :class="{ 'bg-indigo-600 text-gray-100': link.active }"
            v-html="link.label"
        >
        </Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    links: Array,
});
</script>
