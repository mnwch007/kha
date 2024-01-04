<?php

/*
  |--------------------------------------------------------------------------
  | Manage url
  |--------------------------------------------------------------------------
 */
if (!function_exists('real_path')) {

    function real_path($url = '') {
        return FCPATH . $url;
    }

}

if (!function_exists('assets')) {

    function assets($url = '') {
        return base_url('public/assets/' . $url);
    }

}

if (!function_exists('img_path')) {

    function img_path($url = '') {
        return base_url('uploads/' . $url);
    }

}


if (!function_exists('get_lang')) {

    function get_lang() {
        $CI = & get_instance();
        $lang = $CI->session->userdata('scu_bulliontexweb_lang');
        return $lang;
    }

}

if (!function_exists('base_url_lang')) {

    function base_url_lang($url = '', $lang = '') {
        if (!empty($lang)):
            $url = $lang . '/' . $url;
        endif;
        return base_url($url);
    }

}

if (!function_exists('convertYoutube')) {

    function convertYoutube($url) {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id;
    }

}

if (!function_exists('FileSizeConvert')) {

    function FileSizeConvert($bytes) {
        $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

        foreach ($arBytes as $arItem) {
            if ($bytes >= $arItem["VALUE"]) {
                $result = $bytes / $arItem["VALUE"];
                //$result = str_replace(".", ",", strval(round($result, 2))) . " " . $arItem["UNIT"];
                $result = strval(round($result, 2)) . " " . $arItem["UNIT"];
                break;
            }
        }
        return $result;
    }

}


if (!function_exists('get_pcode_lang')) {

    function get_pcode_lang($arr = [], $lang = 'th') {
        $str = '';
        if ($lang == 'en'):
            $str = (isset($arr['WebNameEn']) && $arr['WebNameEn'] != "") ? $arr['WebNameEn'] : $arr['PCode'];
        else:
            $str = (isset($arr['WebNameTh']) && $arr['WebNameTh'] != "") ? $arr['WebNameTh'] : $arr['PCode'];
        endif;
        return $str;
    }

}
if (!function_exists('get_pname_lang')) {

    function get_pname_lang($arr = [], $lang = 'th') {
        $str = '';
        if ($lang == 'en'):
            $str = (isset($arr['ShortDesEn']) && $arr['ShortDesEn'] != "") ? $arr['ShortDesEn'] : $arr['PDetail'];
        else:
            $str = (isset($arr['ShortDesTh']) && $arr['ShortDesTh'] != "") ? $arr['ShortDesTh'] : $arr['PDetail'];
        endif;
        return $str;
    }

}

