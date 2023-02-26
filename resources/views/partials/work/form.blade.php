<section class="new-form">
    <div class="new-container">
        <form enctype="multipart/form-data" id="review-form__form" action="{{route('requests.work.review', $work->id)}}" method="POST">
            @csrf
            <h2 class="review-form__title">Оставьте отзыв</h2>
            <label class="form-field form-field_gray review-form__field">
                <span class="form-field__caption">Текст отзыва</span>
                <input type="text" name="message" required placeholder="Ваш отзыв" class="form-field__input">
            </label>
            <label class="form-field form-field_gray review-form__field">
                <span class="form-field__caption">Картинки*</span>
                <input type="file" name="images[]" id="file-field" multiple="true" />
            </label>
            <div id="img-container">
                <ul id="img-list"></ul>
            </div>
            <div class="centered">
                <button type="submit" class="btn-reset btn btn_fill review-form__btn">опубликовать</button>
            </div>
        </form>
        <canvas id="myCanvas" style="display:none;"/>
    </div>
</section>
