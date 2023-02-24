<section class = "about-achievment section_offset">
    <div class="container">
      <h2 class="main__subtitle main__subtitle_center">
        Наши достижения
      </h2>
      <ul class="about-achievment__list about-list list-reset">
        @foreach ($achievements as $achievement)
        <li class="about-list__item {{$achievement->style}}">
            <h3 class="main__cardtitle">{{$achievement->title}}</h3>
            <p>{{$achievement->text}}</p>
        </li>
        @endforeach
      </ul>
    </div>
</section>
