<script setup>
import { computed, ref, watch } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const visible = ref(false)

const message = computed(() => page.props.flash?.success || page.props.flash?.error)
const type = computed(() =>
    page.props.flash?.success ? 'success' : 'error'
)
console.log(`Valor de mensaje ${message}`);
console.log(`Tipo ${type}`);

watch(message, (val) => {
    if (val) {
        visible.value = true
        setTimeout(() => visible.value = false, 3000)
    }
})
</script>

<template>
    <Transition name="fade">
        <div
            v-if="visible"
            class="fixed top-5 right-5 z-50 px-4 py-3 rounded-lg shadow-lg text-white"
            :class="type === 'success' ? 'bg-green-500' : 'bg-red-500'"
        >
            {{ message }}
        </div>
    </Transition>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.4s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
