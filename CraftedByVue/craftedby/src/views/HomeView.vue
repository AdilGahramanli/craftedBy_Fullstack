<template>
  <div class="home-container min-h-screen bg-gray-100 p-8 flex items-center justify-center">
    <div class="grid grid-cols-2 gap-4">
      <router-link to="/" class="box h-80 w-80 border-2 bg-white border-rose-peau flex items-center justify-center transform transition-transform duration-200 hover:scale-110 z-10">
        <img src="../assets/images/welcome.webp" alt="Welcome" class="h-full w-full object-cover"/>
      </router-link>
      <router-link to="/store/:id" class="box h-80 w-80 border-2 bg-white border-rose-peau flex items-center justify-center transform transition-transform duration-200 hover:scale-110 z-10">
        <img src="../assets/images/store.webp" alt="Store" class="h-full w-full object-cover"/>
      </router-link>
      <router-link to="/products" class="box h-80 w-80 border-2 bg-white border-rose-peau flex items-center justify-center transform transition-transform duration-200 hover:scale-110 z-10">
        <img src="../assets/images/products.webp" alt="Products" class="h-full w-full object-cover"/>
      </router-link>
      <div class="box h-80 w-80 border-2 bg-white border-rose-peau flex items-center justify-center transform transition-transform duration-200 hover:scale-110 z-10">
        <img src="../assets/images/ourConcept.webp" alt="Our Concept" class="h-full w-full object-cover"/>
      </div>
    </div>
  </div>
</template>

<style scoped>
.box:hover {
  z-index: 20;
}
</style>
