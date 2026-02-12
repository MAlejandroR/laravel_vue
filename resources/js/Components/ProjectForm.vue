<script setup>

import {useForm, router} from "@inertiajs/vue3";

const props = defineProps({project:{type:Object, default:null}})


const submit = ()=>{
    if (props.project)
        form.put(route("projects.update", props.project.id))
    else
        form.post(route(("projects.store")))
}


const form = useForm({
    name:props.project?.name ?? '',
    description:props.project?.description ??'',
    hours:props.project?.hours?? 0,
    starting_date:props.project?.starting_date??null
});
const cancel = ()=>{
    console.log("Volviendo al index");
    router.get(route("projects.index"));
}



</script>

<template>
        <div class="flex justify-center items-center min-h-full">
            <form @submit.prevent="submit" class="max-w-2xl mx-auto p-6 bg-base-100 shadow-xl rounded-xl space-y-6">

                <!-- Nombre -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Nombre</span>
                    </label>
                    <input
                        type="text"
                        name="name"
                        placeholder="Introduce el nombre del proyecto"
                        class="input input-bordered w-full focus:input-primary"
                        required
                        v-model='form.name'
                    />
                </div>

                <!-- Descripción -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Descripción</span>
                    </label>
                    <textarea
                        name="description"
                        rows="4"
                        placeholder="Describe brevemente el proyecto"
                        class="textarea textarea-bordered w-full focus:textarea-primary"
                        v-model='form.description'
                        required
                    ></textarea>
                </div>

                <!-- Grid para horas y fecha -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Horas -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Horas</span>
                        </label>
                        <input
                            type="number"
                            name="hours"
                            min="0"
                            placeholder="Ej: 120"
                            class="input input-bordered w-full focus:input-primary"
                            required
                            v-model='form.hours'
                        />
                    </div>

                    <!-- Fecha -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Fecha de comienzo</span>
                        </label>
                        <input
                            type="date"
                            name="starting_date"
                            class="input input-bordered w-full focus:input-primary"
                            v-model="form.starting_date"
                            required
                        />
                    </div>

                </div>

                <!-- Botones -->
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" @click="cancel" class="btn btn-ghost">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Guardar proyecto
                    </button>
                </div>

            </form>
        </div>
</template>
