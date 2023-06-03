import { PAGES } from '@/model'
import SettingsPage from '@/views/settings/SettingsPage.vue'
import LanguagesPage from '@/views/settings/LanguagesPage.vue'
import type { RouteRecordRaw } from 'vue-router'


export const SettingsRouting: RouteRecordRaw[] = [
    {
        path: PAGES.SETTINGS,
        name: 'settings',
        component: SettingsPage,
    },
    {
        path: PAGES.LANGUAGES,
        name: 'languages',
        component: LanguagesPage,
    },
]
