<?php
namespace system\core;

class Service{
    var $error = '';
    
    protected function error($message = ''){
        $this->error = $message;
        return false;
    }
}
