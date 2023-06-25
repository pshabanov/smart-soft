<script lang="ts" setup>
import { ref } from 'vue'
import { UserService } from '@/services'
import { authenticate } from '@/utils'
import { useUserStore } from '@/stores'
import router from '@/router'
import { PAGES } from '@/model/menu/router.model'
import Logo from '@/components/Logo.vue'

const auth = new authenticate()

const form = ref({
  username: '',
  password: '',
})

if (useUserStore().isAuth) {
  router.push(PAGES.HOME)
}

const login = async (e: SubmitEvent) => {
  e.preventDefault()
  await UserService().login(form.value).then((response) => {
    auth.putUserInfoInLS(response, response.token)
    useUserStore().isAuth=true
  })
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
            v-model="form.username"
            label="Логин"
            placeholder="Введите ваш логин"
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
        <v-btn block type="submit" color="primary">Войти</v-btn>
      </v-form>
    </div>
  </div>
</template>
