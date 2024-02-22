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
      <div class="rvt-m-tb-md">
        <span class="rvt-label"
          ><span class="rvt-color-orange-500 rvt-text-bold">*</span> Indicates a
          required field
        </span>
      </div>
      <Row>
        <Column md="12" class="rvt-m-all-none rvt-p-all-none">
          <h3 class="page-header rvt-ts-md">Family Number</h3>
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
          <h3 class="page-header rvt-ts-md rvt-m-top-md">Donor Information</h3>

          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="donorName" class="rvt-label rvt-text-medium"
                >Name
                <span class="rvt-color-orange-500 rvt-text-bold">*</span></label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Donor_Name"
                type="text"
                class="rvt-text-input"
                :class="{ 'rvt-validation-danger': !formValidation.Donor_Name }"
                @input="validateField('Donor_Name')"
                name="Donor_Name"
                id="donorName"
                required
              />
            </Column>
          </Row>
        </Column>

        <Column md="12" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="donorAddress" class="rvt-label rvt-text-medium"
                >Address
                <span class="rvt-color-orange-500 rvt-text-bold">*</span></label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Donor_Address"
                type="text"
                class="rvt-text-input"
                :class="{
                  'rvt-validation-danger': !formValidation.Donor_Address,
                }"
                @input="validateField('Donor_Address')"
                name="Donor_Address"
                id="donorAddress"
                required
              />
            </Column>
          </Row>
        </Column>

        <Column md="6" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="donorCity" class="rvt-label rvt-text-medium"
                >City
                <span class="rvt-color-orange-500 rvt-text-bold">*</span></label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Donor_City"
                type="text"
                class="rvt-text-input"
                :class="{ 'rvt-validation-danger': !formValidation.Donor_City }"
                @input="validateField('Donor_City')"
                name="Donor_City"
                id="donorCity"
                required
              />
            </Column>
          </Row>
        </Column>
        <Column md="3" class="rvt-m-top-none rvt-p-lr-sm p-mobile-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="donorState" class="rvt-label rvt-text-medium"
                >State
                <span class="rvt-color-orange-500 rvt-text-bold">*</span></label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Donor_State"
                type="text"
                class="rvt-text-input"
                :class="{
                  'rvt-validation-danger': !formValidation.Donor_State,
                }"
                @input="validateField('Donor_State')"
                name="Donor_State"
                id="donorState"
                required
              />
            </Column>
          </Row>
        </Column>
        <Column md="3" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="donorZip" class="rvt-label rvt-text-medium"
                >Zip
                <span class="rvt-color-orange-500 rvt-text-bold">*</span></label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Donor_Zip_Code"
                type="text"
                class="rvt-text-input"
                :class="{
                  'rvt-validation-danger': !formValidation.Donor_Zip_Code,
                }"
                @input="validateField('Donor_Zip_Code')"
                id="donorZip"
                name="Donor_Zip_Code"
                v-maska
                data-maska="#####"
                required
              />
            </Column>
          </Row>
        </Column>

        <Column md="6" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="donorBirthdate" class="rvt-label rvt-text-medium"
                >Birthdate
                <span class="rvt-color-orange-500 rvt-text-bold">*</span></label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Donor_Birthdate"
                type="text"
                class="rvt-text-input"
                id="donorBirthdate"
                :class="{
                  'rvt-validation-danger': !formValidation.Donor_Birthdate,
                }"
                @input="validateField('Donor_Birthdate')"
                name="Donor_Birthdate"
                v-maska
                data-maska="##/##/####"
                placeholder="mm/dd/yyyy"
              />
            </Column>
          </Row>
        </Column>

        <Column
          md="6"
          class="rvt-m-all-none rvt-p-left-sm rvt-p-right-none p-mobile-none"
        >
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <label for="donorPhone" class="rvt-label rvt-text-medium"
                >Phone #
                <span class="rvt-color-orange-500 rvt-text-bold">*</span></label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Donor_Phone"
                type="text"
                class="rvt-text-input"
                :class="{
                  'rvt-validation-danger': !formValidation.Donor_Phone,
                }"
                @input="validateField('Donor_Phone')"
                id="donorPhone"
                name="Donor_Phone"
                v-maska
                data-maska="(###) ###-####"
                required
              />
            </Column>
          </Row>
        </Column>
      </Row>

      <Row>
        <Column md="12" class="rvt-m-all-none rvt-p-all-none">
          <h3 class="page-header rvt-ts-md rvt-m-top-md">
            Donor's Next of Kin
          </h3>

          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="kinName" class="rvt-label rvt-text-medium"
                >Name</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Next_of_Kin_Name"
                type="text"
                class="rvt-text-input"
                name="Next_of_Kin_Name"
                id="kinName"
              />
            </Column>
          </Row>
        </Column>

        <Column md="12" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <label for="kinAddress" class="rvt-label rvt-text-medium"
                >Address</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <Row class="rvt-items-center">
                <Column md="9" class="rvt-m-all-none rvt-p-all-none">
                  <input
                    v-model="form.Next_of_Kin_Address"
                    type="text"
                    class="rvt-text-input rvt-display-inline"
                    name="Next_of_Kin_Address"
                    id="kinAddress"
                    :disabled="sameAsDonor"
                  />
                </Column>
                <Column
                  md="3"
                  class="rvt-m-all-none rvt-p-left-sm rvt-p-right-none p-mobile-none"
                >
                  <div class="rvt-checkbox rvt-flex rvt-items-center">
                    <input
                      type="checkbox"
                      name="SameAsDonor"
                      id="sameAsDonor"
                      v-model="sameAsDonor"
                    />
                    <label for="sameAsDonor">Same as Donor</label>
                  </div>
                </Column>
              </Row>
            </Column>
          </Row>
        </Column>

        <Column md="6" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="kinCity" class="rvt-label rvt-text-medium"
                >City</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Next_of_Kin_City"
                type="text"
                class="rvt-text-input"
                name="Next_of_Kin_City"
                id="kinCity"
                :disabled="sameAsDonor"
              />
            </Column>
          </Row>
        </Column>
        <Column md="3" class="rvt-m-top-none rvt-p-lr-sm p-mobile-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="kinState" class="rvt-label rvt-text-medium"
                >State</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Next_of_Kin_State"
                type="text"
                class="rvt-text-input"
                name="Next_of_Kin_State"
                id="kinState"
                :disabled="sameAsDonor"
              />
            </Column>
          </Row>
        </Column>
        <Column md="3" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="kinZip" class="rvt-label rvt-text-medium"
                >Zip</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Next_of_Kin_Zip_Code"
                type="text"
                class="rvt-text-input"
                id="kinZip"
                name="Next_of_Kin_Zip_Code"
                v-maska
                data-maska="#####"
                :disabled="sameAsDonor"
              />
            </Column>
          </Row>
        </Column>

        <Column md="6" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <label for="kinPhone" class="rvt-label rvt-text-medium"
                >Phone #</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Next_of_Kin_Phone"
                type="text"
                class="rvt-text-input"
                id="kinPhone"
                name="Next_of_Kin_Phone"
                v-maska
                data-maska="(###) ###-####"
                :disabled="sameAsDonor"
              />
            </Column>
          </Row>
        </Column>
      </Row>

      <!-- Physician Info -->
      <Row>
        <Column md="12" class="rvt-m-all-none rvt-p-all-none">
          <h3 class="page-header rvt-ts-md rvt-m-top-md">
            Primary Physician Information
          </h3>

          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="physicianName" class="rvt-label rvt-text-medium"
                >Name</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Physician_Name"
                type="text"
                class="rvt-text-input"
                name="Physician_Name"
                id="physicianName"
              />
            </Column>
          </Row>
        </Column>

        <Column md="12" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="physicianAddress" class="rvt-label rvt-text-medium"
                >Address</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Physician_Address"
                type="text"
                class="rvt-text-input rvt-display-inline"
                name="Physician_Address"
                id="physicianAddress"
              />
            </Column>
          </Row>
        </Column>

        <Column md="6" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="physicianCity" class="rvt-label rvt-text-medium"
                >City</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Physician_City"
                type="text"
                class="rvt-text-input"
                name="Physician_City"
                id="physicianCity"
              />
            </Column>
          </Row>
        </Column>
        <Column md="3" class="rvt-m-top-none rvt-p-lr-sm p-mobile-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="physicianState" class="rvt-label rvt-text-medium"
                >State</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Physician_State"
                type="text"
                class="rvt-text-input"
                name="Physician_State"
                id="physicianState"
              />
            </Column>
          </Row>
        </Column>
        <Column md="3" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="physicianZip" class="rvt-label rvt-text-medium"
                >Zip</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Physician_Zip_Code"
                type="text"
                class="rvt-text-input"
                id="physicianZip"
                name="Physician_Zip_Code"
                v-maska
                data-maska="#####"
              />
            </Column>
          </Row>
        </Column>

        <Column md="6" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <label for="physicianPhone" class="rvt-label rvt-text-medium"
                >Phone #</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Physician_Phone"
                type="text"
                class="rvt-text-input"
                id="physicianPhone"
                name="Physician_Phone"
                v-maska
                data-maska="(###) ###-####"
              />
            </Column>
          </Row>
        </Column>

        <Column
          md="6"
          class="rvt-m-all-none rvt-p-left-sm rvt-p-right-none p-mobile-none"
        >
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <label for="physicianFax" class="rvt-label rvt-text-medium"
                >Fax #</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Physician_Fax"
                type="text"
                class="rvt-text-input"
                id="physicianFax"
                name="Physician_Fax"
                v-maska
                data-maska="(###) ###-####"
              />
            </Column>
          </Row>
        </Column>
      </Row>

      <!-- Nursing Home Information -->
      <Row>
        <Column md="12" class="rvt-m-left-none rvt-p-left-none">
          <h3 class="page-header rvt-ts-md rvt-m-top-md">
            Nursing Home Information
            <small class="rvt-ts-xxs rvt-color-black">(Optional)</small>
          </h3>
        </Column>
        <Column md="6" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="nursingSite" class="rvt-label rvt-text-medium"
                >Site</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Nursing_Home_Site"
                type="text"
                class="rvt-text-input"
                name="Nursing_Home_Site"
                id="nursingSite"
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
              ><label for="nursingNote" class="rvt-label rvt-text-medium"
                >Note</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Nursing_Home_Note"
                type="text"
                class="rvt-text-input"
                name="Nursing_Home_Note"
                id="nursingNote"
              />
            </Column>
          </Row>
        </Column>

        <Column md="12" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="nursingAddress" class="rvt-label rvt-text-medium"
                >Address</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Nursing_Home_Address"
                type="text"
                class="rvt-text-input rvt-display-inline"
                name="Nursing_Home_Address"
                id="nursingAddress"
              />
            </Column>
          </Row>
        </Column>

        <Column md="6" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="physicianCity" class="rvt-label rvt-text-medium"
                >City</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Nursing_Home_City"
                type="text"
                class="rvt-text-input"
                name="Nursing_Home_City"
                id="nursingCity"
              />
            </Column>
          </Row>
        </Column>
        <Column md="3" class="rvt-m-top-none rvt-p-lr-sm p-mobile-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="nursingState" class="rvt-label rvt-text-medium"
                >State</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Nursing_Home_State"
                type="text"
                class="rvt-text-input"
                name="Nursing_Home_State"
                id="nursingState"
              />
            </Column>
          </Row>
        </Column>
        <Column md="3" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="nursingZip" class="rvt-label rvt-text-medium"
                >Zip</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Nursing_Home_Zip_Code"
                type="text"
                class="rvt-text-input"
                id="nursingZip"
                name="Nursing_Home_Zip_Code"
                v-maska
                data-maska="#####"
              />
            </Column>
          </Row>
        </Column>

        <Column md="12" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="nursingContact" class="rvt-label rvt-text-medium"
                >Contact</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Nursing_Home_Contact"
                type="text"
                class="rvt-text-input"
                id="nursingContact"
                name="Nursing_Home_Contact"
              />
            </Column>
          </Row>
        </Column>

        <Column md="6" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <label for="nursingPhone" class="rvt-label rvt-text-medium"
                >Phone #</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Nursing_Home_Phone"
                type="text"
                class="rvt-text-input"
                id="nursingPhone"
                name="Nursing_Home_Phone"
                v-maska
                data-maska="(###) ###-####"
              />
            </Column>
          </Row>
        </Column>

        <Column
          md="6"
          class="rvt-m-all-none rvt-p-left-sm rvt-p-right-none p-mobile-none"
        >
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <label for="nursingFax" class="rvt-label rvt-text-medium"
                >Fax #</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Nursing_Home_Fax"
                type="text"
                class="rvt-text-input"
                id="nursingFax"
                name="Nursing_Home_Fax"
                v-maska
                data-maska="(###) ###-####"
              />
            </Column>
          </Row>
        </Column>
      </Row>
      <!-- Funeral Home Information -->
      <Row>
        <Column md="12" class="rvt-m-left-none rvt-p-left-none">
          <h3 class="page-header rvt-ts-md rvt-m-top-md">
            Funeral Home Information
            <small class="rvt-ts-xxs rvt-color-black">(Optional)</small>
          </h3>
        </Column>
        <Column md="6" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="funeralSite" class="rvt-label rvt-text-medium"
                >Site</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Funeral_Home_Site"
                type="text"
                class="rvt-text-input"
                name="Funeral_Home_Site"
                id="funeralSite"
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
              ><label for="funeralNote" class="rvt-label rvt-text-medium"
                >Note</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Funeral_Home_Note"
                type="text"
                class="rvt-text-input"
                name="Funeral_Home_Note"
                id="funeralNote"
              />
            </Column>
          </Row>
        </Column>

        <Column md="12" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="funeralAddress" class="rvt-label rvt-text-medium"
                >Address</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Funeral_Home_Address"
                type="text"
                class="rvt-text-input rvt-display-inline"
                name="Funeral_Home_Address"
                id="funeralAddress"
              />
            </Column>
          </Row>
        </Column>

        <Column md="6" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="funeralCity" class="rvt-label rvt-text-medium"
                >City</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Funeral_Home_City"
                type="text"
                class="rvt-text-input"
                name="Funeral_Home_City"
                id="funeralCity"
              />
            </Column>
          </Row>
        </Column>
        <Column md="3" class="rvt-m-top-none rvt-p-lr-sm p-mobile-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="funeralState" class="rvt-label rvt-text-medium"
                >State</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Funeral_Home_State"
                type="text"
                class="rvt-text-input"
                name="Funeral_Home_State"
                id="funeralState"
              />
            </Column>
          </Row>
        </Column>
        <Column md="3" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="funeralZip" class="rvt-label rvt-text-medium"
                >Zip</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Funeral_Home_Zip_Code"
                type="text"
                class="rvt-text-input"
                id="funeralZip"
                name="Funeral_Home_Zip_Code"
                v-maska
                data-maska="#####"
              />
            </Column>
          </Row>
        </Column>

        <Column md="12" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none"
              ><label for="funeralContact" class="rvt-label rvt-text-medium"
                >Contact</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Funeral_Home_Contact"
                type="text"
                class="rvt-text-input"
                id="funeralContact"
                name="Funeral_Home_Contact"
              />
            </Column>
          </Row>
        </Column>

        <Column md="6" class="rvt-m-all-none rvt-p-all-none">
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <label for="funeralPhone" class="rvt-label rvt-text-medium"
                >Phone #</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Funeral_Home_Phone"
                type="text"
                class="rvt-text-input"
                id="funeralPhone"
                name="Funeral_Home_Phone"
                v-maska
                data-maska="(###) ###-####"
              />
            </Column>
          </Row>
        </Column>

        <Column
          md="6"
          class="rvt-m-all-none rvt-p-left-sm rvt-p-right-none p-mobile-none"
        >
          <Row class="form-group">
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <label for="funeralFax" class="rvt-label rvt-text-medium"
                >Fax #</label
              ></Column
            >
            <Column md="12" class="rvt-m-all-none rvt-p-all-none">
              <input
                v-model="form.Funeral_Home_Fax"
                type="text"
                class="rvt-text-input"
                id="funeralFax"
                name="Funeral_Home_Fax"
                v-maska
                data-maska="(###) ###-####"
              />
            </Column>
          </Row>
        </Column>
      </Row>

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
import { reactive, onMounted, watch } from "vue";
const formRef = ref(null);
const submitting = ref(false);
const sameAsDonor = ref(false);
const result = reactive({
  status: "",
  message: "",
  data: null,
});

