<template>
  <section class="hero is-primary is-fullheight">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-centered">
          <div class="column is-6-tablet is-6-desktop is-6-widescreen">
            <form @submit.prevent class="box">
              <h1 class="has-text-centered mb-4">Register</h1>
              <div class="field">
                <label for class="label">Name</label>
                <div>
                  <input
                    v-model="name"
                    type="text"
                    placeholder="e.g. Bob Smith"
                    class="input"
                    required
                  />
                </div>
              </div>
              <div class="field">
                <label for class="label">Email</label>
                <div>
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
                <div>
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
                <label for class="label">Verify Password</label>
                <div>
                  <input
                    v-model="passwordConfirmaton"
                    type="password"
                    placeholder="*******"
                    class="input"
                    required
                  />
                </div>
              </div>

              <div class="field login-register-wrapper">
                <input
                  @click="registerFormSubmit"
                  type="submit"
                  class="button is-success"
                  value="Register"
                />
                <router-link
                  to="/register"
                  class="pl-3"
                  exact
                >Already have an account yet? Login here.</router-link>
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
      name: "",
      email: "",
      password: "",
      passwordConfirmaton: ""
    };
  },
  methods: {
    registerFormSubmit: function() {
      let data = new FormData();
      data.append("name", this.name);
      data.append("email", this.email);
      data.append("password", this.password);
      data.append("password_confirmation", this.passwordConfirmaton);
      axios
        .post("register", data)
        .then(response => {
          console.log(response);
          this.$router.push("/pets");
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