<template>
    <span class="text-base font-normal text-gray-500">
        <i class="fas fa-location mr-1"></i> {{ listing.street }} {{ listing.street_no }} {{ listing.city }}
    </span>
</template>

<script setup>
defineProps({
    listing: Object,
});
</script>
