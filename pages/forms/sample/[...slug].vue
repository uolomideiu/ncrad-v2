<template>
  <main
    id="main-content"
    class="rvt-flex rvt-flex-column rvt-grow-1 sample-form"
  >
    <div class="rvt-bg-black-000 rvt-border-bottom rvt-p-top-xl">
      <div class="rvt-container-xl rvt-prose rvt-flow rvt-p-bottom-xl">
        <div class="">
          <h1 class="rvt-ts-md rvt-text-bold">{{ data.title }}</h1>
          <p>
            Please complete this form when sending {{ data.study }} samples to
            NCRAD. The form can be submitted electronically or it may be printed
            and faxed. <br />
            <strong
              >If faxing the form, please do so as soon as possible after the
              sample is taken.</strong
            >
            NCRAD would like to receive this form before the sample arrives.
          </p>
        </div>
      </div>
    </div>

    <div class="rvt-layout__wrapper [ rvt-p-tb-sm ] rvt-display-none">
      <div class="rvt-container-xl">
        <div class="row">
          <div class="rvt-cols-8-md rvt-flow rvt-p-left-none">
            <Accordion :accordions="instructions" />
            <form class="forms rvt-p-top-xs" @submit="submitForm">
              <p>
                ( <span class="rvt-color-orange-500 rvt-text-bold">*</span> =
                required field for submission )
              </p>
              <div
                class="form-section rvt-m-bottom-lg"
                v-for="(section, sectionKey, sectionIndex) in data.sections"
                :key="sectionKey"
              >
                <h3
                  v-if="section.type === 'subsection'"
                  class="rvt-ts-sm bordered-header"
                >
                  {{ sectionKey }}
                </h3>
                <h2 v-else class="bordered-header rvt-ts-md">
                  {{ sectionKey }}
                </h2>

                <div v-if="section.fields">
                  <div
                    :class="[
                      section.noColumns ? 'form-field-list' : 'form-field-grid',
                    ]"
                  >
                    <div
                      v-for="(field, fieldKey, fieldIndex) in section.fields"
                      :key="fieldKey"
                    >
                      <div class="form-field" v-if="field">
                        <div class="field-text">
                          <label
                            :for="formatAttr(sectionKey, fieldIndex)"
                            class="rvt-label rvt-text-bold"
                          >
                            <span v-html="fieldKey"></span>
                            <span
                              class="rvt-color-orange-500 rvt-text-bold"
                              v-if="field.required !== false"
                              >*</span
                            >
                          </label>
                          <p v-if="field && field.description">
                            {{ field.description }}
                          </p>
                        </div>

                        <div class="input-group">
                          <div v-if="field.type === 'select'">
                            <select
                              :id="formatAttr(sectionKey, fieldIndex)"
                              class="rvt-select rvt-m-bottom-sm"
                              :name="formatAttr(sectionKey, sectionIndex)"
                              :required="field.required !== false"
                              v-on:input="
                                updateForm($event, sectionKey, fieldKey)
                              "
                            >
                              <option></option>
                              <option
                                v-for="(selectField, index) in field.values"
                                :key="index"
                              >
                                {{ selectField }}
                              </option>
                            </select>
                          </div>
                          <div v-else-if="field.type === 'checkbox'">
                            <ul
                              class="rvt-list-plain rvt-width-xl rvt-m-bottom-sm"
                            >
                              <li
                                v-for="(
                                  checkboxLabel, checkboxIndex
                                ) in field.values"
                                :key="checkboxIndex"
                              >
                                <div class="rvt-checkbox">
                                  <input
                                    type="checkbox"
                                    :name="
                                      formatAttr(checkboxLabel, fieldIndex)
                                    "
                                    :id="
                                      formatAttr(checkboxLabel, checkboxIndex)
                                    "
                                    :required="field.required !== false"
                                  />
                                  <label
                                    :for="
                                      formatAttr(checkboxLabel, checkboxIndex)
                                    "
                                    >{{ checkboxLabel }}</label
                                  >
                                </div>
                              </li>
                            </ul>
                          </div>

                          <div v-else-if="field.type === 'textarea'">
                            <textarea
                              :id="formatAttr(sectionKey, fieldIndex)"
                              class="rvt-textarea rvt-m-bottom-sm"
                              :required="field.required !== false"
                              v-on:input="
                                updateForm($event, sectionKey, fieldKey)
                              "
                            ></textarea>
                          </div>
                          <div v-else class="rvt-input-group rvt-m-bottom-sm">
                            <input
                              type="text"
                              :id="formatAttr(sectionKey, fieldIndex)"
                              :name="formatAttr(sectionKey, fieldIndex)"
                              class="rvt-text-input"
                              :required="field.required !== false"
                              :readonly="field.readonly"
                              :disabled="field.readonly"
                              v-on:input="
                                updateForm($event, sectionKey, fieldKey)
                              "
                              :value="
                                field.default === 'date'
                                  ? new Date().toLocaleDateString()
                                  : field.default
                              "
                            />

                            <div
                              class="rvt-input-group__append"
                              v-if="field.units"
                            >
                              <div
                                class="rvt-input-group__text rvt-ts-xs"
                                id="unit"
                                style="text-wrap: nowrap"
                              >
                                {{ field.units }}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="rvt-m-top-md rvt-row">
                <div class="rvt-cols-4-md rvt-m-bottom-sm">
                  <button
                    class="rvt-button w-100 rvt-flex rvt-justify-center"
                    type="submit"
                  >
                    Submit
                  </button>
                </div>
                <div class="rvt-cols-4-md rvt-m-bottom-sm">
                  <button
                    class="rvt-button rvt-button--danger w-100 rvt-flex rvt-justify-center"
                    type="reset"
                  >
                    Reset
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="rvt-layout__wrapper [ rvt-p-tb-sm ]">
      <div class="rvt-container-xl">
        <div class="row">
          <div class="rvt-cols-10-md rvt-flow rvt-p-left-none">
            <!-- <table class="rvt-table-compact rvt-table-responsive">
                            <div><h2 class="rvt-ts-md bordered-header"> Section title </h2></div>
                            <div><h3 class="rvt-ts-xs bordered-header"> Section title </h3></div>
                            <tbody class="">
                                <tr>
                                    <th scope="row" class="rvt-text-bold rvt-text-right">Key:</th>
                                    <td>Value</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="rvt-text-bold rvt-text-right">Key:</th>
                                    <td>Value</td>
                                </tr>
                            </tbody>
                        </table> -->

            <div
              v-for="(sectionValue, sectionKey) in objTest"
              :key="sectionKey"
            >
              <h2 class="rvt-ts-md bordered-header">{{ sectionKey }}</h2>
              <table class="rvt-table-compact rvt-table-responsive">
                <tbody>
                  <tr
                    v-for="(fieldValue, fieldKey) in sectionValue"
                    :key="fieldKey"
                  >
                    <th
                      scope="row"
                      class="rvt-text-medium"
                      style="
                        text-align: right;
                        padding-top: 15px;
                        padding-right: 15px;
                        width: 21%;
                      "
                      v-html="fieldKey + ':'"
                    ></th>
                    <td
                      style="
                        text-align: left;
                        padding-left: 5px;
                        vertical-align: bottom;
                        width: 29%;
                      "
                    >
                      {{ fieldValue }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRoute } from "vue-router";
