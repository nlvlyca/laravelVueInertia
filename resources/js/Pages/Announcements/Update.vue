<template>
  <Head title="Update Announcements" />

  <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
    Update announcement
  </h2>
  <form @submit.prevent="submit" class="min-h-screen">
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
      <div class="sm:col-span-2">
        <label
          for="title"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
          >Title</label
        >
        <input
          type="text"
          name="title"
          id="title"
          v-model="form.title"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="Type title"
          required
        />
      </div>
      <div class="sm:col-span-2">
        <label
          for="desc"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
          >Description</label
        >
        <textarea
          v-model="form.description"
          type="text"
          name="desc"
          rows="5"
          id="desc"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="Type the description"
          required
        ></textarea>
      </div>
    </div>
    <button
      :disabled="form.processing"
      type="submit"
      class="inline-flex border items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-green-500"
    >
      Submit
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
import { useForm, usePage, Link } from "@inertiajs/vue3";

const page = usePage();

defineProps({
  errors: Object,
});

let form = useForm({
  title: page.props.annData.title,
  description: page.props.annData.description,
});

let submit = () => {
  form.post("/announcements/saveChanges/" + page.props.annData.id);
  // router.post("/users", form, {
  //   onStart: () => {
  //     processing.value = true;
  //   },s
  //   onFinish: () => {
  //     processing.value = false;
  //   },
  // });
};
</script>