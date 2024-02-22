<template>
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-2">
        <div class="xl:col-span-2">
            <div class="card card-compact bg-base-100 shadow-xl">
                <div class="card-body">
                    <div class="z-0">
                        <swiper
                            :modules="modules"
                            :slides-per-view="3"
                            :space-between="20"
                            @swiper="onSwiper"
                            @slideChange="onSlideChange"
                        >
                            <swiper-slide
                                class="card-body w-60 bg-base-200 text-base-content rounded-lg"
                                v-for="order in orders"
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

                                    <h2 class="pl-1">{{ order.number }}</h2>
                                    <p class="text-end">
                                        {{ order.items }} items
                                    </p>
                                </div>
                                <div
                                    class="card-actions rounded-2xl text-accent-content justify-between px-2 py-0.5"
                                    :class="{
                                        'bg-accent':
                                            order.status === 'Ready to Serve',
                                        'bg-warning':
                                            order.status === 'In Progress',
                                    }"
                                >
                                    <div class="">
                                        <div>{{ order.status }}</div>
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
                                    Kasir
                                    <div class="">
                                        <ButtonSwiper />
                                    </div>
                                </div>
                            </template>
                        </swiper>
                    </div>
                </div>
            </div>
            <!-- Produk yang dijual -->
            <div class="card card-compact bg-base-100 shadow-xl mt-3">
                <div class="card-body">
                    <h2 class="card-title">Menu</h2>
                    <div class="flex flex-wrap justify-center">
                        <div
                            class="card card-compact w-64 lg:w-40 bg-base-100 shadow-xl m-2"
                            v-for="product in products"
                            :key="product.id"
                        >
                            <figure>
                                <img
                                    :src="product.image"
                                    :alt="product.name"
                                    class="w-full h-30 object-cover"
                                />
                            </figure>
                            <div class="card-body items-center text-center">
                                <h2 class="card-title">{{ product.name }}</h2>
                                <span class="text-sm text-neutral">{{
                                    formatCurrency(product.harga)
                                }}</span>
                                <div class="card-actions">
                                    
                                    <button
                                        v-if="productAdded(product)"
                                        class="btn btn-primary w-17"
                                        @click="handleCartAction(product)"
                                    >
                                        {{ cartButtonLabel(product) }}
                                    </button>
                                    <button
                                        v-if="productAdded(product)"
                                        class="btn btn-secondary w-17"
                                        @click="addToCart(product)"
                                    >
                                        Add
                                    </button>
                                    <button
                                        v-else
                                        class="btn btn-primary w-17"
                                        @click="handleCartAction(product)"
                                    >
                                        {{ cartButtonLabel(product) }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bagian pesanan -->
        <div class="col-auto">
            <div
                class="card card-compact w-auto bg-base-100 shadow-xl p-2 lg:mt-4 xl:mt-0"
            >
                <div class="card-body">
                    <h2 class="card-title">Details Pesanan</h2>
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th class="text-left">Item</th>
                                <th class="text-right">Quantity</th>
                                <th class="text-right">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(item, index) in orderedItems"
                                :key="index"
                            >
                                <td class="text-left">{{ item.name }}</td>
                                <td class="text-right">{{ item.quantity }}</td>
                                <td class="text-right">{{ item.harga }}</td>
                            </tr>
                            <tr>
                                <td class="text-right font-bold" colspan="2">
                                    Price
                                </td>
                                <td class="text-right font-bold">
                                    {{ formatCurrency(totalPrice) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right font-bold" colspan="2">
                                    Discount
                                </td>
                                <td class="text-right font-bold">
                                    {{ discount }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right font-bold" colspan="2">
                                    Total Payment
                                </td>
                                <td class="text-right font-bold">
                                    {{ formatCurrency(totalPayment) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination, Scrollbar, A11y } from "swiper/modules";
import ButtonSwiper from "./ComponentSwiper/Button.vue";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/scrollbar";

export default {
    components: {
        Swiper,
        SwiperSlide,
        ButtonSwiper,
    },
    setup() {
        const onSwiper = (swiper) => {
            console.log(swiper);
        };
        const onSlideChange = () => {
            console.log("slide change");
        };
        return {
            onSwiper,
            onSlideChange,
            modules: [Navigation, Pagination, Scrollbar, A11y],
        };
    },
    data() {
        return {
            orders: [
                { id: 1, number: "#12233", items: 4, status: "Ready to Serve" },
                { id: 2, number: "#12234", items: 3, status: "In Progress" },
                { id: 3, number: "#12235", items: 2, status: "Ready to Serve" },
                { id: 4, number: "#12235", items: 2, status: "Ready to Serve" },
            ],
            products: [
                {
                    id: 1,
                    name: "Shoes",
                    image: "https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg",
                    harga: 20,
                },
                {
                    id: 2,
                    name: "T-shirt",
                    image: "https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg",
                    harga: 15,
                },
                {
                    id: 4,
                    name: "T-shirt",
                    image: "https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg",
                    harga: 70,
                },
                {
                    id: 3,
                    name: "T-shirt",
                    image: "https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg",
                    harga: 200000,
                },
            ],
            orderedItems: [],
            discount: 0,
        };
    },
    methods: {
        addToCart(product) {
            const orderedItemIndex = this.orderedItems.findIndex(
                (item) => item.id === product.id
            );

            if (orderedItemIndex !== -1) {
                this.orderedItems[orderedItemIndex].quantity++;
            } else {
                this.orderedItems.push({
                    id: product.id,
                    name: product.name,
                    quantity: 1,
                    harga: product.harga,
                });
            }
        },
        decreaseQuantity(product) {
            const orderedItem = this.orderedItems.find(
                (item) => item.id === product.id
            );
            if (orderedItem && orderedItem.quantity > 0) {
                orderedItem.quantity--;
                if (orderedItem.quantity === 0) {
                    this.removeFromCart(product);
                }
            }
        },
        removeFromCart(product) {
            this.orderedItems = this.orderedItems.filter(
                (item) => item.id !== product.id
            );
        },
        productAdded(product) {
            return this.orderedItems.some((item) => item.id === product.id);
        },
        handleCartAction(product) {
            if (this.productAdded(product)) {
                const orderedItem = this.orderedItems.find(
                    (item) => item.id === product.id
                );
                if (orderedItem.quantity > 0) {
                    this.decreaseQuantity(product);
                } else {
                    this.removeFromCart(product);
                }
            } else {
                this.addToCart(product);
            }
        },
        cartButtonLabel(product) {
            if (this.productAdded(product)) {
                const orderedItem = this.orderedItems.find(
                    (item) => item.id === product.id
                );
                if (orderedItem.quantity === 0) {
                    return "Add Item";
                } else {
                    return "Mines";
                }
            } else {
                return "Add Item";
            }
        },
        formatCurrency(value) {
            // Lakukan pemformatan ke format mata uang rupiah (Rp)
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(value);
        },
    },
    computed: {
        totalPrice() {
            return this.orderedItems.reduce(
                (acc, item) => acc + item.harga * item.quantity,
                0
            );
        },

        totalPayment() {
            return this.totalPrice - this.discount;
        },
    },
};
</script>

<style scoped>
/* Tambahkan gaya sesuai kebutuhan Anda */
</style>
