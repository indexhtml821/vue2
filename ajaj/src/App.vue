<template>
  <div id="app">
    <h1>Aplicación de Selección de Ubicación</h1>
    <LocationSelector />
  </div>
</template>

<script>
import LocationSelector from './components/LocationSelector.vue'; // Ajusta la ruta según tu estructura de carpetas

export default {
  name: 'App',
  components: {
    LocationSelector,
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
