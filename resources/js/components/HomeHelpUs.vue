<template>
  <div class="container">
    <h1 class="has-text-centered">Help Us Help The Animals</h1>
    <p>Since PAWS inception, we have adopted more than 3,000 animals to loving, forever homes and provided financial assistance for 11,000+ spay/neuter surgeries. We can’t do any of this without your generous donations.</p>

    <div class="help-section-wrapper">
      <h2 class="has-text-centered">Donate Via Paypal</h2>
      <p
        class="help-paragraph"
      >Your contribution to PAWS Animal Shelter is immediately put to use saving lives and helping animals in need. Donations to our 501(c)(3) nonprofit organization are used to provide food, medical care and shelter for animals in Swain County.</p>
      <div class="help-link-wrapper">
        <a
          class="help-link has-text-centered"
          href="https://www.paypal.com/donate/?token=5iCgR07iTKVCyuFA043Q5PFTf6RkCLGtAbKEvfsUeVuVHvhWTXjcZ2Lj06MaTFG_-O7TiW&country.x=US&locale.x="
        >Donate</a>
      </div>
    </div>
    <div class="help-section-wrapper">
      <h2 class="has-text-centered">Become A Foster Parent</h2>
      <p
        class="help-paragraph"
      >By placing a dog, cat, puppy, or kittens into a foster home, we're able to take in even more of Swain County's homeless and abandoned pets.</p>
      <ul>
        <li>- Zero medical expenses to you</li>
        <li>- Food provided as needed</li>
        <li>- Additional supplies available</li>
      </ul>
      <div class="help-link-wrapper">
        <router-link class="help-link has-text-centered" to="/foster">Learn More</router-link>
      </div>
    </div>
    <div class="help-section-wrapper">
      <h2 class="has-text-centered">Volunteer</h2>
      <p
        class="help-paragraph"
      >Donate your time by volunteering at our shelter, thrift store, festivals or fundraisers. There are all kinds of things you can do to help!</p>
      <ul>
        <li>- Socialize with the animals at the shelter</li>
        <li>- Assist us at the thrift store</li>
        <li>- Help at adoption events</li>
        <li>- Work at fundraising events</li>
      </ul>
      <div class="help-link-wrapper">
        <router-link class="help-link has-text-centered" to="/volunteer">Learn More</router-link>
      </div>
    </div>
    <div class="help-section-wrapper">
      <h2 class="has-text-centered">Donate Dog/Cat Necessities</h2>
      <p class="wish-list-header has-text-centered">Wish List Items</p>
      <ul id="wish-list-ul">
        <div id="left-side">
          <li>Purina dog, puppy, cat, kitten chow</li>
          <li>Paper towels</li>
          <li>Bleach</li>
          <li>Laundry detergent</li>
          <li>Dish detergent</li>
          <li>Trash Bags (30 Gallon)</li>
          <li>Non-clumping cat litter</li>
          <li>Milk Bones</li>
        </div>
        <div id="right-side">
          <li>Pupperoni</li>
          <li>Cat treats</li>
          <li>Dog & Cat toys</li>
          <li>Cat Trees & scratching post</li>
          <li>Hand Sanitizer</li>
          <li>Toilet paper</li>
          <li>Puppy pads</li>
          <li>wet (can) dog & cat food</li>
        </div>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {}
};
</script>
<style scoped>
h1 {
  font-size: 40px;
  font-style: italic;
  margin-left: 15px;
  font-weight: 700;
}
h2 {
  font-size: 30px;
  font-weight: 600;
  margin-top: 10vh;
}
p {
  padding: 0 10vw;
  font-size: 20px;
  margin-top: 5vh;
  font-weight: 500;
}
ul {
  padding: 0 10vw;
  margin-top: 10px;
}
li {
  padding: 8px 0;
  font-size: 18px;
  font-weight: 500;
}
.help-paragraph {
  font-size: 18px;
  font-weight: 500;
}
.help-link-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 15px;
  padding: 10px 0;
  border-bottom: solid 0.25px #00e4ff;
}
.help-link {
  width: 200px;
  margin-bottom: 5vh;
  padding: 10px;
  border-radius: 15px;
  background-color: #00e4ff;
  color: white;
  font-weight: 500;
}
.help-section-wrapper {
  margin-bottom: 10vh;
}
.wish-list-header {
  text-decoration: underline;
  margin-bottom: 3vh;
}
#wish-list-ul {
  display: flex;
  justify-content: space-between;
}
#wish-list-ul li {
  font-size: 18px;
  font-weight: 500;
}
</style>
