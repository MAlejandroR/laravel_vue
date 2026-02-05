<script setup>

import Nav from '@/Layouts/Nav.vue';
import Header from '@/Layouts/Header.vue';
import Footer from '@/Layouts/Footer.vue';

</script>
<template>
    <Header />
    <Nav/>
    <main class="h-main bg-main">
    <slot />
    </main>
    <Footer/>
</template>

<style scoped>

</style>
