<template>
  <div>
    <nav>
      <ul class="flex space-x-6 text-blue-500">
        <li>
          <!-- <Link
            href="/"
            :class="{ 'font-bold underline': $page.component === 'Home' }"
            >Home</Link
          > -->
          <NavLink href="/" :isActive="$page.component === 'Home'"
            >Home</NavLink
          >
        </li>
        <li>
          <NavLink href="/users" :isActive="$page.component === 'Users/Index'"
            >Users</NavLink
          >
          <!-- <Link
            href="/users"
            :class="{ 'font-bold underline': $page.component === 'Users' }"
            >Users</Link
          > -->
        </li>
        <li>
          <!-- <Link
            href="/settings"
            :class="{ 'font-bold underline': $page.component === 'Settings' }"
            >Settings</Link
          > -->
          <NavLink href="/settings" :isActive="$page.component === 'Settings'"
            >Settings</NavLink
          >
        </li>
        <li>
          <!-- <Link
            href="/settings"
            :class="{ 'font-bold underline': $page.component === 'Settings' }"
            >Settings</Link
          > -->
          <NavLink href="/logout" method="post" as="button">Log Out</NavLink>
        </li>
      </ul>
    </nav>
  </div>
</template>
<script>
import NavLink from "./NavLink.vue";
export default {
  components: { NavLink },
};
</script>