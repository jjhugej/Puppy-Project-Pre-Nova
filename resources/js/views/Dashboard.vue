<template>
  <section class="section">
    <div class="container">
      <div class="columns is-multiline">
        <pet-card
          v-for="pet in pets"
          v-bind:key="pet.id"
          v-bind:id="pet.id"
          v-bind:name="pet.name"
          v-bind:is_liked="pet.is_liked"
          v-bind:image="pet.image_name"
        ></pet-card>
      </div>
      <div class="navigationBtns">
        <span>
          <a
            class="pet-search-navigation-btns button is-danger"
            v-if="showBackPageBtn"
            v-on:click="getPrevPage"
          >Back</a>
        </span>
        <span>
          <a
            class="pet-search-navigation-btns button is-link"
            v-if="showNextPageBtn"
            v-on:click="getNextPage"
          >Next></a>
        </span>
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
  computed: {
    showNextPageBtn: function() {
      if (this.petPaginate.currentPage === this.petPaginate.lastPage) {
        //remove next link if these two are equal
        return false;
      } else {
        return true;
      }
    },
    showLastPageBtn: function() {
      if (this.petPaginate.currentPage === this.petPaginate.lastPage) {
        //remove next link if these two are equal
        return false;
      } else {
        return true;
      }
    },
    showBackPageBtn: function() {
      if (this.petPaginate.currentPage === 1) {
        return false;
      } else {
        return true;
      }
    }
  },
  methods: {
    setPaginator: function(data) {
      //console.log(data);
      this.petPaginate.currentPage = data.current_page;
      this.petPaginate.lastPage = data.last_page;
      this.petPaginate.firstPageUrl = data.first_page_url;
      this.petPaginate.lastPageUrl = data.last_page_url;
      this.petPaginate.nextPageUrl = data.next_page_url;
      this.petPaginate.prevPageUrl = data.prev_page_url;
    },
    //future todo: refactor all of these page methods into one
    getNextPage: function() {
      axios
        .get(this.petPaginate.nextPageUrl)
        .then(response => {
          this.pets = [];
          response.data.data.forEach(pet => {
            this.pets.push(pet);
            this.setPaginator(response.data);
          });

          window.scrollTo({
            top: 0,
            left: 0,
            behavior: "smooth"
          });
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    getPrevPage: function() {
      axios
        .get(this.petPaginate.prevPageUrl)
        .then(response => {
          this.pets = [];
          response.data.data.forEach(pet => {
            this.pets.push(pet);
            this.setPaginator(response.data);
          });
          window.scrollTo({
            top: 0,
            left: 0,
            behavior: "smooth"
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
          this.pets = [];
          response.data.data.forEach(pet => {
            console.log(response);
            this.pets.push(pet);
            this.setPaginator(response.data);
          });
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  beforeCreate: () => {
    //get logged in user before the view is created, if user is not logged in redirect to login
    if (store.getters.getLoggedInUser.isLoggedIn === false) {
      //if user is not set in vue store, get the user
      axios
        .get("/api/user")
        .then(response => {
          //set store state for logged in user
          store.commit("setLoggedInUser", response.data);
          //call and get the users dashboard info here
        })
        .catch(errors => {
          if (errors.response.status === 401) {
            //401 status is unauthorized, redirect to login with flash message.
            store.dispatch("redirectWithAlert", {
              url: "/login",
              alertTitle: "Log In",
              alertMessage: "You must log in to continue",
              alertType: "is-danger"
            });
          }
        });
    }
  },
  mounted() {
    axios
      .get("/pets/liked")
      .then(response => {
        //if the pet is liked by the user it will have a property of isLiked:true on the pet obj
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
