<template>
  <div class="rvt-p-top-xl">
    <Publications :pubs="pubs" :per-page="10" />
  </div>
</template>

<script setup>
import { pubs } from "~/data/publications2.yml";
</script>