if (!function_exists('gen_barcode')) {

    function gen_barcode($id) {
        $syear = date('y');
        $month = date('m');
        $code = $syear . $month . sprintf("%06d", $id);
        return $code;
    }

}
if (!function_exists('date_thai')) {

    function date_thai($strDate, $lang = '') {
        $txt = '';
        if ($strDate != '' and $strDate != '0000-00-00' and $strDate != '0000-00-00 00:00:00') {
            $strYear = ($lang == 'en') ? date("Y", strtotime($strDate)) : date("Y", strtotime($strDate)) + 543;
            $strMonth = date("n", strtotime($strDate));
            $strDay = date("j", strtotime($strDate));
            $strHour = date("H", strtotime($strDate));
            $strMinute = date("i", strtotime($strDate));
            $strSeconds = date("s", strtotime($strDate));
            if ($lang == 'en'):
                $strMonthCut = [1 => 'January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            else:
                $strMonthCut = [1 => 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
            endif;

            $strMonthThai = $strMonthCut[round($strMonth)];
            $txt = "$strDay $strMonthThai $strYear";
        }
        return $txt;
    }

}


/*
  |--------------------------------------------------------------------------
  | Manage Data Array
  |--------------------------------------------------------------------------
 */

if (!function_exists('get_control')) {

    function get_control($control) {
        $str_arr = explode('\\', $control);
        // return end(explode('\\', $control));
        return end($str_arr);
    }

}


if (!function_exists('show_total_records')) {

    function show_total_records($num = 0) {
        $total = ($num > 1) ? str_replace('[@total_records]', $num, lang('global_lang.found')) : str_replace('[@total_records]', $num, lang('global_lang.found2'));
        return $total;
    }

}

if (!function_exists('single_arr')) {

    function single_arr($id, $val, $arrData) {
        $arr = array();
        $arr_v = (empty($val) && isset($arrData[0])) ? array_keys($arrData[0]) : explode(',', $val);

        if (count($arr_v) == 1):
            foreach ($arrData as $data):
                $arr[$data[$id]] = $data[$val];
            endforeach;
        else:
            foreach ($arrData as $data):
                $arr2 = array();
                foreach ($arr_v as $field):
                    $arr2[$field] = $data[$field];
                endforeach;
                $arr[$data[$id]] = $arr2;
            endforeach;
        endif;

        return $arr;
    }

}

if (!function_exists('multiple_arr')) {

    function multiple_arr($id, $arrData) {
        $arr = array();

        foreach ($arrData as $data):
            if (!isset($arr[$data[$id]])):
                $arr[$data[$id]] = array();
            endif;
            $arr[$data[$id]][] = $data;
        endforeach;

        return $arr;
    }

}

if (!function_exists('multiple_field_arr')) {

    function multiple_field_arr($id, $field, $arrData) {
        $arr = array();

        foreach ($arrData as $data):
            if (!isset($arr[$data[$id]])):
                $arr[$data[$id]] = array();
            endif;
            $arr[$data[$id]][] = $data[$field];
        endforeach;

        return $arr;
    }

}
if (!function_exists('sum_w')) {

    function sum_w($arr, $start, $end) {
        return array_sum(array_slice($arr, $start, $end));
    }

}
if (!function_exists('sum_arr')) {

    function sum_arr($arr, $start, $end) {
        return array_sum(array_slice($arr, $start, $end));
    }

}
if (!function_exists('isset_arr')) {

    function isset_arr($field, $arr) {
        return (isset($arr[$field])) ? $arr[$field] : '';
    }

}

if (!function_exists('isset_arr_decimal_null')) {

    function isset_arr_decimal_null($field, $arr, $decimal = 0) {
        $ret = '';
        if ((isset($arr[$field])) && $arr[$field] > 0):
            $ret = decimal_null($arr[$field], $decimal);
        endif;
        return $ret;
    }

}


if (!function_exists('isset_arr_field')) {

    function isset_arr_field($field, $arr) {
        $multi = array();
        if (is_array($field)):
            foreach ($field as $f):
                $multi[] = (isset($arr[$f])) ? $arr[$f] : '';
            endforeach;
        endif;

        return implode(', ', $multi);
    }

}

if (!function_exists('print_arr')) {

    function print_arr($arr) {
        echo '<pre>', print_r($arr), '</pre>';
    }

}

if (!function_exists('array_recursive_search_key_map')) {

    function array_recursive_search_key_map($needle, $haystack) {
        foreach ($haystack as $first_level_key => $value) {
            if ($needle === $value) {
                return array($first_level_key);
            } elseif (is_array($value)) {
                $callback = array_recursive_search_key_map($needle, $value);
                if ($callback) {
                    return array_merge(array($first_level_key), $callback);
                }
            }
        }
        return false;
    }

}
if (!function_exists('array_recursive')) {

    function array_recursive($array) {
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $array[$key] = array_recursive($value);
                }
                if ($value instanceof stdClass) {
                    $array[$key] = array_recursive((array) $value);
                }
            }
        }
        if ($array instanceof stdClass) {
            return array_recursive((array) $array);
        }

        return $array;
    }

}

if (!function_exists('array_search_mdi')) {

    function array_search_mdi($array, $key, $value) {
        $results = array();

        if (is_array($array)) {
            if (isset($array[$key]) && $array[$key] == $value)
                $results[] = $array;

            foreach ($array as $subarray)
                $results = array_merge($results, array_search_mdi($subarray, $key, $value));
        }

        return $results;
    }

}

if (!function_exists('arr_repeat')) {

    function arr_repeat($var) {
        return $var > 1;
    }

}

