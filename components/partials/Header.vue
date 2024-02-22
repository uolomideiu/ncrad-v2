<template>
  <Header
    :logo="header.logo"
    :topMenu="header.menu.topMenu"
    :mainMenu="header.menu.mainMenu"
  />
</template>

<script setup>
import config from "@/config";
const { header } = config;
</script>
