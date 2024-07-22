<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Navbar from '@/components/Navbar.vue'
import { ref } from 'vue'
import HomeView from '@/views/HomeView.vue'
// import HelloWorld from './components/HelloWorld.vue'
// eslint-disable-next-line vue/no-export-in-script-setup
const myVariable = ref(import.meta.env.VITE_API_ENDPOINT)
</script>

<template>

  <header class="w-full">
    <navbar class="z-10 mb-20"></navbar>
  </header>
  <div>VUE_APP_MY_VARIABLE: {{ myVariable }}</div>
  <RouterView></RouterView>


<footer>
  About us - contact Us - Cgv - Politique de confidentialité
</footer>
</template>