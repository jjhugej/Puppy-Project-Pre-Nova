<template>
  <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="container">
      <div class="navbar-brand">
        <router-link to="/" class="navbar-item" exact>Paws</router-link>

        <a
          role="button"
          class="navbar-burger burger"
          v-bind:class="{ 'is-active': isActive }"
          v-on:click="hamburgerClicked"
          aria-label="menu"
          aria-expanded="false"
          data-target="navbarBarMenu"
        >
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="navbarBarMenu" v-bind:class="{ 'is-active': isActive }" class="navbar-menu">
        <div class="navbar-end">
          <router-link to="/pets" class="navbar-item" exact>Pet Search</router-link>
          <router-link to="/dashboard" v-if="isLoggedIn" class="navbar-item" exact>Your Favorites</router-link>
          <router-link to="/pets/add" class="navbar-item" exact>Add Pet</router-link>
          <router-link to="/news/add" class="navbar-item" exact>Add News</router-link>
          <router-link to="/news" class="navbar-item" exact>News</router-link>
          <router-link v-if="!isLoggedIn" to="/login" class="navbar-item" exact>Sign In</router-link>
          <a v-if="isLoggedIn" @click="logOutUser" class="navbar-item">Log Out</a>

          <div class="navbar-item">
            <!-- <nav-bar-account-access></nav-bar-account-access> -->
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import store from "../store";
export default {
  data: function() {
    return {
      isActive: false
    };
  },
  computed: {
    isLoggedIn: function() {
      return store.getters.isUserLoggedIn;
    }
  },
  methods: {
    hamburgerClicked: function() {
      this.isActive = !this.isActive;
    },
    logOutUser: function() {
      store.commit("userLogout");
      axios
        .get("/logout")
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  mounted() {}
};
</script>

<style scoped></style>
