<script lang="ts" setup>
import { RouterView } from 'vue-router'
import { useUserStore } from '@/stores'
import router from '@/router'
import { authenticate } from '@/utils'
import { onMounted, ref } from 'vue'
import { MENU, PAGES } from '@/model'
import Logo from '@/components/Logo.vue'
import MenuList from '@/components/ui/MenuList.vue'
import type { UserInfoType } from '@/entities/user/user.model'
const auth = new authenticate()

const menuActive = ref<boolean>(true)
const user = ref<UserInfoType>(useUserStore().userinfo)

const userLogout = () => {
  auth.logout()
}

onMounted(async () => {
  await auth.getUserInfoFromLS()
  user.value = useUserStore().userinfo
  if (!useUserStore().isAuth) await router.push(PAGES.LOGIN)
})

</script>

<template>
  <v-card>
    <v-layout>
      <v-navigation-drawer
          v-if="useUserStore().isAuth"
          v-model="menuActive">
        <div class="menu">
          <div class="menu-logo">
            <Logo/>
          </div>
          <v-list>
            <MenuList :items="MENU"></MenuList>
          </v-list>
        </div>
      </v-navigation-drawer>
      <v-app-bar v-if="useUserStore().isAuth">
        <v-app-bar-nav-icon icon="mdi-menu" @click="menuActive = !menuActive"></v-app-bar-nav-icon>
        <v-toolbar-title>
        </v-toolbar-title>
        <v-btn @click="userLogout">Выйти</v-btn>
      </v-app-bar>

      <v-main>
        <v-container fluid>
          <RouterView/>
        </v-container>
      </v-main>
    </v-layout>
  </v-card>
</template>

<style scoped>

</style>
