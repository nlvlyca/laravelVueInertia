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
    <section class="p-5 flex bg-gray-200 sticky top-0 z-10">
      <header class="flex justify-between w-full">
        <div class="flex items-center">
          <h1 class="text-2xl font-bold">My App</h1>
          <p class="text-sm ml-4">
            Welcome back, <span class="font-semibold">{{ user }}</span
            >!
          </p>
        </div>
        <Nav />
      </header>
    </section>
    <section class="p-5 relative">
      <div class="max-w-3xl mx-auto overflow-hidden">
        <slot />
      </div>
    </section>
    <footer class="my-10">
      <div class="max-w-3xl mx-auto">
        <div class="flex justify-between text-xs font-semibold">
          <h1>Developed by LJU | NetlinkVoice</h1>
          <h1>All rights reserved @ 2024</h1>
        </div>
      </div>
    </footer>
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