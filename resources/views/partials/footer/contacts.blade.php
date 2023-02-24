<section class="contacts-section">
    <div class="container contacts-section__container">
      <form class="contacts-section__form contacts-form" id="contacts-form" action="{{route('requests.contact')}}" method="POST">
        @csrf
        <h3 class="contacts-form__title">Есть вопросы?</h3>
        <label class="form-field form-field_gray contacts-form__field">
          <span class="form-field__caption">Имя</span>
          <input type="text" name="name" placeholder="Ваше имя" class="form-field__input">
        </label>
        <label class="form-field form-field_gray contacts-form__field">
          <span class="form-field__caption">Телефон</span>
          <input type="tel" name="tel" placeholder="Ваш номер телефона" class="form-field__input">
        </label>
        <label class="form-field form-field_gray contacts-form__field">
          <span class="form-field__caption">Email</span>
          <input type="email" name="email" placeholder="Ваш email" class="form-field__input">
        </label>
        <label class="form-field form-field_gray contacts-form__field">
          <span class="form-field__caption">Сообщение</span>
          <textarea name="message" placeholder="Сообщение" class="form-field__input form-field_textarea"></textarea>
        </label>
        <label class="custom-checkbox contacts-form__checkbox">
          <input type="checkbox" class="custom-checkbox__input">
          <span class="custom-checkbox__text">Я согласен получать информацию от ImagiNation</span>
        </label>
        <button class="contacts-form__btn btn btn_fill btn_disabled" type="submit">Отправить</button>
        <div class="contact-errors"></div>
    </form>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
  </section>
