<script setup lang="ts">
import {onMounted, ref} from "vue";
import {BannersService} from "@/services/banners.service";
import type { BannersRequestType } from '@/entities/news/news.model'
import router from '@/router'
import { PAGES } from '@/model'
import DeleteDialog from '@/components/DeleteDialog.vue'
import PageLayout from '@/layout/PageLayout.vue'
import LoaderCircle from '@/components/ui/loaders/LoaderCircle.vue'

const headers = ([
  {
    title: 'ID',
    value: 'id',
    sort: false,
    align: 'left',
  },
  {
    title: 'Название',
    value: 'title',
    sort: false,
    align: 'left',
  },
  {
    title: 'Ссылка',
    value: 'link',
    sort: false,
    align: 'center',
  },
  {
    title: 'Активность',
    value: 'active',
    sort: false,
    align: 'center',
  },
  {
    title: 'Действия',
    value: 'actions',
    sort: false,
    align: 'right',
  },
])
const viewModel = ref<BannersRequestType[]>([])
const deleteDialogModal = ref<boolean>(false)
const isLoading = ref<boolean>(false)
const editedId = ref<number>(0)

onMounted(async ()=>{
  isLoading.value = true
  const news = await BannersService().banners()
  isLoading.value = false
  viewModel.value = news.data
})

const updateModel = (itemId: number) => {
  router.push(`${ PAGES.BANNERS_DETAIL }/${ itemId }`)
}

const deleteModel = (itemId: number) => {
  editedId.value = itemId
  deleteDialogModal.value = true
}

const deleteModelConfirm = (itemId: number) => {
  deleteDialogModal.value = false
  isLoading.value = true
  BannersService().bannersDelete(itemId).then(() => {
    viewModel.value = viewModel.value.filter(item=>item.id !== itemId)
    isLoading.value = false
  })
}
const createBanners = () => {
  router.push(`${ PAGES.BANNERS_CREATE }`)
}


</script>

<template>
  <PageLayout>
    <template #title>Новости</template>
    <template #actions>
      <v-btn
          class="mr-3"
          color="primary"
          @click="createBanners()"
      >Добавить</v-btn>
    </template>
    <template #content>
      <data-table :headers="headers" :items="viewModel" >
        <template #item-actions="{ item }: { item: BannersRequestType }">
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
        </template>
        <template #item-active="{ item }: { item: BannersRequestType }">
          <div class="table-active d-flex align-center justify-center" style="pointer-events: none">
            <v-switch v-model="item.active" class="d-flex align-center justify-center" :color="item.active? 'primary': 'secondary'" disabled></v-switch>
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
