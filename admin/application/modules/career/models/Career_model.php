<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Career_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_itemlist($field = '', $order = 'asc') {
        $this->db->select('*');
        $this->db->from('career');
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_itemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('career');
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function delete($id = '') {
        if ($id != ''):
            $this->db->delete('career', array('id' => $id));
            return true;
        else:
            return false;
        endif;
    }

}
