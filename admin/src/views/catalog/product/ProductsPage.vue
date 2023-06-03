<script setup lang="ts">

import { PAGES } from '@/model'
import PageLayout from '@/layout/PageLayout.vue'
import type { Product } from '@/entities/product/product.types'
import { reactive } from 'vue'

const headers = [
  {
    title: 'ID',
    value: 'id',
    sort: false,
    align: 'left',
  },
  {
    title: 'Название',
    value: 'name',
    sort: false,
    align: 'center',
  },
  {
    title: 'Действия',
    value: 'actions',
    sort: false,
    align: 'right',
  },
]

const products = reactive<Product[]>([
  {
    id: 1,
    lang: {
      ru: {
        title: '',
        description: '',
        meta_description: '',
        meta_keywords: '',
        meta_title: ''
      },
      kg: {
        title: '',
        description: '',
        meta_description: '',
        meta_keywords: '',
        meta_title: ''
      }
    },
    slug:'',
    attributes: [],
    img: '',
    description: '',
    filters: [],
    name: 'Товар #1'
  }
])

const confirmDelete = (id: number) => {
  console.log(id)
}

</script>

<template>
  <page-layout>
    <template v-slot:title>Продукты</template>
    <template v-slot:actions>
      <v-btn
          color="primary"
          variant="outlined"
          :to="PAGES.PRODUCT"
      >
        Добавить
      </v-btn>
    </template>
    <template v-slot:content>
      <data-table
          :headers="headers"
          :items="products"
      >
        <template #item-actions='data'>
          <v-btn
              class="mr-3"
              color="primary"
              icon="mdi-pencil"
              size="x-small"
              :to="`${PAGES.PRODUCT}/${data.item.id}`"
          />
          <v-btn
              class="mr-3"
              color="primary"
              icon="mdi-trash-can-outline"
              size="x-small"
              @click="confirmDelete(data.item.id)"
          />
        </template>
      </data-table>
    </template>
  </page-layout>
</template>
