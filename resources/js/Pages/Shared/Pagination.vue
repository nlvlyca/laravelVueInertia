<template>
  <div>
    <Component
      v-for="link in links"
      :href="link.url"
      :is="link.url ? 'Link' : 'span'"
      :key="link"
      class="px-1"
      :class="{ 'text-gray-500': !link.url, 'font-bold': link.active }"
      v-html="link.label"
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