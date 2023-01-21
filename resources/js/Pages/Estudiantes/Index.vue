<template>
  <Head title="Estudiantes" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Estudiantes
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Buton Create -->
        <div class="flex justify-end m-2 p-2">
          <Link
            :href="route('estudiantes.create')"
            class="
              px-4
              -py-4
              bg-indigo-500
              hover:bg-indigo-700
              text-white
              rounded-md
            "
            >New Student</Link
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
                <th scope="col" class="px-6 py-3">Codigo</th>
                <th scope="col" class="px-6 py-3">Correo</th>
                <th scope="col" class="px-6 py-3">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="estudiante in estudiante.data"
                :key="estudiante.id"
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
                  {{ estudiante.id }}
                </th>
                <td class="px-6 py-4">{{ estudiante.nombre }}</td>
                <td class="px-6 py-4">{{ estudiante.paterno }}</td>
                <td class="px-6 py-4">{{ estudiante.materno }}</td>
                <td class="px-6 py-4">{{ estudiante.sexo }}</td>
                <td class="px-6 py-4">{{ estudiante.codigo }}</td>
                <td class="px-6 py-4">{{ estudiante.correo }}</td>
                <td class="px-6 py-4">
                  <Link
                    :href="route('estudiantes.edit', estudiante.id)"
                    class="font-medium text-blue-500 hover:text-blue-700 mr-2"
                    >Editar</Link
                  >
                  <Link
                    :href="route('estudiantes.destroy', estudiante.id)"
                    method="delete"
                    as="button"
                    type="button"
                    class="font-medium text-red-500 hover:text-red-700 mr-2"
                    >Eliminar</Link
                  >
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
import { Head, Link } from "@inertiajs/vue3";
defineProps({
  estudiante: Object,
});
</script>
