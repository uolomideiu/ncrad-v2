<template>
  <button
    type="button"
    class="rvt-button price-structure-btn"
    data-rvt-dialog-trigger="dialog-example"
  >
    <span>Price Structure</span>
  </button>
  <div
    class="rvt-dialog price-structure-dialog"
    id="dialog-example"
    role="dialog"
    tabindex="-1"
    aria-labelledby="dialog-title"
    aria-describedby="dialog-description"
    data-rvt-dialog="dialog-example"
    data-rvt-dialog-modal
    data-rvt-dialog-darken-page
    data-rvt-dialog-disable-page-interaction
    hidden
  >
    <header class="rvt-dialog__header">
      <h1 class="rvt-dialog__title" id="dialog-title">
        Price Structure - Distribution of samples from NCRAD July 1, 2023-June
        30, 2024
      </h1>
    </header>
    <div class="rvt-dialog__body">
      <StudyTable :headers="headers" :rows="rows" :tableCaption="caption" />
    </div>
    <div class="rvt-dialog__controls rvt-display-none"></div>
    <button
      class="rvt-button rvt-button--plain rvt-dialog__close"
      data-rvt-dialog-close="dialog-example"
      role="button"
    >
      <span class="rvt-sr-only">Close</span>
      <svg fill="currentColor" width="16" height="16" viewBox="0 0 16 16">
        <path
          d="m3.5 2.086 4.5 4.5 4.5-4.5L13.914 3.5 9.414 8l4.5 4.5-1.414 1.414-4.5-4.5-4.5 4.5L2.086 12.5l4.5-4.5-4.5-4.5L3.5 2.086Z"
        ></path>
      </svg>
    </button>
  </div>
</template>

<script setup>
const caption = `
    <p>**Courier and indirect fees will also be added. The current Indiana University indirect rate for the time period of July 19, 2019 – June 30, 2027 (or until amended) is 58.5%. 
        More information about this indirect rate may be found <a href="https://research.iu.edu/funding-proposals/proposals/budgets/rates.html" target="_blank" class="link">here</a>.</p>
`;

const headers = [
  "Product",
  "Container",
  "Processes Included",
  "Unit",
  "Contributors",
  "Academic/Not-for-Profit",
  "Industry",
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
    "Aliquot,normalize,plate,packfor shipment",
    "Per sample",
    "$45",
    "$68",
    "$135",
  ],
  [
    "Total RNA	",
    "Aliquot",
    "Aliquot,normalize,plate,packfor shipment",
    "Per sample",
    "$23",
    "$35",
    "$69",
  ],
  [
    "Micro RNA",
    "Aliquot",
    "Aliquot,normalize,plate,packfor shipment",
    "Per sample",
    "$23",
    "$35",
    "$69",
  ],
  [
    "Serum",
    "Aliquot",
    "Aliquot,normalize,plate,packfor shipment",
    "Per sample",
    "$11",
    "$17",
    "$33",
  ],
  [
    "Plasma",
    "Aliquot",
    "Aliquot,normalize,plate,packfor shipment",
    "Per sample",
    "$11",
    "$17",
    "$33",
  ],
  [
    "CSF",
    "Aliquot",
    "Aliquot,normalize,plate,packfor shipment",
    "Per sample",
    "$11",
    "$17",
    "$33",
  ],
  [
    "Fibroblasts",
    "Aliquot",
    "Aliquot,normalize,plate,packfor shipment",
    "Per sample",
    "$2333",
    "$68",
    "$666",
  ],
  [
    "PBMCs",
    "Aliquot",
    "Aliquot,normalize,plate,packfor shipment",
    "Per sample",
    "$119",
    "$179",
    "$357",
  ],
  [
    "LCLs",
    "Aliquot",
    "Aliquot,normalize,plate,packfor shipment",
    "Per sample",
    "$119",
    "$179",
    "$357",
  ],
  [
    "iPSCs",
    "Aliquot",
    "Aliquot,normalize,plate,packfor shipment",
    "Per sample",
    "$553",
    "$830",
    "$1659",
  ],
];
</script>

<style lang="scss">
.price-structure-dialog {
  max-width: 75rem;
}
.price-structure-btn {
  span {
    margin: 0;
  }

  &:hover {
    background: transparent;
    color: initial;
  }
}
</style>
