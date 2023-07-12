<footer class="pt-10 border-t-2 border-gray-300">
    <div class="wrapper">
        <div class="footer">
            <section>
                <div class="md:flex md:gap-10">
                    <div class="w-full mb-5 sm:w-2/5">
                        <h6 class="font-semibold text-main-red mb-3">Компания</h6>
                        <ul>
                            <li><a class="footer__link" href="{{ route('certificates') }}">Сертификаты</a></li>
                            <li><a class="footer__link" href="{{ route('contacts') }}">Контакты</a></li>
                            <li><a class="footer__link" href="{{ route('about-us') }}">О нас</a></li>
                        </ul>
                    </div>

                    <div class="w-full mb-5 sm:w-2/5">
                        <h6 class="font-semibold text-main-red mb-3">Контент</h6>
                        <ul>
                            <li><a class="footer__link decoration-gray-700 underline-offset-2" href="{{ route('solutions_list') }}">Решения</a></li>
                            <li><a class="footer__link decoration-gray-700 underline-offset-2" href="{{ route('services_list') }}">Услуги</a></li>
                            <li><a class="footer__link decoration-gray-700 underline-offset-2" href="{{ route('news_list') }}">Новости</a></li>
                        </ul>
                    </div>

                    <div class="w-full sm:w-1/5">
                        <h6 class="font-semibold text-main-red mb-3">Социальные сети</h6>
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
            </section>
        </div>
    </div>
</footer>

<div class="popup__form">
    <div id="popup__form"></div>
</div>
