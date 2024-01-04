<?php

namespace App\Modules\Pages\Controllers;

use App\Models\MainModel as mainm;
use App\Libraries\Sql as sql;

class Pages extends \App\Controllers\BaseController {

    var $page_title = "";
    var $page_view = "Modules\Pages\Views";
    var $module = 'Pages';
    var $perpage = 500;

    public function __construct() {
        parent::__construct();
        $this->mainm = new mainm();
        $this->sql = new sql();
    }

    public function not_found() {
        return redirect()->to(base_url());
    }

    public function projects() {
        $data = [];
        $data['page_title'] = lang('global_lang.our_project');
        $data['lang_url'] = $this->lang_url;
        $data['page_url_en'] = 'en/projects';
        $data['page_url_th'] = 'โครงการ';

        $lang = ($this->lang == 'en') ? 'en' : 'th';
        $f_banr = [
            'banner_id',
            '(banner_title_' . $lang . ')Title',
            '(banner_detail_' . $lang . ')ShortDetail',
            '(banner_image)Image,(banner_image_mob)ImageMob'
        ];
        $where = 'Active=1 AND (banner_key LIKE "โครงการ" OR banner_key LIKE "projects")';
        $info_banner = $this->mainm->get_field_arr1(implode(',', $f_banr), 'banners_pages', $where);
        $data['info_banner'] = $info_banner;

        echo view('inc-header', $data);
        echo view($this->page_view . '\projects', $data);
        echo view('inc-footer', $data);
    }

    public function projects_detail($url = '') {
        $data = [];
        $data['js'] = [
            'js/pie-chart.js',
            'js/app.js',
            'js/project.js'
        ];

        //print_arr($data['data_info']);


        $data['page_title'] = $this->page_title;
        $data['lang_url'] = $this->lang_url;
        $data['page_url_en'] = $this->page_url_en;
        $data['page_url_th'] = $this->page_url_th;

        $data['data_info'] = $this->mainm->get_projects_info($url, $this->lang_url);

        echo view('inc-header', $data);
        echo view($this->page_view . '\projects_detail', $data);
        echo view('inc-footer', $data);
    }

    public function news() {
        $data = [];
        $data['js'] = [
        ];
        $data['info_news'] = $this->mainm->get_news($this->lang_url);

        $data['page_title'] = lang('global_lang.news');
        $data['lang_url'] = $this->lang_url;

        $data['page_url_en'] = 'en/news';
        $data['page_url_th'] = 'ข่าวสาร';

        $lang = ($this->lang == 'en') ? 'en' : 'th';
        $f_banr = [
            'banner_id',
            '(banner_title_' . $lang . ')Title',
            '(banner_detail_' . $lang . ')ShortDetail',
            '(banner_image)Image,(banner_image_mob)ImageMob'
        ];
        $where = 'Active=1 AND (banner_key LIKE "ข่าวสาร" OR banner_key LIKE "news")';
        $info_banner = $this->mainm->get_field_arr1(implode(',', $f_banr), 'banners_pages', $where);
        $data['info_banner'] = $info_banner;

        echo view('inc-header', $data);
        echo view($this->page_view . '\news', $data);
        echo view('inc-footer', $data);
    }

    public function news_detail($url = '') {
        $data = [];
        $data['js'] = [
        ];
        $data['page_title'] = $this->page_title;
        $data['lang_url'] = $this->lang_url;

        $data['data_info'] = $this->mainm->get_news_info($url, $this->lang_url);
        if ($data['data_info']):
            $data['page_url_en'] = 'en/news/' . $data['data_info']['SeoURLEn'];
            $data['page_url_th'] = 'ข่าวสาร/' . $data['data_info']['SeoURLTh'];
        else:
            if ($this->lang_url == 'en'):
                return redirect()->to(base_url('en/news'));
            else:
                return redirect()->to(base_url('ข่าวสาร'));
            endif;

        endif;

        echo view('inc-header', $data);
        echo view($this->page_view . '\news_detail', $data);
        echo view('inc-footer', $data);
    }

