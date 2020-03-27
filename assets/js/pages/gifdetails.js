$(document).ready(function () {

    var gif_image = $('#minifiedUrl').data('url');

    var params = {
        gif_image: gif_image
    };

    loading();

    $.post(siteURL + 'requests/realLink.php', params)
        .done(function (response) {
            unloading();
            if (response.code == 1) {
                $('#realLink').attr('href', response.data);
                window.location.href = response.data; // that redirect me to home page !
                // window.location.replace(response.data); // that redirect me to home page !
            } else {
                notification('danger', 'wrong url')
            }
        });

})