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
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>
