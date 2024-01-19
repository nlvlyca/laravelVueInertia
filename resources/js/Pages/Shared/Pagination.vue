<template>
  <div>
    <Component
      v-for="link in links"
      :href="link.url"
      :is="link.url ? 'Link' : 'span'"
      :key="link"
      class="mx-0.5 rounded-md border px-4 py-2"
      :class="{
        'text-gray-300': !link.url,
        'font-bold bg-white border-gray-400': link.active,
        'bg-gray-50': !link.active,
      }"
      v-html="`${link.label}`"
    />
  </div>
</template>
<script>
export default {
  props: {
    links: Array,
  },
};
</script>