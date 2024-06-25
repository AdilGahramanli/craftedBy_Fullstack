<script setup>
import { useRoute } from 'vue-router'
import {ref} from 'vue'

const route = useRoute();
const userSelected = ref(null);
const userId = route.params.id;
fetch(`http://127.0.0.1:8000/api/user/${userId}`)
    .then(res=>res.json())
    .then(json=>userSelected.value=json)
</script>

<template>
  <div>
    <h1>Espace personnel</h1>

    <p>{{userSelected}}</p>
  </div>

<!--Informations personnelles-->
<!--  Panier avec vue dessus (élément commun à Payment)-->
<!--Les anciennes commancdes-->
<!--  La messagerie sécurisée-->
<div class="w-full border-solid border-2 ">
  <h2>Informations personnelles</h2>
</div>

  <div class=" w-full border-solid border-2">
    <h2>Mon panier</h2>
    <RouterLink to="cart"><button>voir mon panier</button></RouterLink>
  </div>
</template>

<style scoped>

</style>