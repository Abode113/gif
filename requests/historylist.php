<?php
require_once "../includes/config.php";

$response = array();

$searchText = isset($_POST['searchText']) ? make_safe($_POST['searchText']) : null;

include '../includes/connection.php';
$conn = OpenCon();
//echo "Connected Successfully";

$result = mysqli_query($conn, "select * from history where user_id = " . $_SESSION[SESSION]['id'] . " order by searchtime DESC");

$data = [];
while ($row = mysqli_fetch_array($result)) {
    $element = [];
    $element['id'] = $row[0];
    $element['searchText'] = $row[2];
    $element['searchTime'] = $row[3];
    array_push($data, $element);
}

CloseCon($conn);

if($result){
    $response = response('success', $data);
}else{
    $response = response('general_error');
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
