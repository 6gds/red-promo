<section class = "values section_offset about-values">
    <div class="container">
      <h2 class="main__subtitle main__subtitle_center">Наши главные ценности</h2>
      <p class="main__text main__text_center">По праву считаемся лучшим digital-агентством в России</p>
      <ul class="list-reset values__list">
        @foreach ($values as $value)
        <li class="values__item {{$value->style}}">
            <div class="values__body">
              <div class="values__card values__card_front">
                <h3 class="values__subtitle">{{$value->title}}</h3>
              </div>
              <div class="values__card values__card_back">
                <p class="values__descr main__subtext">{{$value->text}}</p>
              </div>
            </div>
        </li>
        @endforeach
      </ul>
    </div>
</section>
