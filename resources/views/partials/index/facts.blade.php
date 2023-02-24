<section class="facts">
    <div class="container">
      <h2 class="facts__title main__subtitle main__subtitle_center">
        Факты о нас
      </h2>
      <ul class="facts__list list-reset">
        @foreach ($facts as $fact)
        <li class="facts__item facts-item">
            <div class="facts-item__container">
              <div class="facts-item__circle facts-item__circle_{{$fact->id}}-color"
              @if (isset($fact->circle_full))
                data-percentage="true" data-full="{{$fact->circle_full}}" data-value="{{$fact->circle_value}}"
              @else
                data-percent="{{$fact->circle_value}}"
              @endif>
                <svg class="circle-anim" viewBox="-10 -10 320 320">
                  <circle class="progress-bg" r="150" cx="150" cy="150" fill="none" stroke="{{$fact->color}}" stroke-width="15">
                  </circle>
                  <circle class="progress" r="150" cx="150" cy="150" fill="none" stroke="{{$fact->color}}" stroke-width="15">
                  </circle>
                </svg>
                <div class="facts-item__value">{{$fact->circle_value}}
                    @if (!isset($fact->circle_full))% @endif
                </div>
              </div>
              <span class="facts-item__info main__minitext main__minitext_center">
                {{$fact->text}}
              </span>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </section>
