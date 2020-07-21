<template>
  <div>
    <section class="section">
      <div class="container">
        <h1 class="has-text-centered">PAWS Foster Parenting</h1>
        <div class="foster-info-wrapper">
          <p>Fostering is one of the biggest ways you can help!</p>
          <p>By placing a dog, cat, puppy, or kittens into a foster home, we're able to take in even more of Swain County's homeless and abandoned pets.</p>

          <ul>
            <h3>Benefits of being a foster parent:</h3>
            <li>Zero medical expenses for you.</li>
            <li>Food provided as needed.</li>
            <li>Additional supplies available.</li>
            <li>Help a pet who is too stressed at the shelter.</li>
            <li>Help a pet recover from a medical procedure.</li>
          </ul>
        </div>
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
  font-size: 30px;
  font-weight: 700;
}
h3 {
  font-size: 20px;
  font-weight: 500;
  text-decoration: underline;
  margin-top: 10vh;
  margin-bottom: 10px;
}
.foster-info-wrapper {
  padding: 5vh 20vw;
}
p {
  font-size: 18px;
  font-weight: 500;
  margin: 10px 0;
}
li {
  padding: 5px;
  list-style-type: circle;
  font-weight: 500;
}
</style>
