<section class="price-list">
    <div class="container">
      <h2 class="main__subtitle main__subtitle_center">Цены</h2>
      <p class="price-list__subtitle main__text main__text_center">Мы предлагаем разные виды программ</p>

      <div class="table-wrapper">
        <table class="price-list__table table">
          <thead class="table__header">
            <tr class="table__row">
              <td class="table__th">Кейсы</td>
              @foreach ($service->tariffs as $tariff)
              <td class="table__th">
                <div class="table__headline">{{$tariff->title}}</div>
                <div class="table__price">{{Formating::price($tariff->price)}} рублей</div>
              </td>
              @endforeach
             </tr>
          </thead>

          <tbody class="table__body">
            @foreach ($service->actions() as $action)
            <tr class="table__row">
                <td class="table__col">{{$action->name}}</td>
                @foreach ($service->tariffs as $tariff)
                <td class="table__col">
                    <span class="table__check">{{$tariff->actionInfo($action->id)}}</span>
                </td>
                @endforeach
            </tr>
            @endforeach

            <tr class="table__row">
              <td class="table__col"></td>
              @foreach ($service->tariffs as $tariff)
              <td class="table__col">
                <form action="{{route('requests.service', $tariff->id)}}" method="post">
                    @csrf
                    <button class="btn btn-reset btn_stroke-primary price-list__btn" type="submit">Отправить заявку</button>
                </form>
              </td>
              @endforeach
            </tr>
          </tbody>
        </table>

        <div class="popup-bg">
            <div class="service-popup popup">
              <div class="popup__btn"></div>
              <form action="{{route('requests.service', $service->id)}}" class="service-popup__form service-form popup-form">
                <label class="form-field form-field_gray popup-form__field">
                    <span class="form-field__caption">Имя</span>
                    <input type="text" name="name" placeholder="Ваше имя" class="form-field__input">
                  </label>

                <label class="form-field form-field_gray popup-form__field">
                    <span class="form-field__caption">Телефон</span>
                    <input type="tel" name="tel" placeholder="Ваш номер телефона" class="form-field__input">
                </label>

                <label class="form-field form-field_gray popup-form__field">
                    <span class="form-field__caption">Email</span>
                    <input type="email" name="email" placeholder="Ваш email" class="form-field__input">
                </label>

                <button class="btn btn_fill service-form__submit popup-form__submit">Оставить заявку</button>
              </form>
            </div>
        </div>
      </div>
    </div>
</section>

