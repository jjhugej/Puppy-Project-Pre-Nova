<template>
  <div class="column is-one-fifth">
    <div class="card bm--card-equal-height">
      <div class="card-image">
        <figure class="image is-4by3">
          <img :src="image" />
        </figure>
      </div>
      <!--  <div class="card-content">
        <div class="content">
          <p class="has-text-centered">{{ name }}</p>
        </div>
      </div>-->

      <footer class="card-footer">
        <a class="card-footer-item" v-if="!likedStatus" v-on:click="liked">Like</a>
        <a class="card-footer-item" v-if="likedStatus" v-on:click="unLiked">LikeDDD</a>
        <a class="card-footer-item">More</a>
      </footer>
    </div>
  </div>
</template>

<script>
import store from "../store";
export default {
  props: ["id", "name", "image", "image_name", "is_liked"],
  data: function() {
    return {
      likedStatus: false
    };
  },
  computed: {},
  methods: {
    updateLikeStatus: function() {
      this.likedStatus = !this.likedStatus;
    },
    liked: function() {
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
        .post("/pets/like/" + this.id)
        .then(response => {
          this.updateLikeStatus();
        })
        .catch(errors => {
          console.log(errors);
        });
    },
    unLiked: function() {
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
        .post("/pets/unlike/" + this.id)
        .then(response => {
          this.updateLikeStatus();
        })
        .catch(errors => {
          console.log(errors);
        });
    }
  },
  mounted() {
    if (this.is_liked !== undefined) {
      this.likedStatus = this.is_liked;
    }
  }
};
</script>
<style scoped>
.bm--card-equal-height {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  height: 100%;
}
.bm--card-equal-height .card-footer {
  margin-top: auto;
}
p {
  font-size: 24px;
  font-weight: 600;
}
.card-content {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 1rem;
}
</style>
