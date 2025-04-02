<template>
    <Head title="Create New Ticket" />
    <AppLayout>
        <template #title>Create New Ticket</template>
        <template #desc>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem ipsum laudantium debitis!
        </template>

        <Card>
            <form @submit.prevent="submit" class="[&>div]:mb-3 max-w-xl">
                <div>
                    <Label>Title</Label>
                    <Input v-model="form.title" type="text" placeholder="Bug at Dashboard Page" />
                    <InputError :message="form.errors.title" />
                </div>
                <div>
                    <Label>Description</Label>
                    <Textarea v-model="form.description" placeholder="Provide as much detail as possible about the issue"></Textarea>
                    <InputError :message="form.errors.description" />
                </div>
                <div>
                    <Label>Category</Label>
                    <Select v-model="form.category_id">
                        <SelectTrigger>
                            <SelectValue placeholder="Select category" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup v-for="category in categories" :key="category">
                                <SelectItem :value="category.id">
                                    {{ category.name }}
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                    <InputError :message="form.errors.category_id" />
                </div>
                <div>
                    <Label>Priority</Label>
                    <Select v-model="form.priority">
                        <SelectTrigger>
                            <SelectValue placeholder="Select priority" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup v-for="(priority) in priorities"  :key="priority">
                                <SelectItem :value="priority">
                                    {{ priority }}
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                    <InputError :message="form.errors.priority" />
                </div>
                <div>
                    <Button :disabled="form.proccessing" type="submit">Create</Button>
                </div>
            </form>
        </Card>
    </AppLayout>
</template>

<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'
import Card from '@/components/Card.vue'
import InputError from '@/components/InputError.vue'
import { Label } from "@/components/ui/label"
import { Input } from "@/components/ui/input"
import { Button } from "@/components/ui/button"
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select"
import { Textarea } from "@/components/ui/textarea"
import { toast } from 'vue-sonner'

defineProps({
    categories: Object,
    priorities: Array
})

const form = useForm({
    title: '',
    description: '',
    category_id: '',
    priority: '',
});

function submit() {
    form.post(route('dashboard.tickets.store'), {
        onSuccess: () => toast.success("Ticket created successfully")
    });
}

</script>