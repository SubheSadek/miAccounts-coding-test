import "./bootstrap";
import { createApp } from "vue";
import App from "./App.vue";
import svgIcons from "./Helpers/globalSvgIcons.vue";

import { createPinia } from "pinia";

const pinia = createPinia();

import router from "./router";
import "view-ui-plus/dist/styles/viewuiplus.css";

import lang from "view-ui-plus/dist/locale/en-US";
import { locale } from "view-ui-plus";
locale(lang);

const app = createApp(App);
app.use(router);
app.use(pinia);
app.component("svg-icon", svgIcons);
app.mount("#app");
