<script setup>
// import { useFetch } from '@vueuse/core'
// const { data: navbar } = useFetch('https://fakestoreapi.com/products?limit=21').json()
</script>

<template>
<!--  Ajouter un caddie-->

  <div class="navbar bg-rose-peau h-20 w-full grid grid-cols-7">
    <div class="w-full">

    </div>
    <router-link to="/"><div class="navbar-start w-3/4">
      <img alt="Vue logo" class="logo w-full" src="@/assets/logo.svg" />
    </div></router-link>
    <div class="w-full">

    </div>

    <div class="navbar-center w-full">
      <div class="form-control grid grid-cols-2" >
        <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto bg-fond" />
        <button class="btn btn-ghost btn-circle ">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 bg-fond" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
        </button>
      </div>
    </div>

    <div class="w-full">
      <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
        <div class="card-body">
          <div class="card-actions">
            <RouterLink to="/cart"><img class="w-10 h-10" src="../assets/cartlogo.png"></RouterLink>
          </div>
        </div>
    </div>
    </div>

    <div class="navbar-end">
      <details class="dropdown">
        <summary class="m-1">
          <img src="../assets/menu.svg" class="w-10 h-10">
        </summary>
        <ul class="p-2 shadow menu dropdown-content z-10 bg-base-100 rounded-box w-52">
          <li><RouterLink to="/"><a>Accueil</a></RouterLink></li>
          <li><RouterLink to="/account"><a>Mon profil</a></RouterLink></li>
          <li><RouterLink to="/cart"><a>Mon panier</a></RouterLink></li>
          <li><RouterLink to="/products"><a>Les produits</a></RouterLink></li>
        </ul>
      </details>
    </div>
    <div class="w-full">

    </div>
  </div>
</template>

<style scoped>

</style>