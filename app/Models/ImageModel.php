<?php

namespace App\Models;
class ImageModel extends \App\Models\BaseModel {

    function __construct() {
        parent::__construct();
    }

    public function img_upload($path='') {
        $this->upload =new \CodeIgniter\Images\Image($path);
      
    }

}
