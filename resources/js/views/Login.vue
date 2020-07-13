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
                  />
                </div>
                <p class="has-text-danger" v-if="errors.email">{{errors.email[0]}}</p>
              </div>
              <div class="field">
                <label for class="label">Password</label>
                <div class="control">
                  <input
                    v-model="formData.password"
                    type="password"
                    placeholder="*******"
                    class="input"
                  />
                </div>
                <p class="has-text-danger" v-if="errors.password">{{errors.password[0]}}</p>
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
import router from "../routes";
export default {
  data: function() {
    return {
      formData: {
        email: "",
        password: "",
        remember: false
      },
      errors: {}
    };
  },
  methods: {
    loginFormSubmit: function() {
      axios.get("/sanctum/csrf-cookie").then(response => {
        axios
          .post("/login", this.formData)
          .then(response => {
            //get user that is logged in.
            axios.get("/api/user").then(response => {
              //set store state for logged in user
              this.$store.commit("setLoggedInUser", response.data);
              //redirect to pets search
              router.push("/pets");
            });
          })
          .catch(errors => (this.errors = errors.response.data.errors));
        //.catch(error => (this.errors = error.response.data));
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
