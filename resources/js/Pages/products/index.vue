<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
  import { Head, Link } from '@inertiajs/inertia-vue3';

</script>

<template>
    <AppLayout title="Products">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Productos
            </h2>
        </template>

        <div class="py-12  ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="  overflow-hidden shadow-xl sm:rounded-lg ">
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
				<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
					<tr v-for="product in products" :key="product.id"
						class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
					
						<th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
							{{product.name}}
						</th>
						<td class="px-6 py-4">
							{{product.description}}
						</td>
						<td class="px-6 py-4">
							{{product.category.name}}
						</td>
						<td class="px-6 py-4">
							{{product.price}}
						</td>
						<td class="px-6 py-4 text-right">
                           
							<a class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">Edit</a>
						</td>
					</tr>
					 
				</tbody>
			</table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>


<script>
  

  export default {
    props: {
     products:[],
    },
  }

</script>

