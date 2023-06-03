<script lang="ts" setup>
import router from '@/router'

const redirectBack = () => {
  console.log(router.back())
}


</script>

<template>
  <div class="not-found-page">
    <h2>404</h2>
    <p>Такой страницы не существует!</p>
    <v-btn class="mt-5" color="warning" @click="redirectBack">Назад</v-btn>
  </div>
</template>

<style scoped>

</style>
