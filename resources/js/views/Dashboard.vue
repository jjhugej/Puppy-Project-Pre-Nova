<template>
  <h1>user dashboard</h1>
</template>

<script>
import store from "../store";
export default {
  //get logged in user
  beforeCreate: () => {
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

      //errors.response.status
      //router.push("/login");
      /* this.errors = errors.response.data.errors */
    }
  }
};
</script>
