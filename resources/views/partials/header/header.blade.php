<header class="header header--secondary">
    <div class="container header__container">
      <a href="{{route('index')}}" class="logo">
        <img src="{{asset('img/svg/logo2.svg')}}" alt="">
      </a>
      <nav class="header__menu menu">
        <ul class="menu__list list-reset">
          <li class="menu__item"><a href="{{route('about.page')}}" class="menu__link">О нас</a></li>
          <li class="menu__item"><a href="{{route('service.all')}}" class="menu__link">Услуги</a></li>
          <li class="menu__item"><a href="{{route('work.all')}}" class="menu__link">Продукты</a></li>
          <li class="menu__item"><a href="{{route('contacts.page')}}" class="menu__link">Контакты</a></li>
          <li class="menu__item"><a href="{{route('new.all')}}" class="menu__link">Новости</a></li>
        </ul>
        <div class="header-contacts header-contacts--nav">
          <a href="tel:4055550128" class="header-contacts__link header-contacts__link_tel contacts-link">
            <span class = "contacts-link__action main__link">Позвонить</span>
            <span class = "contacts-link__value">{{Formating::tel('88005553536')}}</span>
          </a>
          <a href="mailto:hello@createx.com" class="header-contacts__link header-contacts__link_mail contacts-link">
            <span class = "contacts-link__action main__link">Написать</span>
            <span class = "contacts-link__value">imagination@gmail.com</span>
          </a>
        </div>
      </nav>
      <div class="header-contacts">
        <a href="tel:4055550128" class="header-contacts__link header-contacts__link_tel contacts-link">
          <span class = "contacts-link__action main__link">Позвонить</span>
          <span class = "contacts-link__value">(800) 555-3536</span>
        </a>
        <a href="mailto:hello@createx.com" class="header-contacts__link header-contacts__link_mail contacts-link">
          <span class = "contacts-link__action main__link">Написать</span>
          <span class = "contacts-link__value">imagination@gmail.com</span>
        </a>
      </div>
      <button class="btn-reset burger" aria-label="Открыть меню">
        <span class="burger__line"></span>
      </button>
    </div>
  </header>
