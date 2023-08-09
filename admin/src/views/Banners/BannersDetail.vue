<script lang="ts" setup="">

import PageLayout from '@/layout/PageLayout.vue'
import { useRoute } from 'vue-router'
import { onMounted, ref } from 'vue'
import type {BannersRequestType, RGBA} from '@/entities/news/news.model'
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
  description: '',
  link: '',
  gradient_start: '',
  gradient_under_info: '',
  gradient_end: '',
  active: false,
  position: 0,
  image: ''
})
const gradient_start = ref<RGBA>({ r: 0, g: 0, b: 0 })
const gradient_end = ref<RGBA>({ r: 0, g: 0, b: 0 })
const gradient_under_info = ref<RGBA>({ r: 0, g: 0, b: 0 })
const files = ref([])

onMounted(async ()=>{
  if (pageId){
    isLoading.value = true
    const newsItem = await BannersService().bannersById(Number(pageId))
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
  banners.value.gradient_start = `${gradient_start.value.r}, ${gradient_start.value.g}, ${gradient_start.value.b}`
  banners.value.gradient_end = `${gradient_end.value.r}, ${gradient_end.value.g}, ${gradient_end.value.b}`
  banners.value.gradient_under_info = `${gradient_under_info.value.r}, ${gradient_under_info.value.g}, ${gradient_under_info.value.b}`
  try {
    const response = await BannersService().createBanners(banners.value, files.value)
    isLoading.value = false
    if (response.id){
      router.push(PAGES.BANNERS)
    }
  }catch (e){
    console.log(e)
    isLoading.value = false
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
              v-model="banners.title"
              clearable
              variant="solo-filled"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-textarea
              label="Описание"
              v-model="banners.description"
              clearable
              variant="solo-filled"
          ></v-textarea>
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
        <v-col cols="2">
          <v-text-field
              label="Сортировка"
              v-model="banners.position"
              clearable
              type="number"
              variant="solo-filled"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <p>Начало градиента</p>
          <v-color-picker
              hide-inputs
              v-model="gradient_start"
              mode="rgb"
          ></v-color-picker>
        </v-col>
        <v-col>
          <p>Конец градиента</p>
          <v-color-picker
              hide-inputs
              v-model="gradient_end"
              mode="rgb"
          ></v-color-picker>
        </v-col>
        <v-col>
          <p>Градиент под информацию</p>
          <v-color-picker
              hide-inputs
              v-model="gradient_under_info"
              mode="rgb"
          ></v-color-picker>
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
