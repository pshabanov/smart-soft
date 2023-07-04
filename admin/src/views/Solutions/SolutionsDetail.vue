<script lang="ts" setup="">

import PageLayout from '@/layout/PageLayout.vue'
import {useRoute} from 'vue-router'
import {onMounted, ref} from 'vue'
import type {SolutionsRequestType} from '@/entities/news/news.model'
import {SolutionsService} from '@/services/solutions.service'
import router from '@/router'
import {PAGES} from '@/model'
import LoaderCircle from '@/components/ui/loaders/LoaderCircle.vue'
import {CommonService} from "@/services/common.service";

const route = useRoute()

const pageId = route.params.id
const isLoading = ref<boolean>(false)
const solutions = ref<SolutionsRequestType>({
  id: 0,
  title: '',
  description: '',
  solution: '',
  active: false,
  image: ''
})

const files = ref([])

onMounted(async ()=>{
  if (pageId){
    isLoading.value = true
    const newsItem = await SolutionsService().solutionsById(pageId)
    isLoading.value = false
    solutions.value = newsItem.data
  }
})

const update = async ()=> {
  isLoading.value = true
  if (files.value.length) solutions.value.image = await CommonService().uploadImage(files.value[0], 'solutions')
  const response = await SolutionsService().updateSolutions(solutions.value)
  isLoading.value = false
  if (response.data.id){
    router.push(PAGES.SOLUTIONS)
  }
}

const create = async ()=> {
  isLoading.value = true
  const response = await SolutionsService().createSolutions(solutions.value, files.value)
  isLoading.value = false
  if (response.id){
    router.push(PAGES.SOLUTIONS)
  }
}


</script>

<template>
  <PageLayout>
    <template #title>{{ pageId ? 'Редактировать решение ' : 'Создать решение' }}</template>
    <template #actions>
      <v-btn
          variant="outlined"
          color="primary"
          @click="pageId ? update(): create()"
      >
        Сохранить
      </v-btn>
    </template>
    <template #content>
      <v-row>
        <v-col>
          <v-text-field
              label="Название"
              v-model="solutions.title"
              clearable
              variant="solo-filled"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-textarea
              label="Описание проблемы"
              v-model="solutions.description"
              clearable
              variant="solo-filled"
          ></v-textarea>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-textarea
              label="Решение"
              v-model="solutions.solution"
              clearable
              variant="solo-filled"
          ></v-textarea>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-img :src="solutions.image"/>
        </v-col>
        <v-col>
          <v-file-input
              label="Выберите изображение"
              variant="solo-filled"
              v-model="files"
          ></v-file-input>
        </v-col>
        <v-col>
          <v-switch
              label="Активен"
              inset
              color="primary"
              v-model="solutions.active"
          >
          </v-switch>
        </v-col>
      </v-row>
    </template>
  </PageLayout>
  <LoaderCircle v-if="isLoading"/>
</template>
