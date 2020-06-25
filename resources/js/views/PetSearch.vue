<template>
  <section class="section">
    <div class="container">
      <div class="columns is-multiline">
        <pet-card v-for="pet in pets" v-bind:key="pet.id" v-bind:name="pet.name"></pet-card>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data: function() {
    return {
      pets: [
        { id: 1, name: "maggie" },
        { id: 2, name: "nathan" },
        { id: 3, name: "max" }
      ]
    };
  },
  mounted() {}
};
</script>
<style scoped>
section {
  margin: 10px;
}
.container {
}
</style>