if (!function_exists('arr_unique')) {

    function arr_unique($var) {
        return $var == 1;
    }

}

if (!function_exists('arr_flatten')) {

    function arr_flatten($arr, $out = array()) {
        foreach ($arr as $item) {
            if (is_array($item)) {
                $out = array_merge($out, arr_flatten($item));
            } else {
                $out[] = $item;
            }
        }
        return $out;
    }

}

/*
  |--------------------------------------------------------------------------
  | Filter Input Form
  |--------------------------------------------------------------------------
 */
if (!function_exists('filter_txt')) {

    function filter_txt($field = '') {
        return htmlspecialchars(strip_tags(trim($field)), ENT_QUOTES);
    }

}
if (!function_exists('filter_html')) {

    function filter_html($field = '') {
        return htmlspecialchars(trim($field), ENT_QUOTES);
    }

}

if (!function_exists('filter_number')) {

    function filter_number($field = '') {
        $field = str_replace(",", "", trim($field));
        return ($field <> 0) ? $field : 0;
    }

}

if (!function_exists('filter_date')) {

    function filter_date($field = '') {
        return htmlspecialchars(strip_tags(trim($field)), ENT_QUOTES);
    }

}

if (!function_exists('filter_arr_to_list')) {

    function filter_arr_to_list($arr = array()) {
        $field = (is_array($arr)) ? implode(',', $arr) : '';
        return $field;
    }

}

if (!function_exists('filter_pcode_urlencode')) {

    function filter_pcode_urlencode($field = '') {
        return rawurlencode(str_replace('/', '_', $field));
    }

}

if (!function_exists('filter_pcode_urldecode')) {

    function filter_pcode_urldecode($field = '') {
        return rawurldecode(str_replace('_', '/', $field));
    }

}

if (!function_exists('filter_remove_utf8_bom')) {

    function filter_remove_utf8_bom($text) {
        $bom = pack('H*', 'EFBBBF');
        $text = preg_replace("/^$bom/", '', $text);
        return $text;
    }

}



if (!function_exists('get_domain_url')) {

    function get_domain_url($path = '') {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'] . '/';
        return $protocol . $domainName . $path;
    }

}

/*
  |--------------------------------------------------------------------------
  | Convert Data
  |--------------------------------------------------------------------------
 */
if (!function_exists('convert_html')) {

    function convert_html($field = '') {
        return htmlspecialchars_decode($field, ENT_QUOTES);
    }

}
if (!function_exists('html_entity')) {

    function html_entity($field = '') {
        return htmlentities($field, ENT_QUOTES);
    }

}

if (!function_exists('dateFormat')) {

    function dateFormat($date = null, $format = 'd/m/Y') {
        if ($date != '' and $date != '0000-00-00' and $date != '0000-00-00 00:00:00') {
            $value = date($format, strtotime($date));
        } else {
            $value = '';
        }
        return $value;
    }

}
if (!function_exists('dateTimeFormat')) {

    function dateTimeFormat($date = null, $format = 'd/m/Y H:m:s') {
        if ($date != '' and $date != '0000-00-00' and $date != '0000-00-00 00:00:00') {
            $value = date($format, strtotime($date));
        } else {
            $value = '';
        }
        return $value;
    }

}
if (!function_exists('timeFormat')) {

    function timeFormat($time = '') {
        if ($time != ''):
            $arr = explode(':', $time);
            $time = sprintf("%02d", $arr[0]) . ':' . sprintf("%02d", $arr[1]);
        endif;

        return $time;
    }

}


if (!function_exists('get_duedate')) {

    function get_duedate($date = null, $term) {
        if ($term == '1'):  // Cash
            $duedate = $date;

//        elseif ($term == '2'):  // Cash
//            $TimeIssue = strtotime($date);
//            $caltime = strtotime("+30 Day", $TimeIssue);
//            $duedate = date("Y-m-d", $caltime);

        else:
            $TimeIssue = strtotime($date);
            $caltime = strtotime("+" . $term . " Day", $TimeIssue);
            $duedate = date("Y-m-d", $caltime);

        endif;

        return $duedate;
    }

}

