<script setup>
import Layout from '@/Layouts/Layout.vue';
import { usePage } from '@inertiajs/vue3';
import { watch, ref, computed } from 'vue';


const page = usePage()
//Leer los datos
const fields = computed (()=>page.props.fields);
const projects = computed (()=>page.props.projects);

const localProjects  = ref([...projects.value]);

const sortDirection = ref('asc');
const sortField=ref(fields.value[0]??null);

watch(projects, (newProjects)=>{
    localProjects.value= [...newProjects]
});

const sortBy = (field)=>{
    if (sortField.value ===field){
        sortDirection.value = sortDirection.value==='asc'? 'dec':'asc';
    }else{
        sortField.value =field;
        sortDirection.value='asc';
    }
    localProjects.value.sort((a,b)=>{
        let aVal=a[field];
        let bVal=b[field];
        if (aVal<bVal) return sortDirection.value==='asc'? -1 : 1;
        if (aVal>bVal) return sortDirection.value==='asc'? 1 : -1;
        return 0;
    })
}



</script>

<template>
<Layout>
    <div class="overflow-x-auto h-96 w-96">
        <table class="table table-xs table-pin-rows table-pin-cols">
            <thead>
            <tr>
                <th v-for="field in fields" :key="field" @click="sortBy(field)" class="cursor-pointer">
                    {{ field }}  {{sortField===field ? sortDirection === 'asc'? '▲': '▼' :''}}
                </th>
                </tr>
                </thead>
            <tbody>
            <tr v-for="project in localProjects" :key="project.id">
                <td v-for="(field, index) in fields" :key="index">
                    {{project[field]??'-'}}
                </td>

            </tr>

            </tbody>

        </table>
    </div>




</Layout>



</template>

<style scoped>

</style>
