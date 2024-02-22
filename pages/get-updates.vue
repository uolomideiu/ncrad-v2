<template>
  <NuxtLayout name="single">
    <ContentDoc path="/get-updates" />
    <Container size="md" class="rvt-m-left-none rvt-p-left-none">
      <iframe
        title="PI Dissemination List"
        class="fireform-embedded"
        src="https://iudcdi-fireform.eas.iu.edu/online/embed/index/pilist"
        marginheight="0"
        marginwidth="0"
        display="block"
        border="none"
        outline="none"
        margin="none"
        scrolling="no"
        frameborder="0"
        height="2048"
        autocomplete="off"
        style="width: 1px; min-width: 100%; overflow: hidden"
      >
      </iframe>
    </Container>
  </NuxtLayout>
</template>

<script setup>
definePageMeta({
  layout: false,
});
</script>
