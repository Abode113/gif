<?php
require_once "../includes/config.php";

$response = array();

$gif_image = isset($_POST['gif_image']) ? make_safe($_POST['gif_image']) : null;

include '../includes/connection.php';
$conn = OpenCon();
//echo "Connected Successfully";

$result = mysqli_query($conn, "SELECT * FROM gifminifyLinks where minifyLink like '" . $gif_image . "'");

$row = mysqli_fetch_array($result);
if(isset( $row['realLink'])){
    if( $row['realLink'] != null){
        $response = response('success', $row['realLink']);
    }else{
        $response = '';
    }
}else{
    $response = '';
}

CloseCon($conn);

header('Content-Type: application/json');
echo json_encode($response);
exit;
