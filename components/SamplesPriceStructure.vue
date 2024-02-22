<template>
  <ModalTrigger targetModal="price-structure">
    <template #trigger>
      <strong>Price Structure</strong>
    </template>
  </ModalTrigger>
  <ModalDialog modalId="price-structure">
    <template #title>
      {{ title }}
    </template>
    <template #body>
      <RvtTable :headers="headers" :rows="rows" :caption="caption" />
    </template>
  </ModalDialog>
</template>

<script setup>
defineProps({
  title: {
    type: String,
    default:
      "Price Structure - Distribution of samples from NCRAD July 1, 2023-June 30, 2024",
  },
});

const headers = [
  "Product Container",
  "Container",
  "Processes Included",
  "Unit",
  "Contributors",
  "Academic/Not-for-Profit",
  "Insustry",
];
const rows = [
  [
    "DNA",
    "Plate",
    "Aliquot,normalize,plate,packfor shipment",
    "Per sample",
    "$29",
    "$44",
    "$87",
  ],
  [
    "DNA (duplicate)",
    "Plate",
    "Duplicate Plate",
    "Per plate",
    "$45",
    "$68",
    "$135",
  ],
  [
    "Total RNA",
    "Aliquot",
    "Pull sample, pack for shipment",
    "Per sample",
    "$23",
    "$35",
    "$69",
  ],
  [
    "Micro RNA",
    "Aliquot",
    "Pull sample, pack for shipment",
    "Per sample",
    "$23",
    "$35",
    "$69",
  ],
  [
    "Serum",
    "Aliquot",
    "Pull sample, pack for shipment",
    "Per sample",
    "$11",
    "$17",
    "$33",
  ],
  [
    "Plasma",
    "Aliquot",
    "Pull sample, pack for shipment",
    "Per sample",
    "$11",
    "$17",
    "$33",
  ],
  [
    "CSF",
    "Aliquot",
    "Pull sample, pack for shipment",
    "Per sample",
    "$11",
    "$17",
    "$33",
  ],
  [
    "Fibroblasts",
    "Aliquot",
    "Pull sample, pack for shipment",
    "Per sample",
    "$222",
    "$333",
    "$666",
  ],
  [
    "PBMCs",
    "Aliquot",
    "Pull sample, pack for shipment",
    "Per sample",
    "$119",
    "$179",
    "$357",
  ],
  [
    "LCLs",
    "Aliquot",
    "Pull sample, pack for shipment",
    "Per sample",
    "$119",
    "$179",
    "$357",
  ],
  [
    "iPSCs",
    "Aliquot",
    "Pull sample, pack for shipment",
    "Per sample",
    "$553",
    "$830",
    "$1659",
  ],
];

const caption = `
**Courier and indirect fees will also be added. The current Indiana University indirect rate for the time period of July 19, 2019 – June 30, 2027 (or until amended) is 58.5%. 
More information about this indirect rate may be found <a href="https://research.iu.edu/funding-proposals/proposals/budgets/rates.html">here</a>.
`;
</script>

<style scoped lang="scss">
thead th,
thead tr th {
  padding: 0;
}
</style>
