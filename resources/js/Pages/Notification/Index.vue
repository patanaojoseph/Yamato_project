<template>
    <div class="label font-bold">Notifications</div>

    <section v-if="notifications.data.length" class="text-gray-700 w-3/4">
        <div
            v-for="notification in notifications.data"
            :key="notification.id"
            class="border-b border-gray-200 py-4 px-5 ml-24 flex justify-between"
        >
            <div>
                <span
                    v-if="
                        notification.type ==
                        'App\\Notifications\\OfferNotification'
                    "
                    >Offer <Price :price="notification.data.amount" /> for
                    <Link
                        :href="
                            route('realtor.listing.show', {
                                listing: notification.data.listing_id,
                            })
                        "
                        class="text-red-600"
                        >listing</Link
                    >
                    was made.
                </span>
            </div>
            <div>
                <Link
                    :href="
                        route('notification.seen', {
                            notification: notification.id,
                        })
                    "
                    as="button"
                    method="put"
                    v-if="!notification.read_at"
                    class="btn-outline text-xs font-medium uppercase"
                >
                    mark as read
                </Link>
            </div>
        </div>
    </section>
    <section
        v-if="notifications.data.length"
        class="w-full flex justify-center mt-8 mb-8"
    >
        <Pagination :links="notifications.links" />
    </section>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import Price from "@/Components/Price.vue";
import Pagination from "@/Components/UI/Pagination.vue";

defineProps({
    notifications: Object,
});
</script>
