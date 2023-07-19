<script setup lang="ts">
import {onMounted, ref} from "vue";
import {SolutionsService} from "@/services/solutions.service";
import type { SolutionsRequestType } from '@/entities/news/news.model'
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
const viewModel = ref<SolutionsRequestType[]>([])
const deleteDialogModal = ref<boolean>(false)
const isLoading = ref<boolean>(false)
const editedId = ref<number>(0)

onMounted(async ()=>{
  isLoading.value = true
  const services = await SolutionsService().solutions()
  isLoading.value = false
  viewModel.value = services.data
})

const updateModel = (itemId: number) => {
  router.push(`${ PAGES.SOLUTIONS_DETAIL }/${ itemId }`)
}

const deleteModel = (itemId: number) => {
  editedId.value = itemId
  deleteDialogModal.value = true
}

const deleteModelConfirm = (itemId: number) => {
  deleteDialogModal.value = false
  isLoading.value = true
  SolutionsService().solutionsDelete(itemId).then(() => {
    viewModel.value = viewModel.value.filter(item=>item.id !== itemId)
    isLoading.value = false
  })
}
const createNews = () => {
  router.push(`${ PAGES.SOLUTIONS_CREATE }`)
}


</script>

<template>
  <PageLayout>
    <template #title>Отзывы</template>
    <template #actions>
      <v-btn
          class="mr-10"
          color="primary"
          @click="createNews()"
      >Добавить</v-btn>
    </template>
    <template #content>
      <data-table :headers="headers" :items="viewModel" >
        <template #item-actions="{ item }: { item: SolutionsRequestType }">
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
        <template #item-image="{ item }: { item: SolutionsRequestType }">
          <div style="width: 100px; height: auto; margin-right: 10px">
            <img :src="item.image" alt="">
          </div>
        </template>
        <template #item-active="{ item }: { item: SolutionsRequestType }">
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
