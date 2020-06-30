<template>
  <section class="section">
    <div class="container">
      <h1>{{count}}</h1>
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
import store from "../store";
export default {
  data: function() {
    return {
      pets: []
    };
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
    store.commit("isDoneLoading");
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
