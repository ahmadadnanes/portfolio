<script setup>
import Header from '@/Components/Header.vue';
import { router } from '@inertiajs/vue3';
const applyColor = (event) => {
    const svg = event.target.contentDocument?.querySelector("svg");
    if (svg) {
        svg.setAttribute("fill", "currentColor"); // Make sure it's still set
        svg.classList.add("text-gray-200"); // Add Tailwind class
        svg.style.fill = "currentColor"; // Force the fill to currentColor if necessary
        svg.style.color = "#e5e7eb"; // Directly set the color style to ensure it's applied
    }
};

defineProps({
    skills: Array,
})

const deleteItem = (id) => {
    if (confirm('Are you sure you want to delete this item?')) {
        router.delete(route('skills.destroy', { id: id}))
    }
}
</script>

<template>
    <Header>
        <h2
            class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
        >
            Skills
        </h2>
    </Header>

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="flex justify-end py-2 my-2">
                    <Link
                        href="/skills/create"
                        class="
                    px-4
                    py-2
                    bg-indigo-500
                    hover:bg-indigo-700
                    text-white
                    rounded-md
                    "
                    >
                        New Skills
                    </Link>
                </div>
            </div>


            <div class="relative overflow-x-auto px-2 sm:px-6 lg:px-8">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Skill name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Icon
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">delete</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
                        v-for="skill in skills"
                        :key="skill.id"
                    >
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{skill.name}}
                        </th>
                        <td class="px-6 py-4">
                            <object
                                :data="skill.icon"
                                width="25px"
                                @load="applyColor"
                            ></object>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <Link :href="`/skills/edit/${skill.id}`" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <Link href=""  class="font-medium text-red-600 dark:text-red-600  hover:underline" @click.prevent="deleteItem(skill.id)">Delete</Link>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

</template>

<style scoped>

</style>
