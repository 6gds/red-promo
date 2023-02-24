<section class="work-hero">
    <div class="container">
      <h1 class="work-hero__title main__title">{{$work->title}}</h1>

      <div class="work-images">
        <div class="work-images-slider">
          <button class="btn-reset slider-nav__btn slider-nav__btn_prev work__prev slider-btn">
            <img src="{{asset('img/svg/button/left.svg')}}" alt="">
          </button>
          <button class="btn-reset slider-nav__btn slider-nav__btn_next work__next slider-btn">
            <img src="{{asset('img/svg/button/right.svg')}}" alt="">
          </button>
          <div class="swiper-wrapper">
            @foreach ($work->images as $image)
            <div class="swiper-slide">
                <img src="{{asset('img/works/'.$image->name.'.jpg')}}" alt="{{$image->alt}}">
            </div>
            @endforeach
          </div>
        </div>
        <div class="work-images-nav" thumbsSlider="">
          <div class="swiper-wrapper">
            @foreach ($work->images as $image)
            <div class="swiper-slide">
                <img src="{{asset('img/works/'.$image->name.'.jpg')}}" alt="{{$image->alt}}">
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
</section>
