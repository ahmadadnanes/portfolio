<script setup>
import { ref, watch } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const flashMessage = ref(page.props.flash?.success || null); // Use ref instead of computed

watch(() => page.props.flash.success || page.props.success, (newMessage) => {
    flashMessage.value = newMessage;

    if (newMessage) {
        setTimeout(() => {
            flashMessage.value = null;
        }, 3000);
    }
}, {immediate: true});
</script>

<template>
    <div v-if="flashMessage"
         class="p-4 text-sm text-green-800 bg-gray-800 dark:text-green-400"
         role="alert">
        <span class="font-medium">Success alert!</span> {{ flashMessage }}
    </div>
</template>
