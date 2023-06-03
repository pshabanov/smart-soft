<script lang="ts" setup>
import { PAGES } from '@/model'
import router from '@/router'

interface CategoryElement {
  id: number
  name: string
  path?: string
  child: CategoryElement[]
}

const props = defineProps<{
  items: CategoryElement[]
}>()

const getLink = (e:Event, id:number) =>{
  console.log(e.target)
  if (
      e.target?.classList.contains('v-list-item-title')||
      e.target?.classList.contains('linked-name')||
      e.target?.classList.contains('v-list-item')
  ){
    router.push(PAGES.CATEGORY_CREATE+`/${id}`)
  }
}

</script>

<template>
  <div v-for="item in props.items">
    <v-list-item
        v-if="!item.child.length"
        :key="item.id"
        :title="item.name"
        :to="`${PAGES.CATEGORY_CREATE}/${item.id}`"
    >
      <template v-slot:title>
        <span style="color: red">{{ item.id }}</span> <span>{{ item.name }}</span>
      </template>
    </v-list-item>
    <v-list-group
        v-else
        :key="item.id"
        :value="item.name"
        append-icon="mdi-plus"
    >
      <template v-slot:activator="{ props }">
        <v-list-item
            v-bind="props"
            :title="item.name"
            @click="getLink($event, item.id)"
        >
          <template v-slot:title>
            <span style="color: red">{{ item.id }}</span> <span class="linked-name">{{ item.name }}</span>
          </template>
        </v-list-item>
      </template>
     <category-list-tree :items="item.child"/>
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
