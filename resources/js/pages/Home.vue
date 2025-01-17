<template>
    <div class="h-screen flex items-center bg-teal-50">
      <div class="max-w-lg mx-auto w-full p-6 shadow-lg rounded-lg bg-blue-500">
        <div v-if="user">
          <h1 class="text-2xl font-bold mb-10 mt-2">Bienvenido, {{ user.name }} {{ user.last_name }}</h1>
          <p class="text-lg text-white"><strong class="text-black mr-4">Nombre:</strong> {{ user.name }}</p>
          <p class="text-lg text-white"><strong class="text-black mr-4">Apellido:</strong> {{ user.last_name }}</p>
          <p class="text-lg text-white"><strong class="text-black mr-4">Teléfono:</strong> {{ user.phone_number }}</p>
          <p class="text-lg text-white"><strong class="text-black mr-4">Email:</strong> {{ user.email }}</p>

          <button
            @click="logout"
            class="w-full h-12 bg-white hover:bg-blue-950 text-black hover:text-white rounded-md transition-all text-lg mt-10"
          >
            Cerrar sesión
          </button>
        </div>
        <div v-else class="text-center">
          <p class="text-lg">Cargando...</p>
        </div>
      </div>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        user: null,
      };
    },
    mounted() {
      this.getUserData();
    },
    methods: {
  async getUserData() {
    try {
      const response = await axios.get('/user');
      this.user = response.data;
    } catch (error) {
      console.error('Error al obtener la información del usuario:', error);
      alert("Error al iniciar sesión.");
    }
  },
  async logout() {
      try {
        window.location.href = "/";
      } catch (error) {
        console.error("Error al cerrar sesión:", error);
      }
    },
    },
  };
  </script>
