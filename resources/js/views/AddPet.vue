<template>
  <section class="section">
    <div class="container">
      <form v-on:submit.prevent action="#" method="POST" enctype="multipart/form-data">
        <h1 class="has-text-centered">Add A Pet</h1>
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input v-model="name" class="input" type="text" placeholder="e.g Max" />
          </div>
        </div>
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input class="input" type="file" placeholder="e.g Max" />
          </div>
        </div>
        <div class="field">
          <p class="control">
            <a v-on:click="formSubmit" class="button is-primary">Submit</a>
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
      name: ""
    };
  },
  methods: {
    formSubmit: function() {
      /* console.log(this.name); */
      axios
        .post("/pets/add", {
          name: this.name
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
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
