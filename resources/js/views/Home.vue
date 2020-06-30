<template>
  <div class="container">
    <h1>Home View!</h1>
  </div>
</template>

<script>
export default {
  mounted() {
    //this.$root.loading = false;
    this.$root.$data.loading = false;

    /*
      TODO: implement state management in order to cause 
      the application to cease loading on a specified event.
    */
  }
};
</script>
