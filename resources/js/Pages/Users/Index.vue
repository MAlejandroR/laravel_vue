<script setup>
import Table from "@/Components/Table.vue";
import Layout from "@/Layouts/Layout.vue";
import userResource from "@/models/userResource.js";
const props= defineProps({rows:Array, fields:Object})
const model = userResource;
</script>
<template>
  <Layout>
    <Table :rows="rows" :fields="fields" :model="model"/>
  </Layout>
</template>
<style scope>

</style>