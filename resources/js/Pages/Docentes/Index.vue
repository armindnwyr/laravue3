<template>
  <Head title="Docentes" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Docentes
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Buton Create -->
        <div class="flex justify-end m-2 p-2">
          <Link
            :href="route('docentes.create')"
            class="
              px-4
              -py-4
              bg-indigo-500
              hover:bg-indigo-700
              text-white
              rounded-md
            "
            >New Teacher</Link
          >
        </div>

        <!-- Table Docente -->

        <div class="relative overflow-x-auto rounded">
          <table
            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
          >
            <thead
              class="
                text-xs text-gray-700
                uppercase
                bg-gray-50
                dark:bg-gray-700 dark:text-gray-400
              "
            >
              <tr>
                <th scope="col" class="px-6 py-3">Id</th>
                <th scope="col" class="px-6 py-3">Nombre</th>
                <th scope="col" class="px-6 py-3">Paterno</th>
                <th scope="col" class="px-6 py-3">Materno</th>
                <th scope="col" class="px-6 py-3">Sexo</th>
                <th scope="col" class="px-6 py-3">Celular</th>
                <th scope="col" class="px-6 py-3">Correo</th>
                <th scope="col" class="px-6 py-3">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="docente in docente.data" :key="docente.id"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <th
                  scope="row"
                  class="
                    px-6
                    py-4
                    font-medium
                    text-gray-900
                    whitespace-nowrap
                    dark:text-white
                  "
                >
                  {{ docente.id }}
                </th>
                <td class="px-6 py-4">{{ docente.nombre }}</td>
                <td class="px-6 py-4">{{ docente.paterno }}</td>
                <td class="px-6 py-4">{{ docente.materno }}</td>
                <td class="px-6 py-4">{{ docente.sexo }}</td>
                <td class="px-6 py-4">{{ docente.celular }}</td>
                <td class="px-6 py-4">{{ docente.correo }}</td>
                <td class="px-6 py-4">
                  Editar-Eliminar
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
  docente: Object,
});
</script>
