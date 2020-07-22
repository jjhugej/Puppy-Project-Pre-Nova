<template>
  <div>
    <section class="section">
      <div class="container">
        <h1 id="news-header" class="has-text-centered">PAWS News</h1>
        <news-article
          v-for="article in news"
          :key="article.id"
          :id="article.id"
          :title="article.title"
          :body="article.body"
          :created_at="article.formatted_created_at"
        ></news-article>
      </div>
    </section>
    <test-footer></test-footer>
  </div>
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
#news-header {
  margin: 5vh 0;
  font-size: 30px;
  font-weight: 600;
}
</style>
