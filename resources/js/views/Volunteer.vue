<template>
  <div>
    <section>
      <div class="container"></div>
      <h1 class="has-text-centered">Volunteer at PAWS!</h1>
      <h2 class="has-text-centered">Giving Your Time</h2>
      <div class="volunteer-info-wrapper">
        <p
          class
        >Donate your time by volunteering at our shelter, thrift store, festivals or fundraisers. There are all kinds of things you can do to help!</p>
        <ul>
          <h3>Some of the ways you can help:</h3>
          <li>At the Animal Shelter working and socializing with the animals.</li>
          <li>Sort items at the PAWS Thrift Store.</li>
          <li>Help at adoption events.</li>
          <li>Help at fundraising events.</li>
        </ul>
      </div>
    </section>
    <test-footer></test-footer>
  </div>
</template>

<script>
import store from "../store";
export default {
  methods: {},
  computed: {},
  beforeCreate() {
    window.scrollTo({
      top: 0,
      left: 0,
      behavior: "smooth"
    });
  },

  mounted() {}
};
</script>
<style scoped>
.container {
  margin-top: 12vh;
}
h1 {
  margin: 25px 0;
  font-size: 30px;
  font-weight: 700;
}
h2 {
  font-size: 24px;
  font-weight: 600;

  text-decoration: underline;
}
h3 {
  font-size: 22px;
  font-weight: 500;
}
p {
  font-size: 18px;
  font-weight: 500;
}
ul {
  list-style-type: circle;
  margin-top: 10vh;
}
li {
  font-size: 16px;
  font-weight: 400;
}
.volunteer-info-wrapper {
  padding: 5vh 20vw;
  margin-bottom: 10vh;
}
</style>