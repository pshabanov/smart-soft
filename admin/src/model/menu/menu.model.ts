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
        label: 'Каталог',
        icon: 'mdi-view-list',
        child: [
            {
                label: 'Категории',
                icon: 'mdi-animation',
                path: PAGES.CATEGORY,
                child: []
            },
            {
                label: 'Товары',
                icon: 'mdi-cart-variant',
                path: PAGES.PRODUCTS,
                child: []
            },
            {
                label: 'Фильтры',
                icon: 'mdi-tune-variant',
                path: PAGES.FILTERS,
                child: []
            },
            {
                label: 'Характеристики',
                icon: 'mdi-expand-all-outline',
                path: PAGES.ATTRIBUTES,
                child: []
            },
            {
                label: 'Опции',
                icon: 'mdi-folder-wrench-outline',
                path: PAGES.OPTIONS,
                child: []
            },
            {
                label: 'Бренды',
                icon: 'mdi-domain',
                path: PAGES.BRANDS,
                child: []
            },
            {
                label: 'Файлы',
                icon: 'mdi-file-document-multiple-outline',
                path: PAGES.FILES,
                child: []
            },
            {
                label: '?Обзоры',
                icon: 'mdi-youtube',
                path: PAGES.REVIEWS,
                child: []
            },
            {
                label: '?Шаблоны',
                icon: 'mdi-view-dashboard',
                path: PAGES.TEMPLATES,
                child: []
            },
        ],
    },
    {
        label: 'Продажи',
        icon: 'mdi-percent-box',
        child: [
            {
                label: 'Заказы',
                icon: 'mdi-abacus',
                path: PAGES.ORDERS,
                child: [],
            },
            {
                label: 'Подписки',
                icon: 'mdi-email-multiple',
                path: PAGES.SUBSCRIBERS,
                child: [],
            },
            {
                label: 'Возвраты',
                icon: 'mdi-backspace-outline',
                path: PAGES.RETURNS,
                child: [],
            },
            {
                label: 'Коды и подсказки',
                icon: 'mdi-gift-open-outline',
                path: PAGES.GIFTS,
                child: [],
            },
        ],
    },
    {
        label: 'Пользователи',
        icon: 'mdi-account',
        path: PAGES.USERS,
        child: [],
    },
    {
        label: 'Настройки',
        icon: 'mdi-cog',
        child: [
            {
                label: 'Настройки',
                icon: 'mdi-cog',
                path: PAGES.SETTINGS,
                child: [],
            },
            {
                label: 'Языки',
                icon: 'mdi-translate-variant',
                path: PAGES.LANGUAGES,
                child: [],
            },
        ],
    },
])
