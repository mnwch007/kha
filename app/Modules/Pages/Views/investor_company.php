<?php
if ($page_tabs == 1):

    $detail = $this->mainm->get_content_pages('organizational_structure', $lang_url);
    echo $detail;
   /* ?>

    <div class="p7main_right_timeline wow fadeIn">
        <h5><?= lang('global_lang.organizational_structure') ?></h5>
        <img src="<?= assets('img/timeline.png') ?>" alt="" />
    </div>
    <?php
    */
endif;
?>
<?php
if ($page_tabs == 2):
     $detail = $this->mainm->get_content_pages('board_directors', $lang_url);
    echo $detail;
    
    /* ?>
    <div class="p7main_right_people wow fadeIn">
        <h5><?= lang('global_lang.board_of_directors') ?></h5>
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
     */
endif;
?>

<?php
if ($page_tabs == 3):
    
  $detail = $this->mainm->get_content_pages('message_from_chairman_director', $lang_url);
    echo $detail;
   /* ?>

    <div class="p7main_right_block wow fadeIn">
        <div class="p7main_right_block_left">
            <h5><?= lang('global_lang.message_from_chairman_director') ?></h5>
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
    <?php */
endif;
?>