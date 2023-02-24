@foreach ($works as $work)
    <div class="swiper-slide section-works__item works-item">
        <div class="works-item__image-container">
            <img src="img/work-{{$work->id}}.jpg" alt="Картинка сайта" class="works-item__img">
        </div>
        <div class="works-item__content">
            <h3 class="works-item__title">{{$work->title}}</h3>
            <span class="works-item__descr">
            {!!Formating::textLimit($work->descr, 40)!!}
            </span>
            <a href="{{route('work.page', $work->id)}}" class="works-item__btn">Перейти</a>
        </div>
    </div>
@endforeach
