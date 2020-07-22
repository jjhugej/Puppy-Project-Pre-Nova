<template>
  <section>
    <div class="container">
      <div class="puppy-info-wrapper">
        <figure class="image is-256x256">
          <img class="is-rounded" :src="image" />
        </figure>
        <div class="info-text-wrapper">
          <h1 class="has-text-centered">{{animalName}}</h1>
          <p>
            <strong>Age:</strong>
            {{animalAge}}
          </p>
          <p>
            <strong>Sex:</strong>
            {{animalSex}}
          </p>
          <p>
            <strong>Breed:</strong>
            {{animalBreed}}
          </p>

          <i v-if="!isFavorited" @click="addToFavorites" class="far fa-heart like-btn"></i>
          <i v-if="isFavorited" @click="removeFromFavorites" class="fas fa-heart like-btn"></i>
          <p class="like-btn-header">Click the heart to toggle favorite status</p>
        </div>
      </div>
      <button @click="goBack" class="button is-medium">
        <i class="fas fa-long-arrow-alt-left"></i>Back
      </button>
    </div>
  </section>
</template>

<script>
import store from "../store";
import router from "../routes";
export default {
  props: ["petId", "is_liked"],
  data: function() {
    return {
      name: "",
      age: null,
      animalType: "",
      animalBreed: "",
      animalSex: "",
      isFavorited: false,
      image: ""
    };
  },

  computed: {
    animalName: function() {
      return this.name.charAt(0).toUpperCase() + this.name.slice(1);
    },
    animalAge: function() {
      var totalDays = this.age * 365;
      var years = Math.floor(totalDays / 365);
      var months = Math.floor((totalDays - years * 365) / 30);
      var days = Math.floor(totalDays - years * 365 - months * 30);
      var result;
      if (years == 0) {
        result = months + " months old";
      } else if (months == 0) {
        if (years < 2) {
          result = years + " year old";
        } else {
          result = years + " years old";
        }
      } else if (years < 2 && months != 0) {
        result = years + " year and " + months + " months old";
      } else {
        result = years + " years and " + months + " months old";
      }
      return result;
    }
  },
  methods: {
    goBack: function() {
      router.go(-1);
    },
    addToFavorites: function() {
      if (store.getters.getLoggedInUser.isLoggedIn === false) {
        /* 
        future todo: this is very similar to what is called in the dashboard
        refactor to keep it DRY...

        something like: checkUserLoginStatus()
         */
        //check if user status is set to isLoggedIn and if not get user info or redirect
        axios
          .get("/api/user")
          .then(response => {
            store.commit("setLoggedInUser", response.data);
            //once user is logged in, post to persist liked pets for current user
          })
          .catch(errors => {
            console.log(errors);
            if (errors.response.status === 401) {
              //401 status is unauthorized, redirect to login with flash message.
              store.dispatch("redirectWithAlert", {
                url: "/login",
                alertTitle: "Log In",
                alertMessage: "You must log in to like an animal",
                alertType: "is-danger"
              });
            }
          });
      } //end user check

      axios
        .post("/pets/like/" + this.petId)
        .then(response => {
          this.updateFavoriteStatus();
        })
        .catch(errors => {
          console.log(errors);
        });
    },
    removeFromFavorites: function() {
      // TODO THERES SOMETHING WRONG WITH THIS. PET LIKED STATUS NOT BEING PROPERLY REMOVED
      if (store.getters.getLoggedInUser.isLoggedIn === false) {
        /* 
        future todo: this is very similar to what is called in the dashboard
        refactor to keep it DRY...

        something like: checkUserLoginStatus()
         */
        //check if user status is set to isLoggedIn and if not get user info or redirect
        axios
          .get("/api/user")
          .then(response => {
            store.commit("setLoggedInUser", response.data);
          })
          .catch(errors => {
            console.log(errors);
            if (errors.response.status === 401) {
              //401 status is unauthorized, redirect to login with flash message.
              store.dispatch("redirectWithAlert", {
                url: "/login",
                alertTitle: "Log In",
                alertMessage: "You must log in to like an animal",
                alertType: "is-danger"
              });
            }
          });
      } //end user check

      axios
        .post("/pets/unlike/" + this.petId)
        .then(response => {
          this.updateFavoriteStatus();
        })
        .catch(errors => {
          console.log(errors);
        });
    },
    updateFavoriteStatus: function() {
      this.isFavorited = !this.isFavorited;
    }
  },
  mounted() {
    axios
      .get("/pets/show/" + this.petId)
      .then(response => {
        this.name = response.data.name;
        this.age = response.data.age;
        this.animalType = response.data.animal_type;
        this.animalBreed = response.data.animal_breed;
        this.animalSex = response.data.animal_sex;
        this.isFavorited = response.data.is_liked;
        this.image = response.data.image_name;
      })
      .catch(errors => {
        console.log(errors);
      });
  }
};
</script>
<style scoped>
section {
  margin-top: 20vh;
}
h1 {
  font-size: 30px;
  font-weight: 600;
}
p {
  font-size: 22px;
  font-weight: 400;
  padding: 10px;
}
img {
  max-width: auto;
}
strong {
  font-weight: 500;
}
button {
  margin: 25px 30px;
  font-weight: 700;
  background-color: #00e4ff;
  color: white;
}
i {
  padding-right: 10px;
}
.like-btn {
  cursor: pointer;
  margin: 20px;
  text-align: center;
  color: red;
  font-size: 100px;
}
.like-btn-header {
  font-size: 14px;
  font-weight: 300;
}
.favorite-btn {
  margin: 25px 0;
}
.image img {
  height: 256px;
  width: 256px;
}
.puppy-info-wrapper {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: space-evenly;
  align-items: center;
  padding: 25px;
}
.info-text-wrapper {
  display: flex;
  flex-direction: column;
  justify-content: space-evenly;
}
</style>
