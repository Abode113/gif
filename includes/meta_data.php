<?php


global $configs;

$configs['allowed_types'] = array(
    'avi' => 'video/x-msvideo',
    'bmp' => 'image/bmp',
    'doc' => 'application/msword',
    'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'gif' => 'image/gif',
    'ico' => 'image/x-icon',
    'jpe' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'jpg' => 'image/jpeg',
    'mov' => 'video/quicktime',
    'movie' => 'video/x-sgi-movie',
    'mp3' => 'audio/mpeg',
    'mpeg' => 'video/mpeg',
    'mpg' => 'video/mpeg',
    'mp4' => 'video/mp4',
    'mpga' => 'audio/mpeg',
    'ogg' => 'application/ogg',
    'pdf' => 'application/pdf',
    'png' => 'image/png',
    'ppt' => 'application/vnd.ms-powerpoint',
    'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
    'rar' => 'application/octet-stream',
    'rtf' => 'text/rtf',
    'wav' => 'audio/x-wav',
    'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    'xls' => 'application/vnd.ms-excel',
    'zip' => 'application/zip',
    'txt' => 'text/plain'
);

$configs['allowed_size'] = str_replace('M', "000000", ini_get("upload_max_filesize"));
$configs['default_location'] = $FILES_ROOT;
$configs['default_image_location'] = $FILES_ROOT . 'images/';

$configs['pic_large_width'] = 800;
$configs['pic_large_height'] = 450;
$configs['pic_medium_width'] = 300;
$configs['pic_medium_height'] = 200;
$configs['pic_thumbnail'] = 150;
$configs['pic_x_thumbnail'] = 50;


