<?php
/**
 * Created by PhpStorm.
 * User: TarekEbra
 * Date: 2019-02-13
 * Time: 10:52 AM
 */

class CSRF {
    static private $csrfConfig;
    static private $doChecks=false;
    static private $SESSION;

    static private function validate_csrf($key, $token, $timespan = null)
    {
        global $lang;

        $return['code'] = 1;
        $return['msg'] = $lang['success'];

        $key = $result = preg_replace('/[^a-zA-Z0-9]+/', '', $key);
        if (!$token || !isset($_SESSION[self::$SESSION]['aweometoken' . $key])) {
            $return['code'] = -15;
            $return['msg'] = $lang['missing_csrf'];
            return $return;
        }
        $session_token = $_SESSION[self::$SESSION]['aweometoken' . $key];
//    var_dump($session_token);
        unset($_SESSION[self::$SESSION]['aweometoken' . $key]);

        if (!$session_token || !$token) {
            $return['code'] = -16;
            $return['msg'] = $lang['missing_csrf'];
        }


        elseif (sha1($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']) != substr(base64_decode($session_token), 10, 40)) {
            $return['code'] = -17;
            $return['msg'] = $lang['origin_csrf'];
        }
        elseif ($token != $session_token) {
            $return['code'] = -18;
            $return['msg'] = $lang['invalid_csrf'];
        }
        // Check for token expiration
        elseif ($timespan != null && intval(substr(base64_decode($session_token), 0, 10)) + 60 * 60 < time()) {
            $return['code'] = -19;
            $return['msg'] = $lang['expired_csrf'];

        }

        return $return;
    }

    static private function randomString($length)
    {
        $seed = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqlmnopqrtsuvwxyz0123456789';
        $max = strlen($seed) - 1;
        $string = '';
        for ($i = 0; $i < $length; ++$i) {
            $string .= $seed{intval(mt_rand(0.0, $max))};
        }
        return $string;
    }

    static private function is_assoc($arr)
    {
        if(!is_array($arr)) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    static private function error_response_exit($error_msg)
    {
        $response=[];
        $response['msg'] = $error_msg;
        $response['code'] = -97;
        $response['data'] = null;
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

//    ------------------------------

    static function init($SESSION, $config)
    {
        $error_msg = "Wrong CSRF config";
        foreach($config as $key) {
            if(self::is_assoc($key)) {
                foreach ($key as $_key) {
                    if(!is_array($_key)) die($error_msg);
                }
            }else{
                if(!is_array($key)) die($error_msg);
            }
        }

        self::$csrfConfig = $config;
        self::$SESSION = $SESSION;
        self::$doChecks = true;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CSRF::verifyRestURL();
        }
    }

    static function generate_csrf($key)
    {
        $key = $result = preg_replace('/[^a-zA-Z0-9]+/', '', $key);
        $extra = sha1($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

        $token = base64_encode(time() . $extra . self::randomString(32));

        $_SESSION[self::$SESSION]['aweometoken' . $key] = $token;
        return $token;
    }

    static function getFooterHtml() {
        if(!self::$doChecks) return "";

        global $page;
        $_page = $page . ".php";
        return "
            <input type=\"hidden\" id=\"store\" value=\"" . self::generate_csrf($_page) . "\" data-key=\"" . $_page . "\">
            <script>
                document.addEventListener(\"DOMContentLoaded\", function(event) {
                    addCsrfCheckForRquests(" . json_encode(array_keys(self::$csrfConfig)) . ");
                });
            </script>
        ";
    }

    static function verifyRequest($allowed_keys)
    {
        global $lang;

        $store_token = isset($_POST['store']) ? make_safe($_POST['store']) : null;
        $store_key = isset($_POST['store_key']) ? make_safe($_POST['store_key']) : null;

        $verified = false;
        $error_msg = $lang['missing_csrf'];

        if(in_array($store_key, $allowed_keys)){
            $verify_result = self::validate_csrf($store_key, $store_token, true);
            $verified = $verify_result['code'] === 1 ? true : false;
            if(!$verified) $error_msg = $verify_result['msg'];
        }
        if(!$verified) self::error_response_exit($error_msg);
    }

    static function verifyRestURL()
    {
        if(!self::$doChecks) return;
        $requestFile = basename($_SERVER["REQUEST_URI"]);
        if(isset(self::$csrfConfig[$requestFile])) {
            if (self::is_assoc(self::$csrfConfig[$requestFile])){
                $action = isset($_POST['action']) && !empty($_POST['action']) ? make_safe($_POST['action']) : null;
                if($action){
                    if(isset(self::$csrfConfig[$requestFile][$action])){
                        self::verifyRequest(self::$csrfConfig[$requestFile][$action]);
                    }
                }
            }else{
                self::verifyRequest(self::$csrfConfig[$requestFile]);
            }
        }
    }
}
