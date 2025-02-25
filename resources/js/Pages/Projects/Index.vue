<script setup>
    import Header from '@/Components/Header.vue';
    import { router } from '@inertiajs/vue3';
    defineProps({
        projects : Array
    });
    const deleteItem = (id) => {
        if (confirm('Are you sure you want to delete this item?')) {
            router.delete(route('projects.destroy', { id: id }))
        }
    }
</script>

<template>
    <Header>
        <h2
            class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
        >
            Projects
        </h2>
    </Header>
    <div class="py-12">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="flex justify-end py-2 my-2">
                    <Link
                        href="/projects/create"
                        class="
                    px-4
                    py-2
                    bg-indigo-500
                    hover:bg-indigo-700
                    text-white
                    rounded-md
                    "
                    >
                        New Project
                    </Link>
                </div>
            </div>

            <div class="relative overflow-x-auto px-2 sm:px-6 lg:px-8">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Project name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Url
                        </th>
                        <th scope="col" class="px-6 py-3">
                            image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
                        v-for="project in projects"
                        :key="project.id"
                    >
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{project.name}}
                        </th>
                        <td class="px-6 py-4">
                            <a :href="project.project_url" target="_blank">Link</a>
                        </td>

                        <td class="px-6 py-4">
                            <img :src="project.image" alt="projrct image" width="25px"/>
                        </td>
<!--                        <td class="px-6 py-4">-->
<!--                            <object-->
<!--                                :data="project.icon"-->
<!--                                width="25px"-->
<!--                                @load="applyColor"-->
<!--                            ></object>-->
<!--                           -->
<!--                        </td>-->
                        <td class="px-6 py-4 text-right">
                            <Link
                                :href="`/projects/edit/${project.id}`"
                                class="font-medium text-blue-600 dark:text-blue-600 hover:underline"
                            >
                                Edit
                            </Link>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <Link
                                href=""
                                class="font-medium text-red-600 dark:text-red-600 hover:underline"
                                @click.prevent="deleteItem(project.id)"
                            >
                                Delete
                            </Link>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
</template>

<style scoped>
</style>
