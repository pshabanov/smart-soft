<template>
  <v-card>
    <v-layout class="h-screen">
      <v-app-bar>
        <v-app-bar-title>
          <slot name="title"/>
        </v-app-bar-title>
        <v-spacer/>
        <slot name="actions"/>
      </v-app-bar>
      <v-main class="h-100">
          <slot name="content"/>
      </v-main>
    </v-layout>
  </v-card>
</template>
