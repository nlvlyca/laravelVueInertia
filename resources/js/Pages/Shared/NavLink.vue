<template>
  <Link
    class="text-black rounded hover:underline"
    :class="{
      'font-bold bg-gray-400 text-white rounded p-2.5 hover:no-underline':
        isActive,
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