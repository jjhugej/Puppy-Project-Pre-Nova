<template>
  <div class="column is-one-fifth">
    <div class="card bm--card-equal-height">
      <div class="card-image">
        <figure class="image is-4by3">
          <img :src="image" />
        </figure>
      </div>
      <!--  <div class="card-content">
        <div class="content">
          <p class="has-text-centered">{{ name }}</p>
        </div>
      </div>-->
      <footer class="card-footer">
        <a class="card-footer-item">Like</a>
        <a class="card-footer-item">More</a>
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
.bm--card-equal-height {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  height: 100%;
}
.bm--card-equal-height .card-footer {
  margin-top: auto;
}
p {
  font-size: 24px;
  font-weight: 600;
}
.card-content {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 1rem;
}
</style>
