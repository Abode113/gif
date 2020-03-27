<?php
require_once "../includes/config.php";
//var_dump('hhhhhh');exit();
$response = array();

$username = isset($_POST['user_name']) ? make_safe($_POST['user_name']) : null;
$password = isset($_POST['password']) ? make_safe($_POST['password']) : null;

include '../includes/connection.php';
$conn = OpenCon();
//echo "Connected Successfully";

$result = mysqli_query($conn, "SELECT * FROM users where username like '" . $username . "'");

$row = mysqli_fetch_array($result);

$rightPassword = $row['password'];
$user_id = $row['id'];


CloseCon($conn);

if ($username && $password) {
    $params['username'] = $username;
    $params['password'] = encode_password($password);

//    var_dump($_POST['captcha']);
//    var_dump($_SESSION[SESSION]['rand_code']);exit();
    if (make_safe($_POST['captcha']) != $_SESSION[SESSION]['rand_code']) {
        $response = response('captcha_error');
    } else {
        if($rightPassword == md5($password)) {
            // it should be another table exist may be name 'sessions' to save users sessions
            $_SESSION[SESSION]['SessionId'] = md5($params['username'] . date("D M d, Y G:i"));
            $_SESSION[SESSION]['username'] = $username;
            $_SESSION[SESSION]['id'] = $user_id;
            $response = response('success');
        }else{
            $response = response('password_or_username_is_wrong');
        }
    }

} else {
    $response = response('required_fields');

}
header('Content-Type: application/json');
echo json_encode($response);
exit;
