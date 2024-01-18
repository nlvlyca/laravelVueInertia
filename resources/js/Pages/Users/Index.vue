<template>
  <div class="min-h-screen">
    <Head title="Users" />
    <div class="flex justify-between mb-3">
      <h1 class="text-3xl font-semibold">Users</h1>
      <div class="flex gap-2">
        <input
          type="text"
          placeholder="Search..."
          v-model="search"
          class="border px-3 py-2 rounded"
        />
        <Link
          v-if="can.createUser"
          href="/users/create"
          class="px-2 bg-green-600 text-white hover:bg-green-500 border py-2.5 rounded"
          >Add New User</Link
        >
      </div>
    </div>
    <div class="mt-5">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table
          class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
        >
          <tbody>
            <tr
              v-for="user in users.data"
              :key="user"
              class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
            >
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                {{ user.name }}
              </th>
              <td class="px-6 py-4 text-right">
                <Link
                  v-if="user.can.edit"
                  :href="'/users/edit/' + user.id"
                  class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                  >Edit</Link
                >
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- PAGINATION -->
    <Pagination :links="users.links" class="mt-6" />
  </div>
</template>
<script setup>
import Pagination from "../Shared/Pagination.vue";
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import debounce from "lodash/debounce";
import toast from "../Shared/toast";
let props = defineProps({
  users: Object,
  filters: Object,
  can: Object,
});

let search = ref(props.filters.search);

watch(
  search,
  debounce(function (value) {
    router.get(
      "/users",
      { search: value },
      { preserveState: true, replace: true }
    );
  }, 300)
);
</script>