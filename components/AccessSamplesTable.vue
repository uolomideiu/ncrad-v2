<template>
  <RvtTable
    title="price structure-distribution of samples"
    subTitle="July 1, 2023-June 30, 2024"
    sortable
    searchable
    :headers="headers"
    :rows="rows"
    :sortLabel="'Sample Type'"
    :tableCaption="tableCaption"
  />
</template>

<script setup>
const headers = [
  "Product",
  "Container",
  "Process Included",
  "Unit",
  "Contributor Cost",
  "Academic Not-For-Profit Cost",
  "Industry Cost",
];
const rows = [
  [
    "DNA (Duplicate)",
    "Plate",
    "Duplicate Plate",
    "Per plate",
    "$45",
    "$68",
    "$135",
  ],
  [
    "DNA (Duplicate)",
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
    "IPSCs",
    "Aliquot",
    "Pull sample, pack for shipment",
    "Per sample",
    "$553",
    "$830",
    "$1659",
  ],
];
const tableCaption =
  "**Courier and indirect fees will also be added. The current Indiana University indirect rate for the time period of July 19, 2019-June 30, 2027 (or until ammended) is 58.5%. More information about this indirect rate may be found here. (add link)";
</script>
