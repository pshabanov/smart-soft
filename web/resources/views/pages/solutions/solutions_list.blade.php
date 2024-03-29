@extends('layout.app')
@section('title', 'Решения')
@section('content')

    @include('blocks.header')

    <main class="py-6">
        <div class="wrapper">
            <section class="case">
                <h1>Наши проекты</h1>
                <div class="news__list">
                    @each('pages.solutions.partials.item', $solutions, 'solutions')
                </div>
                {{ $solutions->links('vendor.pagination.default') }}
            </section>
        </div>
    </main>

    @include('blocks.footer')

@endsection
