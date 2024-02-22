<template>
  <main id="main-content" class="rvt-layout__wrapper studies">
    <LayoutWrapper>
      <Sidebar :nav-items="studies && studies" />
      <LayoutContent>
        <HeaderBlockTwo
          :title="data?.title"
          class="rvt-m-bottom-md"
          :image="data?.intro?.image"
        >
          <template #content>
            <div v-html="data?.intro?.content" />
          </template>
        </HeaderBlockTwo>
        <h2 class="rvt-ts-md" v-if="data?.tableSectionTitle">
          {{ data?.tableSectionTitle }}
        </h2>
        <div v-if="data?.tables">
          <template v-for="(table, index) in data?.tables" :key="index">
            <StudyTable
              :title="table.title"
              :subTitle="table.subTitle"
              :headers="table.headers"
              :rows="table.rows"
              :tableCaption="table.caption"
              class="rvt-p-left-none rvt-m-left-none rvt-m-bottom-md"
            />
          </template>
        </div>
        <div></div>
        <GradientContainer class="rvt-p-tb-xl" v-if="data?.resources">
          <h2 class="rvt-ts-md rvt-color-white rvt-text-center">
            Study Resources
          </h2>
          <Container size="xl">
            <Row class="rvt-p-tb-lg studies">
              <Column
                lg="6"
                md="12"
                sm="12"
                v-for="(card, index) in data?.resources"
                :key="index"
                class="rvt-flex"
              >
                <Card :title="card.title">
                  <template #content>
                    <div v-html="card.content" />
                  </template>
                  <template #actions v-if="card.actions">
                    <div
                      v-for="(action, actionIndex) in card.actions"
                      :key="actionIndex"
                    >
                      <NuxtLink
                        v-if="!action.external"
                        :to="action?.url"
                        :class="{
                          'rvt-cta': true,
                          [action?.type]: action?.type,
                        }"
                        :target="
                          action?.type === 'download' ? '_blank' : '_self'
                        "
                      >
                        {{ action?.text }}
                      </NuxtLink>
                      <a
                        v-else
                        :href="action?.url"
                        target="_blank"
                        rel="noopener noreferrer"
                        :class="{
                          'rvt-cta': true,
                          [action?.type]: action?.type,
                        }"
                        :download="action?.type === 'download'"
                      >
                        {{ action?.text }}
                      </a>
                    </div>
                  </template>
                </Card>
              </Column>
            </Row>
          </Container>
        </GradientContainer>

        <Container size="lg" class="rvt-p-tb-xl">
          <TextBlockGreyCard>
            <template #left>
              <h2 class="rvt-ts-md">Sample Services at NCRAD</h2>
              <p>
                Looking for a biorepository to bank your samples? Check out
                NCRAD for sample banking. We can bank samples for new studies,
                ongoing studies, and closed studies.
              </p>
              <Button href="/bank-samples" variant="primary-btn"
                >Bank samples at NCRAD</Button
              >
            </template>
            <template #right>
              <p>
                Looking for samples for your research? Check out NCRAD’s
                inventory of available samples. Our Biomarker Analysis
                Laboratory (BAL) provide insights through standardized
                processing and cross-laboratory comparability studies.
              </p>
              <NuxtLink to="/access-samples" class="rvt-cta"
                >Access samples at NCRAD</NuxtLink
              >
              <NuxtLink to="/biomarker-analysis" class="rvt-cta"
                >Learn more about BAL</NuxtLink
              >
            </template>
          </TextBlockGreyCard>
        </Container>
      </LayoutContent>
    </LayoutWrapper>
  </main>
</template>

<script setup>
import { useRoute } from "vue-router";
import { studies } from "~/data/studies-sidebar.yml";
const route = useRoute();

const { data } = await useAsyncData(
  `content-coordinate-studies-${route.fullPath}`,
  async () => {
    return queryContent().where({ _path: route.fullPath }).findOne();
  },
);

if (!data.value) {
  throw createError({
    statusCode: 404,
    statusMessage: "Page Not Found",
  });
}
</script>

<style lang="scss">
.studies {
  row-gap: 2rem;
  .breadcrumb-wrap {
    .breadcrumb-li:last-child {
      text-transform: uppercase !important;
    }
  }

  .card--actions {
    a {
      display: block;
      text-wrap: balance;
      font-size: 0.9em;
      font-weight: 700;
    }
  }

  .rvt-card__body {
    flex-grow: initial;
  }

  #section-nav {
    position: relative;
    .rvt-sidenav {
      position: sticky;
      top: 0;
    }
  }
}
</style>
