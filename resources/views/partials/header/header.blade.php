<header class="header header--secondary">
    <div class="container header__container">
        <a href="{{route('index')}}" class="logo">
            <img src="{{asset('img/svg/logo2.svg')}}" alt="">
        </a>
        <div class = "d2 search">
            <form action="" method="get">
                <input class="search-input" name="query" placeholder="Искать здесь..." type="search">
                <button type="submit">Поиск</button>
            </form>
            <ul class = "hidden search__result list-reset">
            </ul>
        </div>
        <nav class="header__menu menu">
            <ul class="menu__list list-reset">
                <li class="menu__item"><a href="{{route('categories.popular')}}" class="menu__link">Популярные категории</a></li>
                <li class="menu__item"><a href="{{route('service.all')}}" class="menu__link">Услуги</a></li>
                <li class="menu__item"><a href="{{route('work.all')}}" class="menu__link">Продукты</a></li>
                <li class="menu__item"><a href="{{route('contacts.page')}}" class="menu__link">Контакты</a></li>
                <li class="menu__item"><a href="{{route('new.all')}}" class="menu__link">Новости</a></li>
            </ul>
            <div class="header-contacts header-contacts--nav">
                <a href="tel:4055550128" class="header-contacts__link header-contacts__link_tel contacts-link">
                    <span class="contacts-link__action main__link">Позвонить</span>
                    <span class="contacts-link__value">{{Formating::tel('88005553536')}}</span>
                </a>
                <a href="mailto:hello@createx.com"
                   class="header-contacts__link header-contacts__link_mail contacts-link">
                    <span class="contacts-link__action main__link">Написать</span>
                    <span class="contacts-link__value">imagination@gmail.com</span>
                </a>
            </div>
        </nav>

        <div class="header-contacts">
            @if (empty(auth()->user()))
                <a href="{{route('login')}}" class="contacts-link">
                    Авторизация
                </a>
                <a href="{{route('register')}}" class="contacts-link">
                    Регистрация
                </a>
            @else
                <form method="post" action="{{route('logout')}}">
                    @csrf
                    <button type="submit" href="{{route('logout')}}" class="btn btn_stroke-primary">
                        Выйти из аккаунта
                    </button>
                </form>
            @endif
        </div>
        <button class="btn-reset burger" aria-label="Открыть меню">
            <span class="burger__line"></span>
        </button>
    </div>
</header>