if (!function_exists('convert_qty_unit')) {

    function convert_qty_unit($funit, $tunit, $qty) {
        if ($funit != $tunit):
            if ($funit == 'Y' && $tunit == 'M'):
                $qty = convert_ytom($qty);
            elseif ($funit == 'M' && $tunit == 'Y'):
                $qty = convert_mtoy($qty);
            else:
                $qty = 0;
            endif;
        endif;

        return $qty;
    }

}
if (!function_exists('convert_price_unit')) {

    function convert_price_unit($funit, $tunit, $price) {
        if ($funit != $tunit):
            if ($funit == 'Y' && $tunit == 'M'):
                $price = convert_mtoy($price);
            elseif ($funit == 'M' && $tunit == 'Y'):
                $price = convert_ytom($price);
            else:
                $price = 0;
            endif;
        endif;

        return $price;
    }

}

if (!function_exists('convert_ytom')) {

    function convert_ytom($qty) {
        return round($qty * 0.9144, 2);
    }

}

if (!function_exists('convert_mtoy')) {

    function convert_mtoy($qty) {
        return round($qty / 0.9144, 2);
    }

}

/*
  |--------------------------------------------------------------------------
  | Function Display
  |--------------------------------------------------------------------------
 */
if (!function_exists('decimal_null_web')) {

    function decimal_null_web($value, $decimal = 0) {
        return $value <> 0 ? str_replace('.00', '', number_format($value, $decimal)) : '';
    }

}
if (!function_exists('decimal_null')) {

    function decimal_null($value, $decimal = 0) {
        return $value <> 0 ? number_format($value, $decimal) : '';
    }

}

if (!function_exists('decimal_dash')) {

    function decimal_dash($value, $decimal = 0) {
        return $value <> 0 ? number_format($value, $decimal) : '-';
    }

}

if (!function_exists('show_price')) {

    function show_price($number, $perm = 0) {
        return $perm > 0 ? decimal_dash($number, 2) : '-';
    }

}
if (!function_exists('show_price2')) {

    function show_price2($number, $perm = 0) {
        return $perm > 0 ? decimal_null($number, 2) : '';
    }

}



if (!function_exists('empty_all')) {

    function empty_all($txt, $perm = 0) {
        return (!empty($txt)) ? $txt : '-';
    }

}

if (!function_exists('ex_price')) {

    function ex_price($number, $perm = 0) {
        return $perm > 0 ? $number : 0;
    }

}
if (!function_exists('gen_tooltip')) {

    function gen_tooltip($arr = '', $spilt = '') {
        $html = "";
        if (count($arr) > 0):
            $txt = implode($spilt, $arr);
            $html = '<button type="button" class="btn ic-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" data-bs-original-title="' . $txt . '"></button>';
        endif;
        return $html;
    }

}

if (!function_exists('gen_html_rolls_in')) {

    function gen_html_rolls_in($arr, $html = '') {
        $html = '';
        if (is_array($arr)):
            $arr_m = array_chunk($arr, 10);
            foreach ($arr_m as $mval):
                $h_arr = array();
                foreach ($mval as $val):
                    $dclass = ($val['Qty'] == 0) ? 'strike_out' : '';
                    $h_arr[] = '<span class="' . $dclass . '">' . round($val['OrQty'], 2) . '</span>';
                endforeach;
                $html .= implode('&nbsp;,&nbsp;', $h_arr) . '<br />';
            endforeach;
        endif;
        return $html;
    }

}

if (!function_exists('gen_html_rolls')) {

    function gen_html_rolls($arr, $html = '') {
        $html = '';
        if (is_array($arr)):
            $arr_m = array_chunk($arr, 10);
            foreach ($arr_m as $mval):
                $h_arr = array();
                foreach ($mval as $val):
                    $dclass = (isset($val['RtStatus']) && $val['RtStatus'] == 1) ? 'strike_out' : '';
                    $h_arr[] = '<span class="' . $dclass . '">' . round($val['Qty'], 2) . '</span>';
                endforeach;
                $html .= implode('&nbsp;,&nbsp;', $h_arr) . '<br />';
            endforeach;
        endif;

        return $html;
    }

}

