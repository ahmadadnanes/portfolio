<script setup>
import Project from '@/Components/Project.vue';
import { ref } from 'vue';

let props =  defineProps({
    skills: Array,
    projects: Array
});

let filterdProjects = ref(props.projects);

const filterProjects = (id) => {
    if (id === 'all') {
        filterdProjects.value = props.projects;
    } else {
        filterdProjects.value = props.projects.filter(project => {
            return project.skills.some((skill) => {
                return skill.id === id;
            });
        });
    }
}
</script>

<template>
    <section id="portfolio" class="section bg-dark-primary min-h-[1400px]">
        <div class="container mx-auto px-8">
            <div class="flex flex-col items-center text-center">
                <div class="container mx-auto">
                    <nav class="mb-12 border-b-2 border-light-tail-100 text-dark-navy-100">
                        <ul class="flex flex-col lg:flex-row justify-evenly items-center flex-wrap">
                           <li class="cursor-pointer capitalize m-4">
                                <button class="flex text-center px-4 py-2 hover:text-light-tail-500 text-dark-navy-100" id="all" @click="filterProjects('all')">
                                    All
                                </button>
                           </li>
                            <li class="cursor-pointer capitalize m-4" v-for="ProjectSkill in skills" :key="ProjectSkill.id">
                                <button class="flex text-center px-4 py-2 hover:text-light-tail-500 text-dark-navy-100" :id="ProjectSkill.id" @click="filterProjects(ProjectSkill.id)">
                                    {{ProjectSkill.name}}
                                </button>
                            </li>
                        </ul>
                    </nav>
                    <section class="grid gap-y-12 lg:grid-cols-3 lg:gap-8">
                            <Project v-for="project in filterdProjects" :project="project" :key="project.id"/>
                    </section>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>

</style>
