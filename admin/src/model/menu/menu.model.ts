import type { MenuElement } from '@/entities/menu/menu.model'
import { PAGES } from '@/model'


export const MENU: Readonly<MenuElement[]> = Object.freeze([
    {
        label: 'Главная',
        icon: 'mdi-home',
        path: PAGES.HOME,
        child: [],
    },
    {
        label: 'Баннеры',
        icon: 'mdi-image-area',
        path: PAGES.BANNERS,
        child: [],
    },
    {
        label: 'Решения',
        icon: 'mdi-briefcase-arrow-left-right-outline',
        path: PAGES.SOLUTIONS,
        child: [],
    },
    {
        label: 'Услуги',
        icon: 'mdi-percent-outline',
        path: PAGES.SERVICES,
        child: [],
    },
    {
        label: 'Новости',
        icon: 'mdi-newspaper-variant-outline',
        path: PAGES.NEWS,
        child: [],
    },
    {
        label: 'Отзывы',
        icon: 'mdi-message-draw',
        path: PAGES.REVIEWS,
        child: [],
    },
    {
        label: 'Сертификаты',
        icon: 'mdi-certificate-outline',
        path: PAGES.CERTIFICATES,
        child: [],
    },
])
