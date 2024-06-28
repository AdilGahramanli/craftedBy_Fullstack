<template>
  <div class="p-12 bg-fond">
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
      <li v-for="product in products" :key="product.id" class="store col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow hover:bg-gray-100">
        <div class="card-body border-solid hover:border-2 hover:shadow-lg m-2 w-full box-border">
          <h2 class="card-title text-3xl text-center box-border text-rose-peau">{{ product.name }}</h2>
          <figure class="w-full h-48 flex justify-center items-center overflow-hidden bg-gray-200">
            <img :src="product.image" alt="image of product" class="object-contain h-full">
          </figure>
          <p class="text-center box-border text-gray-700">{{ product.description }}</p>
          <p class="text-center box-border text-gray-700"><strong>Category:</strong> {{ product.category }}</p>
          <p class="text-center box-border text-gray-700"><strong>Price:</strong> {{ product.price }} €</p>
          <div class="grid grid-cols-2 items-center align-baseline mt-4">
            <button class="btn bg-rose-peau text-white self-center box-border mx-5 py-2 px-4 rounded" @click="cartStore.addToCart(product)">
              Add to Cart
            </button>
            <RouterLink :to="`/products/${product.id}`" class="text-center border-solid bg-emerald-300 text-white self-center box-border mx-5 py-2 px-4 rounded">
              View Details
            </RouterLink>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useCartStore } from '@/stores/cart';

const cartStore = useCartStore();
const products = ref([]);

onMounted(() => {
  fetch('http://127.0.0.1:8000/api/products')
      .then(response => response.json())
      .then(data => {
        console.log('data', data);
        products.value = data;
      })
      .catch(error => {
        console.error("There was an error!", error);
      });
});
</script>

<style scoped>
.bg-fond {
  background-color: #f8f8f8;
}
.text-rose-peau {
  color: #f06292; /* Adjust this color to match your design */
}
.bg-rose-peau {
  background-color: #f06292; /* Adjust this color to match your design */
}
</style>
