<?php
$image_sizes = array(
    'services' => array(
        'large' => array(
            'image_x' => 720,
            'image_y' => 405
        ),
        'medium' => array(
            'image_x' => 480,
            'image_y' => 270
        ),
        'thumb' => array(
            'image_x' => 360,
            'image_y' => 203
        ),
    ),
);

$actions = array(
    1 => "add",
    2 => "edit",
    3 => "view",
    4 => "delete",
);

$error_code = array(
    'success' => 1,
    'general_error' => -999,
    'captcha_error' => -120,
    'required_fields' => -2,
    'password_or_username_is_wrong' => -1,
    'upload_error' => -10,
    '404' => 404,
);

?>
