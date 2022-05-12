<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Pagination from '../shared/pagination.vue'


</script>

<template>
    <AppLayout title="Products">
        <template #header>
			<div class="flex items-center justify-between">
				 <h2 class="flex items-center font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
			  <div class="text-sm"
			  >
             <Link :href="route('products.create')" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"> 
                   New product
			 </Link> 
            </div>


			 
      </div>

		 
		 
           


        </template>

        <div class="py-12  ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="  overflow-hidden shadow-xl sm:rounded-lg ">
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
				<thead class="text-xs text-gray-200 uppercase bg-gray-900 dark:bg-gray-200 dark:text-gray-400">
					<tr>
						
						<th scope="col" class="px-6 py-3">
							Product name
						</th>
						<th scope="col" class="px-6 py-3">
							Description
						</th>
						<th scope="col" class="px-6 py-3">
							Category
						</th>
						<th scope="col" class="px-6 py-3">
							Price
						</th>
						<th scope="col" class="px-6 py-3">
							<span class="sr-only">Edit</span>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="product in products.data" :key="product.id"
						class="bg-gray-700 border-b dark:bg-gray-800  border-gray-900 hover:bg-gray-600 dark:hover:bg-gray-600">
					
						<th scope="row" class="px-6 py-4 font-medium text-gray-200 dark:text-white whitespace-nowrap">
							{{product.name}}
						</th>
						<td class="px-6 py-4 text-gray-200">
							{{product.description}}
						</td>
						<td class="px-6 py-4 text-gray-200">
							{{product.category.name}}
						</td>
						<td class="px-6 py-4 text-gray-200">
							{{product.price}}
						</td>
						<td class="px-6 py-4 text-right">
                           
							 <Link :href="route('products.edit', product)" class="font-medium text-emerald-500 dark:text-blue-500 hover:underline cursor-pointer">
							 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
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
	  components : [
		  Pagination
	  ],

      props: {
      products:[],
      },

  }
 

</script>

