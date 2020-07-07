import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        count: 0,
        loading: false,
        loggedIn: false
    },
    mutations: {
        incrementCount() {
            return this.state.count++;
        },
        isLoading(state) {
            return (state.loading = true);
        },
        isDoneLoading(state) {
            return (state.loading = false);
        }
    }
});