if (!function_exists('gen_html_rolls2')) {

    function gen_html_rolls2($arr, $html = '') {
        $html = '';
        if (is_array($arr)):
            $arr_m = array_chunk($arr, 10);
            foreach ($arr_m as $mval):
                $h_arr = array();
                foreach ($mval as $val):
                    $dclass = (isset($val['RtStatus']) && $val['RtStatus'] == 1) ? 'strike_out' : '';
                    $h_arr[] = '<span class="' . $dclass . '">' . round($val['Qty'], 2) . '</span>';
                endforeach;
                $html .= implode('&nbsp;,&nbsp;', $h_arr) . '&nbsp;,&nbsp;';
            endforeach;
        endif;

        return $html;
    }

}


if (!function_exists('gen_html_rolls_split')) {

    function gen_html_rolls_split($rolllist) {
        $html = '';
        if (!empty($rolllist)):
            $arr = explode(',', $rolllist);
            $arr_m = array_chunk($arr, 10);
            foreach ($arr_m as $mval):
                $h_arr = array();
                foreach ($mval as $qty):
                    $h_arr[] = '<span>' . round($qty, 2) . '</span>';
                endforeach;
                $html .= implode(', ', $h_arr) . '<br />';
            endforeach;
        endif;

        return $html;
    }

}

if (!function_exists('gen_dropdown')) {

    function gen_dropdown($first, $arr, $name, $id, $value, $display, $default = '', $option_display = '') {
        $arr = (is_array($arr)) ? $arr : unserialize($arr);

        $txt_id = (empty($id)) ? '' : 'id="' . $id . '"';
        $html = '<select name="' . $name . '" ' . $txt_id . ' ' . $display . '>';
        if ($default != ''):
            $html .= '<option value="' . $first . '"  >' . $default . '</option>';
        endif;

        if (is_array($arr)):
            foreach ($arr as $key => $val):
                if (is_array($value)):
                    $selected = ( in_array($key, $value) ) ? ' selected ' : '';
                else:
                    $selected = ( $value == $key and $value != '' ) ? ' selected ' : '';
                endif;

                $selected .= (empty($selected) and $option_display == 1) ? ' disabled ' : '';
                $html .= '<option value="' . $key . '" ' . $selected . ' >' . $val . '</option>';
            endforeach;
        endif;

        $html .= '</select>';

        return $html;
    }

}

if (!function_exists('gen_dropdown_base')) {

    function gen_dropdown_base($first, $arr, $name, $id, $value, $display, $default = '', $option_display = '', $attr = '') {
        $arr = (is_array($arr)) ? $arr : unserialize($arr);

        $txt_id = (empty($id)) ? '' : 'id="' . $id . '"';
        $html = '<select name="' . $name . '" ' . $txt_id . ' ' . $display . '>';
        if ($default != ''):
            $html .= '<option value="' . $first . '"  >' . $default . '</option>';
        endif;

        if (is_array($arr)):
            foreach ($arr as $key => $val):
                if (is_array($value)):
                    $selected = ( in_array($val['ID'], $value) ) ? ' selected ' : '';
                else:
                    $selected = ( $value == $val['ID'] and $value != '' ) ? ' selected ' : '';
                endif;

                if (!empty($attr)):
                    $arr_attr = explode(',', $attr);
                    foreach ($arr_attr as $akey => $aval):
                        $selected .= $aval . '="' . $val[$aval] . '" ';
                    endforeach;
                endif;

                $selected .= (empty($selected) and $option_display == 1) ? ' disabled ' : '';
                $html .= '<option value="' . $val['ID'] . '" ' . $selected . ' >' . $val['Name'] . '</option>';
            endforeach;
        endif;

        $html .= '</select>';

        return $html;
    }

}

