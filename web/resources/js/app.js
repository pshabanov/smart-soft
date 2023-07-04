import Swiper from 'swiper';
import Splide from '@splidejs/splide';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import '@splidejs/splide/dist/css/splide-core.min.css'
import '@splidejs/splide/dist/css/splide.min.css'
import {createApp} from 'vue'
import PopupForm from './components/PopupForm.vue'

const target__btn = document.querySelector('.target__btn')
const popup__form = document.querySelector('.popup__form')

target__btn?.addEventListener('click', () => {
    popup__form?.classList.add('__active')
})

createApp(PopupForm).mount('#popup__form');


let banners = new Swiper('.banner-slider', {
    loop: true,
    lazy: true,
})
if (document.querySelector('.splide'))
{
    let splide = new Splide('.splide', {
        breakpoints: {
            1920: {
                perPage: 3,
                type: 'loop',
                drag: 'free',
            },
            1280: {
                perPage: 3,
                type: 'loop',
                drag: false,
            },
            1024: {
                perPage: 2,
            },
            768: {
                perPage: 1,
            },
            475: {
                perPage: 1,
            },
        },

    });

    splide.mount();
}


const burger = document.querySelector('.burger')
const close = document.querySelector('.mob-menu__close')
const mobileMenu = document.querySelector('.nav.nav')
const body = document.querySelector('body')
const burgerMenuHandler = () => {
    mobileMenu.classList.toggle('__active')
    body.classList.toggle('__fix')
}
burger.addEventListener('click', burgerMenuHandler)
close.addEventListener('click', burgerMenuHandler)



