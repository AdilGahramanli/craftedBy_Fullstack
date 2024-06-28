<template>
  <div class="home-container bg-fond min-h-screen flex flex-col items-center justify-center">
    <h1 class="text-5xl text-center text-rose-peau mb-12">Home</h1>
    <div class="bg-fond grid grid-rows-4 gap-4 inline-block align-baseline w-full max-w-3xl">
      <div class="h-24 w-full border-solid border-2 bg-white border-rose-peau flex items-center justify-center">
        <!-- Content for the first box -->
      </div>
      <div class="h-24 w-full border-solid border-2 bg-white border-rose-peau flex items-center justify-center">
        <!-- Content for the second box -->
      </div>
      <div class="h-24 w-full border-solid border-2 bg-white border-rose-peau flex items-center justify-center">
        <router-link to="products" class="text-rose-peau text-2xl">
          Produits
        </router-link>
      </div>
      <div class="h-24 w-full border-solid border-2 bg-white border-rose-peau flex items-center justify-center">
        <!-- Content for the fourth box -->
      </div>
    </div>
  </div>
</template>

<script setup>

</script>

<style scoped>
.bg-fond {
  background-color: #f8f8f8;
}
.text-rose-peau {
  color: #f06292; /* Adjust this color to match your design */
}
.border-rose-peau {
  border-color: #f06292; /* Adjust this color to match your design */
}
</style>
