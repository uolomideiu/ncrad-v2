<template>
  <Footer
    :quickLinks="footer.quickLinks"
    :siteMap="footer.siteMap"
    :contact="footer.contact"
    :footerText="footer.footerText"
    :footerBaseLinks="footer.footerBaseLinks"
    :hours="footer.hours"
  />
</template>

<script setup>
import appConfig from "../config.json";
const { footer } = appConfig;
</script>
