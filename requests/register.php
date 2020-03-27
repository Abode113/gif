<?php
require_once "../includes/config.php";

$response = array();

$username = isset($_POST['user_name']) ? make_safe($_POST['user_name']) : null;
$password = isset($_POST['password']) ? make_safe($_POST['password']) : null;

include '../includes/connection.php';
$conn = OpenCon();
//echo "Connected Successfully";

$result = mysqli_query($conn, "insert into users (username, password) values ('" . $username . "','" . md5($password) . "')");

CloseCon($conn);

if($result){
//    $_SESSION[SESSION]['SessionId'] = md5($username . date("D M d, Y G:i"));
//    $_SESSION[SESSION]['username'] = $username;
    $response = response('success');
}else{
    $response = response('general_error');
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
