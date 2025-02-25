<script setup>
defineProps({
    project: Object
})
</script>

<template>
    <a :href="project.project_url" class="group flex flex-col items-center text-center cursor-pointer" target="_blank">
        <div class="mb-6">
            <img class="rounded-2xl h-56" :src="project.image" :alt="project.name">
        </div>
        <div class="flex gap-x-2">
            <span class="group-hover:text-light-tail-500 capitalize text-accent text-sm mb-3" v-for="skill in project.skills" :key="skill.id">
                {{skill.name}}
            </span>
        </div>
    </a>
</template>

<style scoped>

</style>
