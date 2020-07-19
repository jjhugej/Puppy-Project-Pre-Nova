<template>
  <div>
    <home-landing></home-landing>
    <home-mission></home-mission>
    <div class="svg-img-wrapper">
      <img class="purple-rectangle" src="images/purpleRectangleSVG.SVG" alt />
    </div>
    <home-thrift-store></home-thrift-store>

    <div id="kittenPic"></div>
    <home-search-pets></home-search-pets>
    <home-help-us></home-help-us>
  </div>
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
.svg-img-wrapper {
  overflow: hidden;
}
img {
  transform: scale(2, 1);
}
#kittenPicWrapper {
  height: 20vh;
  width: 100vw;
  overflow: hidden;
}
#kittenPic {
  margin-top: -1vh;
  width: 100%;
  height: 400px;
  background-image: url("/images/cat-and-dog.jpg");
  background-size: cover;
  background-repeat: no-repeat;
  background-position: 50% 50%;
}
</style>
