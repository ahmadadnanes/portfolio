<script setup>

import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';
const form = useForm({
    name: '',
    email: '',
    subject: ''
})

const submit = () => {
    form.post(route('contact') , {
        onSuccess: () => form.reset()
    })
}
</script>

<template>
<section class="section bg-dark-primary" id="contact">
    <div class="container px-8">
        <div class="flex flex-col items-center text-center">
            <h2 class="section-title">
                Contact Me!
            </h2>
            <div class="subtitle">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto blanditiis doloribus eveniet illo nihil omnis repellat. A dignissimos dolores eos fuga id iste optio praesentium, quo repellat, saepe sapiente sequi?
            </div>
        </div>
        <div class="flex-1 lg:flex-row lg:gap-x-8">
            <div class="flex flex-1 flex-col items-center space-y-8 mb-12 lg:mb-0 lg:pt-2 lg:flex-row lg:justify-between">
                <div class="space-y-6">
                    <div class="flex flex-col lg:flex-row gap-x-4">
                        <div class="text-accent rounded-sm flex mt-2 mb-4 lg:mb-0 text-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-body text-xl mb-1">
                                Have a question?
                            </h4>
                            <p class="mb-1 text-paragraph">
                                I am here to help you.
                            </p>
                            <p class="text-accent font-normal">
                                Email me at ahmadadnanes7@gmail.com
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-x-4">
                        <div class="text-accent rounded-sm flex mt-2 mb-4 lg:mn-0 text-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-body text-xl mb-1">
                                Current Location
                            </h4>
                            <p class="mb-1 text-paragraph">
                                Amman, Jordan
                            </p>
                            <p class="text-accent font-normal">
                                Serving Clients
                            </p>
                        </div>
                    </div>
                </div>
                <form action="" class="space-y-8 max-w-md" @submit.prevent="submit">
                    <div class="flex gap-8">
                        <div>
                            <input type="text" class="input" placeholder="Your Name" v-model="form.name">
                            <input-error :message="form.errors.name"/>
                        </div>
                        <div>
                            <input type="text" class="input" placeholder="Your Email" v-model="form.email">
                            <input-error :message="form.errors.email"/>
                        </div>
                    </div>
                    <div>
                            <textarea class="textarea" spellcheck="false" v-model="form.subject">

                            </textarea>
                            <input-error :message="form.errors.subject"/>
                    </div>
                    <button class="btn btn-lg bg-accent hover:bg-dark-secondary hover:text-dark-navy-100">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
</template>

<style scoped>

</style>
