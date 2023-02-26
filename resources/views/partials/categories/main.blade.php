<section class="works-filter">
    <div class="container">
        <ul class="list-reset categories-list">
            @foreach ($categories as $category)
                <li class="works-filter__item">
                    <a class="categories-button" href="{{route('category.page', $category->id)}}">{{$category->title}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
