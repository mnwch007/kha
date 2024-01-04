<?php

namespace App\Models;

class MainModel extends \App\Models\BaseModel {

    private $_lang = NULL;
    var $can_access;
    var $can_add;
    var $can_edit;
    var $can_delete;

    function __construct() {
        parent::__construct();
        //$this->_lang = $this->session->lang;
    }

    public function count_itemlist($sql = null, $total = 0) {
        if (!empty($sql)):
            $query = $this->db->query($sql);
            $arr = $query->getRowArray();
            $total = $arr['total'];
        endif;
        return $total;
    }

    public function get_itemlist($sql = null, $start = null, $limit = null, $arr = array()) {
        if (!empty($sql)):
            if (!is_null($start) && !is_null($limit)):
                $sql .= ' LIMIT ' . $start . ',' . $limit;
            endif;
            $query = $this->db->query($sql);
            $arr = $query->getResultArray();
        endif;
        return $arr;
    }

    public function get_item_rec($sql = null, $arr = array()) {
        if (!empty($sql)):
            $query = $this->db->query($sql);
            $arr = $query->getRowArray();
        endif;
        return $arr;
    }

    public function getrepeat($table = '', $data = array()) {
        $db = $this->db->table($table);
        $db->select('*');
        if (!empty($data)):
            if (is_array($data)):
                foreach ($data as $key => $rows):
                    $db->where($key, $rows);
                endforeach;
            endif;
        endif;
        $query = $db->get();
        if ($query->getNumRows() > 0):
            return true;
        else:
            return false;
        endif;
    }

    function addsubsc($email = '') {
        if ($email != ""):
            $post_arr = ['Email' => $email, 'created_at' => date('Y-m-d H:i:s')];
            $db = $this->db->table('subscribers');
            $db->insert($post_arr);
        endif;
    }

    public function get_counties_list() {
        $db = $this->db->table('countries');
        $db->select('*');
        $db->orderBy('Name_en asc');
        $query = $db->get();
        $arr = single_arr('ID', 'Name_en', $query->getResultArray());
        return $arr;
    }

