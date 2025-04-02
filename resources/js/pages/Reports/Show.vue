<template>
    <Head title="Ticket Detail" />
    <AppLayout>
        <template #title>Ticket Detail</template>
        <template #desc>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit doloremque illo tenetur.
        </template>

        <Card>
            <h2 class="text-2xl font-semibold text-slate-900 capitalize"> {{ ticket.title }} - {{ ticket.category.name }} </h2>
            <p class="text-slate-600 leading-relaxed"> {{ ticket.description }} </p>

            <div class="mt-3 flex flex-col gap-2">
                <p class="flex items-center gap-2">
                    <span class="w-24 text-slate-700">Priority</span>
                    <TicketPriority :priority="ticket.priority" />
                </p>
                <p class="flex items-center gap-2">
                    <span class="w-24 text-slate-700">Status</span>
                    <TicketStatus :status="ticket.status" />
                </p>
                <p class="flex items-center gap-2">
                    <span class="w-24 text-slate-700">Ticket from</span>
                    <span class="text-slate-600">{{ ticket.user.name }}</span>
                </p>
            </div>
        </Card>
    </AppLayout>
</template>

<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'
import Card from '@/components/Card.vue'
import TicketPriority from '@/components/TicketPriority.vue'
import TicketStatus from '@/components/TicketStatus.vue'

defineProps({
    ticket: Object
});
</script>