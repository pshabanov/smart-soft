import { PAGES } from '@/model'
import OrdersPage from '@/views/sales/OrdersPage.vue'
import SubscribersPage from '@/views/sales/SubscribersPage.vue'
import ReturnsPage from '@/views/sales/ReturnsPage.vue'
import GiftsPage from '@/views/sales/GiftsPage.vue'
import type { RouteRecordRaw } from 'vue-router'


export const ProductsRouting: RouteRecordRaw[] = [
    {
        path: PAGES.ORDERS,
        name: 'orders',
        component: OrdersPage,
    },
    {
        path: PAGES.SUBSCRIBERS,
        name: 'subscribers',
        component: SubscribersPage,
    },
    {
        path: PAGES.RETURNS,
        name: 'returns',
        component: ReturnsPage,
    },
    {
        path: PAGES.GIFTS,
        name: 'gifts',
        component: GiftsPage,
    },
]
