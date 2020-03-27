<?php
function GetRestURL($Function, $Service, $Params)
{
    $escapees = array('\r\n', '\u2019', '\u00bb', '\u00ab', '\u201d', '\u201c', '\u00d7');
    $replacements = array('\u003C\/br\u003E', '\"', '\"', '\"', '\"', '\"', '\"');
    global $rest_url;
    global $lang;
    global $error_code;
    $results['result'] = '';
    $results['full_result'] = '';
    $results['url'] = '';
    $results['params'] = str_replace($escapees, $replacements, json_encode($Params, true));
    $results['funcName'] = $Function;
    $results['exp'] = '';
    $results['code'] = '';
    $results['http-code'] = '';
    $results['TotalCount'] = '';

    $service_url = $rest_url . $Function;
    $results['url'] = $service_url;

    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    //echo "cURL : ".$curl; // cURL : Resource id #11

    $HeaderLanguage = (isset($_SESSION[SESSION]['lang']) && !empty($_SESSION[SESSION]['lang']) ? $_SESSION[SESSION]['lang'] : "en");
    $headers = array('Accept: */*', 'Content-Type: application/json; charset=utf-8', 'lang:' . $HeaderLanguage);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, str_replace($escapees, $replacements, json_encode($Params, true)));
    $curl_response = curl_exec($curl);
    $curlInfo = curl_getinfo($curl);
    $results['http-code'] = $curlInfo['http_code'];
    $results['full_result'] = $curl_response;
    if (($curl_response == '') || ($curl_response === false)) {
        $results['exp'] = curl_error($curl);
        // $results['info']=$curlInfo;
        curl_close($curl);
        $results['exp'] = $lang['curl_error'];
        $results['code'] = $error_code['404'];
    } else {
        $TheResponse = json_decode($curl_response, true);
        if ($curlInfo['http_code'] == '200') {
            if (isset($TheResponse['msg']))
                $results['exp'] = $TheResponse['msg'];
            if (isset($TheResponse['code']))
                $results['code'] = $TheResponse['code'];
            if (isset($TheResponse['data']))
                $results['result'] = $TheResponse['data'];
            if (isset($TheResponse['data']['count']))
                $results['TotalCount'] = $TheResponse['data']['count'];
        } else {
            $results['exp'] = $lang['general_error'];
            $results['code'] = $curlInfo['http_code'];
        }
        curl_close($curl);

    }
    return $results;
}

function template($template, $data = array())
{
    global $roles_template;
    global $FILES_ROOT;
    global $lang;
    global $APP_ROOT;
    global $page;
    global $current_role_pages;
    extract($data);
    require $template;
}

function escape_db_chars($value)
{
    $search = array("\\", "\x00", "\n", "\r", "'", '"', "\x1a");
    $replace = array("\\\\", "\\0", "\\n", "\\r", "\'", '\"', "\\Z");

    return str_replace($search, $replace, $value);
}

function make_safe($data)
{
    if (is_array($data)) return $data;
    $data = trim($data);
    return $data;

}

function make_safe_array($data, $except = array())
{
    $new_array = array();
    foreach ($data as $key => $value) {
        if (in_array($key, $except)) {
            $new_array[$key] = $value;
            continue;
        }
        $new_array[$key] = make_safe($value);
    }
    return $new_array;
}

function redirect($pageName)
{
    @header("Location: " . $pageName . "");
    echo "<script language='JavaScript' type='text/JavaScript'>" .
        "window.location='" . $pageName . "'</script>";

    exit;
}

function timestamp_to_date($timestamp)
{
    return '<div style="direction: rtl">' . date('Y/m/d', $timestamp) . " " . _AtHour . " " . date('H:m', $timestamp) . '</div>';
}

function response($error, $data = null)
{
    global $error_code;
    global $lang;
    $response['code'] = $error_code[$error];
    $response['msg'] = $lang[$error];
    $response['data'] = $data;
    return $response;
}

