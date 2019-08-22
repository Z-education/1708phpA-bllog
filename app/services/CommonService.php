<?php

namespace app\services;

use system\core\Service;
use system\vendor\Pagination;
use app\models\ArticleModel;

class CommonService extends Service {

    var $model;
    
    public function __construct() {
        $modelName = "\\app\\models\\" . CONTROLLER_NAME . 'Model';
        $this->model = new $modelName;
    }
    
    public function getList() {
        $count = $this->model->count();
        $page = new Pagination($count, 1);
        $list = $this->model->limit($page->offset, $page->limit)->select();
        return [
            'page' => $page->getPage(),
            'list' => $list
        ];
    }

    public function del() {
        $id = input('get.id');
        $res = $this->model->where([$this->model->pk => $id])->delete();
        return $res ? true : $this->error('删除失败');
    }

    public function changeStatus() {
        $id = input('get.id');
        $res = $this->model->where([$this->model->pk => $id])->update(['status' => '1 - status'], false);
        return $res ? true : $this->error('删除失败');
    }

}