    public function get_province_list() {
//        $field = 'Name_' . $this->session->lang;
        $field = 'Name_th';
        $db = $this->db->table('province');
        $db->select('*, ' . $field . ' Name');
        $db->orderBy($field, 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();
        return $arr;
    }

    public function get_amphures_list($pvid = '') {
        $field = 'Name_th';
        $db = $this->db->table('amphures');
        $db->select('*, ' . $field . ' Name');
        if (!empty($pvid)):
            $db->where('ProvinceID', $pvid);
        endif;
        $db->orderBy('ProvinceID,' . $field, 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();
        return $arr;
    }

    public function get_districts_list($amid = '') {
//        $field = 'Name_' . $this->session->lang;
        $field = 'Name_th';
        $db = $this->db->table('districts');
        $db->select('*, ' . $field . ' Name');
        if (!empty($amid)):
            $db->where('AmphureID', $amid);
        endif;
        $db->orderBy('AmphureID,' . $field, 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();

        return $arr;
    }

    public function get_zipcodes_list($code = '') {
        $db = $this->db->table('zipcodes');
        $db->select('DistrictCode as ID, Zipcode as Name');
        if (!empty($code)):
            $db->where('DistrictCode', $code);
        endif;
        $db->orderBy('ID', 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();

        return $arr;
    }

    public function get_recommended_projects($lang = 'th') {
        $db = $this->db->table('projects as p');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            'p.id,p.gallery_active',
            '(p.name_' . $lang . ')Name',
            '(p.info_location_' . $lang . ')Location',
            '(p.info_characteristics_' . $lang . ')Characteristics',
            '(p.det_' . $lang . ')ShortDetail',
            '(s.title_' . $lang . ')SeoTitle',
            '(s.keyword_' . $lang . ')SeoKeyword',
            '(s.url_' . $lang . ')SeoURL',
            '(s.url_en)SeoURLEn,(s.url_th)SeoURLTh'
        ];
        $db->join('projects_seo as s', 'p.id=s.project_id', 'left');
        $db->select(implode(',', $f));
        $db->where('p.Active', 1);
        $db->where('p.home_active', 1);
        $db->orderBy('p.Sequence', 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();
        foreach ($arr as $key => $val):
            if ($val['gallery_active'] == 1):
                $arr[$key]['info_gallery'] = $this->get_field_arr('id,file_path', 'projects_media', 'media_type=0 AND project_id=' . $val['id']);
            else:
                $arr[$key]['info_gallery'] = [];
            endif;
        endforeach;

        return $arr;
    }

    public function get_projects_footer($lang = 'th') {
        $db = $this->db->table('projects as p');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            'p.id',
            '(p.name_' . $lang . ')Name',
            '(s.url_en)SeoURLEn,(s.url_th)SeoURLTh'
        ];
        $db->join('projects_seo as s', 'p.id=s.project_id', 'left');
        $db->select(implode(',', $f));
        $db->where('p.active', 1);
        $db->orderBy('p.Sequence', 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();

        return $arr;
    }

    public function get_projects($lang = 'th') {
        $db = $this->db->table('projects as p');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            'p.id,p.gallery_active',
            '(p.name_' . $lang . ')Name',
            '(p.info_location_' . $lang . ')Location',
            '(p.info_characteristics_' . $lang . ')Characteristics',
            '(p.det_' . $lang . ')ShortDetail',
            '(s.title_' . $lang . ')SeoTitle',
            '(s.keyword_' . $lang . ')SeoKeyword',
            '(s.url_' . $lang . ')SeoURL',
            '(s.url_en)SeoURLEn,(s.url_th)SeoURLTh'
        ];
        $db->join('projects_seo as s', 'p.id=s.project_id', 'left');
        $db->select(implode(',', $f));
        $db->where('p.active', 1);
        $db->orderBy('p.Sequence', 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();
        foreach ($arr as $key => $val):
            if ($val['gallery_active'] == 1):
                $arr[$key]['info_gallery'] = $this->get_field_arr('id,file_path', 'projects_media', 'media_type=0 AND project_id=' . $val['id']);
            else:
                $arr[$key]['info_gallery'] = [];
            endif;
        endforeach;

        return $arr;
    }

    public function get_projects_other($project_id = 0, $lang = 'th') {
        $db = $this->db->table('projects as p');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            'p.id,p.gallery_active',
            '(p.name_' . $lang . ')Name',
            '(p.info_location_' . $lang . ')Location',
            '(p.info_characteristics_' . $lang . ')Characteristics',
            '(p.det_' . $lang . ')ShortDetail',
            '(s.title_' . $lang . ')SeoTitle',
            '(s.keyword_' . $lang . ')SeoKeyword',
            '(s.url_' . $lang . ')SeoURL',
            '(s.url_en)SeoURLEn,(s.url_th)SeoURLTh',
            '(Select file_path From projects_media Where media_type=0 AND project_id=p.id Order by RAND() Limit 1)Image'
        ];
        $db->join('projects_seo as s', 'p.id=s.project_id', 'left');
        $db->select(implode(',', $f));
        $db->where('p.active', 1);
        $db->where('p.id !=', $project_id);
        $db->orderBy('p.Sequence', 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();
//        foreach ($arr as $key => $val):
//            if ($val['gallery_active'] == 1):
//                $arr[$key]['info_gallery'] = $this->get_field_arr('id,file_path', 'projects_media', 'project_id=' . $val['id']);
//            else:
//                $arr[$key]['info_gallery'] = [];
//            endif;
//        endforeach;

        return $arr;
    }

    public function get_projects_info($url = '', $lang = 'th') {
        $db = $this->db->table('projects as p');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            'p.id,p.gallery_active',
            '(p.name_' . $lang . ')Name',
            '(p.info_location_' . $lang . ')Location',
            '(p.info_area_' . $lang . ')Area',
            '(p.info_characteristics_' . $lang . ')Characteristics',
            '(p.det_' . $lang . ')ShortDetail',
            '(p.info_facility_' . $lang . ')Facility',
            '(s.title_' . $lang . ')SeoTitle',
            '(s.keyword_' . $lang . ')SeoKeyword',
            '(s.url_' . $lang . ')SeoURL',
            '(s.url_en)SeoURLEn,(s.url_th)SeoURLTh,image,image_mob,p.progress_active,p.gallery_active,p.video_active,p.map_image,p.lat,p.lng,p.map_code'
        ];
        $db->join('projects_seo as s', 'p.id=s.project_id', 'left');
        $db->select(implode(',', $f));
        if ($url != ''):
            $db->where('s.url_' . $lang, $url);
        endif;
        $db->where('p.active', 1);
        $db->orderBy('p.id', 'asc');
        $db->limit(1);
        $query = $db->get();
        $arr = $query->getRowArray();

        if ($arr['gallery_active'] == 1):
            $arr['info_gallery'] = $this->get_field_arr('id,file_path', 'projects_media', 'media_type=0 AND project_id=' . $arr['id']);
        else:
            $arr['info_gallery'] = [];
        endif;

        return $arr;
    }

    public function get_project_progress($project_id = 0, $lang = 'th') {
        $db = $this->db->table('projects_progress');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $db->select('*');
        $db->where('project_id', $project_id);
        $query = $db->get();
        $arr = $query->getRowArray();

        return $arr;
    }

    public function get_project_progress_work($project_id = 0, $lang = 'th') {
        $db = $this->db->table('projects_progress_work');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            'id',
            '(work_' . $lang . ')Name',
            'work_pc'
        ];

        $db->select(implode(',', $f));
        $db->where('project_id', $project_id);
        $db->orderBy('id', 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();

        return $arr;
    }

    public function get_project_media($project_id = 0, $lang = 'th') {
        $db = $this->db->table('projects_media');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            '*',
            '(name_' . $lang . ')Name',
            '(detail_' . $lang . ')Detail',
        ];

        $db->select(implode(',', $f));
        $db->where('media_type', 1);
        $db->where('project_id', $project_id);
        $query = $db->get();
        $arr = $query->getResultArray();
        return $arr;
    }

    public function get_progressimgitem($project_id = 0) {
        $db = $this->db->table('projects_progress_img');
        $db->select('*');
        $db->where('project_id', $project_id);
        $query = $db->get();
        $arr = $query->getResultArray();
        return $arr;
    }

    public function get_recommended_news($lang = 'th') {
        $db = $this->db->table('news');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            'id, date',
            '(title_' . $lang . ')Name',
            '(short_detail_' . $lang . ')ShortDetail',
            '(detail_' . $lang . ')Detail',
            '(url_' . $lang . ')SeoURL',
            '(url_en)SeoURLEn, (url_th)SeoURLTh',
            '(Select file_path From news_media Where news_id = news.id Order by RAND() Limit 1)Image'
        ];
        $db->select(implode(', ', $f));
        $db->where('Active', 1);
        //$db->where('p.home_active', 1);
        $db->orderBy('date desc,id desc');
        $db->limit(3);
        $query = $db->get();
        $arr = $query->getResultArray();
//        foreach ($arr as $key => $val):
//            $arr[$key]['info_gallery'] = $this->get_field_arr('id, file_path', 'projects_media', 'project_id = ' . $val['id']);
//        endforeach;
        return $arr;
    }

    public function get_news($lang = 'th') {
        $db = $this->db->table('news');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            'id, date',
            '(title_' . $lang . ')Name',
            '(short_detail_' . $lang . ')ShortDetail',
            '(detail_' . $lang . ')Detail',
            '(url_' . $lang . ')SeoURL',
            '(url_en)SeoURLEn, (url_th)SeoURLTh',
            '(Select file_path From news_media Where news_id = news.id Order by RAND() Limit 1)Image'
        ];
        $db->select(implode(', ', $f));
        $db->where('active', 1);
        //$db->where('p.home_active', 1);
        $db->orderBy('Sequence', 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();
//        foreach ($arr as $key => $val):
//            $arr[$key]['info_gallery'] = $this->get_field_arr('id, file_path', 'projects_media', 'project_id = ' . $val['id']);
//        endforeach;
        return $arr;
    }

    public function get_news_info($url = '', $lang = 'th') {
        $db = $this->db->table('news');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            'id, date',
            '(title_' . $lang . ')Name',
            '(short_detail_' . $lang . ')ShortDetail',
            '(detail_' . $lang . ')Detail',
            '(url_' . $lang . ')SeoURL',
            '(url_en)SeoURLEn, (url_th)SeoURLTh',
                //'(Select file_path From news_media Where news_id = news.id Order by RAND() Limit 1)Image'
        ];

        $db->select(implode(', ', $f));
        if ($url != ''):
            $db->where('url_' . $lang, $url);
        endif;
        $db->where('active', 1);
        $db->orderBy('id', 'asc');
        $db->limit(1);
        $query = $db->get();
        $arr = $query->getRowArray();
        if (is_array($arr)):
            $arr['info_gallery'] = $this->get_field_arr('id, file_path', 'news_media', 'news_id = ' . $arr['id']);
        endif;

        return $arr;
    }

    public function get_video($lang = 'th') {
        $db = $this->db->table('video_clip');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            'video_id',
            '(title_' . $lang . ')Name',
            '(short_detail_' . $lang . ')ShortDetail',
            'file_link'
        ];
        $db->select(implode(', ', $f));
        $db->where('active', 1);
        $db->orderBy('Sequence', 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();
        $query = $db->get();
        return $arr;
    }

