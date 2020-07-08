import Vue from "vue";
import VueRouter from "vue-router";
import axios from "axios";
import Vuex from "vuex";

window.Vue = Vue;
Vue.use(VueRouter);
Vue.use(Vuex);

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.withCredentials = true;
