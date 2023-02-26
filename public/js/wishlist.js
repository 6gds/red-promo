$('.btn-wishlist__link').click(function (e) {
    e.preventDefault();
    let url;

    if ($('.btn-wishlist').hasClass('btn-wishlist_active')) {
        url = "/wishlist/remove";
        isAdd = false;
    } else {
        url = "/wishlist/add";
        isAdd = true;
    }

    $.ajax({
        type: "post",
        url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data,
        dataType: 'json',
        complete: function (data) {
            if (data.responseJSON.status === 'success'){
                if (isAdd) {
                    $(selector).addClass('btn-wishlist_active');
                } else {
                    $(selector).removeClass('btn-wishlist_active');
                }
            }

            if (data.responseJSON.status == 'error'){
                alert('Пользователь должен быть авторизованным');
            }
        },
    });
});
