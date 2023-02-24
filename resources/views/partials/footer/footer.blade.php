<footer class="footer">
    <a href="#page" data-scroll class="to-top">
        <span class="to-top__icon">
          <svg>
            <use xlink:href="{{asset('img/sprite.svg#to-top')}}"></use>
          </svg>
        </span>
      </a>
    <div class="container">
      <div class="footer__top">
        <div class="footer__left">
          <div class="footer__left-links">
            <a href="#" class="logo footer__logo">
              <img src="{{asset('img/svg/logo3.svg')}}" alt="ImagiNation logo">
            </a>
            <ul class="social footer__social list-reset">
              <li class="social__item">
                <a href="#" target="_blank" class="social__link" aria-label="WhatsApp">
                  <svg>
                    <use xlink:href="{{asset('img/sprite.svg#Whatsapp')}}"></use>
                  </svg>
                </a>
              </li>
              <li class="social__item">
                <a href="#" target="_blank" class="social__link" aria-label="Messenger">
                  <svg>
                    <use xlink:href="{{asset('img/sprite.svg#Messanger')}}"></use>
                  </svg>
                </a>
              </li>
              <li class="social__item">
                <a href="#" target="_blank" class="social__link" aria-label="Facebook">
                  <svg>
                    <use xlink:href="{{asset('img/sprite.svg#Facebook')}}"></use>
                  </svg>
                </a>
              </li>
              <li class="social__item">
                <a href="#" target="_blank" class="social__link" aria-label="Twitter">
                  <svg>
                    <use xlink:href="{{asset('img/sprite.svg#Twitter')}}"></use>
                  </svg>
                </a>
              </li>
              <li class="social__item">
                <a href="#" target="_blank" class="social__link" aria-label="Youtube">
                  <svg>
                    <use xlink:href="{{asset('img/sprite.svg#YouTube')}}"></use>
                  </svg>
                </a>
              </li>
            </ul>
          </div>
          <p class="footer__descr">Наша компания...</p>
        </div>
        <div class="footer__right">
          <form action="/subscribe" class="footer-form footer__form" method="POST">
            @csrf
            <h3 class="footer-form__title">Оставайтесь с нами</h3>
            <div class="footer-form__items">
              <label class="footer-form__field form-field form-field_gray">
                <input type="email" name="email" placeholder="Ваш email" class="form-field__input">
              </label>
              <button class="footer-form__btn btn btn_fill">подписаться</button>
            </div>
            <p class="footer-form__descr">
              *Подпишитесь чтобы получать на почту последние новости и специальные предложения от ImagiNation
            </p>
          </form>
        </div>
      </div>
      <div class="footer__info">
        <address class="footer-address footer__address">
          <h3 class="footer-address__title">Главный офис</h3>
          <span class="footer-address__item">
            <span class="footer-address__name">Адрес:</span>
            Верхняя Дуброва, 27а, Владимир, Россия
          </span>
          <span class="footer-address__item">
            <span class="footer-address__name">Позвонить</span>
            <a href="tel:4055550128">{{Formating::tel('88005553536')}}</a>
          </span>
          <span class="footer-address__item">
            <span class="footer-address__name">Email:</span>
            <a href="mailto:imagination@gmail.com">imagination@gmail.com</a>
          </span>
        </address>

        <nav class="footer__nav footer-nav">
          <div class="footer-nav__about">
            <h4 class="footer-nav__title">О компании</h4>
            <ul class="footer-nav__list list-reset">
              <li class="footer-nav__item">
                <a href="" class="footer-nav__link main__subtext">О нас</a>
              </li>
              <li class="footer-nav__item">
                <a href="" class="footer-nav__link main__subtext">Контакты</a>
              </li>
            </ul>
          </div>

          <div class="footer-nav__works">
            <h4 class="footer-nav__title">Наши работы</h4>
            <ul class="footer-nav__list list-reset">
              <li class="footer-nav__item">
                <a href="{{route('payment.index')}}" class="footer-nav__link main__subtext">Услуги</a>
              </li>
              <li class="footer-nav__item">
                <a href="" class="footer-nav__link main__subtext">Работы</a>
              </li>
              <li class="footer-nav__item">
                <a href="" class="footer-nav__link main__subtext">Новости</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <p class="footer__copyright">
        &copy;&nbsp;Все права защищены. Создано компанией ImagiNation.
      </p>
    </div>
  </footer>
  <div class="overlay"></div>
