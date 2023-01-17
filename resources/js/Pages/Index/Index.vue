<template>
    <div>Index component</div>
    <div>{{ sinabi }}</div>
    <Link href="/show">show</Link>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    sinabi: String,
});
</script>
