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
        <div class="select">
          <select v-model="animalType">
            <option value="all">All Animals</option>
            <option value="dog">Dogs</option>
            <option value="cat">Cats</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="field">
          <label class="label">Age</label>
          <div class="control">
            <input v-model="age" class="input" type="integer" placeholder="e.g Max" />
          </div>
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

    formSubmit() {}
  },

  mounted() {}
};
</script>
<style scoped>
section {
  margin: 10px;
}

h1 {
  font-size: 36px;
}
</style>
