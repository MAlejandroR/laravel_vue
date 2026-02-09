<script setup>
import Layout from "@/Layouts/Layout.vue";
import { ref, computed } from "vue";
import { router } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const props = defineProps({
    projects: Array,
    fieldsAndLabels: Object,
});

const ascendente = ref(true);
const fieldOrder = ref(Object.keys(props.fieldsAndLabels)[0]); //Quiero el primer indice del objeto o key

console.log(Object.keys(props.fieldsAndLabels));
console.log(Object.keys(props.fieldsAndLabels)[0]);
console.log(fieldOrder.value);

const sort = (field) => {
    if (field === fieldOrder.value) ascendente.value = !ascendente.value;
    else {
        fieldOrder.value = field;
        ascendente.value = true;
    }
};

//Proyectos ordenados por el campo

const projectsSort = computed(() => {
    return [...props.projects].sort((a, b) => {
        let aVal = a[fieldOrder.value];
        let bVal = b[fieldOrder.value];

        //Ordenar números
        if (!isNaN(aVal) && !isNaN(bVal))
            return ascendente.value ? aVal - bVal : bVal - aVal;

        if (!isNaN(Date.parse(aVal))) {
            return ascendente.value
                ? new Date(aVal) - new Date(bVal)
                : new Date(bVal) - new Date(aVal);
        }

        // ✅ Strings → usar localeCompare (MUY importante)
        return ascendente.value
            ? String(aVal).localeCompare(String(bVal))
            : String(bVal).localeCompare(String(aVal));
    });
});

const addProject = () => {
    router.get(route("projects.create"));
};
// const destroy =(id)=>{
//     if (!confirm("¿Seguro que quieres borrar este proyecto?")) return;
//     router.delete(route("projects.destroy", id), {
//         preserveScroll: true,
//     });
// }
const destroy = (id) => {
    Swal.fire({
        title: "¿Borrar proyecto?",
        text: "Esta acción no se puede deshacer",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#e3342f",
        cancelButtonColor: "#6b7280",
        confirmButtonText: "Sí, borrar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route("projects.destroy", id), {
                preserveScroll: true,

                // onSuccess: () => {
                //     Swal.fire(
                //         "Borrado",
                //         "El proyecto ha sido eliminado.",
                //         "success",
                //     );
                // },
            });
        }
    });
};
const edit = (id) => {
    router.get(route("project.edit", id));
};
// return ascendente.value ? "▲" : "▼";

//Ambos dos son arrays de objetos en js Vs Array asociativo en php
</script>

<template>
    <Layout>
        <button class="btn btn-primary btn-sm" @click="addProject">
            Añadir Projecto
        </button>
        <div class="overflow-x-auto h-96">
            <table class="table table-xs table-pin-rows table-pin-cols">
                <thead>
                    <tr>
                        <!-- v-for patterns:

                        ARRAY:
                        v-for="(item, index) in array"
                        :item -> valor
                        :index -> posición

                        OBJECT:
                        v-for="(value, key) in object"
                        :value -> contenido
                        :key -> nombre de la propiedad
                        KEY
                        :key funciona como una primary key del DOM virtual;
                         permite a Vue actualizar solo lo que cambia sin romper la interfaz.`
                        :key debe ser único y estable.
                        Evitar usar index si existe un id.
                        -->
                        <th
                            v-for="(label, field) in fieldsAndLabels"
                            :key="field"
                            @click="sort(field)"
                            class="cursor-pointer"
                        >
                            {{ label }}
                            <span v-if="field === fieldOrder">
                                {{ ascendente ? "▲" : "▼" }}
                            </span>
                        </th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="project in projectsSort" :key="project.id">
                        <td v-for="(label, field) in fieldsAndLabels">
                            {{ project[field] }}
                        </td>
                        <td
                            class="btn btn-sm btn-glass pointer-cursor"
                            @click="edit(project.id)"
                        >
                            Editar
                        </td>
                        <td
                            class="btn btn-sm btn-glass pointer-cursor"
                            @click="destroy(project.id)"
                        >
                            Borrar
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </Layout>
</template>

<style scoped></style>
