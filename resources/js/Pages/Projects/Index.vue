<script setup>


const props = defineProps({projects: Array, fieldsAndLabels: Object})
import projectResources from "@/resources/projectResources.js";

import Table from "@/Components/Table.vue";

</script>
<template>
    <Layout>
        asdfasdf
        <Table :rows="projects" :fieldsAndLabels="fieldsAndLabels" :resource="projectResources"/>
    </Layout>
</template>
<style media="">

</style>
