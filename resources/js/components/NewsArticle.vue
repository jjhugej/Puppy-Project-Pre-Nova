<template>
  <div class="container">
    <h2>{{title}}</h2>
    <p v-if="isTruncated">{{truncatedBody}}</p>
    <p v-if="!isTruncated">{{body}}</p>
    <a @click="seeMore" v-if="showExpandBtns && isTruncated" class="see-more-btn">More</a>
    <a @click="seeMore" v-if="showExpandBtns && !isTruncated" class="see-more-btn">Less</a>
    <hr />
  </div>
</template>

<script>
import store from "../store";
export default {
  props: ["id", "title", "body", "created_at"],
  data: function() {
    return {
      isTruncated: true,
      showExpandBtns: false
    };
  },
  computed: {
    truncatedBody: function() {
      let truncatedBodyLength = 250;
      if (this.body.length <= truncatedBodyLength) {
        return this.body;
      }
      this.showExpandBtns = true;
      return this.body.slice(0, truncatedBodyLength) + "...";
    }
  },
  methods: {
    seeMore: function() {
      this.isTruncated = !this.isTruncated;
    }
  }
};
</script>
<style scoped>
h2 {
  font-size: 28px;
  font-weight: 600;
}
p {
  margin-left: 20px;
  font-size: 20px;
}
.container {
  width: 100%;
  margin: 5vh 0;
}
.see-more-btn {
  margin-left: 20px;
  font-size: 20px;
}
</style>
