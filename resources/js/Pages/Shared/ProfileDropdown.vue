<template>
  <div
    class="flex items-center relative md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse"
  >
    <button
      @click="showDropdown = !showDropdown"
      type="button"
      class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
      id="user-menu-button"
      aria-expanded="false"
      data-bs-toggle="dropdown"
      data-bs-target="#userDropdown"
      aria-controls="userDropdown"
    >
      <span class="sr-only">Open user menu</span>
      <img
        class="w-8 h-8 rounded-full"
        src="../../../photos/user_icon.png"
        alt="user photo"
      />
    </button>
    <!-- Dropdown menu -->
    <div
      v-show="showDropdown"
      class="z-50 collapse multi-collapse origin-top-right absolute top-8 right-0 w-48 border my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
      id="userDropdown"
    >
      <div class="px-4 py-3">
        <span class="block text-sm font-bold text-gray-900 dark:text-white">{{
          user
        }}</span>
        <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{
          email
        }}</span>
      </div>
      <ul class="py-2" aria-labelledby="user-menu-button">
        <li>
          <Logout href="/profile" method="get" as="button">Profile</Logout>
        </li>
        <li>
          <!-- <Link
            href="/logout"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
            method="post"
            as="button"
            type="button"
            >Logout</Link
          > -->
          <Logout href="/logout" method="post" as="button">Logout</Logout>
          <!-- <NavLink href="/logout" method="post" as="button">Log Out</NavLink> -->
        </li>
      </ul>
    </div>
    <button
      data-collapse-toggle="navbar-user"
      type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
      aria-controls="navbar-user"
      aria-expanded="false"
    >
      <span class="sr-only">Open main menu</span>
      <svg
        class="w-5 h-5"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 17 14"
      >
        <path
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M1 1h15M1 7h15M1 13h15"
        />
      </svg>
    </button>
  </div>
</template>
<script>
import NavLink from "./NavLink.vue";
export default {
  components: {
    NavLink,
  },
  data() {
    return {
      showDropdown: false,
    };
  },
};
</script>
<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import Logout from "./Logout.vue";
const page = usePage();
const user = computed(() => page.props.auth.user.username);
const email = computed(() => page.props.auth.user.email);
</script>
