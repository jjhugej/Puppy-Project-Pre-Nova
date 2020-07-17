<template>
  <section class="section">
    <div class="container">
      <form @submit.prevent="formSubmit">
        <h1 class="has-text-centered">Add A New News Post</h1>
        <div class="field">
          <label class="label">Title</label>
          <div class="control">
            <input
              v-model="title"
              class="input"
              type="text"
              placeholder="The place caught on fire!"
            />
          </div>
        </div>
        <div class="field">
          <label class="label">Body</label>
          <div class="control">
            <textarea v-model="body" cols="30" rows="10"></textarea>
          </div>
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
      title: "",
      body: ""
    };
  },
  methods: {
    formSubmit() {
      axios
        .post("/news/add", {
          title: this.title,
          body: this.body
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

h1 {
  font-size: 36px;
}
</style>
