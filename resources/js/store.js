import Vue from "vue";
import Vuex, { Store } from "vuex";
import router from "./routes";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        loading: false,
        showAlertMessage: false,
        alertType: "",
        alertTitle: "",
        alertMessage: "",
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
        loginRedirect(state) {
            state.alertTitle = "Warning";
            state.alertMessage = "You must log in to continue.";
            state.alertType = "danger";
            state.showAlertMessage = true;
        },
        setAlertMessage(state, alertData) {
            state.alertTitle = alertData.alertTitle;
            state.alertMessage = alertData.alertMessage;
            state.alertType = alertData.alertType;
            state.showAlertMessage = true;
            setTimeout(() => {
                if (state.showAlertMessage === true) {
                    this.commit("removeAlertMessage");
                }
            }, 5000);
        },
        setLoggedInUser(state, { name, email, id }) {
            //here the payload is destructured from response.data(context coming from userLogin action and
            //response.data coming from Login.vue) and then assigned to the state variables
            state.loggedInUser.usersName = name;
            state.loggedInUser.userEmail = email;
            state.loggedInUser.userId = id;
            state.loggedInUser.isLoggedIn = true;

            this.commit("setAlertMessage", {
                alertTitle: "Success",
                alertMessage: "You have been logged in",
                alertType: "is-success"
            });

            //remove the login message after timeout
            setTimeout(() => {
                if (state.showAlertMessage === true) {
                    this.commit("removeLoginMessage");
                }
            }, 10000);
        },
        removeAlertMessage(state) {
            return (state.showAlertMessage = false);
        }
    },
    getters: {
        getLoggedInUser: state => {
            return state.loggedInUser;
        }
    },
    actions: {
        //FUTURE TODO:refactor this to say loginUser ... it makes more sense
        userLogin(context) {
            console.log("fired");
            //context.commit("setLoggedInUser", context);
        },
        redirectWithAlert(context, data) {
            console.log(data);
            context.commit("setAlertMessage", data);
            router.push(data.url);
        }
    }
});
