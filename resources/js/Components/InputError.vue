<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-if="message">
        <p class="text-xs text-red-600 dark:text-red-400 mt-1" v-text="message" />
    </div>
</template>
