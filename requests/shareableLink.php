<?php
require_once "../includes/config.php";

$response = array();

$realLink = isset($_POST['realLink']) ? make_safe($_POST['realLink']) : null;
$minifyLink = substr(base64_encode(pack('H*', md5($realLink))), 0, -2);


include '../includes/connection.php';
$conn = OpenCon();
//echo "Connected Successfully";

$result = mysqli_query($conn, "insert into gifminifylinks (minifyLink, realLink) values ('" . $minifyLink . "', '" . $realLink . "')");

CloseCon($conn);

if($result){
    $response = response('success', $minifyLink);
}else{
    $response = response('general_error');
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
