<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import { Toaster } from '@/components/ui/sonner';
import type { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <Toaster richColors position="top-right" closeButton />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-6 min-h-screen">
            <h1 class="text-2xl font-semibold text-slate-900 dark:text-slate-200">
                <slot name="title" />
            </h1>
            <p class="text-slate-600 dark:text-slate-100 leading-relaxed">
                <slot name="desc" />
            </p>
            <div class="my-6">
                <slot />
            </div>
        </div>
    </AppLayout>
</template>
