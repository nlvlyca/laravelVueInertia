<template>
  <div>
    <Head>
      <title>My App</title>
      <meta
        type="description"
        content="Information about the web app"
        head-key="description"
      />
    </Head>
    <section class="p-5 bg-gray-200">
      <header class="flex justify-between">
        <div class="flex items-center">
          <h1 class="text-2xl font-bold">My App</h1>
          <p class="text-sm ml-4">Welcome back, {{ user }}!</p>
        </div>
        <Nav />
      </header>
    </section>
    <section class="p-5">
      <div class="max-w-3xl mx-auto">
        <slot />
      </div>
    </section>
  </div>
</template>
<script>
import Nav from "./Nav.vue";
import { Head } from "@inertiajs/vue3";
export default {
  components: { Nav, Head },
};
</script>
<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();

const user = computed(() => page.props.auth.user.username);
</script>