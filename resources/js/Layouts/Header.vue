<script setup>

import { usePage, Link } from '@inertiajs/vue3';
import { computed } from 'vue';



const user = computed(() => usePage().props.auth.user);
</script>

<template>
    <header class="h-header bg-header flex justify-between items-center">
        <img src="img/logo.png" alt="logo" className="max-h-full" />
        <h1 class="text-4xl text-blue-900">GESTION DEL INSTITUTO</h1>
        <div>
            <div>
                <div v-if="user">


                    <p>{{ user.name }}</p>
                    <Link href="logout" method="post" as="button" class="btn btn-primary ">
                        Logout
                    </Link>
                </div>
                <div v-else>

                    <Link href="login" as="button" class="btn btn-primary ">
                        Login
                    </Link>
                    <Link href="register" class="btn btn-primary cursor-pointer">
                        Register
                    </Link>
                </div>
            </div>
        </div>
    </header>
</template>

<style scoped>

</style>
