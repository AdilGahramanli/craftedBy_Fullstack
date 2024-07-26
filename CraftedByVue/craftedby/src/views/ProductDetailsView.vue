<script setup>
import { useRoute } from 'vue-router';
import { ref } from 'vue';
import { useCartStore } from '@/stores/cart.js';

const cartStore = useCartStore();
const route = useRoute();
const productSelected = ref(null);
const productId = route.params.id;

fetch(`https://api.gahramanli.devlog25.le-campus.eu/api/products/${productId}`)
    .then(res => res.json())
    .then(json => productSelected.value = json);
</script>

<template>
  <div class="product-details p-12 bg-fond">
    <h2 class="card-title text-5xl text-center box-border text-rose-peau mb-8">{{ productSelected.name }}</h2>
    <figure class="w-full h-96 flex justify-center items-center overflow-hidden bg-gray-200 mb-6">
      <img :src="productSelected.image" alt="image of product" class="object-contain h-full">
    </figure>
    <p class="text-center box-border text-gray-700 mb-4">{{ productSelected.description }}</p>
    <p class="text-center box-border text-gray-700 mb-4"><strong>Category:</strong> {{ productSelected.category }}</p>
    <p class="text-center box-border text-gray-700 mb-4"><strong>Price:</strong> {{ productSelected.price }} €</p>
    <div class="flex justify-center mt-8">
      <button class="btn bg-rose-peau text-white self-center box-border mx-5 py-2 px-4 rounded" @click="cartStore.addToCart(productSelected)">
        Add to Cart
      </button>
    </div>
  </div>
</template>

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
