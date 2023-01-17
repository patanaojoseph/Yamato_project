<template>
    <div>
        <i class="fas fa-info-circle text-gray-500 mr-2"></i>
        <span class="text-sm font-bold text-gray-500">{{ listing.beds }}</span>
        <b class="text-sm font-normal text-gray-500"> Beds </b>
        <span class="text-gray-400">| </span>

        <span class="text-sm font-bold text-gray-500">{{ listing.baths }}</span>
        <b class="text-sm font-normal text-gray-500"> Baths </b>
        <span class="text-gray-400">| </span>

        <span class="text-sm font-bold text-gray-500">{{
            listing.kitchen
        }}</span>
        <b class="text-sm font-normal text-gray-500"> Kitchen </b>
        <span class="text-gray-400">| </span>

        <span class="text-sm font-bold text-gray-500">{{
            listing.dinning
        }}</span>
        <b class="text-sm font-normal text-gray-500"> Dinning </b>
        <span class="text-gray-400">| </span>

        <span class="text-sm font-bold text-gray-500">{{ listing.area }}</span>
        <b class="text-sm font-normal text-gray-500"> m² </b>
    </div>
</template>

<script setup>
defineProps({
    listing: Object,
});
</script>
