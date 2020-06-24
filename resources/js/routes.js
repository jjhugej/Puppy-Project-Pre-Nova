import VueRouter from "vue-router";

let routes = [
    {
        path: "/home",
        component: require("./views/Home.vue").default
    }
];
export default new VueRouter({
    routes,
    linkActiveClass: "is-active"
});
