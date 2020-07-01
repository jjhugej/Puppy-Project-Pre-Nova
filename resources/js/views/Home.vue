<template>
  <section class="landing">
    <div class="container">
      <div class="hero-wrapper">
        <h1>Your new forever friend is waiting!</h1>

        <a class="hero-btn" href="#">
          <div class="hero-cta">Get Started</div>
        </a>
      </div>
    </div>
  </section>
</template>

<script>
import store from "../store";
export default {
  methods: {},
  computed: {},
  beforeCreate() {
    store.commit("isLoading");
  },

  mounted() {
    store.commit("isDoneLoading");
  }
};
</script>

<style scoped>
section {
}
.container {
  height: 80vh;

  background-image: linear-gradient(
      to right,
      rgba(0, 0, 0, 0.4),
      rgba(0, 0, 0, -1)
    ),
    url("/images/puppy_landing.jpg");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
}
.hero-wrapper {
  width: 40%;
  height: 100%;
  padding: 30px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-evenly;
}
h1 {
  z-index: 99;
  font-size: 40px;
  font-weight: 200;
  color: white;
}
.hero-btn {
  border: solid 1px white;
  border-radius: 10px;
  padding: 20px;
}
.hero-cta {
  color: white;
  font-size: 30px;
  font-weight: 600;
}
</style>
