<script setup lang="ts">
import {onMounted, ref} from "vue";
import {CertificatesService} from "@/services/certificates.service";
import type { CertificatesRequestType } from '@/entities/news/news.model'
import router from '@/router'
import { PAGES } from '@/model'
import DeleteDialog from '@/components/DeleteDialog.vue'
import PageLayout from '@/layout/PageLayout.vue'
import LoaderCircle from '@/components/ui/loaders/LoaderCircle.vue'

const headers = ([
  {
    title: 'ID',
    value: 'id',
    align: 'left',
  },
  {
    title: 'Название',
    value: 'title',
    align: 'left',
  },
  {
    title: 'Изображение',
    value: 'image',
    align: 'left',
  },
  {
    title: 'Активность',
    value: 'active',
    align: 'center',
  },
  {
    title: 'Действия',
    value: 'actions',
    align: 'right',
  },
])
const viewModel = ref<CertificatesRequestType[]>([])
const deleteDialogModal = ref<boolean>(false)
const isLoading = ref<boolean>(false)
const editedId = ref<number>(0)

onMounted(async ()=>{
  isLoading.value = true
  const news = await CertificatesService().certificates()
  isLoading.value = false
  viewModel.value = news.data
})

const updateModel = (itemId: number) => {
  router.push(`${ PAGES.CERTIFICATES_DETAIL }/${ itemId }`)
}

const deleteModel = (itemId: number) => {
  editedId.value = itemId
  deleteDialogModal.value = true
}

const deleteModelConfirm = (itemId: number) => {
  deleteDialogModal.value = false
  isLoading.value = true
  CertificatesService().certificatesDelete(itemId).then(() => {
    viewModel.value = viewModel.value.filter(item=>item.id !== itemId)
    isLoading.value = false
  })
}
const createCertificates = () => {
  router.push(`${ PAGES.CERTIFICATES_CREATE }`)
}


</script>

<template>
  <PageLayout>
    <template #title>Отзывы</template>
    <template #actions>
      <v-btn
          class="mr-3"
          color="primary"
          @click="createCertificates()"
      >Добавить</v-btn>
    </template>
    <template #content>
      <data-table :headers="headers" :items="viewModel" >
        <template #item-actions="{ item }: { item: CertificatesRequestType }">
          <div style="width: 90px;">
            <v-btn
                class="mr-3"
                color="red"
                icon="mdi-pencil"
                size="x-small"
                @click="updateModel(item.id)"
            ></v-btn>
            <v-btn
                class="mr-3"
                color="red"
                icon="mdi-delete"
                size="x-small"
                @click="deleteModel(item.id)"
            ></v-btn>
          </div>
        </template>
        <template #item-image="{ item }: { item: CertificatesRequestType }">
          <div style="width: 100px; height: auto; margin-right: 10px">
            <img :src="item.image" alt="">
          </div>
        </template>
        <template #item-active="{ item }: { item: CertificatesRequestType }">
          <div class="table-active d-flex align-center justify-center" style="pointer-events: none">
            <v-switch
                v-model="item.active"
                class="d-flex align-center justify-center"
                :color="item.active? 'primary': 'secondary'"
                disabled/>
          </div>
        </template>
      </data-table>
      <DeleteDialog v-model="deleteDialogModal" @confirm="deleteModelConfirm(editedId)"></DeleteDialog>
    </template>
  </PageLayout>
  <LoaderCircle v-if="isLoading"/>
</template>


<style>
.v-table__wrapper .v-switch__thumb {
  color: #646464;
}
</style>
