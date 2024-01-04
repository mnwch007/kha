<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Map_loca_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_itemlist($field = '', $order = 'desc') {
        $this->db->select('ml.*,mc.icon,mc.cat_name_en');
        $this->db->from('map_location as ml');
        $this->db->join('map_category as mc', 'mc.id = ml.cat_id', 'left');
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_category() {
        $this->db->select('*');
        $this->db->from('map_category');
        $this->db->where('active', 1);
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_itemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('map_location');
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
            $this->db->delete('map_location', array('id' => $id));
            return true;
        else:
            return false;
        endif;
    }

}
