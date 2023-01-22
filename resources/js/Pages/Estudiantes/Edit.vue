<template>
  <Head title="Edit estudiante" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit estudiante
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white rounded">
        <!-- Formulario                -->
        <form class="py-4" @submit.prevent="submit">
          <div>
            <InputLabel for="nombre" value="Nombre" />

            <TextInput
              id="nombre"
              type="text"
              class="mt-1 block w-full"
              v-model="form.nombre"
              autofocus
            />

            <InputError class="mt-2" :message="$page.props.errors.nombre" />
          </div>
          <div>
            <InputLabel for="paterno" value="Apellido paterno" />

            <TextInput
              id="paterno"
              type="text"
              class="mt-1 block w-full"
              v-model="form.paterno"
              autofocus
            />

            <InputError class="mt-2" :message="$page.props.errors.paterno" />
          </div>

          <div>
            <InputLabel for="materno" value="Apellido materno" />

            <TextInput
              id="materno"
              type="text"
              class="mt-1 block w-full"
              v-model="form.materno"
              autofocus
            />

            <InputError class="mt-2" :message="$page.props.errors.materno" />
          </div>

          <div>
            <InputLabel for="sexo" value="Genero" />
            <select
              v-model="form.sexo"
              id="sexo"
              name="sexo"
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
              <option>Masculino</option>
              <option>Femenino</option>
              <option>No Especificado</option>
            </select>
            <InputError class="mt-2" :message="$page.props.errors.sexo" />
          </div>

          <div>
            <InputLabel for="codigo" value="Codigo de matricula" />

            <TextInput
              id="codigo"
              type="text"
              class="mt-1 block w-full"
              v-model="form.codigo"
              autofocus
            />

            <InputError class="mt-2" :message="$page.props.errors.codigo" />
          </div>

          <div>
            <InputLabel for="correo" value="Correo electronico" />

            <TextInput
              id="correo"
              type="text"
              class="mt-1 block w-full"
              v-model="form.correo"
              autofocus
            />

            <InputError class="mt-2" :message="$page.props.errors.correo" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <PrimaryButton
              class="ml-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Update estudiante
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
import { router } from "@inertiajs/vue3";

const props = defineProps({
  estudiante: Object,
});
const form = useForm({
  nombre: props.estudiante?.nombre,
  paterno: props.estudiante?.paterno,
  materno: props.estudiante?.materno,
  sexo: props.estudiante?.sexo,
  codigo: props.estudiante?.codigo,
  correo: props.estudiante?.correo,
});

const submit = () => {
  router.post(`/estudiantes/${props.estudiante.id}`, {
    _method: "put",
    nombre: form.nombre,
    paterno: form.paterno,
    materno: form.materno,
    sexo: form.sexo,
    codigo: form.codigo,
    correo: form.correo,
  });
};
</script>
  