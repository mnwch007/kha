<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model {

    function __construct() {
        parent::__construct();

        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->uri = new \CodeIgniter\HTTP\URI(current_url(true));
        $this->request = \Config\Services::request();
        //$this->dateformat = new \App\Libraries\Dateformat;
    }

    public function now() {
        return date('Y-m-d H:i:s');
    }

    public function date_now() {
        return date('Y-m-d');
    }

    public function ip_address() {
        $request = \Config\Services::request();
        return $request->getIPAddress();
    }

    public function min_rec($field, $table, $where) {
        $db = $this->db->table($table);
        $db->select('MIN(' . $field . ') as total');
        $db->where($where);
        $query = $db->get();
        $arr = $query->getRowArray();
        $total = $arr['total'];
        return $total;
    }

    public function max_rec($field, $table, $where = '') {
        $db = $this->db->table($table);
        $db->select('MAX(' . $field . ') as total');
        if (!empty($where)):
            $db->where($where);
        endif;
        $query = $db->get();
        $arr = $query->getRowArray();
        $total = $arr['total'];
        return $total;
    }

    public function count_rec($field, $table, $where) {
        $query = $this->db->table($table)->select('COUNT(' . $field . ') as total')->where($where)->get();
        $arr = $query->getRowArray();
        $total = $arr['total'];
        return $total;
    }

    public function sum_rec($field, $table, $where) {
        $query = $this->db->table($table)->select('SUM(' . $field . ') as total')->where($where)->get();
        $arr = $query->getRowArray();
        $total = $arr['total'];
        return $total;
    }

    public function get_field($field, $table, $where = null, $orderby = null) {
        $db = $this->db->table($table);
        $db->select($field);
        if (!empty($where)):
            $db->where($where);
        endif;
        if (!empty($orderby)):
            $db->orderBy($orderby);
        endif;
        $query = $db->get();
        $arr = $query->getRowArray();
        $value = ($query->getNumRows() > 0) ? $arr[$field] : '';
        return $value;
    }

    public function get_field_one($field, $table, $where = null, $orderby = null) {
        $db = $this->db->table($table);
        $db->select($field);
        if (!empty($where)):
            $db->where($where);
        endif;
        if (!empty($orderby)):
            $db->orderBy($orderby);
        endif;
        $query = $db->get();
        $arr = $query->getResultArray();
        $arr = array();
        foreach ($result as $val):
            $arr[] = $val[$field];
        endforeach;

        return $arr;
    }

    public function get_field_arr($field, $table, $where = null, $orderby = null) {
        $db = $this->db->table($table);
        $db->select($field);
        if (!empty($where)):
            $db->where($where);
        endif;
        if (!empty($orderby)):
            $db->orderBy($orderby);
        endif;
        $query = $db->get();
        $arr = $query->getResultArray();
        return $arr;
    }

    public function get_field_arr1($field, $table, $where = null, $orderby = null) {
        $db = $this->db->table($table);
        $db->select($field);
        if (!empty($where)):
            $db->where($where);
        endif;
        if (!empty($orderby)):
            $db->orderBy($orderby);
        endif;
        $db->limit(1);

        $query = $db->get();
        $arr = $query->getRowArray();

        return $arr;
    }

    public function min_price($field) {
        $where = 'a.OnWebsite=1 AND a.Active=1';
        $db = $this->db->table('web_fabrice a');
        $db->join('product_item i', 'a.PCID=i.ID');
        $db->select('MIN(' . $field . ') as total');
        $db->where($where);
        $query = $db->get();
        $arr = $query->getRowArray();
        $total = $arr['total'];
        return $total;
    }

    public function max_price($field) {
        $where = 'a.OnWebsite=1 AND a.Active=1';
        $db = $this->db->table('web_fabrice a');
        $db->join('product_item i', 'a.PCID=i.ID');
        $db->select('MAX(' . $field . ') as total');
        $db->where($where);
        $query = $db->get();
        $arr = $query->getRowArray();
        $total = $arr['total'];
        return $total;
    }

}
