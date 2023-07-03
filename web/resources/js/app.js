import Swiper from 'swiper';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import {createApp} from 'vue'
import PopupForm from './components/PopupForm.vue'

const target__btn = document.querySelector('.target__btn')
const popup__form = document.querySelector('.popup__form')

target__btn?.addEventListener('click', ()=>{
    popup__form?.classList.add('__active')
})

createApp(PopupForm).mount('#popup__form');


const banners = new Swiper('.swiper.banner-slider', {
    loop: true,
    lazy: true,
})

const reviews = new Swiper('.swiper.reviews-slider', {
    loop: true,
    lazy: true,
    slidesPerView: 4,
})
