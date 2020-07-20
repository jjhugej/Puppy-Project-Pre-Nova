<template>
  <div>
    <article class="message">
      <h1>{{ title }}</h1>
      <div class="message-body">{{body}}</div>
    </article>
  </div>
</template>

<script>
import store from "../store";
export default {
  props: ["id", "title", "body", "created_at"],
  data: function() {
    return {};
  },
  computed: {},
  methods: {}
};
</script>
<style scoped>
</style>
