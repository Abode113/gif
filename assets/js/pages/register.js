$(document).ready(function () {
    localStorage.clear();
    $(document).on('submit', '#register-form', function (e) {
        if ($('#register-form').parsley().isValid()) {
            e.preventDefault();

            var username = $('#register-username').val();
            var password = $('#register-password').val();
            var confirmedPass = $('#register-con-password').val();

            if(password == confirmedPass) {

                loading();

                var params = {
                    user_name: username,
                    password: password,
                    confirmedPass: confirmedPass,
                };

                $.post("requests/register.php", params)
                    .done(function (response) {
                        unloading();
                        if (response.code == 1) {
                            window.location = 'login'
                        } else {
                            $('.theCaptcha').attr('src', $('.theCaptcha').attr('src') + 0);
                            notification('danger', response.msg)
                        }
                    })
            }else{
                notification('danger', 'password dosent match')
            }
        }
    })
});
