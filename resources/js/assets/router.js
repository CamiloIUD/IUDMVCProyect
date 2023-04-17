import Vue from "vue";
import VueRouter from "vue-router";
import PostCategoryComponent from "../components/PostCategoryComponent.vue";
import DetailComponent from "../components/DetailComponent.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    component: PostCategoryComponent,
  },
  {
    path: "/detail/:id",
    name: "detail",
    component: DetailComponent,
  },
];

const router = new VueRouter({
  mode: "history",
  routes,
});

export default router;
