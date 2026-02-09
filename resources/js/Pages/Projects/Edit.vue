<script setup>
import Layout from "@/Layouts/Layout.vue";
import ProjectForm from "@/Components/ProjectForm.vue";

defineProps({
    project: Object,
});
</script>

<template>
    <Layout>
        <div class="max-w-2xl mx-auto mt-10">
            <ProjectForm :project="project" />
        </div>
    </Layout>
</template>
