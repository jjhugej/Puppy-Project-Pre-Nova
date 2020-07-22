<template>
  <div class="column is-one-fifth">
    <div class="card bm--card-equal-height">
      <div class="card-image">
        <figure class="image is-4by3"></figure>
      </div>

      <footer class="card-footer">
        <a class="card-footer-item">
          <i class="fas fa-heart like-btn"></i>
        </a>

        <a class="card-footer-item">
          <i class="fas fa-list like-btn"></i>
        </a>
      </footer>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {}
};
</script>
<style scoped>
.is-4by3 {
  background-color: grey;
}
.like-btn {
  color: grey;
}
</style>