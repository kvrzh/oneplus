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
});