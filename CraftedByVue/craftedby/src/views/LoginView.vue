<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow-md">
      <h2 class="text-2xl font-bold text-center">Login</h2>
      <form @submit.prevent="login">
        <div class="space-y-4">
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" v-model="email" required class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"/>
          </div>
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" v-model="password" required class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"/>
          </div>
          <div class="text-center">
            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Login</button>
          </div>
          <div class="text-center">
            <router-link to="/register" class="text-blue-500 hover:underline">Don't have an account? Register</router-link>
          </div>
        </div>
      </form>
      <div v-if="error" class="mt-4 text-center text-red-500">{{ error }}</div>
    </div>
  </div>
</template>

<script setup>
//import {tokenStore} from "@/stores/token.js";
import {onMounted} from 'vue';
import {useAuthStore} from "@/stores/auth.js";

/*const token_Store = tokenStore();
const current_token = ref(null);*/
const authStore = useAuthStore();

onMounted(  ()  => {
      ////fetching the laravel login route
      fetch('http://127.0.0.1:8000/api/login')
          .then(res => res.json())
          .then(json => authStore.value = json)
          .catch(error => {
            console.error("there was an error !", error);
          });
    })

</script>

<style scoped>
/* Additional styling if needed */
</style>
