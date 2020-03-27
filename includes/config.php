<?php
session_start();
$APP_ROOT = "";
$FILES_ROOT = "";
$PROJECT_ROOT = "";

if (isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == "localhost")) {
    $PROJECT_ROOT = "/";
    $APP_ROOT = "/GIF/";
    $FILES_ROOT = "/files/";
} elseif (isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == "")) {
    $PROJECT_ROOT = "";
    $APP_ROOT = "";
    $FILES_ROOT = "";
}

$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

define("SESSION", "PROJECT_ADMIN");
define("DEFAULT_LANGUAGE", "ar");

if (!isset($_SESSION[SESSION]['lang']) || empty($_SESSION[SESSION]['lang'])) {
    $_SESSION[SESSION]['lang'] = DEFAULT_LANGUAGE;
}

$current_lang = $_SESSION[SESSION]['lang'];

require_once "page_names.php";
require_once "enum.php";
if ($_SESSION[SESSION]['lang'] == 'ar') {
    require_once "lang/ar.php";
} else {
    require_once "lang/en.php";
}
require_once "authentication.php";
require_once "meta_data.php";
require_once "libs/upload/upload.php";
require_once "libs/csrf/csrf.php";
require_once "functions.php";
require_once "authorization.php";
require_once "pages_includes.php";


CSRF::init(SESSION, [

    /*** Request file name => page name ***/

    "login.php" => ["login.php"],

    /*** Example for multi-actions page ***/
    /*
    "users.php" => [
        "change_status" => ["user-list.php"],
        "userblock" => ["user-list.php"],
        "unblock" => ["user-list.php", "block-user.php"],
    ] */
]);
