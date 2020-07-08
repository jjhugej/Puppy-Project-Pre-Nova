<template>
  <div class="container">
    <article class="message is-success">
      <div class="message-header">
        <p>Success!</p>
        <button @click="removeLoginMessage" class="delete" aria-label="delete"></button>
      </div>
      <div class="message-body">You have logged in!</div>
    </article>
  </div>
</template>

<script>
import store from "../store";

export default {
  mounted() {},
  methods: {
    removeLoginMessage: () => {
      store.commit("removeLoginMessage");
    }
  }
};
</script>
<style scoped>
.container {
  position: fixed;
  right: 5vw;
  bottom: 10vh;
}
</style>
