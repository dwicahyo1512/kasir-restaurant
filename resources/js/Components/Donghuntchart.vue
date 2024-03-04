<template>
    <div>
        <apexchart
            width="750"
            type="bar"
            :options="chartOptions"
            :series="series"
        ></apexchart>
        <!-- <button @click="handleButtonClick">Klik untuk console.log</button> -->
    </div>
</template>

<script>
import VueApexCharts from "vue3-apexcharts";

export default {
    components: {
        apexchart: VueApexCharts,
    },
    props: {
        totalPesananPerBulan: {
            type: Object,
            required: true,
        },
        totalBulanIni: {
            type: Number,
            required: true,
        },
    },
    data() {
        let monthNames = {
            1: "Januari",
            2: "Februari",
            3: "Maret",
            4: "April",
            5: "Mei",
            6: "Juni",
            7: "Juli",
            8: "Agustus",
            9: "September",
            10: "Oktober",
            11: "November",
            12: "Desember",
        };
        let categories = Object.values(monthNames);
        return {
            chartOptions: {
                chart: {
                    id: "vuechart-example",
                },
                xaxis: {
                    categories: categories,
                },
            },
            series: [
                {
                    name: "Total-Pesanan",
                    data: Object.values(this.totalPesananPerBulan),
                },
            ],
        };
    },
    methods: {
        handleButtonClick() {
            console.log("Pesanan Bulan:", this.totalPesananPerBulan);
            console.log("Total Bulan Ini:", this.totalBulanIni);
        },
    },
};
</script>
