<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Pagination from "../shared/pagination.vue";
import Input from "@/Jetstream/Input.vue";
import pickBy from "lodash/pickBy";

</script>

<template>
  <AppLayout title="Products"  >

  <header class="bg-gray-900 shadow">

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between">
         <h1 class=" text-xl    font-semibold text-emerald-500">Products</h1>
<div class="text-sm">
   <Link
            :href="route('products.create')"
            class="
              inline-flex
              justify-center
              py-2
              px-4
              border border-transparent
              shadow-sm
              text-sm
              font-medium
              rounded-md
              text-white
              bg-emerald-600
              hover:bg-emerald-700
              focus:outline-none
              focus:ring-2
              focus:ring-offset-2
              focus:ring-emerald-500
            "
          >
            New product
          </Link>
</div>
      </div>
     </div>
    
  </header>



     

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-xl sm:rounded-lg">

          <div>
           
        <section class="relative w-full max-w-md px-5 py-4 mx-auto rounded-md">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                        <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>
 
                <input type="text" v-model="search" class="w-full py-3 pl-10 pr-4 text-gray-200 bg-gray-700 border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-emerald-500 dark:focus:border-emerald-500 focus:outline-none focus:ring" placeholder="Search">
            </div>

             
        </section>

          </div>

          <table
            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
          >
            <thead
              class="
                text-xs text-gray-200
                uppercase
                bg-gray-900
                dark:bg-gray-200 dark:text-gray-400
              "
            >
              <tr>
                <th scope="col" class="px-6 py-3">Product name</th>
                <th scope="col" class="px-6 py-3">Description</th>
                <th scope="col" class="px-6 py-3">Category</th>
                <th scope="col" class="px-6 py-3">Price</th>
                <th scope="col" class="px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="product in products.data"
                :key="product.id"
                class="
                  bg-gray-700
                  border-b
                  dark:bg-gray-800
                  border-gray-900
                  hover:bg-gray-600
                  dark:hover:bg-gray-600
                "
              >
                <th
                  scope="row"
                  class="
                    px-6
                    py-4
                    font-medium
                    text-gray-200
                    dark:text-white
                    whitespace-nowrap
                  "
                >
                  {{ product.name }}
                </th>
                <td class="px-6 py-4 text-gray-200">
                  {{ product.description }}
                </td>
                <td class="px-6 py-4 text-gray-200">
                  {{ product.category.name }}
                </td>
                <td class="px-6 py-4 text-gray-200">
                  {{ product.price }}
                </td>
                <td class="px-6 py-4 text-right">
                  <Link
                    :href="route('products.edit', product)"
                    class="
                      font-medium
                      text-emerald-500
                      dark:text-blue-500
                      hover:underline
                      cursor-pointer
                    "
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-6 w-6"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                      />
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                      />
                    </svg>
                  </Link>
                </td>
              </tr>
            </tbody>
          </table>

          <Pagination :pagination="products" />
        </div>
      </div>
    </div>

      
  </AppLayout>
  
</template>


<script>
export default {
  components: [Pagination, Input],

   
   data() {
     return {
       search: this.filters.search,
     }
   },

  props: {
    products: [],
    filters: Object
     
      
  },

  watch:{
    search($value){
         this.$inertia.get('/products', pickBy({search : $value }), {preserveState : true}) 
    }
  }
 
};

</script>

