<template>
  <main id="main-content" class="rvt-layout__wrapper sample-single">
    <LayoutWrapper>
      <Sidebar :nav-items="sidebar && sidebar" />
      <LayoutContent>
        <ContentDoc />
      </LayoutContent>
    </LayoutWrapper>
  </main>
</template>

<script setup>
import { sidebar } from "~/data/available-samples-sidebar.yml";
</script>

<style lang="scss">
.sample-single {
  .breadcrumb-wrap {
    .breadcrumb-li:last-child {
      text-transform: uppercase !important;
    }
  }
}
</style>
