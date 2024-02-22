<template>
  <main id="main-content" class="rvt-layout__wrapper">
    <ContentDoc path="/access-samples/available-samples" />
    <div class="rvt-container-xl section-nav-mob">
      <Sidebar :navItems="sidebar" id="section-nav-mob" />
    </div>
  </main>
</template>

<script setup>
import { sidebar } from "~/data/available-samples-sidebar.yml";
</script>

<style lang="scss">
.section-nav-dktp {
  @media (max-width: 739px) {
    display: none;
  }
}

.section-nav-mob {
  display: none;
  @media (max-width: 739px) {
    display: block;
  }
}
</style>
