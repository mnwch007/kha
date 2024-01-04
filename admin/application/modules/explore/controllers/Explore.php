<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Explore extends MY_Controller {

    var $model_name = 'Explore_model';
    var $page_title = "Explore";
    var $page_view = "explore";
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
        (!$year) ? $year = date('Y'):'';
        $sort_field = ($_REQUEST['sort']['field'] ? $_REQUEST['sort']['field'] : 'id');
        $sort_type = ($_REQUEST['sort']['sort'] ? $_REQUEST['sort']['sort'] : 'asc');
        /* json data for datatables */
        $data = $this->models->get_itemlist($sort_field,$sort_type, $_POST);
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
        $data['info_data'] = $this->models->get_itemtinfo(1);

        # Get Information Form (models)
        # Load view
        $this->load->view('inc-header', $data);
        $this->load->view($this->page_view . '/edit', $data);
        $this->load->view('inc-footer', $data);
    }

    public function submit() {
        # Get Post data
        $active = $this->input->post('active');
        $position = $this->input->post('position');
        $title_en = $this->input->post('title_en');
        $sub_en = $this->input->post('sub_en');
        $detail_en = $this->input->post('detail_en');
        $title_th = $this->input->post('title_th');
        $sub_th = $this->input->post('sub_th');
        $detail_th = $this->input->post('detail_th');

        $btn_text_en = $this->input->post('btn_text_en');
        $btn_text_th = $this->input->post('btn_text_th');
        $btn_link = $this->input->post('btn_link');

        $mode = $this->input->post('mode');
        $edit_id = $this->input->post('edit_id');

        # Default method
        $resp['text'] = $this->resp->show('default', 0);
        

        # Add mode
        $this->mainm->check_can_permission($this->router->class, 'edit');
        if (
                $position == ""
        ):
            $resp['code'] = 1;
            $resp['text'] = $this->resp->show('default', 2);
        else:
            # Make array db
            $insDB = array(
                'title_en' => $title_en,
                'sub_en' => $sub_en,
                'detail_en' => $detail_en,
                'title_th' => $title_th,
                'sub_th' => $sub_th,
                'detail_th' => $detail_th,
                'btn_text_en' => $btn_text_en,
                'btn_text_th' => $btn_text_th,
                'btn_link' => $btn_link,
                'position' => $position,
                'active' => ($active ? 1:0),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $this->db->where('id', 1);
            $this->db->update('explore', $insDB);

            # Upload
            $up_picture = $this->crop_upload('image', '/../uploads/explore');
            if (isset($up_picture['name'])):
                $insDBM['image'] = ($up_picture['name'] == '') ? '' : $up_picture['name'];
                $this->db->where('id', 1);
                $this->db->update('explore', $insDBM);
            endif;

            $resp['code'] = 0;
            $resp['text'] = $this->resp->show('default', 1);

        endif;

        echo json_encode($resp);
    }

    public function export() {
        // create file name
        $pathName = dirname($_SERVER["SCRIPT_FILENAME"]) . '/../uploads/export/';
        $fileName = 'report-subscribe-'.time().'.xlsx';  

		// load excel library
        $this->load->library('Excel');
        /* set sort field */
        $sort_field = ($_REQUEST['sort']['field'] ? $_REQUEST['sort']['field'] : 'id');
        $sort_type = ($_REQUEST['sort']['sort'] ? $_REQUEST['sort']['sort'] : 'desc');
        /* json data for datatables */
        $dataList = $this->models->get_itemlist($sort_field, $sort_type, $_POST);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        // set Header
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 1, 'email');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 1, 'date');

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
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $rowCount, $element['Email']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $rowCount, $element['created_at']);
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
