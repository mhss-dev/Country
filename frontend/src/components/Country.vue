<template>
  <div class="flex flex-col justify-start items-center mt-6 px-4 md:px-0  bg-gray-900">
    <div class="flex flex-col sm:flex-row w-full md:w-2/3 lg:w-1/2 py-4 justify-between items-center">
      <input
        type="text"
        v-model="searchQuery"
        placeholder="Trouver un pays"
        class=" sm:flex-grow px-4 py-2 mb-4 sm:mb-0 rounded-lg border border-gray-300 focus:outline-none sm:mr-4"
      />
      <select
        v-model="selectedContinent"
        class="w-full sm:w-auto px-4 py-2 rounded-lg border border-gray-300 focus:outline-none"
      >
        <option value="">Tous</option>
        <option value="Africa">Afrique</option>
        <option value="Americas">Amérique</option>
        <option value="Asia">Asie</option>
        <option value="Europe">Europe</option>
        <option value="Oceania">Océanie</option>
      </select>
    </div>
  
    
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 py-6">
          <RouterLink
    v-for="country in filteredCountries"
    :key="country.translations.fr"
    :to="{ name: 'CountryDetails', params: { name: country.name} }"
    class="card"
  >
    <div class="flex flex-col rounded-lg shadow-xl w-64 h-full text-white">
      <div class="h-1/2 w-full">
        <img :src="country.flag" class="w-full h-full object-cover" alt="country-flag" />
      </div>
      <div class="flex flex-col items-start justify-center p-4 text-center">
        <h2 class="text-xl font-bold">{{ country.translations.fr }}</h2>
        <p>Population : {{ country.population.toLocaleString() }}</p>
        <p>Continent : {{ continents_name[country.region] || 'Inconnu' }}</p>
        <p>Capitale : {{ country.capital || 'Inconnue' }}</p>
      </div>
    </div>
  </RouterLink>
  
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
          countries: [],
          searchQuery: "",
          selectedContinent: "",
    
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
        axios.get('https://127.0.0.1:8000/api/countries').then(response => {
          this.countries = response.data;
        }).catch(error => {
          console.log("Erreur lors de la récupération des pays", error);
        });
      },
      computed: {
        filteredCountries() {
          return this.countries.filter((country) => {
            const matchesSearch = country.translations && country.translations.fr 
            && country.translations.fr.toLowerCase().includes(this.searchQuery.toLowerCase());
    
            const matchesContinent = this.selectedContinent ? country.region === this.selectedContinent : true;
            return matchesSearch && matchesContinent;
          });
        }
      }
    }
    </script>