<script lang="ts" setup>
import { useRoute } from 'vue-router'
import PageLayout from '@/layout/PageLayout.vue'
import LoaderCircle from '@/components/ui/loaders/LoaderCircle.vue'
import { onMounted, reactive, ref } from 'vue'
import type { Product } from '@/entities/product/product.model'

const route = useRoute()

const id = route.params.id
const isLoading = ref<boolean>(false)
const tab = ref<number>(1)

const product = reactive<Product>({
  name: '',
  description: '',
  attributes: [],
  parent_id: 0,
  img: '',
  filters: [],
  slug: '',
  translations: {
    ru: {
      title: 'Товар #1 RU',
      description: 'Описание Товар #1 RU',
      meta_description: 'Мета описание RU',
      meta_keywords: 'Мета слова RU',
      meta_title: 'Мета заголовок RU'
    },
    kg: {
      title: 'Товар #1 KG',
      description: 'Описание Товар #1 KG',
      meta_description: 'Мета описание KG',
      meta_keywords: 'Мета слова KG',
      meta_title: 'Мета заголовок KG'
    },
  }
})

onMounted(() => {
  isLoading.value = true
  setTimeout(() => {
    isLoading.value = false
  }, 500)
})
</script>

<template>
  <page-layout>
    <template v-slot:title>{{ id ? 'Редактировать товар ' : 'Создать товар' }}</template>
    <template v-slot:actions>
      <v-btn
          variant="outlined"
          color="primary"
      >
        Сохранить
      </v-btn>
    </template>
    <template v-slot:content>
      <v-tabs
          v-model="tab"
          color="primary"
          align-tabs="center"
      >
        <v-tab :value="1">Основное</v-tab>
        <v-tab :value="2">Изображения</v-tab>
        <v-tab :value="3">SEO</v-tab>
      </v-tabs>
      <v-window v-model="tab">
        <v-window-item :value="1" class="py-6">
          <v-row>
            <v-col>
              <v-text-field
                  label="Название RU*"
                  v-model="product.translations.ru.title"
                  clearable
                  variant="solo-filled"
              ></v-text-field>
            </v-col>
            <v-col>
              <v-text-field
                  label="Название KG*"
                  v-model="product.translations.kg.title"
                  clearable
                  variant="solo-filled"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-select
              item-title="name"
              item-value="id"
              label="Родительская категория"
              v-model="product.parent_id"
              variant="solo-filled"
              :items="parentCategories"
          ></v-select>
          <editor
              placeholder="Описание RU*"
              v-model="product.translations.ru.description"
          />
          <editor
              placeholder="Описание KG*"
              v-model="product.translations.kg.description"
          />
          ------------- Модель
          #productName-ru-kg
          #description-ru-kg
          #slug
          #EAN или SKU (код артикула)
          #active
          #?priority
          #catecory[]
          #filtres
          #attributes
          #?relatedProducts(Cопутствующие товары)
          ------------- Цена
          #price
          #oldPrice
          #рассрочка(хз что тут пока что, это отдельная сущьность)
          ------------- Количество
          #quantity
          #minimumQuantity
          ------------- Атрибуты
          #attributes[]
        </v-window-item>
        <v-window-item :value="2" class="py-6">
          #imageMain
          #subImages
        </v-window-item>
        <v-window-item :value="3" class="py-6">
          #ru-kg
          #MetaTagTitle-textfield!если нету значения, подставлять значение из title
          #MetaTagDescription-textarea-160!если нету значения, подставлять значение из description
          #MetaTagKeywords-chips-180
        </v-window-item>
      </v-window>
    </template>
  </page-layout>
  <loader-circle v-if="isLoading"/>
</template>
