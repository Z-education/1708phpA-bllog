<?php

namespace app\controllers;

use app\controllers\Common;

class Admin extends Common {

    public function base() {
        return view('base');
    }

    public function welcome() {
        echo 'welcome to my blog!';
    }
}
