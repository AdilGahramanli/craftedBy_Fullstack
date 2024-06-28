<template>
  <div class="login flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
      <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>
      <form @submit.prevent="login">
        <div class="mb-4">
          <label for="email" class="block text-gray-700">Email:</label>
          <input type="email" id="email" v-model="email" required class="input input-bordered w-full bg-fond p-2 rounded" />
        </div>
        <div class="mb-6">
          <label for="password" class="block text-gray-700">Password:</label>
          <input type="password" id="password" v-model="password" required class="input input-bordered w-full bg-fond p-2 rounded" />
        </div>
        <button type="submit" class="btn w-full bg-rose-peau text-white py-2 rounded">Login</button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const email = ref('');
const password = ref('');

const getNewCsrfToken = async () => {
  try {
    const response = await fetch('http://127.0.0.1:8000/sanctum/csrf-cookie', {
      method: 'GET',
      headers: {
        'Accept': 'application/json',
      },
      credentials: 'include'  // Ensure cookies are included
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
  } catch (error) {
    console.error('An error occurred while fetching CSRF token:', error);
  }
};

const login = async () => {
  await getNewCsrfToken();

  try {
    const response = await fetch('http://127.0.0.1:8000/api/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
      },
      credentials: 'include',  // Ensure cookies are included
      body: JSON.stringify({
        email: email.value,
        password: password.value,
      }),
    });

    const data = await response.json();

    if (response.ok) {
      console.log('Login successful:', data);
    } else {
      console.error('Login failed:', data);
    }
  } catch (error) {
    console.error('An error occurred during login:', error);
  }
};
</script>

<style scoped>
/* Add your styles here if necessary */
</style>
