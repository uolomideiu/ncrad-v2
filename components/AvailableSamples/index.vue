<template>
  <Samples title="Available Samples" filterable :studies="studies && studies" />
</template>

<script setup>
import { studies } from "~/data/available-samples.yml";
</script>
