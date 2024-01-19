<template>
  <Pie :data="data" :options="options" />
</template>
<script>
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from "chart.js";
import { Pie } from "vue-chartjs";
ChartJS.register(ArcElement, Tooltip, Legend);
export default {
  name: "PieChart",
  components: { Pie },
  props: {
    dataFromDB: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      data: {
        labels: ["Male", "Female"],
        datasets: [
          {
            backgroundColor: ["#41B883", "#E46651"],
            data: [],
          },
        ],
      },
      options: {
        responsive: true,
      },
    };
  },
  watch: {
    dataFromDB: {
      handler(val) {
        this.data.datasets[0].data = val;
      },
      immediate: true,
    },
  },
};
</script>