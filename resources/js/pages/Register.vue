<template>
    <div class="max-w-lg mx-auto mt-16 p-8 shadow-lg rounded-lg bg-blue-500">
      <h1 class="text-3xl font-semibold mb-8 text-center">Crear Usuario</h1>
      <form @submit.prevent="submitForm">
        <div class="mb-6">
          <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
          <input
            v-model="name"
            id="name"
            type="text"
            required
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="mb-6">
          <label for="last_name" class="block text-sm font-medium text-gray-700">Apellido</label>
          <input
            v-model="last_name"
            id="last_name"
            type="text"
            required
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <div class="mb-6">
          <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
          <input
            v-model="email"
            id="email"
            type="email"
            required
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
          <p v-if="!email" class="text-sm text-red-600 mt-2">El correo debe ser válido</p>
        </div>

        <div class="mb-6">
          <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
          <input
            v-model="password"
            id="password"
            type="password"
            required
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
          <p v-if="password && password.length < 6" class="text-sm text-red-600 mt-2">
            La contraseña debe tener al menos 6 caracteres
          </p>
        </div>

        <div class="mb-6">
          <label for="phone_number" class="block text-sm font-medium text-gray-700">Número de Teléfono</label>
          <input
            v-model="phone_number"
            id="phone_number"
            type="tel"
            required
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="(XXX) XXX-XXXX"
          />
        </div>

        <div class="mt-6 text-center">
          <button
            type="submit"
            class="w-full h-12 bg-white hover:bg-blue-950 text-black hover:text-white rounded-md transition-all text-lg mt-10"
          >
            Crear Cuenta
          </button>
        </div>
      </form>
    </div>
  </template>

  <script>
  import axios from "axios";

  export default {
    name: "CreateUser",
    data() {
      return {
        name: "",
        last_name: "",
        email: "",
        password: "",
        phone_number: "",
      };
    },
    methods: {
      async submitForm() {
        try {
          const response = await axios.post(`http://${window.location.hostname}:${window.location.port}/register`, {
            name: this.name,
            last_name: this.last_name,
            email: this.email,
            password: this.password,
            phone_number: this.phone_number,
          }, {
            headers: {
              "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            },
          });

          if (response.data.success) {
            alert("Usuario Creado con exito")
            window.location.href = '/';
          }
        } catch (error) {
          alert(error.response?.data?.message || "Error al crear la cuenta, contacte al administrador");
        }
      },
    },
  };
  </script>

