import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '@/views/HomePage.vue'
import { PAGES } from '@/model'
import NotFoundPage from '@/views/NotFoundPage.vue'
import LoginPage from '@/views/LoginPage.vue'
import Banners from '@/views/Banners.vue'
import Solutions from '@/views/Solutions.vue'
import Services from '@/views/Services.vue'
import News from '@/views/News/News.vue'
import Reviews from '@/views/Reviews.vue'
import Certificates from '@/views/Certificates.vue'
import NewsDetail from '@/views/News/NewsDetail.vue'


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
    {
      path: PAGES.BANNERS,
      name: 'banners',
      component: Banners,
    },
    {
      path: PAGES.SOLUTIONS,
      name: 'solutions',
      component: Solutions,
    },
    {
      path: PAGES.SERVICES,
      name: 'services',
      component: Services,
    },
    {
      path: PAGES.NEWS,
      name: 'news',
      component: News,
    },
    {
      path: PAGES.NEWS_UPDATE,
      name: 'news_detail',
      component: NewsDetail,
    },
    {
      path: PAGES.NEWS_CREATE,
      name: 'news_create',
      component: NewsDetail,
    },
    {
      path: PAGES.REVIEWS,
      name: 'reviews',
      component: Reviews,
    },
    {
      path: PAGES.CERTIFICATES,
      name: 'certificates',
      component: Certificates,
    },
    {
      path: PAGES.NOT_FOUND_404,
      name: 'PAGE_NOT_FOUND',
      component: NotFoundPage,
    },
  ]
})

export default router
