import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";

import ThemeToggle from "./components/ThemeToggle.vue";
import Kasir from "./components/KasirPesanan.vue";

// import "ionicons/dist/ionicons.js";

import { createApp } from "vue/dist/vue.esm-bundler.js";
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
            spinner: true,
        }
    })
    .component("kasir-pesanan" , Kasir)
    .component("theme-toggle", ThemeToggle)
    .mount(el);
