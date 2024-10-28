<template>
    <div class="flex flex-col items-center p-6 bg-gray-900 min-h-screen">

      <div v-if="country" class="max-w-lg w-full rounded-lg shadow-xl bg-gray-800 text-white overflow-hidden">
        <div class="">
      <img :src="country.flag" class="" alt="country-flag" />
    </div>      
    <div class="flex flex-col p-6">
          <h2 class="text-4xl font-bold mb-4 text-center">{{ country.translations.fr }}</h2>
          <div class="space-y-2">
            <p class="text-lg">Population : <span class="font-semibold">{{ country.population.toLocaleString() }}</span></p>
            <p class="text-lg">Continent : <span class="font-semibold">{{ continents_name[country.region] || 'Inconnu' }}</span></p>
            <p class="text-lg">Capitale : <span class="font-semibold">{{ country.capital || 'Inconnue' }}</span></p>
            <p class="text-lg">Domaine : <span class="font-semibold">{{ country.topLevelDomain.join(', ') || 'Inconnu' }}</span></p>
            <p class="text-lg">Langues : <span class="font-semibold">{{ country.languages.map(lang => lang.name).join(', ') || 'Inconnue' }}</span></p>
            <p class="text-lg">Monnaie : <span class="font-semibold">{{ country.currencies.map(curr => curr.name).join(', ') || 'Inconnue' }}</span></p>
          </div>
        </div>
      </div>
      <router-link to="/" class="mt-6 text-blue-400 hover:underline text-lg">Retour à la liste des pays</router-link>
    </div>
  </template>
  
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        country: null,
        continents_name: {
        Europe: 'Europe',
        Africa: 'Afrique',
        Americas: 'Amérique',
        Oceania: 'Océanie',
        Asia: 'Asie',
        Polar: 'Pôle nord'
      }
      };
    },
    mounted() {
        const countryName = decodeURIComponent(this.$route.params.name.toLocaleLowerCase());
        axios.get(`https://restcountries.com/v2/name/${countryName}`)
        .then(response => {
          this.country = response.data[0];
        })
        .catch(error => {
          console.log("Erreur lors de la récupération des détails du pays", error);
        });
    },

  }
  </script>
  