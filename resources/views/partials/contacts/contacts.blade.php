<section class="contacts-offices">
    <div class="container">
      <h2 class="main__subtitle main__subtitle_center">Наши адреса</h2>
      <p class="main__text main__text_center">Если вы хотите обсудить с нами вопросы лично, вперёд</p>

      <div class="contacts-offices__content">
        <address class="contacts-address contacts-offices__address">
          <h3 class="contacts-address__title main__headline">{{$contact->city}}, {{$contact->country}}</h3>
          <span class="contacts-address__item">
            <span class="contacts-address__name">Адрес:</span>
            {{$contact->street}}
          </span>
          <span class="contacts-address__item">
            <span class="contacts-address__name">Позвонить:</span>
            <a href="tel:4055550128" class="main__link">{{Formating::tel($contact->tel)}}</a>
          </span>
          <span class="contacts-address__item">
            <span class="contacts-address__name">Email:</span>
            <a href="mailto:imagination@gmail.com" class="main__link">{{$contact->email}}</a>
          </span>
          <span class="contacts-address__item">
            <span class="contacts-address__name" class="main__link">Расписание:</span>
            <span>{{$contact->schedule}}</span>
          </span>
        </address>
        <div class="contacts-offices__map" id = "map">

        </div>
      </div>
    </div>

    <script src="https://api-maps.yandex.ru/2.1/?apikey=3c8556c5-ae7d-482e-a6fc-028d3747cf77&lang=ru_RU"></script>
  </section>
