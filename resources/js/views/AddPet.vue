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
      data.append("image", this.image);

      axios
        .post("pets/add", data)
        .then(response => {
          console.log(response);
          this.name = "";
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