    public function get_financial_type($lang = 'th') {
        $db = $this->db->table('financial_type');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            'id',
            '(type_name_' . $lang . ')Name',
            '(url_en)SeoURLEn, (url_th)SeoURLTh',
        ];
        $db->select(implode(', ', $f));
        //$db->where('active', 1);
        $db->orderBy('Sequence', 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();
        $query = $db->get();
        return $arr;
    }

    public function get_investor_type($lang = 'th') {
        $db = $this->db->table('investor_type');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            'id',
            '(type_name_' . $lang . ')Name',
            '(url_en)SeoURLEn, (url_th)SeoURLTh',
        ];
        $db->select(implode(', ', $f));
        //$db->where('active', 1);
        $db->orderBy('Sequence', 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();
        $query = $db->get();
        return $arr;
    }

    public function get_company_type($lang = 'th') {
        $db = $this->db->table('company_type');
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            'id',
            '(type_name_' . $lang . ')Name',
            '(url_en)SeoURLEn, (url_th)SeoURLTh',
        ];
        $db->select(implode(', ', $f));
        //$db->where('active', 1);
        $db->orderBy('Sequence', 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();
        return $arr;
    }

    public function get_content_pages($table = '', $lang = 'th') {
        $db = $this->db->table($table);
        $lang = ($lang == 'en') ? 'en' : 'th';
        $f = [
            '(detail_' . $lang . ')Detail'
        ];
        $db->select(implode(', ', $f));
        $db->where('id', 1);
        $db->limit(1);
        $query = $db->get();
        $arr = $query->getRowArray();

        $value = ($query->getNumRows() > 0) ? $arr['Detail'] : '';
        return $value;
    }

    public function get_web_category($active = '', $lang = 'th') {
        $db = $this->db->table('web_category');
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $f = [
            'ID',
            '(Name' . $lang . ')Name',
            '(Detail' . $lang . ')Detail',
            '(SeoTitle' . $lang . ')SeoTitle',
            '(SeoKeyword' . $lang . ')SeoKeyword',
            '(SeoURL' . $lang . ')SeoURL',
            'Photo1, Photo2, Photo3, Photo4',
            'FontColorTitle, FontColorDetail, BgColor'
        ];
        $db->select(implode(', ', $f));
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        $db->orderBy('Seq', 'asc');
        $query = $db->get();
        //$arr = single_arr('ID', 'Rack', $query->getResultArray());
        $arr = $query->getResultArray();
        return $arr;
    }

    public function get_web_fab_enduse_cate($active = '', $lang = 'th') {
        $db = $this->db->table('web_fab_enduse_cate');
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $f = [
            'ID',
            '(Name' . $lang . ')Name'
        ];
        $db->select(implode(', ', $f));
        if ($active != ''):
            $db->where('Active', $active);
        endif;

        $db->orderBy('ID', 'asc');
        $query = $db->get();
        //$arr = $query->getResultArray();
        $arr = single_arr('ID', 'Name', $query->getResultArray());
        return $arr;
    }