function guid()
{
    if (function_exists('com_create_guid') === true) {
        return trim(com_create_guid(), '{}');
    }
    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

function is_valid_timestamp($timestamp)
{
    return ((string)(int)$timestamp === $timestamp)
        && ($timestamp <= PHP_INT_MAX)
        && ($timestamp >= ~PHP_INT_MAX);
}

function generate_code()
{
    return md5(uniqid(rand()));
}

function encode_password($password)
{
    $salt = "";
    return crypt($password, $salt);
}


function is_not_null_field($field)
{
    return isset($field) && strlen($field) != 0 ? true : false;
}

function is_nested_active($array, $page)
{
    // this function is used for side menu only
    foreach ($array as $item) {
        if ($item['link'] == $page) return true;
    }
    return false;
}

function is_current_role_page($array)
{
    global $current_role_pages;
    foreach ($array as $item) {
        if (in_array($item['link'], $current_role_pages)) return true;
    }
    return false;
}

function limit_string($str)
{
    return strlen($str) > 50 ? substr($str, 0, 50) . "..." : $str;
}

function normalize_files(&$files)
{
    $_files = [];
    $_files_count = count($files['name']);
    $_files_keys = array_keys($files);

    for ($i = 0; $i < $_files_count; $i++)
        foreach ($_files_keys as $key)
            $_files[$i][$key] = $files[$key][$i];

    return $_files;
}

function check_required_fields($fields)
{
    foreach ($fields as $field) {
        if (!isset($field)) return false;
    }
    return true;
}

function upload_image($pic, $path, $size)
{
    require_once '../includes/libs/upload/upload.php';
    global $error_code;
    global $lang;
    global $FILES_ROOT;
    $result = array();
    $file_name = guid();
    while (file_exists($FILES_ROOT . "images/$path/" . $file_name . ".png")) {
        $file_name = guid();
    }
    if (isset($pic)) {

        @$handle = new upload($pic);
        if ($handle->uploaded) {

            $handle->file_new_name_body = $file_name;
            $handle->mime_check = true;
            $handle->allowed = array('image/*');
            $handle->image_convert = 'png';
            $handle->image_resize = true;
            $handle->image_ratio = true;
            $handle->dir_auto_create = true;
            $handle->image_ratio_fill = true;
            $handle->image_x = $size['thumb']['image_x'];
            $handle->image_y = $size['thumb']['image_y'];
            $handle->process("../../files/images/$path/" . '/thumb');

            $handle->image_ratio = true;
            $handle->file_new_name_body = $file_name;
            $handle->mime_check = true;
            $handle->image_resize = true;
            $handle->image_convert = 'png';
            $handle->dir_auto_create = true;
            $handle->image_ratio_crop = true;
            $handle->dir_auto_create = true;
            $handle->image_x = $size['medium']['image_x'];
            $handle->image_y = $size['medium']['image_y'];
            $handle->process("../../files/images/$path/" . '/medium');

            $handle->file_new_name_body = $file_name;
            $handle->mime_check = true;
            $handle->image_resize = true;
            $handle->image_convert = 'png';
            $handle->dir_auto_create = true;
            $handle->image_ratio_crop = true;
            $handle->dir_auto_create = true;
            $handle->image_x = $size['large']['image_x'];
            $handle->image_y = $size['large']['image_y'];
            $handle->process("../../files/images/$path/" . '/large');

            if ($handle->processed) {
                $data['file_name'] = $file_name . ".png";
                $result = response($error_code['success'], $lang['success'], $data);
            } else {
                $result = response($error_code['upload_error'], $handle->error);

            }
        }

    }
    return $result;
}

function get_image_size_from_base64($data)
{
    return (int)(strlen(rtrim($data, '=')) * 3 / 4);
}


function generate_csrf($key)
{

    $key = $result = preg_replace('/[^a-zA-Z0-9]+/', '', $key);
    $extra = sha1($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

    $token = base64_encode(time() . $extra . randomString(32));

    $_SESSION[SESSION]['aweometoken' . $key] = $token;

    return $token;

}

function validate_csrf($key, $token, $timespan = null)
{
    global $lang;

    $return['code'] = 1;
    $return['msg'] = $lang['success'];

    $key = $result = preg_replace('/[^a-zA-Z0-9]+/', '', $key);
    if (!$token) {
        $return['code'] = -15;
        $return['msg'] = $lang['missing_csrf'];
    }
    $session_token = $_SESSION[SESSION]['aweometoken' . $key];
    if (!$session_token) {
        $return['code'] = -16;
        $return['msg'] = $lang['missing_csrf'];
    }

    $_SESSION[SESSION]['aweometoken' . $key] = null;

    if (sha1($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']) != substr(base64_decode($session_token), 10, 40)) {
        $return['code'] = -17;
        $return['msg'] = $lang['origin_csrf'];
    }
    if ($token != $session_token) {
        $return['code'] = -18;
        $return['msg'] = $lang['invalid_csrf'];
    }
    // Check for token expiration
    if ($timespan != null && intval(substr(base64_decode($session_token), 0, 10)) + 60 * 60 < time()) {
        $return['code'] = -19;
        $return['msg'] = $lang['expired_csrf'];

    }

    return $return;
}

function randomString($length)
{
    $seed = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqlmnopqrtsuvwxyz0123456789';
    $max = strlen($seed) - 1;
    $string = '';
    for ($i = 0; $i < $length; ++$i) {
        $string .= $seed{intval(mt_rand(0.0, $max))};
    }
    return $string;
}

function GIS_search($string, $limit = 20)
{
    global $GIS_LINK;
    $string = make_safe($string);
    $string = urlencode($string);
    $limit = intval(make_safe($limit));
    $HeaderLanguage = (isset($_SESSION[SESSION]['lang']) && !empty($_SESSION[SESSION]['lang']) ? $_SESSION[SESSION]['lang'] : "en");
    $returned_data = array();
    $GIS_URL = $GIS_LINK . "nominatim/search.php?q=$string&format=json&addressdetails=1&limit=$limit&accept-language=" . $HeaderLanguage;

    $curl = curl_init($GIS_URL);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    $curlInfo = curl_getinfo($curl);
    if (($curl_response == '') || ($curl_response === false)) {
        $returned_data['msg'] = curl_error($curl);
        // $returned_data['info']=$curlInfo;
        curl_close($curl);
        $returned_data['result'] = null;
        $returned_data['code'] = '404';
    } else {
        if ($curlInfo['http_code'] == '200') {
            $TheResponse = json_decode($curl_response, true);
            $returned_data['msg'] = 'success';
            $returned_data['code'] = 1;
            $returned_data['result'] = $TheResponse;
        } else {
            $returned_data['msg'] = 'Content Error';
            $returned_data['code'] = $curlInfo['http_code'];
        }
        curl_close($curl);
    }
    return $returned_data;
}
