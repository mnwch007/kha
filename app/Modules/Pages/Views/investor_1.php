<!-- p7main area start -->
<section id="p7main">
    <div class="container">
        <div class="p7main_wrappper">
            <div class="row g-5">
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="p7main_left">
                        <div class="p7main_left_heading">
                            <h3>นักลงทุนสัมพันธ์</h3>
                            <div class="headbar">
                                <span></span>
                            </div>
                        </div>
                        <ul>
                            <li><a class="active" href="<?= base_url_lang(lang('url_lang.investor'), $lang_url) ?>">โครงสร้างองค์กร</a></li>
                            <li><a href="<?= base_url_lang(lang('url_lang.investor') . '/คณะกรรมการบริษัท', $lang_url) ?>">คณะกรรมการบริษัท</a></li>
                            <li><a href="<?= base_url_lang(lang('url_lang.investor') . '/สาส์นจากประธานกรรมการ', $lang_url) ?>">สาส์นจากประธานกรรมการ</a></li>
                            <!--                  <li><a href="#">ข้อบังคับบริษัท</a></li>
                                              <li><a href="#">นโยบายต่อต้านการทุจริต</a></li>
                                              <li>
                                                <a href="#"
                                                  >กฎบัตรคณะกรรมการ <br />
                                                  และคณะกรรมการชุดย่อย</a
                                                >
                                              </li>
                                              <li><a href="#">แจ้งเบาะแสการทุจริต</a></li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="p7main_cnt_one">
                        <div class="p7main_right">
                            <div class="p7main_left_heading d-block d-md-none mb-4">
                                <h3>นักลงทุนสัมพันธ์</h3>
                                <div class="headbar">
                                    <span></span>
                                </div>
                            </div>
                            <div class="p7main_right_tab">
                                <ul>
                                    <li class="active" target="cnt1">ข้อมูลบริษัท</li>
                                    <li target="cnt2">ข้อมูลการเงิน</li>
                                    <li target="cnt3">ข้อมูลสำหรับผู้ถือหุ้น</li>
                                    <li target="cnt4">สอบถามข้อมูล</li>
                                </ul>
                            </div>

                            <div class="p7tabcnts first_cnt" id="cnt1">
                                <div class="mobile_link text-center mt-4 d-block d-lg-none">
                                    <div class="dropdown">
                                        <button
                                            class="dropdown-toggle"
                                            id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false"
                                            >
                                            โครงสร้างองค์กร
                                        </button>
                                        <ul
                                            class="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton1"
                                            >
                                            <li>
                                                <a class="active" href="<?= base_url_lang(lang('url_lang.investor'), $lang_url) ?>">โครงสร้างองค์กร</a>
                                            </li>
                                            <li><a href="<?= base_url_lang(lang('url_lang.investor') . '/คณะกรรมการบริษัท', $lang_url) ?>">คณะกรรมการบริษัท</a></li>
                                            <li><a href="<?= base_url_lang(lang('url_lang.investor') . '/สาส์นจากประธานกรรมการ', $lang_url) ?>">สาส์นจากประธานกรรมการ</a></li>
                                            <!--                          <li><a href="#">ข้อบังคับบริษัท</a></li>
                                                                      <li><a href="#">นโยบายต่อต้านการทุจริต</a></li>
                                                                      <li>
                                                                        <a href="#"
                                                                          >กฎบัตรคณะกรรมการ <br />
                                                                          และคณะกรรมการชุดย่อย</a
                                                                        >
                                                                      </li>
                                                                      <li><a href="#">แจ้งเบาะแสการทุจริต</a></li>-->


                                        </ul>
                                    </div>
                                </div>


                                <?php
                                if ($page_tabs == 1):
                                    ?>

                                    <div class="p7main_right_timeline wow fadeInUp">
                                        <h5>โครงสร้างองค์กร</h5>
                                        <img src="<?= assets('img/timeline.png') ?>" alt="" />
                                    </div>
                                    <?php
                                endif;
                                ?>
                                <?php
                                if ($page_tabs == 2):
                                    ?>
                                    <div class="p7main_right_people wow fadeInUp">
                                        <h5>คณะกรรมการบริษัท</h5>
                                        <div class="p7main_right_people_wrapper">
                                            <div class="p7main_right_box_people">
                                                <img src="<?= assets('img/person1.png') ?>" alt="" />
                                                <h6>คุณทวีพงษ์ วิชัยดิษฐ</h6>
                                                <p>ประธานกรรมการ</p>
                                            </div>
                                            <div class="p7main_right_box_people">
                                                <img src="<?= assets('img/person2.png') ?>" alt="" />
                                                <h6>คุณจเรรัฐ ปิงคลาศัย</h6>
                                                <p>กรรมการบริษัท</p>
                                                <p>ประธานกรรมการบริหาร</p>
                                                <p>ประธานเจ้าหน้าที่บริหาร</p>
                                                <p>กรรมการบริหารความเสี่ยง</p>
                                            </div>
                                            <div class="p7main_right_box_people">
                                                <img src="<?= assets('img/person3.png') ?>" alt="" />
                                                <h6>คุณเทพฤทธิ์ ฤทธิณรงค์</h6>
                                                <p>กรรมการบริษัท</p>
                                                <p>กรรมการบรรษัทภิบาล</p>
                                                <p>และความรับผิดชอบต่อสังคม</p>
                                                <p>กรรมการบริหาร</p>
                                            </div>
                                            <div class="p7main_right_box_people">
                                                <img src="<?= assets('img/person4.png') ?>" alt="" />
                                                <h6>คุณสุนทรสิงห์ วิทยปิยานนท์</h6>
                                                <p>กรรมการบริษั</p>
                                                <p>ประธานคณะกรรมการตรวจสอบ</p>
                                            </div>
                                            <div class="p7main_right_box_people">
                                                <img src="<?= assets('img/person5.png') ?>" alt="" />
                                                <h6>คุณธำรงค์ ทองตัน</h6>
                                                <p>กรรมการบริษัท</p>
                                                <p>กรรมการตรวจสอบ</p>
                                            </div>
                                            <div class="p7main_right_box_people">
                                                <img src="<?= assets('img/person6.png') ?>" alt="" />
                                                <h6>คุณมีธรรม ณ ระนอง</h6>
                                                <p>กรรมการบริษัท</p>
                                                <p>ประธานคณะกรรมการ</p>
                                                <p>บริหารความเสี่ยง</p>
                                            </div>
                                            <div class="p7main_right_box_people">
                                                <img src="<?= assets('img/person7.png') ?>" alt="" />
                                                <h6>คุณกลอยตา ณ ถลาง</h6>
                                                <p>กรรมการบริษัท</p>
                                                <p>ประธานคณะกรรมการ</p>
                                                <p>บรรษัทภิบาลและความ</p>
                                                <p>รับผิดชอบต่อสังคม</p>
                                            </div>
                                            <div class="p7main_right_box_people">
                                                <img src="<?= assets('img/person8.png') ?>" alt="" />
                                                <h6>คุณเสาวภาพ สุเมฆศรี</h6>
                                                <p>กรรมการบริษัท</p>
                                                <p>กรรมการสรรหา</p>
                                                <p>และกำหนดค่าตอบแทน</p>
                                                <p>กรรมการบริหารความเสี่ยง</p>
                                            </div>
                                            <div class="p7main_right_box_people">
                                                <img src="<?= assets('img/person9.png') ?>" alt="" />
                                                <h6>คุณธนินทร์ รัตนศิริวิไล</h6>
                                                <p>กรรมการบริษัท</p>
                                                <p>ประธานคณะกรรมการสรรหา</p>
                                                <p>และกำหนดค่าตอบแทน</p>
                                                <p>กรรมการบรรษัทภิบาล</p>
                                                <p>และความรับผิดชอบต่อสังคม</p>
                                            </div>
                                            <div class="p7main_right_box_people">
                                                <img src="<?= assets('img/person10.png') ?>" alt="" />
                                                <h6>คุณพิชัย สีห์โสภณ</h6>
                                                <p>กรรมการบริษัท</p>
                                                <p>กรรมการสรรหา</p>
                                                <p>และกำหนดค่าตอบแทน</p>
                                            </div>
                                            <div class="p7main_right_box_people">
                                                <img src="<?= assets('img/person11.png') ?>" alt="" />
                                                <h6>คุณพิษณุพร อุทกภาชน์</h6>
                                                <p>กรรมการบริษัท</p>
                                                <p>กรรมการบริหาร</p>
                                                <p>ประธานเจ้าหน้าที่บริหารร่วม</p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                endif;
                                ?>

                                <?php
                                if ($page_tabs == 3):
                                    ?>


                                    <div class="p7main_right_block wow fadeInUp">
                                        <div class="p7main_right_block_left">
                                            <h5>สาส์นจากประธานกรรมการ</h5>
                                            <p>
                                                เดี้ยงฟาสต์ฟู้ดมาเฟียล้มเหลว ไอติมมอยส์เจอไรเซอร์
                                                บร็อกโคลีหมายปองมือถือ สะเด่า
                                                อีแต๋นกรอบรูปนู้ดบ๊วยเซ็นเตอร์
                                                เลดี้เครปตะหงิดดอกเตอร์ลิมูซีน ขั้นตอน
                                                แซมบ้าไฮเทคซาดิสต์ พาวเวอร์น็อคแจ๊กเก็ต
                                                อัลบั้มราสเบอร์รี ฟีดซากุระเวสต์กษัตริยาธิราช
                                                ไหร่แบคโฮ สึนามิอุปสงค์ ซาฟารีอันเดอร์ตนเอง แคร์บริกร
                                                คาร์
                                            </p>
                                            <p>
                                                มอยส์เจอไรเซอร์ฮาลาลซาตานคอร์รัปชั่น
                                                ลาตินงี้แก๊สโซฮอล์เปราะบาง เห่ย เพลซโทร
                                                อาร์พีจีวอลนัทแมนชั่น เอฟเฟ็กต์วานิลาหลวงพี่
                                                ราชบัณฑิตยสถานอ่อนด้อย จิ๊กโก๋จิ๊กโก๋เป่ายิงฉุบ
                                                สวีทแซวแจ็กพ็อตแหม็บ
                                                ดีลเลอร์แบนเนอร์สติ๊กเกอร์ฮิน้องใหม่
                                                เสกสรรค์ดีเจไวอากร้าเพนกวิน สหรัฐโฮสเตส
                                                ฉลุยเทรลเล่อร์วิลเลจฮัลโลวีน ม้านั่งโปรโมทศากยบุตร
                                                คอมพ์เทวาลามะ ป๋า
                                            </p>
                                            <p>
                                                จัมโบ้ซากุระ แฟนตาซีพฤหัส บ็อกซ์โปสเตอร์โปรเจ็กเตอร์
                                                โรแมนติคจัมโบ้ เรตเชฟฟยอร์ดโอ้ยบร็อคโคลี
                                                พันธกิจภควัมบดีนอมินีโอเวอร์
                                                แบ็กโฮมายองเนสแอปเปิลบ็อกซ์ดยุก คอนแท็คเจล ออดิทอเรียม
                                                เวอร์กิฟท์แรงผลักเทเลกราฟ﻿กรรมาชน พงษ์เก๊ะอันเดอร์
                                                ตุ๊กตุ๊ก สไตรค์ตะหงิด อุรังคธาตุเซ่นไหว้วาซาบิบึ้ม
                                                ดีพาร์ทเมนต์เซ่นไหว้ ปฏิสัมพันธ์คองเกรสมอคค่า
                                            </p>
                                            <p>
                                                ช็อคคันยิโยโย่รีไซเคิลอาว์ อ่อนด้อยไวอะกร้า ตี๋
                                                อึมครึม ซากุระแรงดูด จอหงวนช็อตฮอตไมค์กาญจนาภิเษก
                                                เอ็กซ์เพรสรีสอร์ทแทงโก้ ใช้งานโต๊ะจีน อิ่มแปร้ช็อปปิ้ง
                                                ปิโตรเคมีมือถือแทคติคแบล็คป๋อหลอ คาแรคเตอร์คีตปฏิภาณ
                                                แคมปัสสุนทรีย์วานิลลาการันตีโอเวอร์
                                                เที่ยงวันฟยอร์ดสแตนดาร์ดเต๊ะ โบตั๋นคอรัปชันสเปค
                                                วอร์รูมพุทโธเบิร์ดชัตเตอร์สเต็ป เดโม
                                            </p>
                                        </div>
                                        <div class="p7main_right_block_right">
                                            <img src="<?= assets('img/gen.png') ?>" alt="" />
                                            <div class="headbar">
                                                <span></span>
                                            </div>
                                            <div class="p7main_right_para">
                                                <h5>คุณทวีพงษ์ วิชัยดิษฐ</h5>
                                                <p>ประธานกรรมการ</p>
                                                <h6>บริษัท เคหะสุขประชา จำกัด (มหาชน)</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endif;
                                ?>



                            </div>
                        </div>
                    </div>
                    <div class="p7main_cnt_two p7tabcnts" id="cnt2">
                        <div class="p7main_cnt_two mt-4">
                            <div
                                class="p7main_cnt_two_heading d-flex align-items-center justify-content-between"
                                >
                                <div class="p7main_cnt_two_heading_left">
                                    <h5>รายงานประจำปี : 2565</h5>
                                </div>
                                <div class="p7main_cnt_two_heading_right">
                                    <select>
                                        <option value="2565">2565</option>
                                        <option value="2565">2565</option>
                                        <option value="2565">2565</option>
                                        <option value="2565">2565</option>
                                        <option value="2565">2565</option>
                                    </select>
                                </div>
                            </div>
                            <div
                                class="sm_select d-flex d-lg-none align-items-center gap-3"
                                >
                                <div class="mobile_link mt-4 d-block d-lg-none">
                                    <div class="dropdown">
                                        <button
                                            class="dropdown-toggle"
                                            id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false"
                                            >
                                            โครงสร้างองค์กร
                                        </button>
                                        <ul
                                            class="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton1"
                                            >
                                            <li>
                                                <a class="active" href="#">โครงสร้างองค์กร</a>
                                            </li>
                                            <li><a href="#">คณะกรรมการบริษัท</a></li>
                                            <li><a href="#">สาส์นจากประธานกรรมการ</a></li>
                                            <li><a href="#">ข้อบังคับบริษัท</a></li>
                                            <li><a href="#">นโยบายต่อต้านการทุจริต</a></li>
                                            <li>
                                                <a href="#"
                                                   >กฎบัตรคณะกรรมการ <br />
                                                    และคณะกรรมการชุดย่อย</a
                                                >
                                            </li>
                                            <li><a href="#">แจ้งเบาะแสการทุจริต</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="p7main_cnt_two_heading_right mt-4">
                                    <select>
                                        <option value="2565">2565</option>
                                        <option value="2565">2565</option>
                                        <option value="2565">2565</option>
                                        <option value="2565">2565</option>
                                        <option value="2565">2565</option>
                                    </select>
                                </div>
                            </div>
                            <div class="p7main_cnt_two_table mt-3">
                                <table>
                                    <tr>
                                        <th>รายการ</th>
                                        <th>ดาวน์โหลด</th>
                                    </tr>
                                    <tr>
                                        <td>รายงานสรุปประจำปี 2665</td>
                                        <td>
                                            <span>300 MB</span>
                                            <a href="#"><img src="<?= assets('img/pdf.png') ?>" alt="" /></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>รายงานฉบับเต็มประจำปี 2665</td>
                                        <td>
                                            <span>1.2 MB</span>
                                            <a href="#"><img src="<?= assets('img/pdf.png') ?>" alt="" /></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="p7main_cnt_three p7tabcnts" id="cnt3">
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Laborum, natus nihil minus aliquid odio molestiae! Suscipit,
                            at mollitia asperiores facere, laborum quisquam perspiciatis
                            tempora quasi, amet enim sit reprehenderit est?asperiores
                            facere, laborum quisquam perspiciatis tempora quasi, amet enim
                            sit reprehenderit est?
                        </p>
                    </div>
                    <div class="p7main_cnt_four p7tabcnts" id="cnt4">
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Laborum, natus nihil minus aliquid odio molestiae! Suscipit,
                            at mollitia
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- p7main area end -->