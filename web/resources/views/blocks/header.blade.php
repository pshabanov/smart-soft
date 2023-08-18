<header class="pt-6">
    <div class="wrapper">
        <div class="header">
            <div class="logo">
                <a class="flex flex-col w-full" href="/">
                    <img src="/images/smart-soft-company-logo.svg" alt="">
                </a>
            </div>
            <div class="header__promo">
                <div class="header__promo-block">
                    <div class="header__promo-title">Официальный партнер</div>
                    <div class="header__promo-subtitle">1С в Кыргызстане</div>
                </div>
                <div class="header__promo-block">
                    <div class="header__promo-title">20 лет опыта</div>
                    <div class="header__promo-subtitle">внедрений продуктов 1с<br>
                    </div>
                </div>
            </div>
            <div class="border-l border-gray-200 h-full devider"></div>
            <div class="header__contact header__icon-place">
                <div class="header__contact-title">Адрес</div>
                <div class="header__contact-text">г. Бишкек</div>
                <div class="header__contact-text">&nbsp;</div>
            </div>
            <div class="header__contact header__icon-phone">
                <div class="header__contact-title">Контакты</div>
                <div class="header__contact-text">(0550) 11 88 28</div>
                <div class="header__contact-text">1cmyprog@gmail.com</div>
            </div>
            <div class="burger __mob">
                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12H20" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
                    <path d="M5 17H20" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
                    <path d="M5 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
    </div>
    <nav class="nav">
        <div class="wrapper">
            <ul class="head-nav __desk">
                @include('blocks.main-menu')
            </ul>
            <ul class="head-nav __mob">
                @include('blocks.main-menu')
                <div class="mob-menu__close">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="Edit / Close_Circle">
                            <path id="Vector" d="M9 9L11.9999 11.9999M11.9999 11.9999L14.9999 14.9999M11.9999 11.9999L9 14.9999M11.9999 11.9999L14.9999 9M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                    </svg>
                </div>
            </ul>
        </div>
    </nav>
</header>
