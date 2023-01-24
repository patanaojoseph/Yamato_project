<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-1 mt-1">
        <div class="md:col-span-4 flex flex-col gap-1">
            <Box>
                <div class="label">Property Information</div>
                <Price
                    :price="listing.price"
                    class="text-md font-semibold text-gray-600"
                />
                <ListingSpace :listing="listing" />
                <ListingAddress :listing="listing" />
            </Box>
            <Box class="col-span-12 md:col-span-3">
                <div class="label">Monthly Payment</div>
                <div class="text-1xl text-gray-600 font-bold">
                    <label class="label">Interest rate ({{ intRate }} %)</label>
                    <input
                        v-model.number="intRate"
                        type="range"
                        min="0.1"
                        max="30"
                        step="0.1"
                        class="w-full h-4 bg-gray-300 rounded-md appearance-none cursor-pointer"
                    />

                    <label class="label">Duration ({{ duration }} years)</label>
                    <input
                        v-model.number="duration"
                        type="range"
                        min="3"
                        max="35"
                        step="1"
                        class="w-full h-4 bg-gray-300 rounded-md appearance-none cursor-pointer"
                    />

                    <div class="text-gray-600 mt-2">
                        <div class="label">Your monthly payment</div>
                        <Price
                            :price="monthlyPayment"
                            class="text-md font-semibold text-gray-600"
                        />
                    </div>

                    <div class="mt-2 text-gray-500">
                        <div class="flex justify-between">
                            <div class="label">Total</div>
                            <div>
                                <Price
                                    :price="totalPaid"
                                    class="text-md font-semibold text-gray-600"
                                />
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div class="label">Price</div>
                            <div>
                                <Price
                                    :price="listing.price"
                                    class="text-md font-semibold text-gray-600"
                                />
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div class="label">Interest</div>
                            <div>
                                <Price
                                    :price="totalInterest"
                                    class="text-md font-semibold text-gray-600"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </Box>
            <MakeOffer
                v-if="user && !offerMade"
                @offer-updated="offer = $event"
                :listing-id="listing.id"
                :price="listing.price"
            />
            <OfferMade v-if="user && offerMade" :offer="offerMade" />
        </div>
        <Box class="md:col-span-7 flex items-center w-full">
            <div v-if="listing.images.length" class="grid grid-cols-2 gap-1">
                <img
                    v-for="image in listing.images"
                    :key="image.id"
                    :src="image.src"
                />
            </div>
            <div v-else class="w-full text-center font-medium text-gray-500">
                No images
            </div>
        </Box>
    </div>
</template>

<script setup>
import ListingAddress from "@/Components/ListingAddress.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import Price from "@/Components/Price.vue";
import Box from "@/Components/UI/Box.vue";
import { ref } from "vue";
import { useMonthlyPayment } from "@/Computation/useMonthlyPayment";
import MakeOffer from "@/Pages/Listing/Show/Components/MakeOffer.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import OfferMade from "./Show/Components/OfferMade.vue";

const intRate = ref(2);
const duration = ref(35);

const props = defineProps({
    listing: Object,
    offerMade: Object,
});

const offer = ref(props.listing.price);

const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(
    offer,
    intRate,
    duration
);

const page = usePage();
const user = computed(() => page.props.value.user);
</script>
