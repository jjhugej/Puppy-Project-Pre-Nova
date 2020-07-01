require("./bootstrap");

import router from "./routes";
import Vuex from "vuex";
import store from "./store";
Vue.use(Vuex);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
const files = require.context("./", true, /\.vue$/i);
files.keys().map(key =>
    Vue.component(
        key
            .split("/")
            .pop()
            .split(".")[0],
        files(key).default
    )
);
//end auto-register

const app = new Vue({
    el: "#app",
    data: {},
    router,
    store,

    computed: {
        loading: () => {
            return store.state.loading;
        }
    }
});

/*
router.beforeResolve((to, from, next) => {
    store.commit("isLoading");
    next();
});

router.afterEach((to, from, next) => {
    setTimeout(() => (app.loading = false), 5000);
}); */
