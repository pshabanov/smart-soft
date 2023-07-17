<template>
  <div class="layout">
    <div class="header">
      <v-app-bar class="ml-6">
        <v-app-bar-title>
          <slot name="title"/>
        </v-app-bar-title>
        <v-spacer/>
        <slot name="actions"/>
      </v-app-bar>
    </div>
    <div class="content">
      <slot name="content"/>
    </div>
  </div>
</template>
