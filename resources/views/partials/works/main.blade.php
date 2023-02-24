<section class="works-main">
    <div class="container">
      <ul class="works-main__list list-reset">
        @foreach ($works as $work)
        <li class="works-main__item">
            <a href="{{route('work.page', $work->id)}}" class="section-works__item works-item">
              <div class="works-item__image-container">
                <img src="img/work-{{$work->id}}.jpg" alt="Картинка сайта" class="works-item__img">
              </div>
              <div class="works-item__content">
                <h3 class="works-item__title">{{$work->title}}</h3>
                <span class="works-item__descr">
                  {!!Formating::textLimit($work->descr, 40)!!}
                </span>
                <div class="works-item__btn">Перейти</div>
              </div>
            </a>
        </li>
        @endforeach
      </ul>
    </div>
</section>
