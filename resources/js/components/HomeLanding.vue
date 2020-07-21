<template>
  <section>
    <div class="landing">
      <div class="hero-wrapper">
        <h1>Find your new best friend!</h1>
        <transition v-enter>
          <router-link to="/pets" class="hero-btn" exact>
            <div class="hero-cta">Get Started</div>
          </router-link>
        </transition>
      </div>
    </div>
  </section>
</template>

<script>
import store from "../store";
export default {
  methods: {},
  computed: {},
  beforeCreate() {},

  mounted() {}
};
</script>

<style scoped>
.landing {
  height: 100vh;
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
  margin-left: 5vw;
  height: 100%;
  padding: 30px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-evenly;
}
h1 {
  font-size: 40px;
  font-family: sans-serif;
  font-weight: 900;
  color: white;
  line-height: 50px;
}
.hero-btn {
  background-color: #3eebff;
  border-radius: 10px;
  padding: 20px;
}
.hero-cta {
  color: white;
  font-size: 30px;
  font-weight: 800;
  line-height: 30px;
}
</style>
