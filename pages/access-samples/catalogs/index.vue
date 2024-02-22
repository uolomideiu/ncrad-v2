<template>
  <main id="main-content" class="rvt-layout__wrapper sample-single">
    <LayoutWrapper class="acknowledgement">
      <Sidebar :nav-items="sidebar && sidebar" />
      <div class="rvt-layout__content rvt-c-top-padding rvt-p-bottom-none">
        <Breadcrumbs :pagePaths="pagePaths" />
        <h1
          class="rvt-m-top-sm rvt-m-bottom-xxs rvt-ts-md rvt-text-uppercase rvt-text-medium"
        >
          Data Catalogs
        </h1>
        <Container class="catalog-page">
          <Row>
            <Column
              sm="12"
              md="12"
              lg="6"
              class="rvt-p-left-none rvt-m-bottom-md"
            >
              <h2 class="rvt-ts-md ncrad-green rvt-text-bold">New users</h2>
              <p>
                New users must complete the Data Request Agreement before
                receiving access to NCRAD's data catalogs. Please click
                'Register' below to be taken to the Data Request Agreement.
              </p>
              <NuxtLink
                :to="`/access-samples/catalogs/data-agreement${catalogQuery}`"
                class="rvt-button rvt-button--primary-btn"
                id="height-2-5"
                >Register</NuxtLink
              >
            </Column>

            <Column sm="12" md="12" lg="6" class="rvt-p-left-none">
              <h2 class="rvt-ts-md ncrad-green rvt-text-bold">
                Existing Users
              </h2>
              <p>
                New users must complete the Data Request Agreement before
                receiving access to NCRAD's data catalogs. Please click
                'Register' below to be taken to the Data Request Agreement.
              </p>

              <NuxtLink
                class="rvt-button rvt-button--primary-btn rvt-m-right-md"
                id="height-2-5"
                to="https://catalog.ncrad.org/ALLFTD"
                target="_blank"
                >View Catalogs</NuxtLink
              >
              <NuxtLink
                to="https://shinyapps.medgen.iupui.edu/account_management/"
                id="height-2-5"
                class="rvt-button rvt-button--primary"
                target="_blank"
                >Reset Password</NuxtLink
              >
            </Column>
          </Row>
        </Container>
      </div>
    </LayoutWrapper>
  </main>
</template>

<script setup>
import { sidebar } from "~/data/available-samples-sidebar.yml";
import { useRoute } from "vue-router";

const route = useRoute();
const catalog = route.query.catalog;
const catalogQuery = catalog ? `?catalog=${catalog}` : "";
const pagePaths = ["", "access-samples", "catalogs"];
</script>
