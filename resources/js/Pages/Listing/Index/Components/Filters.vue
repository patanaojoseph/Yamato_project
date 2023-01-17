<template>
    <form @submit.prevent="filter">
        <div class="mb-4 mt-4 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center">
                <select
                    v-model="filterForm.beds"
                    class="filter-input-left w-22"
                >
                    <option :value="null">Beds</option>
                    <option v-for="n in 6" :key="n" :value="n">{{ n }}</option>
                    <option>7+</option>
                </select>
                <select
                    v-model="filterForm.baths"
                    class="filter-input-beds-baths w-22"
                >
                    <option :value="null">Baths</option>
                    <option v-for="n in 6" :key="n" :value="n">{{ n }}</option>
                    <option>7+</option>
                </select>
                <select
                    v-model="filterForm.kitchen"
                    class="filter-input-baths-kitchen w-22"
                >
                    <option :value="null">Kitchen</option>
                    <option v-for="n in 2" :key="n" :value="n">{{ n }}</option>
                    <option>3+</option>
                </select>
                <select
                    v-model="filterForm.dinning"
                    class="filter-input-right w-22"
                >
                    <option :value="null">Dinning</option>
                    <option v-for="n in 2" :key="n" :value="n">{{ n }}</option>
                    <option>3+</option>
                </select>
            </div>
            <div class="flex flex-nowrap items-center">
                <input
                    v-model="filterForm.priceFrom"
                    type="text"
                    class="filter-input-left w-28"
                    placeholder="Price from"
                />
                <input
                    v-model="filterForm.priceTo"
                    type="text"
                    class="filter-input-right w-28"
                    placeholder="Price to"
                />
            </div>

            <div class="flex flex-nowrap items-center">
                <input
                    v-model="filterForm.areaFrom"
                    type="text"
                    class="filter-input-left w-28"
                    placeholder="Area from"
                />
                <input
                    v-model="filterForm.areaTo"
                    type="text"
                    class="filter-input-right w-28"
                    placeholder="Area to"
                />
            </div>
            <button type="submit" class="filter-button">Filter</button>
            <button type="reset" @click="clear">Clear</button>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    filters: Object,
});
const filterForm = useForm({
    beds: props.filters.beds ?? null,
    baths: props.filters.baths ?? null,
    kitchen: props.filters.kitchen ?? null,
    dinning: props.filters.dinning ?? null,
    priceFrom: props.filters.priceFrom ?? null,
    priceTo: props.filters.priceTo ?? null,
    areaFrom: props.filters.areaFrom ?? null,
    areaTo: props.filters.areaTo ?? null,
});

const filter = () => {
    filterForm.get(route("listing.index"), {
        preserveState: true,
        preserveScroll: true,
    });
};

const clear = () => {
    filterForm.beds = null;
    filterForm.baths = null;
    filterForm.kitchen = null;
    filterForm.dinning = null;
    filterForm.priceFrom = null;
    filterForm.priceTo = null;
    filterForm.areaFrom = null;
    filterForm.areaTo = null;
    filter();
};
</script>
