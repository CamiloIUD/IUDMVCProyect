import './bootstrap';

require("./bootstrap");

window.Vue = require("vue").default;

import router from "./assets/router";

Vue.component(
  "post-category-component",
  require("./components/PostCategoryComponent.vue").default
);
Vue.component(
  "detail-component",
  require("./components/DetailComponent.vue").default
);

const app = new Vue({
  el: "#app",
  router,
});