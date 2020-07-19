<template>
  <div>
    <home-landing></home-landing>
    <home-mission></home-mission>
    <div class="svg-img-wrapper">
      <img class="purple-rectangle" src="images/purpleRectangleSVG.SVG" alt />
    </div>
    <home-thrift-store></home-thrift-store>
    <div class="svg-img-wrapper">
      <img class="purple-rectangle" src="images/purpleRectangleSVG.SVG" alt />
    </div>
    <div id="kittenPic"></div>
    <home-search-pets></home-search-pets>
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
}
#kittenPic {
  width: 150px;
  height: 100px;
  /* background-image: url("public/images/group-of-kittens.jpg"); */
  background-size: cover;
  background-repeat: no-repeat;
  background-position: 50% 50%;
}
</style>
