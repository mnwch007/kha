<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Projects extends MY_Controller {

    public $model_name = 'Projects_model';
    public $page_title = "Projects";
    public $page_view = "projects";
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

    public function loadRegister($project_id = '') {
        /* set sort field */
        $sort_field = ($_REQUEST['sort']['field'] ? $_REQUEST['sort']['field'] : 'id');
        $sort_type = ($_REQUEST['sort']['sort'] ? $_REQUEST['sort']['sort'] : 'asc');
        /* json data for datatables */
        $data = $this->models->get_itemlist_register($sort_field, $sort_type, $project_id);
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

    public function information($id = 0) {
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
            $this->load->view($this->page_view . '/info', $data);
            $this->load->view('inc-footer', $data);
        endif;
    }

    public function seo($id = 0) {
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
            $data['info_data'] = $this->models->get_seoitemtinfo($id);
            $data['info_data_main'] = $this->models->get_itemtinfo($id);
            # Load view
            $this->load->view('inc-header', $data);
            $this->load->view($this->page_view . '/seo', $data);
            $this->load->view('inc-footer', $data);
        endif;
    }

    public function gallery($id = 0) {
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
            $data['gallery_db'] = $this->models->get_galleryitem($id, 0);
            $data['info_data_main'] = $this->models->get_itemtinfo($id);
            $data['video_db'] = $this->models->get_galleryitem($id, 1);
            # Load view
            $this->load->view('inc-header', $data);
            $this->load->view($this->page_view . '/gallery', $data);
            $this->load->view('inc-footer', $data);
        endif;
    }

    public function floorplan($id = 0) {
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
            $data['plan_db'] = $this->models->get_planitem($id, 0);
            $data['info_data_main'] = $this->models->get_itemtinfo($id);
            # Load view
            $this->load->view('inc-header', $data);
            $this->load->view($this->page_view . '/floorplan', $data);
            $this->load->view('inc-footer', $data);
        endif;
    }

    public function roomplan($id = 0) {
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
            $data['plan_db'] = $this->models->get_planitem($id, 1);
            $data['info_data_main'] = $this->models->get_itemtinfo($id);
            # Load view
            $this->load->view('inc-header', $data);
            $this->load->view($this->page_view . '/roomplan', $data);
            $this->load->view('inc-footer', $data);
        endif;
    }

    public function budgets($id = 0) {
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
            $data['budget_db'] = $this->models->get_budget($id);
            # Load view
            $this->load->view('inc-header', $data);
            $this->load->view($this->page_view . '/budgets', $data);
            $this->load->view('inc-footer', $data);
        endif;
    }

    public function progress($id = 0) {
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
            $data['info_data'] = $this->models->get_progreeitem($id);
            $data['gallery_db'] = $this->models->get_progressimgitem($data['info_data']['project_id']);
            $data['info_data_main'] = $this->models->get_itemtinfo($id);

            $data['info_work'] = $this->models->get_progress_work($id);
//            print_arr( $data['info_work'] );
            # Load view
            $this->load->view('inc-header', $data);
            $this->load->view($this->page_view . '/progress', $data);
            $this->load->view('inc-footer', $data);
        endif;
    }

    public function submit_utm_register() {
        $id = filter_number($this->input->post('pop_hidregisid'));
        $insDB = array(
            'utm_source' => filter_txt($this->input->post('utm_source')),
            'utm_medium' => filter_txt($this->input->post('utm_medium')),
            'utm_campaign' => filter_txt($this->input->post('utm_campaign'))
        );
        $this->db->where('id', $id);
        $this->db->update('projects_register', $insDB);

        $resp['code'] = 0;
        echo json_encode($resp);
    }

    public function edit_utm_register() {
        $id = filter_number($this->input->post('id'));
        $arr = $this->mainm->getSeqinfo('projects_register', '*', 'id', $id);
        $resp['id'] = $id;
        $resp['utm_source'] = $arr['utm_source'];
        $resp['utm_medium'] = $arr['utm_medium'];
        $resp['utm_campaign'] = $arr['utm_campaign'];
        $resp['code'] = 0;
        echo json_encode($resp);
        //$this->load->view($this->page_view . '/edit_utm_register', $data);
    }

    public function register($id = '') {
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
        $data['project_id'] = $id;

        # Get Information Form (models)
        # Load view
        $this->load->view('inc-header', $data);
        $this->load->view($this->page_view . '/register', $data);
        $this->load->view('inc-footer', $data);
    }

    public function export_register($project_id = '') {
        // create file name
        $pathName = dirname($_SERVER["SCRIPT_FILENAME"]) . '/../uploads/export/';
        $fileName = 'report-register-' . time() . '.xlsx';

        // load excel library
        $this->load->library('Excel');

        /* json data for datatables */
        $dataList = $this->models->get_itemlist_register('created_at', 'desc', $project_id);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        // set Header
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 1, 'ชื่อจริง');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 1, 'สกุล');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 1, 'เบอร์โทรศัพท์');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, 1, 'อีเมล์');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, 1, 'งบประมาณ');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, 1, 'อีเมล์');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, 1, 'วันที่ลงทะเบียน');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, 1, 'Utm source');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8, 1, 'Utm medium');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9, 1, 'Utm campaign');

        // set Row
        $no = 1;
        $rowCount = 2;

        /* autosize */
        $objPHPExcel->getActiveSheet()
                ->getColumnDimension('A')
                ->setAutoSize(true);
        foreach (range('C', 'K') as $columnID) {
            $objPHPExcel->getActiveSheet()
                    ->getColumnDimension($columnID)
                    ->setAutoSize(true);
        }

        /* loop data */
        foreach ($dataList as $element) {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $rowCount, $element['name']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $rowCount, $element['lastname']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $rowCount, $element['tel']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $rowCount, $element['email']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $rowCount, $element['budget_name']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $rowCount, $element['email']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $rowCount, date('d/m/Y', strtotime($element['created_at'])));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, $rowCount, $element['utm_source']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8, $rowCount, $element['utm_medium']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9, $rowCount, $element['utm_campaign']);
            $rowCount++;
            $no++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save($pathName . $fileName);

        // download file
        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName);
        header('Cache-Control: max-age=0');

        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');
        readfile($pathName . $fileName);
        unlink($pathName . $fileName);
    }

    public function delete($id = 0) {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->models->delete($id);
        redirect(base_url($this->router->class));
    }

    public function budget_delete($id = 0, $sub_id = 0) {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->models->buddelete($sub_id);
        redirect(base_url($this->router->class . '/budgets/' . $id));
    }

    public function media_delete($id = 0, $sub_id = 0) {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->models->delete_media($sub_id);
        redirect(base_url($this->router->class . '/gallery/' . $id));
    }

    public function progress_media_delete($id = 0, $sub_id = 0) {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->models->delete_media_progress($sub_id);
        redirect(base_url($this->router->class . '/progress/' . $id));
    }

    public function register_delete($id = 0) {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->models->delete_re($id);
        redirect(base_url($this->router->class));
    }

    public function floorplan_delete($id = 0, $sub_id = 0) {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->models->delete_floorplan($sub_id);
        redirect(base_url($this->router->class . '/floorplan/' . $id));
    }

    public function deleteimage_map() {
        $id = $this->input->post('id');

        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        if ($this->models->delete_mapimg($id)):
            $resp['code'] = 0;
        else:
            $resp['code'] = 1;
        endif;

        echo json_encode($resp);
    }

    public function submit() {
        # Get Post data
        /* Project Name */
        //$pstate = $this->input->post('pstate');
        $name_en = $this->input->post('name_en');
        $name_th = $this->input->post('name_th');
//        $p_color = $this->input->post('p_color');
//        $p_color_f = $this->input->post('p_color_f');
//        $s_color = $this->input->post('s_color');
//        $s_color_f = $this->input->post('s_color_f');
//        $vs_color_f = $this->input->post('vs_color_f');
//        $icon_tone = $this->input->post('icon_tone');
        $det_en = $this->input->post('det_en');
        $det_th = $this->input->post('det_th');
        $info_characteristics_en = $this->input->post('info_characteristics_en');
        $info_characteristics_th = $this->input->post('info_characteristics_th');
        $info_area_en = $this->input->post('info_area_en');
        $info_area_th = $this->input->post('info_area_th');

        $info_location_en = $this->input->post('info_location_en');
        $info_location_th = $this->input->post('info_location_th');
        $latitude = $this->input->post('lat');
        $longitude = $this->input->post('lng');

        $header_code = $this->input->post('header_code');
        $thank_code = $this->input->post('thank_code');
        $footer_code = $this->input->post('footer_code');

        /* SEO */
        $title_en = $this->input->post('title_en');
        $title_th = $this->input->post('title_th');
        $description_en = $this->input->post('description_en');
        $description_th = $this->input->post('description_th');
        $url_en = $this->input->post('url_en');
        $url_th = $this->input->post('url_th');
        $keyword_en = $this->input->post('keyword_en');
        $keyword_th = $this->input->post('keyword_th');
        $info_facility_en = $this->input->post('info_facility_en');
        $info_facility_th = $this->input->post('info_facility_th');
        $map_code = $this->input->post('map_code');

        /*
          $slogan_position = $this->input->post('slogan_position');
          $slogan_title_en = $this->input->post('slogan_title_en');
          $slogan_title_th = $this->input->post('slogan_title_th');
          $slogan_en = $this->input->post('slogan_en');
          $slogan_th = $this->input->post('slogan_th');
          $location_en = $this->input->post('location_en');
          $location_th = $this->input->post('location_th');
          $space_en = $this->input->post('space_en');
          $space_th = $this->input->post('space_th');
          $vision_en = $this->input->post('vision_en');
          $vision_th = $this->input->post('vision_th');
          $detail_en = $this->input->post('detail_en');
          $detail_th = $this->input->post('detail_th');

          $info_bts_en = $this->input->post('info_bts_en');
          $info_bts_th = $this->input->post('info_bts_th');
          $info_highway_en = $this->input->post('info_highway_en');
          $info_highway_th = $this->input->post('info_highway_th');
          $info_promise_en = $this->input->post('info_promise_en');
          $info_promise_th = $this->input->post('info_promise_th');
          $info_register_en = $this->input->post('info_register_en');
          $info_register_th = $this->input->post('info_register_th');


          $info_type_en = $this->input->post('info_type_en');
          $info_type_th = $this->input->post('info_type_th');
          $info_designer_en = $this->input->post('info_designer_en');
          $info_designer_th = $this->input->post('info_designer_th');


          $slogan_active_en = $this->input->post('slogan_active_en');
          $slogan_active_th = $this->input->post('slogan_active_th');
          $info_active_en = $this->input->post('info_active_en');
          $info_active_th = $this->input->post('info_active_th');


          $floorplan_active = $this->input->post('floorplan_active');
          $roomplan_active = $this->input->post('roomplan_active');


          $c360_iframe = $this->input->post('360_iframe');
          $c360_active = $this->input->post('360_active');
         */
        $gallery_active = $this->input->post('gallery_active');
        $video_active = $this->input->post('video_active');
        $progress_active = $this->input->post('progress_active');

        //$struc_pc = $this->input->post('struc_pc');
        // $desi_pc = $this->input->post('desi_pc');
        // $system_pc = $this->input->post('system_pc');

        $total_pc = $this->input->post('total_pc');
        $update_date = $this->input->post('update_date');

        $file_link = $this->input->post('file_link');

        $mode = $this->input->post('mode');
        $postact = $this->input->post('postact');
        $active = $this->input->post('active');
        $home_active = $this->input->post('home_active');

        $edit_id = $this->input->post('edit_id');
        /*        $smart_active = $this->input->post('smart_active');

          $other_active = $this->input->post('other_active');
          $soldout = $this->input->post('soldout');


          $budget_name_en = $this->input->post('budget_name_en');
          $budget_name_th = $this->input->post('budget_name_th');

          $booking_active = $this->input->post('booking_active');
          $booking_link = $this->input->post('booking_link');

         */

        # Default method
        $resp['text'] = $this->resp->show('default', 0);

        switch ($postact) {
            case 'project_add':
                # Add mode
                if ($mode == 'add'):
                    $this->mainm->check_can_permission($this->router->class, 'add');
                    if ($name_th == ""):
                        $resp['code'] = 1;
                        $resp['text'] = $this->resp->show('default', 2);
                    else:
                        # Make array db
                        $getLastSeq = $this->mains->getSeq('projects', 'Sequence', array());
                        $insDB = array(
                            'Sequence' => (int) ($getLastSeq['Sequence'] + 1),
                            'name_en' => $name_en,
                            'name_th' => $name_th,
                            'info_location_en' => $info_location_en,
                            'info_location_th' => $info_location_th,
                            'info_area_en' => $info_area_en,
                            'info_area_th' => $info_area_th,
                            'info_characteristics_en' => $info_characteristics_en,
                            'info_characteristics_th' => $info_characteristics_th,
                            'info_facility_en' => $info_facility_en,
                            'info_facility_th' => $info_facility_th,
                            //'pstate' => $pstate,
                            //'p_color' => $p_color,
                            //'p_color_f' => $p_color_f,
//                            's_color' => $s_color,
//                            's_color_f' => $s_color_f,
//                            'icon_tone' => $icon_tone,
                            'det_en' => $det_en,
                            'det_th' => $det_th,
                            'lat' => $latitude,
                            'lng' => $longitude,
                            'map_code' => $map_code,
//                            'header_code' => $header_code,
//                            'thank_code' => $thank_code,
//                            'footer_code' => $footer_code,
                            'active' => ($active == 1 ? 1 : 0),
                            'home_active' => ($home_active == 1 ? 1 : 0),
                            'updated_id' => $this->session->scu_id,
                            'created_at' => $this->get_now(),
                            'updated_at' => $this->get_now(),
                        );

                        $this->db->insert('projects', $insDB);
                        $insert_id = $this->db->insert_id();

                        # upload image
                        $up_picture = $this->crop_upload('Image', '/../uploads/projects');
                        if (isset($up_picture['name'])):
                            $updateImg['image'] = ($up_picture['name'] == '') ? '' : $up_picture['name'];
                            $this->db->where('id', $insert_id);
                            $this->db->update('projects', $updateImg);
                        endif;

                        $up_picture_mob = $this->crop_upload('Image_mob', '/../uploads/projects');
                        if (isset($up_picture_mob['name'])):
                            $updateImgm['image_mob'] = ($up_picture_mob['name'] == '') ? '' : $up_picture_mob['name'];
                            $this->db->where('id', $insert_id);
                            $this->db->update('projects', $updateImgm);
                        endif;

                        $up_picture6 = $this->crop_upload('map_image', '/../uploads/projects');
                        if (isset($up_picture6['name'])):
                            $updateImgMap['map_image'] = ($up_picture6['name'] == '') ? '' : $up_picture6['name'];
                            $this->db->where('id', $insert_id);
                            $this->db->update('projects', $updateImgMap);
                        endif;

                        $resp['code'] = 0;
                        $resp['text'] = $this->resp->show('default', 3);

                    endif;
                endif;

                # Add mode
                if ($mode == 'edit'):
                    $this->mainm->check_can_permission($this->router->class, 'edit');
                    if ($name_th == ""):
                        $resp['code'] = 1;
                        $resp['text'] = $this->resp->show('default', 2);
                    else:
                        # Make array db
                        $insDB = array(
                            'name_en' => $name_en,
                            'name_th' => $name_th,
                            'info_location_en' => $info_location_en,
                            'info_location_th' => $info_location_th,
                            'info_area_en' => $info_area_en,
                            'info_area_th' => $info_area_th,
                            'info_characteristics_en' => $info_characteristics_en,
                            'info_characteristics_th' => $info_characteristics_th,
                            'info_facility_en' => $info_facility_en,
                            'info_facility_th' => $info_facility_th,
                            //'pstate' => $pstate,
                            //'p_color' => $p_color,
                            //'p_color_f' => $p_color_f,
//                            's_color' => $s_color,
//                            's_color_f' => $s_color_f,
//                            'icon_tone' => $icon_tone,
                            'det_en' => $det_en,
                            'det_th' => $det_th,
                            'lat' => $latitude,
                            'lng' => $longitude,
                            'map_code' => $map_code,
//                            'header_code' => $header_code,
//                            'thank_code' => $thank_code,
//                            'footer_code' => $footer_code,
                            'active' => ($active == 1 ? 1 : 0),
                            'home_active' => ($home_active == 1 ? 1 : 0),
                            'updated_id' => $this->session->scu_id,
                            'updated_at' => $this->get_now(),
                        );

                        $this->db->where('id', $edit_id);
                        $this->db->update('projects', $insDB);

                        # upload image
                        $up_picture = $this->crop_upload('Image', '/../uploads/projects');
                        if (isset($up_picture['name'])):
                            $updateImg['image'] = ($up_picture['name'] == '') ? '' : $up_picture['name'];
                            $this->db->where('id', $edit_id);
                            $this->db->update('projects', $updateImg);
                        endif;

                        $up_picture_mob = $this->crop_upload('Image_mob', '/../uploads/projects');
                        if (isset($up_picture_mob['name'])):
                            $updateImgm['image_mob'] = ($up_picture_mob['name'] == '') ? '' : $up_picture_mob['name'];
                            $this->db->where('id', $edit_id);
                            $this->db->update('projects', $updateImgm);
                        endif;

                        $up_picture6 = $this->crop_upload('map_image', '/../uploads/projects');
                        if (isset($up_picture6['name'])):
                            $updateImgMap['map_image'] = ($up_picture6['name'] == '') ? '' : $up_picture6['name'];
                            $this->db->where('id', $edit_id);
                            $this->db->update('projects', $updateImgMap);
                        endif;

                        $resp['code'] = 0;
                        $resp['text'] = $this->resp->show('default', 1);

                    endif;

                endif;
                break;

            case 'project_info':

                if ($mode == 'edit'):
                    $this->mainm->check_can_permission($this->router->class, 'edit');
                    # Make array db
                    $insDB = array(
                        'slogan_title_en' => $slogan_title_en,
                        'slogan_title_th' => $slogan_title_th,
                        'slogan_en' => $slogan_en,
                        'slogan_th' => $slogan_th,
                        'vs_color_f' => $vs_color_f,
                        'location_en' => $location_en,
                        'location_th' => $location_th,
                        'space_en' => $space_en,
                        'space_th' => $space_th,
                        'vision_en' => $vision_en,
                        'vision_th' => $vision_th,
                        'detail_en' => $detail_en,
                        'detail_th' => $detail_th,
                        'info_location_en' => $info_location_en,
                        'info_location_th' => $info_location_th,
                        'info_bts_en' => $info_bts_en,
                        'info_bts_th' => $info_bts_th,
                        'info_highway_en' => $info_highway_en,
                        'info_highway_th' => $info_highway_th,
                        'info_promise_en' => $info_promise_en,
                        'info_promise_th' => $info_promise_th,
                        'info_register_en' => $info_register_en,
                        'info_register_th' => $info_register_th,
                        'info_area_en' => $info_area_en,
                        'info_area_th' => $info_area_th,
                        'info_characteristics_en' => $info_characteristics_en,
                        'info_characteristics_th' => $info_characteristics_th,
                        'info_type_en' => $info_type_en,
                        'info_type_th' => $info_type_th,
                        'info_designer_en' => $info_designer_en,
                        'info_designer_th' => $info_designer_th,
                        'info_facility_en' => $info_facility_en,
                        'info_facility_th' => $info_facility_th,
                        'slogan_position' => $slogan_position,
                        'slogan_active_en' => ($slogan_active_en == 1 ? 1 : 0),
                        'slogan_active_th' => ($slogan_active_th == 1 ? 1 : 0),
                        'info_active_en' => ($info_active_en == 1 ? 1 : 0),
                        'info_active_th' => ($info_active_th == 1 ? 1 : 0),
                        'active_info' => ($active == 1 ? 1 : 0),
                        '360_iframe' => $c360_iframe,
                        '360_active' => ($c360_active == 1 ? 1 : 0),
                        'updated_id' => $this->session->scu_id,
                        'updated_at' => $this->get_now(),
                    );

                    # upload image
                    $up_picture = $this->crop_upload('project_image', '/../uploads/projects');
                    if (isset($up_picture['name'])):
                        $insDB['project_image'] = ($up_picture['name'] == '') ? '' : $up_picture['name'];
                    endif;

                    $up_picture2 = $this->crop_upload('slogan_image', '/../uploads/projects');
                    if (isset($up_picture2['name'])):
                        $insDB['slogan_image'] = ($up_picture2['name'] == '') ? '' : $up_picture2['name'];
                    endif;

                    $up_picture5 = $this->crop_upload('project_image_mob', '/../uploads/projects');
                    if (isset($up_picture5['name'])):
                        $insDB['project_image_mob'] = ($up_picture5['name'] == '') ? '' : $up_picture5['name'];
                    endif;

                    $up_picture3 = $this->crop_upload('info_image', '/../uploads/projects');
                    if (isset($up_picture3['name'])):
                        $insDB['info_image'] = ($up_picture3['name'] == '') ? '' : $up_picture3['name'];
                    endif;

                    $up_picture4 = $this->crop_upload('logo_image', '/../uploads/projects');
                    if (isset($up_picture4['name'])):
                        $insDB['logo_image'] = ($up_picture4['name'] == '') ? '' : $up_picture4['name'];
                    endif;

                    $up_picture6 = $this->crop_upload('map_image', '/../uploads/projects');
                    if (isset($up_picture6['name'])):
                        $insDB['map_image'] = ($up_picture6['name'] == '') ? '' : $up_picture6['name'];
                    endif;

                    $this->db->where('id', $edit_id);
                    $this->db->update('projects', $insDB);

                    $resp['code'] = 0;
                    $resp['text'] = $this->resp->show('default', 1);

                endif;
                break;

            case 'project_progress':
                if ($mode == 'edit'):
                    $this->mainm->check_can_permission($this->router->class, 'edit');
//                    if ($struc_pc == "" || $desi_pc == "" || $system_pc == "" || $total_pc == ""
//                    ):
//                        $resp['code'] = 1;
//                        $resp['text'] = $this->resp->show('default', 2);
//                    else:
                    # Make array db
                    $updateSet = array(
                        'progress_active' => ($progress_active == 1 ? 1 : 0),
                        'updated_id' => $this->session->scu_id,
                        'updated_at' => $this->get_now(),
                    );
                    $this->db->where('id', $edit_id);
                    $this->db->update('projects', $updateSet);

                    # Make array db
                    $insDB = array(
                        'project_id' => $edit_id,
                        //'struc_pc' => $struc_pc,
                        //'desi_pc' => $desi_pc,
                        //'system_pc' => $system_pc,
                        'total_pc' => $total_pc,
                        'update_date' => $update_date,
                        'updated_id' => $this->session->scu_id,
                        'updated_at' => $this->get_now(),
                    );

                    $error_count = 0;
                    $error_msg = '';
                    foreach ($_FILES['image_file']['name'] as $key => $row) {
                        if (isset($_FILES['image_file']['name'][$key])):

                            $_FILES['image_file_thumb']['name'] = $_FILES['image_file']['name'][$key];
                            $_FILES['image_file_thumb']['type'] = $_FILES['image_file']['type'][$key];
                            $_FILES['image_file_thumb']['tmp_name'] = $_FILES['image_file']['tmp_name'][$key];
                            $_FILES['image_file_thumb']['error'] = $_FILES['image_file']['error'][$key];
                            $_FILES['image_file_thumb']['size'] = $_FILES['image_file']['size'][$key];

                            $upload_img = $this->uploads('image_file_thumb', '/uploads/progress', 409800, 0, 0, false, 'gif|jpg|png|jpeg');
                            $update_status = $upload_img['upload_code'];
                            $upload_data = $upload_img['upload_data'];
                            if ($update_status == 0):
                                $getLastSeq = $this->mains->getSeq('projects_progress_img', 'Sequence', array());
                                $update_data = [
                                    'Sequence' => (int) ($getLastSeq['Sequence'] + 1),
                                    'project_id' => $edit_id,
                                    'file_name' => $_FILES['image_file_thumb']['name'],
                                    'file_path' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name'],
                                    'updated_id' => $this->session->scu_id,
                                    'created_at' => $this->get_now(),
                                    'updated_at' => $this->get_now(),
                                ];
                                $this->db->insert('projects_progress_img', $update_data);
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

                        if ($this->mains->sumdataRepeat('projects_progress', array('project_id' => $edit_id))) {
                            $this->db->where('project_id', $edit_id);
                            $this->db->update('projects_progress', $insDB);
                        } else {
                            $insDB['created_at'] = $this->get_now();
                            $this->db->insert('projects_progress', $insDB);
                        }

                        $work_th = $this->input->post('work_th');
                        $this->db->delete('projects_progress_work', array('project_id' => $edit_id));
                        if (is_array($work_th)):
                            foreach ($work_th as $key => $val):
                                $work_th = $this->input->post('work_th[' . $key . ']');
                                if ($work_th != ""):
                                    $insDB2 = array(
                                        'project_id' => $edit_id,
                                        'work_th' => $work_th,
                                        'work_en' => $this->input->post('work_en[' . $key . ']'),
                                        'work_pc' => $this->input->post('work_pc[' . $key . ']'),
                                        'updated_id' => $this->session->scu_id,
                                        'created_at' => $this->get_now(),
                                        'updated_at' => $this->get_now()
                                    );
                                    $this->db->insert('projects_progress_work', $insDB2);
                                endif;
                            endforeach;
                        endif;

                        $resp['code'] = 0;
                        $resp['text'] = $this->resp->show('default', 1);
                    }

                //endif;

                endif;
                break;

            case 'project_seo':
                if ($mode == 'edit'):
                    $this->mainm->check_can_permission($this->router->class, 'edit');
                    if ($title_th == ""):
                        $resp['code'] = 1;
                        $resp['text'] = $this->resp->show('default', 2);
                    else:
                        # Make array db
                        $insDB = array(
                            'project_id' => $edit_id,
                            'title_en' => $title_en,
                            'title_th' => $title_th,
                            'description_en' => $description_en,
                            'description_th' => $description_th,
                            'url_en' => $url_en,
                            'url_th' => $url_th,
                            'keyword_en' => $keyword_en,
                            'keyword_th' => $keyword_th,
                            'active' => 1,
                            'updated_id' => $this->session->scu_id,
                            'updated_at' => $this->get_now(),
                        );

                        if ($this->mains->sumdataRepeat('projects_seo', array('project_id' => $edit_id))) {
                            $this->db->where('project_id', $edit_id);
                            $this->db->update('projects_seo', $insDB);
                        } else {
                            $insDB['created_at'] = $this->get_now();
                            $this->db->insert('projects_seo', $insDB);
                        }

                        $resp['code'] = 0;
                        $resp['text'] = $this->resp->show('default', 1);

                    endif;

                endif;
                break;

            case 'project_budget':
                if ($mode == 'edit'):
                    $this->mainm->check_can_permission($this->router->class, 'edit');
                    if ($budget_name_en == "" || $budget_name_th == ""
                    ):
                        $resp['code'] = 1;
                        $resp['text'] = $this->resp->show('default', 2);
                    else:
                        # Make array db
                        $insDB = array(
                            'project_id' => $edit_id,
                            'name_en' => $budget_name_en,
                            'name_th' => $budget_name_th,
                        );

                        $this->db->insert('projects_budget', $insDB);

                        $resp['code'] = 0;
                        $resp['text'] = $this->resp->show('default', 1);

                    endif;

                endif;
                break;

            case 'project_media':
                if ($mode == 'edit'):

                    # Make array db
                    $updateSet = array(
                        'gallery_active' => ($gallery_active == 1 ? 1 : 0),
                        'video_active' => ($video_active == 1 ? 1 : 0),
                        'updated_id' => $this->session->scu_id,
                        'updated_at' => $this->get_now(),
                    );
                    $this->db->where('id', $edit_id);
                    $this->db->update('projects', $updateSet);

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

                            $upload_img = $this->uploads('image_file_thumb', '/uploads/image_gallery', 409800, 0, 0, false, 'gif|jpg|png|jpeg');
                            $update_status = $upload_img['upload_code'];
                            $upload_data = $upload_img['upload_data'];
                            if ($update_status == 0):
                                $getLastSeq = $this->mains->getSeq('projects_media', 'Sequence', array());
                                $update_data = [
                                    'Sequence' => (int) ($getLastSeq['Sequence'] + 1),
                                    'project_id' => $edit_id,
                                    'media_type' => 0,
                                    'file_name' => $_FILES['image_file_thumb']['name'],
                                    'file_path' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name'],
                                    'updated_id' => $this->session->scu_id,
                                    'created_at' => $this->get_now(),
                                    'updated_at' => $this->get_now(),
                                ];
                                $this->db->insert('projects_media', $update_data);
                            else:
                                $error_count++;
                                $error_msg = $upload_data;
                            endif;
                        endif;
                    }

                    foreach ($_FILES['video_file']['name'] as $key => $row) {
                        if (isset($_FILES['video_file']['name'][$key])):

                            $_FILES['video_file_thumb']['name'] = $_FILES['video_file']['name'][$key];
                            $_FILES['video_file_thumb']['type'] = $_FILES['video_file']['type'][$key];
                            $_FILES['video_file_thumb']['tmp_name'] = $_FILES['video_file']['tmp_name'][$key];
                            $_FILES['video_file_thumb']['error'] = $_FILES['video_file']['error'][$key];
                            $_FILES['video_file_thumb']['size'] = $_FILES['video_file']['size'][$key];

                            $upload_img = $this->uploads('video_file_thumb', '/uploads/video_gallery', 409800, 0, 0, false, 'gif|jpg|png|jpeg');
                            $update_status = $upload_img['upload_code'];
                            $upload_data = $upload_img['upload_data'];
                            if ($update_status == 0):
                                $getLastSeq = $this->mains->getSeq('projects_media', 'Sequence', array());
                                $update_data = [
                                    'Sequence' => (int) ($getLastSeq['Sequence'] + 1),
                                    'project_id' => $edit_id,
                                    'media_type' => 1,
                                    'file_name' => $_FILES['video_file_thumb']['name'],
                                    'file_path' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name'],
                                    'file_link' => $file_link,
                                    'updated_id' => $this->session->scu_id,
                                    'created_at' => $this->get_now(),
                                    'updated_at' => $this->get_now(),
                                ];
                                $this->db->insert('projects_media', $update_data);
                            else:
                                $error_count++;
                                $error_msg = $upload_data;
                            endif;
                        endif;
                    }


                    $update_data = [
                        'media_type' => 1,
                        'name_en' => $this->input->post('name_en'),
                        'name_th' => $this->input->post('name_th'),
                        'detail_th' => $this->input->post('detail_th'),
                        'detail_en' => $this->input->post('detail_en'),
                        'updated_id' => $this->session->scu_id,
                        'updated_at' => $this->get_now(),
                    ];
                    if ($file_link != "") {
                        $update_data['file_link'] = $file_link;
                    }
                    if ($this->mains->sumdataRepeat('projects_media', array('project_id' => $edit_id, 'media_type' => 1))) {
                        $this->db->where('project_id', $edit_id)->where('media_type', 1);
                        $this->db->update('projects_media', $update_data);
                    } else {
                        $getLastSeq = $this->mains->getSeq('projects_media', 'Sequence', array());
                        $update_data['Sequence'] = (int) ($getLastSeq['Sequence'] + 1);
                        $update_data['project_id'] = $edit_id;
                        $update_data['created_at'] = $this->get_now();
                        $this->db->insert('projects_media', $update_data);
                    }
//                    if ($file_link != "") {
//                        $getLastSeq = $this->mains->getSeq('projects_media', 'Sequence', array());
//                        $update_data = [
//                            'Sequence' => (int) ($getLastSeq['Sequence'] + 1),
//                            'project_id' => $edit_id,
//                            'media_type' => 1,
//                            'file_name' => '',
//                            'file_path' => '',
//                            'file_link' => $file_link,
//                            'updated_id' => $this->session->scu_id,
//                            'created_at' => $this->get_now(),
//                            'updated_at' => $this->get_now(),
//                        ];
//                        $this->db->insert('projects_media', $update_data);
//                    }

                    if ($error_count > 0) {
                        $resp['code'] = 1;
                        $resp['text'] = $error_msg;
                    } else {
                        $resp['code'] = 0;
                        $resp['text'] = $this->resp->show('default', 1);
                    }

                endif;
                break;

            case 'floor_plan':
                if ($mode == 'edit'):

                    # Make array db
                    $updateSet = array(
                        'floorplan_active' => ($floorplan_active == 1 ? 1 : 0),
                        'updated_id' => $this->session->scu_id,
                        'updated_at' => $this->get_now(),
                    );
                    $this->db->where('id', $edit_id);
                    $this->db->update('projects', $updateSet);

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

                            /* extract filename */
                            $extract_name = explode('_', $_FILES['image_file']['name'][$key]);
                            /* get filename */
                            $set_name = explode('-', $extract_name[2]);

                            $upload_img = $this->uploads('image_file_thumb', '/uploads/floorplan', 409800, 0, 0, false, 'gif|jpg|png|jpeg');
                            $update_status = $upload_img['upload_code'];
                            $upload_data = $upload_img['upload_data'];
                            if ($update_status == 0):
                                if (count($set_name) > 0) {
                                    foreach (range($set_name[0], $set_name[1]) as $nrow) {
                                        $update_data = [
                                            'project_id' => $edit_id,
                                            'plan_type' => 0,
                                            'plan_name_en' => $extract_name[0] . ' ' . $extract_name[1] . ' ' . $nrow,
                                            'plan_name_th' => $extract_name[0] . ' ' . $extract_name[1] . ' ' . $nrow,
                                            'plan_floor_en' => $extract_name[0] . ' ' . $extract_name[1] . ' ' . $nrow,
                                            'plan_floor_th' => $extract_name[0] . ' ' . $extract_name[1] . ' ' . $nrow,
                                            'plan_image' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name'],
                                            'updated_id' => $this->session->scu_id,
                                            'created_at' => $this->get_now(),
                                            'updated_at' => $this->get_now(),
                                        ];
                                        $this->db->insert('projects_plan', $update_data);
                                    }
                                } else {
                                    $update_data = [
                                        'project_id' => $edit_id,
                                        'plan_type' => 0,
                                        'plan_name_en' => $_FILES['image_file_thumb']['name'],
                                        'plan_name_th' => $_FILES['image_file_thumb']['name'],
                                        'plan_floor_en' => $_FILES['image_file_thumb']['name'],
                                        'plan_floor_th' => $_FILES['image_file_thumb']['name'],
                                        'plan_image' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name'],
                                        'updated_id' => $this->session->scu_id,
                                        'created_at' => $this->get_now(),
                                        'updated_at' => $this->get_now(),
                                    ];
                                    $this->db->insert('projects_plan', $update_data);
                                }
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
                break;

            case 'room_plan':
                if ($mode == 'edit'):

                    # Make array db
                    $updateSet = array(
                        'roomplan_active' => ($roomplan_active == 1 ? 1 : 0),
                        'updated_id' => $this->session->scu_id,
                        'updated_at' => $this->get_now(),
                    );
                    $this->db->where('id', $edit_id);
                    $this->db->update('projects', $updateSet);

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

                            /* extract filename */
                            $extract_name = explode('_', $_FILES['image_file']['name'][$key]);
                            /* get filename */
                            $set_name = explode('-', $extract_name[2]);

                            $upload_img = $this->uploads('image_file_thumb', '/uploads/roomplan', 409800, 0, 0, false, 'gif|jpg|png|jpeg');
                            $update_status = $upload_img['upload_code'];
                            $upload_data = $upload_img['upload_data'];
                            if ($update_status == 0):
                                if (count($set_name) > 0) {
                                    foreach (range($set_name[0], $set_name[1]) as $nrow) {
                                        $update_data = [
                                            'project_id' => $edit_id,
                                            'plan_type' => 1,
                                            'plan_name_en' => $extract_name[0] . ' ' . $extract_name[1] . ' ' . $nrow,
                                            'plan_name_th' => $extract_name[0] . ' ' . $extract_name[1] . ' ' . $nrow,
                                            'plan_floor_en' => $extract_name[0] . ' ' . $extract_name[1] . ' ' . $nrow,
                                            'plan_floor_th' => $extract_name[0] . ' ' . $extract_name[1] . ' ' . $nrow,
                                            'plan_image' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name'],
                                            'updated_id' => $this->session->scu_id,
                                            'created_at' => $this->get_now(),
                                            'updated_at' => $this->get_now(),
                                        ];
                                        $this->db->insert('projects_plan', $update_data);
                                    }
                                } else {
                                    $update_data = [
                                        'project_id' => $edit_id,
                                        'plan_type' => 1,
                                        'plan_name_en' => $_FILES['image_file_thumb']['name'],
                                        'plan_name_th' => $_FILES['image_file_thumb']['name'],
                                        'plan_floor_en' => $_FILES['image_file_thumb']['name'],
                                        'plan_floor_th' => $_FILES['image_file_thumb']['name'],
                                        'plan_image' => ($upload_data['file_name'] == '') ? '' : $upload_data['file_name'],
                                        'updated_id' => $this->session->scu_id,
                                        'created_at' => $this->get_now(),
                                        'updated_at' => $this->get_now(),
                                    ];
                                    $this->db->insert('projects_plan', $update_data);
                                }
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
                break;

            default:
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 0);
                break;
        }


        echo json_encode($resp);
    }

    public function update_sq() {
        if (isset($_POST['data_set'])) {
            foreach ($_POST['data_set'] as $key => $row) {
                $this->db->where('id', $row['id']);
                $this->db->update('projects_media', array('Sequence' => (int) ($row['seq'] + 1)));
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

    public function send_notic() {
        echo "aaa";
    }

}
