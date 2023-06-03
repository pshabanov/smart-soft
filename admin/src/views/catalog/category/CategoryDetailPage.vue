<script lang="ts" setup>
import { useRoute } from 'vue-router'
import LoaderCircle from '@/components/ui/loaders/LoaderCircle.vue'
import { onMounted, reactive, ref } from 'vue'
import NoImage from '@/components/ui/NoImage.vue'
import Editor from '@/components/ui/editors/Editor.vue'
import type { Category } from '@/entities/category/category.types'
import PageLayout from '@/layout/PageLayout.vue'

const route = useRoute()

const id = route.params.id
const isLoading = ref<boolean>(false)
const tab = ref<number>(1)
const chips_ru = ref(['Категория 1', 'Категория 2'])
const items_ru = ref(['Streaming'])
const chips_kg = ref(['Категория 1', 'Категория 2'])
const items_kg = ref(['Streaming'])

const removeRu = (item: string) => {
  chips_ru.value.splice(chips_ru.value.indexOf(item), 1)
}
const removeKg = (item: string) => {
  chips_kg.value.splice(chips_kg.value.indexOf(item), 1)
}

const parentCategories:{
  id: number
  name: string
}[] = [
  {
    id: 1,
    name: 'Категория 1'
  },
  {
    id: 2,
    name: 'Категория 2'
  },
  {
    id: 3,
    name: 'Категория 3'
  },
  {
    id: 4,
    name: 'Категория 4'
  }
]

const category = reactive<Category>({
  translations: {
    ru: {
      title: 'Категория #1 RU',
      description: 'Описание RU',
      meta_description: 'Мета описание RU',
      meta_keywords: 'Мета слова RU',
      meta_title: 'Мета заголовок RU'
    },
    kg: {
      title: 'Категория #1 KG',
      description: 'Описание KG',
      meta_description: 'Мета описание KG',
      meta_keywords: 'Мета слова KG',
      meta_title: 'Мета заголовок KG'
    }
  },
  active: false,
  icon: {
    id: 1
  },
  images: [],
  parent_id: null,
  priority: 12,
  id: 1,
  slug:""
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
    <template v-slot:title>{{ id ? 'Изменить категорию' : 'Создать категорию' }}</template>
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
                  v-model="category.translations.ru.title"
                  clearable
                  variant="solo-filled"
              ></v-text-field>
            </v-col>
            <v-col>
              <v-text-field
                  label="Название KG*"
                  v-model="category.translations.kg.title"
                  clearable
                  variant="solo-filled"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-select
              item-title="name"
              item-value="id"
              label="Родительская категория"
              v-model="category.parent_id"
              variant="solo-filled"
              :items="parentCategories"
          ></v-select>
          <editor
              placeholder="Описание RU*"
              v-model="category.translations.ru.description"
          />
          <editor
              placeholder="Описание KG*"
              v-model="category.translations.kg.description"
          />
          <v-row>
            <v-col>
              <v-text-field
                  label="SLUG*"
                  clearable
                  variant="solo-filled"
                  v-model="category.slug"
              ></v-text-field>
            </v-col>
            <v-col>
              <v-text-field
                  label="Приоритет"
                  clearable
                  variant="solo-filled"
                  type="number"
                  v-model="category.priority"
              ></v-text-field>
            </v-col>
            <v-col>
              <v-switch
                  label="Активен"
                  inset
                  color="primary"
                  v-model="category.active"
              >
              </v-switch>
            </v-col>
          </v-row>
          <!--                  #title-ru-kg-textfield required-->
          <!--                  #description-ru-kg-textarea required-->
          <!--                  #slug-textfield required-->
          <!--                  #proirity-textfield-number-->
          <!--                  #active-switch-->
          <!--                  #parent-autoselect-->
        </v-window-item>
        <v-window-item :value="2" class="py-6">
          <v-row>
            <v-col cols="1">
              <no-image/>
            </v-col>
            <v-col>
              <v-file-input
                  label="Освновное изображение"
                  variant="solo-filled"
                  v-model="category.images"
              ></v-file-input>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="1">
              <no-image/>
            </v-col>
            <v-col>
              <v-file-input
                  label="Иконка"
                  variant="solo-filled"
                  v-model="category.icon"
              ></v-file-input>
            </v-col>
          </v-row>
          <!-- #image-file required -->
          <!-- #icon-file required -->
        </v-window-item>
        <v-window-item :value="3" class="py-6">
          <v-row>
            <v-col>
              <v-text-field
                  label="Meta title RU*"
                  clearable
                  variant="solo-filled"
                  v-model="category.translations.ru.title"
              ></v-text-field>
            </v-col>
            <v-col>
              <v-text-field
                  label="Meta title KG*"
                  clearable
                  variant="solo-filled"
                  v-model="category.translations.kg.title"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-textarea
              label="Meta description RU*"
              clearable
              variant="solo-filled"
              v-model="category.translations.ru.description"
          />
          <v-textarea
              label="Meta description KG*"
              clearable
              variant="solo-filled"
              v-model="category.translations.kg.description"
          />
          <v-combobox
              v-model="chips_ru"
              :items="items_ru"
              chips
              clearable
              label="Meta keywords RU"
              multiple
              variant="solo-filled"
          >
            <template v-slot:selection="{ attrs, item, select, selected }">
              <v-chip
                  v-bind="attrs"
                  :model-value="selected"
                  closable
                  @click="select"
                  @click:close="removeRu(item)"
              >
                <strong>{{ item }}</strong>&nbsp;
                <span>(interest)</span>
              </v-chip>
            </template>
          </v-combobox>

          <v-combobox
              v-model="chips_kg"
              :items="items_kg"
              chips
              clearable
              label="Meta keywords KG"
              multiple
              variant="solo-filled"
          >
            <template v-slot:selection="{ attrs, item, select, selected }">
              <v-chip
                  v-bind="attrs"
                  :model-value="selected"
                  closable
                  @click="select"
                  @click:close="removeKg(item)"
              >
                <strong>{{ item }}</strong>&nbsp;
                <span>(interest)</span>
              </v-chip>
            </template>
          </v-combobox>
          <!--                  #ru-kg-->
          <!--                  #MetaTagTitle-textfield!если нету значения, подставлять значение из title-->
          <!--                  #MetaTagDescription-textarea-160!если нету значения, подставлять значение из description-->
          <!--                  #MetaTagKeywords-chips-180-->
        </v-window-item>
      </v-window>
    </template>
  </page-layout>
  <loader-circle v-if="isLoading"/>
</template>

<style>
.v-btn__content .v-tab__slider {
  bottom: -13px;
}

.v-btn__content {
  padding: 0 16px;
}

.v-slide-group__container .v-btn--size-default {
  padding: 0;
}
</style>
