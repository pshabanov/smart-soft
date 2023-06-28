<script lang="ts" setup>
import {ref} from 'vue'
import {authenticate} from '@/utils'
import {useUserStore} from '@/stores'
import router from '@/router'
import {PAGES} from '@/model/menu/router.model'
import {UserService} from "@/services/user.service";

const auth = new authenticate()

const form = ref({
  email: 'fantasydarth@gmail.com',
  password: '123',
})

const login = async (e: SubmitEvent) => {
  e.preventDefault()
  const response = await UserService().login(form.value)
  useUserStore().isAuth = true
  useUserStore().token = response.access_token
  await router.push(PAGES.HOME)
}
</script>

<template>
  <div class="login">
    <div class="login-block">
      <div class="login-header">
        Авторизация
      </div>
      <v-form @submit="login">
        <v-text-field
            v-model="form.email"
            label="Email"
            placeholder="Введите ваш email"
            type="text"
            variant="underlined"
        ></v-text-field>
        <v-text-field
            v-model="form.password"
            label="Пароль"
            placeholder="Введите ваш пароль"
            type="password"
            variant="underlined"
        ></v-text-field>
        <v-btn type="submit" color="primary">Войти</v-btn>
      </v-form>
    </div>
  </div>
</template>
