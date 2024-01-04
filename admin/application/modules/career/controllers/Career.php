<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Career extends MY_Controller {

    public $model_name = 'Career_model';
    public $page_title = "Career";
    public $page_view = "career";
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

    public function media_delete($id = 0, $sub_id = 0) {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->models->delete_media($sub_id);
        redirect(base_url($this->router->class . '/edit/' . $id));
    }

    public function submit() {
        # Get Post data
        /* SEO */
        $expired = $this->input->post('expired');
        $job_title_en = $this->input->post('job_title_en');
        $job_title_th = $this->input->post('job_title_th');

        $short_detail_en = $this->input->post('short_detail_en');
        $short_detail_th = $this->input->post('short_detail_th');

        $job_des_en = $this->input->post('job_des_en');
        $job_des_th = $this->input->post('job_des_th');
        $qualification_en = $this->input->post('qualification_en');
        $qualification_th = $this->input->post('qualification_th');
        $other_en = $this->input->post('other_en');
        $other_th = $this->input->post('other_th');
        $button_name_en = $this->input->post('button_name_en');
        $button_name_th = $this->input->post('button_name_th');
        $link = $this->input->post('link');

        $active = $this->input->post('active');

        $mode = $this->input->post('mode');
        $edit_id = $this->input->post('edit_id');

        # Default method
        $resp['text'] = $this->resp->show('default', 0);

        # Add mode
        if ($mode == 'add'):
            $this->mainm->check_can_permission($this->router->class, 'add');
            if ($job_title_en == ""):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 2);
            else:
                # Make array db
                $getLastSeq = $this->mains->getSeq('career', 'Sequence', array());
                $insDB = array(
                    'Sequence' => (int) ($getLastSeq['Sequence'] + 1),
                    'expired' => $expired,
                    'job_title_en' => $job_title_en,
                    'job_title_th' => $job_title_th,
                    'short_detail_en' => $short_detail_en,
                    'short_detail_th' => $short_detail_th,
                    'job_des_en' => $job_des_en,
                    'job_des_th' => $job_des_th,
                    'qualification_en' => $qualification_en,
                    'qualification_th' => $qualification_th,
                    'other_en' => $other_en,
                    'other_th' => $other_th,
                    'button_name_en' => $button_name_en,
                    'button_name_th' => $button_name_th,
                    'link' => $link,
                    'active' => ($active ? 1 : 0),
                    'created_at' => $this->get_now(),
                    'updated_at' => $this->get_now(),
                );

                $this->db->insert('career', $insDB);
                $insert_id = $this->db->insert_id();

                $resp['code'] = 0;
                $resp['text'] = $this->resp->show('default', 3);

            endif;
        endif;

        # Add mode
        if ($mode == 'edit'):
            $this->mainm->check_can_permission($this->router->class, 'edit');
            if ($job_title_en == ""):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 2);
            else:
                # Make array db
                $insDB = array(
                    'expired' => $expired,
                    'job_title_en' => $job_title_en,
                    'job_title_th' => $job_title_th,
                    'short_detail_en' => $short_detail_en,
                    'short_detail_th' => $short_detail_th,
                    'job_des_en' => $job_des_en,
                    'job_des_th' => $job_des_th,
                    'qualification_en' => $qualification_en,
                    'qualification_th' => $qualification_th,
                    'other_en' => $other_en,
                    'other_th' => $other_th,
                    'button_name_en' => $button_name_en,
                    'button_name_th' => $button_name_th,
                    'link' => $link,
                    'active' => ($active ? 1 : 0),
                    'updated_at' => $this->get_now(),
                );

                $this->db->where('id', $edit_id);
                $this->db->update('career', $insDB);

                $resp['code'] = 0;
                $resp['text'] = $this->resp->show('default', 1);

            endif;

        endif;


        echo json_encode($resp);
    }

    public function update_sq() {
        if (isset($_POST['data_set'])) {
            foreach ($_POST['data_set'] as $key => $row) {
                $this->db->where('id', $row['id']);
                $this->db->update('news_media', array('Sequence' => (int) ($row['seq'] + 1)));
            }
            echo json_encode(array('status' => 0));
        }
    }

    public function update_sq_progress() {
        if (isset($_POST['data_set'])) {
            foreach ($_POST['data_set'] as $key => $row) {
                $this->db->where('id', $row['id']);
                $this->db->update('projects_progress_img', array('Sequence' => (int) ($row['seq'] + 1)));
            }
            echo json_encode(array('status' => 0));
        }
    }

}
