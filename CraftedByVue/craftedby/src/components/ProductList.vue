
<template>
  <div  class="p-12">
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Loop through each product in the stores array and render a list item -->
      <li v-for="product in  stores" :key="product.id" class="store col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
                <div class="card-body border-solid hover:border-2 hover:shadow-lg m-2 w-30 box-border">
                  <h2 class="card-title text-3xl text-center box-border">{{ product.name }}</h2>
                  <figure class="w-32"><img  :src="product.image" alt="image of product"></figure>
                  <p class="text-center box-border">{{ product.description }}</p>
                  <p class="text-center box-border"><strong>Category:</strong> {{ product.category }}</p>
                  <p class="text-center box-border"><strong>Price:</strong> {{ product.price }} €</p>
                  <div class="grid grid-cols-2 items-center align-baseline">
                    <button class="btn btn-primary bg-gray-300 self-center box-border mx-5" @click="cartStore.addToCart(product)">
                        Add to Cart
                      </button>
                        <button class=" border-solid bg-emerald-300 self-center box-border mx-5">
                          <RouterLink :to="`/products/${product.id}`">View Details</RouterLink>
                        </button>

                  </div>
  </div>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useCartStore } from '@/stores/cart'

let cartStore = useCartStore();
// Defining a reactive variable 'stores' to hold the product data
    const stores = ref([]);
// Lifecycle hook to fetch data when the component is mounted
onMounted(() => {
      fetch('http://127.0.0.1:8000/api/products')
        .then(response => response.json())
        .then(data => {console.log('data', data)
          stores.value = data;
        })
        .catch(error => {
          console.error("There was an error!", error);
        });
    });

</script>
