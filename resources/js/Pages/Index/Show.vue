<template>
    <div>Show component</div>
    <div>{{ mensahe }}</div>
    <Link href="/">index</Link>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    mensahe: String,
});
</script>
