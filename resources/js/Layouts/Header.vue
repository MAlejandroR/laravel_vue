<script setup>
import {usePage, Link} from "@inertiajs/vue3";
import {computed, defineEmits} from 'vue';


const user = computed(()=>usePage().props.auth.user)


// const emit = defineEmits(['open-modal']);


const emit = defineEmits(['open-modal']);
</script>

<template>
  <header class="h-header bg-header flex justify-between px-5 items-center">
    <img src="/img/logo.png" alt="logo" class="max-h-full">
    <h1 class="hidden md:block text-4xl text-blue-900">"GESTION DEL INSTITUTO"</h1>
    <div v-if="user">
      <p>hola {{ user.name }}</p>
      <Link href="logout" method="post" as="button">
        Logout
      </Link>
    </div>
<!--    Si no estoy autenticaso-->
    <div class="hidden md:block" v-else>
<!--      <button @click="emit('open-modal')" class="btn btn-primary"  as="button">-->
<!--        Login-->
<!--      </button>-->
      <button class="btn btn-primary"  @click="emit('open-modal')">
        Login
      </button>
      <Link href="register" class="btn btn-primary"  as="button">
        Register
      </Link>
    </div>
  </header>


</template>

<style scoped>

</style>