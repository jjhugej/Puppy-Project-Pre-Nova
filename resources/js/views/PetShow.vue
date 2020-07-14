<template>
  <div class="container">
    <h1>Pet Show View!</h1>
    <p>Name:{{name}}</p>
    <figure class="image is-4by3">
      <img :src="image" />
    </figure>
  </div>
</template>

<script>
//TODO: get petid passed in from router link in pet card
import store from "../store";
export default {
  props: ["petId"],
  data: function() {
    return {
      name: "",
      image: ""
    };
  },
  methods: {},
  computed: {},
  mounted() {
    axios
      .get("/pets/show/" + this.petId)
      .then(response => {
        console.log(response);
        this.name = response.data.name;
        this.image = response.data.image_name;
      })
      .catch(errors => {
        console.log(errors);
      });
  }
};
</script>
