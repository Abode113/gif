<?php
require_once "../includes/config.php";

$params['sessionId'] = (isset($_SESSION[SESSION]['SessionId'])) ? $_SESSION[SESSION]['SessionId'] : "";
//var_dump($result);exit;
unset($_SESSION[SESSION]);
echo 1;
