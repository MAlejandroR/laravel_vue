<script setup>
import {Link} from "@inertiajs/vue3";
const props = defineProps({img: String, title: String, description: String, action: String})

</script>

<template>
  <div class="card bg-base-100  w-96 shadow-sm">
    <figure>
      <img
          :src="props.img"
          alt="Shoes"/>
    </figure>
    <div class="card-body">
      <h2 class="card-title">{{ props.title }}</h2>
        <p>{{ props.description }}</p>
        <div class="card-actions justify-end">
          <Link :href="props.action" as="button" class="btn btn-sm btn-success">{{props.title}} </Link>
        </div>
    </div>
  </div>
</template>

<style scoped>

</style>