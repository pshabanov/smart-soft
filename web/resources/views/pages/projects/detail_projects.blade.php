@extends('layout.app')
@section('title', 'Решение')
@section('content')

    @include('blocks.header')

    <main class="py-6">
        <div class="wrapper">
            <section class="case">
                <h1>{{$projects->title}}</h1>
                <div class="case__item">
                    <div class="case__item-info">
                        <div class="case__item-subtitle">О заказчике:</div>
                        <div class="case__item-text">
                            {!! $projects->about_company !!}
                        </div>
                    </div>
                    <div class="case__item-img">
                        <img
                            src="{{$projects->image ? $projects->image : 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg'}}"
                            alt="">
                    </div>
                </div>
                <div class="case__task case__item-block">
                    <div class="case__task-subtitle">Задача</div>
                    <div class="case__task-text">{!! $projects->task_text !!}</div>
                </div>
                <div class="case__solution case__item-block">
                    <div class="case__task-subtitle">Решение</div>
                    <div class="case__task-text">{!! $projects->solution_text !!}</div>
                </div>
                <div class="case__results case__item-block">
                    <div class="case__task-subtitle">Результат</div>
                    <div class="case__task-text">{!! $projects->results_text !!}</div>
                </div>
            </section>
        </div>
    </main>

    @include('blocks.footer')

@endsection
