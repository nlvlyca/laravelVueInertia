<template>
  <Link
    class="text-black hover:underline"
    :class="{ 'font-bold underline': isActive }"
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