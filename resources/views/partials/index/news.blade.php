<section class = "section-news">
    <div class="container">
      <h2 class = "section-news__title main__subtitle main__subtitle_center">Новости</h2>
      <ul class="section-news__list news-list list-reset">
        <?php $isFirst = true?>
        @foreach ($news as $new)
        <li class="section-news__item">
            <img src="img/news/news-{{$new->id}}.jpg" alt="" class="section-news__img">
            <div class="news-list__content">
              <a href="{{route('new.page', $new->id)}}" class="section-news__headline main__cardtitle">{{$new->title}}</a>
              <div class="section-news__meta">
                <span class = "section-news__tag main__minitext">{{$new->tag->title}}</span>
                <span class = "section-news__date main__minitext">{{Formating::date($new->created_at)}}</span>
                <span class = "section-news__comments main__minitext">{{$new->commentsCount()}}</span>
              </div>
              @if ($isFirst)
                <p class="section-news__descr main__subtext">{!!Formating::textLimit($new->text, 150)!!}</p>
                <?$isFirst = false?>
              @endif
            </div>
        </li>
        @endforeach
      </ul>
      <div class="section-news__learn learn-more">
        <h4 class="section-news__subtitle main__headline learn-more__headline">Больше готовых работ</h4>
        <a href="{{route('new.all')}}" class="btn-reset btn btn_fill">Готовые работы</a>
      </div>
    </div>
  </section>
