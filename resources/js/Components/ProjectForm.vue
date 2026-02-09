<script setup>
import { useForm } from "@inertiajs/vue3";
import { computed } from "vue";
import { useRemember } from "@inertiajs/vue3";

const props = defineProps({
    project: {
        type: Object,
        default: null,
    },
});

const isEdit = computed(() => !!props.project);

const form = useForm({
    name: props.project?.name ?? "",
    description: props.project?.description ?? "",
    hours: props.project?.hours ?? "",
    starting_date: props.project?.starting_date ?? "",
});

const submit = () => {
    if (isEdit.value) {
        form.put(route("projects.update", props.project.id));
    } else {
        form.post(route("projects.store"), {
            onSuccess: () => form.reset(),
        });
    }
};
</script>

<template>
    <Layout>
        <div class="flex justify-center items-center min-h-full">
            <form
                @submit.prevent="submit"
                class="space-y-4 bg-white p-3 rounded rounded-2"
            >
                <!-- NAME -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nombre</span>
                    </label>

                    <input v-model="form.name" class="input input-bordered" />

                    <span v-if="form.errors.name" class="text-error text-sm">
                        {{ form.errors.name }}
                    </span>
                </div>

                <!-- DESCRIPTION -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Descripción</span>
                    </label>

                    <textarea
                        v-model="form.description"
                        class="textarea textarea-bordered"
                    >
                    </textarea>

                    <span
                        v-if="form.errors.description"
                        class="text-error text-sm"
                    >
                        {{ form.errors.description }}
                    </span>
                </div>

                <!-- HOURS -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Horas</span>
                    </label>

                    <input
                        v-model="form.hours"
                        type="number"
                        min="0"
                        class="input input-bordered"
                    />

                    <span v-if="form.errors.hours" class="text-error text-sm">
                        {{ form.errors.hours }}
                    </span>
                </div>

                <!-- DATE -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Fecha inicio</span>
                    </label>

                    <input
                        v-model="form.starting_date"
                        type="date"
                        class="input input-bordered"
                    />

                    <span
                        v-if="form.errors.starting_date"
                        class="text-error text-sm"
                    >
                        {{ form.errors.starting_date }}
                    </span>
                </div>

                <!-- BUTTON -->
                <div class="flex justify-end mt-6">
                    <button class="btn btn-primary" :disabled="form.processing">
                        <span
                            v-if="form.processing"
                            class="loading loading-spinner"
                        >
                        </span>

                        {{ isEdit ? "Actualizar proyecto" : "Crear proyecto" }}
                    </button>
                </div>
            </form>
        </div>
    </Layout>
</template>
