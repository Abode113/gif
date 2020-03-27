<?php
require_once "../includes/config.php";
//var_dump($_POST);exit;
$lang = isset($_POST['lang']) ? make_safe($_POST['lang']) : null;
$_SESSION[SESSION]['lang'] = $lang;
$response['code'] = 1;
header('Content-Type: application/json');
echo json_encode($response);


