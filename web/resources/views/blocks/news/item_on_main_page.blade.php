<div class="news-on-main__item">
    <div class="news-on-main__info">
        <a href="{{route('detail_news', $news->id)}}">
            <img
                src="{{$news->image ? $news->image : '/image/no-image.jpg'}}"
                alt="">
        </a>
        <p class="news-on-main__title">{{$news->title}}</p>
        <p class="news-on-main__detail">{{$news->description}}</p>
    </div>
    <a href="{{route('detail_news', $news->id)}}" class="news-on-main__more">Подробнее</a>
</div>
