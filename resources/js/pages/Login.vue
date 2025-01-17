<template>
    <div class="h-screen flex items-center bg-teal-50">
        <div class="mx-auto w-1/4 p-6 shadow-lg rounded-lg bg-blue-500">
        <h1 class="text-2xl font-semibold mb-6 text-center">Iniciar sesión</h1>
        <form @submit.prevent="submitForm">
            <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
            <input
                v-model="email"
                id="email"
                type="email"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <p v-if="email && email.length < 10" class="text-sm text-blue-900">
                El correo debe ser válido
            </p>
            </div>

            <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input
                v-model="password"
                id="password"
                type="password"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <p v-if="password && password.length < 6" class="text-sm text-blue-900">
                La contraseña debe tener al menos 6 caracteres
            </p>
            </div>

            <div class="flex justify-around">
                <div class="mt-4 text-center">
                <button
                    type="submit"
                    class="hover:text-white text-lg bg-white hover:bg-blue-950 w-32 h-8 rounded-md transition-all"
                >
                    Iniciar sesión
                </button>
                </div>

                <div class="mt-4 text-center ">
                <button
                @click.prevent="goToCreateAccount"
                class="hover:text-white text-lg bg-white hover:bg-blue-950 w-32 h-8 rounded-md transition-all"
                >
                    Crear cuenta
                </button>
                </div>
            </div>

        </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
      valid: false,
    };
  },
  methods: {
    async submitForm() {
      try {
        const response = await axios.post(`http://127.0.0.1:${window.location.port}/login`, {
          email: this.email,
          password: this.password,
        }, {
          headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
          },

        });
        if (response.data.success) {
        window.location.href = '/home';
      }
      } catch (error) {
        console.error("Error:", error.response?.data || error.message);
        alert(error.response?.data?.message || "Error al iniciar sesión.");
      }
    },
    goToCreateAccount() {
      window.location.href = '/register';
    },
  },
};
</script>
