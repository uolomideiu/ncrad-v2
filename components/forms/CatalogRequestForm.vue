<template>
  <Container id="requestData" v-if="result.status !== 'success'">
    <Row>
      <Column sm="12" md="10" class="rvt-m-all-none rvt-p-all-none">
        <h2 class="rvt-ts-20 rvt-ts-32-md-up rvt-m-top-md bordered">
          Principal Investigator Information
        </h2>
        <p>
          Please enter the information requested below. All applications are
          reviewed by NCRAD within one week of submission. Please provide broad
          research interests so we can provide you with additional relevant
          information in the future.
        </p>
        <form
          class="form-horizontal"
          id="dataAgreementForm"
          @submit="submitForm"
        >
          <FormsFormGroup
            v-for="field in formFields"
            :key="field.inputId"
            :label="field.label"
            :inputName="field.inputName"
            :inputId="field.inputId"
            :inputType="field.inputType"
            :error="field.error"
            :required="field.required"
            v-model="formData[field.inputName]"
          />

          <div
            class="rvt-alert rvt-alert--danger [ rvt-m-top-md ]"
            role="alert"
            aria-labelledby="error-alert-title"
            data-rvt-alert="error"
            v-if="!formSubmittedSuccessfully && formResult"
          >
            <p class="rvt-alert__message">{{ formResult }}</p>
            <button class="rvt-alert__dismiss" data-rvt-alert-close>
              <span class="rvt-sr-only">Dismiss this alert</span>
              <svg
                fill="currentColor"
                width="16"
                height="16"
                viewBox="0 0 16 16"
              >
                <path
                  d="m3.5 2.086 4.5 4.5 4.5-4.5L13.914 3.5 9.414 8l4.5 4.5-1.414 1.414-4.5-4.5-4.5 4.5L2.086 12.5l4.5-4.5-4.5-4.5L3.5 2.086Z"
                ></path>
              </svg>
            </button>
          </div>

          <div class="rvt-m-top-md rvt-row">
            <div class="rvt-cols-6-md rvt-m-bottom-sm">
              <button
                class="rvt-button w-100 rvt-flex rvt-justify-center"
                type="submit"
                :disabled="submitting"
              >
                {{ submitting ? "Submitting Form" : "Submit" }}
                <span class="rvt-m-left-sm spinner" v-if="submitting"></span>
              </button>
            </div>
            <div class="rvt-cols-6-md">
              <p class="rvt-p-all-none rvt-m-all-none">
                <span
                  >By clicking <em>Submit</em> you are agreeing to all terms of
                  NCRAD's Data Agreement outlined above</span
                >
              </p>
            </div>
          </div>
        </form>
      </Column>
    </Row>
  </Container>

  <Container v-if="result.status === 'success'">
    <div class="confirmation" id="confirmation" ref="confirmation">
      <table class="rvt-table-stripes rvt-m-tb-md">
        <tr v-for="(value, key) in result.data" :key="key">
          <th scope="row" class="rvt-text-medium">{{ key }}</th>
          <td>{{ value }}</td>
        </tr>
      </table>
    </div>
  </Container>

  <Container v-if="result.status === 'error'">
    <div
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
  </Container>
</template>

<script setup>
import { onMounted, ref } from "vue";
const emit = defineEmits(["status-updated"]);
const submitting = ref(false);
const result = reactive({
  status: "",
  message: "",
  data: null,
});

onMounted(() => {
  const nuxtApp = useNuxtApp();
  nuxtApp.$recaptcha.init();
});

const props = defineProps({
  catalog: {
    type: String,
    required: false,
  },
});

const formData = reactive({
  Catalog: props.catalog || "",
  First_Name: "",
  Last_Name: "",
  Email: "",
  Degree: "",
  Position: "",
  Institution: "",
  Department: "",
  Sector: "",
  Country: "",
  Interest: "",
});

const formFields = reactive([
  {
    label: "First Name",
    inputName: "First_Name",
    inputId: "first_name",
    inputType: "text",
    required: true,
  },
  {
    label: "Last Name",
    inputName: "Last_Name",
    inputId: "last_name",
    inputType: "text",
    required: true,
  },
  {
    label: "Email",
    inputName: "Email",
    inputId: "email",
    inputType: "email",
    required: true,
  },
  {
    label: "Degree",
    inputName: "Degree",
    inputId: "degree",
    inputType: "text",
    required: true,
  },
  {
    label: "Academic Position",
    inputName: "Position",
    inputId: "position",
    inputType: "text",
    required: true,
  },
  {
    label: "Institution",
    inputName: "Institution",
    inputId: "institution",
    inputType: "text",
    required: true,
  },
  {
    label: "Department",
    inputName: "Department",
    inputId: "department",
    inputType: "text",
    required: true,
  },
  {
    label: "Sector",
    inputName: "Sector",
    inputId: "sector",
    inputType: "text",
    required: true,
  },
  {
    label: "Country",
    inputName: "Country",
    inputId: "country",
    inputType: "text",
    required: true,
  },
  {
    label: "Broad Research Interest",
    inputName: "Interest",
    inputId: "interest",
    inputType: "text",
    required: true,
  },
]);

const submitForm = async (e) => {
  e.preventDefault();
  submitting.value = true;
  try {
    const response = await fetch(
      "http://localhost/server-test/catalog-register.php",
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-Recaptcha-Token": await useNuxtApp().$recaptcha.execute("submit"),
        },
        body: JSON.stringify(formData),
      },
    );

    const data = await response.json();
    result.status = data.status;
    result.message = data.message;
    result.data = data.data;
    submitting.value = false;
    emit("status-updated", result);
    resetForm();
  } catch (e) {
    submitting.value = false;
    console.error("Failed to submit form:", e);
  }
};

const resetForm = () => {
  Object.keys(formData).forEach((field) => {
    if (!["Catalog"].includes(field)) {
      formData[field] = "";
    }
  });
};
</script>

<style>
.bordered {
  border-bottom: 1px solid var(--secondary);
}
</style>
