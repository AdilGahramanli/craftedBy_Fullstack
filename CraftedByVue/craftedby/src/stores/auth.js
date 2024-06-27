/*Plan
Store logged user, add token. The store contains user id, name, access_token.

*/
import { defineStore } from 'pinia';

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: null,
        token: '',
    }),
    actions: {
        // Action to set user and token from the login response
        setAuthData(data) {
            this.user = data.user;
            this.token = data.access_token;
            // Optionally, persist the token in localStorage for later use
            localStorage.setItem('authToken', data.access_token);
        },
        // Action to clear user and token (for logout)
        clearAuth() {
            this.user = null;
            this.token = '';
            localStorage.removeItem('authToken');
        }
    },
    getters: {
        // Getter to check if the user is authenticated
        isAuthenticated(state) {
            return !!state.token;
        },
        // Getter to retrieve user info
        userInfo(state) {
            return state.user;
        }
    }
});
