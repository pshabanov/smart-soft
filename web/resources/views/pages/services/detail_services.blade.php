@extends('layout.app')
@section('title', 'Решение')
@section('content')

    @include('blocks.header')

    <main class="py-6">
        <div class="wrapper">
            <section class="services">
                <h1>{{$services->title}}</h1>
                <p class="services__description">
                    {{$services->short_description}}
                </p>
                <div class="services__products">
                    <div class="services__image">
                        <img
                            src="{{$services->image ? $services->image : 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg'}}"
                            alt="">
                    </div>
                    <div class="services__variants">
                        <div class="services__variants-item">
                            <div class="services__variants-text">ПРОФ на 1 р.м. (Программная лицензия)</div>
                            <div class="services__variants-price">50 000 cом</div>
                            <div class="services__variants-btn">Заказать</div>
                        </div>
                        <div class="services__variants-item">
                            <div class="services__variants-text">ПРОФ на 1 р.м. (USB лицензия)</div>
                            <div class="services__variants-price">55 000 cом</div>
                            <div class="services__variants-btn">Заказать</div>
                        </div>
                        <div class="services__variants-item">
                            <div class="services__variants-text">ПРОФ на 5 р.м. (Программная лицензия)</div>
                            <div class="services__variants-price">70 000 cом</div>
                            <div class="services__variants-btn">Заказать</div>
                        </div>
                        <div class="services__variants-item">
                            <div class="services__variants-text">ПРОФ на 5 р.м. (USB лицензия)</div>
                            <div class="services__variants-price">75 000 cом</div>
                            <div class="services__variants-btn">Заказать</div>
                        </div>
                    </div>
                </div>
                <div class="services__tabs">
                    <div class="services__tab tab-1 __active">Описание</div>
                    <div class="services__tab tab-2">Назначение</div>
                    <div class="services__tab tab-3">Инструкции</div>
                </div>
                <div class="services__tab-content content-1">
                    {!! $services->description !!}
                </div>
                <div class="services__tab-content content-2"></div>
                <div class="services__tab-content content-3"></div>
            </section>
        </div>
    </main>

    @include('blocks.footer')

@endsection
