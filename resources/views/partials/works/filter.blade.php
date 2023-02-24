<section class="works-filter">
    <div class="container">
      <form action="{{route('requests.workFilter')}}" method="post" class="works-filter__form">
        <ul class="works-filter__list list-reset">
          <li class="works-filter__item works-filter__item_played">
            <button class="works-filter__button works-filter__button_pressed" id="works-btn_first">
              <input type="checkbox" id="all" name="work_category" value="all" checked>
              <label for="scales">Все работы</label>
            </button>
          </li>
          @foreach ($categories as $category)
          <li class="works-filter__item">
            <button class="works-filter__button">
              <input type="checkbox" id="{{$category->name}}" name="work_category" value="{{$category->name}}">
              <label for="scales">{{$category->title}}</label>
            </button>
          </li>
          @endforeach
        </ul>
      </form>
    </div>
</section>
