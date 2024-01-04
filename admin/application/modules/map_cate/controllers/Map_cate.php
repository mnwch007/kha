<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Map_cate extends MY_Controller {

    public $model_name = 'Map_cate_model';
    public $page_title = "Map Category";
    public $page_view = "map_cate";
    public $output_data = array();
    public $can_permission;

    public function __construct() {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->model($this->model_name, 'models');
        $this->load->model('main_model', 'mainm');
        $this->load->model('resp_model', 'resp');

        # Check Access
        $this->mainm->check_can_permission($this->router->class, 'access');
    }

    public function loadContent() {
        /* set sort field */
        $sort_field = ($_REQUEST['sort']['field'] ? $_REQUEST['sort']['field'] : 'id');
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
        $cat_name_en = $this->input->post('cat_name_en');
        $cat_name_th = $this->input->post('cat_name_th');
        $color = $this->input->post('color');
        $active = $this->input->post('active');

        $mode = $this->input->post('mode');
        $edit_id = $this->input->post('edit_id');

        # Default method
        $resp['text'] = $this->resp->show('default', 0);

        # Add mode
        if ($mode == 'add'):
            $this->mainm->check_can_permission($this->router->class, 'add');
            if (
                    $cat_name_en == ""
            ):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 2);
            else:
                # Make array db
                $insDB = array(
                    'cat_name_en' => $cat_name_en,
                    'cat_name_th' => $cat_name_th,
                    'color' => $color,
                    'active' => ($active ? 1 : 0),
                    'created_at' => $this->get_now(),
                    'updated_at' => $this->get_now(),
                );

                $this->db->insert('map_category', $insDB);
                $insert_id = $this->db->insert_id();

                if ($_FILES['image_file']):
                    $upload_img = $this->uploads('image_file', '/uploads/maps', 409800, 100, 100, true, 'gif|jpg|png|jpeg');
                    $update_status = $upload_img['upload_code'];
                    $upload_data = $upload_img['upload_data'];
                    if ($update_status == 0):
                        $update_data = [
                            'icon' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name'],
                        ];
                        $this->db->where('id', $insert_id);
                        $this->db->update('map_category', $update_data);
                    else:
                        $error_count++;
                        $error_msg = $upload_data;
                    endif;
                endif;

                if ($_FILES['image_file2']):
                    $upload_img = $this->uploads('image_file2', '/uploads/maps', 409800, 100, 100, true, 'gif|jpg|png|jpeg');
                    $update_status = $upload_img['upload_code'];
                    $upload_data = $upload_img['upload_data'];
                    if ($update_status == 0):
                        $update_data = [
                            'icon_active' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name'],
                        ];
                        $this->db->where('id', $insert_id);
                        $this->db->update('map_category', $update_data);
                    else:
                        $error_count++;
                        $error_msg = $upload_data;
                    endif;
                endif;


                if ($error_count > 0) {
                    $resp['code'] = 1;
                    $resp['text'] = $error_msg;
                } else {
                    $resp['code'] = 0;
                    $resp['text'] = $this->resp->show('default', 3);
                }

            endif;
        endif;

        # Add mode
        if ($mode == 'edit'):
            $this->mainm->check_can_permission($this->router->class, 'edit');
            if (
                    $cat_name_en == ""
            ):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 2);
            else:
                # Make array db
                $insDB = array(
                    'cat_name_en' => $cat_name_en,
                    'cat_name_th' => $cat_name_th,
                    'color' => $color,
                    'active' => ($active ? 1 : 0),
                    'updated_at' => $this->get_now(),
                );

                $this->db->where('id', $edit_id);
                $this->db->update('map_category', $insDB);

                if ($_FILES['image_file']):
                    $upload_img = $this->uploads('image_file', '/uploads/maps', 409800, 100, 100, true, 'gif|jpg|png|jpeg');
                    $update_status = $upload_img['upload_code'];
                    $upload_data = $upload_img['upload_data'];
                    if ($update_status == 0):
                        $update_data = [
                            'icon' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name'],
                        ];
                        $this->db->where('id', $edit_id);
                        $this->db->update('map_category', $update_data);
                    else:
                        $error_count++;
                        $error_msg = $upload_data;
                    endif;
                endif;

                if ($_FILES['image_file2']):
                    $upload_img = $this->uploads('image_file2', '/uploads/maps', 409800, 100, 100, true, 'gif|jpg|png|jpeg');
                    $update_status = $upload_img['upload_code'];
                    $upload_data = $upload_img['upload_data'];
                    if ($update_status == 0):
                        $update_data = [
                            'icon_active' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name'],
                        ];
                        $this->db->where('id', $edit_id);
                        $this->db->update('map_category', $update_data);
                    else:
                        $error_count++;
                        $error_msg = $upload_data;
                    endif;
                endif;


                if ($error_count > 0) {
                    $resp['code'] = 1;
                    $resp['text'] = $error_msg;
                } else {
                    $resp['code'] = 0;
                    $resp['text'] = $this->resp->show('default', 3);
                }

            endif;

        endif;

        echo json_encode($resp);
    }

}
