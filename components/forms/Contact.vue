<template>
  <form
    v-if="result.status !== 'success'"
    class="form"
    ref="formRef"
    @submit.prevent="submitForm"
  >
    <div class="input-group">
      <label for="name" class="rvt-label">Name</label>
      <input
        type="text"
        id="name"
        class="rvt-text-input"
        v-model="form.Name"
        :class="{ 'rvt-validation-danger': !formValidation.Name }"
        name="Name"
        @input="validateField('Name')"
      />
    </div>
    <div class="input-group">
      <label for="email" class="rvt-label">Email</label>
      <input
        type="email"
        id="email"
        class="rvt-text-input"
        v-model="form.Email"
        name="Email"
        :class="{ 'rvt-validation-danger': !formValidation.Email }"
        @input="validateField('Email')"
      />
    </div>
    <div class="input-group">
      <label for="message" class="rvt-label">Yor message</label>
      <textarea
        id="message"
        class="rvt-textarea"
        name="Message"
        v-model="form.Message"
        :class="{ 'rvt-validation-danger': !formValidation.Message }"
        @input="validateField('Message')"
      ></textarea>
    </div>

    <p class="rvt-ts-xs">
      <em
        >If you are contacting us regarding an emergency autopsy for the NCRAD
        or LOAD studies, please call 1-800-526-2839. If this is after hours,
        please page 317-312-2714 instead. Thank you!</em
      >
    </p>
    <Button
      class="rvt-button"
      type="submit"
      @click.prevent="submitForm"
      :disabled="submitting"
      >{{ submitting ? "Submitting Form" : "Submit Form" }}
      <span class="rvt-m-left-sm spinner" v-if="submitting"></span
    ></Button>
  </form>

  <div
    class="confirmation"
    id="confirmation"
    v-if="result.status === 'success'"
    ref="confirmation"
  >
    <h3 class="rvt-ts-md rvt-m-top-md bordered-header">
      Thank you for contacting NCRAD
    </h3>
    <p class="rvt-m-all-none">The following information was sent:</p>
    <table class="rvt-table-stripes rvt-m-tb-md">
      <tr v-for="(value, key) in result.data" :key="key">
        <th scope="row" class="rvt-text-medium">{{ key }}</th>
        <td>{{ value }}</td>
      </tr>
    </table>
  </div>

  <div
    v-if="result.status === 'error'"
    class="rvt-alert rvt-alert--danger [ rvt-m-top-md ]"
    role="alert"
    aria-labelledby="error-alert-title"
    data-rvt-alert="error"
  >
    <p class="rvt-alert__message">{{ result.message }}</p>
    <button class="rvt-alert__dismiss" data-rvt-alert-close>
      <span class="rvt-sr-only">Dismiss this alert</span>
      <svg fill="currentColor" width="16" height="16" viewBox="0 0 16 16">
        <path
          d="m3.5 2.086 4.5 4.5 4.5-4.5L13.914 3.5 9.414 8l4.5 4.5-1.414 1.414-4.5-4.5-4.5 4.5L2.086 12.5l4.5-4.5-4.5-4.5L3.5 2.086Z"
        ></path>
      </svg>
    </button>
  </div>
</template>

<script setup>
import { reactive, onMounted } from "vue";

onMounted(() => {
  const nuxtApp = useNuxtApp();
  nuxtApp.$recaptcha.init();
});

const formRef = ref(null);
const submitting = ref(false);
const result = reactive({
  status: "",
  message: "",
  data: null,
});

const form = reactive({
  FormType: "Contact",
  Name: "",
  Email: "",
  Message: "",
});

const formValidation = reactive({
  Family_Number: true,
  Name: true,
  Email: true,
  Message: true,
});

const validateField = (field) => {
  formValidation[field] = !!form[field];
};

const submitForm = async () => {
  Object.keys(form).forEach(validateField);

  if (Object.values(formValidation).every((status) => status)) {
    submitting.value = true;
    try {
      const response = await fetch("http://localhost/server-test/server.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-Recaptcha-Token": await useNuxtApp().$recaptcha.execute("submit"),
        },
        body: JSON.stringify(form),
      });

      const data = await response.json();
      result.status = data.status;
      result.message = data.message;
      result.data = data.data;
      submitting.value = false;
      if (data.status === "success") {
        resetForm();
        formRef.value.scrollIntoView({ behavior: "smooth", block: "start" });
      }
    } catch (e) {
      submitting.value = false;
      console.error("Failed to submit form:", e);
    }
  } else {
    await new Promise((resolve) => setTimeout(resolve, 0));
    alert(
      "Some required fields were left blank. Please fill out remaining fields highlighted in red.",
    );
  }
};

const resetForm = () => {
  Object.keys(form).forEach((field) => {
    if (!["FormType"].includes(field)) {
      form[field] = "";
      formValidation[field] = true;
    }
  });
};
</script>
