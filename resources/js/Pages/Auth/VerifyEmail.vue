<template>
    <div>Verify your email first to access this page.</div>
    <div>
        <Link
            :href="route('verification.send')"
            method="post"
            as="button"
            class="text-red-600"
            >Resend Verification email</Link
        >
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>
