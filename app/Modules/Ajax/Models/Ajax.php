<?php

namespace App\Modules\Ajax\Models;

//use App\Models\MainModel as mainm;

class Ajax extends \App\Models\BaseModel {

    public function __construct() {
        parent::__construct();

        $this->word = filter_txt($this->request->getGet('term'));
    }

    public function convert_html($arr) {
        foreach ($arr as $key => $val):
            $arr[$key]['value'] = html_entity_decode($val['value'], ENT_QUOTES);
        endforeach;

        return $arr;
    }

    public function loadDataList($ListField, $table, $field, $where = '', $order = '') {
        $db = $this->db->table($table);
        $db->select($ListField);
        $db->where($field . ' LIKE "%' . $this->word . '%"');
        if (!empty($where)):
            $db->where($where);
        endif;
        if (!empty($order)):
            $db->orderBy($order);
        else:
            $db->orderBy($field, 'asc');
        endif;
        $query = $db->get();
        $arr = $query->getResultArray();
        return $this->convert_html($arr);
    }


}
