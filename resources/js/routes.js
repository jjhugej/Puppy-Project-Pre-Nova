import VueRouter from "vue-router";

let routes = [
    {
        path: "/",
        component: require("./views/Home.vue").default
    },
    {
        path: "/home",
        component: require("./views/Home.vue").default
    },
    {
        path: "/login",
        component: require("./views/Login.vue").default
    },
    {
        path: "/register",
        component: require("./views/Register.vue").default
    },
    {
        path: "/pets",
        component: require("./views/PetSearch.vue").default
    },
    {
        path: "/pets/add",
        component: require("./views/AddPet.vue").default
    },
    {
        path: "/news/add",
        component: require("./views/AddNews.vue").default
    },
    {
        path: "/favorites",
        component: require("./views/Favorites.vue").default
    },
    {
        path: "/news",
        component: require("./views/News.vue").default
    },
    {
        path: "/adopt",
        component: require("./views/Adopt.vue").default
    },
    {
        path: "/donate",
        component: require("./views/Donate.vue").default
    },
    {
        path: "/volunteer",
        component: require("./views/Volunteer.vue").default
    },
    {
        path: "/foster",
        component: require("./views/Foster.vue").default
    },
    {
        path: "/pets/show",
        name: "petShow",
        props: true,
        component: require("./views/PetShow.vue").default
    }
];
export default new VueRouter({
    /* mode: "history", //removes # (hashtag) from url */
    routes,
    linkActiveClass: "is-active"
});
