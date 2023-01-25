<template>
  <Head title="New Book" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        New Book
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white rounded">
        <!-- Formulario                -->
        <form class="py-4" @submit.prevent="submit">
          <div>
            <InputLabel for="titulo" value="Titulo del libro" />

            <TextInput
              id="titulo"
              type="text"
              class="mt-1 block w-full"
              v-model="form.titulo"
              autofocus
            />

            <InputError class="mt-2" :message="form.errors.titulo" />
          </div>
          <div>
            <InputLabel for="autor" value="Autor del libro" />

            <TextInput
              id="autor"
              type="text"
              class="mt-1 block w-full"
              v-model="form.autor"
              autofocus
            />

            <InputError class="mt-2" :message="form.errors.autor" />
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
                dark:border-gray-300
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
            <InputLabel for="enlace" value="Enlace de drive" />

            <TextInput
              id="enlace"
              type="text"
              class="mt-1 block w-full"
              v-model="form.enlace"
              autofocus
            />

            <InputError class="mt-2" :message="form.errors.enlace" />
          </div>


          <div>
            <InputLabel for="image" value="Imagen de Portada" />

            <TextInput
              id="image"
              type="file"
              class="mb-2 block w-full"
              @input="form.image = $event.target.files[0]"
            />

            <InputError class="mt-2" :message="form.errors.image" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <PrimaryButton
              class="ml-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Store Book
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

const form = useForm({
  titulo: "",
  autor: "",
  descripcion: "",
  enlace: "",
  image: null,
});

const submit = () => {
  form.post(route("libros.store"));
};
</script>
    