<template>
  <section>
    <div class="landing">
      <div class="hero-wrapper">
        <h1>PAWS Animal Shelter</h1>
        <div class="cta-wrapper">
          <h2>Find your new best friend!</h2>
          <transition v-enter>
            <router-link to="/pets" class="hero-btn" exact>
              <div class="hero-cta">Get Started</div>
            </router-link>
          </transition>
        </div>
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
h1 {
  font-size: 40px;
  font-family: sans-serif;
  font-weight: 900;
  color: white;
  line-height: 50px;
}
h2 {
  color: white;
  font-size: 24px;
  font-family: sans-serif;
  font-weight: 800;
}
.landing {
  height: 100vh;
  background-image: linear-gradient(
      to right,
      rgba(0, 0, 0, 0.9),
      rgba(0, 0, 0, -1)
    ),
    url("/images/puppy_landing.jpg");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
}
.hero-wrapper {
  width: 40%;
  margin-left: 3vw;
  height: 100%;
  padding: 30px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-evenly;
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
.cta-wrapper {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: center;
}
</style>
