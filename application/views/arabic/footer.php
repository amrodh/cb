
        <div class="container" id="footer_div">
            <div class="row">
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <a href="http://newhomes.com.eg/"><img style="width:112px;" src="<?= base_url();?>/application/static/images/logo_newhomes.jpg"/></a>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <div class="footer_col_title">
                        البحث عن منزل
                    </div>
                    <div class="footer_col_content">
                        مجمع سكني<br>
                        عقارات مملوكة من قبل<br>
                        عقارات للتأجير<br>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <div class="footer_col_title">
                        التجارية
                    </div>
                    <div class="footer_col_content">
                        شراء<br>
                        بيع<br>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <div class="footer_col_title">
                        من نحن
                    </div>
                    <div class="footer_col_content">
                        تاريخنا<br>
                        المهن<br>
                        توكيل<br>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 footer_cols" id="footer_last_col">
                    <div class="footer_col_title">
                        إتصل بنا
                    </div>
                    <div id="bottom_div">
                        <img class="footer_social_icons" src="<?= base_url();?>/application/static/images/icon_twitter.png">
                        <img class="footer_social_icons" src="<?= base_url();?>/application/static/images/icon_fb.png">
                        <img class="footer_social_icons" src="<?= base_url();?>/application/static/images/icon_gmail.png">
                        <img class="footer_social_icons" src="<?= base_url();?>/application/static/images/icon_linkedin.png"> 
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 footer_cols footer_contact">
                    <img style="margin-top: -8px;" src="<?= base_url();?>/application/static/images/icon_phone_ar.png"/>
                    <div class="footer_col_title" style="margin-top: -29px;margin-right: 35px;font-size: 18px;">
                        مركز الاتصال
                    </div>
                    <div style="margin-top: -15px;">
                    16223 
                    </div>
                    <!--<a href="http://newhomes.com.eg/"><img style="margin-top: 19px;" src="http://localhost/ColdwellBanker/img/logo_newhomes.png"/></a>-->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-lg-8 col-md-4 col-sm-4">
                    <div class="dropdown footer_dropdown_div">
                        <button type="button" class="btn dropdown-toggle footer_dropdowns" data-toggle="dropdown" id="footer_dropdown1">
                            فيلا
                            <span class="caret"></span>
                        </button>
                    </div>
                    <div class="dropdown footer_dropdown_div">
                        <button type="button" class="btn dropdown-toggle footer_dropdowns" data-toggle="dropdown" id="footer_dropdown2">
                            شقة
                            <span class="caret"></span>
                        </button>
                    </div>
                    <div class="dropdown footer_dropdown_div">
                        <button type="button" class="btn dropdown-toggle footer_dropdowns" data-toggle="dropdown" id="footer_dropdown3">
                            بناء
                            <span class="caret"></span>
                        </button>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4" id="footer_bottom_div">
                    <input type="hidden" id="url" value="<?= base_url(); ?>">
                    <?php if (isset($loggedIn)): ?>
                        <?php if (!$is_subscribed): ?>
                            <!-- <div class="footer_col_title" style="margin-bottom: 0;margin-top:0;">
                                SUBSCRIBE TO OUR NEWSLETTER
                            </div> -->
                            <div id="footer_subscribtion">
                                <input style="margin-left:0;" type="submit" value="إشترك في النشرة الإخبارية" name="btn_subscribe" id="btn_subscribe">
                            </div>
                        <?php endif ?>
                    <?php else: ?>
                    <div class="footer_col_title" style="margin-bottom: 0;margin-top:0;">
                        إشترك في النشرة الإخبارية
                    </div>
                    <div id="footer_subscribtion">
                        <input type="text" name="footer_subscribe_email" id="footer_subscribe_email" placeholder="بريدك الالكتروني"/>
                        <input type="submit" value="إشترك" name="btn_subscribe" id="btn_subscribe">
                    </div>
                    <?php endif ?>
                </div>
            </div>
                <div id="footer_dropdown1_data"style="">
                    <b>المنطقة</b><br>
                    <p style="margin-top: 20px;">
                        <a href="">المهندسين  </a> . 
                        <a href="">الزمالك </a> . 
                        <a href="">المعادي </a> . 
                        <a href="">مدينة نصر </a> . 
                        <a href="">مصر الجديدة </a> . 
                        <a href="">التجمع الخامس </a> . 
                        <a href="">السادس من أكتوبر </a> . 

                    </p>
                    <p>
                        <a href="">الاسكندرية </a> . 
                        <a href="">بورسعيد </a> . 
                        <a href="">الهرم</a> . 
                        <a href="">الصحراوي</a> . 
                        <a href="">العباسية</a> . 
                        <a href="">الدقي</a> . 
                        <a href="">حلوان</a> . 
                        <a href="">العجوزة</a> . 
                    </p>
                    <p>
                        <a href="">سوهاج</a> . 
                        <a href="">قنا</a> . 
                        <a href="">العجمي</a> . 
                        <a href="">الساحل الشمالي</a> . 
                    </p>
                </div>
                <div id="footer_dropdown2_data" style="">
                    <b>المنطقة</b><br>
                    <p style="margin-top: 20px;">
                        <a href="">المهندسين  </a> . 
                        <a href="">الزمالك </a> . 
                        <a href="">المعادي </a> . 
                        <a href="">مدينة نصر </a> . 
                        <a href="">مصر الجديدة </a> . 
                        <a href="">التجمع الخامس </a> . 
                        <a href="">السادس من أكتوبر </a> . 

                    </p>
                    <p>
                        <a href="">الاسكندرية </a> . 
                        <a href="">بورسعيد </a> . 
                        <a href="">الهرم</a> . 
                        <a href="">الصحراوي</a> . 
                        <a href="">العباسية</a> . 
                        <a href="">الدقي</a> . 
                        <a href="">حلوان</a> . 
                        <a href="">العجوزة</a> . 
                    </p>
                    <p>
                        <a href="">سوهاج</a> . 
                        <a href="">قنا</a> . 
                        <a href="">العجمي</a> . 
                        <a href="">الساحل الشمالي</a> . 
                    </p>
                </div>
                <div id="footer_dropdown3_data" style="">
                    <b>المنطقة</b><br>
                    <p style="margin-top: 20px;">
                        <a href="">المهندسين  </a> . 
                        <a href="">الزمالك </a> . 
                        <a href="">المعادي </a> . 
                        <a href="">مدينة نصر </a> . 
                        <a href="">مصر الجديدة </a> . 
                        <a href="">التجمع الخامس </a> . 
                        <a href="">السادس من أكتوبر </a> . 

                    </p>
                    <p>
                        <a href="">الاسكندرية </a> . 
                        <a href="">بورسعيد </a> . 
                        <a href="">الهرم</a> . 
                        <a href="">الصحراوي</a> . 
                        <a href="">العباسية</a> . 
                        <a href="">الدقي</a> . 
                        <a href="">حلوان</a> . 
                        <a href="">العجوزة</a> . 
                    </p>
                    <p>
                        <a href="">سوهاج</a> . 
                        <a href="">قنا</a> . 
                        <a href="">العجمي</a> . 
                        <a href="">الساحل الشمالي</a> . 
                    </p>
                </div>
        </div>
        <div class="container">
            <p id="copyrights">
                ٢٠١٤ كولدويل بانكر. جميع الحقوق محفوظة.
            </p>
        </div>
<script type="text/javascript" src="<?= base_url(); ?>application/static/js/script.js"></script>

</body>
</html>


