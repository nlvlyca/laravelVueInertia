<template>
  <Link
    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
  >
    <slot />
  </Link>
</template>
<script>
import { Link } from "@inertiajs/vue3";
export default {
  components: { Link },
};
</script>