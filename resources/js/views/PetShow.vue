<template>
  <section>
    <div class="container">
      <div class="puppy-info-wrapper">
        <figure class="image is-256x256">
          <img class="is-rounded" :src="image" />
        </figure>
        <div class="info-text-wrapper">
          <h1 class="has-text-centered">{{name}}</h1>
          <p>Age:{{age}}</p>
          <p>{{name}} is {{animalType}}</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import store from "../store";
export default {
  props: ["petId"],
  data: function() {
    return {
      name: "",
      age: null,
      animalType: "",
      image: ""
    };
  },
  methods: {},
  computed: {},
  mounted() {
    axios
      .get("/pets/show/" + this.petId)
      .then(response => {
        this.name = response.data.name;
        this.age = response.data.age;
        this.animalType = response.data.animal_type;
        this.image = response.data.image_name;
      })
      .catch(errors => {
        console.log(errors);
      });
  }
};
</script>
<style scoped>
section {
  margin-top: 20vh;
}
h1 {
  font-size: 30px;
  font-weight: 500;
}
p {
  font-size: 22px;
  font-weight: 400;
}
img {
  max-width: auto;
}
.image img {
  height: 256px;
  width: 256px;
}
.puppy-info-wrapper {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: space-evenly;
  align-items: center;
  padding: 25px;
}
.info-text-wrapper {
  display: flex;
  flex-direction: column;
  justify-content: space-evenly;
}
</style>
