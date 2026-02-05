<script setup>
import Layout from '@/Layouts/Layout.vue';

import { usePage, Link } from '@inertiajs/vue3';
import { computed } from 'vue';


const user = computed(()=>usePage().props.auth.user)
</script>

<template>
<Layout>
    <div v-if="user"
        class="hero min-h-screen"
        style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);"
    >
        <div class="hero-overlay"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
                <p class="mb-5">
                    Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                    quasi. In deleniti eaque aut repudiandae et a id nisi.
                </p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>
    <div v-else class="bg-gray-100">
    <h2 class="mb-6 px-6 text-3xl font-bold bg-gray-">
        Funcionalidades del proyecto
    </h2>
    <div class="grid gap-6 px-6 sm:grid-cols-2 lg:grid-cols-3">
        <div class="card bg-base-100  w-96 shadow-sm">


            <figure>
                <img
                    src="img/projects.jpeg"
                    alt="Proyectos"
                />
            </figure>
            <div class="card-body">
                <h2 class="card-title">Gestión de proyectos</h2>
                <p>Gestiona los proyectos del centro</p>
                <div class="card-actions justify-end">
                    <Link class="btn btn-primary" href="projects" as="button">
                        Gestionar Projectos
                    </Link>

                </div>
            </div>
        </div>
        <div class="card bg-base-100 image-full w-96 shadow-sm">
            <figure>
                <img
                    src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                    alt="Shoes" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">Card Title</h2>
                <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Buy Now</button>
                </div>
            </div>
        </div>
    </div>



    </div>


</Layout>
</template>

<style scoped>

</style>
