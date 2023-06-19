<div class="news-on-main__item">
    <div class="news-on-main__info">
        <a href="#">
            <img
                src="{{$news->image ? $news->image : 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg'}}"
                alt="">
        </a>
        <p class="news-on-main__title">{{$news->title}}</p>
        <p class="news-on-main__detail">{{$news->description}}</p>
    </div>
    <a href="#" class="news-on-main__more">Подробнее</a>
</div>
