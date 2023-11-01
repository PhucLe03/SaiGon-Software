import { createRouter, createWebHistory } from "vue-router";

import HomeView from "../Views/HomeView.vue";
import ProductDetail from "../Views/ProductDetail.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: HomeView,
    meta: {
        title: "Home Page",
      },
  },
  {
    path: "/detail",
    name: "ProductDetail",
    component: ProductDetail,
    meta: {
        title: "Detail",
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
