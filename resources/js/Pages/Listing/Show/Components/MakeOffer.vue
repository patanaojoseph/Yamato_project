<template>
    <Box>
        <div class="label">Make an offer</div>
        <div>
            <form @submit.prevent="makeOffer">
                <input v-model.number="form.amount" type="text" class="input" />
                <input
                    v-model.number="form.amount"
                    type="range"
                    :min="minimum"
                    :max="maximum"
                    step="10000"
                    class="w-full h-4 mt-2 bg-gray-300 rounded-md appearance-none cursor-pointer"
                />
                <button
                    type="submit"
                    class="btn-outline w-full mt-2 text-sm font-bold border-none"
                >
                    Make an offer
                </button>

                {{ form.errors.amount }}
            </form>
        </div>
        <div class="flex justify-between text-gray-500 mt-2">
            <div>Difference</div>
            <div>
                <Price :price="difference" />
            </div>
        </div>
    </Box>
</template>

<script setup>
import Price from "@/Components/Price.vue";
import Box from "@/Components/UI/Box.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { computed, watch } from "@vue/runtime-core";
import { debounce } from "lodash";

const props = defineProps({
    listingId: Number,
    price: Number,
});

const form = useForm({
    amount: props.price,
});

const makeOffer = () =>
    form.post(route("listing.offer.store", { listing: props.listingId }), {
        preserveScroll: true,
        preserveState: true,
    });

const difference = computed(() => form.amount - props.price);
const minimum = computed(() => Math.round(props.price / 2));
const maximum = computed(() => Math.round(props.price * 2));

const emit = defineEmits(["offerUpdated"]);
watch(
    () => form.amount,
    debounce((value) => emit("offerUpdated", value), 200)
);
</script>
