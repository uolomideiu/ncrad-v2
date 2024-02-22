<template>
  <div>
    <div
      class="table-header rvt-p-all-md rvt-bg-white rvt-border-all"
      v-if="title"
    >
      <div class="title">
        <div
          class="rvt-text-uppercase rvt-color-black-500 rvt-text-regular rvt-ts-16 h4"
        >
          {{ title }}
        </div>
      </div>

      <div class="rvt-c-flex">
        <div
          class="subtitle rvt-text-uppercase rvt-color-black-500 rvt-ts-16 w-100 h5"
        >
          {{ subTitle }}
        </div>
      </div>
    </div>
    <div
      role="region"
      tabindex="0"
      class="rvt-table-responsive"
      aria-labelledby="responsive-table"
    >
      <table class="rvt-table rvt-table-cells rvt-table-stripes">
        <caption class="rvt-sr-only">
          {{
            tableCaption ? tableCaption : title
          }}
        </caption>
        <thead class="table-header">
          <tr>
            <th
              v-for="(header, index) in headers"
              :key="index"
              scope="col"
              :class="[
                'rvt-text-uppercase rvt-ts-xxs rvt-text-medium',
                typeof header === 'object' ? 'rvt-text-center' : '',
              ]"
              v-html="typeof header === 'object' ? header.text : header"
              :colspan="typeof header === 'object' ? header.size : undefined"
            ></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(row, rowIndex) in rows" :key="rowIndex">
            <td
              v-for="(cell, cellIndex) in row"
              :key="cellIndex"
              :scope="cellIndex === 0 ? 'row' : undefined"
              :class="[
                'rvt-ts-xs rvt-text-regular',
                typeof cell === 'object' ? 'rvt-text-center' : '',
              ]"
              v-html="
                typeof cell === 'object'
                  ? formatCell(cell.text)
                  : formatCell(cell)
              "
              :colspan="typeof cell === 'object' ? cell.size : undefined"
            ></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div
      v-if="tableCaption"
      class="rvt-ts-xs rvt-p-all-sm"
      v-html="tableCaption"
    ></div>
  </div>
</template>

<script setup>
defineProps({
  size: {
    type: String,
    default: "lg",
  },
  title: {
    type: String,
    default: "",
  },
  subTitle: {
    type: String,
    default: "",
  },
  headers: {
    type: Array,
    default: () => ["Product", "Container", "Processes Included"],
  },
  rows: {
    type: Array,
    default: () => [
      ["DNA", "Plate", "Aliquot, normalize, plate, pack for shipment"],
      ["DNA", "Plate", "Aliquot, normalize, plate, pack for shipment"],
      ["Total RNA", "Aliquot", "normalize, plate, pack for shipment"],
      ["GENOME", "Aliquot", "absolute, plate, pack for shipment"],
    ],
  },
  tableCaption: {
    type: String,
    default: "",
  },
});

const formatCell = (cell) => {
  if (cell === true) {
    return '<rvt-icon name="check" class="ncrad-blue rvt-ts-lg"></rvt-icon>';
  } else if (cell === "true *") {
    return `<rvt-icon name="check" class="ncrad-blue rvt-ts-lg"></rvt-icon> <br/> *`;
  } else if (cell === false) {
    return ``;
  }
  return cell;
};
</script>

<style lang="scss" scoped>
.rvt-c-flex {
  gap: 2rem;
  display: flex;

  @media screen and (max-width: 1080px) {
    gap: 1rem;
    flex-direction: column;
  }
}

tr td {
  padding: 0.4rem 1rem;
}

thead tr th {
  line-height: 1.7;
  letter-spacing: 1.2px;
  text-wrap: balance;
}

.table-header {
  background: var(--table-header-bg);
}
</style>
