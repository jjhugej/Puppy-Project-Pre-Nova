<template>
  <div class="buttons columns is-mobile is-centered">
    <router-link v-if="!isLoggedIn" to="/register" class="button is-primary" exact>Sign Up</router-link>
    <router-link v-if="!isLoggedIn" to="/login" class="button is-light" exact>Login</router-link>
    <a v-if="isLoggedIn" href="/logout" class="button is-warning">Logout</a>
  </div>
</template>

<script>
import store from "../store";
export default {
  data: function() {
    return {};
  },
  computed: {
    isLoggedIn: function() {
      return store.getters.getLoggedInUser.isLoggedIn;
    }
  },
  methods: {},
  mounted() {
    if (store.getters.getLoggedInUser.isLoggedIn === false) {
      /* 
        future todo: this is very similar to what is called in the dashboard.
        refactor to keep it DRY...

        something like: checkUserLoginStatus()
         */
      //check if user status is set to isLoggedIn and if not get user info or redirect
      axios
        .get("/api/user")
        .then(response => {
          store.commit("setLoggedInUser", response.data);
        })
        .catch(errors => {
          console.log(errors);
        });
    }
  }
};
</script>

<style scoped>
@media only screen and (max-width: 1023px) {
  .buttons {
    margin-top: 20px;
  }
}
</style>
