<template>
    <form @submit.prevent="submit">
        <Input v-model="searchQuery" type="text" placeholder="Search data" />
    </form>
</template>

<script setup lang="ts">
import { watch } from 'vue';
import { Input } from "@/components/ui/input";
import { useForm } from '@inertiajs/vue3';
import { useSearch } from '@/composables/useSearch';

const props = defineProps({
    value: {
        type: String,
        default: ''
    }
});

const { searchQuery } = useSearch(route().current(), props.value);

const form = useForm({
    search: props.value
});

watch(searchQuery, (newValue) => {
    form.search = newValue
});

const submit = () => {
    form.get(route().current(), {
        preserveState: true,
        preserveScroll: true,
        replace: true
    });
}
</script>