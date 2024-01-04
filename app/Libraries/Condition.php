<?php

namespace App\Libraries;

class Condition {

    public $condition = '';

    public function __construct() {
        
    }

    public function conLike($arr, $SKeyword) {
        $txt = '';
        $lastkey = count($arr) - 1;
        foreach ($arr as $key => $val):
            $txt .= " " . $val . " LIKE '%" . $SKeyword . "%' ";
            $txt .= ($key != $lastkey) ? ' OR ' : '';
        endforeach;

        return $txt;
    }

    public function conLikeQ($arr, $SKeyword) {
        $txt = '';
        $lastkey = count($arr) - 1;
        foreach ($arr as $key => $val):
            $txt .= " " . $val . " LIKE '" . $SKeyword . "' ";
            $txt .= ($key != $lastkey) ? ' OR ' : '';
        endforeach;

        return $txt;
    }

    public function conFindInSet($arr, $SKeyword) {
        $txt = '';
        $lastkey = count($arr) - 1;
        foreach ($arr as $key => $val):
            //$txt .= " " . $val . " LIKE '%" . $SKeyword . "%' ";
            $txt .= " FIND_IN_SET(" . $val . "," . $SKeyword . ")";
            $txt .= ($key != $lastkey) ? ' OR ' : '';
        endforeach;

        return $txt;
    }

    public function conRangeDate($SKeyword, $field) {
        $this->dateformat = new Dateformat();
        $arr = explode('-', $SKeyword);
        $cond = '(' . $field . ' BETWEEN  "' . $this->dateformat->basedate(filter_txt($arr[0])) . '" AND "' . $this->dateformat->basedate(filter_txt($arr[1])) . '")';
        return $cond;
    }

    // --------------------------------------------- STANDARD
//    public function conStandard($param) {
//        $arr = (is_array($param)) ? $param : unserialize(urldecode($param));
//        $condition = "Active=1";
//
//        if (!empty($arr['SKeyword'])):
//            $condition .= " AND ( " . $this->conLike(array('Name'), $arr['SKeyword']) . " )";
//        endif;
//        if (isset($arr['SStType']) && $arr['SStType'] > 0):
//            $condition .= " AND StType =  " . $arr['SStType'];
//        endif;
//    }

