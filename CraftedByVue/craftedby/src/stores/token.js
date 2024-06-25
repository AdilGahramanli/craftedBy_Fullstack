import { defineStore } from 'pinia'
export const tokenStore = defineStore('current_token', {
    state:()  =>  ({
        current_token: null
    }),
    actions:  {
        addToCurrentToken(token) {
            this().current_token = token;
        }
    },
    getters:  {
        getCurrentToken:  (state) =>  {
            return state().current_token;
        }
    }
})