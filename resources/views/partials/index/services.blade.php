<section class="section-services section_offset">
    <div class="container">
      <h2 class="main__subtitle main__subtitle_center">Наши услуги</h2>
      <p class="main__text main__text_center">ImagiNation предоставляет любые услуги в сфере digital</p>
      <ul class="section-services__list list-reset">
        @foreach ($services as $service)
        <li class="section-services__item">
            <a href="{{route('service.page', $service->id)}}" class="section-services__link">
              <div class="services-item__content services-item__content_{{$service->name}}">
                <svg class="services-item__svg" aria-hidden="true">
                  <use xlink:href="img/sprite.svg#services-{{$service->id}}"></use>
                </svg>
                <h3 class="services-item__title main__cardtitle">{{$service->title}}</h3>
              </div>
            </a>
        </li>
        @endforeach
      </ul>
      <div class="section-services__learn learn-more">
        <h4 class="section-services__subtitle main__headline">Узнать больше о наших услугах</h4>
        <a href="{{route('service.all')}}" class="btn-reset btn btn_fill">Все услуги</a>
      </div>
    </div>
  </section>
