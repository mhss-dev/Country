<template>

<div class="flex flex-col justify-start items-center">
  <div class="grid grid-cols-4 gap-6 py-10">

    <div v-for="country in countries" class="card">
  <div class="flex flex-col rounded-lg shadow-xl w-64 h-full text-white">
    <div class="h-1/2 w-full">
      <img :src="country.flag" class="w-full h-full object-cover">
    </div>
    <div class="flex flex-col items-start justify-center p-4 text-center mt-8">
      <h2 class="text-xl font-bold">{{ country.translations.fr }}</h2>
      <p>Population : {{ country.population.toLocaleString() }}</p>
      <p>Continent : {{ country.region || 'Inconnu' }}</p>
      <p>Capitale : {{ country.capital || 'Inconnue' }}</p>
    </div>
  </div>
</div>

 </div>
    
</div>

</template>


<style>
.card {
  background-color: #23272b;
  transition: transform 0.3s ease;
}
.card:hover {
  transform: scale(1.05);
}
</style>

<script>

import axios from 'axios';

export default {

data() {
  return {
    countries: []

  }
},
mounted() {
  axios.get('https://127.0.0.1:8000/api/countries').then(response=> {
    this.countries = response.data
  }).catch(error => {
    console.log("Erreur lors de la récupération des pays", error);
    
  })
}
}
</script>