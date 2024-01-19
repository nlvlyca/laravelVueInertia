<template>
  <div>
    <Head title="Home" />
    <div class="mb-7">
      <h1 class="text-3xl">Laravel Vue with Inertia</h1>
    </div>
    <div class="border rounded-lg px-5 flex-1 my-3">
      <div class="flex items-center justify-between mt-5 mx-5">
        <h1 class="text-xl font-bold items-center">Users</h1>
        <select
          v-model="year"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
          <option v-for="i in 5" :key="i" v-bind:value="2025 - i">
            {{ 2025 - i }}
          </option>
        </select>
      </div>
      <div class="px-5 pb-7">
        <BarChart
          :dataFromDB="$page.props.barGraphTotal"
          :yearSelected="year"
        />
      </div>
    </div>
    <div class="flex my-2 mb-5 gap-3">
      <div class="border rounded-lg px-5 flex-1">
        <h1 class="text-xl font-bold items-center mt-5 mx-5">Users</h1>
        <div class="px-2 py-5 mb-5">
          <PieChart :dataFromDB="$page.props.genderTotal" />
        </div>
      </div>
      <div class="border rounded-lg px-5 flex-1">
        <h1 class="text-xl font-bold items-center mt-5 mx-5">Users</h1>
        <div class="px-2 py-5 mb-5">
          <PieChart :dataFromDB="$page.props.genderTotal" />
        </div>
      </div>
    </div>
    <!-- <div>
      <h1 class="text-3xl">Hello World</h1>
      <hr class="my-4" />
      <div class="text-justify">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis mollitia
        ut possimus excepturi! Esse delectus repellat, tenetur accusamus est
        alias voluptatem quisquam earum aut dignissimos. Praesentium dolorem
        fugiat numquam cupiditate? Lorem ipsum, dolor sit amet consectetur
        adipisicing elit. Repellat dolorem iure perspiciatis molestias! Est
        totam exercitationem a iure amet ad voluptas accusamus iste ipsa
        debitis, ullam officiis quasi, laboriosam alias. Lorem ipsum dolor sit
        amet, consectetur adipisicing elit. Quia odio optio aut, esse deserunt
        libero expedita perferendis, rem sit ullam repudiandae repellendus?
        Recusandae maxime consectetur, velit at voluptate est incidunt.
      </div>
    </div>

    <div class="mt-8">
      <h1 class="text-3xl">Laravel Vue with Inertia</h1>
      <hr class="my-4" />
      <div class="text-justify">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis mollitia
        ut possimus excepturi! Esse delectus repellat, tenetur accusamus est
        alias voluptatem quisquam earum aut dignissimos. Praesentium dolorem
        fugiat numquam cupiditate? Lorem ipsum, dolor sit amet consectetur
        adipisicing elit. Repellat dolorem iure perspiciatis molestias! Est
        totam exercitationem a iure amet ad voluptas accusamus iste ipsa
        debitis, ullam officiis quasi, laboriosam alias. Lorem ipsum dolor sit
        amet, consectetur adipisicing elit. Quia odio optio aut, esse deserunt
        libero expedita perferendis, rem sit ullam repudiandae repellendus?
        Recusandae maxime consectetur, velit at voluptate est incidunt. Lorem
        ipsum dolor sit amet consectetur adipisicing elit. Aliquam ad repellat,
        consequuntur, recusandae ut obcaecati id maxime, odit libero fugit ex
        rerum quisquam repudiandae aperiam eligendi. Odio explicabo magnam ab?
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui
        praesentium vel nulla repudiandae, culpa veniam, iusto maxime labore,
        aut fugit autem non. Illum, totam sequi nesciunt sit quis dolorum odit.
      </div>
    </div>

    <div class="mt-8">
      <h1 class="text-3xl">Laravel Mix</h1>
      <hr class="my-4" />
      <div class="text-justify">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis mollitia
        ut possimus excepturi! Esse delectus repellat, tenetur accusamus est
        alias voluptatem quisquam earum aut dignissimos. Praesentium dolorem
        fugiat numquam cupiditate? Lorem ipsum, dolor sit amet consectetur
        adipisicing elit. Repellat dolorem iure perspiciatis molestias! Est
        totam exercitationem a iure amet ad voluptas accusamus iste ipsa
        debitis, ullam officiis quasi, laboriosam alias. Lorem ipsum dolor sit
        amet, consectetur adipisicing elit. Quia odio optio aut, esse deserunt
        libero expedita perferendis, rem sit ullam repudiandae repellendus?
        Recusandae maxime consectetur, velit at voluptate est incidunt.
      </div>
    </div> -->
  </div>
</template>
<script>
import BarChart from "./Charts/BarChart.vue";
import PieChart from "./Charts/PieChart.vue";
export default {
  name: "Home",
  components: { BarChart, PieChart },
  data() {
    return {
      year: "2024",
    };
  },
};
// import toast from "./Shared/toast";
// function addToast() {
//   toast.add({
//     message: "Hello from dashboard",
//   });
// }
</script>

