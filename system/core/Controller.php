<?php
namespace system\core;

class Controller{
    public function success($data = []){
        echo json_encode([
            'code' => 0,
            'message' => 'ok',
            'data' => $data
        ]);die;
    }
    
    public function error($message = ''){
        echo json_encode([
            'code' => 1,
            'message' => $message
        ]);die;
    }
}

