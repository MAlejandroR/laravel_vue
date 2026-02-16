<script setup>
import {usePage} from "@inertiajs/vue3";
import Header from "@/Layouts/Header.vue";
import Nav from "@/Layouts/Nav.vue";
import Footer from "@/Layouts/Footer.vue";
// import { defineEmits } from 'vue';
// const emit = defineEmits(['open-modal']);


const emit = defineEmits(['open-modal'])
</script>

<template>
<!--  <Header @open-modal="emit('open-modal')"/>-->
  <Header @open-modal="emit('open-modal')" />
  <Nav/>
  <main class="h-main bg- main">
    <slot />
  </main>
  <Footer/>
</template>

<style scoped>

</style>