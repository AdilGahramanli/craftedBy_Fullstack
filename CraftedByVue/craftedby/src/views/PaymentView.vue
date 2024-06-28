<script setup>
import { useCartStore } from '@/stores/cart.js'
const cartStore = useCartStore()
</script>

<template>
  <div class="min-h-screen bg-rose-peau p-8">
    <h1 class="text-3xl font-bold text-center mb-8">Paiement</h1>
    <div class="max-w-4xl mx-auto bg-white p-8 border-2 border-rose-peau rounded-md">
      <h2 class="text-2xl font-semibold mb-4">Mon panier</h2>
      <ul class="space-y-4 mb-8">
        <li v-for="(product, index) in cartStore.getAllCartProductsToString" :key="index" class="p-4 bg-gray-100 border rounded-md flex justify-between items-center">
          <div>
            <p class="text-xl font-semibold">{{ product.name }}</p>
            <p class="text-gray-500">{{ product.price }} €</p>
          </div>
        </li>
      </ul>
      <div class="form-fields mb-4">
        <label for="adress" class="block text-lg font-medium mb-2">Adresse (si différente)</label>
        <input type="text" id="adress" name="adress" class="w-full p-2 border rounded-md"/>
      </div>
      <div class="form-fields mb-8">
        <label for="bankInfos" class="block text-lg font-medium mb-2">Informations bancaires</label>
        <input type="text" id="bankInfos" name="bankInfos" class="w-full p-2 border rounded-md"/>
      </div>
      <router-link to="/products">
        <button class="w-full py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">Payer</button>
      </router-link>
    </div>
  </div>
</template>

<style scoped>
.bg-rose-peau {
  background-color: #f06292; /* Adjust this color to match your design */
}
</style>
