<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
</script>

<template>
  <AppLayout title="Dashboard">



 <header class="bg-gray-900 shadow">

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between">
         <h1 class=" text-xl    font-semibold text-gray-200">
           <span class="text-emerald-500">Edit Product / </span> {{ product.name }}
         </h1>
 
      </div>
     </div>
    
  </header>
    
     

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg">
          <div class="mt-10 sm:mt-0 bg-gray-700">
            <div class="md:grid md:grid-cols-2 md:gap-6">
              <div class="mt-5 md:mt-0 md:col-span-2">
                <div>
                  <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-gray-700 sm:p-6">
                      <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          <label class="block text-sm font-medium text-gray-200"
                            >Product name</label
                          >
                          <input
                            type="text"
                            name="city"
                            id="city"
                            v-model="form.name"
                            autocomplete="address-level2"
                            class="
                            bg-gray-700
                            text-gray-200
                              mt-1
                              focus:ring-emerald-500 focus:border-emerald-500
                              block
                              w-full
                              shadow-sm
                              sm:text-sm
                              border-gray-300
                              rounded-md
                            "
                          />
                          <p class="text-red-500">
                            {{ $page.props.errors.name }}
                          </p>
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <label class="block text-sm font-medium text-gray-200"
                            >Price
                          </label>
                          <input
                            type="text"
                            name="region"
                            id="region"
                            v-model="form.price"
                            autocomplete="address-level1"
                            class="
                            bg-gray-700 text-gray-200
                              mt-1
                              focus:ring-emerald-500 focus:border-emerald-500
                              block
                              w-full
                              shadow-sm
                              sm:text-sm
                              border-gray-300
                              rounded-md
                            "
                          />
                          <p class="text-red-500">
                            {{ $page.props.errors.price }}
                          </p>
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <label class="block text-sm font-medium text-gray-200"
                            >categories</label
                          >

                          <select
                            v-model="form.category_id"
                            autocomplete="country-name"
                            class="
                            bg-gray-700 text-gray-200
                              mt-1
                              block
                              w-full
                              py-2
                              px-3
                              border border-gray-300
                              bg-white
                              rounded-md
                              shadow-sm
                              focus:outline-none
                              focus:ring-emerald-500
                              focus:border-emerald-500
                              sm:text-sm
                            "
                          >
                            <option value="" select disabled>Categories</option>
                            <option
                              v-for="category in categories"
                              :key="'category' + categories.id"
                              :value="category.id"
                            >
                              {{ category.name }}
                            </option>
                          </select>
                          <p class="text-red-500">
                            {{ $page.props.errors.category_id }}
                          </p>
                        </div>
                      </div>

                      <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-200"
                          >Description</label
                        >
                        <div class="mt-1">
                          <textarea
                            id="about"
                            name="about"
                            v-model="form.description"
                            rows="3"
                            class="
                            bg-gray-700 text-gray-200
                              shadow-sm
                              focus:ring-emerald-500 focus:border-emerald-500
                              mt-1
                              block
                              w-full
                              sm:text-sm
                              border border-gray-300
                              rounded-md
                            "
                            placeholder="product description"
                          />
                        </div>
                        <p class="text-red-500">
                          {{ $page.props.errors.description }}
                        </p>
                        <p class="mt-2 text-sm text-gray-200">
                          Brief description for your profile. URLs are
                          hyperlinked.
                        </p>
                      </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 bg-gray-700">
                      <div
                        class="flex items-center justify-between bg-gray-700"
                      >
                        <h2
                          class="
                            flex
                            items-center
                            font-semibold
                            text-xl text-gray-200
                            leading-tight
                            bg-gray-700
                          "
                        >
                          <button
                            @click="delet"
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
                              bg-red-600
                              hover:bg-red-700
                              focus:outline-none
                              focus:ring-2
                              focus:ring-offset-2
                              focus:ring-red-500
                            "
                          >
                            Delete
                          </button>
                        </h2>
                        <div class="text-sm">
                          <button
                            @click="update"
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
                            Edit
                          </button>
                        </div>
                      </div>
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
      form: this.product,
    };
  },
  props: {
    product: Object,
    categories: Object,
  },

  components: [JetValidationErrors],

  methods: {
    update() {
      //this.$inertia.put(this.route('products.update', this.product), this.form);
      this.$inertia
        .form(this.form)
        .put(this.route("products.update", this.product));
      console.log(this.form);
    },

    delet() {
      this.$inertia.delete(this.route("products.destroy", this.product));
    },
  },
};
</script>