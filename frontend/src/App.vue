<script setup>
import Footer from './components/Footer.vue';
</script>

<template>
  <div class="app-container">
    <router-view />
    <Footer />
  </div>
</template>

<style>
.app-container {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

footer {
  margin-top: auto;
}
</style>