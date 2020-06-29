/** Bootstrapper */
require("./bootstrap");
/** Vue */
window.Vue = require("vue");

/** Third-Party Services */
require("./services");
/** Routes */
import router from "./routes";

/** Components */
import AuthUser from "./components/AuthUser.vue";
import adminSearch from "./components/AdminSearch.vue";

/** EVENT BUS */
window.Fire = new Vue();

const app = new Vue({
    el: "#app",
    router,
    components: {
        "auth-user": AuthUser,
        "admin-search": adminSearch
    }
});
