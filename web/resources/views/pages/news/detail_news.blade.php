@extends('layout.app')
@section('title', 'Новость')
@section('content')

    @include('blocks.header')

    <main class="py-6">
        <div class="wrapper">
            <section class="case">
                <h1 class="text-center">{{ $news->title }}</h1>
                <div class="img-center">
                    <img src="{{$news->image}}" alt="">
                </div>
                <p>{{ $news->description }}</p>
            </section>
        </div>
    </main>

    @include('blocks.footer')

@endsection
