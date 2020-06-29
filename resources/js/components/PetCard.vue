<template>
  <div class="column is-one-third">
    <div class="card">
      <div class="card-image">
        <figure class="image is-4by3">
          <img :src="image" />
        </figure>
      </div>
      <div class="card-content">
        <div class="media">
          <div class="media-left"></div>
          <div class="media-content">
            <p class="title is-4 has-text-centered">{{name}}</p>
          </div>
        </div>
      </div>
      <footer class="card-footer">
        <a href="#" class="card-footer-item">Like</a>
        <a href="#" class="card-footer-item">More</a>
      </footer>
    </div>
  </div>
</template>

<script>
export default {
  props: ["id", "name", "image", "image_name"],
  mounted() {}
};
</script>
<style scoped>
.title {
  line-height: 1.4 !important;
}
</style>
