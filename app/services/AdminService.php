<?php

namespace app\services;

use system\core\Service;
use system\vendor\Pagination;
use app\models\AdminModel;

class AdminService extends Service {

    public function getList() {
        $model = new AdminModel;
        $count = $model->count();
        $page = new Pagination($count, 1);
        $list = $model->limit($page->offset, $page->limit)->select();
        return [
            'page' => $page->getPage(),
            'list' => $list
        ];
    }

    public function del() {
        $id = input('get.id');
        $model = new AdminModel();
        $res = $model->where(['uid' => $id])->delete();
        return $res ? true : $this->error('删除失败');
    }

    public function changeStatus() {
        $id = input('get.id');
        $model = new AdminModel();
        $res = $model->where(['uid' => $id])->update(['status' => '1 - status'], false);
        return $res ? true : $this->error('删除失败');
    }

}
