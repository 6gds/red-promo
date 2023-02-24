<section class = "partners service-partners">
    <div class="container">
      <h2 class="partners__title main__subtitle main__subtitle_center">Наши партнёры</h2>
      <ul class="partners__list list-reset">
        @foreach ($partners as $partner)
        <li class="partners__item">
            <a href="#" class="partners__link">
              <img src="{{asset('img/partners/partners-'.$partner->pos.'.png')}}" alt="{{$partner->name}}" class="partners__logo">
            </a>
        </li>
        @endforeach
      </ul>
    </div>
</section>
