<script lang="ts" setup="">

import PageLayout from '@/layout/PageLayout.vue'
import { useRoute } from 'vue-router'
import { onMounted, ref } from 'vue'
import type { NewsRequestType } from '@/entities/news/news.model'
import { NewsService } from '@/services/news.service'
import router from '@/router'
import { PAGES } from '@/model'
import LoaderCircle from '@/components/ui/loaders/LoaderCircle.vue'

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

const selectedImage = ref()
function encodeImageFileAsURL(element:any) {
  let file = element.files[0];
  let reader = new FileReader();
  reader.onloadend = function () {
    console.log('RESULT', reader.result)
  }
}

onMounted(async ()=>{
  isLoading.value = true
  if (pageId){
    const newsItem = await NewsService().newsById(pageId)
    isLoading.value = false
    news.value = newsItem.data
  }
})

const update = async ()=> {
  const response = await NewsService().updateNews(news.value)
  if (response.data.id){
    router.push(PAGES.NEWS)
  }
}

const create = async ()=> {
  const response = await NewsService().createNews(news.value)
  if (response.data.id){
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
          <v-text-field
              label="Название"
              v-model="news.image"
              clearable
              variant="solo-filled"
          ></v-text-field>
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
