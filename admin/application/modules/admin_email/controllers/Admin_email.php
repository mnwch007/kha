<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_email extends MY_Controller {

    public $model_name = 'Admin_email_model';
    public $page_title = "Email";
    public $page_view = "admin_email";
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
        $sort_type = ($_REQUEST['sort']['sort'] ? $_REQUEST['sort']['sort'] : 'desc');
        /* json data for datatables */
        $data = $this->models->get_itemlist_register($sort_field, $sort_type, $project_id);
        echo $this->mains->loadAjaxData($data);
    }

    public function loadRegister2($project_id = '') {
        /* set sort field */
        $sort_field = ($_REQUEST['sort']['field'] ? $_REQUEST['sort']['field'] : 'id');
        $sort_type = ($_REQUEST['sort']['sort'] ? $_REQUEST['sort']['sort'] : 'desc');
        /* json data for datatables */
        $data = $this->models->get_itemlist_register2($sort_field, $sort_type, $project_id);
        echo $this->mains->loadAjaxData($data);
    }

    public function loadRegister3($project_id = '') {
        /* set sort field */
        $sort_field = ($_REQUEST['sort']['field'] ? $_REQUEST['sort']['field'] : 'id');
        $sort_type = ($_REQUEST['sort']['sort'] ? $_REQUEST['sort']['sort'] : 'desc');
        /* json data for datatables */
        //$data = $this->models->get_itemlist_register2($sort_field, $sort_type, $project_id);
        $data = array();
        echo $this->mains->loadAjaxData($data);
    }

    public function loadRegister4($project_id = '') {
        /* set sort field */
        $sort_field = ($_REQUEST['sort']['field'] ? $_REQUEST['sort']['field'] : 'id');
        $sort_type = ($_REQUEST['sort']['sort'] ? $_REQUEST['sort']['sort'] : 'desc');
        /* json data for datatables */
        //$data = $this->models->get_itemlist_register2($sort_field, $sort_type, $project_id);
        $data = $this->models->get_itemlist_register4($sort_field, $sort_type);
        echo $this->mains->loadAjaxData($data);
    }

    public function loadRegister5($project_id = '') {
        /* set sort field */
        $sort_field = ($_REQUEST['sort']['field'] ? $_REQUEST['sort']['field'] : 'id');
        $sort_type = ($_REQUEST['sort']['sort'] ? $_REQUEST['sort']['sort'] : 'desc');
        /* json data for datatables */
        $data = $this->models->get_itemlist_register5($sort_field, $sort_type, $project_id);
        echo $this->mains->loadAjaxData($data);
    }

    public function land_detail($id) {
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
        $data['project_id'] = 2;
        $data['edit_id'] = 2;

        $data['arrayS'] = $this->models->get_reg2_itemtinfo($id);


        $this->load->view('inc-header2', $data);
        $this->load->view($this->page_view . '/land_detail', $data);
        $this->load->view('inc-footer', $data);
    }

    public function landsale_delete($id) {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->models->delete_landsale($id);
        redirect(base_url($this->router->class . '/register/2'));
    }

    public function delete_antic($id) {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->models->delete_antic($id);
        redirect(base_url($this->router->class . '/register/5'));
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
        $data['edit_id'] = $id;

        if ($id == 1):
            $page = 'register';
        elseif ($id == 2):
            $page = 'register2';
        elseif ($id == 4):
            $page = 'register4';
        elseif ($id == 5):
            $page = 'register5';
        else:
            $page = 'register3';
        endif;
        # Get Information Form (models)
        # Load view
        $this->load->view('inc-header', $data);
        $this->load->view($this->page_view . '/' . $page, $data);
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

    public function register_delete($id = 0) {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->models->delete_re($id);
        redirect(base_url($this->router->class));
    }

    public function payment_delete($id = 0) {
        $this->mainm->check_can_permission($this->router->class, 'delete');
        # Start delete
        $this->models->delete_payment($id);
        redirect(base_url($this->router->class));
    }

    public function submit() {
        # Get Post data
        $proj_email_1 = $this->input->post('proj_email_1');
        $proj_email_2 = $this->input->post('proj_email_2');
        $proj_email_3 = $this->input->post('proj_email_3');
        $proj_email_4 = $this->input->post('proj_email_4');
        $proj_email_5 = $this->input->post('proj_email_5');
        $proj_email_6 = $this->input->post('proj_email_6');
        $proj_email_7 = $this->input->post('proj_email_7');
        $proj_email_8 = $this->input->post('proj_email_8');
        $proj_email_9 = $this->input->post('proj_email_9');
        $proj_email_10 = $this->input->post('proj_email_10');

        $mode = $this->input->post('mode');
        $postact = $this->input->post('postact');
        $edit_id = $this->input->post('edit_id');

        # Default method
        $resp['text'] = $this->resp->show('default', 0);

        switch ($postact) {
            case 'email_add':
                $insDB = array(
                    'proj_email_1' => $proj_email_1,
                    'proj_email_2' => $proj_email_2,
                    'proj_email_3' => $proj_email_3,
                    'proj_email_4' => $proj_email_4,
                    'proj_email_5' => $proj_email_5,
                    'proj_email_6' => $proj_email_6,
                    'proj_email_7' => $proj_email_7,
                    'proj_email_8' => $proj_email_8,
                    'proj_email_9' => $proj_email_9,
                    'proj_email_10' => $proj_email_10,
                    'updated_id' => $this->session->scu_id,
                    'updated_at' => $this->get_now(),
                );

                $this->db->where('id', $edit_id);
                $this->db->update('admin_email', $insDB);
                $resp['code'] = 0;
                $resp['text'] = $this->resp->show('default', 1);
                break;
            default:
                $resp['code'] = 1;
                $resp['text'] = $this->resp->show('default', 0);
                break;
        }

        echo json_encode($resp);
    }

    public function send_notices() {
        $arr = $this->mainm->get_one('show_message', 'id>0');
        $mesg = $arr->detail;
        echo $mesg;
        // print_r($arr);
        //echo $arr['detail'];
    }

    public function export_register5() {
        // create file name
        $pathName = dirname($_SERVER["SCRIPT_FILENAME"]) . '/../uploads/export/';
        $fileName = 'anti-corruption-' . time() . '.xlsx';

        // load excel library
        $this->load->library('Excel');
        /* set sort field */
        $sort_field = ($_REQUEST['sort']['field'] ? $_REQUEST['sort']['field'] : 'id');
        $sort_type = ($_REQUEST['sort']['sort'] ? $_REQUEST['sort']['sort'] : 'desc');
        /* json data for datatables */
        $dataList = $this->models->get_itemlist_register5($sort_field, $sort_type);


        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        //ไม่ประสงค์เปิดเผยชื่อผู้กล่าวหาร้องเรียน
        // set Header
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 1, 'ชื่อ-นามสกุล ผู้ร้องเรียน');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 1, 'อีเมล์');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 1, 'เบอร์โทร');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, 1, 'ชื่อ-นามสกุล ผู้ถูกกล่าวหา/ถูกร้องเรียน');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, 1, 'ตำแหน่ง');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, 1, 'สังกัดหน่วยงาน');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, 1, 'เรื่องที่ร้องเรียน');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, 1, 'วันเวลาที่เกิดเหตุ');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8, 1, 'รายละเอียดพฤติการณ์');
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

            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $rowCount, ($element['chkComp'] == 1 ? '' : $element['req_name']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $rowCount, $element['email']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $rowCount, $element['tel']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $rowCount, $element['comp_name']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $rowCount, $element['comp_position']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $rowCount, $element['comp_org']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $rowCount, $element['topic']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, $rowCount, $element['comp_date']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8, $rowCount, $element['detail']);

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

}
