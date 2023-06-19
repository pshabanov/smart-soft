<div class="services__item">
    <div class="services__item-img">
        <img
            src="{{$services->image ? $services->image : 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg'}}"
            alt="">
    </div>
    <div class="services__item-info">
        <div>
            <h3 class="services__item-title">{{$services->title}}</h3>
            <div class="services__item-text">
                {!! $services->short_description !!}
            </div>
        </div>
        <div class="services__item-link">
            <a href="{{route('detail_services', $services->id)}}" class="btn">Подробнее</a>
        </div>
    </div>
</div>
