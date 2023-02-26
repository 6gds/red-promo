<div class="comments">
    <div class="new-container">
        <ul class="comments__list list-reset">
            @foreach ($work->reviews as $review)
                <li class="comments__item">
                    <div class="comments__left">
                        <span class="comments__author">{{$review->author->email}}</span>
                        <time class="comments__time" datetime="{{$review->created_at}}">{{$review->created_at}}</time>
                    </div>
                    <div class="comments__right">
                        <div class="comments__body">
                            <p class="comments__text main__subtext">
                                {!!$review->text!!}
                            </p>

                            <ul>
                                @if (!empty($review->images))
                                    @foreach($review->images as $image)
                                        <li>
                                            <img src="{{asset($image->url)}}" class="reviews-item__img">
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
