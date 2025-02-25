<script>
export default {
    layout: null,
};
</script>
<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import Footer from '@/Components/Footer.vue';
import Promote from '@/Components/Promote.vue';
import Nav from '@/Components/Nav.vue';
import Hero from '@/Components/Hero.vue';
import About from '@/Components/About.vue';
import Skills from '@/Components/Skills.vue';
import Portfolio from '@/Components/Portfolio.vue';
import Services from '@/Components/Services.vue';
import ContactMe from '@/Components/ContactMe.vue';
import SuccessFlashMessage from '@/Components/SuccessFlashMessage.vue';

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}

defineProps({
    skills: Array,
    projects: Array
})
</script>

<template>
    <SuccessFlashMessage/>
    <Head title="Welcome To My Portfolio" />
    <!--nav-->
    <Nav/>
    <!--end nav-->
    <!--  Hero  -->
    <Hero/>
    <!-- end hero-->
    <!-- promote   -->
    <Promote/>
    <!-- end promote   -->
    <!--    about-->
    <About/>
    <!--    end about-->
    <!--skills-->
    <Skills :skills="skills"/>
    <!--end skills-->
    <!--    projects-->
    <Portfolio :projects="projects" :skills="skills"/>
    <!--    end projects-->
    <!--    start services -->
    <Services/>
    <!--    end services -->
    <!--    start contact -->
    <ContactMe/>
    <!--    end contact-->
    <Footer/>
</template>
