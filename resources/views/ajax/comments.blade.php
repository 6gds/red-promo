<div class="new-container">
    <h2 class="main__subtitle comments__title">{{$new->commentsCount()}}</h2>
    <ul class="comments__list list-reset">
      @foreach ($new->comments as $comment)
      <li class="comments__item">
          <div class="comments__left">
            <span class="comments__author">{{$comment->author}}</span>
            <time class="comments__time" datetime="{{$comment->created_at}}">{{$comment->created_at}}</time>
          </div>
          <div class="comments__right">
            <div class="comments__body">
              <p class="comments__text main__subtext">
                  {!!$comment->text!!}
              </p>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
</div>
