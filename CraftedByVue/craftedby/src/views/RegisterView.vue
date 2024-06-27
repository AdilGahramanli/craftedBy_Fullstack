<template>
  <div class="register flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
      <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>
      <form @submit.prevent="register">
        <div class="mb-4">
          <label for="name" class="block text-gray-700">Name:</label>
          <input type="text" id="name" v-model="name" required class="input input-bordered w-full bg-fond p-2 rounded" />
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700">Email:</label>
          <input type="email" id="email" v-model="email" required class="input input-bordered w-full bg-fond p-2 rounded" />
        </div>
        <div class="mb-6">
          <label for="password" class="block text-gray-700">Password:</label>
          <input type="password" id="password" v-model="password" required class="input input-bordered w-full bg-fond p-2 rounded" />
        </div>
        <button type="submit" class="btn w-full bg-rose-peau text-white py-2 rounded">Register</button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const name = ref('');
const email = ref('');
const password = ref('');

const getNewCsrfToken = async () => {
  const response = await fetch('http://127.0.0.1:8000/api/csrf-token', {
    method: 'GET',
    headers: {
      'Accept': 'application/json',
    },
  });
  const data = await response.json();
  return data.csrfToken;
};

const register = async () => {
  const csrfToken = await getNewCsrfToken();
  if (!csrfToken) {
    console.error('CSRF token not found');
    return;
  }

  const response = await fetch('http://127.0.0.1:8000/api/register', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'X-CSRF-TOKEN': csrfToken,
    },
    body: JSON.stringify({
      name: name.value,
      email: email.value,
      password: password.value,
    }),
  });

  const data = await response.json();

  if (response.ok) {
    console.log('Registration successful:', data);
  } else {
    console.error('Registration failed:', data);
  }
};
</script>

<style scoped>
/* Add your styles here if necessary */
</style>
