<template>
  <Head title="Create User" />

  <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
    Create new user
  </h2>
  <form @submit.prevent="submit">
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
      <div class="sm:col-span-2">
        <label
          for="name"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
          >Name</label
        >
        <input
          type="text"
          name="name"
          v-model="form.name"
          id="name"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="Type your name"
          required
        />
        <div
          class="text-xs text-red-500 mt-1"
          v-if="form.errors.name"
          v-text="form.errors.name"
        ></div>
      </div>
      <div class="sm:col-span-2">
        <label
          for="email"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
          >Email Address</label
        >
        <input
          type="text"
          name="email"
          id="email"
          v-model="form.email"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="Type your email"
          required
        />
        <div
          class="text-xs text-red-500 mt-1"
          v-if="form.errors.email"
          v-text="form.errors.email"
        ></div>
      </div>
      <div class="sm:col-span-2">
        <label
          for="password"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
          >Password</label
        >
        <input
          type="password"
          name="password"
          id="password"
          v-model="form.password"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="Type your password"
        />
        <div
          class="text-xs text-red-500 mt-1"
          v-if="form.errors.password"
          v-text="form.errors.password"
        ></div>
      </div>
    </div>
    <button
      :disabled="form.processing"
      type="submit"
      class="inline-flex border items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-green-500"
    >
      Submit
    </button>
  </form>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";

defineProps({
  errors: Object,
});

// let processing = ref(false);

let form = useForm({
  name: "",
  email: "",
  password: "",
});

let submit = () => {
  form.post("/users");
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