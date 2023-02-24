<section class="work-main">
    <div class="container grid">
      <div class="work-main__left">
        <h2 class="work-main__title main__subtitle">Описание сайта:</h2>
        <p class="main__text">{!!$work->descr!!}</p>

      </div>
      <div class="work-main__right">
        <div class="work-info">
          <ul class="work-info__list list-reset">
            @foreach ($work->items as $item)
            <li class="work-info__item">
                <div class="work-info__category">{{$item->name}}</div>
                <div class="work-info__value">{{$work->itemValue($item->id)}}</div>
            </li>
            @endforeach
            <li class="work-info__item">
                <div class="work-info__category">Стоимость</div>
                <div class="work-info__value">{{Formating::price($work->amount)}} рублей</div>
            </li>
            <div class="popup-bg">
                <div class="work-popup popup">
                  <div class="popup__btn"></div>
                  <form action="{{route('payment.create', $work->id)}}" class="work-popup__form work-form">
                    @csrf
                    <label class="form-field form-field_gray work-form__field">
                        <span class="form-field__caption">Имя</span>
                        <input type="text" name="name" placeholder="Ваше имя" class="form-field__input">
                      </label>
                    <label class="form-field form-field_gray work-form__field">
                        <span class="form-field__caption">Телефон</span>
                        <input type="tel" name="tel" placeholder="Ваш номер телефона" class="form-field__input">
                    </label>

                    <label class="form-field form-field_gray work-form__field">
                        <span class="form-field__caption">Email</span>
                        <input type="email" name="email" placeholder="Ваш email" class="form-field__input">
                    </label>

                    <button class="btn btn_fill work-form__submit">Оплатить</button>
                  </form>
                </div>
            </div>
            <button class="btn btn_fill work-info__btn">Купить</button>
          </ul>
        </div>
      </div>
    </div>
</section>
