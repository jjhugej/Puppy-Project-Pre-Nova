<template>
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <router-link to="/" class="navbar-item" exact>Paws</router-link>

      <a
        role="button"
        class="navbar-burger burger"
        v-bind:class="{ 'is-active': isActive}"
        v-on:click="hamburgerClicked"
        aria-label="menu"
        aria-expanded="false"
        data-target="navbarBasicExample"
      >
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" v-bind:class="{'is-active': isActive}" class="navbar-menu">
      <div class="navbar-start">
        <router-link to="/pets" class="navbar-item" exact>Pet Search</router-link>
        <router-link to="/pets/add" class="navbar-item" exact>Add Pet</router-link>
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <router-link to="/register" class="button is-primary" exact>Sign Up</router-link>
            <router-link to="/login" class="button is-light" exact>Login</router-link>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data: function() {
    return {
      isActive: false
    };
  },
  methods: {
    hamburgerClicked: function() {
      this.isActive = !this.isActive;
    }
  },
  mounted() {}
};
</script>

<style scoped></style>
