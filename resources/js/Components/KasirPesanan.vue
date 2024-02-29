<template>
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
                            v-for="order in pesanan"
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
                                class="card-actions rounded-2xl text-accent-content justify-between px-2 py-0.5"
                                :class="{
                                    'bg-success': order.status === 2,
                                    'bg-info': order.status === 1,
                                    'bg-warning': order.status === 0,
                                }"
                            >
                                <div class="">
                                    <div>
                                        {{
                                            order.status === 0
                                                ? "Pesanan Pending"
                                                : order.status === 1
                                                ? "Pesanan Proses"
                                                : order.status === 2
                                                ? "Pesanan Done"
                                                : ""
                                        }}
                                    </div>
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
                <div class="flex items-center justify-between mb-4">
                    <h2 class="card-title">Menu</h2>
                    <div class="flex items-center space-x-2">
                        <!-- Search Bar -->
                        <input
                            type="text"
                            v-model="searchTerm"
                            placeholder="Search Menus"
                            class="input input-bordered w-full max-w-xs"
                        />
                        <!-- Dropdown Kategori -->
                        <div class="dropdown dropdown-bottom dropdown-end">
                            <div tabindex="0" role="button" class="btn m-1">
                                Kategori
                            </div>
                            <ul
                                tabindex="0"
                                class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52"
                            >
                                <li
                                    v-for="category in categories"
                                    :key="category.id"
                                >
                                    <a @click="selectCategory(category)">
                                        {{ category.nama_kategori }}
                                    </a>
                                </li>
                                <li>
                                    <a @click="selectedCategory = null"
                                        >Semua Kategori</a
                                    >
                                </li>
                            </ul>
                        </div>

                        <!-- Tombol Reset -->
                        <button
                            class="btn btn-neutral"
                            @click="resetOrderedItems"
                        >
                            Reset
                        </button>
                    </div>
                </div>

                <div class="flex flex-wrap justify-center">
                    <div
                        class="card card-compact w-64 lg:w-44 bg-base-100 shadow-xl m-2"
                        v-for="product in paginatedMenus"
                        :key="product.id"
                    >
                        <figure>
                            <img
                                :src="getImageUrl(product.img_menu)"
                                :alt="product.nama_menu"
                                class="w-full h-30 object-cover"
                            />
                        </figure>
                        <div class="card-body items-center text-center">
                            <h2 class="card-title">
                                {{ product.nama_menu }}
                            </h2>
                            <span class="text-sm text-neutral">{{
                                formatCurrency(product.harga_menu)
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
                <div class="flex justify-center mt-4">
                    <button
                        @click="currentPage--"
                        :disabled="currentPage === 1"
                    >
                        Previous
                    </button>
                    <span class="mx-2"
                        >{{ currentPage }} / {{ totalPages }}</span
                    >
                    <button
                        @click="currentPage++"
                        :disabled="currentPage === totalPages"
                    >
                        Next
                    </button>
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
                        <tr v-for="(item, index) in orderedItems" :key="index">
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
                                <select
                                    v-model="selectedDiscount"
                                    class="select w-full max-w-xs"
                                >
                                    <option value="">Pilih Diskon</option>
                                    <option
                                        v-for="discount in discounts"
                                        :value="discount.id"
                                        :disabled="isDisabled(discount)"
                                    >
                                        {{ discount.name }} -
                                        {{ discount.value }}
                                    </option>
                                </select>
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
                    <button class="btn btn-primary" @click="showModal = true">
                        Payment
                    </button>

                    <vue-basic-alert
                        :duration="300"
                        :closeIn="3000"
                        ref="alert"
                    />
                </div>

                <Teleport to="body">
                    <!-- use the modal component, pass in the prop -->
                    <ModalKasir
                        :show="showModal"
                        :isLoading="loadingModal"
                        @close="showModal = false"
                        @yes="processPayment"
                    >
                        <template #header>
                            <h1 class="text-xl text-base-content">
                                Nama Pembeli
                            </h1>
                        </template>
                        <template #body>
                            <input
                                v-model="buyerName"
                                type="text"
                                placeholder="Type here"
                                class="input input-bordered w-full max-w-xs"
                            />
                        </template>
                    </ModalKasir>
                </Teleport>
            </div>
        </div>
    </div>
    <!-- ini nanti buat dua komponen vue terus untuk yang dibawah dibuat detail vue menggunakan form splade dan itu bisa di kirim ke controller -->
</template>

<script>
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination, Scrollbar, A11y } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import VueBasicAlert from "vue-basic-alert";
import ButtonSwiper from "./ComponentSwiper/Button.vue";
import ModalKasir from "./ModalVueKasir/ModalName.vue";

export default {
    components: {
        Swiper,
        SwiperSlide,
        ButtonSwiper,
        VueBasicAlert,
        ModalKasir,
    },
    props: {
        menus: {
            type: Array,
            required: true,
        },
        discounts: {
            type: Array,
            required: true,
        },
        categories: {
            type: Array,
            required: true,
        },
        pesanan: {
            type: Array,
            required: true,
        },
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
            orderedItems: [],
            selectedDiscount: null,
            showModal: false,
            loadingModal: false,
            buyerName: "",
            searchTerm: "",
            selectedCategory: null,
            currentPage: 1,
            itemsPerPage: 6,
        };
    },
    methods: {
        selectCategory(category) {
            this.selectedCategory = category.nama_kategori; // Mengatur kategori yang dipilih
            this.currentPage = 1; // Mengatur halaman kembali ke halaman pertama setelah memilih kategori
        },
        resetOrderedItems() {
            // console.log(this.categories);
            // console.log(this.selectedCategory);
            // console.log(this.menus);
            this.orderedItems = [];
        },
        isDisabled(discount) {
            // Periksa apakah total harga lebih kecil dari min_purchase_amount dari diskon
            return this.totalPrice < discount.min_purchase_amount;
        },
        getImageUrl(imageName) {
            return `/storage/menu_img/${imageName}`;
        },
        addToCart(product) {
            const orderedItemIndex = this.orderedItems.findIndex(
                (item) => item.id === product.id
            );

            if (orderedItemIndex !== -1) {
                this.orderedItems[orderedItemIndex].quantity++;
            } else {
                this.orderedItems.push({
                    id: product.id,
                    name: product.nama_menu, // Ubah dari product.name menjadi product.nama_menu
                    quantity: 1,
                    harga: product.harga_menu, // Ubah dari product.harga menjadi product.harga_menu
                    img: product.img_menu, // Tambahkan properti img
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
        processPayment() {
            if (!this.buyerName.trim()) {
                this.$refs.alert.showAlert(
                    "warning",
                    "Nama Pembeli Tidak Boleh kosong",
                    "Peringatan",
                    {
                        iconSize: 35,
                        iconType: "regular",
                        position: "top right",
                    }
                );
                return; // Berhenti proses pembayaran jika validasi gagal
            }
            if (!this.orderedItems.length) {
                // Jika tidak ada item yang dipilih, tampilkan pesan kesalahan
                this.$refs.alert.showAlert(
                    "warning",
                    "Items belum di tambahkan",
                    "Peringatan",
                    {
                        iconSize: 35,
                        iconType: "regular",
                        position: "top right",
                    }
                );
                return;
            }
            const selectedDiscount = this.discounts.find(
                (discount) => discount.id === this.selectedDiscount
            );
            if (selectedDiscount && this.isDisabled(selectedDiscount)) {
                this.$refs.alert.showAlert(
                    "warning",
                    "Diskon Tidak Memenuhi syarat minimum pembelian",
                    "Peringatan Diskon",
                    {
                        iconSize: 35,
                        iconType: "regular",
                        position: "top right",
                    }
                );
                return;
            }
            // console.log(
            //     this.orderedItems,
            //     this.totalPayment,
            //     selectedDiscount,
            //     this.totalDiscount
            // );
            this.loadingModal = true;
            const paymentData = {
                name: this.buyerName,
                orderedItems: this.orderedItems,
                totalPayment: this.totalPayment,
                selectedDiscount: selectedDiscount,
                totalDiscount: this.totalDiscount,
            };

            axios
                .post("/kasir", paymentData)
                .then((response) => {
                    this.$splade.visit("/kasir");
                    this.$refs.alert.showAlert(
                        "success",
                        response.data.message,
                        "Payment Berhasil",
                        {
                            iconSize: 35,
                            iconType: "regular",
                            position: "top right",
                        }
                    );
                    this.showModal = false;
                    this.loadingModal = false;
                    console.log(response.data);
                })
                .catch((error) => {
                    // Handle kesalahan jika terjadi
                    console.error(error);
                    this.loadingModal = false;
                    this.showModal = false;
                    this.$refs.alert.showAlert(
                        "error",
                        "Payment gagal! Silakan coba lagi.",
                        "Peringatan Payment",
                        {
                            iconSize: 35,
                            iconType: "regular",
                            position: "top right",
                        }
                    );
                });
        },
    },
    computed: {
        filteredMenus() {
            let filtered = this.menus;

            // Filter berdasarkan kategori yang dipilih
            if (this.selectedCategory) {
                filtered = filtered.filter((menu) => {
                    return (
                        menu.kategori.nama_kategori === this.selectedCategory
                    );
                });
            }

            // Filter berdasarkan pencarian
            if (this.searchTerm) {
                const searchTermLower = this.searchTerm.toLowerCase();
                filtered = filtered.filter((menu) => {
                    return menu.nama_menu
                        .toLowerCase()
                        .includes(searchTermLower);
                });
            }

            return filtered;
        },
        paginatedMenus() {
            const startIndex = (this.currentPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return this.filteredMenus.slice(startIndex, endIndex);
        },
        totalPages() {
            return Math.ceil(this.filteredMenus.length / this.itemsPerPage);
        },
        totalPrice() {
            return this.orderedItems.reduce(
                (acc, item) => acc + item.harga * item.quantity,
                0
            );
        },
        totalDiscount() {
            // Jumlahkan diskon dari setiap item yang dipilih
            return this.orderedItems.reduce((total, item) => {
                // Cek apakah item memiliki diskon yang dipilih
                const selectedDiscount = this.discounts.find(
                    (discount) => discount.id === this.selectedDiscount
                );
                if (selectedDiscount) {
                    // Jika item memiliki diskon yang dipilih, tentukan jenis diskonnya
                    if (selectedDiscount.type === "percentage") {
                        // Jika jenis diskon adalah persentase, hitung diskon berdasarkan harga item dan persentase diskon
                        total +=
                            (item.harga *
                                item.quantity *
                                selectedDiscount.value) /
                            100;
                    } else if (selectedDiscount.type === "fixed") {
                        // Jika jenis diskon adalah nilai tetap, langsung tambahkan nilai diskon ke total
                        total += selectedDiscount.value;
                    }
                }
                // console.log(total);
                return total;
            }, 0);
        },
        totalPayment() {
            // Gunakan Math.max() untuk memastikan totalPayment tidak negatif
            return Math.max(this.totalPrice - this.totalDiscount, 0);
        },
    },
};
</script>

<style scoped>
/* Tambahkan gaya sesuai kebutuhan Anda */
</style>
