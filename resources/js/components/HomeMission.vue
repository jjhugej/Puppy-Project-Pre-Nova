<template>
  <section class="mission-section">
    <h1
      class="home-mission-header has-text-centered"
    >Our mission is to help the animals of Swain County</h1>
    <div class="container">
      <div class="columns">
        <div class="column mission-box">
          <div class="mission-box-header">Adopt</div>
          <div
            class="mission-box-body"
          >Placing healthy animals with responsible and caring individuals is one of our most important goals</div>
          <router-link to="/adopt">
            <div class="mission-box-link">Learn More</div>
          </router-link>
        </div>
        <div class="column mission-box">
          <div class="mission-box-header">Donate</div>
          <div
            class="mission-box-body"
          >Through your generosity, we are able to place animals in loving homes. Even the smallest donation helps!</div>
          <router-link to="/donate">
            <div class="mission-box-link">Learn More</div>
          </router-link>
        </div>
        <div class="column mission-box">
          <div class="mission-box-header">Volunteer</div>
          <div
            class="mission-box-body"
          >Our volunteers are dedicated and hard-working people who have a passion for animals and making a difference</div>
          <router-link to="/volunteer">
            <div class="mission-box-link">Learn More</div>
          </router-link>
        </div>
        <div class="column mission-box">
          <div class="mission-box-header">Foster</div>
          <div
            class="mission-box-body"
          >Foster care is temporary care and shelter for one of our animals. This is one of the most needed volunteers!</div>
          <router-link to="/foster">
            <div class="mission-box-link">Learn More</div>
          </router-link>
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
.columns {
  margin: 0;
}
.column {
  padding: 0;
}
.home-mission-header {
  font-style: italic;
  margin: 10vh 0;
  font-size: 40px;
}
.mission-box {
  margin: 20px;
  border: solid 1px #7e7e7e;
  border-radius: 12px;
}
.mission-box-header {
  font-size: 30px;
  font-weight: 700;
  text-align: center;
  background-color: #9497ff;
  color: white;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  padding: 10px 5px;
}
.mission-box-body {
  height: 150px;
  padding: 15px;
  font-weight: 500;
}
.mission-box-link {
  text-align: center;
  color: white;
  background-color: #00e4ff;
  border-radius: 12px;
  padding: 5px 2px;
  margin: 20px;
}
</style>
