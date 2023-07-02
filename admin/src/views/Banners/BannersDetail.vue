<script lang="ts" setup="">

import PageLayout from '@/layout/PageLayout.vue'
import { useRoute } from 'vue-router'
import { onMounted, ref } from 'vue'
import type { BannersRequestType } from '@/entities/news/news.model'
import { BannersService } from '@/services/banners.service'
import router from '@/router'
import { PAGES } from '@/model'
import LoaderCircle from '@/components/ui/loaders/LoaderCircle.vue'
import {CommonService} from "@/services/common.service";

const route = useRoute()

const pageId = route.params.id
const isLoading = ref<boolean>(false)
const banners = ref<BannersRequestType>({
  id: 0,
  title: '',
  link: '',
  gradient_start: '',
  gradient_end: '',
  active: false,
  image: ''
})

const files = ref([])

onMounted(async ()=>{
  if (pageId){
    isLoading.value = true
    const newsItem = await BannersService().bannersById(pageId)
    isLoading.value = false
    banners.value = newsItem.data
  }
})

const update = async ()=> {
  isLoading.value = true
  if (files.value.length) banners.value.image = await CommonService().uploadImage(files.value[0], 'banners')
  const response = await BannersService().updateBanners(banners.value)
  isLoading.value = false
  if (response.data.id){
    router.push(PAGES.BANNERS)
  }
}

const create = async ()=> {
  isLoading.value = true
  const response = await BannersService().createBanners(banners.value, files.value)
  isLoading.value = false
  if (response.id){
    router.push(PAGES.BANNERS)
  }
}


</script>

<template>
  <PageLayout>
    <template #title>{{ pageId ? 'Редактировать баннер ' : 'Создать баннер' }}</template>
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
              v-model="banners.title"
              clearable
              variant="solo-filled"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-text-field
              label="Ссылка"
              v-model="banners.link"
              clearable
              variant="solo-filled"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-text-field
              label="Начало градиента"
              v-model="banners.gradient_start"
              clearable
              variant="solo-filled"
          ></v-text-field>
        </v-col>
        <v-col>
          <v-text-field
              label="Конец градиента"
              v-model="banners.gradient_end"
              clearable
              variant="solo-filled"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-img :src="banners.image"/>
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
              v-model="banners.active"
          >
          </v-switch>
        </v-col>
      </v-row>
    </template>
  </PageLayout>
  <LoaderCircle v-if="isLoading"/>
</template>
