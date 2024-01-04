<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends MY_Controller {

    var $model_name = 'Subscribe_model';
    var $page_title = "Subscriber";
    var $page_view = "subscribe";
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

        # Get Information Form (models)
        # Load view
        $this->load->view('inc-header', $data);
        $this->load->view($this->page_view . '/index', $data);
        $this->load->view('inc-footer', $data);
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 1, 'Email');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 1, 'Date');

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
