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
import { useAuthStore } from '@/stores/auth';

const email = ref('');
const password = ref('');
const authStore = useAuthStore();

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

const displayUserInfo = (user) => {
  alert(`User Info:\nName: ${user.name}\nEmail: ${user.email}`);
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
      authStore.setToken(data.access_token);
      displayUserInfo(data.user);  // Display user info in an alert
    } else {
      console.error('Login failed:', data);
    }
  } catch (error) {
    console.error('An error occurred during login:', error);
  }
};
</script>

<style scoped>
.bg-rose-peau {
  background-color: #f06292;
}
.bg-fond {
  background-color: #f8f8f8;
}
</style>



<!--<template>-->
<!--  <div class="login flex justify-center items-center min-h-screen bg-gray-100">-->
<!--    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">-->
<!--      <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>-->
<!--      <form @submit.prevent="loginUser">-->
<!--        <div class="mb-4">-->
<!--          <label for="email" class="block text-gray-700">Email:</label>-->
<!--          <input type="email" id="email" v-model="email" required class="input input-bordered w-full bg-fond p-2 rounded" />-->
<!--        </div>-->
<!--        <div class="mb-6">-->
<!--          <label for="password" class="block text-gray-700">Password:</label>-->
<!--          <input type="password" id="password" v-model="password" required class="input input-bordered w-full bg-fond p-2 rounded" />-->
<!--        </div>-->
<!--        <button type="submit" class="btn w-full bg-rose-peau text-white py-2 rounded">Login</button>-->
<!--      </form>-->
<!--    </div>-->
<!--  </div>-->
<!--</template>-->

<!--<script setup>-->
<!--import { ref } from 'vue';-->
<!--import { useAuthStore } from '@/stores/auth'; // Make sure to import your auth store-->

<!--const authStore = useAuthStore();-->

<!--const email = ref('');-->
<!--const password = ref('');-->

<!--const getNewCsrfToken = async () => {-->
<!--  try {-->
<!--    const response = await fetch('http://127.0.0.1:8000/sanctum/csrf-cookie', {-->
<!--      method: 'GET',-->
<!--      headers: {-->
<!--        'Accept': 'application/json',-->
<!--      },-->
<!--      credentials: 'include'  // Ensure cookies are included-->
<!--    });-->

<!--    if (!response.ok) {-->
<!--      throw new Error(`HTTP error! status: ${response.status}`);-->
<!--    }-->
<!--  } catch (error) {-->
<!--    console.error('An error occurred while fetching CSRF token:', error);-->
<!--  }-->
<!--};-->

<!--const loginUser = async () => {-->
<!--  await getNewCsrfToken();-->

<!--  try {-->
<!--    const response = await fetch('http://127.0.0.1:8000/api/login', {-->
<!--      method: 'POST',-->
<!--      headers: {-->
<!--        'Content-Type': 'application/json',-->
<!--        'Accept': 'application/json',-->
<!--      },-->
<!--      credentials: 'include',  // Ensure cookies are included-->
<!--      body: JSON.stringify({-->
<!--        email: email.value,-->
<!--        password: password.value,-->
<!--      }),-->
<!--    });-->

<!--    const data = await response.json();-->

<!--    if (response.ok) {-->
<!--      console.log('Login successful:', data);-->
<!--      authStore.setToken(data.token); // Set the token in the auth store-->
<!--      await authStore.fetchUser(); // Fetch the user data and set it in the store-->
<!--    } else {-->
<!--      console.error('Login failed:', data);-->
<!--    }-->
<!--  } catch (error) {-->
<!--    console.error('An error occurred during login:', error);-->
<!--  }-->
<!--};-->
<!--</script>-->

<!--<style scoped>-->
<!--.bg-rose-peau {-->
<!--  background-color: #f06292;-->
<!--}-->
<!--.bg-fond {-->
<!--  background-color: #f8f8f8;-->
<!--}-->
<!--</style>-->



<!--&lt;!&ndash;<template>&ndash;&gt;-->
<!--&lt;!&ndash;  <div class="login flex justify-center items-center min-h-screen bg-gray-100">&ndash;&gt;-->
<!--&lt;!&ndash;    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">&ndash;&gt;-->
<!--&lt;!&ndash;      <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>&ndash;&gt;-->
<!--&lt;!&ndash;      <form @submit.prevent="login">&ndash;&gt;-->
<!--&lt;!&ndash;        <div class="mb-4">&ndash;&gt;-->
<!--&lt;!&ndash;          <label for="email" class="block text-gray-700">Email:</label>&ndash;&gt;-->
<!--&lt;!&ndash;          <input type="email" id="email" v-model="email" required class="input input-bordered w-full bg-fond p-2 rounded" />&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--&lt;!&ndash;        <div class="mb-6">&ndash;&gt;-->
<!--&lt;!&ndash;          <label for="password" class="block text-gray-700">Password:</label>&ndash;&gt;-->
<!--&lt;!&ndash;          <input type="password" id="password" v-model="password" required class="input input-bordered w-full bg-fond p-2 rounded" />&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--&lt;!&ndash;        <button type="submit" class="btn w-full bg-rose-peau text-white py-2 rounded">Login</button>&ndash;&gt;-->
<!--&lt;!&ndash;      </form>&ndash;&gt;-->
<!--&lt;!&ndash;    </div>&ndash;&gt;-->
<!--&lt;!&ndash;  </div>&ndash;&gt;-->
<!--&lt;!&ndash;</template>&ndash;&gt;-->

