<template>
    <form @submit.prevent="update">
        <div class="flex bg-white">
            <div class="mx-auto">
                <div>
                    <div class="bg-white rounded-lg drop-shadow-2xl">
                        <div class="flex">
                            <div class="flex-1 py-5 pl-5 overflow-hidden">
                                <h1
                                    class="inline text-2xl font-semibold leading-none text-black"
                                >
                                    <i class="fas fa-info-circle"></i>
                                    Listing Information
                                </h1>
                            </div>
                        </div>

                        <div class="px-5 mt-2">
                            <div class="flex">
                                <div class="flex-grow w-1/4 pr-2">
                                    <label class="label">Beds</label>
                                    <input
                                        type="text"
                                        v-model.number="form.beds"
                                        class="input mb-3"
                                    />
                                    <div v-if="form.errors.beds" class="error">
                                        {{ form.errors.beds }}
                                    </div>
                                </div>
                                <div class="flex-grow w-1/4 pr-2">
                                    <label class="label">Baths</label>
                                    <input
                                        type="text"
                                        v-model.number="form.baths"
                                        placeholder="Kitchen"
                                        class="input"
                                    />
                                    <div v-if="form.errors.baths" class="error">
                                        {{ form.errors.baths }}
                                    </div>
                                </div>
                                <div class="flex-grow w-1/4 pr-2">
                                    <label class="label">Kitchen</label>
                                    <input
                                        type="text"
                                        v-model.number="form.kitchen"
                                        placeholder="Kitchen"
                                        class="input"
                                    />
                                    <div
                                        v-if="form.errors.kitchen"
                                        class="error"
                                    >
                                        {{ form.errors.kitchen }}
                                    </div>
                                </div>
                                <div class="flex-grow w-1/4 pr-2">
                                    <label class="label">Dinning</label>
                                    <input
                                        type="text"
                                        v-model.number="form.dinning"
                                        placeholder="Dinning"
                                        class="input"
                                    />
                                    <div
                                        v-if="form.errors.dinning"
                                        class="error"
                                    >
                                        {{ form.errors.dinning }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="flex-grow w-1/4 pr-2">
                                    <label class="label">Area</label>
                                    <input
                                        type="text"
                                        v-model.number="form.area"
                                        placeholder="Area"
                                        class="input"
                                    />
                                    <div v-if="form.errors.area" class="error">
                                        {{ form.errors.area }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <label
                                    for="Address"
                                    class="block ml-2 text-sm text-gray-900"
                                ></label>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="flex-1 py-5 pl-5 overflow-hidden">
                                <h1
                                    class="inline text-2xl font-semibold leading-none text-black"
                                >
                                    <i class="fas fa-location"></i>
                                    Address
                                </h1>
                            </div>
                            <div class="flex-none pt-2.5 pr-2.5 pl-1"></div>
                        </div>
                        <div class="px-5 pb-5 mt-2">
                            <div class="flex">
                                <div class="flex-grow w-1/4 pr-2">
                                    <label class="label">City</label>
                                    <input
                                        type="text"
                                        v-model="form.city"
                                        placeholder="City"
                                        class="input mb-3"
                                    />
                                    <div v-if="form.errors.city" class="error">
                                        {{ form.errors.city }}
                                    </div>
                                </div>
                                <div class="flex-grow w-1/4 pr-2">
                                    <label class="label">Post Code</label>
                                    <input
                                        type="text"
                                        v-model.number="form.code"
                                        placeholder="Postal code"
                                        class="input"
                                    />
                                    <div v-if="form.errors.code" class="error">
                                        {{ form.errors.code }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="flex-grow w-1/4 pr-2">
                                    <label class="label">Street</label>
                                    <input
                                        type="text"
                                        v-model="form.street"
                                        placeholder="Street"
                                        class="input"
                                    />
                                    <div
                                        v-if="form.errors.street"
                                        class="error"
                                    >
                                        {{ form.errors.street }}
                                    </div>
                                </div>
                                <div class="flex-grow w-1/4 pr-2">
                                    <label class="label">Street no.</label>
                                    <input
                                        type="text"
                                        v-model.number="form.street_no"
                                        placeholder="Street no."
                                        class="input"
                                    />
                                    <div
                                        v-if="form.errors.street_no"
                                        class="error"
                                    >
                                        {{ form.errors.street_no }}
                                    </div>
                                </div>
                                <div class="flex w-1/4 pr-2">
                                    <div class="flex-grow">
                                        <label class="label">Price</label>
                                        <input
                                            type="text"
                                            v-model.number="form.price"
                                            placeholder="Price"
                                            class="input"
                                        />
                                        <div
                                            v-if="form.errors.price"
                                            class="error"
                                        >
                                            {{ form.errors.price }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="px-5 pb-5 mt-2">
                            <div class="flex w-1/4 pr-2">
                                <button type="submit" class="primary-button">
                                    <i class="fas fa-save"></i>
                                    <span class="pl-2 pr-9 mx-1">UPDATE</span>
                                </button>
                            </div>
                        </div>
                        <!-- <div class="flex flex-row-reverse p-3">

                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    listing: Object,
});

const form = useForm({
    beds: props.listing.beds,
    baths: props.listing.baths,
    kitchen: props.listing.kitchen,
    dinning: props.listing.dinning,
    area: props.listing.area,
    city: props.listing.city,
    code: props.listing.code,
    street: props.listing.street,
    street_no: props.listing.street_no,
    price: props.listing.price,
});
const update = () =>
    form.put(route("listing.update", { listing: props.listing.id }));
</script>
