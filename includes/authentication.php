<?php
$dev_link = "";
$live_link = "";
$stage_link = "";
$rest_url = "";

if (isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == "localhost")) {
    $rest_url = $dev_link;
} elseif (isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == "")) {
}


?>