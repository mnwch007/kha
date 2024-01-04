<?php

namespace App\Modules\Ajax\Controllers;

use App\Modules\Ajax\Models\Ajax as ajaxm;
use App\Models\RespModel as resp;

class Ajax extends \App\Controllers\BaseController {

    var $page_view = "Modules\Ajax\Views";
    var $module = 'Ajax';

    public function __construct() {
        $this->ajaxm = new ajaxm();
        $this->resp = new resp();
    }

    public function index() {
        
    }

    public function auto_complete() {
        $mode = $this->request->getGet('mode');
        $arr = [];

        header("content-type: text/html; charset=utf-8");
        echo json_encode($arr);
    }

}
