<template>
  <form
    v-if="result.status !== 'success'"
    class="form-horizontal contact-form rvt-p-top-md"
    id="contactForm"
    @submit.prevent="submitForm"
    @reset="resetForm"
    ref="formRef"
  >
    <Container>
      <Row>
        <Column md="12" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column sm="12" md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="familyNumber" class="rvt-label rvt-text-medium"
                >Family #</label
              ></Column
            >
            <Column sm="6" md="3" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Family_Number"
                type="text"
                class="rvt-text-input"
                :class="{
                  'rvt-validation-danger': !formValidation.Family_Number,
                }"
                @input="validateField('Family_Number')"
                name="Family_Number"
                id="familyNumber"
                required
              />
            </Column>
            <Column sm="6" md="6" class="rvt-m-all-none rvt-p-all-none"
              ><label
                class="rvt-label rvt-text-medium rvt-ts-xxs rvt-ts-xs-md-up rvt-text-medium"
                >(4- or 5-digit number beginning with 35, 62, or 64)</label
              ></Column
            >
          </Row>
        </Column>
      </Row>
      <Row>
        <Column md="12" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="name" class="rvt-label rvt-text-medium"
                >Name</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Name"
                type="text"
                class="rvt-text-input"
                :class="{ 'rvt-validation-danger': !formValidation.Name }"
                @input="validateField('Name')"
                name="Name"
                id="name"
                required
              />
            </Column>
          </Row>
        </Column>
      </Row>
      <Row>
        <Column md="12" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="address" class="rvt-label rvt-text-medium"
                >Address</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Address"
                type="text"
                class="rvt-text-input"
                :class="{ 'rvt-validation-danger': !formValidation.Address }"
                @input="validateField('Address')"
                name="Address"
                id="address"
                required
              />
            </Column>
          </Row>
        </Column>
      </Row>
      <Row>
        <Column md="6" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="city" class="rvt-label rvt-text-medium"
                >City</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.City"
                type="text"
                class="rvt-text-input"
                :class="{ 'rvt-validation-danger': !formValidation.City }"
                @input="validateField('City')"
                name="City"
                id="city"
                required
              />
            </Column>
          </Row>
        </Column>
        <Column md="3" class="rvt-m-top-none rvt-p-lr-sm p-mobile-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="state" class="rvt-label rvt-text-medium"
                >State</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.State"
                type="text"
                class="rvt-text-input"
                :class="{ 'rvt-validation-danger': !formValidation.State }"
                @input="validateField('State')"
                name="State"
                id="state"
                required
              />
            </Column>
          </Row>
        </Column>
        <Column md="3" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="zip" class="rvt-label rvt-text-medium"
                >Zip</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.ZIP_Code"
                type="text"
                class="rvt-text-input"
                :class="{ 'rvt-validation-danger': !formValidation.ZIP_Code }"
                @input="validateField('ZIP_Code')"
                id="zip"
                name="ZIP_Code"
                v-maska
                data-maska="#####"
                required
              />
            </Column>
          </Row>
        </Column>
      </Row>
      <Row>
        <Column md="6" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <label for="phone" class="rvt-label rvt-text-medium"
                >Phone #</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Phone"
                type="text"
                class="rvt-text-input"
                :class="{ 'rvt-validation-danger': !formValidation.Phone }"
                @input="validateField('Phone')"
                id="phone"
                name="Phone"
                v-maska
                data-maska="(###) ###-####"
                required
              />
            </Column>
          </Row>
        </Column>
        <Column
          md="6"
          class="rvt-m-all-none rvt-p-left-sm rvt-p-right-none p-mobile-none"
        >
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="otherPhone" class="rvt-label rvt-text-medium"
                >Other Phone</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Other_Phone"
                type="text"
                class="rvt-text-input"
                id="otherPhone"
                name="Other_Phone"
                v-maska
                data-maska="(###) ###-####"
              />
            </Column>
          </Row>
        </Column>
      </Row>
      <p>
        The National Institute of Health, which sponsors many of our studies,
        requires that we report ethnicity and race for all study participants.
        Please mark <strong>ONE</strong> box in the table below. Start by
        choosing your ethnicity <strong>Hispanic or Latino</strong> or
        <strong>Not Hispanic or Latino</strong>. Then under either the
        <strong>Hispanic or Latino</strong> or the
        <strong>Not Hispanic or Latino</strong> column choose your race from the
        selections under the heading <strong>Race</strong>.
      </p>
      <div
        role="region"
        tabindex="0"
        class="form-group rvt-table-responsive"
        :class="{ 'table-highlight': !formValidation.Ethnicity_and_Race }"
        @change="validateField('Ethnicity_and_Race')"
        aria-labelledby="contact-form-table"
      >
        <table class="rvt-table rvt-ts-xs">
          <thead>
            <tr>
              <th></th>
              <th scope="col" colspan="2" class="rvt-text-center">Ethnicity</th>
            </tr>
            <tr>
              <th>Race</th>
              <th class="rvt-text-center">Hispanic or Latino</th>
              <th class="rvt-text-center">Not Hispanic or Latino</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(option, index) in ethnicityAndRaceOptions" :key="index">
              <td>{{ option }}</td>
              <td class="rvt-text-center">
                <input
                  type="radio"
                  :name="option"
                  :value="`Hispanic_and_${option}`"
                  v-model="form.Ethnicity_and_Race"
                />
              </td>
              <td class="rvt-text-center">
                <input
                  type="radio"
                  :name="option"
                  :value="`Not_Hispanic_and_${option}`"
                  v-model="form.Ethnicity_and_Race"
                />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="rvt-button-group rvt-m-top-md">
        <button
          class="rvt-button"
          type="submit"
          @click.prevent="submitForm"
          :disabled="submitting"
        >
          {{ submitting ? "Submitting Form" : "Submit Form" }}
          <span class="rvt-m-left-sm spinner" v-if="submitting"></span>
        </button>
        <button
          class="rvt-button rvt-button--danger"
          type="reset"
          @click.prevent="resetForm"
          :disabled="submitting"
        >
          Reset Form
        </button>
      </div>
    </Container>
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

const formRef = ref(null);
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

const ethnicityAndRaceOptions = [
  "American Indian/Alaska Native",
  "Asian",
  "Native Hawaiian or Other Pacific Islander",
  "Black or African American",
  "White",
  "More Than One Race",
];

const form = reactive({
  Submission_Type: "IU-LOAD - Update Contact Information",
  Family_Number: "",
  Name: "",
  Address: "",
  City: "",
  State: "",
  ZIP_Code: "",
  Phone: "",
  Other_Phone: "",
  Ethnicity_and_Race: "",
});

const formValidation = reactive({
  Family_Number: true,
  Name: true,
  Address: true,
  City: true,
  State: true,
  ZIP_Code: true,
  Phone: true,
  Ethnicity_and_Race: true,
});

const validateField = (field) => {
  if (field !== "Other_Phone") {
    formValidation[field] = !!form[field];
  }
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
    if (
      !["subjectLine", "Submission_Type", "FormType", "Other_Phone"].includes(
        field,
      )
    ) {
      form[field] = "";
      formValidation[field] = true;
    }
  });
  console.log("Form reset");
};
</script>
