import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '@/views/HomePage.vue'
import { PAGES } from '@/model'
import NotFoundPage from '@/views/NotFoundPage.vue'
import LoginPage from '@/views/LoginPage.vue'
import Banners from '@/views/Banners/Banners.vue'
import BannersDetail from '@/views/Banners/BannersDetail.vue'
import Solutions from '@/views/Solutions/Solutions.vue'
import SolutionsDetail from '@/views/Solutions/SolutionsDetail.vue'
import Services from '@/views/Services/Services.vue'
import ServicesDetail from '@/views/Services/ServicesDetail.vue'
import News from '@/views/News/News.vue'
import Reviews from '@/views/Reviews/Reviews.vue'
import ReviewsDetail from '@/views/Reviews/ReviewsDetail.vue'
import Certificates from '@/views/Certificates/Certificates.vue'
import CertificatesDetail from '@/views/Certificates/CertificatesDetail.vue'
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
      path: PAGES.BANNERS_UPDATE,
      name: 'banners_detail',
      component: BannersDetail,
    },
    {
      path: PAGES.BANNERS_CREATE,
      name: 'banners_create',
      component: BannersDetail,
    },
    {
      path: PAGES.SOLUTIONS,
      name: 'solutions',
      component: Solutions,
    },
    {
      path: PAGES.SOLUTIONS_UPDATE,
      name: 'solutions_detail',
      component: SolutionsDetail,
    },
    {
      path: PAGES.SOLUTIONS_CREATE,
      name: 'solutions_create',
      component: SolutionsDetail,
    },
    {
      path: PAGES.SERVICES,
      name: 'services',
      component: Services,
    },
    {
      path: PAGES.SERVICES_UPDATE,
      name: 'services_detail',
      component: ServicesDetail,
    },
    {
      path: PAGES.SERVICES_CREATE,
      name: 'services_create',
      component: ServicesDetail,
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
      path: PAGES.REVIEWS_UPDATE,
      name: 'reviews_detail',
      component: ReviewsDetail,
    },
    {
      path: PAGES.REVIEWS_CREATE,
      name: 'reviews_create',
      component: ReviewsDetail,
    },
    {
      path: PAGES.CERTIFICATES,
      name: 'certificates',
      component: Certificates,
    },
    {
      path: PAGES.CERTIFICATES_UPDATE,
      name: 'certificates_detail',
      component: CertificatesDetail,
    },
    {
      path: PAGES.CERTIFICATES_CREATE,
      name: 'certificates_create',
      component: CertificatesDetail,
    },
    {
      path: PAGES.NOT_FOUND_404,
      name: 'PAGE_NOT_FOUND',
      component: NotFoundPage,
    },
  ]
})

export default router