const route = useRoute();
let form = ref({});

const { data } = await useAsyncData(`${route.fullPath}`, async () => {
  return queryContent().where({ _path: route.fullPath }).findOne();
});

if (!data.value) {
  throw createError({
    statusCode: 404,
    statusMessage: "Page Not Found",
  });
}

const initializeForm = (sections) => {
  let lastSectionKey = null;
  for (let sectionKey in sections) {
    if (sections[sectionKey]) {
      let currentSectionKey = sectionKey;
      if (sections[sectionKey].type === "section") {
        if (!form.value[sectionKey]) form.value[sectionKey] = {};
        lastSectionKey = sectionKey;
      } else if (sections[sectionKey].type === "subsection" && lastSectionKey) {
        if (!form.value[lastSectionKey][sectionKey])
          form.value[lastSectionKey][sectionKey] = {};
        currentSectionKey = `${lastSectionKey}.${sectionKey}`;
      }
      if (sections[sectionKey].fields) {
        for (let fieldKey in sections[sectionKey].fields) {
          if (sections[sectionKey].fields[fieldKey]) {
            let path = currentSectionKey.split(".");
            let target = form.value;
            for (let part of path) {
              if (!target[part]) target[part] = {};
              target = target[part];
            }
            target[fieldKey] =
              sections[sectionKey].fields[fieldKey].default !== undefined
                ? sections[sectionKey].fields[fieldKey].default === "date"
                  ? new Date().toLocaleDateString()
                  : sections[sectionKey].fields[fieldKey].default
                : "";
          } else {
            let path = currentSectionKey.split(".");
            let target = form.value;
            for (let part of path) {
              if (!target[part]) target[part] = {};
              target = target[part];
            }
            target[fieldKey] = "";
          }
        }
      }
    }
  }
  console.log(form.value);
};

