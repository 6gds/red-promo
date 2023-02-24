<section class="team section_offset">
    <div class="container">
      <h2 class = "main__subtitle main__subtitle_center">Наши специалисты</h2>
      <p class = "main__text main__text_center">Сердце нашей компании</p>
      <ul class="team__list list-reset">
      @foreach ($teams as $team)
        <li class="team__item">
            <div class="team__top">
            <img src="img/about/p-{{$team->id}}.png" alt="" class="team__img">
            <div class="team__socials">
                <a href="#" target="_blank" class="team__link" aria-label="Twitter">
                <svg>
                    <use xlink:href="img/sprite.svg#Twitter"></use>
                </svg>
                </a>
                <a href="{{$team->href}}" target="_blank" class="team__link" aria-label="Facebook">
                <svg>
                    <use xlink:href="img/sprite.svg#Facebook"></use>
                </svg>
                </a>
            </div>
            </div>

            <div class="team__quote">
            <div class="team__name main__cardtitle main__cardtitle_center">{{$team->name}}</div>
            <div class="team__post main__subtext main__subtext_center">{{$team->post}}</div>
            </div>
        </li>
      @endforeach
      </ul>
    </div>
</section>
