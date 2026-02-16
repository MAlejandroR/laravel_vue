<script setup>
import Table from "@/Components/Table.vue";
import Layout from "@/Layouts/Layout.vue";
import projectResource from "@/models/projectResource.js";
const props= defineProps({rows:Array, fields:Object})
const model = projectResource;
</script>
<template>
  <Layout>
    <Table :rows="rows" :fields="fields" :model="model"/>
  </Layout>
</template>
<style scope>

</style>