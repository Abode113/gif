<?php

if ($_SESSION[SESSION]['lang'] == 'ar') {
    require_once "captcha_ar.php";
} else {
    require_once "captcha_en.php";
}
?>