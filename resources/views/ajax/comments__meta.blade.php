<a href="#" class="article-meta__item">{{$new->tag->title}}</a>
<time class="article-meta__item" datetime="2020-06-24 19:00">{{Formating::date($new->created_at)}}</time>
<span class="article-meta__item article-meta__item--comments">{{$new->commentsCount()}}</span>
