<template>
  <section class="section">
    <div class="container">
      <div class="search-options">
        <div class="select">
          <select v-model="selectFields.animalTypeSelect">
            <option value="all">All Animals</option>
            <option value="dog">Dogs</option>
            <option value="cat">Cats</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="select">
          <select v-model="selectFields.animalAgeSelect">
            <option value="all">All Ages</option>
            <option value="less_than_one">< 1 Year</option>
            <option value="less_than_five">< 5 Years</option>
            <option value="five_or_more">5+ Years</option>
          </select>
        </div>
        <button id="search-btn" class="button" @click="refineSearch">
          <i class="fas fa-paw"></i>Search
          <i class="fas fa-paw"></i>
        </button>
      </div>
      <div class="columns is-multiline">
        <loading-icon v-if="noMatches"></loading-icon>
        <pet-card
          v-for="pet in pets"
          v-bind:key="pet.id"
          v-bind:id="pet.id"
          v-bind:name="pet.name"
          v-bind:age="pet.age"
          v-bind:animal_type="pet.animal_type"
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
          >Next</a>
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
      pets: [],
      selectFields: {
        animalTypeSelect: "all",
        animalAgeSelect: "all"
      }
    };
  },
  computed: {
    noMatches: function() {
      if (this.pets.length < 1) {
        return true;
      } else {
        return false;
      }
    },
    showNextPageBtn: function() {
      if (this.petPaginate.currentPage === this.petPaginate.lastPage) {
        return false;
      } else {
        return true;
      }
    },
    showLastPageBtn: function() {
      if (this.petPaginate.currentPage === this.petPaginate.lastPage) {
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
    refineSearch: function() {
      this.pets = [];
      axios
        .get(
          "pets/search?animal_type=" +
            this.selectFields.animalTypeSelect +
            "&age=" +
            this.selectFields.animalAgeSelect
        )
        .then(response => {
          response.data.data.forEach(pet => {
            this.pets.push(pet);
            this.setPaginator(response.data);
          });
        })
        .catch(function(error) {
          console.log(error);
        });
    },
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
            this.pets.push(pet);
            this.setPaginator(response.data);
          });
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  beforeCreate() {
    //set loading screen before create
  },
  mounted() {
    //remove loading screen once ajax data is in
    axios
      .get("/pets")
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
<style scoped>
section {
  margin: 10px;
}
.navigationBtns {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.pet-search-navigation-btns {
  padding: 10px 25px;
  background-color: #00e4ff;
}
.columns {
  padding: 15px;
  border-top: solid 0.5px grey;
}
h1 {
  margin: 3vh 0;
  font-size: 36px;
  font-weight: 600;
}
button > i {
  padding: 0 5px;
}
.search-options {
  display: flex;
  flex-wrap: wrap;
  flex-direction: row;
  align-items: center;
  justify-content: flex-end;
  padding: 3vh 0;
}
.select {
  padding: 0 5px;
}
#search-btn {
  background-color: #00e4ff;
  color: white;
  font-weight: 600;
  font-size: 20px;
}
@media only screen and (max-width: 600px) {
  .search-options {
    justify-content: center;
  }
  .select {
    flex-basis: 40%;
    padding: 0;
  }
  #search-btn {
    flex-basis: 100%;
    margin: 20px;
  }
}
</style>
