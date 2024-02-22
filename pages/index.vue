<template v-slot="{ doc }">
  <NuxtLayout name="home">
    <Hero
      :background="heroImg"
      :overlayTitle="data?.hero?.overlayTitle"
      :cta="data.hero.cta"
    >
      <template #content>
        <p>
          The National Centralized Repository for Alzheimer's Disease and
          Related Dementias (NCRAD) is a biorepository operated by Indiana
          University with funding from the National Institute on Aging (NIA). We
          store biospecimens for research that focus on the etiology, early
          detection and therapeutic development for Alzheimer’s disease and
          related dementias (ADRD).
        </p>
        <p>
          NCRAD provides sample banking, accessing, and study coordination
          services to support ADRD research.
        </p>
      </template>
    </Hero>

    <StatGroup class="rvt-bg-black-000">
      <template v-for="(stat, index) in stats" :key="index">
        <Stat :stat="stat" />
      </template>
    </StatGroup>

    <Container size="lg">
      <text-block-with-image
        :image="{
          src: '/assets/home/home_block_ADRD.png',
          alt: 'Empowering ADRD Research',
        }"
      >
        <template #content>
          <h2 class="rvt-ts-md">Empowering ADRD Research</h2>
          <p>
            NCRAD has a significant impact on ADRD research by facilitating the
            sharing and distribution of uniformly collected, high-quality
            biospecimens from participants across the breadth of NIA-funded
            dementia research. Check out an NIA program director has to say
            about our contributions.
          </p>
          <a
            href="https://www.nia.nih.gov/health/alzheimers-and-dementia/about-adear-center"
            target="_blank"
            class="rvt-cta"
            >See what the NIA says about NCRAD</a
          >
        </template>
      </text-block-with-image>
    </Container>

    <gradient-container>
      <Container size="lg">
        <h2 class="rvt-color-white rvt-text-center rvt-ts-md">
          Latest Updates at NCRAD
        </h2>
        <Row class="rvt-p-tb-md">
          <Column
            md="6"
            lg="4"
            v-for="(update, index) in data.updates.cards"
            :key="index"
            class="rvt-flex"
          >
            <Card :title="update.title">
              <template #content>
                <div v-html="update.content" />
              </template>
              <template #actions>
                <div v-html="update.actions" />
              </template>
            </Card>
          </Column>
        </Row>
        <div class="rvt-text-center rvt-container-md">
          <p class="rvt-color-white">{{ data.updates.caption }}</p>
          <NuxtLink
            to="/access-samples/publications"
            class="rvt-button rvt-button--secondary-btn rvt-m-top-sm"
            >View all updates</NuxtLink
          >
        </div>
      </Container>
    </gradient-container>

    <Container size="lg" class="rvt-p-tb-xl">
      <text-block-with-card>
        <template #content>
          <h2 class="rvt-ts-md">
            Publications: Advancing Research with NCRAD Samples
          </h2>
          <p>
            Explore groundbreaking research articles and studies that have
            harnessed the resources and support provided by NCRAD. These
            publications represent significant strides in Alzheimer's disease
            and related dementias research.
          </p>
          <NuxtLink
            to="access-samples/publications"
            class="rvt-button rvt-button rvt-button--primary-btn"
            >Discover publications</NuxtLink
          >
        </template>

        <template #card>
          <Card :title="data.updates.publication.title">
            <template #content>
              <div v-html="data.updates.publication.content" />
            </template>
            <template #actions>
              <div v-html="data.updates.publication.actions" />
            </template>
          </Card>
        </template>
      </text-block-with-card>
    </Container>

    <Container class="rvt-bg-black-000">
      <div class="rvt-container-lg rvt-p-tb-xl">
        <div v-html="data.additionalResources.title" />
        <div v-html="data.additionalResources.content" />
        <Row class="rvt-m-tb-sm">
          <Column
            lg="2"
            md="2"
            sm="6"
            v-for="(image, index) in data.additionalResources.images"
            :key="index"
            style="height: 80px"
          >
            <a :href="image.link" target="_blank">
              <nuxt-img
                :src="image.src"
                :alt="image.alt"
                style="
                  width: 100%;
                  height: 100%;
                  object-fit: contain;
                  mix-blend-mode: multiply;
                "
                format="webp"
              />
            </a>
          </Column>
        </Row>
      </div>
    </Container>

    <Container size="lg">
      <text-block-with-image :image="data.information.image" reversed>
        <template #content>
          <div v-html="data.information.content" />
          <div v-if="data.information.button">
            <NuxtLink
              :to="data.information.button.url"
              class="rvt-button rvt-button--primary-btn"
              >{{ data.information.button.text }}</NuxtLink
            >
          </div>
        </template>
      </text-block-with-image>
    </Container>
  </NuxtLayout>
</template>

<script setup>
import { stats } from "~/data/stats.yml";
import heroImg from "@/content/assets/home/banner.png";
definePageMeta({
  layout: false,
});

const { data } = await useAsyncData(() => queryContent("/").findOne());
</script>
