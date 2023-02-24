<section class="services">
    <div class="container">
      <ul class="services__list list-reset">
        <?php $isEven = false?>
        @foreach ($services as $service)
            @if ($isEven == false)
                <li class="services__item">
                    <div class="services__img-container">
                        <img src="img/services/service-{{$service->pos}}.jpg" alt="" class="services__img">
                    </div>
                    <div class="services__info">
                        <h2 class="services__title">{{$service->title}}</h2>
                        <p class="services__descr main__subtext">
                            {{$service->text}}
                        </p>
                        <a href="{{route('service.page', $service->id)}}" class="services__link btn btn_fill">Узнать больше</a>
                    </div>
                    <?$isEven = true?>
                </li>
            @else
                <li class="services__item">
                    <div class="services__info">
                        <h2 class="services__title">{{$service->title}}</h2>
                        <p class="services__descr main__subtext">
                            {!!$service->text!!}
                        </p>
                        <a href="{{route('service.page', $service->id)}}" class="services__link btn btn_fill">Узнать больше</a>
                    </div>
                    <div class="services__img-container">
                        <img src="img/services/service-{{$service->pos}}.jpg" alt="" class="services__img">
                    </div>
                    <?$isEven = false?>
                </li>
            @endif
        @endforeach
      </ul>
    </div>
</section>
