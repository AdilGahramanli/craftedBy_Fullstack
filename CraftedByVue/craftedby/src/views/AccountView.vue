<template>
  <div>
    <h1>Espace personnel</h1>

    <div class="w-full border-solid border-2">
      <h2>Informations personnelles</h2>
      <div v-if="authStore.user">
        <p>Name: {{ authStore.user.name }}</p>
        <p>Email: {{ authStore.user.email }}</p>
      </div>
      <div v-else>
        Loading...
      </div>
    </div>

    <div class="w-full border-solid border-2 mt-4">
      <h2>Mon panier</h2>
      <div v-if="cart.length">
        <ul class="h-40 overflow-y-scroll">
          <li v-for="(product, index) in cart" :key="index" class="border-2 p-2 mb-2">
            <p>{{ product.name }} - {{ product.price }} €</p>
            <button class="border-2 bg-red-500" @click="removeFromCart(index)">Remove</button>
          </li>
        </ul>
      </div>
      <div v-else>
        <p>Your cart is empty.</p>
      </div>
      <RouterLink to="/cart">
        <button class="mt-4 bg-blue-500 text-white p-2 rounded">Voir mon panier</button>
      </RouterLink>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useCartStore } from '@/stores/cart'
import { useAuthStore } from '@/stores/auth'

const cartStore = useCartStore()
const authStore = useAuthStore()
const cart = cartStore.cart

const fetchUserData = async () => {
  try {
    await authStore.fetchUser()
  } catch (error) {
    console.error('Failed to fetch user data:', error)
  }
}

const removeFromCart = (index) => {
  cartStore.removeFromCart(index)
}

onMounted(() => {
  fetchUserData()
})
</script>

<style scoped>
.bg-rose-peau {
  background-color: #f06292;
}
.bg-fond {
  background-color: #f8f8f8;
}
</style>





<!--<template>-->
<!--  <div>-->
<!--    <h1>Espace personnel</h1>-->

<!--    <div class="w-full border-solid border-2">-->
<!--      <h2>Informations personnelles</h2>-->
<!--      <div v-if="userSelected">-->
<!--        <p>Name: {{ userSelected.name }}</p>-->
<!--        <p>Email: {{ userSelected.email }}</p>-->
<!--      </div>-->
<!--      <div v-else>-->
<!--        Loading...-->
<!--      </div>-->
<!--    </div>-->

<!--    <div class="w-full border-solid border-2 mt-4">-->
<!--      <h2>Mon panier</h2>-->
<!--      <div v-if="cart.length">-->
<!--        <ul class="h-40 overflow-y-scroll">-->
<!--          <li v-for="(product, index) in cart" :key="index" class="border-2 p-2 mb-2">-->
<!--            <p>{{ product.name }} - {{ product.price }} €</p>-->
<!--            <button class="border-2 bg-red-500" @click="removeFromCart(index)">Remove</button>-->
<!--          </li>-->
<!--        </ul>-->
<!--      </div>-->
<!--      <div v-else>-->
<!--        <p>Your cart is empty.</p>-->
<!--      </div>-->
<!--      <RouterLink to="/cart">-->
<!--        <button class="mt-4 bg-blue-500 text-white p-2 rounded">Voir mon panier</button>-->
<!--      </RouterLink>-->
<!--    </div>-->
<!--  </div>-->
<!--</template>-->

<!--<script setup>-->
<!--import { ref, onMounted } from 'vue'-->
<!--import { useCartStore } from '@/stores/cart'-->
<!--import { useAuthStore } from '@/stores/auth'-->

<!--const userSelected = ref(null)-->
<!--const cartStore = useCartStore()-->
<!--const authStore = useAuthStore()-->
<!--const cart = cartStore.cart-->

<!--const fetchUserData = async () => {-->
<!--  try {-->
<!--    const response = await fetch('http://127.0.0.1:8000/api/user', {-->
<!--      method: 'GET',-->
<!--      headers: {-->
<!--        'Authorization': `Bearer ${authStore.token}`-->
<!--      }-->
<!--    });-->

<!--    if (!response.ok) {-->
<!--      throw new Error(`HTTP error! status: ${response.status}`);-->
<!--    }-->

<!--    userSelected.value = await response.json();-->
<!--  } catch (error) {-->
<!--    console.error('Failed to fetch user data:', error);-->
<!--  }-->
<!--}-->

<!--const removeFromCart = (index) => {-->
<!--  cartStore.removeFromCart(index)-->
<!--}-->

<!--onMounted(() => {-->
<!--  fetchUserData()-->
<!--})-->
<!--</script>-->

<!--<style scoped>-->
<!--.bg-rose-peau {-->
<!--  background-color: #f06292;-->
<!--}-->
<!--.bg-fond {-->
<!--  background-color: #f8f8f8;-->
<!--}-->
<!--</style>-->
