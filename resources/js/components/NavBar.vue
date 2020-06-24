<template>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <router-link to="/contact" class="navbar-item" exact>
                Paws
            </router-link>

            <a
                role="button"
                class="navbar-burger burger"
                aria-label="menu"
                aria-expanded="false"
                data-target="navbarBasicExample"
            >
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <router-link to="/home" class="navbar-item" exact>
                    Home
                </router-link>
                <router-link to="/pets" class="navbar-item" exact>
                    Pet Search
                </router-link>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <router-link
                            to="/register"
                            class="button is-primary"
                            exact
                        >
                            Sign Up
                        </router-link>
                        <router-link to="/login" class="button is-light" exact>
                            Login
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    mounted() {
        console.log("Navbar mounted.");
    }
};
</script>

<style scoped></style>
