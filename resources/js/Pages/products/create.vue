<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { reactive } from 'vue'
import route from '../../../../vendor/tightenco/ziggy/src/js';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';
 
</script>

<template>
    <AppLayout title="Create product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              <span class="text-emerald-600">Create Product 
                   </span>   
            </h2>
        </template>
       <!--<jet-validation-errors />-->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg">


                   <div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-2 md:gap-6">
      
      <div class="mt-5 md:mt-0 md:col-span-2">

        <div   >
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-gray-700 sm:p-6 text-gray-200">
              <div class="grid grid-cols-6 gap-6 text-gray-200">

                <div class="col-span-6 sm:col-span-6 lg:col-span-2"> 
                  <label   class="block text-sm font-medium text-gray-200">Product name</label>
                  <input type="text" v-model="product.name" name="name" id="city"   class="mt-1 focus:ring-emerald-500 focus:border-emerald-500 block w-full shadow-sm sm:text-sm bg-gray-700 border-gray-300 rounded-md" />
                 <p class="text-red-500">{{$page.props.errors.name}}</p> 
               </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label   class="block text-sm font-medium text-gray-200">Price </label>
                  <input type="number" min="1" v-model="product.price" name="price" id="region"     class="mt-1 focus:ring-emerald-500 focus:border-emerald-500 block w-full shadow-sm bg-gray-700 sm:text-sm border-gray-300 rounded-md" />
                  <p class="text-red-500">{{$page.props.errors.price}}</p> 
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label   class="block text-sm font-medium text-gray-200">categories</label>
 
                <select 
                name="category_id"
                v-model="product.category_id"
                id="category_id"
                autocomplete="country-name" 
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 bg-gray-700 focus:border-emerald-500 sm:text-sm">

                <option value="" select disabled>Categories</option>
                <option
                v-for="category in categories"
                :key="'category' + categories.id"
                :value="category.id"
                >
                {{ category.name }}
                </option>


                </select>
                  <p class="text-red-500">{{$page.props.errors.category_id}}</p> 
                </div>
              </div>

               <div class="mt-4">
                <label  class="block text-sm font-medium text-gray-200">Description</label>
                <div class="mt-1">
                  <textarea id="about" v-model="product.description"  name="description"   rows="3" class="shadow-sm focus:ring-emerald-500 bg-gray-700 focus:border-emerald-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="product description" />
                </div> 
                  <p class="text-red-500">{{$page.props.errors.description}}</p> 
                <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
              </div>



            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6  bg-gray-700">
              <button   @click="store" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
                    
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>


  export default {

    data() {
       return {
        product: {
        name: "",
        price:"",
        description: "",
        category_id: "",
        },
      };
    },

    components:[
       JetValidationErrors
    ],
    
    props :{
         categories :Object
    },

    methods:{
        store() {
          
            this.$inertia.post(this.route('products.store', this.product))
        }
    }

    
  }

</script>