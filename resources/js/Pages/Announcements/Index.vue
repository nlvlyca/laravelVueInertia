<template>
  <div class="min-h-screen">
    <Head title="Users" />
    <div class="flex justify-between mb-3">
      <h1 class="text-3xl font-semibold">Announcements</h1>
      <div class="flex gap-2">
        <input
          type="text"
          v-model="search"
          placeholder="Search..."
          class="border px-3 py-2 rounded"
        />
        <Link
          href="/announcements/create"
          class="px-2 bg-green-600 text-white hover:bg-green-500 border py-2.5 rounded"
          >Add New</Link
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
              v-if="ann.data.length <= 0"
              class="bg-white border-b dark:bg-gray-800"
            >
              <td
                scope="row"
                class="px-6 py-4 text-xs font-weight-normal italic text-gray-500 whitespace-nowrap dark:text-white text-center"
              >
                No data found
              </td>
            </tr>
            <tr
              v-for="an in ann.data"
              :key="an"
              class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
            >
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                {{ an.title }}
              </th>
              <td class="px-6 py-4 text-right">
                <Link
                  :href="'/announcements/edit/' + an.id"
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
    <Pagination :links="ann.links" class="mt-6" />
  </div>
</template>
<script setup>
import Pagination from "../Shared/Pagination.vue";
import { router } from "@inertiajs/vue3";
import debounce from "lodash/debounce";
import { ref, watch } from "vue";
let props = defineProps({
  ann: Object,
  filters: Object,
});
let search = ref(props.filters.search);
watch(
  search,
  debounce(function (value) {
    router.get(
      "/announcements",
      { search: value },
      { preserveState: true, replace: true }
    );
  }, 300)
);
</script>