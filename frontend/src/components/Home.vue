<template>
  <div class="flex flex-col justify-start items-center">
    <div class="grid grid-cols-4 gap-6 py-10">
      <div v-for="country in countries" class="card">
        <div class="flex flex-col rounded-lg shadow-xl w-64 h-full text-white bg-gray-800 hover:bg-gray-700 transition duration-300">
          <div class="h-1/2 w-full mb-2">
            <img :src="country.flags.png" class="w-full flag">
          </div>
          <div class="flex flex-col items-center justify-center text-center mb-5">
            <h2 class="text-xl font-bold mb-3 pt-3">{{ country.translations.fr }}</h2>
            <p>Population : {{ country.population.toLocaleString() }}</p>
            <p>Continent : {{ continents_name[country.region] || 'Inconnu' }}</p>
            <p>Capitale : {{ country.capital || 'Inconnue' }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.card {
  transition: transform 0.3s ease;
}
.card:hover {
  transform: scale(1.05);
}

.flag {
  height: 160px;
}
</style>

<script>

import axios from 'axios';


export default {

data() {
  return {
    countries: [],
    continents_name: {
      Europe: 'Europe',
      Africa: 'Afrique',
      Americas: 'Amérique',
      Oceania: 'Océanie',
      Asia: 'Asie',
      Polar: 'Pôle nord'
    }

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