    public function investor($url = '', $url2 = '') {
        $data = [];

        if ($this->lang_url == 'en'):
            $syear = $this->request->getGet('year');
        else:
            $syear = $this->request->getGet('ปี');
        endif;

        if ($syear == ""):
            $syear = ($this->lang_url == 'en') ? date('Y') : date('Y') + 543;
        endif;
        //echo $syear;exit();
        $data['srch_syear'] = $syear;

        $data['js'] = [
            'js/app.js',
            'js/investor.js'
        ];

        $page_tabs = 1;
        $main_tabs = 1;
        $url_th = '';
        $url_en = '';
        if (in_array($url, ['คณะกรรมการบริษัท', 'board-of-directors'])):
            $page_tabs = 2;
            $url_th = '/คณะกรรมการบริษัท';
            $url_en = '/board-of-directors';

        elseif (in_array($url, ['สาส์นจากประธานกรรมการ', 'message-from-chairman-director'])):
            $page_tabs = 3;
            $url_th = '/สาส์นจากประธานกรรมการ';
            $url_en = '/message-from-chairman-director';
        elseif (in_array($url, ['ข้อมูลการเงิน', 'financial-information'])):
            $main_tabs = 2;
            $url_th = '/ข้อมูลการเงิน';
            $url_en = '/financial-information';

            $type_info = [];
            $detail_info = [];

            $lang = ($this->lang_url == 'en') ? 'en' : 'th';
            if ($url2 != ""):
                $cond = 'url_' . $lang . ' LIKE "' . $url2 . '" ';
                $type_info = $this->mainm->get_field_arr1('*,(type_name_' . $lang . ')Name,type_name_en,type_name_th,url_en,url_th', 'financial_type', $cond);
            else:
                $type_info = $this->mainm->get_field_arr1('*,(type_name_' . $lang . ')Name,type_name_en,type_name_th,url_en,url_th', 'financial_type', '', 'Sequence asc');
            endif;
            if ($url2 != ""):
                $url_th .= '/' . $type_info['url_th'];
                $url_en .= '/' . $type_info['url_en'];
            endif;

            $f2 = [
                'id',
                'syear',
                '(title_' . $lang . ')Name',
                'pdf_file'
            ];

            $cond_f = 'stype=' . $type_info['id'];
            if ($this->lang_url == 'en'):
                $cond_f .= ' AND syear="' . $syear . '"';
            else:
                $cond_f .= ' AND syear="' . ($syear - 543) . '"';
            endif;
            $detail_info = $this->mainm->get_field_arr($f2, 'financial', $cond_f);
            //print_arr($detail_info);


            $data['type_info'] = $type_info;
            $data['detail_info'] = $detail_info;

        elseif (in_array($url, ['ข้อมูลสำหรับผู้ถือหุ้น', 'shareholder-information'])):
            $main_tabs = 3;
            $url_th = '/ข้อมูลสำหรับผู้ถือหุ้น';
            $url_en = '/shareholder-information';

            $type_info = [];
            $detail_info = [];

            $lang = ($this->lang_url == 'en') ? 'en' : 'th';
            if ($url2 != ""):
                $cond = 'url_' . $lang . ' LIKE "' . $url2 . '" ';
                $type_info = $this->mainm->get_field_arr1('*,(type_name_' . $lang . ')Name,type_name_en,type_name_th,url_en,url_th', 'investor_type', $cond);
            else:
                $type_info = $this->mainm->get_field_arr1('*,(type_name_' . $lang . ')Name,type_name_en,type_name_th,url_en,url_th', 'investor_type', '', 'Sequence asc');
            endif;
            if ($url2 != ""):
                $url_th .= '/' . $type_info['url_th'];
                $url_en .= '/' . $type_info['url_en'];
            endif;

            $f2 = [
                'id',
                'syear',
                '(title_' . $lang . ')Name',
                'pdf_file'
            ];
            $cond_f = 'stype=' . $type_info['id'];
            if ($this->lang_url == 'en'):
                $cond_f .= ' AND syear="' . $syear . '"';
            else:
                $cond_f .= ' AND syear="' . ($syear - 543) . '"';
            endif;

            $detail_info = $this->mainm->get_field_arr($f2, 'investor', $cond_f);
            //print_arr($type_info);


            $data['type_info'] = $type_info;
            $data['detail_info'] = $detail_info;

        elseif (in_array($url, ['นโยบายบริษัท', 'company-policy'])):
            $main_tabs = 4;
            $url_th = '/นโยบายบริษัท';
            $url_en = '/company-policy';

            $type_info = [];
            $detail_info = [];

            $lang = ($this->lang_url == 'en') ? 'en' : 'th';
            if ($url2 != ""):
                $cond = 'url_' . $lang . ' LIKE "' . $url2 . '" ';
                $type_info = $this->mainm->get_field_arr1('*,(type_name_' . $lang . ')Name,type_name_en,type_name_th,url_en,url_th', 'company_type', $cond);
            else:
                $type_info = $this->mainm->get_field_arr1('*,(type_name_' . $lang . ')Name,type_name_en,type_name_th,url_en,url_th', 'company_type', '', 'Sequence asc');
            endif;
            if ($url2 != ""):
                $url_th .= '/' . $type_info['url_th'];
                $url_en .= '/' . $type_info['url_en'];
            endif;

            $f2 = [
                'id',
                'syear',
                '(title_' . $lang . ')Name',
                'pdf_file'
            ];
            $cond_f = 'stype=' . $type_info['id'];
            if ($this->lang_url == 'en'):
                $cond_f .= ' AND syear="' . $syear . '"';
            else:
                $cond_f .= ' AND syear="' . ($syear - 543) . '"';
            endif;

            $detail_info = $this->mainm->get_field_arr($f2, 'company_policy', $cond_f);
            //print_arr($type_info);


            $data['type_info'] = $type_info;
            $data['detail_info'] = $detail_info;

        endif;

        $data['page_title'] = lang('global_lang.investor');
        $data['lang_url'] = $this->lang_url;

        $data['page_url_en'] = 'en/investor' . $url_en;
        $data['page_url_th'] = 'นักลงทุนสัมพันธ์' . $url_th;

        $data['main_tabs'] = $main_tabs;
        $data['page_tabs'] = $page_tabs;

        $data['info_myear'] = ($this->lang_url == 'en') ? unserialize(MYEARLY) : unserialize(MYEARLY_TH);

        echo view('inc-header', $data);
        echo view($this->page_view . '\investor', $data);
        echo view('inc-footer', $data);
    }