    public function conFabrics($param) {
        $arr = (is_array($param)) ? $param : unserialize(urldecode($param));
        $condition = "a.OnWebsite=1 AND a.Active=1";
        /*
          if (!empty($arr['SKeyword'])):
          $condition .= " AND ( " . $this->conLike(array('Name'), $arr['SKeyword']) . " )";
          endif;
          if (isset($arr['SStType']) && $arr['SStType'] > 0):
          $condition .= " AND StType =  " . $arr['SStType'];
          endif;
         */
        if (isset($arr['keyword']) && !empty($arr['keyword'])):
            $condition .= " AND ( " . $this->conLike(array('a.WebNameTh', 'a.WebNameEn', 'a.ShortDesTh', 'a.ShortDesEn', 'a.SeoKeywordTh', 'a.SeoKeywordEn'), $arr['keyword']) . " )";
        endif;

        if (isset($arr['SCate'])):
            if (is_array($arr['SCate'])):
                if (count($arr['SCate']) > 0):
                    $condition .= ($condition != "") ? ' AND ' : '';
                    $condition .= " ( " . $this->conFindInSet($arr['SCate'], 'a.WebCateID') . " )";
                endif;
            else:
                if ($arr['SCate'] > 0):
                    $condition .= ($condition != "") ? ' AND ' : '';
                    $condition .= ' (FIND_IN_SET(' . $arr['SCate'] . ',a.WebCateID)<>0)';
                endif;
            endif;
        endif;

        if (isset($arr['SEndID'])):
            if (is_array($arr['SEndID'])):
                if (count($arr['SEndID']) > 0):
                    $condition .= ($condition != "") ? ' AND ' : '';
                    $condition .= " ( " . $this->conFindInSet($arr['SEndID'], 'a.WebEndID') . " )";
                endif;
            else:
                if ($arr['SEndID'] > 0):
                    $condition .= ($condition != "") ? ' AND ' : '';
                    $condition .= ' (FIND_IN_SET(' . $arr['SEndID'] . ',a.WebEndID)<>0)';
                endif;
            endif;
        endif;

        if (isset($arr['SIndID'])):
            if (is_array($arr['SIndID'])):
                if (count($arr['SIndID']) > 0):
                    $condition .= ($condition != "") ? ' AND ' : '';
                    $condition .= " ( " . $this->conFindInSet($arr['SIndID'], 'a.WebIndID') . " )";
                endif;
            else:
                if ($arr['SIndID'] > 0):
                    $condition .= ($condition != "") ? ' AND ' : '';
                    $condition .= ' (FIND_IN_SET(' . $arr['SIndID'] . ',a.WebIndID)<>0)';
                endif;
            endif;
        endif;

        if (isset($arr['SCharecter'])):
            if (is_array($arr['SCharecter'])):
                if (count($arr['SCharecter']) > 0):
                    $condition .= ($condition != "") ? ' AND ' : '';
                    $condition .= " ( " . $this->conFindInSet($arr['SCharecter'], 'a.WebCharID') . " )";
                endif;
            else:
                if ($arr['SCharecter'] > 0):
                    $condition .= ($condition != "") ? ' AND ' : '';
                    $condition .= ' (FIND_IN_SET(' . $arr['SCharecter'] . ',a.WebCharID)<>0)';
                endif;
            endif;
        endif;

        if (isset($arr['SColor'])):
            if (is_array($arr['SColor'])):
                if (count($arr['SColor']) > 0):
                    $condition .= ($condition != "") ? ' AND ' : '';
                    $condition .= 'i.ID IN(SELECT DISTINCT(a.PCID) FROM web_addcolor a WHERE ' . $this->conFindInSet($arr['SColor'], 'a.TypeColor') . ')';
                endif;
            else:
                if ($arr['SColor'] > 0):
                    $condition .= ($condition != "") ? ' AND ' : '';
                    $condition .= 'i.ID IN(SELECT DISTINCT(a.PCID) FROM web_addcolor a WHERE (FIND_IN_SET(' . $arr['SColor'] . ',a.TypeColor)<>0))';
                endif;
            endif;
        endif;

        if (isset($arr['SYard']) && $arr['SYard'] != ""):
            $condition .= ($condition != "") ? ' AND ' : '';
            $condition .= 'i.Unit="Y"';
        endif;
        if (isset($arr['SKg']) && $arr['SKg'] != ""):
            $condition .= ($condition != "") ? ' AND ' : '';
            $condition .= 'i.Unit="Kg"';
        endif;
        if (isset($arr['SPriceRetail']) && $arr['SPriceRetail'] > 0):
            $condition .= ($condition != "") ? ' AND ' : '';
            $condition .= '(i.SPrice3>=' . $arr['SPrice1'] . ' AND i.SPrice3<=' . $arr['SPrice2'] . ')';
        endif;
        if (isset($arr['SPriceWhs']) && $arr['SPriceWhs'] > 0):
            $condition .= ($condition != "") ? ' AND ' : '';
            $condition .= '(i.SPrice2>=' . $arr['SPrice1'] . ' AND i.SPrice2<=' . $arr['SPrice2'] . ')';
        endif;

        if (isset($arr['SCapID']) && $arr['SCapID'] > 0):
            $condition .= ($condition != "") ? ' AND ' : '';
            $condition .= 'a.CapID=' . $arr['SCapID'];
        endif;

//echo $condition;exit();
        return $condition;
    }

    public function conBlog($param) {
        $arr = (is_array($param)) ? $param : unserialize(urldecode($param));
        $condition = "Active=1";

        return $condition;
    }

}
