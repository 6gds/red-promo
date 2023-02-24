$(document).ready(function () {
    $('.work-info__btn').click(function(e) {
        e.preventDefault();
        $('.popup-bg').fadeIn(800);
    });

    $('.popup__btn').click(function() {
        $('.popup-bg').fadeOut(800);
    });

    $('.price-list__btn').each(function(e){
        $(this).click(function(e) {
            e.preventDefault();
            $('.popup-bg').fadeIn(800);
            var formParent = $(this).parent().get(0);
            var formPopup = $('.service-form');
            // console.log($(formParent).attr('action'));

            formPopup.attr('action', $(formParent).attr('action'));

            console.log(formPopup.attr('action'));
        });
    })

    $('.popup__btn').click(function() {
        $('.popup-bg').fadeOut(800);
    });
});

$(document).ready(function(){
    $('.contacts-form__checkbox').change(function(e){
        if ($(this).attr('checked') === 'checked'){
            $(this).attr('checked', false);
            $('.contacts-form__btn').addClass('btn_disabled');
        }else{
            $(this).attr('checked', true);
            $('.contacts-form__btn').removeClass('btn_disabled');
        }

    })

    $('.custom-checkbox__input').change(function(e){
        if ($(this).attr('checked') === 'checked'){
            $(this).attr('checked', false);
            $('.form-contacts__btn').addClass('btn_disabled');
        }else{
            $(this).attr('checked', true);
            $('.form-contacts__btn').removeClass('btn_disabled');
        }

    })
})
