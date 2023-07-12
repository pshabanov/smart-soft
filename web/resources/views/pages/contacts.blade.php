@extends('layout.app')
@section('title', 'Контакты')
@section('content')

    @include('blocks.header')

    <main class="py-6">
        <div class="wrapper">
            <h1>Контакты </h1>
            <div class="contacts__list">
                <div class="header__contact header__icon-place">
                    <div class="header__contact-title">Адрес</div>
                    <div class="header__contact-text">г. Бишкек</div>
                </div>
                <div class="header__contact header__icon-place">
                    <div class="header__contact-title">Телефон</div>
                    <div class="header__contact-text">(0550) 11 88 28</div>
                </div>
                <div class="header__contact header__icon-place">
                    <div class="header__contact-title">Email</div>
                    <div class="header__contact-text">1cmyprog@gmail.com</div>
                </div>
            </div>
            <div class="header__contact header__icon-place">
                <div class="header__contact-title">Соц. сети</div>
                <div class="header__contact-text">
                    <div class="social__list">
                        <a href="https://www.instagram.com/1c.kgz/" target="_blank" class="social__item instagram">
                            <img src="/images/support-insta.svg" alt="">
                        </a>
                        <a href="https://t.me/SVNaumov" class="social__item telegram">
                            <img src="/images/support_telegram.svg" alt="">
                        </a>
                        <a href="https://wa.me/996550118828" class="social__item whatsapp">
                            <img src="/images/support_whatsapp.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('blocks.footer')

@endsection
