<template>
    <v-app id="inspire">
      <v-main>
        <slot></slot>
      </v-main>
    </v-app>
  </template>

  <script>
  export default {
    name: "Layout",
    data: () => ({
      menu: false
    })
  };
  </script>
