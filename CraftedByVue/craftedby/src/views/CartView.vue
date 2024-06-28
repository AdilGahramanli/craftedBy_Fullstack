<script setup>
import { useCartStore } from '@/stores/cart.js'
const cartStore = useCartStore()
</script>

<template>
  <div class="min-h-screen bg-rose-peau p-8">
    <h2 class="text-3xl font-bold text-center mb-8">Mon panier</h2>
    <ul class="max-w-4xl mx-auto space-y-4">
      <li v-for="(product, index) in cartStore.getAllCartProductsToString" :key="index" class="p-4 bg-white border-2 border-rose-peau rounded-md flex justify-between items-center">
        <div>
          <p class="text-xl font-semibold">{{ product.name }}</p>
          <p class="text-gray-500">{{ product.price }} €</p>
        </div>
        <button class="px-4 py-2 bg-red-500 text-white rounded-md" @click="cartStore.removeFromCart(index)">Remove</button>
      </li>
    </ul>
    <div class="max-w-4xl mx-auto mt-8 p-4 bg-white border-2 border-rose-peau rounded-md">
      <p class="text-xl font-semibold">Total prix: {{ cartStore.getTotalPrice }} €</p>
      <router-link to="/payment">
        <button class="mt-4 w-full py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">Check out</button>
      </router-link>
    </div>
  </div>
</template>

<style scoped>
.bg-rose-peau {
  background-color: #f06292; /* Adjust this color to match your design */
}
</style>