    public function contacts() {
        $data = [];
        $data['page_title'] = lang('global_lang.contacts');
        $data['lang_url'] = $this->lang_url;
        $data['page_url_en'] = 'en/contact-us';
        $data['page_url_th'] = 'ติดต่อเรา';

        $lang = ($this->lang_url == 'en') ? 'en' : 'th';
        $f = [
            '(detail_' . $lang . ')Detail'
        ];
        $data['info_data'] = $this->mainm->get_field_arr1(implode(',', $f), 'contact_us', 'id=1');

        echo view('inc-header', $data);
        echo view($this->page_view . '\contacts', $data);
        echo view('inc-footer', $data);
    }

    public function abouts($url = '') {
        $data = [];

        $data['js'] = [
        ];
        $data['page_title'] = lang('global_lang.about_us');
        $data['lang_url'] = $this->lang_url;

        $data['page_url_en'] = 'en/about-us';
        $data['page_url_th'] = 'รู้จักเคหะสุขประชา';

        $lang = ($this->lang == 'en') ? 'en' : 'th';

        $f_banr = [
            'banner_id',
            '(banner_title_' . $lang . ')Title',
            '(banner_detail_' . $lang . ')ShortDetail',
            '(banner_image)Image,(banner_image_mob)ImageMob'
        ];
        $where = 'Active=1 AND (banner_key LIKE "รู้จักเคหะสุขประชา" OR banner_key LIKE "about-us")';
        $info_banner = $this->mainm->get_field_arr1(implode(',', $f_banr), 'banners_pages', $where);
        $data['info_banner'] = $info_banner;
        // print_arr($data['info_banner']);


        $f = [
            '(detail_' . $lang . ')Detail'
        ];
        $data['info_data'] = $this->mainm->get_field_arr1(implode(',', $f), 'about_us', 'id=1');

        echo view('inc-header', $data);
        echo view($this->page_view . '\abouts', $data);
        echo view('inc-footer', $data);
    }

