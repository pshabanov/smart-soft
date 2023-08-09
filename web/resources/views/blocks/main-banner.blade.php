<section class="section swiper banner-slider">
    <ul class="swiper-wrapper banner__list">
        @foreach($banners as $banner)
            <li class="banner__item swiper-slide">
            <div class="banner__item-gradient"
                 style="background: linear-gradient(90deg, rgba({{$banner->gradient_start}}, 1) 0%, rgba({{$banner->gradient_end}}, 1) 100%);"
            >
                <div class="banner__wrapper">
                    <div class="banner__item-wrapper">
                        <div class="banner__item-info">
                            <h2>{{$banner->title}}</h2>
                            <p>{!! $banner->description !!}</p>
                            <a href="{{$banner->link}}" class="btn">Подробнее</a>
                            <div class="banner__item-info__bg" style="background: linear-gradient(0deg, rgba({{$banner->gradient_under_info}}, 0) 0%, rgba({{$banner->gradient_under_info}},0.4) 100%);"></div>
                        </div>
                        <div class="banner__item-img">
                            <img src="{{$banner->image}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</section>

