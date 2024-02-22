// https://nuxt.com/docs/api/configuration/nuxt-config
import yaml from "@rollup/plugin-yaml";
import path from "path";

export default defineNuxtConfig({
  modules: [
    "nuxt-content-assets",
    "@nuxt/image",
    "@nuxt/content",
  ],
  css: ["@/style-assets/main.scss"],
  image: {
    dir: ".nuxt/content-assets/public",
  },
  app: {
    head: {
      title:
        "NCRAD - National Centralized Repository for Alzheimer's Disease and Related Dementias",
      htmlAttrs: { lang: "en" },
      meta: [
        { charset: "utf-8" },
        { name: "viewport", content: "width=device-width, initial-scale=1" },
        {
          hid: "description",
          name: "description",
          content:
            "NCRAD - National Centralized Repository for Alzheimer's Disease and Related Dementias",
        },
        { name: "format-detection", content: "telephone=no" },
        { name: "msapplication-TileColor", content: "#006298" },
        { name: "theme-color", content: "#006298" },
      ],
      charset: "utf-8",
    },
    baseURL: "/ncrad-test/",
  },
  vite: {
    plugins: [yaml()],
    vue: {
      template: {
        compilerOptions: {
          isCustomElement: (tag) => tag.startsWith("rvt-icon"),
        },
      },
    },
  },
  components: {
    global: true,
    dirs: ["~/components"],
  },
  nitro: {
    output: {
      publicDir: path.join(__dirname, "web"),
    },
  },
  runtimeConfig: {
    public: {
      grecaptcha: {
        hideBadge: true,
        mode: "base",
        siteKey: "6Le0fP0oAAAAAAxoIlG8sdtdSS_9oPla6Rxe4UCF",
        version: 3,
      },
    },
  },
  ssr: true,
  devtools: { enabled: false },
  experimental: {
    viewTransition: false,
  },
});
