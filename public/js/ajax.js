var files = []; // переменная. будет содержать данные файлов
// formData = new FormData();

$('input[type=file]').on('change', function(){
	files.push(this.files);
});


function uploadFile(file, url) {

    var reader = new FileReader();

    reader.onload = function() {
      var xhr = new XMLHttpRequest();

      xhr.upload.addEventListener("progress", function(e) {
        if (e.lengthComputable) {
          var progress = (e.loaded * 100) / e.total;
          /* ... обновляем инфу о процессе загрузки ... */
        }
      }, false);

      /* ... можно обрабатывать еще события load и error объекта xhr.upload ... */

      xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
          if(this.status == 200) {
            /* ... все ок! смотрим в this.responseText ... */
          } else {
            /* ... ошибка! ... */
          }
        }
      };

      xhr.open("POST", url);
      var boundary = "xxxxxxxxx";
      // Устанавливаем заголовки
      xhr.setRequestHeader("Content-Type", "multipart/form-data, boundary="+boundary);
      xhr.setRequestHeader("Cache-Control", "no-cache");
      // Формируем тело запроса
      var body = "--" + boundary + "\r\n";
      body += "Content-Disposition: form-data; name='myFile'; filename='" + file.name + "'\r\n";
      body += "Content-Type: application/octet-stream\r\n\r\n";
      body += reader.result + "\r\n";
      body += "--" + boundary + "--";

      if(xhr.sendAsBinary) {
        // только для firefox
        xhr.sendAsBinary(body);
      } else {
        // chrome (так гласит спецификация W3C)
        xhr.send(body);
      }
    };
    // Читаем файл
    reader.readAsBinaryString(file);
}


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

    $('.btn-wishlist__link').click(function (e) {
        e.preventDefault();
        let url;
        let currentUrl = window.location.href;

        data = {
            work: currentUrl.slice(currentUrl.lastIndexOf('/') + 1)
        };

        if ($('.btn-wishlist__link').hasClass('btn-wishlist__active')) {
            url = "/wishlist/remove";
            isAdd = false;
        } else {
            url = "/wishlist/add";
            isAdd = true;
        }

        console.log(url);

        $.ajax({
            type: "post",
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            dataType: 'json',
            complete: function (data) {
                console.log(data);
                if (data.responseJSON.status === 'success'){
                    if (isAdd) {
                        $('.btn-wishlist__link').addClass('btn-wishlist__active');
                    } else {
                        $('.btn-wishlist__link').removeClass('btn-wishlist__active');
                    }
                }
            },
        });
    });

    $('.search-input').on('input', function(e) {
        if ($(this).val()  != '') {
            e.preventDefault();
            $('.search__result').removeClass('hidden');

            var data = {
                "query": $(this).val(),
            };

            $.ajax({
                type: "post",
                url: "/search",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    if (data.status === 'success'){
                        let result = data.data;
                        let ul = $(".search__result");
                        ul.empty();

                        for (key in result) {
                            let li = document.createElement("li");
                            li.innerHTML = '<a href="' + result[key].url + '"' + '>' + result[key].title + '</a>';
                            ul.append(li);
                        }
                    }
                },
            });
        } else {
            $('.search__result').addClass('hidden');
        }
    });

    //Комментарии
    $('#review-form__form').submit(function(e){
        e.preventDefault();

        var formInfo = $('#review-form__form');
        var formData = new FormData(this);
        let TotalImages = 0;
        let images = [];

        // var formData = new FormData(this);
        // let TotalImages = $('#images')[0].files.length; //Total Images
        // formData.append('TotalImages', TotalImages);
        // let images = $('#images')[0];
        // for (let i = 0; i < TotalImages; i++) {
        //     formData.append('images' + i, images.files[i]);
        // }

        $.each(files, function (indexInArray, file) {
            function toArray(fileList) {
                return Array.prototype.slice.call(fileList);
            }

            TotalImages++;
            images = images.concat(toArray(file));
        });

        formData.append('TotalImages', TotalImages);


        // formData.append('asd', 1);

        // заполняем переменную данными, при изменении значения поля file

        // $('#img-list li').map(function(i,n) {
        //     // var c = document.getElementById("myCanvas");
        //     // var ctx = c.getContext("2d");
        //     // var img = $(n).children('img');
        //     // console.log(img);
        //     // ctx.drawImage(img, 10, 10);
        //     // var imgString = c.toDataURL();
        //     // formData.append('images[]', n);
        //     images.push( $(n).children('img'));
        // })

        for (let i = 0; i < TotalImages; i++) {
            formData.append('images' + i, images[i]);
        }



        // for (var key of formData.entries()) {
        //     console.log(key[0] + ', ' + key[1]);
        // }

        $.ajax({
            type:'POST',
            url: formInfo.attr('action'),
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                console.log(data);
                if (data.status === 'success') {
                    $("#img-list").empty();
                    files = [];
                    $("#file-field").prop('disabled', false);
                    $('.comments').html(data.data);
                }
            },
            error: function(data){
                console.log(data);
            }
        });
    })
})

