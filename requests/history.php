<?php
require_once "../includes/config.php";

$response = array();

$searchText = isset($_POST['searchText']) ? make_safe($_POST['searchText']) : null;

include '../includes/connection.php';
$conn = OpenCon();
//echo "Connected Successfully";

$result = mysqli_query($conn, "insert into history (user_id, searchtext, searchtime) values (" . $_SESSION[SESSION]['id'] . ", '" . $searchText . "','" . date("Y-m-d H:i:s") . "')");

CloseCon($conn);

if($result){
    $response = response('success');
}else{
    $response = response('general_error');
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