    public function get_web_fab_enduse($cateid = '', $active = '', $lang = 'th') {
        $db = $this->db->table('web_fab_enduse');
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $f = [
            'ID',
            'CateID',
            '(Name' . $lang . ')Name',
            '(Detail' . $lang . ')Detail',
            '(SeoTitle' . $lang . ')SeoTitle',
            '(SeoKeyword' . $lang . ')SeoKeyword',
            '(SeoURL' . $lang . ')SeoURL',
            'Photo1, Photo2, Photo3, Icon',
            'FontColorTitle, FontColorDetail, BgColor'
        ];
        $db->select(implode(', ', $f));
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        if ($cateid != ''):
            $db->where('CateID', $cateid);
        endif;

        $db->orderBy('CateID, Seq', 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();
        return $arr;
    }

    public function get_web_industrial($active = '', $lang = 'th') {
        $db = $this->db->table('web_industrial');
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $f = [
            'ID',
            '(Name' . $lang . ')Name',
            '(Detail' . $lang . ')Detail',
            '(SeoTitle' . $lang . ')SeoTitle',
            '(SeoKeyword' . $lang . ')SeoKeyword',
            '(SeoURL' . $lang . ')SeoURL',
            'Photo1, Photo2, Photo3, Photo4',
            'FontColorTitle, FontColorDetail, BgColor'
        ];
        $db->select(implode(', ', $f));
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        $db->orderBy('Seq', 'asc');
        $query = $db->get();
        //$arr = single_arr('ID', 'Rack', $query->getResultArray());
        $arr = $query->getResultArray();
        return $arr;
    }

    public function get_web_characters($active = '', $lang = 'th') {
        $db = $this->db->table('web_characters');
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $f = [
            'ID',
            '(Name' . $lang . ')Name',
            '(Detail' . $lang . ')Detail',
            '(SeoTitle' . $lang . ')SeoTitle',
            '(SeoKeyword' . $lang . ')SeoKeyword',
            '(SeoURL' . $lang . ')SeoURL',
            'Photo1, Photo2, Photo3, Photo4',
            'FontColorTitle, FontColorDetail, BgColor'
        ];
        $db->select(implode(', ', $f));
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        $db->orderBy('Seq', 'asc');
        $query = $db->get();
        //$arr = single_arr('ID', 'Rack', $query->getResultArray());
        $arr = $query->getResultArray();
        return $arr;
    }

    public function get_web_color($active = '', $lang = 'th') {
        $db = $this->db->table('web_color');
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $f = [
            'ID',
            '(Name' . $lang . ')Name',
            '(Detail' . $lang . ')Detail',
            '(SeoTitle' . $lang . ')SeoTitle',
            '(SeoKeyword' . $lang . ')SeoKeyword',
            '(SeoURL' . $lang . ')SeoURL',
            'Photo1, Photo2, Photo3, Photo4',
            'FontColorTitle, FontColorDetail, BgColor'
        ];
        $db->select(implode(', ', $f));
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        $db->orderBy('Seq', 'asc');
        $query = $db->get();
        //$arr = single_arr('ID', 'Rack', $query->getResultArray());
        $arr = $query->getResultArray();
        return $arr;
    }

    public function get_fabrics_color($active = '', $lang = 'th', $wheres = '') {
        $db = $this->db->table('web_addcolor as a');
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $f = [
            'a.ID, a.PCID, a.PID, b.WebCateID',
            '(a.WebName' . $lang . ')WebName',
            'a.WebPhotos'
        ];
        $db->join('web_fabrice as b', 'b.PCID = a.PCID', 'left');
        $db->select(implode(', ', $f));
        if ($active != ''):
            $db->where('a.Active', $active);
            $db->where('b.OnWebsite = 1 AND b.Active = 1');
        endif;
        if ($wheres != ''):
            $db->where($wheres);
        endif;

        //$db->orderBy('a.ID', 'asc');
        $db->orderBy('a.ID', 'RANDOM');
        $query = $db->get();
        $arr = $query->getResultArray();
        return $arr;
    }

    public function get_fabrics_info($url, $active = '', $lang = 'th') {
        $db = $this->db->table('web_fabrice as a');
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $f = [
            'a.ID, a.PCID',
            '(a.WebName' . $lang . ')WebName',
            '(a.ShortDes' . $lang . ')ShortDes',
            '(a.Detail' . $lang . ')Detail',
            '(a.SeoTitle' . $lang . ')SeoTitle',
            '(a.SeoKeyword' . $lang . ')SeoKeyword',
            '(a.SeoURL' . $lang . ')SeoURL',
            'a.ShortDesEn, a.ShortDesTh, a.WebNameEn, a.WebNameTh, a.SeoURLEn, a.SeoURLTh',
            'i.PCode, i.PDetail, i.SPrice, i.SPrice2, i.Unit, i.SPrice3, (SELECT Name FROM width WHERE ID = i.PWidth) PWidth, WebEndID'
        ];
        $db->join('product_item as i', 'a.PCID = i.ID', 'inner');
        $db->select(implode(', ', $f));
        if ($url != ''):
            $db->where('a.SeoURL' . $lang, $url);
        endif;

        if ($active != ''):
            $db->where('a.Active', $active);
        endif;
        $db->orderBy('a.ID', 'asc');
        $db->limit(1);
        $query = $db->get();
        //$arr = single_arr('ID', 'Rack', $query->getResultArray());
        $arr = $query->getRowArray();

        if ($arr['PCID'] > 0):
            $fcolor = [
                'a.ID, a.PCID, a.PID',
                '(a.WebName' . $lang . ')WebName',
                'a.WebPhotos'
            ];
            $arr['info_color'] = $this->get_field_arr(implode(', ', $fcolor), 'web_addcolor a', 'a.Active = 1 AND a.PCID = ' . $arr['PCID']);
        else:
            $arr['info_color'] = [];
        endif;

        return $arr;
    }

    public function get_bestsallers($lang = 'th') {
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $wheres = 'a.OnWebsite = 1 AND a.Active = 1';
        $f = [
            'a.*',
            'i.PCode, i.PDetail, i.SPrice, i.SPrice2, i.Unit, i.SPrice3, (SELECT Name FROM width WHERE ID = i.PWidth) PWidth'
        ];
        $db = $this->db->table('web_fabrice as a');
        $db->join('product_item as i', 'a.PCID = i.ID', 'inner');
        $db->select(implode(', ', $f));
        $db->where($wheres);
        $db->orderBy('a.ID', 'RANDOM');
        $db->limit(10);
        $query = $db->get();
        $arr = $query->getResultArray();

        $fcolor = [
            'a.ID, a.PCID, a.PID',
            '(a.WebName' . $lang . ')WebName',
            'a.WebPhotos'
        ];
        foreach ($arr as $key => $val):
            $arr[$key]['info_color'] = $this->get_field_arr(implode(', ', $fcolor), 'web_addcolor a', 'a.Active = 1 AND a.PCID = ' . $val['PCID'], 'RAND()');
        endforeach;
        return $arr;
    }

    public function get_fabrics_other($pcid = 0, $lang = 'th') {
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $wheres = 'a.OnWebsite = 1 AND a.Active = 1';
        if ($pcid > 0):
            $wheres .= ' AND a.PCID != ' . $pcid;
        endif;
        $f = [
            'a.*',
            'i.PCode, i.PDetail, i.SPrice, i.SPrice2, i.Unit, i.SPrice3, (SELECT Name FROM width WHERE ID = i.PWidth) PWidth'
        ];
        $db = $this->db->table('web_fabrice as a');
        $db->join('product_item as i', 'a.PCID = i.ID', 'inner');
        $db->select(implode(', ', $f));
        $db->where($wheres);
        $db->orderBy('a.ID', 'RANDOM');
        $db->limit(10);
        $query = $db->get();
        $arr = $query->getResultArray();

        $fcolor = [
            'a.ID, a.PCID, a.PID',
            '(a.WebName' . $lang . ')WebName',
            'a.WebPhotos'
        ];
        foreach ($arr as $key => $val):
            $arr[$key]['info_color'] = $this->get_field_arr(implode(', ', $fcolor), 'web_addcolor a', 'a.Active = 1 AND a.PCID = ' . $val['PCID'], 'RAND()');
        endforeach;
        return $arr;
    }

    public function get_testimo($lang = 'th') {
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $f = [
            'ID',
            '(Name' . $lang . ')Name',
            '(Date' . $lang . ')Date',
            '(Detail' . $lang . ')Detail'
        ];
        $db = $this->db->table('web_testimo');
        $db->select(implode(', ', $f));
        $db->where('Active', 1);
        $db->orderBy('ID', 'RANDOM');
        $db->limit(3);
        $query = $db->get();
        $arr = $query->getResultArray();

        return $arr;
    }

    public function get_blog_info($url, $active = '', $lang = 'th') {
        $db = $this->db->table('web_blog as a');
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $f = [
            'a.ID, a.BlogDate',
            '(a.Name' . $lang . ')Name',
            '(a.ShortDes' . $lang . ')ShortDes',
            '(a.Detail' . $lang . ')Detail',
            '(a.Tag' . $lang . ')Tag',
            '(a.SeoTitle' . $lang . ')SeoTitle',
            '(a.SeoKeyword' . $lang . ')SeoKeyword',
            '(a.SeoURL' . $lang . ')SeoURL',
            'a.SeoURLEn, a.SeoURLTh',
            'FontColorTitle, FontColorDetail, BgColor',
            '(Select BlogPhoto From web_blog_gallery Where BlogID = a.ID Order by Seq asc Limit 1)ImgBanner'
        ];
        $db->select(implode(', ', $f));
        if ($url != ''):
            $db->where('a.SeoURL' . $lang, $url);
        endif;
        if ($active != ''):
            $db->where('a.Active', $active);
        endif;
        $db->orderBy('a.ID', 'asc');
        $db->limit(1);
        $query = $db->get();
        $arr = $query->getRowArray();
        return $arr;
    }

    public function get_blog_other($blogid = 0, $lang = 'th') {
        $db = $this->db->table('web_blog as a');
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $f = [
            'a.ID, a.BlogDate',
            '(a.Name' . $lang . ')Name',
            '(a.ShortDes' . $lang . ')ShortDes',
            '(a.SeoURL' . $lang . ')SeoURL',
            'a.SeoURLEn, a.SeoURLTh',
            '(Select BlogPhoto From web_blog_gallery Where BlogID = a.ID Order by Seq asc Limit 1)ImgBanner'
        ];
        $db->select(implode(', ', $f));
        $db->where('a.Active', 1);
        if ($blogid > 0):
            $db->where('a.ID != ', $blogid);
        endif;

        $db->orderBy('ID', 'RANDOM');
        $db->limit(3);
        $query = $db->get();
        $arr = $query->getResultArray();
        return $arr;
    }

    public function get_bank_account_list($active = '') {
        $this->db->select('ID, CONCAT(AccNo, " ", (SELECT Name FROM bank WHERE ID = BankID)) Name');
        $this->db->from('bank_account');
        if (!empty($active)):
            $this->db->where('Active', $active);
        endif;
        $this->db->order_by('ID', 'asc');
        $query = $this->db->get();
        $arr = single_arr('ID', 'Name', $query->result_array());

        return $arr;
    }

    public function get_level_list($active = '', $type = 'single') {
        $db = $this->db->table('level');
        $db->select('*');
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        $db->orderBy('Name', 'asc');
        $query = $db->get();
        if ($type == 'single'):
            $arr = single_arr('ID', 'Name', $query->getResultArray());
        else:
            $arr = $query->getResultArray();
        endif;

        return $arr;
    }

    public function get_ptype_list($sttype = '', $active = '', $type = 'single') {
        $db = $this->db->table('ptype');
        $db->select('*');
        if ($sttype != ''):
            $db->where('StType', $sttype);
        endif;
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        $db->orderBy('Name', 'asc');
        $query = $db->get();
        if ($type == 'single'):
            $arr = single_arr('ID', 'Name', $query->getResultArray());
        else:
            $arr = $query->getResultArray();
        endif;

        return $arr;
    }

    public function get_pcode_list($sttype = '', $active = '', $type = 'single', $where = '') {
        $db = $this->db->table('product_item');
        $db->select('ID, PCode');
        if ($sttype != ''):
            $db->where('StType', $sttype);
        endif;
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        if ($where != ''):
            $db->where($where);
        endif;

        $db->orderBy('PCode', 'asc');
        $query = $db->get();
        if ($type == 'single'):
            $arr = single_arr('ID', 'PCode', $query->getResultArray());
        else:
            $arr = $query->getResultArray();
        endif;

        return $arr;
    }

    public function get_width_list($active = '', $type = 'single') {
        $db = $this->db->table('width');
        $db->select('*');
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        $db->orderBy('Name', 'asc');
        $query = $db->get();
        if ($type == 'single'):
            $arr = single_arr('ID', 'Name', $query->getResultArray());
        else:
            $arr = $query->getResultArray();
        endif;

        return $arr;
    }

    public function get_width_min($active = '') {
        $db = $this->db->table('width');
        $db->select('*');
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        $db->orderBy('MinQty', 'asc');
        $query = $db->get();
        $arr = single_arr('ID', 'MinQty', $query->getResultArray());
        return $arr;
    }

    public function get_ptype_price($active = '') {
        $db = $this->db->table('ptype');
        $db->select('ID, price1, price2, price3');
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        $db->orderBy('ID', 'asc');
        $query = $db->get();
        $arr = single_arr('ID', 'price1, price2, price3', $query->getResultArray());
        return $arr;
    }

    public function get_weight_list($active = '', $type = 'single') {
        $db = $this->db->table('weight');
        $db->select('*');
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        $db->orderBy('Name', 'asc');
        $query = $db->get();
        if ($type == 'single'):
            $arr = single_arr('ID', 'Name', $query->getResultArray());
        else:
            $arr = $query->getResultArray();
        endif;
        return $arr;
    }

    public function get_composition_list($active = '', $type = 'single') {
        $db = $this->db->table('composition');
        $db->select('*');
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        $db->orderBy('Name', 'asc');
        $query = $db->get();
        if ($type == 'single'):
            $arr = single_arr('ID', 'Name', $query->getResultArray());
        else:
            $arr = $query->getResultArray();
        endif;

        return $arr;
    }

    public function get_shade_list($ptype = 0, $active = '', $type = 'single') {
        $db = $this->db->table('pshade');
        $db->select('*');
        if ($ptype > 0):
            $db->where('PTypeID', $ptype);
        endif;
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        $db->orderBy('Name', 'asc');
        $query = $db->get();
        if ($type == 'single'):
            $arr = single_arr('ID', 'Name', $query->getResultArray());
        else:
            $arr = $query->getResultArray();
        endif;

        return $arr;
    }

    public function get_shade_item_list($pcid = 0, $active = '', $type = 'single') {
        $cond = array('PShade>' => 0, 'PCID' => $pcid);
        if ($active != ''):
            $cond['Active'] = $active;
        endif;
        $td = $this->db->select('Distinct(PShade) PShade')->from('product')->where($cond)->get_compiled_select();

        $this->db->select('a.*')->from('pshade a')->join('(' . $td . ') b', 'a.ID = b.PShade', 'inner');
        if ($active != ''):
            $this->db->where('a.Active', $active);
        endif;
        $this->db->order_by('a.Name', 'asc');
        $query = $this->db->get();
        if ($type == 'single'):
            $arr = single_arr('ID', 'Name', $query->result_array());
        else:
            $arr = $query->result_array();
        endif;
//        echo $this->db->last_query();
//        exit;
        return $arr;
    }

    public function get_delivery_address_list($cusid, $active = '', $type = 'single') {
        $this->db->select('ID, FName as Name');
        $this->db->from('delivery_address');
        if ($cusid != ''):
            $this->db->where('CusID', $cusid);
        endif;
        if ($active != ''):
            $this->db->where('Active', $active);
        endif;
        $this->db->order_by('Name', 'asc');
        $query = $this->db->get();
        if ($type == 'single'):
            $arr = single_arr('ID', 'Name', $query->result_array());
        else:
            $arr = $query->result_array();
        endif;

        return $arr;
    }

    public function get_salesperson_list($active = '', $type = 'single') {
        $db = $this->db->table('salesperson');
        $db->select('*');
        if ($active != ''):
            $db->where('Active', $active);
        endif;
        $db->orderBy('Name', 'asc');
        $query = $db->get();

        if ($type == 'single'):
            $arr = single_arr('ID', 'Name', $query->getResultArray());
        else:
            $arr = $query->getResultArray();
        endif;

        return $arr;
    }

    public function get_user_list($active = '') {
        $this->db->select('*');
        $this->db->from('admin_users');
        if ($active != ''):
            $this->db->where('Active', $active);
        endif;
        $this->db->order_by('Name', 'asc');
        $query = $this->db->get();
        $arr = single_arr('ID', 'Name', $query->result_array());

        return $arr;
    }

    public function get_permission_list() {
        $this->db->select('*');
        $this->db->from('permission');
        $this->db->where('Level', 1);
        $this->db->order_by('Name', 'asc');
        $query = $this->db->get();
        $arr = single_arr('ID', 'Name', $query->result_array());

        return $arr;
    }

    # advance -----------------------------------------------------

    public function get_pending_customer_blist() {
        $query1 = $this->db->select('DISTINCT(CusID) CusID')->from('billing_ar')->where('CusID>', 0)->where('LastBalance>', 0)->where_in('PmStatus', array(1, 2))->get_compiled_select();
        $query = $this->db->select("a.ID, a.BName as Name")->from('customer a')->join('(' . $query1 . ') b', 'a.ID = b.CusID', 'inner')->order_by('a.BName', 'asc')->get();
        $arr = $query->result_array();

        return $arr;
    }

    public function get_pending_customer_list() {
        $where = array('OutType' => 1, 'OutStatus' => 1, 'BLStatus' => 0, 'BLID' => 0, 'CusID>' => 0);
        $query1 = $this->db->select('DISTINCT(CusID) CusID')->from('stockout')->where($where)->get_compiled_select();
        $query = $this->db->select("a.ID, a.BName as Name")->from('customer a')->join('(' . $query1 . ') b', 'a.ID = b.CusID', 'inner')->order_by('a.BName', 'asc')->get();
        $arr = $query->result_array();

        return $arr;
    }

    public function get_pending_supplier_blist() {
        $query1 = $this->db->select('DISTINCT(SupID) SupID')->from('billing_ap')->where('SupID>', 0)->where('LastBalance>', 0)->where_in('PmStatus', array(1, 2))->get_compiled_select();
        $query = $this->db->select("a.ID, a.BName as Name")->from('supplier a')->join('(' . $query1 . ') b', 'a.ID = b.SupID', 'inner')->order_by('a.BName', 'asc')->get();
        $arr = $query->result_array();

        return $arr;
    }

    public function get_pending_supplier_list() {
        $where = array('BLStatus' => 0, 'BLID' => 0, 'SupID>' => 0);
        $query1 = $this->db->select('DISTINCT(SupID) SupID')->from('stockin')->where($where)->where_in('InType', array(1))->get_compiled_select();
        $query = $this->db->select("a.ID, a.BName as Name")->from('supplier a')->join('(' . $query1 . ') b', 'a.ID = b.SupID', 'inner')->order_by('a.BName', 'asc')->get();
        $arr = $query->result_array();

        return $arr;
    }

    public function gen_ymbulk($table) {
        if ($table == 'billing_ar'):
            $min_date = $this->min_rec('OutDate', 'stockout', 'OutType IN (1, 2) and PmStatus = 1 and BLStatus = 0');
            $max_date = $this->max_rec('OutDate', 'stockout', 'OutType IN (1, 2) and PmStatus = 1 and BLStatus = 0');
        else:
            $min_date = $this->min_rec('InDate', 'stockin', 'InType IN (1, 2) and InStatus = 1 and PmStatus = 1 and BLStatus = 0');
            $max_date = $this->max_rec('InDate', 'stockin', 'InType IN (1, 2) and InStatus = 1 and PmStatus = 1 and BLStatus = 0');
        endif;

        $arr = array();
        if (!empty($min_date) && !empty($max_date)):
            $start = strtotime($min_date);
            $end = strtotime($max_date);
            $time = $start;

            while ($time <= $end):
                $keyD = date('m-Y', $time);
                $valD = date('F, Y', $time);
                $arr[$keyD] = $valD;

                $time = strtotime("1 Month", $time);
            endwhile;
        endif;

        return $arr;
    }

    public function gen_docno($table, $type = 2) {
        $arr = unserialize(MDOCNO);
        $year = date('Y');
        $month = date('m');
        $year_mini = date('y');
        $yearth = $year + 543;
        $yearth_mini = substr($yearth, 2, 2);

        if ($table == 'invoice'):
            $num = $this->count_rec('ID', $table, 'YEAR(CreatedDate) = "' . $year . '" AND MONTH(CreatedDate) = "' . $month . '" AND SaleType = ' . $type . ' ') + 1;
            $tnum = sprintf("%04d", $num);
            if ($type == 1):
                //WH
                $docno = $year . $month . $tnum;
            else:
                $docno = $arr[$table] . $year . $month . $tnum;
            endif;

        elseif ($table == 'stockout'):
            $num = $this->count_rec('ID', $table, 'OutMode = 1 AND YEAR(CreatedDate) = "' . $year . '" AND MONTH(CreatedDate) = "' . $month . '"') + 1;
            $tnum = sprintf("%03d", $num);

            $docno = $arr[$table] . $year_mini . $month . '-' . $tnum;
        else:
            $num = $this->count_rec('ID', $table, 'YEAR(CreatedDate) = "' . $year . '" AND MONTH(CreatedDate) = "' . $month . '"') + 1;
            $tnum = sprintf("%03d", $num);

            $docno = $arr[$table] . $year_mini . $month . '-' . $tnum;
        endif;

        return $docno;
    }

    public function gen_barcode($id = 0) {
        $syear = date('y');
        $month = date('m');
        if ($id == 0):
            $id = $this->count_rec('ID', 'stock', 'YEAR(CreatedDate) = "' . date('Y') . '"') + 1;
        endif;
        $code = $syear . $month . sprintf("%06d", $id);

        return $code;
    }

    public function gen_zone_code($location = 0, $id = 0) {
        $zone_code = unserialize(MZONE_CODE);
        if ($id == 0):
            $id = $this->count_rec('ID', 'zone', 'Code != "" AND Building = ' . $location) + 1;
        endif;
        $code = isset_arr($location, $zone_code) . sprintf("%02d", $id);
        return $code;
    }

    public function gen_rack_barcode($zone_code = '', $id = 0, $zone_id = 0) {
        if ($id == 0):
            $id = $this->count_rec('ID', 'rack', 'Barcode != "" AND ZoneID = ' . $zone_id) + 1;
        endif;
        $barcode = $zone_code . sprintf("%03d", $id);
        return $barcode;
    }

    public function update_group_pricing($id) {
        $arr = $this->get_field_arr1('ID, StType, (Price1)WPrice, (Price2)RPrice', 'ptype', 'ID = ' . $id);
        if ($arr['ID'] > 0):
            $arr2 = $this->get_level_list();
            $arr3 = $this->get_shade_list($arr['ID']);
            $up_set = [
                'Price1' => $arr['WPrice'],
                'Price2' => $arr['RPrice'],
                'LastUpdated' => $this->now()
            ];
            $cond = ['PTypeID' => $arr['ID'], 'StType' => $arr['StType']];
            foreach ($arr2 as $grp_id => $grp_name):
                $cond['Level'] = $grp_id;
                foreach ($arr3 as $sh_id => $sh_name):
                    $cond1 = $cond;
                    $cond1['PShade'] = $sh_id;
                    $level_id = $this->get_field('ID', 'level_pricing', $cond1);
                    if ($level_id > 0):
                        $db = $this->db->table('level_pricing');
                        $db->where('ID', $level_id);
                        $db->update($up_set);
                    else:
                        $up_set['UserID'] = $this->session->scu_id;
                        $up_set['CreatedDate'] = $this->now();
                        $post_arr = array_merge($cond1, $up_set);
                        $db = $this->db->table('level_pricing');
                        $db->insert($post_arr);
                        $level_id = $this->db->insertID();
                    endif;

                endforeach;
            endforeach;

        endif;
    }

    public function update_customer_pricing($id) {
        $arr = $this->get_field_arr1('ID', 'level', 'ID = ' . $id);
        if ($arr['ID'] > 0):
            $arr2 = $this->get_field_arr('ID, StType, PTypeID, PShade, Price1, Price2', 'level_pricing', 'Level = ' . $arr['ID']);
            $arr3 = $this->get_field_arr('ID, BName', 'customer', 'Level = ' . $arr['ID']);
            if (is_array($arr3) && count($arr3) > 0):
                $cusid_arr = single_arr('ID', 'ID', $arr3);
                foreach ($arr2 as $key => $val):
                    $cond = ['PTypeID' => $val['PTypeID'], 'StType' => $val['StType'], 'PShade' => $val['PShade']];
                    $up_set = [
                        'Price1' => $val['Price1'],
                        'Price2' => $val['Price2'],
                        'LastUpdated' => $this->now()
                    ];
                    foreach ($cusid_arr as $cusid):
                        $cond1 = $cond;
                        $cond1['CusID'] = $cusid;
                        $pricing_id = $this->get_field('ID', 'customer_pricing', $cond1);
                        if ($pricing_id > 0):
                            $db = $this->db->table('customer_pricing');
                            $db->where('ID', $pricing_id);
                            $db->update($up_set);

                        else:
                            $up_set['UserID'] = $this->session->scu_id;
                            $up_set['CreatedDate'] = $this->now();
                            $post_arr = array_merge($cond1, $up_set);
                            $db = $this->db->table('customer_pricing');
                            $db->insert($post_arr);
                            $pricing_id = $this->db->insertID();
                        endif;

                    endforeach;
                endforeach;

            endif;

        endif;
    }

    public function update_stock($sttype, $id, $qty, $unit, $clear = 0) {
        $db = $this->db->table('stock');
        $query = $db->select('Qty, Unit')->where('ID', $id)->get();
        $arr = $query->getRowArray();

        $qty_new = ($clear == 0) ? convert_qty_unit($unit, $arr['Unit'], $qty) + $arr['Qty'] : 0;
        if ($qty_new < 0)
            $qty_new = 0;

        $db = $this->db->table('stock');
        $db->where('ID', $id);
        $db->update(['Qty' => $qty_new, 'LastUpdated' => $this->now()]);

        return $qty_new;
    }

    public function update_stock_acc($id, $qty, $unit, $clear = 0) {

        $db = $this->db->table('stock');
        $query = $db->select('Qty, Unit')->where('ID', $id)->get();
        $arr = $query->getRowArray();

        $qty_new = ($clear == 0) ? ($qty + $arr['Qty']) : 0;
        if ($qty_new < 0)
            $qty_new = 0;

        $db = $this->db->table('stock');
        $db->where('ID', $id);
        $db->update(['Qty' => $qty_new, 'LastUpdated' => $this->now()]);

        return $qty_new;
    }

    public function update_photos($id) {
        $query = $this->db->select('NoColor, Photo')->from('product_item')->where('ID', $id)->get();
        $arr = $query->row_array();
        if ($arr['NoColor'] == 1):
            $this->db->where('PCID', $id);
            $this->db->update('product', array('Photo' => $arr['Photo']));
        endif;
    }

    public function get_sum_qty_booked($stid = 0, $ordid = 0, $unit = 'Y') {

        if ($unit == 'M'):
            $field = 'IF(Unit = "M", Qty, ROUND(Qty*0.9144, 2))';
        elseif ($unit == 'Y'):
            $field = 'IF(Unit = "Y", Qty, ROUND(Qty/0.9144, 2))';
        else:
            $field = 'IF(Unit = "' . $unit . '", Qty, 0)';
        endif;

        $db = $this->db->table('porder_roll');
        $db->select('SUM(' . $field . ') Qty')->where('Close', '0')->where('StID', $stid);

        if ($ordid > 0):
            $db->where('ID != ', $ordid);
        endif;
        $query = $db->get();
        $result = $query->getRowArray();
        return (isset($result['Qty']) && $result['Qty'] > 0) ? $result['Qty'] : 0;
    }

    public function upload_files($file_name) {
        $config['upload_path'] = '../uploads/files/';
        $config['overwrite'] = TRUE;
        $config['allowed_types'] = 'xls|xlsx';
        $config['max_size'] = 5120;
        $config['file_name'] = $file_name;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('PathFile')):
            $result = array(
                'code' => 1,
                'text' => $this->upload->display_errors()
            );
        else:
            $result = array(
                'code' => 0,
                'data' => $this->upload->data()
            );
        endif;

        return $result;
    }

