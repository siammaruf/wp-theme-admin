<template>
  <div id="vue-admin-app">
    <h1>Kensington Creperie Admin</h1>
    <div class="kca-main-container">
      <router-view name="tab"></router-view>
      <!-- component matched by the route will render here -->
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import TabNavigation from './components/tabs/Navigation.vue'
export default {
  name: "App",
  components:{
    'tab-navigation': TabNavigation
  }
}
</script>

<style scoped>

</style>