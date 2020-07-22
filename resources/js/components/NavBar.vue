<template>
  <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="container">
      <div class="navbar-brand">
        <router-link to="/" class="navbar-item" exact>
          <h1>Paws</h1>
        </router-link>

        <a
          role="button"
          class="navbar-burger burger"
          v-bind:class="{ 'is-active': isActive }"
          v-on:click="hamburgerClicked"
          aria-label="menu"
          aria-expanded="false"
          data-target="navbarBarMenu"
        >
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="navbarBarMenu" v-bind:class="{ 'is-active': isActive }" class="navbar-menu">
        <div class="navbar-end">
          <router-link to="/pets" id="pet-search" class="navbar-item" exact>
            Pet Search
            <i class="fas fa-paw search-icon"></i>
          </router-link>
          <router-link to="/favorites" class="navbar-item" exact>
            Favorites
            <i class="fas fa-heart search-icon"></i>
          </router-link>
          <!-- <router-link to="/pets/add" class="navbar-item" exact>Add Pet</router-link> -->
          <!-- <router-link to="/news/add" class="navbar-item" exact>Add News</router-link> -->
          <router-link to="/adopt" class="navbar-item" exact>Adopt</router-link>
          <router-link to="/donate" class="navbar-item" exact>Donate</router-link>
          <router-link to="/foster" class="navbar-item" exact>Foster</router-link>
          <router-link to="/volunteer" class="navbar-item" exact>Volunteer</router-link>
          <router-link to="/news" class="navbar-item" exact>News</router-link>
          <router-link v-if="!isLoggedIn" to="/login" class="navbar-item" exact>Sign In</router-link>
          <a v-if="isLoggedIn" @click="logOutUser" class="navbar-item">Log Out</a>

          <div class="navbar-item">
            <!-- <nav-bar-account-access></nav-bar-account-access> -->
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import store from "../store";
export default {
  data: function() {
    return {
      isActive: false
    };
  },
  computed: {
    isLoggedIn: function() {
      return store.getters.isUserLoggedIn;
    }
  },
  methods: {
    hamburgerClicked: function() {
      this.isActive = !this.isActive;
    },
    logOutUser: function() {
      store.commit("userLogout");
      axios
        .get("/logout")
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  mounted() {}
};
</script>
  
<style scoped>
nav {
  background-color: #00e4ff;
}
span {
  height: 3px;
}

.navbar-item {
  color: white !important;
  font-size: 16px;
  font-weight: 600;
}
.navbar-item:hover {
  background-color: #32eaff;
}
a.navbar-item.is-active {
  background-color: #45ebfd;
}

.navbar-brand {
  background-color: #00e4ff;
}
.navbar-brand > i,
h1 {
  font-size: 22px;
  font-weight: 700;
  padding: 0 10px;
}

.burger {
  color: white;
}
a.navbar-item {
  background-color: #00e4ff;
}
.navbar-menu {
  background-color: #00e4ff;
}
.search-icon {
  font-size: 10px;
  padding: 2px;
}
</style>