    public function read_file_to_arr($full_path, $sheet = 0, $resp = 0) {
        $objexcel = new Excel();
        $objReader = PHPExcel_IOFactory::createReader(PHPExcel_IOFactory::identify($full_path));
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($full_path);

        $objWorksheet = $objPHPExcel->setActiveSheetIndex($sheet);
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();

        $headingsArray = $objWorksheet->rangeToArray('A1: ' . $highestColumn . '1', null, true, true, true);
        $headingsArray = $headingsArray[1];

        $r = -1;
        $arr = array();
        for ($row = 2; $row <= $highestRow; ++$row):
            $dataRow = $objWorksheet->rangeToArray('A' . $row . ': ' . $highestColumn . $row, null, true, true, true);
            if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')):
                ++$r;
                foreach ($headingsArray as $columnKey => $columnHeading):
                    $arr[$r][$columnHeading] = filter_txt(trim($dataRow[$row][$columnKey]));
                endforeach;
            endif;
        endfor;

        $sheet_name = $objPHPExcel->getSheetNames();

        if ($resp == 1):
            return array('sheet_name' => $sheet_name[$sheet], 'data' => $arr);
        else:
            return $arr;
        endif;
    }

    public function upload_base64_to_files($id, $dir, $pic_db, $pic_data) {
        $ext_arr = ['jpg', 'jpeg', 'png'];
        $max_size = 1000;

        $pic_arr = $pic_data;
        $pic_base = $this->input->post('pic_base');
        $path = '../' . $dir;

        if (is_array($pic_base)):
            foreach ($pic_base as $pkey => $img_data):
                $pic_ext = filter_txt($this->input->post('pic_ext[' . $pkey . ']'));
                if (!empty($img_data) && in_array($pic_ext, $ext_arr)):
                    $im = imagecreatefromstring(base64_decode($img_data));
                    $source_width = imagesx($im);
                    $source_height = imagesy($im);

                    # resize image
                    if ($source_width > $max_size || $source_height > $max_size):
                        $filename = $id . '_' . $pkey . time() . '.png';
                        $filepath = $path . $filename;

                        if ($source_width > $source_height): # horizontal
                            $ratio = $source_height / $source_width;
                            $new_width = $max_size;
                            $new_height = $ratio * $max_size;
                        else:
                            $ratio = $source_width / $source_height;
                            $new_width = $ratio * $max_size;
                            $new_height = $max_size;
                        endif;

                        $thumb = imagecreatetruecolor($new_width, $new_height);
                        $transparency = imagecolorallocatealpha($thumb, 255, 255, 255, 127);
                        imagefilledrectangle($thumb, 0, 0, $new_width, $new_height, $transparency);

                        imagecopyresampled($thumb, $im, 0, 0, 0, 0, $new_width, $new_height, $source_width, $source_height);
                        imagepng($thumb, real_path($filepath));
                        imagedestroy($im);

                        $pic_arr[] = $dir . $filename;
                    else:
                        $filename = $id . '_' . $pkey . time() . '.' . $pic_ext;
                        $filepath = $path . $filename;
                        $upload_file = file_put_contents(real_path($filepath), base64_decode($img_data));
                        if ($upload_file):
                            $pic_arr[] = $dir . $filename;
                        endif;
                    endif;
                endif;
            endforeach;
        endif;

        # delete files
        if (count($pic_db) > 0):
            $pci_diff = array_diff($pic_db, $pic_data);
            if (count($pci_diff) > 0):
                foreach ($pci_diff as $pic):
                    if (file_exists(real_path('../' . $pic))):
                        unlink(real_path('../' . $pic));
                    endif;
                endforeach;
            endif;
        endif;

        return $pic_arr;
    }

