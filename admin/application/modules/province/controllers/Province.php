<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Province extends MY_Controller {

    var $model_name = 'Province_model';
    var $page_title = "สถานะจังหวัด";
    var $page_view = "province";
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

    public function loadContent($year) {
        /* set sort field */
        (!$year) ? $year = date('Y'):'';
        $sort_field = ($_REQUEST['sort']['field'] ? $_REQUEST['sort']['field'] : 'pv.id');
        $sort_type = ($_REQUEST['sort']['sort'] ? $_REQUEST['sort']['sort'] : 'asc');
        /* json data for datatables */
        $data = $this->models->get_itemlist($sort_field,$sort_type,$year);
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
        $provinces_id = $this->input->post('provinces_id');
        $rice_status = $this->input->post('rice_status');
        $corn_status = $this->input->post('corn_status');

        $mode = $this->input->post('mode');
        $edit_id = $this->input->post('edit_id');

        # Default method
        $resp['text'] = $this->resp->show('default', 0, 1);

        # Add mode
        if ($mode == 'add'):
            $this->mainm->check_can_permission($this->router->class, 'add');
            if (
                $provinces_id == ""
                || $rice_status == ""
                || $corn_status == ""
            ):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 2, 1);
            elseif ($this->mains->sumdataRepeat('province_year_status', array('provinces_id' => $provinces_id))):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 4, 1);
            else:
                # Make array db
                $insDB = array(
                    'provinces_id' => $provinces_id,
                    'rice_status' => $rice_status,
                    'corn_status' => $corn_status,
                    'updated_id' => $this->session->scu_id,
                    'created_at' => $this->get_now(),
                    'updated_at' => $this->get_now(),
                );

                $this->db->insert('province_year_status', $insDB);
                $insert_id = $this->db->insert_id();

                $resp['code'] = 0;
                $resp['text'] = $this->resp->show('default', 3, 1);
            endif;
        endif;

        # Add mode
        if ($mode == 'edit'):
            $this->mainm->check_can_permission($this->router->class, 'edit');
            if (
                $provinces_id == ""
                || $rice_status == ""
                || $corn_status == ""
            ):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 2, 1);
            elseif ($this->mains->sumdataRepeat('province_year_status', array('provinces_id' => $provinces_id, 'id !=' => $edit_id))):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 4, 1);
            else:
                # Make array db
                $insDB = array(
                    'provinces_id' => $provinces_id,
                    'rice_status' => $rice_status,
                    'corn_status' => $corn_status,
                    'updated_id' => $this->session->scu_id,
                    'updated_at' => $this->get_now(),
                );

                $this->db->where('id', $edit_id);
                $this->db->update('province_year_status', $insDB);

                $resp['code'] = 0;
                $resp['text'] = $this->resp->show('default', 3, 1);

            endif;

        endif;

        echo json_encode($resp);
    }
}
