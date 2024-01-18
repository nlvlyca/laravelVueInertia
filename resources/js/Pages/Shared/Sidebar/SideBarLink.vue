<template>
  <Link
    class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
    :class="{
      'bg-gray-100': isActive,
    }"
  >
    <slot />
  </Link>
</template>
<script>
import { Link } from "@inertiajs/vue3";
export default {
  components: { Link },
  props: {
    isActive: Boolean,
  },
};
</script>