    public function career($url = '') {
        $data = [];

        $data['js'] = [
        ];
        $data['page_title'] = lang('global_lang.career');
        $data['lang_url'] = $this->lang_url;

        $data['page_url_en'] = 'en/career';
        $data['page_url_th'] = 'ร่วมงานกับเรา';

        echo view('inc-header', $data);
        echo view($this->page_view . '\career', $data);
        echo view('inc-footer', $data);
    }

    public function gen_searchbox() {
        $data = [];
        $data['lang_url'] = $this->lang_url;
        $keyword = filter_txt($this->request->getPost('keyword'));
        $data['keyword'] = $keyword;

        if (!empty($keyword)) {
            $db = $this->db->table('projects as p');
            $lang = ($this->lang == 'en') ? 'en' : 'th';
            $cond = 'p.active=1 AND (p.name_th LIKE "%' . $keyword . '%" OR p.name_en LIKE "%' . $keyword . '%")';
            $f = [
                'p.id,p.gallery_active',
                '(p.name_' . $lang . ')Name',
                '(p.info_location_' . $lang . ')Location',
                '(s.url_en)SeoURLEn,(s.url_th)SeoURLTh',
                '(Select file_path From projects_media Where project_id=p.id Order by RAND() Limit 1)Image'
            ];

            $db->join('projects_seo as s', 'p.id=s.project_id', 'left');
            $db->select(implode(',', $f));
            $db->where($cond);
            $db->orderBy('p.Sequence', 'asc');
            $db->limit(5);
            $query = $db->get();
            $data['info_data'] = $query->getResultArray();
        }


        echo view($this->page_view . '\_data_search', $data);
    }

