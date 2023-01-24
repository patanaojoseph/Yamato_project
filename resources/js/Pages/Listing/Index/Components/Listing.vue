<template>
    <Box>
        <div>
            <Link :href="route('listing.show', { listing: listing.id })">
                <div class="flex items-center">
                    <Price
                        :price="listing.price"
                        class="text-md font-semibold text-gray-600"
                    />
                    <div class="text-sm text-gray-500 font-semibold ml-2">
                        Per month
                    </div>
                    <div class="text-xs text-gray-500">
                        <Price
                            :price="monthlyPayment"
                            class="text-xm font-bold pt-3 ml-1"
                        />
                    </div>
                </div>
                <ListingSpace :listing="listing" />
                <ListingAddress :listing="listing" />
            </Link>
        </div>
        <!-- <div>
            <Link :href="route('listing.edit', { listing: listing.id })">
                <i class="fas fa-edit text-gray-500"></i>
            </Link>
        </div> -->
        <!-- <div>
            <Link
                :href="route('listing.destroy', { listing: listing.id })"
                method="delete"
            >
                <i class="fas fa-trash text-gray-500"></i>
            </Link>
        </div> -->
    </Box>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import ListingAddress from "@/Components/ListingAddress.vue";
import Box from "@/Components/UI/Box.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import Price from "@/Components/Price.vue";
import { useMonthlyPayment } from "@/Computation/useMonthlyPayment";

const props = defineProps({ listing: Object });
const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2, 35);
</script>
