@extends('layout.app')
@section('title', 'Главная страница')
@section('content')

    @include('blocks.header')
    @include('blocks.main-banner')

    <main class="py-6">
        <div class="wrapper">
            <section class="case">
                <div class="case__item">
                    <div class="case__item-info">
                        <h2 class="case__item-title">Кейс: Внедрение 1С: УНФ в производственно-торговую компанию</h2>
                        <div class="case__item-subtitle">О заказчике:</div>
                        <p class="case__item-text">Импульс-Автоматика производит и реализует оборудование для управления электротехническими устройствами. Компания закупает комплектующие, собирает, настраивает оборудование и реализует заказчикам. Импульс-Автоматика имеет свою сервисную службу для монтажа и обслуживания произведенного оборудования.</p>
                        <a href="#" class="btn">Подробнее</a>
                    </div>
                    <div class="case__item-img">
                        <img src="/images/demo-img.jpg" alt="">
                    </div>
                </div>
                <div class="case__item">
                    <div class="case__item-info">
                        <h2 class="case__item-title">Кейс: Внедрение 1С: УНФ в производственно-торговую компанию</h2>
                        <div class="case__item-subtitle">О заказчике:</div>
                        <p class="case__item-text">Импульс-Автоматика производит и реализует оборудование для управления электротехническими устройствами. Компания закупает комплектующие, собирает, настраивает оборудование и реализует заказчикам. Импульс-Автоматика имеет свою сервисную службу для монтажа и обслуживания произведенного оборудования.</p>
                        <a href="#" class="btn">Подробнее</a>
                    </div>
                    <div class="case__item-img">
                        <img src="/images/demo-img.jpg" alt="">
                    </div>
                </div>
                <div class="case__item">
                    <div class="case__item-info">
                        <h2 class="case__item-title">Кейс: Внедрение 1С: УНФ в производственно-торговую компанию</h2>
                        <div class="case__item-subtitle">О заказчике:</div>
                        <p class="case__item-text">Импульс-Автоматика производит и реализует оборудование для управления электротехническими устройствами. Компания закупает комплектующие, собирает, настраивает оборудование и реализует заказчикам. Импульс-Автоматика имеет свою сервисную службу для монтажа и обслуживания произведенного оборудования.</p>
                        <a href="#" class="btn">Подробнее</a>
                    </div>
                    <div class="case__item-img">
                        <img src="/images/demo-img.jpg" alt="">
                    </div>
                </div>
                <div class="case__item">
                    <div class="case__item-info">
                        <h2 class="case__item-title">Кейс: Внедрение 1С: УНФ в производственно-торговую компанию</h2>
                        <div class="case__item-subtitle">О заказчике:</div>
                        <p class="case__item-text">Импульс-Автоматика производит и реализует оборудование для управления электротехническими устройствами. Компания закупает комплектующие, собирает, настраивает оборудование и реализует заказчикам. Импульс-Автоматика имеет свою сервисную службу для монтажа и обслуживания произведенного оборудования.</p>
                        <a href="#" class="btn">Подробнее</a>
                    </div>
                    <div class="case__item-img">
                        <img src="/images/demo-img.jpg" alt="">
                    </div>
                </div>
            </section>
        </div>
    </main>

    @include('blocks.footer')

@endsection


