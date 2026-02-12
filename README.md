# CRUD

## El back

2. Recibir datos del bacck.
   Esta acción se hace igual en blade

* En el back

```php
 public function index()
    {
        $projects = Project::all();
        $fields = (new Project)->getFillable();
        $titleFields = Project::getLabel();
        return Inertia::render("Projects/Index", ['projects'=>$projects, "fields"=>$fields, "titleFields"=>$titleFields]);
        //
    }
```

## En el front: leer los datos

```php
const props = defineProps({ projects, fields, titleFields });

```

> No se recomienda destructurar props en páginas que usan paginación o recargas parciales con Inertia, porque las props
> pueden actualizarse sin que el componente se remonte.

> Si destructuramos, perdemos la conexión con el proxy reactivo de Vue y el valor no se actualizará.

> Por eso es más seguro usar:
> ```php
> const props = defineProps(...)
> ```

* Renderizar valores en el front:

```vue
//Aunque en el back ambos dos son arrays, en el front no es así
//En un caso es un array asociativo y lo conviete en objeto en js
//En el otro caso es un array de arrays asociatibo y lo convierte en un array de objetos

<script setup>
    import Layout from "@/Layouts/Layout.vue";

    const props = defineProps({
        projects: Array,
        fieldsAndLabels: Object,
    });
</script>

```

### En el front: Renderizar los datos

Una vez que los tenemos los mostraremos usando (en Vue) v-for, en React pe el método map

```vue

<template>
    <Layout>
        <div class="overflow-x-auto h-96 w-96">
            <table class="table table-xs table-pin-rows table-pin-cols">
                <thead>
                <tr>
                    <th
                        v-for="(label, field) in fieldsAndLabels"
                        :key="field"
                    >
                        {{ label }}
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="project in projects" :key="project.id">
                    <td v-for="(label, field) in fieldsAndLabels">
                        {{ project[field] }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </Layout>
</template>

```

### Ordenar los datos

* Para ello necesito:

1. variable que me diga el sentido ascendente, descendente

```php
const ascendente = ref(true);
```

* En el template

```html
 <span v-if="field === fieldOrder">
    {{ ascendente ? "▲" : "▼" }}
 </span>
```

2. El campo de ordenación

```vue
const fieldOrder = ref(Object.keys(props.fieldsAndLabels)[0]); //Quiero el primer indice del objeto o key
```

3. El array de projectos ordenados por ese campo

```vue

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

```

4. Un método para ordenar por ese campo

```js
const sort = (field) => {
  if (field === fieldOrder.value)
      ascendente.value = !ascendente.value;
  else {
    fieldOrder.value = field;
    ascendente.value = true;
}
};
```
* Y luevo invocarlo en el template

```vue
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
```


### Filtrar los datos

### Botón añadir projecto


### Botón Editar projecto

### Botón borrar projecto

### Paginar


