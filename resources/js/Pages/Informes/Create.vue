<template>
  <Head title="New Informe" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        New Informe
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white rounded">
        <!-- Formulario                -->
        <form class="py-4" @submit.prevent="submit">
          <div>
            <InputLabel for="nombre" value="Nombre del informe" />

            <TextInput
              id="nombre"
              type="text"
              class="mt-1 block w-full"
              v-model="form.nombre"
              autofocus
            />

            <InputError class="mt-2" :message="form.errors.nombre" />
          </div>
          <div>
            <InputLabel for="descripcion" value="Resumen" />

            <textarea
              v-model="form.descripcion"
              id="descripcion"
              rows="4"
              name="descripcion"
              class="
                block
                p-2.5
                w-full
                text-sm text-gray-900
                bg-gray-50
                rounded-lg
                border border-gray-300
                focus:ring-blue-500 focus:border-blue-500
                white:bg-gray-700
                dark:border-gray-600
                dark:placeholder-gray-400
                dark:text-black
                dark:focus:ring-blue-500
                dark:focus:border-blue-500
              "
              placeholder="Write here..."
            ></textarea>

            <InputError class="mt-2" :message="form.errors.descripcion" />
          </div>

          <div>
            <InputLabel for="categoria" value="Practicas Pre-Profesionales" />
            <select
              v-model="form.categoria"
              id="categoria"
              name="categoria"
              class="
                mt-1
                block
                w-full
                pl-3
                pr-10
                py-2
                text-base
                border-gray-300
                focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                sm:text-sm
                rounded-md
              "
            >
              <option>Practicas I</option>
              <option>Practicas II</option>
            </select>
            <InputError class="mt-2" :message="form.errors.categoria" />
          </div>

          <div>
            <InputLabel for="centro" value="Centro de practicas" />

            <TextInput
              id="centro"
              type="text"
              class="mt-1 block w-full"
              v-model="form.centro"
              autofocus
            />

            <InputError class="mt-2" :message="form.errors.centro" />
          </div>

          <div>
            <InputLabel for="docente" value="Docente de prácticas" />

            <select
              v-model="form.docente"
              id="docente"
              name="docente"
              class="
                mt-1
                block
                w-full
                pl-3
                pr-10
                py-2
                text-base
                border-gray-300
                focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                sm:text-sm
                rounded-md
              "
            >
              <option v-for="docente in docentes" :key="docente.id" :value="docente.id">
                {{ docente.nombre }} {{ docente.paterno }} {{ docente.materno }}
              </option>
            </select>
            <InputError class="mt-2" :message="form.errors.docente" />
          </div>

          <div>
            <InputLabel for="estudiante" value="Estudiante" />

            <select
              v-model="form.estudiante"
              id="estudiante"
              name="estudiante"
              class="
                mt-1
                block
                w-full
                pl-3
                pr-10
                py-2
                text-base
                border-gray-300
                focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                sm:text-sm
                rounded-md
              "
            >
              <option v-for="estudiante in estudiantes" :key="estudiante.id" :value="estudiante.id">
                {{ estudiante.nombre }} {{ estudiante.paterno }} {{ estudiante.materno }}
              </option>
            </select>
            <InputError class="mt-2" :message="form.errors.estudiante" />
          </div>

          <!-- <div>
            <InputLabel for="pdf" value="Archivo de PDF" />

            <TextInput
              id="pdf"
              type="text"
              class="mt-1 block w-full"
              v-model="form.pdf"
              autofocus
            />

            <InputError class="mt-2" :message="form.errors.pdf" />
          </div> -->

          <div>
            <InputLabel for="fecha" value="Fecha de presentacion" />

            <TextInput
              id="fecha"
              type="date"
              class="mt-1 block w-full"
              v-model="form.fecha"
              autofocus
            />

            <InputError class="mt-2" :message="form.errors.fecha" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <PrimaryButton
              class="ml-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Store Informe
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
  
  <script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

defineProps({
    docentes: Array, estudiantes: Array,
});


const form = useForm({
  nombre: "",
  descripcion: "",
  categoria: "",
  centro: "",
//   pdf: "",
  fecha: "",
  docente: "",
  estudiante: "",
});

const submit = () => {
  form.post(route("informes.store"));
};
</script>
  