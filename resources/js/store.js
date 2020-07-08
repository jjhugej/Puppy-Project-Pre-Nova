import Vue from "vue";
import Vuex, { Store } from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        loading: false,
        showLoginMessage: false,
        loggedInUser: {
            isLoggedIn: false,
            usersName: "",
            userEmail: "",
            userId: null
        }
    },
    mutations: {
        isLoading(state) {
            return (state.loading = true);
        },
        isDoneLoading(state) {
            return (state.loading = false);
        },
        setLoggedInUser(state, { name, email, id }) {
            //here the payload is destructured from response.data(context coming from userLogin action and
            //response.data coming from Login.vue) and then assigned to the state variables
            console.log("setLoggedInUser called");
            state.loggedInUser.usersName = name;
            state.loggedInUser.userEmail = email;
            state.loggedInUser.userId = id;
            state.loggedInUser.isLoggedIn = true;
            state.showLoginMessage = true;

            //remove the login message after 10sec
            setTimeout(() => {
                if (state.showLoginMessage === true) {
                    this.commit("removeLoginMessage");
                }
            }, 10000);
        },
        removeLoginMessage(state) {
            console.log("removeMessage called");
            return (state.showLoginMessage = false);
        }
    },
    actions: {
        userLogin(context) {
            context.commit("setLoggedInUser", context);
        }
    }
});
