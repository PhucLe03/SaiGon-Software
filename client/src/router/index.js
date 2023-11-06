import { createRouter, createWebHistory } from "vue-router";
import HomePage from "../views/HomePage.vue";
import DetailPage from "../views/DetailPage.vue";
import CartPage from "../views/CartPage.vue";
import NotFoundPage from "../views/NotFoundPage.vue";

const routes = [
    {
        path: "/home",
        name: "HomePage",
        component: HomePage,
    },
    {
        path: "/products/:id",
        name: "DetailPage",
        component: DetailPage,
    },
    {
        path: "/cart",
        name: "CartPage",
        component: CartPage,
    },
    {
        path: "/",
        redirect: "/home",
    },
    {
        path: "/:catchAll(.*)",
        name: "NotFoundPage",
        component: NotFoundPage,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
