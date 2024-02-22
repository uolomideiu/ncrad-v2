<template>
  <div class="form-group rvt-m-bottom-sm">
    <label :for="inputId" class="rvt-label rvt-text-bold">{{ label }}</label>
    <input
      v-model="model"
      :type="inputType"
      :name="inputName"
      :id="inputId"
      class="rvt-text-input"
      @input="$emit('update:modelValue', $event.target.value)"
      :required="required"
    />
  </div>
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps({
  label: String,
  inputName: String,
  inputId: String,
  inputType: String,
  required: {
    type: Boolean,
    default: false,
  },
  error: {
    type: Boolean,
    default: false,
  },
  modelValue: String,
});

const { label, inputName, inputId, inputType } = toRefs(props);
const model = defineModel();
</script>

<!-- <style lang="scss" scoped>
    .form-group {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 1rem;

        label {
            width: 20%;
        }

        input {
            width: 80%;
        }
    }
</style> -->
