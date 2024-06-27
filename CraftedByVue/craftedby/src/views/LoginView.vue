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

const getCsrfToken = () => {
  return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
};

const login = async () => {
  const csrfToken = getCsrfToken();
  const response = await fetch('http://127.0.0.1:8000/api/login', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'X-CSRF-TOKEN': csrfToken,
    },
    body: JSON.stringify({
      email: email.value,
      password: password.value,
    }),
  });

  const data = await response.json();

  if (response.ok) {
    // Handle successful login
    console.log('Login successful:', data);
    // You can redirect the user or show a success message
  } else {
    // Handle login error
    console.error('Login failed:', data);
    // Show an error message to the user
  }
};
</script>

<style scoped>
/* Add your styles here if necessary */
</style>
