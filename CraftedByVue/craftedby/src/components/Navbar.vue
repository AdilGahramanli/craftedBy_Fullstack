<script setup>
// import { useFetch } from '@vueuse/core'
// const { data: navbar } = useFetch('https://fakestoreapi.com/products?limit=21').json()
</script>

<template>
  <!-- Add a cart -->
  <div class="navbar bg-rose-peau h-20 w-full flex items-center px-4 shadow-md">
    <router-link to="/" class="flex items-center justify-center">
      <img alt="Vue logo" class="logo h-full p-2 bg-white rounded-md shadow-md" src="@/assets/logo.svg" />
    </router-link>

    <div class="flex-1 flex items-center justify-center relative mx-4">
      <div class="form-control flex items-center">
        <input
            type="text"
            placeholder="Search"
            class="input input-bordered w-24 md:w-48 bg-fond p-2 rounded-md transition-all duration-300 ease-in-out"
        />
      </div>
    </div>

    <div class="flex items-center">
      <router-link to="/cart" class="mr-4 flex items-center justify-center">
        <img class="w-10 h-10" src="../assets/cartlogo.png" />
      </router-link>
      <details class="dropdown">
        <summary class="m-1 cursor-pointer flex items-center justify-center">
          <img src="../assets/menu.svg" class="w-10 h-10" />
        </summary>
        <ul class="p-2 shadow menu dropdown-content z-10 bg-base-100 rounded-box w-52">
          <li><router-link to="/">Accueil</router-link></li>
          <li><router-link to="/account">Mon profil</router-link></li>
          <li><router-link to="/cart">Mon panier</router-link></li>
          <li><router-link to="/products">Les produits</router-link></li>
          <li><router-link to="/register">Register</router-link></li>
          <li><router-link to="/login">Login</router-link></li>
        </ul>
      </details>
    </div>
  </div>
</template>

<style scoped>
.bg-rose-peau {
  background-color: #ffc6b9; /* Adjust this color to match your design */
}
.bg-fond {
  background-color: #f8f8f8;
}
.shadow-md {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.input-bordered {
  border: 1px solid #ccc;
}
.logo {
  max-height: 100%;
}
</style>
