<template>
  <section class="hero is-primary is-fullheight">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-centered">
          <div class="column is-6-tablet is-6-desktop is-6-widescreen">
            <form @submit.prevent="loginFormSubmit" class="box">
              <h1 class="has-text-centered mb-4">Login</h1>
              <div class="field">
                <label for class="label">Email</label>
                <div class="control">
                  <input
                    v-model="formData.email"
                    type="email"
                    placeholder="e.g. bobsmith@gmail.com"
                    class="input"
                    required
                  />
                </div>
              </div>
              <div class="field">
                <label for class="label">Password</label>
                <div class="control">
                  <input
                    v-model="formData.password"
                    type="password"
                    placeholder="*******"
                    class="input"
                    required
                  />
                </div>
              </div>
              <div class="field">
                <label for class="checkbox">
                  <input v-model="formData.remember" type="checkbox" />
                  Remember me
                </label>
              </div>
              <div class="field login-register-wrapper">
                <input type="submit" class="button is-success" value="Login" />
                <router-link to="/register" class="pl-3" exact>
                  Don't have an account yet? Register
                  here.
                </router-link>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import store from "../store";
export default {
  data: function() {
    return {
      formData: {
        email: "",
        password: "",
        remember: false
      }
    };
  },
  methods: {
    loginFormSubmit: function() {
      axios.get("/sanctum/csrf-cookie").then(response => {
        axios.post("/login", this.formData).then(response => {
          //get user that is logged in.
          axios.get("/api/user").then(response => {
            console.log(response.data);
            //set store state for logged in user
            this.$store.commit("setLoggedInUser", response.data);

            // event now that user has logged in (listen for it on root element)

            //redirect to pets search
          });
          console.log("logged in!");
        });
      });
    }
  }
};
</script>
<style scoped>
h1 {
  font-size: 24px;
  font-weight: 600;
}
.login-register-wrapper {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
</style>
