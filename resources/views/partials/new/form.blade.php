<section class="new-form">
    <div class="new-container">
      <form class="new-form__form" action="{{route('requests.comment', $new->id)}}" method="POST">
        @csrf
        <h2 class="new-form__title">Оставьте комментарий</h2>
          <label class="form-field form-field_gray new-form__field">
            <span class="form-field__caption">Имя*</span>
            <input type="text" name="author" required placeholder="Ваше имя" class="form-field__input">
          </label>
          <label class="form-field form-field_gray new-form__field">
            <span class="form-field__caption">Email*</span>
            <input type="email" name="email" required placeholder="Ваш email" class="form-field__input">
          </label>
          <label class="form-field form-field_gray new-form__field form-field_textarea">
            <span class="form-field__caption">Ваш комментарий*</span>
            <textarea name="text" placeholder="Ваш комментарий" class="form-field__input form-field_textarea"></textarea>
          </label>
          <div class="centered">
            <button class="btn-reset btn btn_fill new-form__btn">опубликовать</button>
          </div>
      </form>
    </div>
</section>

