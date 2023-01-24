<template>
    <form>
        <div class="mb-4 mt-4 flex flex-wrap gap-4">
            <div class="flex flex-nowrap items-center gap-2">
                <input
                    id="deleted"
                    v-model="filterForm.deleted"
                    type="checkbox"
                    class="h-4 w-4 rounded border-gray-900 text-gray-600 focus:ring-gray-500"
                />
                <label for="deleted">Deleted</label>
            </div>
            <div>
                <select
                    v-model="filterForm.by"
                    class="filter-input-left w-24 border"
                >
                    <option value="created_at">Added</option>
                    <option value="price">Price</option>
                </select>
                <select
                    v-model="filterForm.order"
                    class="filter-input-right w-32 border"
                >
                    <option
                        v-for="option in sortOptions"
                        :key="option.value"
                        :value="option.value"
                    >
                        {{ option.label }}
                    </option>
                </select>

                <!-- <Link
                :href="route('realtor.listing.create')"
                class="text-base font-bold font-nunito text-gray-600 pl-9"
            >
                Add new
            </Link> -->
            </div>
        </div>
    </form>
</template>

<script setup>
import { reactive, watch, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { debounce } from "lodash";

const sortLabels = {
    created_at: [
        {
            label: "Latest",
            value: "desc",
        },
        {
            label: "Oldest",
            value: "asc",
        },
    ],
    price: [
        {
            label: "Expensive",
            value: "desc",
        },
        {
            label: "Cheapest",
            value: "asc",
        },
    ],
};

const sortOptions = computed(() => sortLabels[filterForm.by]);

const props = defineProps({
    filters: Object,
});

const filterForm = reactive({
    deleted: props.filters.deleted ?? false,
    by: props.filters.by ?? "created_at",
    order: props.filters.order ?? "desc",
});

watch(
    filterForm,
    debounce(
        () =>
            Inertia.get(route("realtor.listing.index"), filterForm, {
                preserveState: true,
                preserveScroll: true,
            }),
        1000
    )
);
</script>