if (!function_exists('gen_dropdown_2di')) {

    function gen_dropdown_2di($first, $arr, $name, $id, $value, $display, $default = '', $option_display = '') {
        $arr = (is_array($arr)) ? $arr : unserialize($arr);

        $txt_id = (empty($id)) ? '' : 'id="' . $id . '"';
        $html = '<select name="' . $name . '" ' . $txt_id . ' ' . $display . '>';
        if ($default != ''):
            $html .= '<option value="' . $first . '"  >' . $default . '</option>';
        endif;

        if (is_array($arr)):
            foreach ($arr as $mkey => $mval):
                if (is_array($mval['detail']) && count($mval['detail']) > 0):
                    $html .= '<optgroup label="' . $mval['Name'] . '">';

                    foreach ($mval['detail'] as $key => $val):
                        if (is_array($value)):
                            $selected = ( in_array($val['ID'], $value) ) ? ' selected ' : '';
                        else:
                            $selected = ( $value == $val['ID'] and $value != '' ) ? ' selected ' : '';
                        endif;

                        $selected .= (empty($selected) and $option_display == 1) ? ' disabled ' : '';
                        $html .= '<option value="' . $val['ID'] . '" ' . $selected . ' >' . $val['Name'] . '</option>';
                    endforeach;

                    $html .= '</optgroup>';
                endif;
            endforeach;
        endif;

        $html .= '</select>';

        return $html;
    }

}

if (!function_exists('image_tmb')) {

    function image_tmb($path = '', $cache = 0) {
        $html = '<img src="' . base_url('uploads/nopic.jpg') . '" class="tmp_img"  />';

        if (!empty($path) && file_exists('' . $path)):
            $time = ($cache == 1) ? '?' . time() : '';
            $html = '<a href="' . base_url('' . $path . $time) . '" class="preview" target="_blank"><img src="' . base_url('' . $path) . $time . '" class="tmp_img"  /></a>';
        endif;

        return $html;
    }

}

if (!function_exists('image_gallery')) {

    function image_gallery($path = '', $width, $cache = 0) {
        $html = '';

        if (!empty($path) && file_exists('' . $path)):
            $time = ($cache == 1) ? '?' . time() : '';
            $html = '<a href="' . base_url('' . $path) . '"  data-gallery="" style="margin:5px;"><img src="' . base_url('' . $path) . $time . '"  width="' . $width . '" /></a>';
        endif;

        return $html;
    }

}


if (!function_exists('image_show')) {

    function image_show($path = '', $width, $cache = 0) {
        if (!empty($path) && file_exists('' . $path)):
            $time = ($cache == 1) ? '?' . time() : '';
            $html = '<a href="' . base_url('' . $path) . '" target="_blank"><img src="' . base_url('' . $path) . $time . '" width="' . $width . '" /></a>';
        else:
            $html = '<img src="' . base_url('uploads/nopic.jpg') . '" width="' . $width . '" />';
        endif;

        return $html;
    }

}

if (!function_exists('image_slip')) {

    function image_slip($path = '', $cache = 0) {
        $html = '';
        if (!empty($path) && file_exists('mobile-retail/' . $path)):
            $time = ($cache == 1) ? '?' . time() : '';
            $html = '<div class="dic"><a href="' . base_url('mobile-retail/' . $path) . '" class="preview" target="_blank"><img src="' . base_url('mobile-retail/' . $path) . $time . '" class="tmp_img"  /></a></div>';
        endif;

        return $html;
    }

}

if (!function_exists('round_qty')) {

    function round_qty($arr) {
        return round($arr['Qty'], 2);
    }

}



if (!function_exists('gen_product_name')) {

    function gen_product_name($arr, $mode = 'cus', $farr = array()) {
        $html = '';
        if ($mode == 'sup'):
            $html .= $arr['PSCode'];
            $html .= (empty($arr['PSColor'])) ? '' : ' - ' . $arr['PSColor'];
        elseif ($mode == 'cus'):
            $html .= $arr['PCode'];
            $html .= (empty($arr['PColor'])) ? '' : ' - ' . $arr['PColor'];
        endif;

        if (in_array('color', $farr)):
            $html .= (empty($arr['PColor'])) ? '' : ' ' . $arr['PColor'];
        endif;
        if (in_array('type', $farr)):
            $html .= (empty($arr['PType'])) ? '' : ' ' . $arr['PType'];
        endif;
        if (in_array('name', $farr)):
            $html .= (empty($arr['PName'])) ? '' : ' ' . $arr['PName'];
        endif;
        if (in_array('width', $farr)):
            $html .= (empty($arr['PWidth'])) ? '' : ' ' . $arr['PWidth'];
        endif;

        return html_entity_decode($html, ENT_QUOTES);
    }

}

