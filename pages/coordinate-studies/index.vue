<template>
  <main id="main-content" class="rvt-layout__wrapper studies">
    <ContentDoc path="/coordinate-studies" />
    <div class="rvt-container-xl section-nav-mob">
      <Sidebar :navItems="studies && studies" id="section-nav-mob" />
    </div>
  </main>
</template>

<script setup>
import { studies } from "~/data/studies-sidebar.yml";
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
