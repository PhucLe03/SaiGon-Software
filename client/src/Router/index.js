import { createRouter, createWebHistory } from "vue-router";

import HomeView from "../Views/HomeView.vue";
// import ProductDetail from "../Views/ProductDetail.vue";
import NotFoundPage from "../Views/NotFoundPage.vue";
import DetailPage from "../views/DetailPage1.vue";
import CartPage from "../views/CartPage.vue";

const routes = [
  {
    path: "/home",
    name: "Home",
    component: HomeView,
    meta: {
      title: "Home Page",
    },
  },
  {
    path: "/product/:id",
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
    path: "/:pathMatch(.*)*",
    name: "NotFoundPage",
    component: NotFoundPage,
    meta: {
      title: "Page Not Found",
    },
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  const titleFromParams = to.params?.pageTitle;

  if (titleFromParams) {
    document.title = `${titleFromParams} - ${document.title}`;
  } else {
    document.title = to.meta?.title ?? "SGSW";
  }

  const nearestWithTitle = to.matched
    .slice()
    .reverse()
    .find((r) => r.meta && r.meta.title);

  if (nearestWithTitle) document.title = nearestWithTitle.meta.title;
  next();
});

export default router;