    public function search() {
        $keyword = filter_txt($this->request->getGet('keyword'));

        $data['page_title'] = lang('global_lang.search');
        $data['seo_keyword'] = '';
        $data['seo_decription'] = '';

        $data['lang_url'] = $this->lang_url;
        $data['page_url_en'] = 'en/search';
        $data['page_url_th'] = 'ค้นหา';

        $data['css'] = [
            'css/addSlider.css'
        ];
        $data['js'] = [
            'js/Obj.min.js',
            'js/addSlider.js',
            'js/fabric_type.js'
        ];

        $url = lang('url_lang.search');

        $pages = ($this->request->getGet('pages') ? ($this->request->getGet('pages') - 1) : 0);
        if (!isset($pages)) {
            $pages = 0;
        }


        # build query
        $data_query = [];
        foreach ($_GET as $key => $row) {
            $data_query[$key] = $row;
            unset($data_query['pages']); // do not forward pages key to new page
        }
        $data['url_query_set'] = http_build_query($data_query);
        //echo current_url();


        $lang = ($this->lang == 'en') ? 'En' : 'Th';

        $f_banr = [
            'ID,SeoURLTh,SeoURLEn',
            '(Name' . $lang . ')Name',
            '(Detail' . $lang . ')Detail',
            '(SeoTitle' . $lang . ')SeoTitle',
            '(SeoKeyword' . $lang . ')SeoKeyword',
            '(SeoURL' . $lang . ')SeoURL',
            'Photo1,Photo2,Photo3,Photo4',
            'FontColorTitle,FontColorDetail,BgColor'
        ];

        $where = 'Active=1 AND SeoURL' . $lang . ' Like "' . $url . '"';
        $arr = $this->mainm->get_field_arr1(implode(',', $f_banr), 'web_pagebanner', $where);

        $f = [
            'ID,SeoURLTh,SeoURLEn',
            '(Name' . $lang . ')Name',
            '(Detail' . $lang . ')Detail',
            '(SeoTitle' . $lang . ')SeoTitle',
            '(SeoKeyword' . $lang . ')SeoKeyword',
            '(SeoURL' . $lang . ')SeoURL',
            'Photo1,Photo2,Photo3,Photo4',
            'FontColorTitle,FontColorDetail,BgColor'
        ];

        // $where = 'a.OnWebsite=1 AND a.Active=1 AND (a.WebNameTh LIKE "%' . $keyword . '%" OR a.WebNameEn LIKE "%' . $keyword . '%" OR a.ShortDesTh LIKE "%' . $keyword . '%" OR a.ShortDesEn LIKE "%' . $keyword . '%" OR a.SeoKeywordTh LIKE "%' . $keyword . '%" OR a.SeoKeywordEn LIKE "%' . $keyword . '%")';
        //$arr2 = $this->mainm->get_itemlist('*','web_fabrice','');
        $data['search'] = array(
            'mode' => filter_txt($this->request->getPost('mode')),
            'keyword' => $keyword,
            'SCate' => $this->request->getPost('SCate'),
            'SCharecter' => $this->request->getPost('SCharecter'),
            'SColor' => $this->request->getPost('SColor'),
            'SYard' => $this->request->getPost('SYard'),
            'SKg' => $this->request->getPost('SKg'),
            'SPrice' => $this->request->getPost('SPrice'),
            'SPriceRetail' => $this->request->getPost('SPriceRetail'),
            'SPriceWhs' => $this->request->getPost('SPriceWhs'),
            'SPriceLowHigh' => $this->request->getPost('SPriceLowHigh'),
            'SPriceHighLow' => $this->request->getPost('SPriceHighLow'),
            'SNew' => $this->request->getPost('SNew'),
        );

        $data['info_price_retail'] = floor($this->mainm->min_price('i.SPrice3')) . ',' . ceil($this->mainm->max_price('i.SPrice3'));
        $data['info_price_whs'] = floor($this->mainm->min_price('i.SPrice2')) . ',' . ceil($this->mainm->max_price('i.SPrice2'));
        if (empty($data['search']['SPrice'])):
            $exp_price = explode(',', $data['info_price_whs']);
            $exp_price2 = explode(',', $data['info_price_retail']);
            if ($exp_price2[0] < $exp_price[0]):
                $exp_price[0] = $exp_price2[0];
            endif;
            if ($exp_price2[1] > $exp_price[1]):
                $exp_price[1] = $exp_price2[1];
            endif;
            $data['search']['SPrice1'] = $exp_price[0];
            $data['search']['SPrice2'] = $exp_price[1];
        else:
            $exp_arr = explode(',', $data['search']['SPrice']);
            $data['search']['SPrice1'] = floor($exp_arr[0]);
            $data['search']['SPrice2'] = ceil($exp_arr[1]);
        endif;

        $data['total_records'] = $this->mainm->count_itemlist($this->sql->sqlFabrics($data['search'], 'count'));
        $data['current_page'] = ($this->request->getGet('pages') ? $this->request->getGet('pages') : 1);
        $data['total_page'] = ceil($data['total_records'] / $this->perpage);
        $data['starter'] = ($pages * $this->perpage);
        $data['limiter'] = $this->perpage;
//            $data['chk_p2slider_action'] = (!empty($data['url_query_set']) || $this->request->getGet('pages')) ? 1 : 0;

        $arr2 = $this->mainm->get_itemlist($this->sql->sqlFabrics($data['search'], 'query'), $data['starter'], $data['limiter']);
        $pcid_arr = single_arr('PCID', 'PCID', $arr2);
        if (count($pcid_arr) > 0):
            $wheres_color = 'a.PCID IN(' . implode(',', $pcid_arr) . ')';
            if (isset($data['search']['SColor'])):
                if (is_array($data['search']['SColor']) && count($data['search']['SColor']) > 0):
                    $wheres_color .= ($wheres_color != "") ? ' AND ' : '';
                    $wheres_color .= '(' . $this->sql->conFindInSet($data['search']['SColor'], 'a.TypeColor') . ')';
                else:
                    if ($data['search']['SColor'] > 0):
                        $wheres_color .= ($wheres_color != "") ? ' AND ' : '';
                        $wheres_color .= '(FIND_IN_SET(' . $data['search']['SColor'] . ',a.TypeColor)<>0)';
                    endif;
                endif;
            endif;
            $info_color = $this->mainm->get_fabrics_color(1, $this->lang, $wheres_color);
            $data['info_color'] = multiple_arr('PCID', $info_color);
        else:
            $data['info_color'] = [];
        endif;

        $data['info_detail'] = $arr2;
        $data['info_data'] = $arr;

        echo view('inc-header', $data);
        echo view($this->page_view . '\search', $data);
        echo view('inc-footer', $data);
    }

