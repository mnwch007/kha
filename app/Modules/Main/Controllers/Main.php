<?php

namespace App\Modules\Main\Controllers;

use App\Models\MainModel as mainm;

class Main extends \App\Controllers\BaseController {

    var $page_title = "";
    var $page_view = "Modules\Main\Views";
    var $module = 'Main';

    public function __construct() {
        parent::__construct();
        $this->mainm = new mainm();
    }

    public function index() {

        $data['page_title'] = $this->page_title;
        $data['lang_url'] = $this->lang_url;
        $data['page_url_en'] = $this->page_url_en;
        $data['page_url_th'] = $this->page_url_th;

        $data['info_banner'] = $this->mainm->get_field_arr('*,(banner_title_' . $this->lang . ')banner_title,(banner_detail_' . $this->lang . ')banner_detail', 'banners', 'Active=1', 'Sequence asc');
       

        //print_arr($data['info_recommended']);
        //$arr=$this->mainm->get_web_category(1, $this->lang);
        //print_arr($arr);

        echo view('inc-header', $data);
        echo view($this->page_view . '\index', $data);
        echo view('inc-footer', $data);
    }

    public function language_changer($lang = '') {
        //$this->session->set('scu_bulliontexweb_lang', $lang);
        //return redirect()->to(base_url($this->lang_url));
    }

    public function change_pwd() {
        echo $_method = $this->router->methodName();
    }

}
