@extends('layout.app')
@section('title', 'Новости компании')
@section('content')

    @include('blocks.header')

    <main class="py-6">
        <div class="wrapper">
            <section class="case">
                <h1 class="pb-10">Новости</h1>
                <div class="news-on-main__list">
                    @each('blocks.news.item', $news, 'news')
                </div>
                {{ $news->links() }}
            </section>
        </div>
    </main>

    @include('blocks.footer')

@endsection
