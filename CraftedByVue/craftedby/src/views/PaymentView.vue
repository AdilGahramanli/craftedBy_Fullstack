<script setup>

</script>
<!--Div résumé commande, possibilité de défiler-->
<!--Formulaire pour l'adresse avec bouton valider.-->
<!--formulaire pour entrer les identifiants.-->
<!--logos de réassurance-->
<!--bouton valider pour payer-->
<template>
  <h1>Paiement</h1>
  <div>
    <h1>Mon panier</h1>

  </div>
  <div class="form-fields">
    <label for="adress">Adresse (si différente)</label>
    <input type="text" id="adress" name="adress"></input>
  </div>
  <div class="form-fields">
    <label for="bankInfos">bank infos</label>
    <input type="text" id="bankInfos" name="bankInfos"></input>
  </div>
<RouterLink to="products"><button class="btn">Payer</button></RouterLink>
</template>

<style scoped>

</style>