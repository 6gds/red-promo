<section class="new">
    <div class="container">
      <div class="new__img-container">
        <img src="{{asset('img/news/news-'.$new->pos.'.jpg')}}" alt="" class="new__img">
      </div>
      <div class="new-container">
        <h3 class="new__title">
            {{$new->title}}
        </h3>
        <p class="new__text">
            {!!$new->text!!}
        </p>
        <p class="new__subtext">
            {!!$new->subtext!!}
        </p>
      </div>
    </div>
</section>
