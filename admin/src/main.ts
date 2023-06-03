import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'


import '@mdi/font/css/materialdesignicons.css'

import '@fortawesome/fontawesome-free/css/all.css'
import 'vuetify/styles'
import './assets/main.css'
import { library } from '@fortawesome/fontawesome-svg-core'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { aliases, mdi } from 'vuetify/iconsets/mdi'
import { fa } from 'vuetify/iconsets/fa'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

import 'vue-toastification/dist/index.css'

import Editor from '@/components/ui/editors/Editor.vue'
import DataTable from '@/components/ui/DataTable.vue'
import { faBold } from '@fortawesome/free-solid-svg-icons'
library.add(faBold)
const vuetify = createVuetify({
    theme: {
        defaultTheme: 'dark',
    },
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
            mdi,
            fa
        },
    },
    components,
    directives,
})



const app = createApp(App)

app.component('font-awesome-icon', FontAwesomeIcon)
app.component('Editor', Editor)
app.component('DataTable', DataTable)

app.use(createPinia())
app.use(router)
app.use(vuetify)

app.mount('#app')
