@extends('layout.app')
@section('title', 'Главная страница')
@section('content')

    @include('blocks.header')
    @include('blocks.main-banner')

    <main class="py-6">
        <div class="wrapper pb-10">
            <section class="ww-best">
                <h1 class="ww-best__title">Лучшие практики и решения в сфере 1С</h1>
                <div class="ww-best__list">
                    <div class="ww-best__item">
                        <div class="ww-best__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#ff813d" viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75"/>
                            </svg>
                        </div>
                        <div>
                            <h3>Подбор и внедрение стандартных конфигураций</h3>
                            <ul class="ww-best__attr">
                                <li>Консультативная помощь в выборе конфигурации 1С</li>
                                <li>Установка и настройка 1С</li>
                                <li>Переход на актуальную версию 1С</li>
                            </ul>
                        </div>
                    </div>
                    <div class="ww-best__item">
                        <div class="ww-best__icon">
                            <svg fill="#000000" height="800px" width="800px" viewBox="0 0 512 512">
                                <g>
                                    <g>
                                        <path
                                            d="M512,405.854V31.219H0v374.634h187.317v37.463H143.61v37.463H368.39v-37.463h-43.707v-37.463H512z M287.219,443.317 h-62.439v-37.463h62.439V443.317z M37.463,368.39V68.683h437.073V368.39H37.463z"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M249.308,250.98c0-5.801-0.729-11.434-2.09-16.817l18.477-10.667l-18.732-32.443l-18.521,10.693 c-8.048-7.82-17.999-13.682-29.085-16.83v-21.349h-37.463v21.349c-11.085,3.148-21.036,9.01-29.085,16.829l-18.519-10.693 l-18.732,32.443l18.476,10.667c-1.361,5.385-2.09,11.017-2.09,16.819c0,5.802,0.729,11.434,2.09,16.819l-18.476,10.667 l18.732,32.443l18.519-10.693c8.05,7.819,18,13.68,29.085,16.829v21.349h37.463v-21.349c11.087-3.148,21.037-9.01,29.085-16.83
			l18.521,10.693l18.732-32.443l-18.477-10.667C248.578,262.412,249.308,256.78,249.308,250.98z M180.625,282.201
			c-17.214,0-31.22-14.005-31.22-31.22c0-17.214,14.005-31.219,31.22-31.219c17.214,0,31.219,14.005,31.219,31.219
			C211.844,268.196,197.839,282.201,180.625,282.201z" fill="#ff813d"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M407.076,182.298v-37.463h-21.944c-1.141-3.213-2.573-6.349-4.315-9.366c-1.743-3.017-3.743-5.826-5.953-8.422
			l10.971-19.004l-32.443-18.732l-10.979,19.018c-6.862-1.286-13.807-1.292-20.542-0.034L310.91,89.311l-32.443,18.732
			l10.977,19.013c-4.518,5.296-7.957,11.339-10.23,17.779h-21.99v37.463h21.957c1.13,3.193,2.551,6.329,4.303,9.366
			c1.752,3.036,3.766,5.826,5.964,8.401l-10.984,19.025l32.443,18.732l10.993-19.041c3.402,0.634,6.863,0.97,10.342,0.97
			c3.389,0,6.791-0.322,10.169-0.945l10.979,19.016l32.443-18.732l-10.961-18.984c4.458-5.205,7.926-11.22,10.244-17.808H407.076z
			 M341.517,179.788c-8.946,5.164-20.423,2.089-25.588-6.856c-5.165-8.945-2.089-20.424,6.856-25.589
			c2.887-1.666,6.089-2.518,9.336-2.518c1.627,0,3.266,0.214,4.879,0.647c4.833,1.295,8.871,4.394,11.374,8.728
			C353.537,163.146,350.462,174.623,341.517,179.788z"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div>
                            <h3>Сопровождение и обновление 1С</h3>
                            <ul class="ww-best__attr">
                                <li>Информационно-технологическое сопровождение</li>
                                <li>Договорное абонентское обслуживание (вне ИТС)</li>
                                <li>Настройка резервного копирования</li>
                            </ul>
                        </div>
                    </div>
                    <div class="ww-best__item">
                        <div class="ww-best__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#ff813d" viewBox="0 0 24 24" stroke-width="1"
                                 stroke="currentColor" class="w-6 h-6">
                                <path
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                            </svg>
                        </div>
                        <div>
                            <h3>Оптимизация и исправление ошибок</h3>
                            <ul class="ww-best__attr">
                                <li>Аудит инфраструктуры и оценка производительности</li>
                                <li>Поиск и исправление ошибок в 1С</li>
                            </ul>
                        </div>
                    </div>
                    <div class="ww-best__item">
                        <div class="ww-best__icon">
                            <svg fill="#000" width="800px" height="800px" viewBox="0 0 64 64"
                                 data-name="Material Expand" id="Material_Expand" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12,40a2,2,0,0,0-2,2v6H6a2,2,0,0,0-2,2V60a2,2,0,0,0,2,2H18a2,2,0,0,0,2-2V50a2,2,0,0,0-2-2H14V44H30v4H26a2,2,0,0,0-2,2V60a2,2,0,0,0,2,2H38a2,2,0,0,0,2-2V50a2,2,0,0,0-2-2H34V44H51v4H47a2,2,0,0,0-2,2V60a2,2,0,0,0,2,2H59a2,2,0,0,0,2-2V50a2,2,0,0,0-2-2H55V42a2,2,0,0,0-2-2H34V35H48a6.006,6.006,0,0,0,6-6V4a2,2,0,0,0-2-2H13a2,2,0,0,0-2,2v8H9a2,2,0,0,0-2,2V29a6.006,6.006,0,0,0,6,6H30v5Zm4,18H8V52h8Zm20,0H28V52h8Zm21,0H49V52h8ZM15,6H50V29a2,2,0,0,1-4,0V14a2,2,0,0,0-2-2H15ZM11,29V16H42V29a5.972,5.972,0,0,0,.343,2H13A2,2,0,0,1,11,29Z"/>
                                <rect height="4" width="4" x="15" y="20" fill="#ff813d"/>
                                <rect height="4" width="13" x="23" y="20" fill="#ff813d"/>
                            </svg>
                        </div>
                        <div>
                            <h3>Интеграция с внешними системами</h3>
                            <ul class="ww-best__attr">
                                <li>HTTP- и веб-сервисы, интеграция с API</li>
                                <li>Интеграция с сайтами</li>
                                <li>Интеграция CRM с программой 1С</li>
                                <li>Импорт и экспорт данных в 1С</li>
                                <li>Интеграция 1С:Документооборот</li>
                                <li>Внедрение и настройка ТСД</li>
                                <li>Интеграция с маркетплейсами</li>
                            </ul>
                        </div>
                    </div>
                    <div class="ww-best__item">
                        <div class="ww-best__icon">
                            <svg fill="#000" height="800px" width="800px" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                 enable-background="new 0 0 512 512">
                                <g>
                                    <g>
                                        <path
                                            d="m289.7,76.1l55.3,47.8h-55.3v-47.8zm106.9,340.7c-11.3-5.68434e-14-20.5,9.1-20.5,20.4v23h-304.2v-408.4h176.9v92.4c0,11.3 9.2,20.4 20.5,20.4h106.9v122.4c0,11.3 9.2,20.4 20.5,20.4 11.3,0 20.5-9.1 20.5-20.4v-145.6c0-5.9-2.6-11.6-7.1-15.4l-127.4-110c-3.7-3.2-8.5-5-13.4-5h-217.8c-11.3,0-20.5,9.1-20.5,20.4v449.2c0,11.3 9.2,20.4 20.5,20.4h345.2c11.3,0 20.5-9.1 20.5-20.4v-43.4c-0.1-11.3-9.3-20.4-20.6-20.4z"
                                            fill="#444"/>
                                        <path
                                            d="m305.7,198.9h-162c-11.3,0-20.5,9.1-20.5,20.4s9.2,20.4 20.5,20.4h162.1c11.3,0 20.5-9.1 20.5-20.4s-9.3-20.4-20.6-20.4z"
                                            fill="#ff813d"/>
                                        <path
                                            d="m305.7,299.4h-162c-11.3,0-20.5,9.1-20.5,20.4 0,11.3 9.2,20.4 20.5,20.4h162.1c11.3,0 20.5-9.1 20.5-20.4-0.1-11.2-9.3-20.4-20.6-20.4z"
                                            fill="#ff813d"/>
                                        <path
                                            d="m480.9,317.5c-1-11.2-11-19.5-22.2-18.5-46.2,4.1-90.1,54.6-112.7,85.3l-13.3-15.1c-7.5-8.5-20.4-9.3-28.9-1.8-8.5,7.5-9.3,20.4-1.8,28.8l30.7,34.8c12,11.9 25.2,9.7 32.7-2.7 13.4-22.1 60.7-85.4 96.9-88.6 11.3-1.1 19.6-11 18.6-22.2z"
                                            fill="#ff813d"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div>
                            <h3>Автоматизация документооборота и бизнес-процессов</h3>
                            <ul class="ww-best__attr">
                                <li>Автоматизация розничной торговли</li>
                                <li>Автоматизация торговли услугами</li>
                                <li>Автоматизация оптовых продаж</li>
                                <li>Автоматизация интернет-магазина</li>
                                <li>Автоматизация производства</li>
                                <li>Автоматизация склада</li>
                            </ul>
                        </div>
                    </div>
                    <div class="ww-best__item">
                        <div class="ww-best__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#ff813d" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path
                                    d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z"/>
                            </svg>
                        </div>
                        <div>
                            <h3>Внедрение нестандартных решений</h3>
                            <ul class="ww-best__attr">
                                <li>Разработка отчётов и обработок</li>
                                <li>Услуги программиста 1С</li>
                                <li>Доработки типовых конфигураций 1С</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section class="target">
            <div class="wrapper">
                <div class="target__text">
                    <h2 class="target__title">Наша цель - рост вашего бизнеса!</h2>
                    <div class="target__subtitle">Мы помогаем создавать удобные и эффективные инструменты учета и
                        ведения бизнеса на базе продуктов 1С
                    </div>
                </div>
                <div class="target__btn">Получить консультацию</div>
            </div>
        </section>
        <section class="reviews">
            <div class="wrapper">
                <h2 class="reviews__header">Отзывы клиентов</h2>
                <div class="reviews__list">
                    @foreach($reviews as $review)
                        <div class="reviews__item">
                        <div class="reviews__item-img">
                            <img src="{{$review->image}}" alt="">
                        </div>
                        <div class="reviews__item-text">
                            {{$review->text}}
                        </div>
                        <div class="reviews__item-author">
                            <div class="reviews__item-author__company">{{$review->position}}</div>
                            <div class="reviews__item-author__name">{{$review->name}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="news-on-main">
            <div class="wrapper">
                <h2 class="news-on-main__header">Последние новости</h2>
                <div class="news-on-main__list">
                    @foreach($news as $news_item)
                        <div class="news-on-main__item">
                            <div class="news-on-main__info">
                                <a href="#">
                                    <img
                                        src="{{$news_item->image ? $news_item->image : 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg'}}"
                                        alt="">
                                </a>
                                <p class="news-on-main__title">{{$news_item->title}}</p>
                                <p class="news-on-main__detail">{{$news_item->description}}</p>
                            </div>
                            <a href="#" class="news-on-main__more">Подробнее</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    @include('blocks.footer')

@endsection


