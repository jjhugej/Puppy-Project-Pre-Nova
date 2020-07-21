<template>
  <div>
    <section class="section">
      <div class="container">
        <h1 class="adopt-header has-text-centered">PAWS Adoption Information</h1>
        <h2 class="adopt-sub-header has-text-centered">Your Forever Friend is Waiting</h2>
        <div class="adopt-info-wrapper">
          <p
            class="adopt-paragraph"
          >It's hard knowing what to do when you're about to adopt. But, we make this process even easier when you adopt with us, because we have trained staff that will go over every possible question or concern you and your family might have on introducing your newest pal to the family.</p>
          <p
            class="adopt-paragraph"
          >PAWS has a variety of animals available - adults and youngsters - and sometimes purebred animals. We screen all of our animals for temperament and sound health before adopting them out. When animals are relinquished by owners we are able to obtain a thorough history.</p>
          <p class="adopt-paragraph">Adoption Fees: $85 for dogs and $65 for cats</p>
          <p
            class="adopt-paragraph"
          >PAWS animals are dewormed, spayed/neutered, microchipped and vaccinated.</p>
          <div class="adopt-link-wrapper">
            <a
              class="button is-primary"
              href="http://nebula.wsimg.com/2a5eef9ad32cac4dda8a7e9aef393485?AccessKeyId=3FA74BD86E93D1DD88CD&disposition=0&alloworigin=1"
            >Adoption Application</a>
            <router-link to="/pets" class="button is-info">Search Our Pets</router-link>
          </div>
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
.adopt-header {
  font-size: 30px;
  font-weight: 700;
}
.adopt-sub-header {
  margin-top: 5vh;
  font-size: 24px;
  font-weight: 400;
  font-style: italic;
}
.adopt-info-wrapper {
  padding: 5vh 10vw;
}
.adopt-paragraph {
  font-size: 18px;
  font-weight: 500;
  padding: 18px 0;
}
.button {
  padding: 20px;
  margin: 20px 0;
}
</style>
