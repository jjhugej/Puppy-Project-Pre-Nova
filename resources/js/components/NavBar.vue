<template>
  <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <router-link to="/" class="navbar-item" exact>Paws</router-link>

      <a
        role="button"
        class="navbar-burger burger"
        v-bind:class="{ 'is-active': isActive}"
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

    <div
      id="navbarBarMenu"
      v-bind:class="{'is-active has-text-centered': isActive}"
      class="navbar-menu"
    >
      <div class="navbar-end">
        <router-link to="/pets" class="navbar-item" exact>Pet Search</router-link>
        <router-link to="/pets/add" class="navbar-item" exact>Add Pet</router-link>
        <router-link to="/news/add" class="navbar-item" exact>Add News</router-link>
        <router-link to="/news" class="navbar-item" exact>News</router-link>
        <div class="navbar-item has-dropdown is-active">
          <i class="fas fa-user-circle navbar-item"></i>
          <div class="navbar-dropdown">
            <a class="navbar-item">Overview</a>
          </div>
        </div>

        <router-link to="/dashboard" v-if="isLoggedIn" class="navbar-item" exact>Your Favorites</router-link>
        <div class="navbar-item">
          <!-- <nav-bar-account-access></nav-bar-account-access> -->
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
      return store.getters.getLoggedInUser.isLoggedIn;
    }
  },
  methods: {
    hamburgerClicked: function() {
      this.isActive = !this.isActive;
    }
  },
  mounted() {}
};
</script>

<style scoped>
.user-icon-wrapper {
  height: 100%;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}
i {
  font-size: 30px;
}
</style>
