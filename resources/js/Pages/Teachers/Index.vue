<script setup>
import Table from "@/Components/Table.vue";
import Layout from "@/Layouts/Layout.vue";
import teacherResource  from "@/models/teacherResource.js";
const props= defineProps({rows:Array, fields:Object})
const model = teacherResource;
</script>
<template>
  <Layout>
    <Table :rows="rows" :fields="fields" :model="model"/>
  </Layout>
</template>
<style scope>

</style>