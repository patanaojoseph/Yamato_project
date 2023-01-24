<template>
    <!-- <h1 class="inline text-2xl font-semibold leading-none text-gray-600">
        <i class="fas fa-list"></i>
        My listings
    </h1> -->
    <div class="mb-1 mt-1 flex flex-wrap gap-4">
        <div class="label font-bold">
            <i class="fas fa-list"></i> My listings
        </div>
        <div class="label font-bold">
            <i class="fas fa-plus-circle pl-9"></i>
            <Link :href="route('realtor.listing.create')"> Add new </Link>
        </div>
    </div>

    <section>
        <RealtorFilters :filters="filters" />
    </section>
    <Section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <Box
            v-for="listing in listings.data"
            :key="listing.id"
            :class="{ 'border-dashed bg-red-100 ': listing.deleted_at }"
        >
            <div
                class="flex flex-col md:flex-row gap-2 md:items-center justify-between"
            >
                <div :class="{ 'opacity-30': listing.deleted_at }">
                    <div
                        v-if="listing.sold_at != null"
                        class="text-xs font-bold uppercase border border-dashed pl-1 pr-1 mb-2 border-green-300 text-green-500 inline-block rounded-md"
                    >
                        sold
                    </div>

                    <div class="xl:flex items-center gap-2">
                        <Price :price="listing.price" />
                    </div>
                    <div class="xl:flex items-center gap-2">
                        <ListingSpace :listing="listing" />
                    </div>
                    <ListingAddress :listing="listing" />
                </div>
                <section>
                    <div class="flex item-center gap-1 text-gray-600">
                        <a
                            class="btn-outline border-none text-xs"
                            :href="
                                route('listing.show', { listing: listing.id })
                            "
                            target="_blank"
                            ><i class="fas fa-eye"></i
                        ></a>
                        <a
                            class="btn-outline border-none text-xs"
                            :href="
                                route('realtor.listing.edit', {
                                    listing: listing.id,
                                })
                            "
                            ><i class="fas fa-edit"></i
                        ></a>
                        <Link
                            v-if="!listing.deleted_at"
                            class="btn-outline border-none text-xs"
                            :href="
                                route('realtor.listing.destroy', {
                                    listing: listing.id,
                                })
                            "
                            as="button"
                            method="delete"
                            ><i class="fas fa-trash"></i
                        ></Link>

                        <Link
                            v-else
                            class="btn-outline border-none text-xs"
                            :href="
                                route('realtor.listing.restore', {
                                    listing: listing.id,
                                })
                            "
                            as="button"
                            method="put"
                            ><i class="fas fa-trash-restore"></i
                        ></Link>
                    </div>
                    <div class="mt-2">
                        <Link
                            :href="
                                route('realtor.listing.image.create', {
                                    listing: listing.id,
                                })
                            "
                            class="block w-full btn-outline text-xs font-medium text-center"
                            >Images ({{ listing.images_count }})</Link
                        >
                    </div>
                    <div class="mt-2">
                        <Link
                            :href="
                                route('realtor.listing.show', {
                                    listing: listing.id,
                                })
                            "
                            class="block w-full btn-outline text-xs font-medium text-center"
                            >Offers ({{ listing.offers_count }})</Link
                        >
                    </div>
                </section>
            </div>
        </Box>
    </Section>
    <section v-if="listings.data.length" class="w-full flex justify-center">
        <Pagination :links="listings.links" />
    </section>
</template>

<script setup>
import Box from "@/Components/UI/Box.vue";
import Price from "@/Components/Price.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import ListingAddress from "@/Components/ListingAddress.vue";
import { Link } from "@inertiajs/inertia-vue3";
import RealtorFilters from "@/Pages/Realtor/Index/Components/RealtorFilters.vue";
import Pagination from "@/Components/UI/Pagination.vue";
import Create from "@/Pages/Realtor/ListingImage/Create.vue";

defineProps({
    listings: Object,
    filters: Object,
});
</script>
