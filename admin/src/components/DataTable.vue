<script lang="ts" setup>

import { useSlots } from 'vue'

interface DataHeaderType {
  title: string;
  value: string;
  sort: boolean;
  align: string;
}

const props = defineProps<{
  headers: DataHeaderType[]
  items: object
  reduced?: boolean,
  loader?: boolean,
  loaderText?: string,
  pagination?: object
  noData?: string
}>()

const changePage = (page: number) => {
  emits('pagination', page)
}

const emits = defineEmits(['sorted', 'pagination'])


const sort_table = (value: string) => {
  emits('sorted', value)
}
</script>

<template>
  <div :class="{'vtable-reduced' : reduced}" class="vtable">
    <div class="vtable-header">
      <slot name="table-header"></slot>
    </div>
    <v-table class="vtable-desktop" theme="dark">
      <thead>
      <tr v-if="!loader && items?.length > 0">
        <th v-for="h in headers" :class="`text-${h.align || 'left'}`">
          <div v-if="!useSlots()[`header-${h.value}`]">{{ h.title }}</div>
          <button v-if="h.sort" @click="sort_table(h.value)">sort</button>
          <slot v-else :item="h" :name="'header-' + h.value"></slot>
        </th>
      </tr>
      <tr v-else-if="loader">
        <th><span class="vtable-loader"></span></th>
      </tr>
      <tr v-else>
        <th class="text-center">{{ noData ? noData : 'Данные не прогружены' }}</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="i in items" v-if="!loader">
        <td v-for="h in headers" :class="`text-${h.align || 'left'}`">
          {{ i[h.value] }} {{}}
        </td>
      </tr>
      <tr v-else-if="loader">
        <td class="text-center">
          {{ loaderText || 'Loading...' }}
        </td>
      </tr>
      </tbody>
    </v-table>
    <div class="vtable-mobile">
      <div v-for="i in items" class="border pa-3 mb-2">
        <div v-for="h in headers" class="d-flex align-center">
          <div class="mr-2">{{ h.title }}:</div>
          <div v-if="!useSlots()[`item-${h.value}`]">
            {{ i[h.value] }}
          </div>
          <slot v-else :item="i" :name="'item-'+ h.value"></slot>
        </div>
      </div>
    </div>
    <v-pagination
        v-if="props.pagination"
        v-model="props.pagination.page"
        :length="props.pagination.pageCount"
        class="mt-3"
        rounded="circle"
        @update:modelValue="changePage"
    ></v-pagination>
  </div>
  <div class="vtable-footer">
    <slot name="table-footer"></slot>
  </div>
</template>

<style>
* {
  box-sizing: border-box;
}

.vtable table {
  width: 100%;
  border-spacing: 0;
}

.vtable img {
  width: auto;
  height: 70px;
}

.vtable table thead tr {
  height: 50px;
}

.vtable table tr th {
  padding: 5px 15px;
  font-size: 14px;
  border-bottom: 1px solid #ececec;
}

.vtable table tr td {
  padding: 10px 15px;
  border-bottom: 1px solid #ececec;
  font-size: 13px;
}

.vtable table tr {
  transition: all 0.3s;
}

.vtable.vtable-reduced table tr td,
.vtable.vtable-reduced table tr th {
  font-size: 13px;
  padding: 5px 10px;
}

.vtable table tbody tr:hover {
  background-color: rgba(73, 73, 73, 0.42);
}

.vtable-loader {
  width: 16px;
  height: 16px;
  border-radius: 50%;
  display: block;
  margin: 15px auto;
  position: relative;
  background: #FFF;
  box-shadow: -24px 0 #FFF, 24px 0 #FFF;
  box-sizing: border-box;
  animation: shadowPulse 2s linear infinite;
}

@keyframes shadowPulse {
  33% {
    background: #FFF;
    box-shadow: -24px 0 #DE0412, 24px 0 #FFF;
  }
  66% {
    background: #DE0412;
    box-shadow: -24px 0 #FFF, 24px 0 #FFF;
  }
  100% {
    background: #FFF;
    box-shadow: -24px 0 #FFF, 24px 0 #DE0412;
  }
}

.vtable-mobile {
  display: none;
  margin-top: 10px;
}


@media (max-width: 768px) {
  .vtable-mobile {
    display: block;
  }

  .vtable-desktop {
    display: none;
  }
}
</style>
