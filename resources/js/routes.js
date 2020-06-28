import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: "/",
            component: require("./components/Home.vue").default,
            children: [
                {
                    path: "",
                    component: require("./components/Landing.vue").default
                },
                {
                    path: "shop",
                    component: require("./components/Shop.vue").default
                },
                {
                    path: "contact",
                    component: require("./components/Contact.vue").default
                },
                {
                    path: "about",
                    component: require("./components/About.vue").default
                },
                {
                    path: "cart",
                    component: require("./components/Cart.vue").default
                }
            ]
        },
        {
            path: "/admin",
            component: require("./components/Admin.vue").default,
            children: [
                {
                    path: "",
                    component: require("./components/Dashboard.vue").default
                },
                {
                    path: "users",
                    component: require("./components/ManageUsers.vue").default
                },
                {
                    path: "products",
                    component: require("./components/ManageProducts.vue")
                        .default
                },
                {
                    path: "orders",
                    component: require("./components/ManageOrders.vue").default
                }
            ]
        }
    ],
    mode: "history"
});
