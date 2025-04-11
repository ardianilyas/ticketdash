<template>
    <Head :title="message" />
    <div class="flex flex-col items-center justify-center w-full min-h-screen">
        <h2 class="text-5xl font-bold text-slate-900"> {{ status }} </h2>
        <p class="text-slate-500 text-xl leading-relaxed"> {{ maintenanceMessage ||  message }} </p>
        <Link v-if="!maintenanceMessage" class="mt-4" :href="previousUrl">
            <Button>
                <MoveLeft />
                Back to previous page
            </Button>
        </Link>
    </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from "@/components/ui/button"
import { MoveLeft } from 'lucide-vue-next';

interface Props {
    status: number,
    previousUrl: string,
    maintenanceMessage?: string,
}

const props = defineProps<Props>();

const message = computed(() => {
    return {
        404: 'Page not found',
        500: 'Internal server error',
        403: 'Forbidden',
        401: 'Unauthorized',
        429: 'Too many requests',
    }[props.status] || 'An error occurred';
})
</script>