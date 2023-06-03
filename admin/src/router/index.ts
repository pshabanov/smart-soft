import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '@/views/HomePage.vue'
import { PAGES } from '@/model'
import NotFoundPage from '@/views/NotFoundPage.vue'
import LoginPage from '@/views/LoginPage.vue'
import UsersPage from '@/views/usersPage/UsersPage.vue'
import { CatalogRouting } from '@/router/menus/catalog.menu'
import { ProductsRouting } from '@/router/menus/product.menu'
import { SettingsRouting } from '@/router/menus/settings.menu'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: PAGES.LOGIN,
      name: 'login',
      component: LoginPage
    },
    {
      path: PAGES.HOME,
      name: 'home',
      component: HomePage
    },
      ...CatalogRouting,
      ...ProductsRouting,
    {
      path: PAGES.USERS,
      name: 'users',
      component: UsersPage,
    },
      ...SettingsRouting,
    {
      path: PAGES.NOT_FOUND_404,
      name: 'PAGE_NOT_FOUND',
      component: NotFoundPage,
    },
  ]
})

export default router
