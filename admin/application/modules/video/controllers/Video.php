<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends MY_Controller {

    var $model_name = 'Video_model';
    var $page_title = "Video Clip";
    var $page_view = "video";
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

    public function loadContent() {
        /* set sort field */
        $sort_field = ($_REQUEST['sort']['field'] ? $_REQUEST['sort']['field'] : 'Sequence');
        $sort_type = ($_REQUEST['sort']['sort'] ? $_REQUEST['sort']['sort'] : 'asc');
        /* json data for datatables */
        $data = $this->models->get_itemlist($sort_field, $sort_type);
        echo $this->mains->loadAjaxData($data);
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

        # Get Information Form (models)
        # Load view
        $this->load->view('inc-header', $data);
        $this->load->view($this->page_view . '/index', $data);
        $this->load->view('inc-footer', $data);
    }

    public function add() {
        $this->mainm->check_can_permission($this->router->class, 'add');
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
        $data['act_mode'] = 'add';

        # get data
        # Get Information Form (models)
        # Load view
        $this->load->view('inc-header', $data);
        $this->load->view($this->page_view . '/add', $data);
        $this->load->view('inc-footer', $data);
    }

    public function edit($id = 0) {
        $this->mainm->check_can_permission($this->router->class, 'edit');
        if (empty($id)):
            redirect($this->router->class);
        else:
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
            $data['act_mode'] = 'edit';
            $data['edit_id'] = $id;

            # get data
            $data['info_data'] = $this->models->get_itemtinfo($id);
            # Load view
            $this->load->view('inc-header', $data);
            $this->load->view($this->page_view . '/edit', $data);
            $this->load->view('inc-footer', $data);
        endif;
    }

    public function delete($id = 0) {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->models->delete($id);
        redirect(base_url($this->router->class));
    }

    public function media_delete($id = 0) {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->db->where('video_id', $id);
        $this->db->update('video_clip', array('file_link' => ''));
        redirect(base_url($this->router->class . '/edit/' . $id));
    }

    public function submit() {
        # Get Post data
        $title_th = $this->input->post('title_th');
        $title_en = $this->input->post('title_en');
        $short_detail_th = $this->input->post('short_detail_th');
        $short_detail_en = $this->input->post('short_detail_en');
        $file_link = $this->input->post('file_link');

        $mode = $this->input->post('mode');
        $edit_id = $this->input->post('edit_id');

        # Default method
        $resp['text'] = $this->resp->show('default', 0);

        # Add mode
        if ($mode == 'add'):
            $this->mainm->check_can_permission($this->router->class, 'add');
            if ($title_th == ""):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 2);
            else:
                $getLastSeq = $this->mains->getSeq('video_clip', 'Sequence', array());
                $insDB = array(
                    'Sequence' => (int) ($getLastSeq['Sequence'] + 1),
                    'title_th' => $title_th,
                    'title_en' => $title_en,
                    'short_detail_th' => $short_detail_th,
                    'short_detail_en' => $short_detail_en,
                    'media_type' => 1,
                    'file_link' => $file_link
                );

                $this->db->insert('video_clip', $insDB);
                $insert_id = $this->db->insert_id();

                $resp['code'] = 0;
                $resp['text'] = $this->resp->show('default', 3);

            endif;
        endif;

        # Add mode
        if ($mode == 'edit'):
            $this->mainm->check_can_permission($this->router->class, 'edit');
            if ($title_th == ""):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 2);
            else:
                # Make array db
                $insDB = array(
                    'title_th' => $title_th,
                    'title_en' => $title_en,
                    'short_detail_th' => $short_detail_th,
                    'short_detail_en' => $short_detail_en,
                    'media_type' => 1,
                    'file_link' => $file_link
                );

                $this->db->where('video_id', $edit_id);
                $this->db->update('video_clip', $insDB);

                $resp['code'] = 0;
                $resp['text'] = $this->resp->show('default', 1);

            endif;

        endif;

        echo json_encode($resp);
    }

}
