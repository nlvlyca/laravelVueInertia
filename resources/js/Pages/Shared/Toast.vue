<script setup>
import ToastItem from "./ToastItem.vue";
import { ref, onUnmounted } from "vue";
import { router, usePage } from "@inertiajs/vue3";
import toast from "./toast";

const page = usePage();
let removeEventListener = router.on("finish", () => {
  if (page.props.toast) {
    toast.add({
      message: page.props.toast.message,
      type: page.props.toast.type,
    });
  }
});

onUnmounted(() => removeEventListener());

function remove(index) {
  toast.remove(index);
}
</script>
<template>
  <div class="fixed top-4 right-4 z-50 w-full max-w-xs space-y-4">
    <ToastItem
      v-for="(item, index) in toast.items"
      :key="item.key"
      :message="item.message"
      :type="item.type"
      :duration="5000"
      @remove="remove(index)"
    />
  </div>
</template>