<template>
    <Box class="border-none bg-blue-200">
        <i class="fas fa-hand-holding-usd"></i>
        <div class="label font-bold">
            Offer no.{{ offer.id }}
            <span
                v-if="offer.accepted_at"
                class="bg-white text-black rounded-md pl-1 uppercase ml-2 pr-1"
                >accepted</span
            >
        </div>
        <section class="flex items-center justify-between">
            <div>
                <Price :price="offer.amount" class="text-sm font-bold" />

                <div class="text-gray-500">
                    Difference <Price :price="difference" />
                </div>

                <div class="text-gray-500 text-sm">
                    Made by <i class="fas fa-user pr-1"></i>
                    <b>{{ offer.bidder.name }}</b>
                </div>

                <div class="text-gray-500 text-sm">
                    Made on <i class="fas fa-table pr-1"></i>
                    <b>{{ madeOn }}</b>
                </div>
            </div>
            <div>
                <Link
                    v-if="!isSold"
                    :href="route('realtor.offer.accept', { offer: offer.id })"
                    class="btn-outline text-sm font-medium bg-gray-500 border-gray-500 text-white hover:bg-gray-700"
                    as="button"
                    method="put"
                    >Accept</Link
                >
            </div>
        </section>
    </Box>
</template>

<script setup>
import Box from "@/Components/UI/Box.vue";
import { Link } from "@inertiajs/inertia-vue3";
import Price from "@/Components/Price.vue";
import { computed } from "vue";

const props = defineProps({
    offer: Object,
    listingPrice: Number,
    isSold: Boolean,
});

const difference = computed(() => props.offer.amount - props.listingPrice);
const madeOn = computed(() => new Date(props.offer.created_at).toDateString());

// const unSold = computed(
//     () => !props.offer.accepted_at && !props.offer.rejected_at
// );
</script>
