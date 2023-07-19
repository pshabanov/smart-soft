<div class="case__item">
    <div class="case__item-info">
        <h2 class="case__item-title">{{$solutions->title}}</h2>
        <div class="case__item-subtitle">О заказчике:</div>
        <div class="case__item-text">
            {!! $solutions->description !!}
        </div>
        <a href="{{route('detail_solutions', $solutions->id)}}" class="btn">Подробнее</a>
    </div>
    <div class="case__item-img">
        <img
            src="{{$solutions->image ? $solutions->image : 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg'}}"
            alt="">
    </div>
</div>
