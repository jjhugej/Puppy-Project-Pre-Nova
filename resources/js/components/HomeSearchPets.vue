<template>
  <div class="container">
    <h1 class="has-text-centered">"You can keep a dog, but it is the cat who keeps people..."</h1>
    <p>PAWS has a large variety of dogs and cats available - adults and youngsters - and sometimes purebred animals. We screen all of our animals for temperament and sound health before adopting them out. When animals are relinquished by owners we are able to obtain a thorough history.</p>
    <div class="btn-wrapper">
      <router-link class="search-pets-link" to="/pets">
        <i class="fas fa-paw"></i>
        <span>Search Our Pets</span>
        <i class="fas fa-paw"></i>
      </router-link>
    </div>
    <hr />
  </div>
</template>

<script>
export default {
  mounted() {}
};
</script>
<style scoped>
.container {
  padding: 2vw;
}
h1 {
  margin: 5vh 0 2vh 0;
  font-style: italic;
  font-size: 18px;
  font-weight: 700;
}
p {
  padding: 0 10vw;
  font-size: 22px;
}
.search-pets-link {
  text-align: center;
  background-color: #9497ff;
  padding: 20px;
  border-radius: 20px;
  color: white;
}
span {
  font-size: 22px;
  font-weight: 500;
  margin: 0 5px;
}
i {
  font-size: 22px;
}
.btn-wrapper {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}
</style>
