<template>
  <div class="buttons columns is-mobile is-centered">
    <router-link to="/register" class="button is-primary" exact>Sign Up</router-link>
    <router-link to="/login" class="button is-light" exact>Login</router-link>
  </div>
</template>

<script>
export default {
  data: function() {
    return {};
  },
  methods: {},
  mounted() {}
};
</script>

<style scoped>
@media only screen and (max-width: 1023px) {
  .buttons {
    margin-top: 20px;
  }
}
</style>
