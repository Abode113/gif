$(document).ready(function () {
    localStorage.clear();
    $(document).on('submit', '#login-form', function (e) {
        if ($('#login-form').parsley().isValid()) {
            e.preventDefault();
            loading();
            var username = $('#login-username').val();
            var password = $('#login-password').val();
            var captcha = $('#captcha').val();

            var params = {
                user_name: username,
                password: password,
                captcha: captcha,
            };

            $.post("requests/login.php", params)
                .done(function (response) {
                    unloading();
                    if (response.code == 1) {
                        window.location = mainURL
                    } else {
                        $('.theCaptcha').attr('src', $('.theCaptcha').attr('src') + 0);
                        notification('danger', response.msg)
                    }
                })
        }
    })
});
