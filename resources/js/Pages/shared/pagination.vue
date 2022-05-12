<script setup>

import { Head, Link } from '@inertiajs/inertia-vue3';
 

</script>

<template>
  <div class="bg-gray-900 px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
  <div class="flex-1 flex justify-between sm:hidden">
    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
  </div>
  <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
    <div>
      <p class="text-sm text-gray-700">
        Showing
        <span class="font-medium">1</span>
        to
        <span class="font-medium">10</span>
        of
        <span class="font-medium">97</span>
        results
      </p>
    </div>
    <div>
      <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px bg-gray-700" aria-label="Pagination">

 
          
        

         <template v-for="(link, key) in pagination.links">
               <div 
               :key="key" 
               v-if="link.url == null"  
               v-html="link.label" 
               class="bg-gray-700 text-gray-200 border-gray-300 text-gray-500 hover:bg-gray-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">

               </div>

               <Link :key="'link-' + key" 
               v-else 
               :href="link.url" 
               class=" cursor-pointer bg-gray-700 text-gray-200 border-gray-300 text-gray-500 hover:bg-gray-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium"
               v-html="link.label" 
               :class="link.active  ? 'z-10 bg-indigo-50 border-emerald-400 text-emerald-500 relative inline-flex items-center px-4 py-2 border text-sm font-medium': 'bg-white border-gray-300'"
                >
                </Link>
          </template>


        
        
      </nav>
    </div>
  </div>
</div>
</template>

<script >

export default {

    components: [
       Link 
    ],
      props:{
          pagination: Object,
      }
}
</script>

<style>

</style>