    public function get_month() {
        $year = date('Y');
        $month = intval(date('m'));

        $last_month = date('Y-m-d', strtotime('-1 Month', strtotime($year . '-' . $month . '-01')));
        $sdate = date('Y-m-d', strtotime('-3 Month', strtotime($last_month)));

        $arr_m = explode('-', $last_month);
        $edate = $arr_m[0] . '-' . $arr_m[1] . '-' . cal_days_in_month(CAL_GREGORIAN, $arr_m[1], $arr_m[0]);

        $stime = strtotime($sdate);
        $arr_month = array();
        for ($i = 0; $i < 4; $i++):
            $ntime = strtotime('+' . $i . ' Month', $stime);
            $arr_month[intval(date('m', $ntime))] = date('M Y', $ntime);
        endfor;
        return $arr_month;
    }

    public function check_invno_repeat($id, $invno, $table) {
        $rec = 0;

        if (!empty($invno)):
            $cond = ($id > 0) ? ' and ID != ' . $id : '';
            $rec = $this->count_rec('ID', $table, 'InvNo = "' . $invno . '"' . $cond);
        endif;

        return $rec > 0 ? false : true;
    }

    public function keep_rack_auto($stid_arr) {
        if (count($stid_arr) > 0):
            $this->db->where_in('ID', $stid_arr);
            $this->db->update('stock', array('Location' => 3, 'RackID' => 1041));
        endif;
    }

