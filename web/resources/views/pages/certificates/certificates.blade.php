@extends('layout.app')
@section('title', 'Сертификаты')
@section('content')

    @include('blocks.header')

    <main class="py-6">
        <div class="wrapper">
            <h1>Сертификаты</h1>
            <div class="certificates__list">
                @each('pages.certificates.partials.item', $certificates, 'certificates')
            </div>
        </div>
    </main>

    @include('blocks.footer')

@endsection
