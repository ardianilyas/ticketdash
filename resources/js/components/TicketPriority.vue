<template>
    <div :class="priorityClass" class="inline-flex text-sm px-4 py-[2px] rounded-full">
        {{ priority }}
    </div>
</template>

<script setup lang="ts">
import { computed } from "vue"

const props = defineProps({
    priority: {
        type: String,
        required: true
    }
});

const priorityClass = computed(() => {
    switch(props.priority.toLowerCase()) {
        case 'low':
            return 'bg-lime-300 text-lime-900'
        case 'medium': 
            return 'bg-yellow-300 text-yellow-900'
        case 'high':
            return 'bg-orange-300 text-orange-900'
        case 'urgent':
            return 'bg-red-300 text-red-900'
        default:
            return 'bg-red-300'
    }
})
</script>