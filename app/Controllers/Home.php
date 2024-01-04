<?php

namespace App\Controllers;

class Home extends BaseController {

    public function index() {
        /*echo $this->session->scu_logged;
         if ($this->session->scu_logged):
             
             else:
             
         endif;*/
        return view('Modules\Login\Views\login');
        //return view('Modules\Login\Views\test_effect');
    }

}
