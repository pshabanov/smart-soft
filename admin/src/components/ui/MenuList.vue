<script lang="ts" setup>
import type { MenuElement } from '@/entities/menu/menu.model'

const props = defineProps<{
  items: MenuElement[]
}>()

</script>

<template>
  <div v-for="item in items">
    <v-list-item
        v-if="!item.child.length"
        :key="item.label"
        :to="item.path"
        :title="item.label"
        :prepend-icon="item.icon"
    />
    <v-list-group
        v-else
        :key="item.label"
        :value="item.label"
        :prepend-icon="item.icon"
    >
      <template v-slot:activator="{ props }">
        <v-list-item
            v-bind="props"
            :title="item.label"
        ></v-list-item>
      </template>
      <MenuList :items="item.child"/>
    </v-list-group>
  </div>
</template>


<style>
.v-list .v-list-group {
  --prepend-width: 10px;
}
.v-list .v-list-item__prepend > .v-icon{
  margin-inline-end: 10px;
}
</style>
