<?php
//exploding css arrays in the header
//exploding js arrays in the footer
$assets_version = "?v=1.0";
$id = isset($_GET['id']) ? make_safe($_GET['id']) : null;
$lang_js = isset($_SESSION[SESSION]['lang']) && $_SESSION[SESSION]['lang'] == 'ar' ? 'assets/js/lang/ar.js' : 'assets/js/lang/en.js';
$style_css = isset($_SESSION[SESSION]['lang']) && $_SESSION[SESSION]['lang'] == 'ar' ? 'assets/css/style.bundle.rtl.css' : 'assets/css/style.bundle.css';
$fontawesome = isset($_SESSION[SESSION]['lang']) && $_SESSION[SESSION]['lang'] == 'ar' ? 'assets/css/fontawesome.min.rtl.css' : 'assets/css/fontawesome.min.css';
$file_input = isset($_SESSION[SESSION]['lang']) && $_SESSION[SESSION]['lang'] == 'ar' ? 'assets/css/fileinput-rtl.min.css' : 'assets/css/fileinput.min.css';

$shared_css = array(
    $style_css,
    $fontawesome,
    $file_input,
    "assets/css/theme.css",
    "assets/css/perfect-scrollbar.css",
    "assets/css/bootstrap-datepicker3.css",
    "assets/css/bootstrap-datetimepicker.css",
    "assets/css/bootstrap-timepicker.css",
    "assets/css/daterangepicker.css",
    "assets/css/jquery.bootstrap-touchspin.css",
    "assets/css/bootstrap-select.css",
    "assets/css/bootstrap-switch.css",
    "assets/css/select2.css",
    "assets/css/tagify.css",
    "assets/css/animate.css",
    "assets/css/sweetalert2.css",
    "assets/css/trumbowyg.min.css",
    "assets/css/style.css",
);

$shared_js = array(
    $lang_js,
    "assets/js/globals/jquery.js",
    "assets/js/globals/popper.js",
    "assets/js/globals/bootstrap.min.js",
    "assets/js/globals/js.cookie.js",
    "assets/js/globals/moment.min.js",
    "assets/js/libraries/tooltip.min.js",
    "assets/js/libraries/perfect-scrollbar.js",
    "assets/js/libraries/sticky.min.js",
    "assets/js/globals/wNumb.js",
    "assets/js/libraries/jquery.form.min.js",
    "assets/js/globals/jquery.blockUI.js",
    "assets/js/libraries/bootstrap-datepicker.min.js",
    "assets/js/libraries/bootstrap-datetimepicker.min.js",
    "assets/js/libraries/bootstrap-timepicker.min.js",
    "assets/js/libraries/daterangepicker.js",
    "assets/js/libraries/jquery.bootstrap-touchspin.js",
    "assets/js/libraries/bootstrap-maxlength.js",
    "assets/js/libraries/bootstrap-select.js",
    "assets/js/libraries/bootstrap-switch.js",
    "assets/js/libraries/select2.full.js",
    "assets/js/libraries/tagify.polyfills.min.js",
    "assets/js/libraries/tagify.min.js",
    "assets/js/libraries/bootstrap-notify.min.js",
    "assets/js/globals/parsley.min.js",
    "assets/js/libraries/sweetalert2.min.js",
    "assets/js/libraries/trumbowyg.js",
    "assets/js/globals/scripts.bundle.js",
    "assets/js/globals/csrf_checks.js",
    "assets/js/globals/custom.js",
);

$page_css = array();
$page_js = array();
$page_breadcrumbs = array();

$page_title = $lang['site_name'];
$page_header_title = '';

if ($page === $pages['404']) {
    $page_title = "404" . ' - ' . $lang['site_name'];
    $page_js = array(
        "assets/js/pages/404.js",
    );

} elseif ($page === $pages['login']) {
    $page_title = $lang['login'] . ' - ' . $lang['site_name'];
} elseif ($page === $pages['gifs']){
    $page_title = $lang['gifs'] . ' - ' . $lang['gifs'];
    $page_header_title = $lang['gifs'];
}elseif ($page === $pages['favorite']){
    $page_title = $lang['favorite'] . ' - ' . $lang['favorite'];
    $page_header_title = $lang['favorite'];
}elseif ($page === $pages['gifdetails']){
    $page_title = $lang['gifdetails'] . ' - ' . $lang['gifdetails'];
    $page_header_title = $lang['gifdetails'];
}elseif ($page === $pages['history']){
    $page_title = $lang['history'] . ' - ' . $lang['history'];
    $page_header_title = $lang['history'];
}

array_push($page_breadcrumbs, array('title' => $page_header_title, 'link' => '#'));
