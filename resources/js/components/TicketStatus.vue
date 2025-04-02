<template>
    <div :class="statusClass" class="inline-flex text-sm px-4 py-1 rounded-full">
        {{ status }}
    </div>
</template>

<script setup lang="ts">
import { computed } from 'vue'

const props = defineProps({
    status: {
        type: String,
        required: true
    }
});

const statusClass = computed(() => {
    switch(props.status.toLowerCase()) {
        case 'open':
            return 'bg-violet-300 text-violet-900'
        case 'in_progress':
            return 'bg-blue-300 text-blue-900'
        case 'resolved':
            return 'bg-sky-300 text-sky-900'
        case 'closed':
            return 'bg-rose-300 text-rose-900'
        default: 
            return 'bg-gray-300 text-gray-900'
    }
})
</script>