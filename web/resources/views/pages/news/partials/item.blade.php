<div class="news__item">
    <div class="news__info">
        <a href="{{route('detail_news', $news->id)}}">
            <img
                src="{{$news->image ? $news->image : 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg'}}"
                alt="">
        </a>
        <p class="news__title">{{$news->title}}</p>
        <p class="news__detail">{{$news->description}}</p>
    </div>
    <a href="{{route('detail_news', $news->id)}}" class="news__more">Подробнее</a>
</div>
