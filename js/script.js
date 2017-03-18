$(document).ready(function () {
    $('#send').click(function (e) {
        e.preventDefault();
        var message = $("#commentary").val();
        var id = $('#id').val();
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = yyyy + '-' + mm + '-' + dd;
        $.ajax({
            type: "POST",
            url: '/news/commentary',
            data: {"date": today, "message": message, "id": id},
            cache: false,
            success: function (response) {
                if (response == 1) {
                    $('.commentary-group').append('<div class="commentary"><span>' + message + '</span><small>' + today + '</small></div>');
                }
            }
        });
    });
    $('.news-list').on('click', '#button_pagination', function () {
        loadNews();
    });
});
function loadNews() {
    var lastElem = $('input#news_id').last();
    var lastId = $(lastElem).val();
    var parent = $('.news-item').parent();
    $('#button_pagination').remove();
    $(parent).append('<div class="new_news_spin"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>');
    var url = '/';
    $.ajax({
        type: "POST",
        url: url,
        data: {"id": lastId},
        cache: false,
        success: function (response) {
            $('.new_news_spin').remove();
            $(parent).append(response);
        }
    });
}
