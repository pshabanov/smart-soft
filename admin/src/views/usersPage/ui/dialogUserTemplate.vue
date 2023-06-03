<script lang="ts" setup>

import type { UserType } from '@/entities/user/user.model'

const {user} = defineProps<{
  user: UserType
}>()

</script>

<template>
  <v-card
      prepend-icon="mdi-account"
  >
    <template v-slot:title>
      Данные о пользователе {{ user.username }}
    </template>
    <v-card-text>
      <div class="rounded text-h6 py-1" v-if="user.firstname">ФИО: {{ user.lastname }} {{ user.firstname }} {{ user.surname }}</div>
      <div class="rounded text-h6 py-1">Email: {{ user.email }}
        <v-chip :color="user.email_verified_at ? 'green': 'red'">
          {{ user.email_verified_at ? 'Подтвержден' : 'Не подтвержден' }}
        </v-chip>
      </div>
      <div class="rounded text-h6 py-1" v-if="user.phone">Телефон: {{ user.phone }}
        <v-chip :color="user.phone_verified_at ? 'green': 'red'">
          {{ user.phone_verified_at ? 'Подтвержден' : 'Не подтвержден' }}
        </v-chip>
      </div>
      <div class="rounded text-body-1 text-grey-lighten-1 py-0">Дата обновления: {{ new Date(user.updated_at) }}</div>
      <div class="rounded text-body-1 text-grey-lighten-1 py-0">Дата создания: {{ new Date(user.created_at) }}</div>
    </v-card-text>
  </v-card>
</template>
