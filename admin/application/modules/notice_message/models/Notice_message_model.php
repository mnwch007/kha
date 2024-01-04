<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notice_message_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }


    public function get_itemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('show_message');
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->row_array();
        } else {
            return null;
        }
    }


}
