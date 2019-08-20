<?php

function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

function config($key = null) {
    return $key === null ? $GLOBALS['config'] : $GLOBALS['config'][$key];
}

function view($tmp, $data = []) {
    $tmpPath = __VIEW__ . strtolower(CONTROLLER_NAME) . '/' . $tmp . '.php';
    foreach ($data as $key => $val) {
        $$key = $val;
    }
    include $tmpPath;
}

function input($k = null, $default = '') {
    if (NULL === $k) {
        return $_REQUEST;
    }
    $param = explode('.', $k);
    if (count($param) == 1) {
        array_unshift($param, 'request');
    }
    list($type, $key) = $param;
    switch ($type) {
        case 'get':
            $data = empty($key) ? $_GET : ($_GET[$key] ?? $default);
            break;
        case 'post':
            $data = empty($key) ? $_POST : ($_POST[$key] ?? $default);
            break;
        default:
            $data = $_REQUEST[$key] ?? $default;
    }
    return $data;
}

function cookie($key, $value = NULL, $time = null) {
    if(null === $value){
        $val = $_COOKIE[$key] ?? '';
        $decodeValue = base64_decode($val);
        $dataArray = json_decode($decodeValue, true);  //将json字符串转换为数组
        return $dataArray ? $dataArray : $decodeValue;
    }
    if(is_array($value)){
        $value = json_encode($value);
    }
    setcookie($key, base64_encode($value), $time);
}

function unsetCookie($key){
    setcookie($key, null, time() - 1);
}

function session($key, $value = null) {
    if(null === $value){
        return $_SESSION[$key] ?? '';
    }
    $_SESSION[$key] = $value;
}
