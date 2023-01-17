<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-1 mt-9">
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
        </div>
        <Box class="md:col-span-7 flex items-center w-full">
            <div class="w-full text-center font-medium text-gray-500">
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

const intRate = ref(2);
const duration = ref(35);

const props = defineProps({
    listing: Object,
});

const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(
    props.listing.price,
    intRate,
    duration
);
</script>
