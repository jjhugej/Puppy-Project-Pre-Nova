import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        count: 0,
        loading: false
    },
    mutations: {
        incrementCount() {
            return this.state.count++;
        },
        isLoading(state) {
            return (this.state.loading = true);
        },
        isDoneLoading(state) {
            return (this.state.loading = false);
        }
    }
});
