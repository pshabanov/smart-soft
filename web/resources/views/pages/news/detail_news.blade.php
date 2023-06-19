@extends('layout.app')
@section('title', 'Новость')
@section('content')

    @include('blocks.header')

    <main class="py-6">
        <div class="wrapper">
            <section class="case">
                <h1>{{ $news->title }}</h1>
                <img src="{{$news->image}}" alt="">
                <p>{{ $news->description }}</p>
            </section>
        </div>
    </main>

    @include('blocks.footer')

@endsection
