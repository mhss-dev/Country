<template>
    <footer class="footer footer-center w-full p-4 bg-gray-800 text-white footer-bottom">
      <div class="text-center">
        <p>
          COUNTRY - {{ currentYear }}
        </p>
      </div>
    </footer>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const currentYear = ref(new Date().getFullYear());
  </script>
  
  <style scoped>
  .footer-bottom {
    /* You can define additional styles if needed */
  }
  </style>