<!--&lt;!&ndash;<script setup>&ndash;&gt;-->
<!--&lt;!&ndash;import { ref } from 'vue';&ndash;&gt;-->

<!--&lt;!&ndash;const email = ref('');&ndash;&gt;-->
<!--&lt;!&ndash;const password = ref('');&ndash;&gt;-->

<!--&lt;!&ndash;const getNewCsrfToken = async () => {&ndash;&gt;-->
<!--&lt;!&ndash;  try {&ndash;&gt;-->
<!--&lt;!&ndash;    const response = await fetch('http://127.0.0.1:8000/sanctum/csrf-cookie', {&ndash;&gt;-->
<!--&lt;!&ndash;      method: 'GET',&ndash;&gt;-->
<!--&lt;!&ndash;      headers: {&ndash;&gt;-->
<!--&lt;!&ndash;        'Accept': 'application/json',&ndash;&gt;-->
<!--&lt;!&ndash;      },&ndash;&gt;-->
<!--&lt;!&ndash;      credentials: 'include'  // Ensure cookies are included&ndash;&gt;-->
<!--&lt;!&ndash;    });&ndash;&gt;-->

<!--&lt;!&ndash;    if (!response.ok) {&ndash;&gt;-->
<!--&lt;!&ndash;      throw new Error(`HTTP error! status: ${response.status}`);&ndash;&gt;-->
<!--&lt;!&ndash;    }&ndash;&gt;-->
<!--&lt;!&ndash;  } catch (error) {&ndash;&gt;-->
<!--&lt;!&ndash;    console.error('An error occurred while fetching CSRF token:', error);&ndash;&gt;-->
<!--&lt;!&ndash;  }&ndash;&gt;-->
<!--&lt;!&ndash;};&ndash;&gt;-->

<!--&lt;!&ndash;const login = async () => {&ndash;&gt;-->
<!--&lt;!&ndash;  await getNewCsrfToken();&ndash;&gt;-->

<!--&lt;!&ndash;  try {&ndash;&gt;-->
<!--&lt;!&ndash;    const response = await fetch('http://127.0.0.1:8000/api/login', {&ndash;&gt;-->
<!--&lt;!&ndash;      method: 'POST',&ndash;&gt;-->
<!--&lt;!&ndash;      headers: {&ndash;&gt;-->
<!--&lt;!&ndash;        'Content-Type': 'application/json',&ndash;&gt;-->
<!--&lt;!&ndash;        'Accept': 'application/json',&ndash;&gt;-->
<!--&lt;!&ndash;      },&ndash;&gt;-->
<!--&lt;!&ndash;      credentials: 'include',  // Ensure cookies are included&ndash;&gt;-->
<!--&lt;!&ndash;      body: JSON.stringify({&ndash;&gt;-->
<!--&lt;!&ndash;        email: email.value,&ndash;&gt;-->
<!--&lt;!&ndash;        password: password.value,&ndash;&gt;-->
<!--&lt;!&ndash;      }),&ndash;&gt;-->
<!--&lt;!&ndash;    });&ndash;&gt;-->

<!--&lt;!&ndash;    const data = await response.json();&ndash;&gt;-->

<!--&lt;!&ndash;    if (response.ok) {&ndash;&gt;-->
<!--&lt;!&ndash;      console.log('Login successful:', data);&ndash;&gt;-->
<!--&lt;!&ndash;    } else {&ndash;&gt;-->
<!--&lt;!&ndash;      console.error('Login failed:', data);&ndash;&gt;-->
<!--&lt;!&ndash;    }&ndash;&gt;-->
<!--&lt;!&ndash;  } catch (error) {&ndash;&gt;-->
<!--&lt;!&ndash;    console.error('An error occurred during login:', error);&ndash;&gt;-->
<!--&lt;!&ndash;  }&ndash;&gt;-->
<!--&lt;!&ndash;};&ndash;&gt;-->
<!--&lt;!&ndash;</script>&ndash;&gt;-->

<!--&lt;!&ndash;<style scoped>&ndash;&gt;-->
<!--&lt;!&ndash;/* Add your styles here if necessary */&ndash;&gt;-->
<!--&lt;!&ndash;</style>&ndash;&gt;-->
