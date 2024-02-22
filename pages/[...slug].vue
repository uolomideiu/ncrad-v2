<template>
  <main id="main-content" class="rvt-layout__wrapper">
    <ContentDoc />
    <div class="rvt-container-xl section-nav-mob">
      <Sidebar :navItems="data?.sidebar" id="section-nav-mob" />
    </div>
  </main>
</template>

<script setup>
import { useRoute } from "vue-router";
const route = useRoute();

const { data } = await useAsyncData(`content-${route.fullPath}`, async () => {
  return queryContent().where({ _path: route.fullPath }).findOne();
});

if (!data.value) {
  throw createError({
    statusCode: 404,
    statusMessage: "Page Not Found",
  });
}
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
