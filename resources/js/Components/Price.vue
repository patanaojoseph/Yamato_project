<template>
    <span>{{ formattedPrice }}</span>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
    price: [Number, String],
});
const formattedPrice = computed(() =>
    Number(props.price).toLocaleString("ph-PH", {
        style: "currency",
        currency: "Php",
        maximumFractionDigits: 2,
    })
);
</script>
