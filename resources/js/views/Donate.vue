<template>
  <div>
    <section class="section">
      <div class="container">
        <h1 class="donate-header has-text-centered">Donation Information</h1>
        <h2 class="donate-sub-header has-text-centered">Help Us Help the Animals</h2>
        <div class="donate-info-wrapper">
          <p
            class="donate-paragraph"
          >Your contribution to PAWS Animal Shelter is immediately put to use saving lives and helping animals in need. Donations to our 501(c)(3) nonprofit organization are used to provide food, medical care and shelter for animals in Swain County.</p>
          <p
            class="donate-paragraph"
          >Since PAWS inception, we have adopted more than 3,000 animals to loving, forever homes and provided financial assistance for 11,000+ spay/neuter surgeries. We can’t do any of this without your generous donations. The average cost for routine medical intake per animal at PAWS is $169.</p>
        </div>

        <div class="ways-to-donate-wrapper">
          <div class="donate-link-wrapper">
            <h2 class="has-text-centered">Donate Online</h2>
            <a
              class="button"
              href="https://www.paypal.com/donate/?token=Oa-ARZfo2yKtXZuSjMZzGzWdrSRVNYwqt31fzntksO-cGNfFzxZT9HFXIWYDc04SJFv06G&country.x=US&locale.x="
            >Donate Via Paypal</a>
          </div>

          <div class="mail-donate-wrapper">
            <h2 class="has-text-centered">Mail In Donations</h2>
            <p class="mail-donate-paragraph">PAWS Animal Shelter</p>
            <p class="mail-donate-paragraph">PO BOX 1814</p>
            <p class="mail-donate-paragraph">Bryson City, NC 28713</p>
          </div>
        </div>

        <h2 class="has-text-centered">Other ways to donate</h2>
        <ul>
          <li>Stop by the Thrift Store to make a donation.</li>
          <li>Instead of buying a gift, make a donation to the animals at PAWS to acknowledge an anniversary, birthday or any special occasion. The honoree will receive a letter acknowledging your kindness!</li>
          <li>Consider PAWS in your estate planning.</li>
          <li>Make a gift in memory of that special person or pet that has made a difference in your life. Your memorial gift will be acknowledged in our newsletter.</li>
          <li>If you work for a company with a matching charitable gift program, you can double your gift to the animals.</li>
          <li>We accept stock or mutual fund donations.</li>
          <li>Donate to the PAWS endowment fund with NC Community Foundation.</li>
          <li>
            Shop on
            <a href="https://smile.amazon.com/gp/chpf/homepage?orig=Lw==">Amazon Smile</a> and designate PAWS Bryson City as your cause and a percentage of your payment will be donated to PAWS.
          </li>
          <li>
            Purchase items listed on
            <a
              href="http://givingworks.ebay.com/charity-auctions/charity/placing-animals-within-society-paws/35743/"
            >E-Bay</a> by PAWS.
          </li>
          <li>
            Go to
            <a href="https://kuranda.com/donate/state/44">kuranda.com</a> and donate a dog bed to PAWS for $52.
          </li>
        </ul>
        <div class="help-section-wrapper">
          <h2 class="has-text-centered">Donate Dog/Cat Necessities</h2>

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
h2 {
  margin-top: 5vh;
  font-size: 24px;
  font-weight: 600;
  text-decoration: underline;
}
ul {
  padding: 5vh 10vw;
}
li {
  padding: 10px 0;
  list-style-type: circle;
  font-weight: 500;
}
.container {
  margin-top: 12vh;
}
.donate-header {
  font-size: 30px;
  font-weight: 700;
}
.donate-sub-header {
  font-style: italic;
}
.donate-info-wrapper {
  padding: 5vh 10vw;
}
.donate-paragraph {
  font-size: 18px;
  font-weight: 500;
  padding: 18px 0;
}
.mail-donate-paragraph {
  font-size: 16px;
  font-weight: 500;
  padding: 4px;
  text-align: center;
}
.button {
  padding: 20px;
  margin: 20px 0;
  font-weight: 500;
  background-color: #00e4ff;
  color: white;
}
.donate-link-wrapper {
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
}
.ways-to-donate-wrapper {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: space-evenly;
  align-items: center;
  margin-bottom: 10vh;
}
.mail-donate-wrapper {
}
.help-section-wrapper {
  margin-bottom: 10vh;
}

#wish-list-ul {
  display: flex;
  justify-content: space-between;
}
#wish-list-ul li {
  font-size: 16px;
}
</style>
