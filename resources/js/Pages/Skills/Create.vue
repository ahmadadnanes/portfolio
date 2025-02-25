<script setup>
import { router, useForm } from '@inertiajs/vue3';
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue'
import ImageInput from '@/Components/ImageInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({ errors: Object })

const form = useForm({
    name: '',
    icon: null,
})

function submit() {
    router.post('/skills/create', form)
}

const page = usePage();
const flash = computed(() => page.props.flash);
</script>

<template>
    <div class="px-2">
        <div class="max-w-md mx-auto sm:px-2 lg:px-8 rounded-lg text-black dark:bg-gray-800 my-6">
            <form @submit.prevent="submit" class="py-4 space-y-4">
                <div class="ml-2">
                    <InputLabel for="name" class="mb-1">Name:</InputLabel>
                    <TextInput id="name" v-model="form.name"  class="lg:w-full"/>
                    <InputError :message="errors.name" />
                </div>
                <div class="ml-2">
                    <InputLabel for="icon" class="mb-1">Icon:</InputLabel>
                    <ImageInput @change="form.icon = $event.target.files[0]"></ImageInput>
                    <InputError :message="errors.icon" />
                </div>
                <div class="mt-4 flex items-center justify-end mr-2">
                    <PrimaryButton type="submit" :disabled="form.processing" :class="{'opacity-25' : form.processing}" class="ml-4">Store</PrimaryButton>
                </div>
            </form>
        </div>
    </div>
        <div v-if="flash.success" class="bg-green-500 text-white p-3 rounded">
            {{ flash.success }}
        </div>
        <div v-if="flash.error" class="bg-red-500 text-white p-3 rounded">
            {{ flash.error }}
        </div>
</template>

<style scoped>
</style>