    public function get_pcolor_list($pcid = '', $active = '') {
        $this->db->select('ID, PColor as Name');
        $this->db->from('product');

        if ($pcid > 0):
            $this->db->where('PCID', $pcid);
        endif;

        if (!empty($active)):
            $this->db->where('Active', $active);
        endif;

        $this->db->order_by('PColor', 'asc');
        $query = $this->db->get();
        $arr = single_arr('ID', 'Name', $query->result_array());

        return $arr;
    }

    # update stock -----------------------------------------------------

    public function update_stock_cutting($id, $qty, $unit, $clear = 0) {
        $arr = $this->get_field_arr1('PID, Qty, Unit, Location', 'stock', 'ID = ' . $id);

        if (count($arr) > 0):
            if ($clear == 1):
                $new_qty = 0;
                $old_qty = $arr['Qty'] + $qty;
                $this->insert_update_stock($id, $old_qty, $new_qty, $arr);
            else:
                $new_qty = $arr['Qty'] + $qty;
                $new_qty = $new_qty < 0 ? 0 : $new_qty;
            endif;

            $data = array('Qty' => $new_qty, 'LastUpdated' => $this->now());

            $this->db->where('ID', $id);
            $this->db->update('stock', $data);
        endif;
    }

    public function insert_update_stock($stid, $old_qty, $new_qty, $arr) {
        $add_arr = array(
            'StID' => $stid,
            'PID' => $arr['PID'],
            'OldQty' => $old_qty,
            'NewQty' => $new_qty,
            'Unit' => $arr['Unit'],
            'Remark' => 'เคลียร์สต๊อกสินค้าตัด',
            'Location' => $arr['Location'],
            'UserID' => $this->session->userdata('scu_id'),
            'IP' => $this->input->ip_address(),
            'CreatedDate' => $this->now(),
            'LastUpdated' => $this->now()
        );
        $this->db->insert('update_stock', $add_arr);
    }

