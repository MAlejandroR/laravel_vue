<script setup>

import Nav from '@/Layouts/Nav.vue';
import Header from '@/Layouts/Header.vue';
import Footer from '@/Layouts/Footer.vue';
import FlashMessage from "@/Components/FlashMessage.vue";

</script>
<template>
    <Header />
    <Nav/>
    <main class="h-main bg-main">
    <slot />
    </main>
    <FlashMessage />
    <Footer/>
</template>

<style scoped>

</style>
