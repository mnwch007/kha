<?php
if ($info_banner):
    ?>
    <!-- p4bannar area start -->
    <section id="p4bannar">
        <img class="d-none d-md-block w-100" src="<?= img_path('banner_page/' . $info_banner['Image']) ?>" alt="" />
        <img class="d-block d-md-none w-100" src="<?= img_path('banner_page/' . $info_banner['ImageMob']) ?>" alt="" />
    <!--        <img src="<? assets('img/p4hero.png') ?>" alt="" />-->
        <h2><?= $info_banner['Title'] ?></h2>
    </section>
    <!-- p4bannar area end -->
    <?php
endif;
?>

<?php echo $info_data['Detail'];?>

<?php /*
<!-- p4history area start -->
<section id="p4history" class="wow fadeIn">
    <div class="container">
        <div class="p4history_wrapper">
            <div class="minislider_right_heading">
                <h3>ประวัติบริษัท</h3>
                <div class="headbar">
                    <span></span>
                </div>
            </div>
            <p>
                บริษัท เคหะสุขประชา จำกัด (มหาชน) จัดตั้งขึ้นเมื่อวันที่ 21 มีนาคม
                พ.ศ. 2565 ตามมติเห็นชอบของคณะรัฐมนตรี เมื่อวันที่ 9 พฤศจิกายน พ.ศ.
                2564 ด้วยทุนจดทะเบียน 500 ล้านบาท
                เพื่อสนับสนุนภารกิจของการเคหะแห่งชาติ
                ในการดำเนินงานโครงการบ้านเช่าพร้อมอาชีพ ภายใต้ชื่อ “เคหะสุขประชา”
            </p>
            <p>
                ทั้งนี้
                เพื่อเป็นการสร้างความมั่นคงด้านที่อยู่อาศัยให้กับประชาชนกลุ่มผู้มีรายได้น้อย
                ในช่วงที่เศรษฐกิจของประเทศได้รับผลกระทบจากการแพร่ระบาดของโรคติดเชื้อไวรัสโคโรนา
                2019 (COVID-19) และเพื่อให้ผู้สูงอายุ คนพิการ ข้าราชการชั้นผู้น้อย
                หรือข้าราชการเกษียณและประชาชนที่มีรายได้น้อย
                รวมถึงผู้บุกรุกในพื้นที่สาธารณะมีความมั่นคงในที่อยู่อาศัย
                โดยดำเนินการสร้างบ้านเช่าจำนวน 100,000
                หน่วยในพื้นที่กรุงเทพมหานครและทั่วประเทศ ระยะเวลาดำเนินการ 4 ปี
                (พ.ศ. 2565 - 2568)
                โดยทุกปีจะมีผู้มีรายได้น้อยมีบ้านอยู่อาศัยเพิ่มขึ้นปีละ 20,000
                ครอบครัว และเมื่อโครงการดำเนินการแล้วเสร็จในเดือนกรกฎาคม 2568
                จะมีผู้มีรายได้น้อยที่มีที่อยู่อาศัยเพิ่มขึ้นรวมทั้งสิ้น 100,000
                ครอบครัว
            </p>
        </div>
    </div>
</section>
<!-- p4history area end -->

<!-- p4concept area start -->
<section id="p4concept" class="wow fadeIn"> 
    <div class="container">
        <div class="p4concept_wrapper">
            <div class="p4concept_left">
                <h3>แนวคิดองค์กร</h3>
            </div>
            <div class="p4concept_right">
                <ul>
                    <li><span>1.</span>การสร้างบ้านเช่ามาตรฐานสูงราคาประหยัด</li>
                    <li>
                        <span>2.</span>
                        การยกระดับรายได้ครัวเรือนของผู้อยู่อาศัยด้วยการพัฒนาเศรษฐกิจชุมชนอย่างครบวงจร
                        เพื่อให้ผู้อยู่อาศัยมีบ้าน มีอาชีพ มีรายได้ มีความสุข
                        โดยการจัดสรรประโยชน์ในรูปแบบเศรษฐกิจสุขประชา
                        ซึ่งขึ้นอยู่กับความเหมาะสมและศักยภาพของพื้นที่ดังต่อไปนี้

                        <ul>
                            <li>
                                <span>2.1</span> เกษตรอินทรีย์ เช่น พืชระยะสั้น พืชล้มลุก
                                ผลไม้ยืนต้น ฯลฯ
                            </li>
                            <li>
                                <span>2.2</span> ปศุสัตว์ เช่น ไข่ไก่ ไข่นกกระทา
                                ไข่เป็ดไล่ทุ่ง ปลาดุก ปลานิล ปลาทับทิม ฯลฯ
                            </li>
                            <li><span>2.3</span> ตลาด เช่น แผงตลาด ที่จอดรถ ฯลฯ</li>
                            <li>
                                <span>2.4</span> ศูนย์การค้าปลีกค้าส่ง เช่น Mini Mall
                                คลังกระจายสินค้า ฯลฯ
                            </li>
                            <li>
                                <span>2.5</span> อาชีพบริการในชุมชนและชุมชนข้างเคียง เช่น
                                ดูแลผู้สูงอายุ (Elderly Day Care) สร้างงานในชุมชน
                                กลุ่มแม่บ้าน ฯลฯ
                            </li>
                            <li><span>2.6</span> อุตสาหกรรมขนาดเล็ก</li>
                        </ul>
                    </li>
                    <li>
                        <span>3.</span>การบริหารจัดการดูแลชุมชนสำหรับผู้มีรายได้น้อย
                        ให้มีคุณภาพชีวิตและสภาพแวดล้อมที่ดี
                    </li>
                    <li>
                        <span>4.</span>การวางแผนและดำเนินการบริหารระบบจัดจำหน่าย
                        (Distribution) ของห่วงโซ่อุปทาน (Supply Chain)
                        จากหน่วยผลิตในแต่ละครัวเรือน ผ่านสู่ ชุมชนของกคช. กว่า 1,000,000
                        ครัวเรือน ที่เป็นตลาดหลัก
                        รองรับสินค้ารวมถึงจำหน่ายสินค้าไปยังชุมชนอื่น ๆ ทั่วประเทศ
                    </li>
                    <li>
                        <span>5.</span>การระดมเงินทุนจากตลาดเงินและลดภาระหนี้ภาครัฐ
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- p4concept area end -->

<!-- p4plan area start -->
<section id="p4plan" class="wow fadeIn">
    <div class="container">
        <div class="p4plan_wrapper">
            <div class="minislider_right_heading text-end">
                <h3>แผนการดำเนินงาน</h3>
                <div class="headbar">
                    <span></span>
                </div>
            </div>
            <div class="p4plan_para">
                <p>
                    บริษัท เคหะสุขประชา จำกัด (มหาชน)
                    มีเป้าหมายจัดสร้างโครงการบ้านเคหะสุขประชา จำนวน 100,000
                    หน่วยในกรุงเทพมหานครและ 76 จังหวัด ทั่วประเทศ ภายในระยะเวลา 4 ปี
                    (พ.ศ. 2565 - 2568)
                    เพื่อสร้างความมั่นคงด้านที่อยู่อาศัยให้กับผู้มีรายได้น้อยและครัวเรือนเปราะบาง
                </p>
                <p>
                    โครงการบ้านเคหะสุขประชา คือ
                    การสร้างเศรษฐกิจชุมชนให้กับผู้มีรายได้น้อยและครัวเรือนเปราะบางในแต่ละครัวเรือน
                    โดยบริหารจัดการพื้นที่เศรษฐกิจชุมชนของโครงการฯ
                    เพื่อสร้างรายได้ที่ยั่งยืนและพอเพียงกับการดำรงชีพให้กับผู้อยู่อาศัยในชุมชน
                    โดยบริหารจัดการพื้นที่เพื่อพัฒนาเศรษฐกิจชุมชนอย่างครบวงจร
                    ภายใต้รูปแบบเศรษฐกิจสุขประชาทั้ง 6 ประเภท ได้แก่
                </p>
            </div>
            <div class="p4plan_box">
                <div class="p4plan_box_wrapper">
                    <img src="<?= assets('img/icon1.png') ?>" alt="" />
                    <p>เกษตรอินทรีย์</p>
                </div>
                <div class="p4plan_box_wrapper">
                    <img src="<?= assets('img/icon2.png') ?>" alt="" />
                    <p>ปศุสัตว์</p>
                </div>
                <div class="p4plan_box_wrapper">
                    <img src="<?= assets('img/icon3.png') ?>" alt="" />
                    <p>ตลาด</p>
                </div>
                <div class="p4plan_box_wrapper">
                    <img src="<?= assets('img/icon4.png') ?>" alt="" />
                    <p>ศูนย์การค้าปลีกค้าส่ง</p>
                </div>
                <div class="p4plan_box_wrapper">
                    <img src="<?= assets('img/icon5.png') ?>" alt="" />
                    <p>อาชีพบริการในชุมชน</p>
                </div>
                <div class="p4plan_box_wrapper">
                    <img src="<?= assets('img/icon6.png') ?>" alt="" />
                    <p>อุตสาหกรรมขนาดเล็ก</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- p4plan area end -->

<!-- p4list area start -->
<section id="p4list" class="wow fadeIn">
    <div class="container">
        <div class="p4list_wrapper">
            <div class="minislider_right_heading">
                <h3>รายชื่อผู้ถือหุ้น</h3>
                <div class="headbar">
                    <span></span>
                </div>
            </div>
            <div class="p4list_block">
                <div class="p4list_block_left">
                    <p>
                        บริษัท เคหะสุขประชา จำกัด (มหาชน)
                        จดทะเบียนเป็นนิติบุคคลตามกฎหมายว่าด้วยบริษัทมหาชนจำกัด
                        เมื่อวันที่ 21 มีนาคม พ.ศ. 2565
                        มีทุนจดทะเบียนในการจัดตั้งบริษัทจำนวน 500 ล้านบาท
                        โดยการเคหะแห่งชาติ หรือ กคช.มีสัดส่วนการถือหุ้นร้อยละ 49
                        ส่วนภาคเอกชนมีสัดส่วนการถือหุ้นร้อยละ 51
                        ประกอบด้วยรายละเอียดดังนี้
                    </p>
                    <div class="p4list_block_logo_one">
                        <img src="<?= assets('img/fm.png') ?>" alt="" />
                    </div>
                </div>
                <div class="p4list_block_right">
                    <div class="p4lb_one">
                        <p>การเคหะแห่งชาติ</p>
                        <span>49%</span>
                    </div>
                    <div class="p4lb_one">
                        <p>
                            บริษัท ออมสุข วิสาหกิจเพื่อสังคม จำกัด
                            <br />(บริษัทในกลุ่มบางจาก)
                        </p>
                        <span>25%</span>
                    </div>
                    <div class="p4lb_one">
                        <p>บริษัท วินโดว์ เอเชีย จำกัด (มหาชน)</p>
                        <span>11%</span>
                    </div>
                    <div class="p4lb_one">
                        <p>
                            บริษัท ไทยจัดการลองสเตย์ จำกัด
                            <br />(บริษัทในกลุ่มการท่องเที่ยวแห่งประเทศไทย)
                        </p>
                        <span>5%</span>
                    </div>
                    <div class="p4lb_one">
                        <p>บริษัท แฟคซิลิตี้ แมนเนจเมนท์ จำกัด</p>
                        <span>5%</span>
                    </div>
                    <div class="p4lb_one">
                        <p>บริษัท มหาจักร อิเล็คทริค (ประเทศไทย) จำกัด</p>
                        <span>2.5%</span>
                    </div>
                    <div class="p4lb_one">
                        <p>บริษัท แอดวานซ์ แมททีเรียลส์ คอร์ปอเรชั่น จำกัด</p>
                        <span>2.5%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- p4list area end -->
*/?>
<?php /*
<!-- p4policy area start -->
<section id="p4policy" class="wow fadeIn">
    <div class="container">
        <div class="minislider_right_heading text-center">
            <h3>นโยบายบริษัท</h3>
            <div class="headbar">
                <span></span>
            </div>
        </div>
        <div class="minislider_wrapper">
            <div class="minislider_one">
                <div class="minislider_one_left">
                    <img src="<?= assets('img/pi1.png') ?>" alt="" />
                </div>
                <div class="minislider_one_right">
                    <p>นโยบายการบริหารความเสี่ยง</p>
                </div>
            </div>
            <div class="minislider_one">
                <div class="minislider_one_left">
                    <img src="<?= assets('img/pi2.png') ?>" alt="" />
                </div>
                <div class="minislider_one_right">
                    <p>นโยบายการคุ้มครองข้อมูลส่วนบุคคล</p>
                </div>
            </div>
            <div class="minislider_one">
                <div class="minislider_one_left">
                    <img src="<?= assets('img/pi3.png') ?>" alt="" />
                </div>
                <div class="minislider_one_right">
                    <p>
                        นโยบายการกำกับดูแลกิจการที่ดี <br />
                        และส่งเสริมความรับผิดชอบต่อสังคม
                    </p>
                </div>
            </div>
            <div class="minislider_one">
                <div class="minislider_one_left">
                    <img src="<?= assets('img/pi4.png') ?>" alt="" />
                </div>
                <div class="minislider_one_right">
                    <p>
                        นโยบายความปลอดภัย อาชีวอนามัย <br />
                        และสภาพแวดล้อมในการทำงาน
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- p4policy area end -->
*/?>