<script lang="ts" setup="">

import PageLayout from '@/layout/PageLayout.vue'
import {useRoute} from 'vue-router'
import {onMounted, ref} from 'vue'
import type {ServicesRequestType} from '@/entities/news/news.model'
import {ServicesService} from '@/services/services.service'
import router from '@/router'
import {PAGES} from '@/model'
import LoaderCircle from '@/components/ui/loaders/LoaderCircle.vue'
import {CommonService} from "@/services/common.service";

const route = useRoute()

const pageId = route.params.id
const isLoading = ref<boolean>(false)
const services = ref<ServicesRequestType>({
  id: 0,
  title: '',
  short_description: '',
  description: '',
  price: '',
  active: false,
  image: ''
})

const files = ref([])

onMounted(async ()=>{
  if (pageId){
    isLoading.value = true
    const newsItem = await ServicesService().servicesById(pageId)
    isLoading.value = false
    services.value = newsItem.data
  }
})

const update = async ()=> {
  isLoading.value = true
  if (files.value.length) services.value.image = await CommonService().uploadImage(files.value[0], 'services')
  const response = await ServicesService().updateServices(services.value)
  isLoading.value = false
  if (response.data.id){
    router.push(PAGES.SERVICES)
  }
}

const create = async ()=> {
  isLoading.value = true
  const response = await ServicesService().createServices(services.value, files.value)
  isLoading.value = false
  if (response.id){
    router.push(PAGES.SERVICES)
  }
}


</script>

<template>
  <PageLayout>
    <template #title>{{ pageId ? 'Редактировать услугу ' : 'Создать услугу' }}</template>
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
              v-model="services.title"
              clearable
              variant="solo-filled"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="3">
          <v-text-field
              label="Цена"
              v-model="services.price"
              type="number"
              variant="solo-filled"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-textarea
              label="Короткое описание"
              v-model="services.short_description"
              clearable
              variant="solo-filled"
          ></v-textarea>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-textarea
              label="Описание"
              v-model="services.description"
              clearable
              variant="solo-filled"
          ></v-textarea>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-img :src="services.image"/>
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
              v-model="services.active"
          >
          </v-switch>
        </v-col>
      </v-row>
    </template>
  </PageLayout>
  <LoaderCircle v-if="isLoading"/>
</template>
