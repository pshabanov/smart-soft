<div class="case__item">
    <div class="case__item-info">
        <h2 class="case__item-title">{{$projects->title}}</h2>
        <div class="case__item-subtitle">О заказчике:</div>
        <div class="case__item-text">
            {!! $projects->about_company !!}
        </div>
        <a href="{{route('detail_project', $projects->id)}}" class="btn">Подробнее</a>
    </div>
    <div class="case__item-img">
        <img
            src="{{$projects->image ? $projects->image : 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg'}}"
            alt="">
    </div>
</div>
