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
    <Toast />
    <section
      class="p-5 flex sticky top-0 bg-white z-10 border-b border-gray-200"
    >
      <header class="flex justify-between w-full">
        <div class="flex items-center gap-44 justify-between">
          <h1 class="text-2xl font-bold">My App</h1>
          <p class="text-sm">
            Welcome back, <span class="font-semibold">{{ user }}</span
            >!
          </p>
        </div>
        <ProfileDropdown />
        <!-- <Nav /> -->
      </header>
    </section>
    <section>
      <aside
        id="logo-sidebar"
        class="fixed top-0 left-0 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar"
      >
        <Sidebar />
      </aside>
    </section>
    <section class="p-5 relative ml-64 mt-5">
      <div class="max-w-4xl mx-auto">
        <slot />
      </div>
    </section>
    <footer class="my-10 ml-64">
      <div class="max-w-4xl mx-auto">
        <div class="flex justify-between text-xs font-semibold">
          <h1>Developed by LJU | NetlinkVoice</h1>
          <h1>All rights reserved @ 2024</h1>
        </div>
      </div>
    </footer>
  </div>
</template>
<script>
import Toast from "./Toast.vue";
// import Nav from "./Nav.vue";
import Sidebar from "./Sidebar.vue";
import ProfileDropdown from "./ProfileDropdown.vue";
import { Head, usePage } from "@inertiajs/vue3";

export default {
  components: { Head, Toast, Sidebar, ProfileDropdown },
};
</script>
<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const user = computed(() => page.props.auth.user.username);
</script>