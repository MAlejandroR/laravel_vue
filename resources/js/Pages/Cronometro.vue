<script setup>

import {ref} from "vue";

const minutos = ref(0)
const milisegundos = ref(0)
const segundos = ref(0)
const start_stop = ref("Start");
const running = ref (false);
const idInterval = ref (null);

const pulsar = ()=>{
  running.value = !running.value;
 if (running.value){
    start_stop.value="Stop"
    idInterval.value =setInterval(()=>{
      if (milisegundos.value==99){
        milisegundos.value=0;
        segundos.value++;
      }else{
        milisegundos.value ++;
      }
    }, 10)
  }else{
    clearInterval(idInterval.value);
    start_stop.value="Start";
  }
}

const reset = ()=>{
  milisegundos.value =0;
  segundos.value =0;
  minutos.value =0;
  start_stop.value = "Start";
  running.value =false;
  clearInterval(idInterval.value);
}




const format = (numero)=> numero.toString().padStart(2 ,"0")


</script>

<template>
  <div class="bg-base-200 flex min-h-screen items-center justify-center">
    <div class="card bg-base-100 w-96 p-8 shadow-xl">
      <div class="mb-6 flex items-end justify-center gap-4">
        <div class="bg-base-200 rounded-lg px-4 py-3 text-center">
          <div class="font-mono text-4xl">
            {{ format(minutos) }}
          </div>
          <div class="text-xs opacity-60">MIN</div>
        </div>

        <div class="pb-4 font-mono text-3xl">:</div>

        <div class="bg-base-200 rounded-lg px-4 py-3 text-center">
          <div class="font-mono text-4xl">
            {{ format(segundos) }}
          </div>
          <div class="text-xs opacity-60">SEG</div>
        </div>

        <div class="pb-4 font-mono text-3xl">:</div>

        <div class="bg-base-200 rounded-lg px-4 py-3 text-center">
          <div class="font-mono text-2xl">
            {{ format(milisegundos) }}
          </div>
          <div class="text-xs opacity-60">MS</div>
        </div>
      </div>

      <div class="flex justify-center gap-4">
        <button  @click="pulsar" class="btn btn-primary">
          {{ start_stop }}
        </button>
        <button @click="reset"  class="btn btn-outline">
          Reset
        </button>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>