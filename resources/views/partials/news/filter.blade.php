<section class="news-filter section_offset">
    <div class="container">
      <h2 class="news-filter__title main__subtitle main__subtitle_center">Категории</h2>
      <form action="{{route('requests.newFilter')}}" method="POST" class="news-filter__form">

        <ul class="news-filter__list list-reset">
          <li class="news-filter__item">
            <button class="news-filter__button news-filter__button_pressed btn-reset" id="news-btn_first">
              <input type="checkbox" id="allNews" class="new_tag" name="new_tag" value="all" checked>
              Все новости
            </button>
          </li>
          @foreach ($tags as $tag)
          <li class="news-filter__item">
            <button class="news-filter__button btn-reset">
              <input type="checkbox" id="{{$tag->name}}" class="new_tag" name="new_tag" value="{{$tag->name}}">
              {{$tag->title}}
            </button>
          </li>
          @endforeach
        </ul>
      </form>
      {{-- {{$news->links()}} --}}
    </div>
</section>
