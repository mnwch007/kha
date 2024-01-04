<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

    var $module_config = array();

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->clear_cache();
    }

    function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

    public function crop_upload($upload, $folder = '/../uploads') {
        # Slim Upload
        $this->load->library('Slimcrop');
        $images = Slim::getImages($upload);

        # crop img
        foreach ($images as $image) {
            $files = array();
            // save output data if set
            if (isset($image['output']['data'])) {
                $name = $image['output']['name'];
                $data = $image['output']['data'];
                $data_information = Slim::saveFile($data, $name, dirname($_SERVER["SCRIPT_FILENAME"]) . $folder);
            }
        }
        return $data_information;
    }

    public function uploads($upload, $folder = '/uploads', $in_size = 1024, $in_width = 100, $in_height = 100, $img = false, $type = '', $encrypt = true) {
        /* Start Upload */
        $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]) . '/../' . $folder;
        if ($type):
            $config['allowed_types'] = $type;
        else:
            $config['allowed_types'] = 'gif|jpg|png|jpeg|mp4|mpg|doc|docx';
        endif;
        $config['max_size'] = $in_size;
        $config['encrypt_name'] = $encrypt;
        $config['overwrite'] = true;
        if ($img == true):
            $config['max_width'] = $in_width;
            $config['max_height'] = $in_height;
        endif;
        # load lib upload
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($upload)) :
            $data = array('upload_code' => 1, 'upload_data' => $this->upload->display_errors());
            return $data;
        else:
            $data = array('upload_code' => 0, 'upload_data' => $this->upload->data());
            return $data;
        endif;
    }

    public function get_now() {
        return date('Y-m-d H:i:s');
    }

}
