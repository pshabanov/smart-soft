<header class="pt-6">
    <div class="wrapper">
        <div class="header">
            <div class="logo">
                <a class="flex flex-col" href="{{ route('home') }}">
                    <div class="text-4xl font-bold">Smart</div>
                    <div>Soft Company</div>
                </a>
            </div>
            <div class="header__promo">
                <div class="header__promo-block">
                    <div class="header__promo-title">Официльный партнер</div>
                    <div class="header__promo-subtitle">1С в Кыргызстане</div>
                </div>
                <div class="header__promo-block">
                    <div class="header__promo-title">Более 15 лет</div>
                    <div class="header__promo-subtitle">технического опыта</div>
                </div>
            </div>
            <div class="border-l border-gray-200 h-full"></div>
            <div class="header__contact header__icon-place">
                <div class="header__contact-title">Адрес</div>
                <div class="header__contact-text">г. Бишкек, Некая ул. 1</div>
                <div class="header__contact-text">&nbsp;</div>
            </div>
            <div class="header__contact header__icon-phone">
                <div class="header__contact-title">Контакты</div>
                <div class="header__contact-text">(0555) 55 55 55</div>
                <div class="header__contact-text">some@ssc.kg</div>
            </div>
        </div>
    </div>
    <nav class="nav">
        <div class="wrapper">
            <ul class="head-nav">
                <li><a href="{{ route('home')  }}" class="head-nav__link">Главная</a></li>
                <li><a href="{{ route('services_list') }}" class="head-nav__link">Услуги</a></li>
                <li><a href="{{ route('news_list') }}" class="head-nav__link">Новости</a></li>
                <li><a href="#" class="head-nav__link">Контакты</a></li>
                <li><a href="#" class="head-nav__link">О компании</a></li>
                <li><a href="#" class="head-nav__link">Сертификаты</a></li>
                <li><a href="{{ route('projects_list') }}" class="head-nav__link">Наши проекты</a></li>
            </ul>
        </div>
    </nav>
</header>
