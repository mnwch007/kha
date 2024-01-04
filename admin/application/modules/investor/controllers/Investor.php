<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Investor extends MY_Controller {

    public $model_name = 'Investor_model';
    public $page_title = "Investor";
    public $page_view = "investor";
    public $output_data = array();
    public $can_permission;
    var $table = "investor";
    var $tablelist = "investor_media";

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
        $sort_field = ($_REQUEST['sort']['field'] ? $_REQUEST['sort']['field'] : 'date');
        $sort_type = ($_REQUEST['sort']['sort'] ? $_REQUEST['sort']['sort'] : 'desc');
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

        $data['info_myear'] = unserialize(MYEARLY);

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
            $data['gallery_db'] = $this->models->get_galleryitem($id, 0);

            $data['info_myear'] = unserialize(MYEARLY);

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

    public function media_delete($id = 0, $sub_id = 0) {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->models->delete_media($sub_id);
        redirect(base_url($this->router->class . '/edit/' . $id));
    }

    public function submit() {
        $date = $this->input->post('date');
        $syear = $this->input->post('syear');

        $stype = $this->input->post('stype');
        $title_en = $this->input->post('title_en');
        $title_th = $this->input->post('title_th');
//        $detail_en = $this->input->post('detail_en');
//        $detail_th = $this->input->post('detail_th');

        $active = $this->input->post('active');

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
                # Make array db
                $insDB = array(
                    'date' => $date,
                    'syear' => $syear,
                    'stype' => $stype,
                    'title_en' => $title_en,
                    'title_th' => $title_th,
//                    'detail_en' => $detail_en,
//                    'detail_th' => $detail_th,
                    'active' => ($active ? 1 : 0),
                    'updated_id' => $this->session->scu_id,
                    'created_at' => $this->get_now(),
                    'updated_at' => $this->get_now(),
                );

                $this->db->insert($this->table, $insDB);
                $insert_id = $this->db->insert_id();

                # init error count
                $error_count = 0;
                $error_msg = '';

                if (isset($_FILES['pdf_file']['name'])):
                    $_FILES['file_path']['name'] = $_FILES['pdf_file']['name'];
                    $_FILES['file_path']['type'] = $_FILES['pdf_file']['type'];
                    $_FILES['file_path']['tmp_name'] = $_FILES['pdf_file']['tmp_name'];
                    $_FILES['file_path']['error'] = $_FILES['pdf_file']['error'];
                    $_FILES['file_path']['size'] = $_FILES['pdf_file']['size'];

                    $upload_img = $this->uploads('file_path', '/uploads/investor', 409800, 0, 0, false, 'pdf');
                    $update_status = $upload_img['upload_code'];
                    $upload_data = $upload_img['upload_data'];
                    if ($update_status == 0):
                        $upload_data = array(
                            'pdf_file' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name']
                        );
                        $this->db->where('id', $insert_id);
                        $this->db->update($this->table, $upload_data);
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
            if ($title_th == ""):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 2);
            else:
                # Make array db
                $insDB = array(
                    'date' => $date,
                    'syear' => $syear,
                    'stype' => $stype,
                    'title_en' => $title_en,
                    'title_th' => $title_th,
//                    'detail_en' => $detail_en,
//                    'detail_th' => $detail_th,
                    'active' => ($active ? 1 : 0),
                    'updated_id' => $this->session->scu_id,
                    'updated_at' => $this->get_now(),
                );

                $this->db->where('id', $edit_id);
                $this->db->update($this->table, $insDB);

                if (isset($_FILES['pdf_file']['name'])):
                    $_FILES['file_path']['name'] = $_FILES['pdf_file']['name'];
                    $_FILES['file_path']['type'] = $_FILES['pdf_file']['type'];
                    $_FILES['file_path']['tmp_name'] = $_FILES['pdf_file']['tmp_name'];
                    $_FILES['file_path']['error'] = $_FILES['pdf_file']['error'];
                    $_FILES['file_path']['size'] = $_FILES['pdf_file']['size'];

                    $upload_img = $this->uploads('file_path', '/uploads/investor', 409800, 0, 0, false, 'pdf|zip|rar');
                    $update_status = $upload_img['upload_code'];
                    $upload_data = $upload_img['upload_data'];
                    if ($update_status == 0):
                        $upload_data = array(
                            'pdf_file' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name']
                        );
                        $this->db->where('id', $edit_id);
                        $this->db->update($this->table, $upload_data);
                    endif;

                endif;

                if ($error_count > 0) {
                    $resp['code'] = 1;
                    $resp['text'] = $error_msg;
                } else {
                    $resp['code'] = 0;
                    $resp['text'] = $this->resp->show('default', 1);
                }

            endif;

        endif;

        echo json_encode($resp);
    }

    public function update_sq() {
        if (isset($_POST['data_set'])) {
            foreach ($_POST['data_set'] as $key => $row) {
                $this->db->where('id', $row['id']);
                $this->db->update($this->tablelist, array('Sequence' => (int) ($row['seq'] + 1)));
            }
            echo json_encode(array('status' => 0));
        }
    }

    /* public function update_sq_progress() {
      if (isset($_POST['data_set'])) {
      foreach ($_POST['data_set'] as $key => $row) {
      $this->db->where('id', $row['id']);
      $this->db->update('projects_progress_img', array('Sequence' => (int) ($row['seq'] + 1)));
      }
      echo json_encode(array('status' => 0));
      }
      } */
}
