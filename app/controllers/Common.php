<?php

namespace app\controllers;

use system\core\Controller;

class Common extends Controller {

    var $service;

    public function __construct() {
        $serviceName = "\\app\\services\\" . CONTROLLER_NAME . 'Service';
        $this->service = new $serviceName;
    }

    public function index() {
        if (IS_AJAX) {
            $data = $this->service->getList();
            if ($data) {
                return $this->success($data);
            }
            return $this->error($this->service->error);
        }
        return view('index');
    }

    public function del() {
        $result = $this->service->del();
        if (!$result) {
            return $this->error($this->service->error);
        }
        return $this->success();
    }

    public function changeStatus() {
        $result = $this->service->changeStatus();
        if (!$result) {
            return $this->error($this->service->error);
        }
        return $this->success();
    }

}
