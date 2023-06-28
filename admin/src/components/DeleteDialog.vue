<template>
  <v-dialog v-model="deleteDialog" max-width="400px">
    <v-card>
      <v-card-title>Удаление элемента:</v-card-title>
      <v-card-text>
        Вы уверены, что хотите <b>удалить</b> элемент?
      </v-card-text>
      <v-card-actions class="d-flex justify-end">
        <v-btn @click="$emit('update:modelValue', deleteDialog)">Отмена</v-btn>
        <v-btn color="red" @click="$emit('confirm')">Подтвердить</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script lang="ts" setup>
import { ref } from 'vue'

const deleteDialog = ref<boolean>(false)

</script>