    public function update_stock_roll($id_arr) {
        if (count($id_arr) > 0):
            $data = ['Qty' => 0, 'LastUpdated' => $this->now()];

            $db = $this->db->table('stock');
            $db->whereIn('ID', $id_arr);
            $db->update($data);
        endif;
    }

    public function get_topsearch($lang = 'th') {
        $db = $this->db->table('web_topsearch');
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $f = [
            'ID',
            '(Name' . $lang . ')Name'
        ];
        $db->select(implode(',', $f));
        $db->where('Active', 1);
        if ($lang == 'en'):
            $db->where('NameEn !="" ');
        else:
            $db->where('NameTh !="" ');
        endif;
        $db->orderBy('Name', 'asc');
        $query = $db->get();

        $arr = single_arr('ID', 'Name', $query->getResultArray());
        return $arr;
    }

    public function web_box($lang = 'th') {
        $db = $this->db->table('web_box');
        $lang = ($lang == 'en') ? 'En' : 'Th';
        $f = [
            'ID',
            '(Name' . $lang . ')Name',
            '(Detail' . $lang . ')Detail',
            '(SeoURL' . $lang . ')SeoURL',
            'Photo1,SeoURLEn,SeoURLTh,FontColorTitle'
        ];
        $db->select(implode(',', $f));
        $db->where('Active', 1);
        $db->orderBy('Seq', 'asc');
        $query = $db->get();
        $arr = $query->getResultArray();
        $arr2 = [];
        foreach ($arr as $key => $val):
            $arr2[$val['ID']] = $val;
        endforeach;
        //$arr = single_arr('ID', 'Name', $query->getResultArray());
        return $arr2;
    }

}
