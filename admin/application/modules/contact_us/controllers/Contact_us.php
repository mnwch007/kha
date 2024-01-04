<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends MY_Controller {

    var $model_name = 'Contact_us_model';
    var $page_title = "ติดต่อเรา";
    var $page_view = "contact_us";
    var $output_data = array();
    var $can_permission;

    public function __construct() {
        parent:: __construct();
        $this->load->library('user_agent');
        $this->load->model($this->model_name, 'models');
        $this->load->model('main_model', 'mainm');
        $this->load->model('resp_model', 'resp');

        # Check Access
        $this->mainm->check_can_permission($this->router->class, 'access');
    }

    public function index() {
        $id = 1;
        $data = array();
        # Genarating CSS/JS
        $css = $this->mainm->gencss();
        $js = $this->mainm->genjs();
        # Merge Information
        $data['css'] = join(" ", $css);
        $data['js'] = join(" ", $js);
        # Set Page Navi
        $data['page_url'] = $this->router->class;
        $data['page_now'] = $this->router->method;
        $data['page_text'] = $this->page_title;
        $data['info_data'] = $this->models->get_itemtinfo($id);
        $data['act_mode'] = 'edit';
        $data['edit_id'] = $id;

        # Get Information Form (models)
        # Load view
        $this->load->view('inc-header', $data);
        $this->load->view($this->page_view . '/edit', $data);
        $this->load->view('inc-footer', $data);
    }

    public function submit() {
        # Get Post data
        $detail_th = $this->input->post('detail_th');
        $detail_en = $this->input->post('detail_en');
        $mode = $this->input->post('mode');
        $edit_id = $this->input->post('edit_id');

        # Default method
        $resp['text'] = $this->resp->show('default', 0);

        # Add mode
        $this->mainm->check_can_permission($this->router->class, 'edit');

        # Make array db
        $insDB = array(
            'detail_th' => $detail_th,
            'detail_en' => $detail_en,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $edit_id);
        $this->db->update('contact_us', $insDB);

        $resp['code'] = 0;
        $resp['text'] = $this->resp->show('default', 1);
        echo json_encode($resp);
    }

}
