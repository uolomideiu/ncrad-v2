<template>
  <div>
    <PartialsHeader />
    <main
      id="main-content"
      class="rvt-layout__wrapper rvt-layout__wrapper--single rvt-container-xl single-layout"
    >
      <div class="rvt-layout__content rvt-p-top-md">
        <Breadcrumbs class="rvt-m-tb-md" />
        <div>
          <slot />
        </div>
      </div>
    </main>
    <PartialsFooter />
  </div>
</template>

<style lang="scss">
.single-layout {
  .sidebar-trigger {
    display: none !important;
  }
}
</style>
