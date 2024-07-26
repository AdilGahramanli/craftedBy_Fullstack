<script setup>
import { useRoute } from 'vue-router'
import {ref} from 'vue'

const route = useRoute();
const userSelected = ref(null);
const userId = route.params.id;
fetch(`https://api.gahramanli.devlog25.le-campus.eu/api/user/${userId}`)
    .then(res=>res.json())
    .then(json=>userSelected.value=json)
</script>

<template>
  <h1>user by id</h1>
<p>{{ userSelected }}</p>
</template>

<style scoped>

</style>