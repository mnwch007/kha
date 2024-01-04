<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pagebanner_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_itemlist($field = '', $order = 'desc') {
        $this->db->select('*');
        $this->db->from('banners_pages');
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_itemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('banners_pages');
            $this->db->where('banner_id', $id);
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function delete($id = '') {
        if ($id != ''):
            $this->db->delete('banners_pages', array('banner_id' => $id));
            return true;
        else:
            return false;
        endif;
    }

}
