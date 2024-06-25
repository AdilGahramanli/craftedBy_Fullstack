<script setup>
// enlever un article de la liste
// import {} from {"../stores/cart.js"}
import {useCartStore} from '@/stores/cart.js'
const cartStore = useCartStore()
// const total = 0;



</script>

<template>
  <h2>Mon panier</h2>
  <ul>
    <li v-for="(product, index) in cartStore.getAllCartProductsToString" :key="index" class="w-200 border-2">
      <p>{{ product.id }} - {{ product.name }} - {{ product.price }} € </p>
      <p>Total prix: {{cartStore.getTotalPrice}}</p>
      <button class="border-2 bg-red-500" @click="cartStore.removeFromCart(index)">Remove</button>
    </li>
<!--    <p>Votre panier contient {{cartStore.getTotalQuantity}} produits.</p>-->
<!--        <p class="text-xl">{{ // getTotalPrice({{ product }}) }}</p>-->
  </ul>


<!--        <RouterLink to="/payment"><button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button></RouterLink>-->
<!--  {{cartStore.getAllCartProductsToString()}}-->
</template>

