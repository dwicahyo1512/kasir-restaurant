<template>
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

                </table>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        discounts: {
            type: Array,
            required: true,
        },

    },
    setup() {
        const onSlideChange = () => {
            console.log(orderedItems);
        };
        return {
            onSlideChange,
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
            orderedItems: [],
            selectedDiscount: null,
        };
    },
    methods: {
        isDisabled(discount) {
            // Periksa apakah total harga lebih kecil dari min_purchase_amount dari diskon
            return this.totalPrice < discount.min_purchase_amount;
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
};
</script>