    public function privacy_policy() {
        $data['page_title'] = lang('global_lang.privacy_policy');
        $data['seo_keyword'] = '';
        $data['seo_decription'] = '';

        $data['lang_url'] = $this->lang_url;
        $data['page_url_en'] = 'en/privacy-policy';
        $data['page_url_th'] = 'นโยบายความเป็นส่วนตัว';

        $data['js'] = [
            'js/about_us.js?v=' . VERSION
        ];

        $lang = ($this->lang == 'en') ? 'en' : 'th';
        $f_banr = [
            'banner_id',
            '(banner_title_' . $lang . ')Title',
            '(banner_detail_' . $lang . ')ShortDetail',
            '(banner_image)Image,(banner_image_mob)ImageMob'
        ];
        $where = 'Active=1 AND (banner_key LIKE "นโยบายความเป็นส่วนตัว" OR banner_key LIKE "privacy-policy")';
        $info_banner = $this->mainm->get_field_arr1(implode(',', $f_banr), 'banners_pages', $where);
        $data['info_banner'] = $info_banner;

        echo view('inc-header', $data);
        echo view($this->page_view . '\privacy_policy', $data);
        echo view('inc-footer', $data);
    }

    public function terms_services() {
        $data['page_title'] = lang('global_lang.terms_of_use');
        $data['seo_keyword'] = '';
        $data['seo_decription'] = '';

        $data['lang_url'] = $this->lang_url;
        $data['page_url_en'] = $this->page_url_en;
        $data['page_url_th'] = $this->page_url_th;

        $data['js'] = [
                //'js/about_us.js?v=' . VERSION
        ];
        echo view('inc-header', $data);
        echo view($this->page_view . '\terms_services', $data);
        echo view('inc-footer', $data);
    }

    public function subscribe() {
        $email = $this->request->getPost('subscribe_email');
//        $email = 'mnw_ch007@hotmail.com';
        if (empty($email)):
            $resp['code'] = 1;
            $resp['text'] = ($this->lang == 'en' ) ? "Please fill your email address." : "กรุณากรอกที่อยู่อีเมล";
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)):
            $resp['code'] = 1;
            $resp['text'] = ($this->lang == 'en' ) ? "Invalid email address." : "รูปแบบของอีเมลไม่ถูกต้อง";
        elseif ($this->mainm->getrepeat('subscribers', ['Email' => $email])):
            $resp['code'] = 1;
            $resp['text'] = ($this->lang == 'en' ) ? "Email address is already subscribed." : "ที่อยู่อีเมลได้ลงทะเบียนแล้ว";
        else:
            $this->mainm->addsubsc($email);
            $resp['code'] = 0;
            $resp['text'] = ($this->lang == 'en' ? "Thank you for subscribing to our newsletter." : "ขอบคุณสำหรับการลงทะเบียนเพื่อรับข่าวสาร");
        endif;
        echo json_encode($resp);
    }

}
