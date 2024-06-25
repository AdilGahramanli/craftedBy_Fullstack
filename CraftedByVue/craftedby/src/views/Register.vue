<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow-md">
      <h2 class="text-2xl font-bold text-center">Register</h2>
      <form @submit.prevent="register">
        <div class="space-y-4">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" v-model="name" required class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"/>
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" v-model="email" required class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"/>
          </div>
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" v-model="password" required class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"/>
          </div>
          <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" v-model="password_confirmation" required class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"/>
          </div>
          <div class="text-center">
            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Register</button>
          </div>
          <div class="text-center">
            <router-link to="/login" class="text-blue-500 hover:underline">Already have an account? Login</router-link>
          </div>
        </div>
      </form>
      <div v-if="error" class="mt-4 text-center text-red-500">{{ error }}</div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      error: null
    }
  },
  methods: {
    async register() {
      try {
        const response = await axios.post('http://your-laravel-app.test/api/register', {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation
        });
        // Handle successful registration, e.g., save token and redirect
        localStorage.setItem('token', response.data.token);
        this.$router.push('/dashboard'); // Replace with your desired route
      } catch (error) {
        this.error = 'Registration failed: ' + (error.response.data.message || 'Unknown error');
      }
    }
  }
}
</script>

<style scoped>
/* Additional styling if needed */
</style>
