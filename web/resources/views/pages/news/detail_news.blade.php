@extends('layout.app')
@section('title', 'Новость')
@section('content')

    @include('blocks.header')

    <main class="py-6">
        <div class="wrapper">
            <section class="case">
                <h1>{{ $title }}</h1>
            </section>
        </div>
    </main>

    @include('blocks.footer')

@endsection
