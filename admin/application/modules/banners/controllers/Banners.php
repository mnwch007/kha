<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends MY_Controller {

    var $model_name = 'Banners_model';
    var $page_title = "Banner";
    var $page_view = "banners";
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

    public function submit() {
        # Get Post data
        $banner_title_en = $this->input->post('banner_title_en');
        $banner_title_th = $this->input->post('banner_title_th');
        $banner_detail_en = $this->input->post('banner_detail_en');
        $banner_detail_th = $this->input->post('banner_detail_th');
        $banner_link = $this->input->post('banner_link');

        $mode = $this->input->post('mode');
        $edit_id = $this->input->post('edit_id');

        # Default method
        $resp['text'] = $this->resp->show('default', 0);

        # Add mode
        if ($mode == 'add'):
            $this->mainm->check_can_permission($this->router->class, 'add');
            if ($banner_title_th == ""):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 2);
            else:
                $getLastSeq = $this->mains->getSeq('banners', 'Sequence', array());
                $insDB = array(
                    'Sequence' => (int) ($getLastSeq['Sequence'] + 1),
                    'banner_title_en' => $banner_title_en,
                    'banner_title_th' => $banner_title_th,
                    'banner_detail_en' => $banner_detail_en,
                    'banner_detail_th' => $banner_detail_th,
                    'banner_link' => $banner_link
                );

                $this->db->insert('banners', $insDB);
                $insert_id = $this->db->insert_id();

                # Upload
                $up_picture = $this->crop_upload('Image', '/../uploads/banner');
                if (isset($up_picture['name'])):
                    $insDBM['banner_image'] = ($up_picture['name'] == '') ? '' : $up_picture['name'];
                    $this->db->where('banner_id', $insert_id);
                    $this->db->update('banners', $insDBM);
                endif;

                # Upload
                $up_picture = $this->crop_upload('Image2', '/../uploads/banner');
                if (isset($up_picture['name'])):
                    $insDBM['banner_image_mob'] = ($up_picture['name'] == '') ? '' : $up_picture['name'];
                    $this->db->where('banner_id', $insert_id);
                    $this->db->update('banners', $insDBM);
                endif;

                $resp['code'] = 0;
                $resp['text'] = $this->resp->show('default', 3);

            endif;
        endif;

        # Add mode
        if ($mode == 'edit'):
            $this->mainm->check_can_permission($this->router->class, 'edit');
            if ($banner_title_th == ""):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 2);
            else:
                # Make array db
                $insDB = array(
                    'banner_title_en' => $banner_title_en,
                    'banner_title_th' => $banner_title_th,
                    'banner_detail_en' => $banner_detail_en,
                    'banner_detail_th' => $banner_detail_th,
                    'banner_link' => $banner_link
                );

                $this->db->where('banner_id', $edit_id);
                $this->db->update('banners', $insDB);

                # upload image
                $up_picture = $this->crop_upload('Image', '/../uploads/banner');
                if (isset($up_picture['name'])):
                    $insDBM['banner_image'] = ($up_picture['name'] == '') ? '' : $up_picture['name'];
                    $this->db->where('banner_id', $edit_id);
                    $this->db->update('banners', $insDBM);
                endif;

                # Upload
                $up_picture = $this->crop_upload('Image2', '/../uploads/banner');
                if (isset($up_picture['name'])):
                    $insDBM['banner_image_mob'] = ($up_picture['name'] == '') ? '' : $up_picture['name'];
                    $this->db->where('banner_id', $edit_id);
                    $this->db->update('banners', $insDBM);
                endif;

                $resp['code'] = 0;
                $resp['text'] = $this->resp->show('default', 1);

            endif;

        endif;

        echo json_encode($resp);
    }

}
