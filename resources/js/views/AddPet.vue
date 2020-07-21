<template>
  <section class="section">
    <div class="container">
      <form @submit.prevent="formSubmit" method="POST" enctype="multipart/form-data">
        <h1 class="has-text-centered">Add A Pet</h1>
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input v-model="name" class="input" type="text" placeholder="e.g Max" />
          </div>
        </div>
        <div class="field">
          <label class="label">Age</label>
          <div class="control">
            <input v-model="age" class="input" type="integer" placeholder="e.g 1" />
          </div>
        </div>
        <div class="field">
          <label class="label">Breed</label>
          <div class="control">
            <input v-model="animalBreed" class="input" type="integer" placeholder="e.g mixed" />
          </div>
        </div>
        <div class="select">
          <p>Animal Type</p>
          <select v-model="animalType">
            <option value="all">All Animals</option>
            <option value="dog">Dogs</option>
            <option value="cat">Cats</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="select">
          <p>Sex:</p>
          <select v-model="animalSex">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div class="field">
          <label class="label">Image</label>
          <div class="control">
            <input v-on:change="onImageChange" class="input" type="file" />
          </div>
        </div>
        <div class="field">
          <figure class="image is-128x128">
            <img :src="imagePreview" />
          </figure>
        </div>
        <div class="field">
          <p class="control">
            <input type="submit" value="Submit" />
          </p>
        </div>
      </form>
    </div>
  </section>
</template>

<script>
export default {
  data: function() {
    return {
      name: "",
      age: "",
      animalType: "",
      animalBreed: "",
      animalSex: "",
      image: "",
      imagePreview: ""
    };
  },
  methods: {
    onImageChange(e) {
      this.image = e.target.files[0];

      let fileReader = new FileReader();
      fileReader.readAsDataURL(this.image);
      fileReader.onload = e => {
        this.imagePreview = e.target.result;
      };
    },

    formSubmit() {
      let data = new FormData();
      data.append("name", this.name);
      data.append("age", this.age);
      data.append("animalType", this.animalType);
      data.append("animalBreed", this.animalBreed);
      data.append("animalSex", this.animalSex);
      data.append("image", this.image);

      axios
        .post("pets/add", data)
        .then(response => {
          console.log(response);
          this.name = "";
          this.age = "";
          this.animalType = "";
          this.image = "";
          this.imagePreview = "";
        })
        .catch(response => {
          console.log(response);
        });
    }
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
h1 {
  font-size: 36px;
}
</style>
