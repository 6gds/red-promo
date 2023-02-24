<section class="reviews">
    <div class="container reviews__container">
      <div class="reviews__content">
        <h2 class="main__subtitle">Отзывы наших клиентов</h2>

        <div class="swiper reviews__slider">
          <div class="swiper-wrapper">
            @foreach ($reviews as $review)
            <div class="swiper-slide reviews__item reviews-item">
                <div class="reviews-item__image-container">
                  <img src="img/reviews/p-{{$review->id}}.png" alt="Аватар пользователя" class="reviews-item__img">
                </div>
                <p class="reviews-item__descr main__subtext">
                    {!!$review->text!!}
                </p>
                <span class="reviews-item__author">{{$review->author}}</span>
                <span class="reviews-item__post">{{$review->post}}</span>
            </div>
            @endforeach
          </div>
        </div>

        <div class="slider-nav reviews__nav">
          <button class="btn-reset slider-nav__btn slider-nav__btn_prev reviews__prev slider-btn">
            <img src="img/svg/button/left.svg" alt="">
          </button>
          <button class="btn-reset slider-nav__btn slider-nav__btn_next reviews__next slider-btn">
            <img src="img/svg/button/right.svg" alt="">
          </button>
        </div>
      </div>
      <img src="img/design1.jpg" alt="" class="reviews__main-img">
    </div>
  </section>
