<template>
  <section class="hero is-primary is-fullheight">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-centered">
          <div class="column is-6-tablet is-6-desktop is-6-widescreen">
            <form @submit.prevent class="box">
              <h1 class="has-text-centered mb-4">Login</h1>
              <div class="field">
                <label for class="label">Email</label>
                <div class="control">
                  <input
                    v-model="email"
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
                    v-model="password"
                    type="password"
                    placeholder="*******"
                    class="input"
                    required
                  />
                </div>
              </div>
              <div class="field">
                <label for class="checkbox">
                  <input type="checkbox" />
                  Remember me
                </label>
              </div>
              <div class="field login-register-wrapper">
                <input
                  @click="loginFormSubmit"
                  type="submit"
                  class="button is-success"
                  value="Login"
                />
                <router-link
                  to="/register"
                  class="pl-3"
                  exact
                >Don't have an account yet? Register here.</router-link>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data: function() {
    return {
      email: "",
      password: ""
    };
  },
  methods: {
    loginFormSubmit: function() {
      let data = new FormData();
      data.append("email", this.email);
      data.append("password", this.password);

      axios
        .post("login", data)
        .then(response => {
          console.log(response);
        })
        .catch(response => {
          console.log(response);
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