if (!function_exists('gen_product_item')) {

    function gen_product_item($arr, $mode = 'cus', $farr = array()) {
        if ($mode == 'sup'):
            $html = $arr['PSCode'];
        else:
            $html = $arr['PCode'];
        endif;

        if (in_array('type', $farr)):
            $html .= (empty($arr['PType'])) ? '' : ' ' . $arr['PType'];
        endif;
        if (in_array('name', $farr)):
            $html .= (empty($arr['PName'])) ? '' : ' ' . $arr['PName'];
        endif;
        if (in_array('width', $farr)):
            $html .= (empty($arr['PWidth'])) ? '' : ' ' . $arr['PWidth'];
        endif;

        return html_entity_decode($html, ENT_QUOTES);
    }

}

if (!function_exists('gen_product_name_bc')) {

    function gen_product_name_bc($arr, $mode = 'cus', $farr = array()) {
        if ($mode == 'sup'):
            $html = $arr['PSCode'];
        //$html .= (empty($arr['PSColor'])) ? '' : ' - ' . $arr['PSColor'];
        else:
            $html = $arr['PCode'];
        //$html .= (empty($arr['PColor'])) ? '' : ' - ' . $arr['PColor'];
        endif;

        if (in_array('type', $farr)):
            $html .= (empty($arr['PType'])) ? '' : ' ' . $arr['PType'];
        endif;
        if (in_array('name', $farr)):
            $html .= (empty($arr['PName'])) ? '' : ' ' . $arr['PName'];
        endif;
        if (in_array('width', $farr)):
            $html .= (empty($arr['PWidth'])) ? '' : ' ' . $arr['PWidth'];
        endif;

        return html_entity_decode($html, ENT_QUOTES);
    }

}

if (!function_exists('gen_html_rolls_lot')) {

    function gen_html_rolls_lot($arr, $html = '') {
        if (is_array($arr)):
            $arr_lot = multiple_arr('FLOT', $arr);

            foreach ($arr_lot as $lotno => $lotinfo):
                $arr_m = array_chunk($lotinfo, 10);
                $rolls = '';
                foreach ($arr_m as $mval):
                    $h_arr = array();
                    foreach ($mval as $val):
                        $dclass = ($val['RtStatus'] == 1) ? 'strike_out' : '';
                        $dclass .= (isset($val['DvID']) && $val['DvID'] > 0) ? 'delivered_out' : '';
                        $h_arr[] = '<span class="' . $dclass . '">' . $val['Qty'] . '</span>';
                    endforeach;
                    $rolls .= implode('&nbsp;&nbsp;', $h_arr) . '<br />';
                endforeach;
                $html .= '<div class="table">'
                        . '<div style="width:100px; text-align:center;">' . $lotno . '</div>'
                        . '<div style="border-right:0;">' . $rolls . '</div>'
                        . '</div>';
            endforeach;

        endif;

        return $html;
    }

}

if (!function_exists('gen_html_rolls_out')) {

    function gen_html_rolls_out($arr, $html = '') {
        if (is_array($arr)):
            $arr_m = array_chunk($arr, 10);
            foreach ($arr_m as $mval):
                $h_arr = array();
                foreach ($mval as $val):
                    $dclass = ($val['RtStatus'] == 1) ? 'strike_out' : '';
                    $dclass .= (isset($val['DvID']) && $val['DvID'] > 0) ? 'delivered_out' : '';
                    $h_arr[] = '<span class="' . $dclass . '">' . round($val['Qty'], 2) . '</span>';
                endforeach;
                $html .= implode(', ', $h_arr) . '<br />';
            endforeach;
        endif;

        return $html;
    }

}

