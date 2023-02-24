<section class="process">
    <div class="container">
      <h2 class="main__subtitle">Процесс разработки</h2>
      <ul class="process__list list-reset">
        @foreach ($service->steps as $step)
            <li class="process__item">
                <h3 class="process__subtitle">{{$step->title}}</h3>
                <p class="process__descr">{{$step->text}}</p>
            </li>
        @endforeach
      </ul>
    </div>
</section>
