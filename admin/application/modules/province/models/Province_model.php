<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Province_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_itemlist($field = '', $order = 'desc', $year) {
        $this->db->select('pv.*,
        pvy.id as prov_id,
        pvy.rice_status,
        pvy.corn_status,
        pvy.updated_at as updated_at,
        pvs.status_text as rice_text,
        pvs.status_color as rice_color,
        pvs2.status_text as corn_text,
        pvs2.status_color as corn_color,
        am.full_name as updated_name');
        $this->db->from('provinces as pv');
        $this->db->join('province_year_status as pvy', 'pvy.provinces_id = pv.id', 'left');
        $this->db->join('province_status as pvs', 'pvs.id = pvy.rice_status', 'left');
        $this->db->join('province_status as pvs2', 'pvs2.id = pvy.corn_status', 'left');
        $this->db->join('admin_users as am', 'am.user_id = pvy.updated_id', 'left');
        $this->db->where('year', $year);
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_itemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('province_year_status');
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
            $this->db->delete('department', array('department_id' => $id));
            return true;
        else:
            return false;
        endif;
    }

    public function get_datatable($table = '', $order = '',$sort = 'asc') {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order, $sort);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_datatablew($table = '', $where = '', $order = '',$sort = 'asc') {
        $this->db->select('*');
        $this->db->from($table);
        ($where) ? $this->db->where($where) : '';
        $this->db->order_by($order, $sort);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_usertable($table = '', $order = '',$sort = 'asc') {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order, $sort);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_usertable_byid($table = '', $key = '', $id = '', $order = '', $sort = 'asc') {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($key, $id);
        $this->db->order_by($order, $sort);
        $query = $this->db->get();
        return $query->result_array();
    }

}
