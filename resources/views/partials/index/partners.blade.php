<section class = "partners">
    <div class="container">
      <h2 class="partners__title main__subtitle main__subtitle_center">Мы работали с</h2>
      <ul class="partners__list list-reset">
        @foreach ($partners as $partner)
        <li class="partners__item">
            <a href="#" class="partners__link">
              <img src="img/partners/partners-{{$partner->id}}.png" alt="{{$partner->name}}" class="partners__logo">
            </a>
        </li>
        @endforeach
      </ul>
    </div>
  </section>
