<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contacts_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_itemlist($field = '', $order = 'desc') {
        $this->db->select('contacts.*,admin_users.full_name as updated_name');
        $this->db->from('contacts');
        $this->db->join('admin_users', 'admin_users.user_id = contacts.updated_id', 'left');
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_itemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('contacts');
            $this->db->where('contact_id', $id);
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function delete($id = '') {
        if ($id != ''):
            $this->db->delete('contacts', array('contact_id' => $id));
            return true;
        else:
            return false;
        endif;
    }

}
