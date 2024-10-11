<template>
    <div>
      <h1>Selecciona tu Ubicación</h1>
      <form>
        <label for="provincias">Provincias:</label>
        <select id="provincias" v-model="selectedProvince" @change="fetchCantones">
          <option value="">Seleccione una provincia</option>
          <option v-for="provincia in provincias" :key="provincia.id" :value="provincia.id">
            {{ provincia.nombre }}
          </option>
        </select>
  
        <label for="cantones">Cantones:</label>
        <select id="cantones" v-model="selectedCanton" @change="fetchDistritos" :disabled="!cantones.length">
          <option value="">Seleccione un cantón</option>
          <option v-for="canton in cantones" :key="canton.id" :value="canton.id">
            {{ canton.nombre }}
          </option>
        </select>
  
        <label for="distritos">Distritos:</label>
        <select id="distritos" v-model="selectedDistrito" :disabled="!distritos.length">
          <option value="">Seleccione un distrito</option>
          <option v-for="distrito in distritos" :key="distrito.id" :value="distrito.id">
            {{ distrito.nombre }}
          </option>
        </select>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        provincias: [],
        cantones: [],
        distritos: [],
        selectedProvince: '', // Provincia seleccionada
        selectedCanton: '', // Cantón seleccionado
        selectedDistrito: '' // Distrito seleccionado
      };
    },
    mounted() {
      this.fetchProvincias();
    },
    methods: {
      fetchProvincias() {
        fetch('http://localhost:8000/provincias.php')
          .then(response => response.json())
          .then(data => {
            this.provincias = data;
          });
      },
      fetchCantones() {
        if (this.selectedProvince) {
          fetch('http://localhost:8000/cantones.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: this.selectedProvince }), // Enviar id de provincia
          })
            .then(response => response.json())
            .then(data => {
              this.cantones = data;
              this.distritos = []; // Limpiar los distritos al cambiar de cantón
            });
        } else {
          this.cantones = [];
          this.distritos = []; // Limpiar distritos si no hay provincia seleccionada
        }
      },
      fetchDistritos() {
        if (this.selectedCanton) {
          fetch('http://localhost:8000/distritos.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: this.selectedCanton }), // Enviar id del cantón
          })
            .then(response => response.json())
            .then(data => {
              this.distritos = data; // Asignar los distritos recibidos
            });
        } else {
          this.distritos = []; // Limpiar distritos si no hay cantón seleccionado
        }
      }
    }
  };
  </script>
  
  <style scoped>
  /* Estilos opcionales */
  h1 {
    margin-bottom: 20px;
  }
  label {
    display: block;
    margin: 10px 0 5px;
  }
  select {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
  }
  </style>
  