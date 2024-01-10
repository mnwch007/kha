<?php

defined('BASEPATH') or exit('No direct script access allowed');

class News extends MY_Controller {

    public $model_name = 'News_model';
    public $page_title = "News";
    public $page_view = "news";
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
        /* Project Name */
        $ntype = 0;
        /* SEO */
        $date = $this->input->post('date');
        $expired = $this->input->post('expired');
        $url_th = $this->input->post('url_th');
        $url_en = $this->input->post('url_en');
        $keyword_th = $this->input->post('keyword_th');
        $keyword_en = $this->input->post('keyword_en');
        $title_en = $this->input->post('title_en');
        $title_th = $this->input->post('title_th');

        $short_detail_en = $this->input->post('short_detail_en');
        $short_detail_th = $this->input->post('short_detail_th');

        $detail_en = $this->input->post('detail_en');
        $detail_th = $this->input->post('detail_th');

        $active = $this->input->post('active');
//        $showon = $this->input->post('showon');
        $old = $this->input->post('old');

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
                $getLastSeq = $this->mains->getSeq('news', 'Sequence', array());

                $insDB = array(
                    'Sequence' => (int) ($getLastSeq['Sequence'] + 1),
                    'ntype' => $ntype,
                    'date' => $date,
                    'expired' => $expired,
                    'url_th' => $url_th,
                    'url_en' => $url_en,
                    'keyword_th' => $keyword_th,
                    'keyword_en' => $keyword_en,
                    'title_en' => $title_en,
                    'title_th' => $title_th,
                    'short_detail_en' => $short_detail_en,
                    'short_detail_th' => $short_detail_th,
                    'detail_en' => $detail_en,
                    'detail_th' => $detail_th,
                    'active' => ($active ? 1 : 0),
//                    'showon' => ($showon ? 1 : 0),
//                    'old' => ($old ? 1 : 0),
                    'updated_id' => $this->session->scu_id,
                    'created_at' => $this->get_now(),
                    'updated_at' => $this->get_now(),
                );

                $this->db->insert('news', $insDB);
                $insert_id = $this->db->insert_id();

                # upload image
                /*  $up_picture = $this->crop_upload('Image', '/../uploads/news');
                  if (isset($up_picture['name'])):
                  $updateImg['image'] = ($up_picture['name'] == '') ? '' : $up_picture['name'];
                  $this->db->where('id', $insert_id);
                  $this->db->update('news', $updateImg);
                  endif;

                  $up_picture_mob = $this->crop_upload('Image_mob', '/../uploads/news');
                  if (isset($up_picture_mob['name'])):
                  $updateImgm['image_mob'] = ($up_picture_mob['name'] == '') ? '' : $up_picture_mob['name'];
                  $this->db->where('id', $insert_id);
                  $this->db->update('news', $updateImgm);
                  endif; */

                # init error count
                $error_count = 0;
                $error_msg = '';
                foreach ($_FILES['image_file']['name'] as $key => $row) {
                    if (isset($_FILES['image_file']['name'][$key])):

                        $_FILES['image_file_thumb']['name'] = $_FILES['image_file']['name'][$key];
                        $_FILES['image_file_thumb']['type'] = $_FILES['image_file']['type'][$key];
                        $_FILES['image_file_thumb']['tmp_name'] = $_FILES['image_file']['tmp_name'][$key];
                        $_FILES['image_file_thumb']['error'] = $_FILES['image_file']['error'][$key];
                        $_FILES['image_file_thumb']['size'] = $_FILES['image_file']['size'][$key];

                        $upload_img = $this->uploads('image_file_thumb', '/uploads/news', 409800, 0, 0, false, 'gif|jpg|png|jpeg');
                        $update_status = $upload_img['upload_code'];
                        $upload_data = $upload_img['upload_data'];
                        if ($update_status == 0):
                            $getLastSeq = $this->mains->getSeq('news_media', 'Sequence', array());
                            $update_data = [
                                'Sequence' => (int) ($getLastSeq['Sequence'] + 1),
                                'news_id' => $insert_id,
                                'media_type' => 0,
                                'file_name' => $_FILES['image_file_thumb']['name'],
                                'file_path' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name'],
                                'updated_id' => $this->session->scu_id,
                                'created_at' => $this->get_now(),
                                'updated_at' => $this->get_now(),
                            ];
                            $this->db->insert('news_media', $update_data);
                        else:
                            $error_count++;
                            $error_msg = $upload_data;
                        endif;
                    endif;
                }

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
                    'expired' => $expired,
                    'url_th' => $url_th,
                    'url_en' => $url_en,
                    'keyword_th' => $keyword_th,
                    'keyword_en' => $keyword_en,
                    'title_en' => $title_en,
                    'title_th' => $title_th,
                    'short_detail_en' => $short_detail_en,
                    'short_detail_th' => $short_detail_th,
                    'detail_en' => $detail_en,
                    'detail_th' => $detail_th,
                    'active' => ($active ? 1 : 0),
//                    'showon' => ($showon ? 1 : 0),
//                    'old' => ($old ? 1 : 0),
                    'updated_id' => $this->session->scu_id,
                    'updated_at' => $this->get_now(),
                );

                $this->db->where('id', $edit_id);
                $this->db->update('news', $insDB);

                # upload image
                /* $up_picture = $this->crop_upload('Image', '/../uploads/news');
                  if (isset($up_picture['name'])):
                  $updateImg['image'] = ($up_picture['name'] == '') ? '' : $up_picture['name'];
                  $this->db->where('id', $edit_id);
                  $this->db->update('news', $updateImg);
                  endif;

                  $up_picture_mob = $this->crop_upload('Image_mob', '/../uploads/news');
                  if (isset($up_picture_mob['name'])):
                  $updateImgm['image_mob'] = ($up_picture_mob['name'] == '') ? '' : $up_picture_mob['name'];
                  $this->db->where('id', $edit_id);
                  $this->db->update('news', $updateImgm);
                  endif; */

                # init error count
                $error_count = 0;
                $error_msg = '';
                foreach ($_FILES['image_file']['name'] as $key => $row) {
                    if (isset($_FILES['image_file']['name'][$key])):

                        $_FILES['image_file_thumb']['name'] = $_FILES['image_file']['name'][$key];
                        $_FILES['image_file_thumb']['type'] = $_FILES['image_file']['type'][$key];
                        $_FILES['image_file_thumb']['tmp_name'] = $_FILES['image_file']['tmp_name'][$key];
                        $_FILES['image_file_thumb']['error'] = $_FILES['image_file']['error'][$key];
                        $_FILES['image_file_thumb']['size'] = $_FILES['image_file']['size'][$key];

                        $upload_img = $this->uploads('image_file_thumb', '/uploads/news', 409800, 0, 0, false, 'gif|jpg|png|jpeg');
                        $update_status = $upload_img['upload_code'];
                        $upload_data = $upload_img['upload_data'];
                        if ($update_status == 0):
                            $getLastSeq = $this->mains->getSeq('news_media', 'Sequence', array());
                            $update_data = [
                                'Sequence' => (int) ($getLastSeq['Sequence'] + 1),
                                'news_id' => $edit_id,
                                'media_type' => 0,
                                'file_name' => $_FILES['image_file_thumb']['name'],
                                'file_path' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name'],
                                'updated_id' => $this->session->scu_id,
                                'created_at' => $this->get_now(),
                                'updated_at' => $this->get_now(),
                            ];
                            $this->db->insert('news_media', $update_data);
                        else:
                            $error_count++;
                            $error_msg = $upload_data;
                        endif;
                    endif;
                }

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
