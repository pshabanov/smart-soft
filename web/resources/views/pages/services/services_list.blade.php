@extends('layout.app')
@section('title', 'Услуги и продукты')
@section('content')

    @include('blocks.header')

    <main class="py-6">
        <div class="wrapper">
            <section class="services">
                <h1>Услуги и продукты</h1>
                <div class="services__list">
                    @each('pages.services.partials.item', $services, 'services')
                </div>
            </section>
        </div>
    </main>

    @include('blocks.footer')

@endsection
