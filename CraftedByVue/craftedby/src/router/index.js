import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/login',
      name: 'Login',
      component: () =>  import('../views/Login.vue')
    },
    {
      path: '/register',
      name: 'Register',
      component: () =>  import('../views/Register.vue')
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/products',
      name: 'products',
      component:() => import('../views/ProductsView.vue')
    },
    {
      path: '/products/:id',
      name: 'productsIndex',
      component:() => import('../views/ProductDetailsView.vue')
    },
    {
      path: '/cart',
      name: 'cart',
      component:() => import('../views/CartView.vue')
    },
    {
      path: '/payment',
      name: 'payment',
      component:() => import('../views/PaymentView.vue')
    },
    {
      path: '/account',
      name: 'account',
      component:() => import ('../views/AccountView.vue')
    },
    {
      path: '/store/:id',
      name: 'store',
      component:() => import ('../views/StoreView.vue')
    },

    {
      path: '/user',
      name: 'user',
      component: () => import('../views/User.vue')
    }
]})

export default router
