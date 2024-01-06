
<section id="showHome" class="black">
    <div class="carousel carousel-slider">
        <?php
        foreach ($slide_image as $row) {
            ?>
            <div class="carousel-item" href="#<?= $row->id; ?>!">
                <div class="imageSlideContainer">
                    <div class="imageSlideHolder">
                        <img class="imageSildeItself" src="<?= $url.$row->image; ?>">
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <script>
        $(document).ready(function(){
            $('.carousel.carousel-slider').carousel();
            setInterval(function() {
                $('.carousel').carousel('next');
            }, 5000);
        });
    </script>
</section>
<section id="showAboutus" class="white">
    <div class="container">
        <div class="text-header">บริการที่เป็นเลิศ โดยทีมช่างที่มีประสบการณ์</div>
        <div class="row marg-50 text-comp">
            <div class="col l6">
                <img class="responsive-img" src="<?= base_url('assets/image/comp1.png'); ?>">
            </div>
            <div class="col l6">
                <h4>บริษัท เทพมงคลเอ็นจิเนียร์ริ่ง จำกัด</h4>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span>บริษัท เทพมงคลเอ็นจิเนียร์ริ่ง จำกัด ได้สร้างผลงานที่เต็มเปี่ยมไปด้วยคุณภาพ ความปลอดภัยและมุ้งเน้นถึงความซื่อสัตย์
และความจริงใจที่มีให้กับลูกค้าเป็นหลักตลอดถึงการเอาใจใส่ทุกรายละเอียดสำคัญ เพื่อให้ลูกค้าได้รับความพึงพอใจสูงสุด
ทำให้บริษัท เทพมงคลเอ็นจิเนียร์ริ่ง จำกัดเป็นหนึ่งในบริษัทผู้รับเหมาก่อสร้างที่มีชื่อเสียง เป็นที่ยอมรับของลูกค้าและบุคคล
ในวงการ ก่อสร้างมายาวนานร่วม <span id="compage">21</span> ปี</span>
                <br/>
                <br/>
                <br/>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span>
                    บริษัท เทพมงคลเอ็นจิเนียร์ริ่ง จำกัด ก่อตั้งขึ้นเมื่อวันที่ 17 กุมภาพันธ์ <span id="compyear">2540</span> ปัจจุบันทุนจดทะเบียน 50 ล้านบาทบริษัท
ประกอบธุรกิจรับเหมาก่อสร้างสถานีบริการน้ำมันครบวงจร รวมถึงการให้บริการออกแบบ จัดหา รับเหมาติดตั้งงานระบบวิศวกรรม และรับ
เหมาก่อสร้างอย่างครบวงจร รับงานจากทั้งภาคเอกชนและภาครัฐ โดยเป็นผู้รับเหมาโดยตรง (Main Contractor) จากการประมูลหรือเจราต่อรอง รวมถึงการร่วมมือกับบริษัทอื่นในลักษณะกิจการ
ร่วมค้า บริการของบริษัทสามารถแบ่งตามลักษณะของงานได้แก่ งานก่อสร้างโยธา และงานติดตั้ง
ระบบไฟฟ้า ระบบสื่อสารโทรคมนาคม ระบบปรับอากาศ ระบบสุขาภิบาลและระบบป้องกันอัคคีภัย
                </span>
            </div>
        </div>
    </div>
</section>
<section id="showServices">
    <div class="container">
        <div class="text-header">บริการ</div>
        <div class="list-about-icon">
            <div class="row">
                <div class="col s12 m12 l12">
                    <img class="img-aboutus-icon" src="<?= base_url('assets/image/gas-station.svg'); ?>">
                </div>
                <div class="col s12 m12 l12">
                    <div class="about-icon-header white-text">
                        ดำเนินธุรกิจ ก่อสร้างและติดตั้งระบบไฟฟ้า ในสถานีบริการน้ำมันของกลุ่มบริษัท ปตท จำกัด (มหาชน)
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="showPortfolio" class="white">
    <div class="container">
        <div class="text-header">ผลงานของเรา</div>
        <div id="owl-2">
            <div class="owl-carousel">
                <?php
                foreach ($data_img as $img) {
                    ?>
                    <div class="slide-portfolio">
                        <a href="<?= base_url('portfolio/show/'.$img->project_id); ?>">
                            <div class="imageContainer">
                                <div class="imageHolder">
                                    <img class="imageItself" src="<?= $url_img.$img->image; ?>" />
                                </div>
                                <div class="imgtxt" style="display: block;">
                                    <?= $img->descr1; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<section id="showContactus">
    <div class="container">
        <div class="text-header">ติดต่อเรา</div>
        <div class="our-company">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div id="googleMap"></div>
                </div>
                <div class="col s12 m12 l12">
                    <div class="contact-company">บริษัท เทพมงคลเอ็นจิเนียร์ริ่ง จำกัด</div>
                    <div class="contact-address">9 เฉลิมพระเกียรติ ร. 9 ซอย 30 แยก 25  แขวง ดอกไม้ เขต ประเวศ กรุงเทพมหานคร 10250</div>
                    <div class="show-icon-contact">
                        <a class="icon-contact" href="tel:023287893">
                            <div class="row">
                                <div class="col s2 m1 ">
                                    <img class="icon-contact-img" src="<?= base_url('assets/image/phone-call.svg'); ?>">
                                </div>
                                <div class="col s10 m11 icon-contact-txt">
                                    02 328 7893
                                </div>
                            </div>
                        </a>
                        <a class="icon-contact" href="tel:023287891">
                            <div class="row">
                                <div class="col s2 m1 ">
                                    <img class="icon-contact-img" src="<?= base_url('assets/image/fax.svg'); ?>">
                                </div>
                                <div class="col s10 m11 icon-contact-txt">
                                    02 328 7891
                                </div>
                            </div>
                        </a>
                        <a class="icon-contact" href="mailto:thepmongkol1997@gmail.com">
                            <div class="row">
                                <div class="col s2 m1 ">
                                    <img class="icon-contact-img" src="<?= base_url('assets/image/email.svg'); ?>">
                                </div>
                                <div class="col s10 m11 icon-contact-txt">
                                    thepmongkol1997@gmail.com
                                </div>
                            </div>
                        </a>
                        <a class="icon-contact" href="http://line.me/ti/p/~thepmongkol1997">
                            <div class="row">
                                <div class="col s2 m1 ">
                                    <img class="icon-contact-img" src="<?= base_url('assets/image/line-logo.svg'); ?>">
                                </div>
                                <div class="col s10 m11 icon-contact-txt">
                                    thepmongkol1997
                                </div>
                            </div>
                        </a>
                        <a class="icon-contact" href="javascript:;">
                            <div class="row">
                                <div class="col s2 m1 ">
                                    <img class="icon-contact-img" src="<?= base_url('assets/image/timetable.svg'); ?>">
                                </div>
                                <div class="col s10 m11 icon-contact-txt">
                                    เปิดทำการ จันทร์-เสาร์ <span class="show-br"><br/></span>เวลา 08.00-17.00 น.
                                </div>
                            </div>
                        </a>
                        <a id="single_image" class="icon-contact" href="https://maps.app.goo.gl/ZW5dWQkjLSJKdH6UA">
                            <div class="row">
                                <div class="col s2 m1 ">
                                    <img class="icon-contact-img" src="<?= base_url('assets/image/pin.svg'); ?>">
                                </div>
                                <div class="col s10 m11 icon-contact-txt">
                            <span class="text-map">
                                GPS นำทาง
                            </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        var current = parseInt('<?= date('Y'); ?>');
        var currentTH = current + 543;
        var compyear  = parseInt($('#compyear').text());
        var comage = currentTH - compyear;
        $('#compage').text(comage);
    });
</script>
<script src="<?= base_url('assets/owlcarousel/owl.carousel.min.js'); ?>"></script>
<script>
    $(document).ready(function () {
        $('#owl-2 .owl-carousel').owlCarousel(
            {
                items: 2,
                margin: 10,
                loop: true,
                autoplay: true,
                autoplaySpeed: 1000,
                navSpeed: 1000,
                navText: ['',''],
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:2,
                        nav:true
                    }
                    ,
                    1024:{
                        items:3,
                        nav:true
                    }
                    ,
                    1280:{
                        items:4,
                        nav:true
                    }
                }
            }
        );
    });
</script>
<script>
    function initMap() {
        var myLatLng = {lat: 13.6841554, lng: 100.6937723};

        var map = new google.maps.Map(document.getElementById('googleMap'), {
            zoom: 15,
            center: myLatLng
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Thepmongkol Engineering'
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2YBMQL94EWWURvQCL4RZmf1pVl0f8KsY&callback=initMap" async defer></script>