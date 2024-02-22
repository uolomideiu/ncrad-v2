<template>
  <div class="available-sample-single">
    <h1 class="rvt-text-medium rvt-text-uppercase rvt-ts-md rvt-m-top-sm-md-up">
      {{ data?.title }}
    </h1>
    <slot name="summary" />

    <h2 class="rvt-ts-md">Study Subjects</h2>
    <slot name="subjects" />

    <h2 class="rvt-ts-md">Available Data</h2>
    <slot name="data" />

    <h2 class="rvt-ts-md">Available Biospecimens</h2>
    <slot name="biospecimens" />

    <ul class="samples-link-group">
      <PriceStructure />
      <li>
        <NuxtLink
          v-if="data.links.catalog"
          :href="`/access-samples/catalogs?catalog=${data.title}`"
          class="rvt-cta"
          >Catalog</NuxtLink
        >
        <!-- <strong v-else>Catalog Coming Soon</strong> -->
      </li>
      <li v-if="data.links.biospecimens">
        <NuxtLink
          :href="data.links.biospecimens"
          class="rvt-cta"
          target="_blank"
          >Request Access to Biospecimens</NuxtLink
        >
      </li>
      <li v-if="data.links.mop">
        <NuxtLink
          :href="data.links.mop"
          target="_blank"
          class="rvt-cta download"
          >Study Specific Manual of Procedures</NuxtLink
        >
      </li>

      <template v-if="data && data.links && data.links.more">
        <li v-for="(link, index) in data.links.more" :key="index">
          <NuxtLink
            v-if="link.url"
            :href="link.url"
            class="rvt-cta"
            target="_blank"
          >
            {{ link.title }}
          </NuxtLink>
          <strong v-else>{{ link.text }}</strong>
        </li>
      </template>
    </ul>
  </div>
</template>

<script setup>
import { useRoute } from "vue-router";
import { onMounted, ref } from "vue";
import PriceStructure from "./PriceStructure.vue";
const route = useRoute();
const data = ref(null);

// const { data } = await useAsyncData(
//   `content-available-samples-${route.fullPath}`,
//   async () => {
//     return queryContent().where({ _path: route.fullPath }).findOne();
//   },
// );
onMounted(async () => {
  const result = await useAsyncData(
    `content-available-samples-${route.fullPath}`,
    async () => {
      return queryContent().where({ _path: route.fullPath }).findOne();
    },
  );
  data.value = result.data;
});
</script>

<style lang="scss">
.available-sample-single {
  a {
    text-decoration: none;
    font-weight: bold;
  }
}
</style>
