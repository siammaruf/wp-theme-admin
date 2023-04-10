<template>
  <aside class="tab-sidebar">
    <ul class="tab-menu">
      <li><router-link to="/">General</router-link></li>
      <li><router-link to="/header">Header</router-link></li>
      <li><router-link to="/footer">Footer</router-link></li>
    </ul>
  </aside>
</template>

<script>
export default {
  name: "Navigation"
}
</script>

<style scoped>

</style>