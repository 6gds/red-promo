<section class="new-hero">
    <div class="container">
      <div class="new-hero__content">
        <h1 class="new-hero__title main__title">{{$new->title}}</h1>
      </div>

      <div class="new-hero__bottom">
        <div class="new-hero__meta article-meta">
          <a href="#" class="article-meta__item">{{$new->tag->title}}</a>
          <time class="article-meta__item" datetime="2020-06-24 19:00">{{Formating::date($new->created_at)}}</time>
          <span class="article-meta__item article-meta__item--comments">{{$new->commentsCount()}}</span>
        </div>
        <ul class="social new-hero__social list-reset">
          <li class="social__item">
            <svg>
                <use xlink:href="{{asset('img/sprite.svg#Facebook')}}"></use>
            </svg>
          </li>
          <li class="social__item">
            <a href="#" target="_blank" class="social__link" aria-label="Twitter">
              <svg>
                <use xlink:href="{{asset('img/sprite.svg#Twitter')}}"></use>
              </svg>
            </a>
          </li>
        </ul>
      </div>

    </div>
</section>
