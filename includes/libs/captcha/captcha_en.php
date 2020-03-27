<?php $timeStamp = time(); ?>
<div class="form-group m-form__group CaptchaDiv text-md-center mt-3">
    <img src="<?php echo $APP_ROOT . "includes/libs/captcha/captchaImg.php?uid=" . $timeStamp ?>" class="theCaptcha"/>
    <div class="text-center">
        <span class="help-block help" style="color:#737373 !important;">Verify that you are a human <br> Type the number in the field below</span>
    </div>
    <input id="captcha" type="text" maxlength="5" class="form-control m-input NumericOnly captcha"
           data-parsley-required-message="<?php echo $lang['filed_required'] ?>"
           placeholder="<?php echo $lang['captcha'] ?>" required>
</div>
