<section class = "values section_offset">
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
      <form action="" method = "post" class="know-form">
        @csrf
        <h3 class = "main__headline main__headline_center">Есть вопросы? Задайте их нам:</h3>
        <div class="know-form__content">
          <label for="" class="know-form__field form-field">
            <span class="know-form__caption">Имя</span>
            <input class="know-form__input" type="text" placeholder="Имя">
          </label>
          <label for="" class="know-form__field form-field">
            <span class="know-form__caption">Телефон</span>
            <input class="know-form__input" type="text" placeholder="Телефон">
          </label>
          <label for="" class="know-form__field form-field form-field_big">
            <span class="know-form__caption">Сообщение</span>
            <input class="know-form__input know-form__input_big" type="text" placeholder="Сообщение">
          </label>
          <button class="btn-reset know-form__btn btn btn_fill" type="submit">Отправить</button>
        </div>
      </form>
    </div>
  </section>
