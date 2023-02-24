<section class="contacts-request">
    <div class="container">
      <h2 class="contacts-request__title main__subtitle main__subtitle_center">Свяжитесь с нами</h2>
      <p class="contacts-request__descr main__text main__text_center">У вас возникли вопросы по нашим услугам, задайте их нам</p>

      <div class="contacts-request__content">
        <img src="{{asset('img/contacts/ct.jpg')}}" alt="" class="contacts-request__img">
        <form action="" class="contacts-request__form form-contacts">
          @csrf
          <label class="form-field form-field_gray form-contacts__field">
            <span class="form-field__caption">Имя</span>
            <input type="text" name="name" placeholder="Ваше имя" class="form-field__input">
          </label>

          <label class="form-field form-field_gray form-contacts__field">
            <span class="form-field__caption">Выбрать услугу</span>
            <select name="service" id="service" class="form-field__select">
                @foreach ($services as $service)
                    <option value="{{$service->id}}">{{$service->title}}</option>
                @endforeach
            </select>
          </label>

          <label class="form-field form-field_gray form-contacts__field">
            <span class="form-field__caption">Телефон</span>
            <input type="tel" name="tel" placeholder="Ваш номер телефона" class="form-field__input">
          </label>

          <fieldset class="form-field form-contacts__fields">
            <legend class="form-field__caption">Как с вами связаться?</legend>
            <div class="form-field__flex">
              <label class="custom-radio form-contacts__radio">
                <input type="radio" name="contact_method" value="Phone" class="custom-radio__input">
                <span class="custom-radio__text">Телефон</span>
              </label>
              <label class="custom-radio form-contacts__radio">
                <input type="radio" name="contact_method" value="Email" class="custom-radio__input">
                <span class="custom-radio__text">Email</span>
              </label>
            </div>
          </fieldset>

          <label class="form-field form-field_gray form-contacts__field">
            <span class="form-field__caption">Email</span>
            <input type="email" name="email" placeholder="Ваш email" class="form-field__input">
          </label>
          <label class="form-field form-field_gray form-contacts__field form-contacts__textarea">
            <span class="form-field__caption">Сообщение</span>
            <textarea name="message" placeholder="Сообщение" class="form-field__input form-field_textarea"></textarea>
          </label>

          <label class="form-field form-field_gray form-contacts__field form-field__checkbox form-contacts__checkbox custom-checkbox">
            <input type="checkbox" name = "agree" class="custom-checkbox__input">
            <label class="form-field form-field_gray form-contacts__field" for="agree">
              Я согласен с обработкой данных</label>
          </label>
          <button class="form-contacts__btn btn btn_fill btn_disabled" type="submit">Отправить</button>
        </form>
      </div>
    </div>
  </section>
