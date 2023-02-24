<section class="offer">
    <div class="container offer__container">
      <div class="offer__img-container">
        <img src="{{asset('img/services/service-1.jpg')}}" alt="" class="offer__img">
      </div>
      <div class="offer__content">
        <h3 class="offer__title">Мы предлагаем</h3>
        <div class="accordion">
          @foreach ($service->suggests as $suggest)
          <div class="accordion__item accordion__item_show @if ($suggest->pos == 1)
            is-open
          @endif">
            <button class="accordion__btn btn-reset">
              <span class="accordion__title">{{$suggest->title}}</span>
              <span class="accordion__icon"></span>
            </button>
            <div class="accordion__body">
              <p>{{$suggest->text}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
</section>
