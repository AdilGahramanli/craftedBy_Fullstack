# craftedBy_Fullstack

# CraftedBy - Partie Backend en Laravel 11

## Liste des dépendances
-Laravel 11
-MySql 5.7.44
-PHP 8.3.3
-php-fpm = bitnami/php-fpm:8.3.3


## Containeurisation
Backend et BDD MySql sont les deux services du container CraftedBy_backend


# CraftedBy - Partie Frontend en Vue 3

## Introduction

Welcome to **CraftedBy**, your premier destination for unique, handmade products crafted with love and care. Our platform connects you with talented artisans who create one-of-a-kind items that you won't find anywhere else.

## Features

- **Handmade Products**: Every item on CraftedBy is handmade by skilled artisans, ensuring that each piece is unique and of high quality.
- **Wide Range of Categories**: From jewelry and home decor to clothing and art, we offer a diverse selection of handcrafted goods.
- **Secure Shopping**: Our platform provides a secure and seamless shopping experience, so you can buy with confidence.
- **Support Artisans**: By shopping with us, you're directly supporting independent artists and small businesses.

This template should help get you started developing with Vue 3 in Vite.

## Recommended IDE Setup

[VSCode](https://code.visualstudio.com/) + [Volar](https://marketplace.visualstudio.com/items?itemName=Vue.volar) (and disable Vetur).

## Customize configuration

See [Vite Configuration Reference](https://vitejs.dev/config/).

## Project Setup

```sh
npm install
```

### Compile and Hot-Reload for Development

```sh
npm run dev
```

### Compile and Minify for Production

```sh
npm run build
```

### Lint with [ESLint](https://eslint.org/)

```sh
npm run lint
```

## Dependencies
**Vue 3**: The progressive JavaScript framework.<br>
**Vue Router**: The official router for Vue.js.<br>
**Pinia**: The intuitive state management library for Vue.<br>
**ESLint**: A tool for identifying and fixing problems in your JavaScript code.<br>
**Prettier**: An opinionated code formatter.<br>
**Tailwind CSS**: A utility-first CSS framework.<br>
**useFetch**: A composable function for data fetching.<br>
### ESLint and Prettier Configuration
This project uses ESLint and Prettier for code quality and formatting.<br> The configuration files are included in the project root:

.eslintrc.js<br>
.prettierrc<br>
## Tailwind CSS Setup
Tailwind CSS is included and configured. You can find the configuration file in the project root:

tailwind.config.js
Project Structure<br>

├── public<br>
│   ├── index.html<br>
├── src<br>
│   ├── assets<br>
│   ├── components<br>
│   ├── views<br>
│   ├── router<br>
│   │   └── index.js<br>
│   ├── stores<br>
│   │   └── cart.js<br>
│   ├── App.vue<br>
│   ├── main.js<br>
├── package.json<br>
├── postcss.config.js<br>
├── tailwind.config.js<br>
├── .eslintrc.js<br>
├── .prettierrc<br>
## Usage<br>
Using Vue Router
The router configuration is located in src/router/index.js. To add a new route, update this file with your route details.

javascript
Copier le code
import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/views/Home.vue';
import Products from '@/views/Products.vue';

const routes = [
{ path: '/', component: Home },
{ path: '/products', component: Products },
];

const router = createRouter({
history: createWebHistory(),
routes,
});

export default router;
Using Pinia
State management is handled by Pinia. An example store is located in src/stores/cart.js.

javascript
Copier le code
import { defineStore } from 'pinia';

export const useCartStore = defineStore('cart', {
state: () => ({
cart: [],
}),
actions: {
addToCart(product) {
this.cart.push(product);
},
removeFromCart(index) {
this.cart.splice(index, 1);
},
},
getters: {
getAllCartProductsToString: (state) => state.cart,
},
persist: true,
});
Using useFetch
The useFetch composable can be used for data fetching. Here's an example of how to use it in a component.

javascript
Copier le code
import { ref, onMounted } from 'vue';

export default {
setup() {
const data = ref(null);
const error = ref(null);

    onMounted(async () => {
      try {
        const response = await fetch('https://api.example.com/data');
        data.value = await response.json();
      } catch (err) {
        error.value = err;
      }
    });

    return {
      data,
      error,
    };
},
};
Styling
Tailwind CSS is used for styling. Utility classes can be applied directly in your templates.

html
Copier le code
<template>
  <div class="p-4 bg-gray-200">
    <h1 class="text-2xl font-bold">Hello World</h1>
  </div>
</template>
Customizing Configuration
For detailed configuration options, refer to the official documentation of each tool and library used in this project:

Vue 3
Vue Router
Pinia
ESLint
Prettier
Tailwind CSS
