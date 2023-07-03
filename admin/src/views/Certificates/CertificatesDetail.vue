<script lang="ts" setup="">

import PageLayout from '@/layout/PageLayout.vue'
import {useRoute} from 'vue-router'
import {onMounted, ref} from 'vue'
import type {CertificatesRequestType} from '@/entities/news/news.model'
import {CertificatesService} from '@/services/certificates.service'
import router from '@/router'
import {PAGES} from '@/model'
import LoaderCircle from '@/components/ui/loaders/LoaderCircle.vue'
import {CommonService} from "@/services/common.service";

const route = useRoute()

const pageId = route.params.id
const isLoading = ref<boolean>(false)
const certificate = ref<CertificatesRequestType>({
  id: 0,
  title: '',
  active: false,
  image: ''
})

const files = ref([])

onMounted(async () => {
  if (pageId) {
    isLoading.value = true
    const newsItem = await CertificatesService().certificatesById(pageId)
    isLoading.value = false
    certificate.value = newsItem.data
  }
})

const update = async () => {
  isLoading.value = true
  if (files.value.length) certificate.value.image = await CommonService().uploadImage(files.value[0], 'certificates')
  const response = await CertificatesService().updateCertificates(certificate.value)
  isLoading.value = false
  if (response.data.id) {
    router.push(PAGES.CERTIFICATES)
  }
}

const create = async () => {
  isLoading.value = true
  const response = await CertificatesService().createCertificates(certificate.value, files.value)
  isLoading.value = false
  if (response.id) {
    router.push(PAGES.CERTIFICATES)
  }
}


</script>

<template>
  <PageLayout>
    <template #title>{{ pageId ? 'Редактировать сертификат ' : 'Создать сертификат' }}</template>
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
              v-model="certificate.title"
              clearable
              variant="solo-filled"
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-img :src="certificate.image"/>
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
              v-model="certificate.active"
          >
          </v-switch>
        </v-col>
      </v-row>
    </template>
  </PageLayout>
  <LoaderCircle v-if="isLoading"/>
</template>
