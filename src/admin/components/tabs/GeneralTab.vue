<template>
  <main id="kca-general-tab" class="tab-container">
    <h2 class="kca-tab-title">General Settings</h2>
    <form id="cf-general-setting-form" @submit="saveSettings">
      <table class="form-table" role="presentation">
        <tbody>
          <tr>
            <th scope="row">
              <label for="firstname">Firstname</label>
            </th>
            <td>
              <input id="firstname" placeholder="Enter first name" class="regular-text" type="text" v-model="formData.firstname">
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="lastname">Lastname</label>
            </th>
            <td>
              <input id="lastname" placeholder="Enter last name" class="regular-text" type="text" v-model="formData.lastname">
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="email">Email</label>
            </th>
            <td>
              <input id="email" placeholder="Enter email" class="regular-text" type="email" v-model="formData.email">
            </td>
          </tr>
        </tbody>
      </table>
      <p class="submit">
        <button type="submit" class="button button-primary">{{ loadingText }}</button>
      </p>
    </form>
  </main>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  name: "GeneralTab",

  data(){
    return{}
  },

  mounted(){
    this.fetchSettings()
  },

  computed: {
    ...mapGetters(['GET_GENERAL_SETTINGS','GET_LOADING_TEXT']),
    formData: {
      get(){
        return this.GET_GENERAL_SETTINGS
      },
    },
    loadingText:{
      get() {
        return this.GET_LOADING_TEXT
      }
    }
  },

  methods: {
    ...mapActions([ 'FETCH_SETTINGS', 'SAVE_SETTINGS' ]),

    saveSettings(e){
      e.preventDefault();
      this.SAVE_SETTINGS( this.formData )
    },

    fetchSettings(){
      this.FETCH_SETTINGS()
    }
  }
}
</script>

<style scoped>

</style>