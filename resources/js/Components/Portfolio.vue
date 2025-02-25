<script setup>
import Projects from '@/Components/Projects.vue';

defineProps({
    skills: Array,
    projects: Array
})
</script>

<template>
<section id="projects" class="section bg-dark-primary mih-h-[1400px]">
    <div class="container px-8">
        <div class="flex flex-col items-center text-center">
            <h2 class="section-title">
                My latest work
            </h2>
            <p class="subtitle">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Ad, mollitia, perferendis! Alias, culpa doloremque ducimus eaque expedita harum hic illo ipsa mollitia odio pariatur porro quia recusandae repellendus totam voluptates.
            </p>
        </div>
    </div>
    <Projects :skills="skills" :projects="projects"/>
</section>
</template>

<style scoped>

</style>
