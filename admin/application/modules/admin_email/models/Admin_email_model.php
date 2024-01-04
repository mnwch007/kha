<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_email_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_itemlist($field = '', $order = 'desc') {
        $this->db->select('*');
        $this->db->from('admin_email');
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_itemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('admin_email');
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function get_itemlist_register($field = '', $order = 'desc', $project_id = '') {
        $this->db->select('*');
        $this->db->from('contacts_register');
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_itemlist_register2($field = '', $order = 'desc', $project_id = '') {
        $this->db->select('*,IF(personal=1,CONCAT(corp_name,"  (",corp_regisno,")"),CONCAT(firstname,"  ",lastname))BName,'
                . '(Select name_in_thai From provinces Where id=province)ProvName,'
                . '(Select name_in_thai From districts Where id=districts)DistName,'
                . '(Select name_in_thai From subdistricts Where id=subdistricts)SubDistName');
        $this->db->from('landofsales');
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_itemlist_register4($field = '', $order = 'desc') {
        $this->db->select('*');
        $this->db->from('payment_register');
        //$this->db->where('active',1);
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_itemlist_register5($field = '', $order = 'desc') {
        $this->db->select('*');
        $this->db->from('anti_corruption');
        //$this->db->where('active',1);
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_reg5_itemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('anti_corruption');
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function get_reg2_itemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*,IF(personal=1,CONCAT(corp_name,"  (",corp_regisno,")"),CONCAT(firstname,"  ",lastname))BName,'
                    . '(Select name_in_thai From provinces Where id=province)ProvName,'
                    . '(Select name_in_thai From districts Where id=districts)DistName,'
                    . '(Select name_in_thai From subdistricts Where id=subdistricts)SubDistName');
            $this->db->from('landofsales');
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function delete_re($id = '') {
        if ($id != ''):
            $this->db->delete('contacts_register', array('id' => $id));
            return true;
        else:
            return false;
        endif;
    }

    public function delete_landsale($id = '') {
        if ($id != ''):
            $data = $this->get_reg2_itemtinfo($id);
            if ($data) {
                @unlink(dirname($_SERVER["SCRIPT_FILENAME"]) . '/uploads/landofsales/' . $data['image']);
                $this->db->delete('landofsales', array('id' => $id));
            }
            return true;
        else:
            return false;
        endif;
    }

    public function delete_antic($id = '') {
        if ($id != ''):
            $data = $this->get_reg5_itemtinfo($id);
            if ($data) {
                @unlink(dirname($_SERVER["SCRIPT_FILENAME"]) . '/uploads/anti_corruption/' . $data['image']);
                $this->db->delete('anti_corruption', array('id' => $id));
            }
            return true;
        else:
            return false;
        endif;
    }

    public function get_projectname($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('admin_email');
            $this->db->where('id', $id);
            $query = $this->db->get();
            $row = $query->row_array();
            return $row['page_name_en'];
        } else {
            return null;
        }
    }

    public function delete_payment($id = '') {
        if ($id != ''):
            $this->db->delete('payment_register', array('id' => $id));
            return true;
        else:
            return false;
        endif;
    }

    public function get_provname($id = '') {
        $prov_name = "";
        if ($id > 0):
            $prov = $this->main->getrow('provinces', array('id' => $id), 'name_in_thai');
            $prov_name = $prov['name_in_thai'];
        endif;
        return $prov_name;
    }

    public function get_districts($id = '') {
        $dist_name = "";
        if ($id > 0):
            $dist = $this->main->getrow('districts', array('id' => $id), 'name_in_thai');
            $dist_name = $dist['name_in_thai'];
        endif;
        return $dist_name;
    }

    public function get_subdistricts($id = '') {
        $subdist_name = "";
        if ($id > 0):
            $dist = $this->main->getrow('subdistricts', array('id' => $id), 'name_in_thai');
            $subdist_name = $dist['name_in_thai'];
        endif;
        return $subdist_name;
    }

}
