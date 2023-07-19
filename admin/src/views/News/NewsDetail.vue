<script lang="ts" setup="">

import PageLayout from '@/layout/PageLayout.vue'
import { useRoute } from 'vue-router'
import { onMounted, ref } from 'vue'
import type { NewsRequestType } from '@/entities/news/news.model'
import { NewsService } from '@/services/news.service'
import router from '@/router'
import { PAGES } from '@/model'
import LoaderCircle from '@/components/ui/loaders/LoaderCircle.vue'
import {CommonService} from "@/services/common.service";

const route = useRoute()

const pageId = route.params.id
const isLoading = ref<boolean>(false)
const news = ref<NewsRequestType>({
  id: 0,
  title: '',
  description: '',
  active: false,
  image: ''
})

const files = ref([])

onMounted(async ()=>{
  if (pageId){
    isLoading.value = true
    const newsItem = await NewsService().newsById(pageId)
    isLoading.value = false
    news.value = newsItem.data
  }
})

const update = async ()=> {
  isLoading.value = true
  if (files.value.length) news.value.image = await CommonService().uploadImage(files.value[0], 'news')
  const response = await NewsService().updateNews(news.value)
  isLoading.value = false
  if (response.data.id){
    router.push(PAGES.NEWS)
  }
}

const create = async ()=> {
  isLoading.value = true
  const response = await NewsService().createNews(news.value, files.value)
  isLoading.value = false
  if (response.id){
    router.push(PAGES.NEWS)
  }
}


</script>

<template>
  <PageLayout>
    <template #title>{{ pageId ? 'Редактировать новость ' : 'Создать новость' }}</template>
    <template #actions>
      <v-btn
          variant="outlined"
          color="primary"
          class="mr-10"
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
              v-model="news.title"
              clearable
              variant="solo-filled"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-textarea
              label="Описание новости"
              v-model="news.description"
              clearable
              variant="solo-filled"
          ></v-textarea>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-img :src="news.image"/>
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
              v-model="news.active"
          >
          </v-switch>
        </v-col>
      </v-row>
    </template>
  </PageLayout>
  <LoaderCircle v-if="isLoading"/>
</template>
