<script setup lang="ts">

import DataTable from '@/components/ui/DataTable.vue'
import { onMounted, reactive, ref } from 'vue'
import type { UserInfoType, UserType } from '@/entities/types'
import { UserService } from '@/services'
import LoaderCircle from '@/components/ui/loaders/LoaderCircle.vue'
import DialogUserTemplate from '@/views/usersPage/ui/dialogUserTemplate.vue'

let users = reactive<{
  items: UserInfoType[]
}>({
  items: [],
})

const selectedUser = reactive<{
  item: UserType
}>({
  item:{
    username: '',
    id: null,
    email: null,
    email_verified_at: null,
    firstname: null,
    lastname: null,
    phone: null,
    surname: null,
    phone_verified_at: null
  }
})
const isLoading = ref<boolean>(false)
const showDialog = ref<boolean>(false)
const headers = [
  {
    title: 'ID',
    value: 'id',
    sort: false,
    align: 'left',
  },
  {
    title: 'Логин',
    value: 'username',
    sort: false,
    align: 'center',
  },
  {
    title: 'Действия',
    value: 'actions',
    sort: false,
    align: 'right',
  },

]

const viewUser = (user: UserType) => {
  showDialog.value = true
  selectedUser.item = {...user}
}

onMounted(async () => {
  isLoading.value = true
  users.items = await UserService()
      .getUsers()
  isLoading.value = false
})

</script>

<template>
  <v-card>
    <v-layout class="h-screen">
      <v-app-bar>
        <v-app-bar-title>Пользователи</v-app-bar-title>

        <v-spacer/>

        <v-btn
            color="primary"
            variant="outlined">
          Добавить
        </v-btn>
      </v-app-bar>
      <v-main class="h-100">
        <data-table :headers="headers" :items="users.items">
          <template #item-actions='data'>
            <v-btn
                class="mr-3"
                color="primary"
                icon="mdi-eye-outline"
                size="x-small"
                @click="viewUser(data.item)"
            ></v-btn>
          </template>
        </data-table>
      </v-main>
    </v-layout>
  </v-card>
  <v-dialog v-model="showDialog" max-width="800px">
    <v-card>
      <v-card-text>
        <dialog-user-template :user="selectedUser.item"/>
      </v-card-text>
      <v-card-actions>
        <v-btn color="primary" block @click="showDialog = false">Закрыть</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
  <loader-circle v-if="isLoading"/>
</template>
