<section class = "news-main">
    <div class="container">
      <h2 class = "news-main__title main__subtitle main__subtitle_center">Новости</h2>
      <ul class="news-main__list news-list list-reset">
        @foreach ($news as $new)
        <li class="news-list__item">
            <img src="img/news/news-{{$new->pos}}.jpg" alt="" class="news-main__img">
            <div class="news-list__content">
              <a href="{{route('new.page', $new->id)}}" class="news-list__headline main__cardtitle">{{$new->title}}</a>
              <div class="news-list__meta">
                <span class="news-list__tag main__minitext">{{$new->tag->title}}</span>
                <span class="news-list__date main__minitext">{{$new->created_at}}</span>
                <span class="news-list__comments main__minitext">{{$new->commentsCount()}}</span>
              </div>
              <p class="news-list__descr main__subtext">{!!Formating::textLimit($new->text, 150)!!}</p>
            </div>
        </li>
        @endforeach
      </ul>
    </div>
</section>
