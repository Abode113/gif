<?php
require_once "../includes/config.php";

$response = array();

$gif = isset($_POST['gif']) ? make_safe($_POST['gif']) : null;
$title = isset($_POST['title']) ? make_safe($_POST['title']) : null;
$source = isset($_POST['source']) ? make_safe($_POST['source']) : null;

include '../includes/connection.php';
$conn = OpenCon();
//echo "Connected Successfully";

$result = mysqli_query($conn, "insert into favorites (user_id, gif, title, source) values (" . $_SESSION[SESSION]['id'] . ", '" . $gif . "','" . $title . "', '" . $source . "')");

CloseCon($conn);

if($result){
    $response = response('success');
}else{
    $response = response('general_error');
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
