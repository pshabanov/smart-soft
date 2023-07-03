<script lang="ts" setup="">

import PageLayout from '@/layout/PageLayout.vue'
import { useRoute } from 'vue-router'
import { onMounted, ref } from 'vue'
import type { ReviewRequestType} from '@/entities/news/news.model'
import { ReviewsService } from '@/services/reviews.service'
import router from '@/router'
import { PAGES } from '@/model'
import LoaderCircle from '@/components/ui/loaders/LoaderCircle.vue'
import {CommonService} from "@/services/common.service";

const route = useRoute()

const pageId = route.params.id
const isLoading = ref<boolean>(false)
const review = ref<ReviewRequestType>({
  id: 0,
  text: '',
  company: '',
  active: false,
  image: ''
})

const files = ref([])

onMounted(async ()=>{
  if (pageId){
    isLoading.value = true
    const newsItem = await ReviewsService().reviewsById(pageId)
    isLoading.value = false
    review.value = newsItem.data
  }
})

const update = async ()=> {
  isLoading.value = true
  if (files.value.length) review.value.image = await CommonService().uploadImage(files.value[0], 'reviews')
  const response = await ReviewsService().updateReviews(review.value)
  isLoading.value = false
  if (response.data.id){
    router.push(PAGES.REVIEWS)
  }
}

const create = async ()=> {
  isLoading.value = true
  const response = await ReviewsService().createReviews(review.value, files.value)
  isLoading.value = false
  if (response.id){
    router.push(PAGES.REVIEWS)
  }
}


</script>

<template>
  <PageLayout>
    <template #title>{{ pageId ? 'Редактировать отзыв ' : 'Создать отзыв' }}</template>
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
              label="Компания"
              v-model="review.company"
              clearable
              variant="solo-filled"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-textarea
              label="Описание отзыва"
              v-model="review.text"
              clearable
              variant="solo-filled"
          ></v-textarea>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-img :src="review.image"/>
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
              v-model="review.active"
          >
          </v-switch>
        </v-col>
      </v-row>
    </template>
  </PageLayout>
  <LoaderCircle v-if="isLoading"/>
</template>
