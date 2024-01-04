<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notice_message extends MY_Controller {

    var $model_name = 'Notice_message_model';
    var $page_title = "Notification";
    var $page_view = "notice_message";
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
        $data['info_data'] = $this->models->get_itemtinfo(1);

        # Get Information Form (models)
        # Load view
        $this->load->view('inc-header', $data);
        $this->load->view($this->page_view . '/edit', $data);
        $this->load->view('inc-footer', $data);
    }

    public function submit() {
        # Get Post data
        $active = $this->input->post('active');
        $detail = $this->input->post('detail');

        $insDB = array(
            'detail' => $detail,
            'active' => ($active ? 1 : 0),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', 1);
        $this->db->update('show_message', $insDB);


        $my_file = '../uploads/resp_notics.json';
        $handle = fopen($my_file, 'w') or die('Cannot open file:  ' . $my_file);
        $useractive=array();
        $data = array(
            'mesg' => $insDB['detail'],
            'status' => $insDB['active'],
            'useractive' => json_encode($useractive)
        );
        fwrite($handle, json_encode($data));
        fclose($handle);


        $resp['code'] = 0;
        $resp['text'] = $this->resp->show('default', 1);

        echo json_encode($resp);
    }

}
