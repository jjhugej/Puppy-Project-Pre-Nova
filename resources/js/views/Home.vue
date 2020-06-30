<template>
  <div class="container">
    <h1>Home View!</h1>
    <h2>{{count}}</h2>
    <button v-on:click="incrementCount">Increment</button>
  </div>
</template>

<script>
import store from "../store";
export default {
  methods: {
    incrementCount() {
      store.commit("incrementCount");
    }
  },
  computed: {
    count() {
      return store.state.count;
    }
  },
  beforeCreate() {
    store.commit("isLoading");
  },

  mounted() {
    store.commit("isDoneLoading");
  }
};
</script>