onMounted(() => {
  const nuxtApp = useNuxtApp();
  nuxtApp.$recaptcha.init();
});

watch(sameAsDonor, (newValue) => {
  if (newValue) {
    form.Next_of_Kin_Address = form.Donor_Address;
    form.Next_of_Kin_City = form.Donor_City;
    form.Next_of_Kin_State = form.Donor_State;
    form.Next_of_Kin_Zip_Code = form.Donor_Zip_Code;
    form.Next_of_Kin_Phone = form.Donor_Phone;
  }
});

const form = reactive({
  Submission_Type: "NCRAD Family - Autopsy Planning Form",
  Family_Number: "",
  Donor_Name: "",
  Donor_Address: "",
  Donor_City: "",
  Donor_State: "",
  Donor_Zip_Code: "",
  Donor_Birthdate: "",
  Donor_Phone: "",
  Next_of_Kin_Name: "",
  Next_of_Kin_Address: "",
  Next_of_Kin_City: "",
  Next_of_Kin_State: "",
  Next_of_Kin_Zip_Code: "",
  Next_of_Kin_Phone: "",
  Physician_Name: "",
  Physician_Address: "",
  Physician_City: "",
  Physician_State: "",
  Physician_Zip_Code: "",
  Physician_Phone: "",
  Physician_Fax: "",
  Nursing_Home_Site: "",
  Nursing_Home_Note: "",
  Nursing_Home_Address: "",
  Nursing_Home_City: "",
  Nursing_Home_State: "",
  Nursing_Home_Zip_Code: "",
  Nursing_Home_Contact: "",
  Nursing_Home_Phone: "",
  Nursing_Home_Fax: "",
  Funeral_Home_Site: "",
  Funeral_Home_Note: "",
  Funeral_Home_Address: "",
  Funeral_Home_City: "",
  Funeral_Home_State: "",
  Funeral_Home_Zip_Code: "",
  Funeral_Home_Contact: "",
  Funeral_Home_Phone: "",
  Funeral_Home_Fax: "",
});

// const filteredForm = computed(() => {
//   const { SubjectLine, FormType, ...rest } = form;
//   return rest;
// });

const formValidation = reactive({
  Family_Number: true,
  Donor_Name: true,
  Donor_Address: true,
  Donor_City: true,
  Donor_State: true,
  Donor_Zip_Code: true,
  Donor_Birthdate: true,
  Donor_Phone: true,
});

const validateField = (field) => {
  formValidation[field] = !!form[field];
};

const submitForm = async () => {
  const requiredFields = [
    "Family_Number",
    "Donor_Name",
    "Donor_Address",
    "Donor_City",
    "Donor_State",
    "Donor_Zip_Code",
    "Donor_Birthdate",
    "Donor_Phone",
  ];
  requiredFields.forEach(validateField);

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
};
</script>

<style lang="scss" scoped>
.page-header {
  color: var(--primary);
  border-bottom: 1px solid var(--primary);
  margin-bottom: 15px;
}
</style>
