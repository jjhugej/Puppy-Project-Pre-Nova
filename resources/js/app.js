require("./bootstrap");

import router from "./routes";

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

const app = new Vue({
    el: "#app",
    data: { loading: false },
    router
});

router.beforeEach((to, from, next) => {
    app.loading = true;
    next();
});

router.afterEach((to, from, next) => {
    setTimeout(() => (app.loading = false), 1000);
});
