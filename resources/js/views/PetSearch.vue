<template>
  <section class="section">
    <div class="container">
      <div class="columns is-multiline">
        <pet-card
          v-for="pet in pets"
          v-bind:key="pet.id"
          v-bind:name="pet.name"
          v-bind:image="pet.image_name"
        ></pet-card>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data: function() {
    return {
      pets: []
    };
  },
  beforeCreate() {
    this.$root.loading = true;
  },
  mounted() {
    axios
      .get("/pets")
      .then(response => {
        response.data.forEach(pet => {
          this.pets.push(pet);
        });
      })
      .catch(function(error) {
        console.log(error);
      });
    this.$root.loading = false;
  }
};
</script>
<style scoped>
section {
  margin: 10px;
}
.container {
}
</style>
