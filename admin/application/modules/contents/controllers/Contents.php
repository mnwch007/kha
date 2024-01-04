<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contents extends MY_Controller
{

    public $model_name = 'Contents_model';
    public $page_title = "Content";
    public $page_view = "contents";
    public $output_data = array();
    public $can_permission;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->model($this->model_name, 'models');
        $this->load->model('main_model', 'mainm');
        $this->load->model('resp_model', 'resp');

        # Check Access
        $this->mainm->check_can_permission($this->router->class, 'access');
    }

    public function loadContent()
    {
        /* set sort field */
        $sort_field = ($_REQUEST['sort']['field'] ? $_REQUEST['sort']['field'] : 'content_id');
        $sort_type = ($_REQUEST['sort']['sort'] ? $_REQUEST['sort']['sort'] : 'desc');
        /* json data for datatables */
        $data = $this->models->get_itemlist($sort_field, $sort_type);
        echo $this->mains->loadAjaxData($data);
    }

    public function index()
    {
        $data = array();
        # Genarating CSS/JS
        $css = $this->mainm->gencss();
        $js = $this->mainm->genjs();
        $js['fetchData'] = js('fetch/contents.js');
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

    public function add()
    {
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

    public function edit($id = 0)
    {
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

    public function delete($id = 0)
    {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->models->delete($id);
        redirect(base_url($this->router->class));
    }

    public function submit()
    {
        # Get Post data
        $content_url = $this->input->post('content_url');
        $content_title_en = $this->input->post('content_title_en');
        $content_title_th = $this->input->post('content_title_th');
        $content_html_en = $this->input->post('content_html_en');
        $content_html_th = $this->input->post('content_html_th');
        $active = $this->input->post('active');

        $mode = $this->input->post('mode');
        $edit_id = $this->input->post('edit_id');

        # Default method
        $resp['text'] = $this->resp->show('default', 0, 1);

        # Add mode
        if ($mode == 'add'):
            $this->mainm->check_can_permission($this->router->class, 'add');
            if (
            $content_title_en == ""
        ):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 2, 1);
            elseif ($this->mains->sumdataRepeat('contents', array('content_title_en' => $content_title_en))):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 4, 1);
            else:
                # Make array db
                $insDB = array(
                    'content_url' => $content_url,
                    'content_title_en' => $content_title_en,
                    'content_title_th' => $content_title_th,
                    'content_html_en' => $content_html_en,
                    'content_html_th' => $content_html_th,
                    'active' => ($active == 1 ? 1:0),
                    'updated_id' => $this->session->scu_id,
                    'created_at' => $this->get_now(),
                    'updated_at' => $this->get_now(),
                );

                $this->db->insert('contents', $insDB);
                $insert_id = $this->db->insert_id();

                $resp['code'] = 0;
                $resp['text'] = $this->resp->show('default', 3, 1);

            endif;
        endif;

        # Add mode
        if ($mode == 'edit'):
            $this->mainm->check_can_permission($this->router->class, 'edit');
            if (
            $content_title_en == ""
        ):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 2, 1);
            elseif ($this->mains->sumdataRepeat('contents', array('content_title_en' => $content_title_en, 'content_id !=' => $edit_id))):
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 4, 1);
            else:
                # Make array db
                $insDB = array(
                    'content_url' => $content_url,
                    'content_title_en' => $content_title_en,
                    'content_title_th' => $content_title_th,
                    'content_html_en' => $content_html_en,
                    'content_html_th' => $content_html_th,
                    'active' => ($active == 1 ? 1:0),
                    'updated_id' => $this->session->scu_id,
                    'updated_at' => $this->get_now(),
                );

                $this->db->where('content_id', $edit_id);
                $this->db->update('contents', $insDB);

                if ($error) {
                    $resp['code'] = 1;
                    $resp['text'] = $this->resp->show('default', 2, 1);
                } else {
                    $resp['code'] = 0;
                    $resp['text'] = $this->resp->show('default', 1, 1);
                }

            endif;

        endif;

        echo json_encode($resp);
    }
}
