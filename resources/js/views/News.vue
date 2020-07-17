<template>
  <section class="section">
    <div class="container">News</div>
    <news-article
      v-for="article in news"
      :key="article.id"
      :id="article.id"
      :title="article.title"
      :body="article.body"
      :created_at="article.created_at"
    ></news-article>
  </section>
</template>

<script>
import store from "../store";
export default {
  data: function() {
    return {
      news: []
    };
  },
  computed: {},
  methods: {},
  beforeCreate() {},
  mounted() {
    axios
      .get("/news")
      .then(response => {
        console.log(response.data);
        /* this.news.push(response.data); */
        response.data.forEach(article => {
          this.news.push(article);
        });
      })
      .catch(function(error) {
        console.log(error);
      });
  }
};
</script>
<style scoped>
section {
  margin: 10px;
}
</style>