const updateForm = (event, sectionKey, fieldKey) => {
  if (!form.value[sectionKey]) {
    form.value[sectionKey] = {};
  }
  form.value[sectionKey][fieldKey] = event.target.value;
};

const formatAttr = (key, index) => {
  return key?.replace(/ /g, "") + "_var" + index;
};

onMounted(() => {
  initializeForm(data.value.sections);
});

const instructions = computed(() => [
  {
    title: "Instructions for Electronic Submittal",
    content: `<ol>
                        <li>Fill out the form completely.</li>
                        <li>Click the 'Submit Form' button at the bottom of the page</li>
                        <li>Print a paper copy of the form to include with the physical sample when shipped</li>
                    </ol>`,
  },
  {
    title: "Instructions for Fax/Email Submittal",
    content: `<ol>
                        <li>Print the <a href="${data.value.static}" target="_blank" class="link">static version of the form</a></li>
                        <li>Fill out the form by hand</li>
                        <li>Fax the form to Kelly Faber at (317) 278-1100 or email to <a href="mailto:alzstudy@iu.edu" class="link">alzstudy@iu.edu</a></li>
                        <li>Include the printed copy with the physical sample when shipped</li>
                    </ol>`,
  },
]);

const submitForm = async (e) => {
  e.preventDefault();
  console.log("submitting form: ", form);
};

const objTest = {
  "General Information": {
    From: "dsfdsaf",
    Site: "fdsafds",
    Phone: "dfsafdsafdsa",
    Email: "fdsafds",
    Date: "2/7/2024",
    Study: "4RTNI2",
    "Birth Year": "fdsafdsa",
    Sex: "Female",
    "FedEx Number": "fdsafd",
  },
  "Collection Information": {
    "Date Drawn": "fdsaf",
    "Sodium heparin tube (PBMC) drawn": "No",
    "Time of Draw": "fdsafd",
    "Total volume of blood drawn into 3 x 2": "fdsafdsa",
    "Last date ate": "fdsafdsa",
    'Were the PAXgene<sup class="rvt-ts-xxs">TM</sup> tubes the last tubes drawn?':
      "Yes",
    "Last time subject ate": "fdsafds",
  },
  Notes: {
    Notes: "fdsafdsa",
  },
  "Plasma Processing": {
    "Time spin started": "fdsafds",
    "Original Volume Drawn": "fdsafdsa",
    "Number of 0&#46;5 mL plasma aliquots created (24-30 total) (Lavender cap cryovial)":
      "fdsafds",
    "If applicable, volume of residual plasma aliquot (less than 0": "fdsafdsa",
    "Time aliquots placed in freezer": "fdsfds",
    "Buffy coat aliquot created (one per EDTA tube) (Clear cap cryovial)":
      "fdsfds",
  },
  "Serum Processing": {
    "Time spin started (within 30 minutes of draw time)": "fdsfdsaf",
    "Original volume drawn (1x10 mL Serum tube)": "fdsfdsa",
    "Number of 0&#46;5 mL serum aliquots created (8-10 total) (Red cap cryovial)":
      "fdsfds",
    "If applicable, volume of residual serum aliquot (less than 0&#46;5 mL) (Blue cap cryovial)":
      "fdsafdsa",
    "Time aliquots placed in freezer": "fdsafdsf",
  },
};
</script>

<style lang="scss">
.section-nav-dktp {
  @media (max-width: 739px) {
    display: none;
  }
}

.section-nav-mob {
  display: none;
  @media (max-width: 739px) {
    display: block;
  }
}
</style>
