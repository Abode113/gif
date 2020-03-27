
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
             style="background-image: url(<?php echo $APP_ROOT . 'assets/images/background.jpg' ?>);">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="#">
                            <img class="gificon" src="<?php echo $APP_ROOT . 'assets/images/gif.gif' ?>">
                        </a>
                    </div>
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">Register</h3>
                        </div>
                        <form class="kt-form" id="register-form" data-parsley-validate="" method="post" autocomplete="off">
                            <input class="form-control" id="register-username" type="text"
                                   placeholder="<?php echo $lang['username'] ?>" name="email"
                                   autocomplete="off" required>
                            <input class="form-control" id="register-password" type="password" required
                                   placeholder="<?php echo $lang['password'] ?>" name="password" autocomplete="off">
                            <input class="form-control" id="register-con-password" type="password" required
                                   placeholder="<?php echo $lang['con-password'] ?>" name="con-password" autocomplete="off">

                            <div class="kt-login__actions">
                                <button id="kt_login_signin_submit"
                                        class="btn btn-brand btn-elevate kt-login__btn-primary">
                                    <?php echo $lang['register'] ?>

                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="register-btn">
                        <a href="<?php echo $APP_ROOT . 'login' ?>"><p class="kt-login__title">Go Back To Login</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->
</body>