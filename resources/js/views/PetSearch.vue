<template>
  <section class="section">
    <div class="container">
      <span>
        <a class="pet-search-navigation-btns" v-on:click="getPrevPage">Back</a>
      </span>
      <span>
        <a class="pet-search-navigation-btns" v-on:click="getNextPage">Next</a>
      </span>
      <span>
        <a class="pet-search-navigation-btns" v-on:click="getLastPage">Last</a>
      </span>
      <div class="columns is-multiline">
        <pet-card
          v-for="pet in pets"
          v-bind:key="pet.id"
          v-bind:name="pet.name"
          v-bind:image="pet.image_name"
        ></pet-card>
      </div>
    </div>
  </section>
</template>

<script>
import store from "../store";
export default {
  data: function() {
    return {
      petPaginate: {
        currentPage: "",
        lastPage: "",
        firstPageUrl: "",
        lastPageUrl: "",
        nextPageUrl: "",
        prevPageUrl: ""
      },
      pets: []
    };
  },
  computed: {},
  methods: {
    setPaginator: function(data) {
      this.petPaginate.currentPage = data.current_page;
      this.petPaginate.lastPage = data.last_page;
      this.petPaginate.firstPageUrl = data.first_page_url;
      this.petPaginate.lastPageUrl = data.last_page_url;
      this.petPaginate.nextPageUrl = data.next_page_url;
      this.petPaginate.prevPageUrl = data.prev_page_url;
    },
    //future todo: refactor all of these page methods into one
    getNextPage: function() {
      if (this.petPaginate.currentPage === this.petPaginate.lastPage) {
        //remove next link if these two are equal
      } else {
        axios
          .get(this.petPaginate.nextPageUrl)
          .then(response => {
            console.log(response.data);
            this.pets = [];
            response.data.data.forEach(pet => {
              this.pets.push(pet);
              this.setPaginator(response.data);
            });
          })
          .catch(function(error) {
            console.log(error);
          });
      }
    },
    getPrevPage: function() {
      axios
        .get(this.petPaginate.prevPageUrl)
        .then(response => {
          console.log(response.data);
          this.pets = [];
          response.data.data.forEach(pet => {
            this.pets.push(pet);
            this.setPaginator(response.data);
          });
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    getFirstPage: function() {
      axios
        .get(this.petPaginate.firstPageUrl)
        .then(response => {
          console.log(response.data);
          this.pets = [];
          response.data.data.forEach(pet => {
            this.pets.push(pet);
            this.setPaginator(response.data);
          });
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    getLastPage: function() {
      axios
        .get(this.petPaginate.lastPageUrl)
        .then(response => {
          console.log(response.data);
          this.pets = [];
          response.data.data.forEach(pet => {
            this.pets.push(pet);
            this.setPaginator(response.data);
          });
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  beforeCreate() {},
  mounted() {
    axios
      .get("/pets")
      .then(response => {
        console.log(response.data);
        response.data.data.forEach(pet => {
          this.pets.push(pet);
          this.setPaginator(response.data);
        });
      })
      .catch(function(error) {
        console.log(error);
      });
  }
};
</script>
<style scoped>
section {
  margin: 10px;
}
.pet-search-navigation-btns {
  padding: 0 10px;
}
</style>
