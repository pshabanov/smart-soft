<script setup lang="ts">
import {onMounted, ref} from "vue";
import {NewsService} from "@/services/news.service";
import type {BannersRequestType} from "@/entities/news/news.model";




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
    title: 'Описание',
    value: 'description',
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

onMounted(async ()=>{
  const news = await NewsService().news()
  viewModel.value = news.data
})

</script>

<template>
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
        <v-switch v-model="item.active" class="d-flex align-center justify-center" color="red"></v-switch>
      </div>
    </template>
  </data-table>
</template>
