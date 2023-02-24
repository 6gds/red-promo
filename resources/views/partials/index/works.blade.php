<section class="section-works section_offset">
    <div class="container">
      <div class="section-works__top">
        <h3 class="section-works__title main__subtitle">ImagiNation также предлагает готовые работы
        </h3>
        <div class="slider-nav">
          <button class="btn-reset slider-nav__btn slider-nav__btn_prev section-works__prev slider-btn">
            <img src="img/svg/button/left.svg" alt="">
          </button>
          <button class="btn-reset slider-nav__btn slider-nav__btn_next section-works__next slider-btn">
            <img src="img/svg/button/right.svg" alt="">
          </button>
        </div>
      </div>
    <!-- Slider main container -->
      <div class="swiper section-works__slider">
        <div class="swiper-wrapper">
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
        </div>
      </div>
      <div class="section-works__learn learn-more">
        <h4 class="section-works__subtitle main__headline">Больше готовых работ</h4>
        <a href="" class="btn-reset btn btn_fill">Готовые работы</a>
      </div>
    </div>
</section>
