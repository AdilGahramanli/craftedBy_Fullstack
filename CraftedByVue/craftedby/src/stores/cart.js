import { defineStore } from 'pinia'
// Define a Pinia store named 'cart'
export const useCartStore = defineStore('cart', {
  // State: Defines the initial state of the cart, which is an empty array
  state:() => ({
    cart:[]
  }),
  // Actions: Methods to manipulate the state of the cart
  actions: {
    addToCart(product) {
      if(this.cart.includes(product)) {
        product.quantity+=1;
        product.priceTotal=product.priceTotal + product.price;
      }
      else {
        this.cart.push(product);
        product['quantity']=1;
        product['priceTotal']=product['price']
      }

    },
    removeFromCart(idx) {
      this.cart.splice(idx,1 );
    }
  },
  // Getters: Computed properties to derive and return specific state information
  getters: {
    getAllCartProductsToString: (state) => {
      return state.cart;
    },
    getTotalQuantity:(state) => {
      return state.cart.reduce((acc, cv) => acc + cv.quantity,0)
    }
    // getTotalPrice:(state) => {
    //   return state.cart.reduce((acc, cv) => acc + cv['product'].priceTotal)
    // }
  },
  // Enable persistence of the cart state
    persist: true
})

