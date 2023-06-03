<script setup lang="ts">

import CategoryList from '@/components/ui/CategoryListTree.vue'
import PageLayout from '@/layout/PageLayout.vue'
import { PAGES } from '@/model'
import type { CategoryRouterElement } from '@/entities/category/category.types'

const categories: CategoryRouterElement[] = [
  {
    id: 1,
    name: 'Категория 1',
    child: [
      {
        id: 3,
        name: 'Категория 3',
        child: [],
      },
      {
        id: 4,
        name: 'Категория 4',
        child: [
          {
            id: 6,
            name: 'Категория 6',
            child: [],
          },
        ],
      },
    ],
  },
  {
    id: 2,
    name: 'Категория 2',
    child: [],
  },
  {
    id: 5,
    name: 'Категория 5',
    child: [],
  },
]

</script>

<template>
  <page-layout>
    <template v-slot:title>Категории</template>
    <template v-slot:actions>
      <v-btn
          color="primary"
          variant="outlined"
          :to="PAGES.CATEGORY_CREATE"
      >
        Добавить
      </v-btn>
    </template>
    <template v-slot:content>
      <v-list>
        <category-list :items="categories"/>
      </v-list>
    </template>
  </page-layout>
</template>

<style>
.v-layout .v-toolbar__content > .v-toolbar-title {
  margin-inline-start: 0;
}
</style>
