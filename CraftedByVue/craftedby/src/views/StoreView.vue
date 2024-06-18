<script>
import { onMounted, ref } from 'vue';
import { useRoute } from 'vue-router'

export default {
  setup() {
    const stores = ref([]);
    const route = useRoute();
    const id = route.params.id;
    const selectedArtisan = ref('toto')
    // const storeJson = JSON.parse(stores)

    onMounted(() => {
      fetch('/stores.json')
        .then(response => response.json())
        .then(data => {
          stores.value = data.stores;
          selectedArtisan.value = stores.value.find(item => item.id == id)
          console.log(selectedArtisan.value)
        })
        .catch(error => {
          console.error("There was an error!", error);
        });
    });

    return {
      stores, id, selectedArtisan
    };
  }
};
</script>

<template>

<!--  {{ stores[id - 1 ] }}-->
  <h1>{{ selectedArtisan.name }}</h1>
  <p>{{ selectedArtisan.description }}</p>
  <div v-for="product in selectedArtisan.products" :key="product.id">
    {{ product.name }}
    {{product.image_name}}
    {{product.category}}
    {{product.description}}
    {{product.price}}
  </div>

  <RouterLink to="/cart"> <button> acheter </button> </RouterLink>

</template>

<style scoped>

</style>