<template>
  <Head title="Create New Announcement" />

  <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
    Create new announcement
  </h2>
  <form @submit.prevent="submit" class="min-h-screen">
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
      <div class="sm:col-span-2">
        <label
          for="name"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
          >Title</label
        >
        <input
          type="text"
          name="name"
          v-model="form.title"
          id="name"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="Type the title"
          required
        />
        <div
          class="text-xs text-red-500 mt-1"
          v-if="form.errors.title"
          v-text="form.errors.title"
        ></div>
      </div>
      <div class="sm:col-span-2">
        <label
          for="name"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
          >Descriptiom</label
        >
        <textarea
          type="text"
          name="name"
          v-model="form.description"
          rows="5"
          id="name"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="Type the title"
          required
        ></textarea>
        <div
          class="text-xs text-red-500 mt-1"
          v-if="form.errors.description"
          v-text="form.errors.description"
        ></div>
      </div>
    </div>
    <button
      :disabled="form.processing"
      type="submit"
      class="inline-flex border items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-green-500"
    >
      Create
    </button>
    <Link
      href="/announcements"
      class="inline-flex border items-center ml-1 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-400"
    >
      Back to Table</Link
    >
  </form>
</template>
<script setup>
import { useForm, Link } from "@inertiajs/vue3";

defineProps({
  errors: Object,
});

// let processing = ref(false);

let form = useForm({
  title: "",
  description: "",
});

let submit = () => {
  form.post("/announcements");
  // router.post("/users", form, {
  //   onStart: () => {
  //     processing.value = true;
  //   },
  //   onFinish: () => {
  //     processing.value = false;
  //   },
  // });
};
</script>