
<script setup>

import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import ImageInput from '@/Components/ImageInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { router, useForm } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import { usePage } from "@inertiajs/vue3";
import FlashMessage from '@/Components/FlashMessage.vue';

let props = defineProps({ errors: Object, project: Object , skills: Array , flash: Array });

const form = useForm({
    name: props.project?.name,
    image: null,
    skills: props.project?.skills.map(skill => skill.id),
    project_url: props.project?.project_url,
});

function submit() {
    router.put('/projects/edit/' + props.project.id, form);
}

const page = usePage();
const flash = computed(() => props.flash);
let isOpen = ref(false);

const toggle = () => {
    isOpen.value = ! isOpen.value;
}

</script>

<template>
    <FlashMessage :message="flash.success"/>
    <div class="px-2">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8 rounded-lg text-black dark:bg-gray-800 my-6">
            <form @submit.prevent="submit" class="py-4 space-y-4">
                <div class="mx-2">
                    <InputLabel for="name" class="mb-1">Name:</InputLabel>
                    <TextInput id="name" v-model="form.name"  class="w-full" v-text="project.name"/>
                    <InputError :message="errors.name" />
                </div>
                <div class="mx-2">
                    <InputLabel for="icon" class="mb-1">Image:</InputLabel>
                    <ImageInput @change="form.image = $event.target.files[0]" />
                    <InputError :message="errors.image" />
                </div>
                <div class="mx-2">
                    <InputLabel for="name" class="mb-1">Url:</InputLabel>
                    <TextInput id="name" v-model="form.project_url"  class="w-full"/>
                    <InputError :message="errors.project_url" />
                </div>

                <button
                    id="dropdownCheckboxButton"
                    data-dropdown-toggle="dropdownDefaultCheckbox"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ms-2" type="button"
                    @click="toggle"
                >
                    Skills
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div v-if="isOpen" id="dropdownDefaultCheckbox" class="z-10 w-48 bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600 absolute">
                    <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownCheckboxButton">
                        <li v-for="skill in skills" :key="skill.id">
                            <div class="flex items-center">

                                <input v-model="form.skills" :value="skill.id" name="skills" :id="`checkbox-${skill.id}`" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label :for="`checkbox-${skill.id}`" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{skill.name}}</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="mt-4 flex items-center justify-end mr-2">
                    <PrimaryButton type="submit" :disabled="form.processing" :class="{'opacity-25' : form.processing}" class="ml-4">Store</PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>

</style>
