@extends('layout.app')
@section('title', 'Решение')
@section('content')

    @include('blocks.header')

    <main class="py-6">
        <div class="wrapper">
            <section class="services">
                <h1>{{$services->title}}</h1>
                <div class="services__products">
                    <p class="services__description">
                        {!! $services->short_description !!}
                    </p>
                    <div class="services__price">
                        <div class="services__image">
                            <img
                                src="{{$services->image ? $services->image : 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg'}}"
                                alt="">
                        </div>
                        <div class="services__variants">
                            Цена:  {{$services->price}} сом
                        </div>
                    </div>
                </div>

               <h2>Описание</h2>
                <div class="services__tab-content content-1">
                    {!! $services->description !!}
                </div>

            </section>
        </div>
    </main>

    @include('blocks.footer')

@endsection
