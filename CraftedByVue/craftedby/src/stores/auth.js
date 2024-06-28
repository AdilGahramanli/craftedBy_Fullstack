// src/stores/auth.js

import { defineStore } from 'pinia'
import { ref } from 'vue'
import axios from 'axios'

export const useAuthStore = defineStore('auth', () => {
    const token = ref(localStorage.getItem('token') || null)
    const user = ref(localStorage.getItem('user') || null)

    const setToken = (newToken) => {
        token.value = newToken
        localStorage.setItem('token', newToken)
        axios.defaults.headers.common['Authorization'] = `Bearer ${newToken}`
    }

    const setUser = (newUser) => {
        user.value = newUser
    }

    const fetchUser = async () => {
        if (token.value) {
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/user')
                setUser(response.data)
            } catch (error) {
                console.error('Error fetching user:', error)
            }
        } else {
            console.warn('No token available for fetching user.')
        }
    }

    const login = async (credentials) => {
        try {
            const response = await axios.post('http://127.0.0.1:8000/api/login', credentials)
            setToken(response.data.token)
            await fetchUser()
        } catch (error) {
            console.error('Error logging in:', error)
        }
    }

    const register = async (userData) => {
        try {
            const response = await axios.post('http://127.0.0.1:8000/api/register', userData)
            setToken(response.data.token)
            await fetchUser()
        } catch (error) {
            console.error('Error registering:', error)
        }
    }

    return {
        token,
        user,
        login,
        register,
        fetchUser
    }
})






// // src/stores/auth.js
//
// import { defineStore } from 'pinia'
// import { ref } from 'vue'
// import axios from 'axios'
//
// export const useAuthStore = defineStore('auth', () => {
//     const token = ref(localStorage.getItem('token') || null)
//     const user = ref(null)
//
//     const setToken = (newToken) => {
//         token.value = newToken
//         localStorage.setItem('token', newToken)
//         axios.defaults.headers.common['Authorization'] = `Bearer ${newToken}`
//     }
//
//     const setUser = (newUser) => {
//         user.value = newUser
//     }
//
//     const fetchUser = async () => {
//         if (token.value) {
//             try {
//                 const response = await axios.get('/api/user')
//                 setUser(response.data)
//             } catch (error) {
//                 console.error('Error fetching user:', error)
//             }
//         }
//     }
//
//     return {
//         token,
//         user,
//         setToken,
//         setUser,
//         fetchUser
//     }
// })
//
//
//
//
//
//
//
// // // src/stores/auth.js
// //
// // import { defineStore } from 'pinia'
// // import { ref } from 'vue'
// // import axios from 'axios'
// //
// // export const useAuthStore = defineStore('auth', () => {
// //     const token = ref(localStorage.getItem('token') || null)
// //     const user = ref(null)
// //
// //     const setToken = (newToken) => {
// //         token.value = newToken
// //         localStorage.setItem('token', newToken)
// //         axios.defaults.headers.common['Authorization'] = `Bearer ${newToken}`
// //     }
// //
// //     const setUser = (newUser) => {
// //         user.value = newUser
// //     }
// //
// //     const fetchUser = async () => {
// //         if (token.value) {
// //             try {
// //                 const response = await axios.get('/api/user')
// //                 setUser(response.data)
// //             } catch (error) {
// //                 console.error('Error fetching user:', error)
// //             }
// //         }
// //     }
// //
// //     const login = async (credentials) => {
// //         try {
// //             const response = await axios.post('/api/login', credentials)
// //             setToken(response.data.token)
// //             await fetchUser()
// //         } catch (error) {
// //             console.error('Error logging in:', error)
// //         }
// //     }
// //
// //     const register = async (userData) => {
// //         try {
// //             const response = await axios.post('/api/register', userData)
// //             setToken(response.data.token)
// //             await fetchUser()
// //         } catch (error) {
// //             console.error('Error registering:', error)
// //         }
// //     }
// //
// //     return {
// //         token,
// //         user,
// //         login,
// //         register,
// //         fetchUser
// //     }
// // })
// //
// //
// //
// //
// //
// //
// //
// // // // src/stores/auth.js
// // //
// // // import { defineStore } from 'pinia'
// // // import { ref } from 'vue'
// // // import axios from 'axios'
// // //
// // // export const useAuthStore = defineStore('auth', () => {
// // //     const token = ref(null)
// // //     const user = ref(null)
// // //
// // //     const setToken = (newToken) => {
// // //         token.value = newToken
// // //         localStorage.setItem('token', newToken)
// // //         axios.defaults.headers.common['Authorization'] = `Bearer ${newToken}`
// // //     }
// // //
// // //     const setUser = (newUser) => {
// // //         user.value = newUser
// // //     }
// // //
// // //     const fetchUser = async () => {
// // //         if (token.value) {
// // //             try {
// // //                 const response = await axios.get('/api/user')
// // //                 setUser(response.data)
// // //             } catch (error) {
// // //                 console.error('Error fetching user:', error)
// // //             }
// // //         }
// // //     }
// // //
// // //     const login = async (credentials) => {
// // //         try {
// // //             const response = await axios.post('/api/login', credentials)
// // //             setToken(response.data.token)
// // //             await fetchUser()
// // //         } catch (error) {
// // //             console.error('Error logging in:', error)
// // //         }
// // //     }
// // //
// // //     const register = async (userData) => {
// // //         try {
// // //             const response = await axios.post('/api/register', userData)
// // //             setToken(response.data.token)
// // //             await fetchUser()
// // //         } catch (error) {
// // //             console.error('Error registering:', error)
// // //         }
// // //     }
// // //
// // //     return {
// // //         token,
// // //         user,
// // //         login,
// // //         register,
// // //         fetchUser
// // //     }
// // // })
// // //
// // //
// // //
// // //
// // //
// // //
// // //
// // //
// // //
// // //
// // //
// // // // /*Plan
// // // // Store logged user, add token. The store contains user id, name, access_token.
// // // //
// // // // */
// // // // import { defineStore } from 'pinia';
// // // //
// // // // export const useAuthStore = defineStore('auth', {
// // // //     state: () => ({
// // // //         user: null,
// // // //         token: '',
// // // //     }),
// // // //     actions: {
// // // //         // Action to set user and token from the login response
// // // //         setAuthData(data) {
// // // //             this.user = data.user;
// // // //             this.token = data.access_token;
// // // //             // Optionally, persist the token in localStorage for later use
// // // //             localStorage.setItem('authToken', data.access_token);
// // // //         },
// // // //         // Action to clear user and token (for logout)
// // // //         clearAuth() {
// // // //             this.user = null;
// // // //             this.token = '';
// // // //             localStorage.removeItem('authToken');
// // // //         }
// // // //     },
// // // //     getters: {
// // // //         // Getter to check if the user is authenticated
// // // //         isAuthenticated(state) {
// // // //             return !!state.token;
// // // //         },
// // // //         // Getter to retrieve user info
// // // //         userInfo(state) {
// // // //             return state.user;
// // // //         }
// // // //     }
// // // // });
