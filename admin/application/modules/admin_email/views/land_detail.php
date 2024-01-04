<style type="text/css">
    .tbl_landsale tr td:first-child{
        font-weight: 500;
    }
    .map-block {
        padding: 0;
        position: relative;
        margin: 0;
    }
</style>
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
    <!-- BEGIN: Left Aside -->
    <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
        <i class="la la-close"></i>
    </button>
    <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
        <!-- BEGIN: Aside Menu -->
        <?php $this->load->view('inc-menu'); ?>
        <!-- END: Aside Menu -->
    </div>
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-setfont__main m-subheader__title--separator">
                        View Detail
                    </h3>
                    <?php
                    $this->load->view('inc-bread-email.php', [
                        'data' => [
                            'sq' => true,
                            'page_url' => $page_url,
                            'page_id' => $edit_id
                        ]
                    ]);
                    ?>
                    <div class="floting-proj">Land for sale</div>
                </div>
            </div>
        </div>


        <!--ข้อมูลผู้เสนอ (เจ้าของที่, บุคคล)
        ชื่อ	: test
        นามสกุล	: admin
        เบอร์โทร	: 09984878788
        อีเมล์	: mnw@gmail.com
         
        รายละเอียดที่ดิน
        เนื้อที่	: 100 ไร่
        ราคาเสนอขายต่อตารางวา	: 190000
        จังหวัด	: กรุงเทพมหานคร
        อำเภอ / เขต	: เขต พระนคร
        แขวง / ตำบล	: พระบรมมหาราชวัง
        ถนน	: test
        รายละเอียด	: ทดสอบ admin-->


        <!-- END: Subheader -->
        <div class="m-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Portlet-->
                    <div class="m-portlet">
                        <!--begin::Form-->
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-8">
                                    <?php
                                    $txt_name = "";
                                    if ($arrayS['personal'] == 1):
                                        //นิติบุคคล
                                        $txt_name = '
                     <tr>
                <td valign="middle" align="right" width="200">ชื่อบริษัท</td>
                 <td valign="middle" align="left">: ' . $arrayS['corp_name'] . '</td>
            </tr>  
            <tr>
                <td valign="middle" align="right">ทะเบียนบริษัท</td>
                 <td valign="middle" align="left">: ' . $arrayS['corp_regisno'] . '</td>
            </tr>  
                     ';

                                    else:
                                        //บุคคล
                                        $txt_name = '
                     <tr>
                <td valign="middle" align="right" width="200">ชื่อ</td>
                 <td valign="middle" align="left">: ' . $arrayS['firstname'] . '</td>
            </tr>  
            <tr>
                <td valign="middle" align="right">นามสกุล</td>
                 <td valign="middle" align="left">: ' . $arrayS['lastname'] . '</td>
            </tr>  
                     ';

                                    endif;

                                    $file_up = "-";
                                    if ($arrayS['image'] != ""):
                                        $file_up = ' <a href="' . base_url('../uploads/landofsales/' . $arrayS['image']) . '" target="_blank"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;ดาวน์โหลด</a>';
                                    endif;


                                    $detail_a = '
          <table class="tbl_landsale" width="100%" border="0" cellpadding="5" cellspacing="3">
                <tr>
                    <td valign="middle" align="left" colspan="2"><strong>ข้อมูลผู้เสนอ</strong> (' . (($arrayS['owns'] == 1) ? 'เจ้าของที่' : 'นายหน้า') . ', ' . (($arrayS['personal'] == 1) ? 'นิติบุคคล' : 'บุคคล') . ')</td>
                </tr>  
             ' . $txt_name . '
            <tr>
                <td valign="middle" align="right">เบอร์โทร</td>
                 <td valign="middle" align="left">: ' . $arrayS['phone'] . '</td>
            </tr>  
            <tr>
                <td valign="middle" align="right">อีเมล์</td>
                 <td valign="middle" align="left">: ' . $arrayS['email'] . '</td>
            </tr>  
            <tr>
                    <td valign="middle" align="left" colspan="2">&nbsp;</td>
                </tr>  
             <tr>
                    <td valign="middle" align="left" colspan="2"><strong>รายละเอียดที่ดิน</strong></td>
                </tr>  
                
            <tr>
                <td valign="middle" align="right">เนื้อที่</td>
                 <td valign="middle" align="left">: ' . $arrayS['aker'] . '</td>
            </tr>  
            <tr>
                <td valign="middle" align="right">ราคาเสนอขายต่อตารางวา</td>
                 <td valign="middle" align="left">: ' . number_format($arrayS['prices'], 2) . ' บาท</td>
            </tr>  
            <tr>
                <td valign="middle" align="right">จังหวัด</td>
                 <td valign="middle" align="left">: ' . $arrayS['ProvName'] . '</td>
            </tr>  
            <tr>
                <td valign="middle" align="right">อำเภอ / เขต</td>
                 <td valign="middle" align="left">: ' . $arrayS['DistName'] . '</td>
            </tr>  
            <tr>
                <td valign="middle" align="right">แขวง / ตำบล</td>
                 <td valign="middle" align="left">: ' . $arrayS['SubDistName'] . '</td>
            </tr>  
            <tr>
                <td valign="middle" align="right">ถนน</td>
                 <td valign="middle" align="left">: ' . $arrayS['road'] . '</td>
            </tr>  
            <tr>
                <td valign="middle" align="right">รายละเอียด</td>
                 <td valign="middle" align="left">: ' . $arrayS['detail'] . '</td>
            </tr>  
            <tr>
                    <td valign="middle" align="left" colspan="2">&nbsp;</td>
                </tr>
                  <tr>
                    <td valign="middle" align="left" colspan="2"><strong>ไฟล์ที่อัพโหลด</strong></td>
                </tr>
                <tr>
                 <td valign="middle" align="left" colspan="2" style="font-weight: 400;">' . $file_up . '</td>
            </tr>
            <tr>
                    <td valign="middle" align="left" colspan="2">&nbsp;</td>
                </tr>
                  <tr>
                    <td valign="middle" align="left" colspan="2"><strong>พิกัดที่ดิน</strong></td>
                </tr>
                <tr>
                 <td valign="middle" align="left" colspan="2" style="font-weight: 400;"><strong>ละติจูด :</strong> ' . $arrayS['latitude'] . '&nbsp;&nbsp;&nbsp;<strong>ลองติจูด :</strong> ' . $arrayS['longitude'] . '</td>
            </tr>
             <tr>
                <td valign="middle" align="left" colspan="2">
                </td>
            </tr> 
            </table>
            ';
                                    echo $detail_a;
                                    ?>
                                </div>
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    <div id="map" style="height: 450px;"></div>
                                </div>
                            </div>
                            <!--                            <div class="form-group m-form__group row">
                                                                <div id="map" style="width: 800px;height: 450px;"></div>
                                                        </div>-->

                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Body -->
<script>
    function initMap() {
        var mapOptions = {
            center: {lat: <?= $arrayS['latitude'] ?>, lng: <?= $arrayS['longitude'] ?>},
            zoom: 13,
        }

        var maps = new google.maps.Map(document.getElementById("map"), mapOptions);

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(<?= $arrayS['latitude'] ?>, <?= $arrayS['longitude'] ?>),
            map: maps,
        });
    }
    $(document).ready(function () {
        google.maps.event.addDomListener(window, 'load', initMap);
    });
</script>


