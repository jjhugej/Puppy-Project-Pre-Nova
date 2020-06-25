import VueRouter from "vue-router";

let routes = [
    {
        path: "/home",
        component: require("./views/Home.vue").default
    },
    {
        path: "/pets",
        component: require("./views/PetSearch.vue").default
    }
];
export default new VueRouter({
    /* mode: "history", //removes # (hashtag) from url */
    routes,
    linkActiveClass: "is-active"
});
