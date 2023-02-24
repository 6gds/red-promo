$(document).ready(function(){
    //Форма контакты
    $('.contacts-form__btn').click(function (e) {
        e.preventDefault();

        var formInfo = $('#contacts-form');
        var data = formInfo.serialize();

        $.ajax({
            type: "post",
            url: '/reqcont',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            dataType: 'json',
            complete: function (data) {
                console.log(data);
                if (data.responseJSON.status === 'success'){
                    $('#contacts-form').html(data.responseJSON.items);
                }
            },
            error:function (param) {
                var errors = param.responseJSON.errors;
                $('.contact-errors').remove();
                for (var key in errors){
                    if (key=="tel"){
                        $('.contacts-form__field:eq(1)').append(`Телефон задан некорректно`);
                    }
                    // $('.contact-errors').append(`<p>${key}: ${errors[key]}.</p>`);
                }
            }
        });
    });

    //Форма на странице контакты
    $('.form-contacts__btn').click(function(e){
        e.preventDefault();

        var form = $('.contacts-request__form');
        var data = form.serialize();

        $.ajax({
            type: "post",
            url: form.attr('action'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            dataType: 'json',
            complete: function (data) {
                alert(1);
                console.log(data);
                if (data.responseJSON.status === 'success'){
                    $('#contacts-form').html(data.responseJSON.items);
                }
            },
            error:function (param) {
                alert(1);
                var errors = param.responseJSON.errors;
                $('.contact-errors').html('');
                for (var key in errors){
                    $('.contact-errors').append(`<p>${key}: ${errors[key]}.</p>`);
                }
            }
        });
    })

    //Заявка на готовую работу
    $('.work-form__submit').click(function(e){
        e.preventDefault();

        form = $('.work-popup__form');
        data = form.serialize();

        $.ajax({
            type: "post",
            url: form.attr('action'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            dataType: "json",
            complete: function (data) {
                if (data.responseJSON.status === "success"){
                    window.location = data.responseJSON.link;
                }
                // if (data.responseJSON.status === 'success'){
                //     $('.work-popup__form').html(data.responseJSON.items);
                // }
            },
            error: function (data){
                console.log(data);
            }
        });
    })

    //Заявка на услугу
    $('.service-form__submit').click(function(e){
        e.preventDefault();

        var form = $('.service-form');
        var data = form.serialize();

        $.ajax({
            type: "post",
            url: form.attr('action'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            dataType: "json",
            complete: function (data) {
                console.log(data)
                if (data.responseJSON.status === "success"){
                    $('.service-popup__form').html(data.responseJSON.items);
                }
            },
            error: function(data){
                console.log(data);
            }
        });
    })

    //Подписка на новости
    $('.footer-form__btn').click(function (e){
        e.preventDefault();

        var form = $('.footer-form');
        var data = form.serialize();

        $.ajax({
            type: "post",
            url: "/subscribe",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            dataType: "json",
            complete: function (data) {
                console.log(data);
                $('.footer-form__items').html(data.responseJSON.items);
                // $('.footer-form__descr').html();
            },
            error:function (data) {
                $('.footer-form__items').html('Вы уже подписаны');
            }
        });
    })

    //Фильтр новостей
    $('.news-filter__button').each(function(){
        $(this).click(function(e){
            e.preventDefault();
            var formInfo = $('.news-filter__form');
            var checkboxes = $('.news-filter__button_pressed .new_tag');

            var data = {
                "new_tag":[]
            };

            checkboxes.each(function(){
                data["new_tag"].push(this.value);
            })

            console.log(formInfo.attr('action'));

            // console.log(data);
            $.ajax({
                type: "post",
                url: formInfo.attr('action'),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                dataType: "json",
                success: function (data) {
                    if (data.status === 'success'){
                        $('.news-main__list').html(data.items);
                    }
                },
                error: function (data){
                    console.log('error');
                }
            });
        });
    });

    //Фильтр готовых работ
    $('.works-filter__button').each(function(){
        $(this).click(function(e){
            e.preventDefault();

            var form = $('.works-filter__form');
            var checkboxes = $('.works-filter__button_pressed input');

            var data = {
                "work_category":[]
            };

            checkboxes.each(function(){
                data["work_category"].push(this.value);
            })

            $.ajax({
                type: "post",
                url: form.attr('action'),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                dataType: "json",
                complete: function (data) {
                    console.log(data);
                    if (data.responseJSON.status === 'success'){
                        $('.works-main__list').html(data.responseJSON.items);
                    }
                },
                error: function(data){
                    console.log(data)
                }
            });
        });
    })

    //Комментарии
    $('.new-form__btn').click(function(e){
        e.preventDefault();

        form = $('.new-form__form');
        data = form.serialize();

        $.ajax({
            type: "post",
            url: form.attr('action'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            dataType: "json",
            complete: function(data) {
                if (data.responseJSON.status === "success"){
                    $('.comments').html(data.responseJSON.items);
                    $('.new-hero__meta').html(data.responseJSON.meta);
                }
            },
            error: function(data){
                console.log(data);
            }
        });
    })
})
