<template>
  <div>
    <Head title="Profile" />
    <div class="flex">
      <img
        class="w-24 h-24 rounded-full"
        src="../../photos/user_icon.png"
        alt="user photo"
      />
      <div class="flex items-center ml-4">
        <div class="flex flex-col gap-2">
          <h1 class="text-3xl font-bold">{{ user }}</h1>
          <h1 class="">{{ email }}</h1>
        </div>
      </div>
    </div>

    <hr class="my-4" />

    <div>
      <h1 class="text-xl my-3">Change Password</h1>
      <form class="min-h-screen" @submit.prevent="submit">
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
          <div class="sm:col-span-2">
            <!-- <label
              for="name"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Name</label
            > -->
            <input
              type="password"
              autocomplete="off"
              name="old_password"
              v-model="form.old_password"
              id="old_password"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              placeholder="Enter old password"
              required
            />
            <div
              class="text-xs text-red-500 mt-1"
              v-if="old_error"
              v-text="old_error"
            ></div>
          </div>
          <div class="sm:col-span-2">
            <!-- <label
              for="email"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Email Address</label
            > -->
            <input
              type="password"
              name="new_password"
              v-model="form.new_password"
              id="new_password"
              autocomplete="off"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              placeholder="Enter new password"
              required
            />
            <!-- <div
              class="text-xs text-red-500 mt-1"
              v-if="form.errors.email"
              v-text="form.errors.email"
            ></div> -->
          </div>
          <div class="sm:col-span-2">
            <!-- <label
              for="email"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Email Address</label
            > -->

            <input
              v-model="re_enterpass"
              autocomplete="off"
              type="password"
              name="email"
              id="email"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              placeholder="Re-enter new password"
              required
            />
            <div
              class="text-xs text-red-500 mt-1"
              v-if="re_error"
              v-text="re_error"
            ></div>
          </div>
        </div>
        <button
          type="submit"
          class="inline-flex border items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-green-500"
        >
          Save Changes
        </button>
      </form>
    </div>
  </div>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
// import toast from "./Shared/toast";
// function addToast() {
//   toast.add({
//     message: "Hello from dashboard",
//   });
// }
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import debounce from "lodash/debounce";
import { ref, watch } from "vue";

const page = usePage();
const user = computed(() => page.props.auth.user.username);
const email = computed(() => page.props.auth.user.email);

let submit = () => {
  form.post("/profile/saveChanges/" + page.props.userID);
};
let re_error = ref("");

let old_error = ref("");

let re_enterpass = ref("");

let form = useForm({
  old_password: "",
  new_password: "",
});

watch(
  re_enterpass,
  debounce(function (value) {
    if (value != form.new_password) {
      re_error.value = "Password does not match";
    } else {
      re_error.value = "";
    }
  }, 300)
);
</script>

