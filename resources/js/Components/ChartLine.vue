<template>
    <div>
        <apexchart width="500" type="line" :options="chartOptions" :series="series"></apexchart>
    </div>
  </template>

  <script>
  import VueApexCharts from 'vue3-apexcharts';

  export default {
    components: {
      apexchart: VueApexCharts,
    },
    props: {
        pesanan_bulan: {
            type: Array,
            required: true,
        },
    },
    data() {
        console.log(this.pesanan_bulan);
      return {
        chartOptions: {
          chart: {
            id: "vuechart-ALAM",
          },
          xaxis: {
            categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998],
          },
        },
        series: [
          {
            name: "series-1",
            data: [30, 40, 35, 50, 49, 60, 70, 91],
          },
        ],
      };
    },

  };
  </script>
