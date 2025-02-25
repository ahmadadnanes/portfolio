<script setup>
defineProps({
    skills: Array
})
const applyColor = (event) => {
    const svg = event.target.contentDocument?.querySelector("svg");
    if (svg) {
        svg.setAttribute("fill", "currentColor"); // Make sure it's still set
        svg.classList.add("text-gray-200");
        svg.style.fill = "currentColor";
        svg.style.color = "#e5e7eb";
    }
};
</script>

<template>
    <section class="bg-dark-navy-500 py-12">
        <div class="container mx-auto px-2">
            <div class="flex justify-center items-center flex-wrap px-10 gap-5 sm:gap-y-0">
                <div class="flex items-center justify-center" v-for="skill in skills" :key="skill.id">
                    <object :data="skill.icon" class="lg:h-20 sm:h-15 h-10" @load="applyColor"/>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>

</style>
