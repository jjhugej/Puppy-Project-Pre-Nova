<template>
  <div class="container">
    <article class="message" :class="[alertType]">
      <div class="message-header">
        <p>{{title}}</p>
        <button @click="removeAlertMessage" class="delete" aria-label="delete"></button>
      </div>
      <div class="message-body">{{message}}</div>
    </article>
  </div>
</template>

<script>
import store from "../store";

export default {
  mounted() {},
  methods: {
    removeAlertMessage: () => {
      store.commit("removeAlertMessage");
    }
  },
  computed: {
    title: () => {
      return store.state.alertTitle;
    },
    message: () => {
      return store.state.alertMessage;
    },
    alertType: () => {
      return store.state.alertType;
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
