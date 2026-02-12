<script setup>
import Layout from "@/Layouts/Layout.vue";
import { ref, computed } from "vue";
import { router } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const props = defineProps({
    rows: Array,
    fieldsAndLabels: Object,
    resource: Object
});

const ascendente = ref(true);
const fieldOrder = ref(Object.keys(props.fieldsAndLabels)[0]); //Quiero el primer indice del objeto o key


const sort = (field) => {
    if (field === fieldOrder.value) ascendente.value = !ascendente.value;
    else {
        fieldOrder.value = field;
        ascendente.value = true;
    }
};

//Proyectos ordenados por el campo

const rowsSort = computed(() => {
    return [...props.rows].sort((a, b) => {
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

const addResource = () => {
    router.get(props.resource.routes.create());
};
// const destroy =(id)=>{
//     if (!confirm("¿Seguro que quieres borrar este proyecto?")) return;
//     router.delete(route("projects.destroy", id), {
//         preserveScroll: true,
//     });
// }
const destroy_verified = (id) => {
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
            router.delete(props.resource.routes.destroy(id), {
                preserveScroll: true,
            });
        }
    });
};
const editar = (id) => {
    console.log ("Editar");
    console.log ("Resources routes");
    console.log (props.resource.routes);
    router.get(props.resource.routes.edit(id));
};
// return ascendente.value ? "▲" : "▼";

//Ambos dos son arrays de objetos en js Vs Array asociativo en php
</script>

<template>
        <button class="btn btn-primary btn-sm" @click="addResource">
            Añadir {{ resource.name }}
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
                <tr v-for="row in rowsSort" :key="row.id">
                    <td v-for="(label, field) in fieldsAndLabels">
                        {{ row[field] }}
                    </td>
                    <td>
                        <button
                        class="btn btn-sm btn-glass pointer-cursor"
                        @click="editar(row.id)">
                            Editar
                        </button>

                    </td>
                    <td>
                        <button
                        class="btn btn-sm btn-glass pointer-cursor"
                        @click="destroy_verified(row.id)">
                        Borrar
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
</template>

<style scoped></style>
