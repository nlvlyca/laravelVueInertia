<template>
  <Head title="Login Page" />
  <div class="max-w-3xl mx-auto mt-10 border rounded-lg p-10">
    <h2
      class="mb-4 text-3xl text-center font-bold text-gray-900 dark:text-white"
    >
      Login | My App
    </h2>
    <main>
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
        Login
      </h2>
      <form @submit.prevent="submit">
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
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
          </div>
        </div>
        <button
          type="submit"
          class="inline-flex border items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-green-500"
        >
          Login
        </button>
      </form>
    </main>
  </div>
</template>
<script>
export default {
  layout: null,
};
</script>
<script setup>
import { useForm } from "@inertiajs/vue3";
let form = useForm({
  email: "",
  password: "",
});
let submit = () => {
  form.post("/login");
};
</script>