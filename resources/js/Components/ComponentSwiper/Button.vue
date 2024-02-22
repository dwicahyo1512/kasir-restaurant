<!-- some-inner-component.vue -->
<template>
    <button @click="swiper.slidePrev()">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"
            />
        </svg>
    </button>
    <button @click="swiper.slideNext()">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"
            />
        </svg>
    </button>
</template>
<script>
import { useSwiper } from "swiper/vue";

export default {
    setup() {
        const swiper = useSwiper();

        return {
            swiper,
        };
    },
};
</script>
