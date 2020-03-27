<?php
require_once "../includes/config.php";

$response = array();

$limit = isset($_POST['limit']) ? make_safe($_POST['limit']) : null;
$offset = isset($_POST['offset']) ? make_safe($_POST['offset']) : null;

include '../includes/connection.php';
$conn = OpenCon();
//echo "Connected Successfully";

$result = mysqli_query($conn, "select * from favorites where user_id = " . $_SESSION[SESSION]['id'] . " LIMIT " . $limit . " OFFSET " . $offset);

$data = [];

while ($row = mysqli_fetch_array($result)) {
    $element = [];
    $element['id'] = $row[0];
    $element['gif'] = $row[2];
    $element['title'] = $row[3];
    $element['source'] = $row[4];
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
