<script>
import { ref } from "vue";
import { Controller } from "swiper/modules";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import "swiper/css/navigation";
import VueBasicAlert from "vue-basic-alert";
import ButtonSwiper from "./ComponentSwiper/Button.vue";

export default {
    components: {
        Swiper,
        SwiperSlide,
        ButtonSwiper,
        VueBasicAlert,
    },
    props: {
        pending: {
            type: Array,
            required: true,
        },
        proses: {
            type: Array,
            required: true,
        },
        done: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            isLoading: false, // Variabel untuk mengontrol tampilan loading
        };
    },
    setup() {
        const controlledSwiper = ref(null);
        const setControlledSwiper = (swiper) => {
            controlledSwiper.value = swiper;
        };
        const set2ControlledSwiper = (swiper) => {
            controlledSwiper.value = swiper;
        };
        return {
            Controller,
            controlledSwiper,
            setControlledSwiper,
            set2ControlledSwiper,
        };
    },
    methods: {
        // updateDataPeriodically() {
        //     setInterval(() => {
        //         axios
        //             .get("/proses")
        //             .then((response) => {
        //                 // Perbarui data pesanan dengan respons dari server
        //                 this.orders = response.data;
        //             })
        //             .catch((error) => {
        //                 console.error("Error:", error);
        //             });
        //     }, 5000); // Panggil setiap 5 detik (5000 milidetik)
        // },
        handleClick(orderId) {
            this.isLoading = true;
            console.log("Order dengan ID", orderId, "telah diklik.");
            const data = {
                id: orderId,
            };
            axios
                .post("/proses", data)
                .then((response) => {
                    // Handle response dari controller
                    // Lakukan tindakan setelah permintaan berhasil
                    this.$splade.visit("/proses");
                    this.$refs.alert.showAlert(
                        "success",
                        response.data.message,
                        "Update Status Berhasil",
                        {
                            iconSize: 35,
                            iconType: "regular",
                            position: "top right",
                        }
                    );
                    this.isLoading = false;
                    console.log(response.data);
                })
                .catch((error) => {
                    // Handle kesalahan jika terjadi
                    console.error(error);
                    this.isLoading = false;
                    this.$refs.alert.showAlert(
                        "error",
                        "gagal! Silakan coba lagi.",
                        "Peringatan Status",
                        {
                            iconSize: 35,
                            iconType: "regular",
                            position: "top right",
                        }
                    );
                });
        },
    },
};
</script>

<template>
    <div
        v-if="isLoading"
        class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center bg-opacity-50 bg-base-300 z-50"
    >
        <div class="text-center">
            <span class="loading loading-bars loading-lg"></span>
        </div>
    </div>
    <vue-basic-alert :duration="300" :closeIn="3000" ref="alert" />
    <div class="card card-compact bg-base-100 shadow-xl mb-6">
        <div class="card-body">
            <div class="z-0">
                <swiper
                    :modules="[Controller]"
                    :controller="{ control: controlledSwiper }"
                    :slides-per-view="3"
                    :space-between="20"
                >
                    <swiper-slide
                        class="card-body w-60 bg-base-200 text-base-content rounded-lg"
                        v-for="order in pending"
                        :key="order.id"
                    >
                        <div
                            class="cursor-pointer"
                            @click="handleClick(order.id)"
                        >
                            <div class="flex">
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
                                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"
                                    />
                                </svg>

                                <h2 class="pl-1">{{ order.id }}</h2>
                                <p class="text-end">{{ order.nama_pemesan }}</p>
                            </div>
                            <div
                                class="card-actions rounded-2xl text-accent-content justify-between bg-warning px-2 py-0.5"
                            >
                                <div>
                                    <h1>Pending Pesanan</h1>
                                </div>
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
                                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"
                                    />
                                </svg>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide> </swiper-slide>
                    <template v-slot:container-start>
                        <div class="card-title justify-between">
                            Pending
                            <div class="">
                                <ButtonSwiper />
                            </div>
                        </div>
                    </template>
                </swiper>
            </div>
        </div>
    </div>
    <div class="card card-compact bg-base-100 shadow-xl mb-6">
        <div class="card-body">
            <div class="z-0">
                <swiper
                    :modules="[Controller]"
                    @swiper="setControlledSwiper"
                    :slides-per-view="3"
                    :space-between="20"
                >
                    <swiper-slide
                        class="card-body w-60 bg-base-200 text-base-content rounded-lg"
                        v-for="order in proses"
                        :key="order.id"
                    >
                        <div
                            class="cursor-pointer"
                            @click="handleClick(order.id)"
                        >
                            <div class="flex">
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
                                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"
                                    />
                                </svg>

                                <h2 class="pl-1">{{ order.id }}</h2>
                                <p class="text-end">{{ order.nama_pemesan }}</p>
                            </div>
                            <div
                                class="card-actions rounded-2xl text-accent-content justify-between bg-info px-2 py-0.5"
                            >
                                <div class="">
                                    <div>Pesanan Sedang Dalam Proses</div>
                                </div>
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
                                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"
                                    />
                                </svg>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide> </swiper-slide>

                    <template v-slot:container-start>
                        <div class="card-title justify-between">
                            Proses
                            <div class="">
                                <ButtonSwiper />
                            </div>
                        </div>
                    </template>
                </swiper>
            </div>
        </div>
    </div>
    <div class="card card-compact bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="z-0">
                <swiper
                    :modules="[Controller]"
                    @swiper="set2ControlledSwiper"
                    :slides-per-view="3"
                    :space-between="20"
                >
                    <swiper-slide
                        class="card-body w-60 bg-base-200 text-base-content rounded-lg"
                        v-for="order in done"
                        :key="order.id"
                    >
                        <div class="flex">
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
                                    d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"
                                />
                            </svg>

                            <h2 class="pl-1">{{ order.id }}</h2>
                            <p class="text-end">{{ order.nama_pemesan }}</p>
                        </div>
                        <div
                            class="card-actions rounded-2xl text-accent-content justify-between bg-success px-2 py-0.5"
                        >
                            <div class="">
                                <div>Pesanan Selesai</div>
                            </div>
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
                                    d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"
                                />
                            </svg>
                        </div>
                    </swiper-slide>
                    <swiper-slide> </swiper-slide>
                    <template v-slot:container-start>
                        <div class="card-title justify-between">
                            Done
                            <div class="">
                                <ButtonSwiper />
                            </div>
                        </div>
                    </template>
                </swiper>
            </div>
        </div>
    </div>
</template>
