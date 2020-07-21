<template>
  <section>
    <div class="container">
      <h1>Shop our thrift store!</h1>
      <p>Stop by and check out some great bargains on our clothing, household items, furniture, books, jewelry and more! Whether you’re donating items or shopping, you’re helping to save the lives of many abandoned, abused, injured and homeless dogs and cats in Swain County. It’s a win-win situation for all of us!</p>
      <div class="btn-group-wrapper">
        <div class="btn-group">
          <p>Shop on ebay</p>
          <a
            id="blue-link"
            href="http://givingworks.ebay.com/charity-auctions/charity/placing-animals-within-society-paws/35743/"
          >Shop now</a>
        </div>
        <div class="btn-group">
          <p>Directions to our store</p>
          <a
            id="purple-link"
            href="https://www.google.com/maps/place/57+Lemons+Branch+Rd,+Bryson+City,+NC+28713/@35.4235556,-83.4581449,17z/data=!3m1!4b1!4m5!3m4!1s0x885948504e1e7d89:0x630886b6fe244093!8m2!3d35.4235512!4d-83.4559562"
          >Get directions</a>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  mounted() {}
};
</script>
<style scoped>
section {
  margin: 10vh 0;
}
h1 {
  margin-left: 15px;
  font-size: 40px;
  font-style: italic;
}
p {
  margin-top: 5vh;
  font-size: 22px;
  padding: 0 6vw;
  text-align: center;
}
a {
  margin-top: 10px;
  color: white;
  padding: 15px 25px;
  border-radius: 20px;
}
#blue-link {
  background-color: #00e4ff;
}
#purple-link {
  background-color: #9497ff;
}
.btn-group-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
}
.btn-group {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
</style>
