<template>
  <div id="main-footer-wrapper">
    <div class="footer-secion-wrapper">
      <p>PAWS Animal Shelter</p>
      <p>Physical Address: 57 Lemons Branch Rd, Bryson City, NC 28713</p>
      <p>Mailing Address: PO Box 1814, Bryson City, NC 28713</p>
      <p>(828)488-0418</p>
    </div>
    <div class="footer-secion-wrapper has-text-centered">
      <p>Hours of operation</p>
      <div class="hours-of-operation-wrapper">
        <div class="hours-sub-section">
          <h1 class="hours-header">Animal Shelter</h1>
          <p class="has-text-left">Monday: 10:30am-5pm</p>
          <p class="has-text-left">Tuesday: 10:30am-5pm</p>
          <p class="has-text-left">Wednesday: 10:30am-5pm</p>
          <p class="has-text-left">Thursday: Closed</p>
          <p class="has-text-left">Friday: 10:30am-5pm</p>
          <p class="has-text-left">Saturday: 10:30am-5pm</p>
          <p class="has-text-left">Sunday: Closed</p>
        </div>
        <div class="hours-sub-section">
          <h1 class="hours-header">Thrift Store</h1>
          <p class="has-text-left">Monday: 10:30am-5pm</p>
          <p class="has-text-left">Tuesday: 10:30am-5pm</p>
          <p class="has-text-left">Wednesday: 10:30am-5pm</p>
          <p class="has-text-left">Thursday: Closed</p>
          <p class="has-text-left">Friday: 10:30am-5pm</p>
          <p class="has-text-left">Saturday: 10:30am-5pm</p>
          <p class="has-text-left">Sunday: Closed</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {}
};
</script>
<style scoped>
#main-footer-wrapper {
  padding: 2vh 2vw;
  background-color: #9497ff;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  color: white;
}
.footer-secion-wrapper {
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  justify-content: space-evenly;
  padding: 20px;
}
.hours-header {
  padding: 10px 0;
  text-decoration: underline;
}
.hours-of-operation-wrapper {
  display: flex;
  flex-direction: row;
}
.hours-sub-section {
  padding: 0 10px;
}
.has-text-left {
  padding: 10px 5px;
}
.footer-secion-wrapper p {
  padding: 10px 0;
}
@media only screen and (max-width: 800px) {
  #main-footer-wrapper {
    flex-wrap: wrap;
  }
}
</style>