if (!function_exists('gen_form_rolls_out')) {

    function gen_form_rolls_out($no, $arr) {
        $html = '';
        if (is_array($arr)):
            foreach ($arr as $val):
                $html .= '<input type="text" name="txtUQty' . $no . '[]" id="txtUQty' . $val['StID'] . '" class="roll" value="' . $val['Qty'] . '" ref-name="roll" ref-row="' . $no . '" stid="' . $val['StID'] . '" title="Remove roll"><input type="hidden" name="hidFStID' . $no . '[]" id="hidFStID' . $val['StID'] . '" value="' . $val['StID'] . '" ref-name="roll_id">';
            endforeach;
        endif;

        return $html;
    }

}

if (!function_exists('gen_cusname')) {

    function gen_cusname($arr) {
        $html = (empty($arr['BName'])) ? '' : $arr['BName'];
        $html .= (empty($arr['LName'])) ? '' : ' ' . $arr['LName'];
        if (isset($arr['NName'])):
            $html .= (empty($arr['NName'])) ? '' : ' ( ' . $arr['NName'] . ' )';
        endif;

        return html_entity_decode($html, ENT_QUOTES);
    }

}

if (!function_exists('gen_addr_cusname')) {

    function gen_addr_cusname($arr, $farr = array()) {
        $html = (empty($arr['FName'])) ? '' : $arr['FName'];
        $html .= (empty($arr['LName'])) ? '' : ' ' . $arr['LName'];
        if (isset($arr['NName'])):
            $html .= (empty($arr['NName'])) ? '' : ' ( ' . $arr['NName'] . ' )';
        endif;

        if (in_array('Branch', $farr)):
            $html .= (empty($arr['BranchNo'])) ? '' : ' (' . $arr['BranchNo'] . ')';
        endif;

        return html_entity_decode($html, ENT_QUOTES);
    }

}


if (!function_exists('gen_address')) {

    function gen_address($addr) {
        $html = '';

        $chr1 = array('แขวง', 'เขต', '');
        $chr2 = array('ต.', 'อ.', 'จ.');

        $chr = ($addr['ProvinceID'] == 1) ? $chr1 : $chr2;
        $html = $addr['Address'] . ' ';
        $html .= !empty($addr['District']) ? $chr[0] . trim($addr['District']) . ' ' : ' ';
        $html .= !empty($addr['Amphure']) ? $chr[1] . trim($addr['Amphure']) . ' ' : '';
        $html .= !empty($addr['Province']) ? $chr[2] . trim($addr['Province']) . ' ' . trim($addr['Postcode']) . ' ' : '';

        return $html;
    }

}

function func_query_insert($table, $values) {
    while ($element = each($values)) {
        $insert[$element["key"]] = "'" . $element["value"] . "'";
    }

    return "INSERT INTO " . $table . " (" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
}

function func_query_update($table, $values, $where) {
    foreach ($values as $key => $val) {
        $valstr[] = $key . " = '" . $val . "'";
    }

    $sql = "UPDATE " . $table . " SET " . implode(', ', $valstr);
    $sql .= ($where != '') ? " WHERE " . $where : '';

    return $sql;
}

function ThaiBahtConversion($amount_number) {
    $amount_number = number_format($amount_number, 2, ".", "");
    //echo "<br/>amount = " . $amount_number . "<br/>";
    $pt = strpos($amount_number, ".");
    $number = $fraction = "";
    if ($pt === false)
        $number = $amount_number;
    else {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }

    //list($number, $fraction) = explode(".", $number);
    $ret = "";
    $baht = ReadNumber($number);
    if ($baht != "")
        $ret .= $baht . "บาท";

    $satang = ReadNumber($fraction);
    if ($satang != "")
        $ret .= $satang . "สตางค์";
    else
        $ret .= "ถ้วน";
    //return iconv("UTF-8", "TIS-620", $ret);
    return $ret;
}

function ReadNumber($number) {
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0)
        return $ret;
    if ($number > 1000000) {
        $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }

    $divider = 100000;
    $pos = 0;
    while ($number > 0) {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" :
                ((($divider == 10) && ($d == 1)) ? "" :
                ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
}
