import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";

import ThemeToggle from "./components/ThemeToggle.vue";
import Kasir from "./components/KasirPesanan.vue";
import Plan from "./components/Planselector.vue";

// import "ionicons/dist/ionicons.js";

import { createApp, defineAsyncComponent } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

const el = document.getElementById("app");

createApp({
    render: renderSpladeApp({ el }),
})
    .use(SpladePlugin, {
        max_keep_alive: 10,
        transform_anchors: true,
        progress_bar:  {
            delay: 250,
            color: "#4B5563",
            css: true,
            spinner: false,
        }
    })
    .component("Planselector" , Plan)
    .component("kasir-pesanan" , Kasir)
    .component('Proses-pesanan', defineAsyncComponent(() => import("./Components/Proses.vue")))
    .component('Lingkar-chart', defineAsyncComponent(() => import("./Components/Donghuntchart.vue")))
    .component('Line-chart', defineAsyncComponent(() => import("./Components/ChartLine.vue")))
    .component("theme-toggle", ThemeToggle)
    .mount(el);
