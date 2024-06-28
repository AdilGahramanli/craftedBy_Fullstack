<template>
  <div class="register flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
      <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>
      <form @submit.prevent="registerUser">
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
import { useAuthStore } from '@/stores/auth'; // Make sure to import your auth store

const authStore = useAuthStore();

const name = ref('');
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

    // No need to return anything as the cookie is automatically set
  } catch (error) {
    console.error('An error occurred while fetching CSRF token:', error);
  }
};

const registerUser = async () => {
  await getNewCsrfToken();

  try {
    const response = await fetch('http://127.0.0.1:8000/api/register', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
      },
      credentials: 'include',  // Ensure cookies are included
      body: JSON.stringify({
        name: name.value,
        email: email.value,
        password: password.value,
      }),
    });

    const data = await response.json();

    if (response.ok) {
      console.log('Registration successful:', data);
      authStore.setToken(data.token); // Set the token in the auth store
      await authStore.fetchUser(); // Fetch the user data and set it in the store
    } else {
      console.error('Registration failed:', data);
    }
  } catch (error) {
    console.error('An error occurred during registration:', error);
  }
};
</script>

<style scoped>
.bg-rose-peau {
  background-color: #f06292; /* Adjust this color to match your design */
}
.bg-fond {
  background-color: #f8f8f8;
}
</style>
