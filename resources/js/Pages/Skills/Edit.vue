<script setup>

import TextInput from '@/Components/TextInput.vue';
import ImageInput from '@/Components/ImageInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import { router, useForm, usePage } from '@inertiajs/vue3';
import FlashMessage from '@/Components/FlashMessage.vue';

const props = defineProps({ errors: Object , skill: Object })

const form = useForm({
    name: props.skill?.name,
    icon: null,
})

function submit() {
    router.put('/skills/edit/' + props.skill.id, form)
}

const page = usePage();
</script>

<template>
    <div class="px-2">
        <div class="max-w-md mx-auto sm:px-2 lg:px-8 rounded-lg text-black dark:bg-gray-800 my-6">
            <form @submit.prevent="submit" class="py-4 space-y-4">
                <div class="ml-2">
                    <InputLabel for="name" class="mb-1 ms-1">Name:</InputLabel>
                    <TextInput id="name" v-model="form.name"  class="lg:w-full" />
                    <InputError :message="errors.name" />
                </div>
                <div class="ml-2">
                    <InputLabel for="icon" class="mb-1">Icon:</InputLabel>
                    <ImageInput @change="form.icon = $event.target.files[0]"></ImageInput>
                    <InputError :message="errors.icon" />
                </div>
                <div class="mt-4 flex items-center justify-end mr-2">
                    <PrimaryButton type="submit" :disabled="form.processing" :class="{'opacity-25' : form.processing}" class="ml-4">Update</PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>

</style>
