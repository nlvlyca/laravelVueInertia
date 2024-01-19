<template>
  <Bar id="my-chart-id" :options="chartOptions" :data="chartData" />
</template>
<script>
import { Bar } from "vue-chartjs";
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
} from "chart.js";
ChartJS.register(
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale
);
export default {
  name: "BarChart",
  components: { Bar },
  props: {
    dataFromDB: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      chartData: {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        datasets: [
          {
            label: "Total Users Created",
            backgroundColor: "#f87979",
            data: [],
          },
        ],
      },
      chartOptions: {
        responsive: true,
      },
    };
  },
  watch: {
    dataFromDB: {
      handler(val) {
        if (val) {
          this.chartData.datasets[0] = {
            label: "Total Users Created",
            backgroundColor: "#46D25C",
            data: val.usd,
          };
          this.chartData.datasets[1] = {
            label: "Total Announcement Made",
            backgroundColor: "#006479",
            data: val.and,
          };
        }
      },
      immediate: true,
    },
  },
};
</script>
<script setup>
</script>

