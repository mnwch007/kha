<?php

namespace App\Libraries;

//use App\Libraries\Condition as condition;
class Sql extends \App\Libraries\Condition {

    function __construct() {
        
    }

    public function sqlFabrics($param, $mode = 'query') {
        $arr = (is_array($param)) ? $param : unserialize(urldecode($param));
        $condition = $this->conFabrics($arr);
        $condition = (!empty($condition)) ? ' WHERE ' . $condition : '';

        $order_by = '';
        if (isset($arr['SPriceLowHigh']) && $arr['SPriceLowHigh'] > 0):
            $order_by = 'i.SPrice3 asc,i.SPrice2 asc';
        endif;
        if (isset($arr['SPriceHighLow']) && $arr['SPriceHighLow'] > 0):
            $order_by = 'i.SPrice3 desc,i.SPrice2 desc';
        endif;
        if (isset($arr['SNew']) && $arr['SNew'] > 0):
            $order_by .= ($order_by != "") ? ',' : '';
            $order_by .= 'i.ID desc';
        endif;
        if (empty($order_by)):
            $order_by = 'a.ID DESC';
        endif;

        if ($mode == 'count'):
            $sql = "SELECT COUNT(a.ID) total FROM web_fabrice a Left join product_item i On a.PCID=i.ID " . $condition;

        elseif ($mode == 'total'):
            //$sql = "SELECT SUM(TQty)TQty,SUM(Balance) Balance FROM web_fabrice " . $condition;
            $sql = '';
        else:
            $field = array(
                'a.*',
                'i.PCode,i.PDetail,i.SPrice,i.SPrice2,i.Unit,i.SPrice3,(SELECT Name FROM width WHERE ID=i.PWidth) PWidth'
            );

            $sql = 'SELECT ' . implode(', ', $field) . ' FROM web_fabrice a Left join product_item i On a.PCID=i.ID' . $condition . ' ORDER BY ' . $order_by;
        endif;
        return $sql;
    }

    public function sqlBlog($param, $mode = 'query') {
        $arr = (is_array($param)) ? $param : unserialize(urldecode($param));
        $condition = $this->conBlog($arr);
        $condition = (!empty($condition)) ? ' WHERE ' . $condition : '';

        $order_by = '';
        if (isset($arr['chkNewOld']) && $arr['chkNewOld'] > 0):
            $order_by = 'BlogDate desc,Seq asc';
        endif;
        if (isset($arr['chkOldNew']) && $arr['chkOldNew'] > 0):
            $order_by .= ($order_by != "") ? ',' : '';
            $order_by .= 'BlogDate asc,Seq asc';
        endif;
        if (empty($order_by)):
            $order_by = 'Seq asc';
        endif;

        if ($mode == 'count'):
            $sql = "SELECT COUNT(ID) total FROM web_blog " . $condition;

        elseif ($mode == 'total'):
            //$sql = "SELECT SUM(TQty)TQty,SUM(Balance) Balance FROM web_blog " . $condition;
            $sql = '';
        else:
            $field = array(
                '*',
                '(Select BlogPhoto From web_blog_gallery Where BlogID=web_blog.ID Order by Seq asc Limit 1)ImgBanner'
            );

            $sql = 'SELECT ' . implode(', ', $field) . ' FROM web_blog ' . $condition . ' ORDER BY ' . $order_by;
        endif;
        return $sql;
    }

}
