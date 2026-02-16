<script setup>
import Layout from "@/Layouts/Layout.vue";
import {usePage ,Link} from "@inertiajs/vue3";
import {computed, ref } from "vue";
 import Login from  '@/Pages/Auth/Login.vue'
 import Modal from '@/Components/Modal.vue';
 import Card from "@/Components/Card.vue";


const user = computed(() => usePage().props.auth.user);
const props = defineProps({cards:Object})



const showLogin = ref(false)


// const showLogin = ref(false);
// const openLogin = ()=>showLogin.value=true;
// const closeLogin = ()=>showLogin.value=false;

</script>

<template>
  <Layout @open-modal='showLogin=true'>
    <div v-if="user">

      <h2 className="mb-6 px-6 text-3xl font-bold">
        Funcionalidades del proyecto
      </h2>
      <div class="grid gap-6 px-6 sm:grid-cols-2 lg:grid-cols-3">
        <Card v-for="card in props.cards" :key="card.title" :title="card.title"
        :description="card.description" :action="card.action" :img="card.img"
        />

      </div>
    </div>

    <Modal :show="showLogin" @close="showLogin=false">
      <Login @close="showLogin=false"/>
    </Modal>



<!--<Modal :show='showLogin'>-->
<!--  <Login />-->
<!--</Modal>-->

  </Layout>
</template>

<style scoped>

</style>