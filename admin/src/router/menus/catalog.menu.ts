import { PAGES } from '@/model'
import CategoriesPage from '@/views/catalog/category/CategoriesPage.vue'
import CategoryDetailPage from '@/views/catalog/category/CategoryDetailPage.vue'
import ProductsPage from '@/views/catalog/product/ProductsPage.vue'
import ProductsDetailPage from '@/views/catalog/product/ProductsDetailPage.vue'
import FiltersPage from '@/views/catalog/FiltersPage.vue'
import AttributesPage from '@/views/catalog/AttributesPage.vue'
import OptionsPage from '@/views/catalog/OptionsPage.vue'
import BrandsPage from '@/views/catalog/BrandsPage.vue'
import FilesPage from '@/views/catalog/FilesPage.vue'
import ReviewsPage from '@/views/catalog/ReviewsPage.vue'
import TemplatesPage from '@/views/catalog/TemplatesPage.vue'
import type { RouteRecordRaw } from 'vue-router'

export const CatalogRouting: RouteRecordRaw[] = [
    {
        path: PAGES.CATEGORY,
        name: 'categories',
        component: CategoriesPage,
    },
    {
        path: PAGES.CATEGORY_DETAIL,
        name: 'category_detail',
        component: CategoryDetailPage,
    },
    {
        path: PAGES.CATEGORY_CREATE,
        name: 'category_create',
        component: CategoryDetailPage,
    },
    {
        path: PAGES.PRODUCTS,
        name: 'products',
        component: ProductsPage,
    },
    {
        path: PAGES.PRODUCT,
        name: 'products_detail',
        component: ProductsDetailPage,
    },
    {
        path: PAGES.PRODUCTS_DETAIL,
        name: 'products_create',
        component: ProductsDetailPage,
    },
    {
        path: PAGES.FILTERS,
        name: 'filters',
        component: FiltersPage,
    },
    {
        path: PAGES.ATTRIBUTES,
        name: 'attributes',
        component: AttributesPage,
    },
    {
        path: PAGES.OPTIONS,
        name: 'options',
        component: OptionsPage,
    },
    {
        path: PAGES.BRANDS,
        name: 'brand',
        component: BrandsPage,
    },
    {
        path: PAGES.FILES,
        name: 'files',
        component: FilesPage,
    },
    {
        path: PAGES.REVIEWS,
        name: 'reviews',
        component: ReviewsPage,
    },
    {
        path: PAGES.TEMPLATES,
        name: 'templates',
        component: TemplatesPage,
    },
]
