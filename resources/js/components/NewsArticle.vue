<template>
  <div>
    <h2>Title:{{ title }}</h2>
    <p>Body:{{body}}</p>
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
