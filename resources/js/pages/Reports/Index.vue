<template>
    <Head title="Tickets" />
    <AppLayout>
        <template #title>Tickets</template>
        <template #desc>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam corporis quae necessitatibus!</template>

        <div class="max-w-2xl flex items-center gap-6">
            <Link :href="route('dashboard.tickets.create')">
                <Button>
                    <PlusIcon />
                    Create New Ticket
                </Button>
            </Link>
            <SearchInput class="w-full" :value="filters.search" />
        </div>
        

        <Card>
            <ScrollArea class="w-full">
                <Table>
                    <TableCaption>TIcket list</TableCaption>
                    <TableHeader>
                        <TableRow>
                            <TableHead>No</TableHead>
                            <TableHead>Title</TableHead>
                            <TableHead>Description</TableHead>
                            <TableHead class="w-[200px]">Category</TableHead>
                            <TableHead>Priority</TableHead>
                            <TableHead>Status</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="(ticket, index) in tickets" :key="ticket.id">
                            <TableCell> {{ index + 1 }} </TableCell>
                            <TableCell> 
                                <Link :href="route('dashboard.tickets.show', ticket.id)" class="text-blue-500 hover:text-blue-600 underline underline-offset-4">
                                    {{ ticket.title }}
                                </Link>    
                            </TableCell>
                            <TableCell> {{ ticket.description }} </TableCell>
                            <TableCell> {{ ticket.category.name }} </TableCell>
                            <TableCell> 
                                <TicketPriority :priority="ticket.priority" />    
                            </TableCell>
                            <TableCell> 
                                <TicketStatus :status="ticket.status" />    
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </ScrollArea>
        </Card>
    </AppLayout>
</template>

<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import SearchInput from '@/components/SearchInput.vue';
import AppLayout from "@/layouts/AppLayout.vue"
import TicketPriority from '@/components/TicketPriority.vue'
import TicketStatus from '@/components/TicketStatus.vue'
import { Button } from "@/components/ui/button"
import { PlusIcon } from '@radix-icons/vue'
import Card from '@/components/Card.vue'
import { ScrollArea } from "@/components/ui/scroll-area"
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from "@/components/ui/table"

defineProps({
    tickets: Object,
    filters: Object,
});



</script>