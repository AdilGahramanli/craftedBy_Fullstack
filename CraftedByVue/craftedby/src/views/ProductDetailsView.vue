<script setup>

import { useRoute } from 'vue-router'
import {ref} from 'vue'
import {useCartStore} from '@/stores/cart.js'


const cartStore = useCartStore()
// Gets access to the current route to extract route parameters
const route = useRoute()
// Defines a reactive variable to store the selected product details
const productSelected=ref(null)
// Extracts the product ID from the route parameters
const productId =  route.params.id
  // Fetches product details from the API based on the product ID and stores it in the reactive variable
fetch(`https://fakestoreapi.com/products/${productId}`)
  .then(res=>res.json())
  .then(json=>productSelected.value=json)

</script>

<template>
<!--  Displays the product details-->
          <h2 class="card-title text-3xl text-center box-border">{{ productSelected.title }}</h2>
          <figure class="w-32"><img  :src="productSelected.image" alt="image of product"></figure>
          <p class="text-center box-border">{{ productSelected.description }}</p>
          <p class="text-center box-border"><strong>Category:</strong> {{ productSelected.category }}</p>
          <p class="text-center box-border"><strong>Price:</strong> {{ productSelected.price }} €</p>
          <div class="grid grid-cols-2 items-center align-baseline">
            <button class="btn btn-primary bg-gray-300 self-center box-border mx-5" @click="cartStore.addToCart(productSelected)">
              Add to Cart
            </button>
            </div>


</template>

<style scoped>

</style>