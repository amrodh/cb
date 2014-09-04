<?php include('header.php'); ?>
    <div id="search_div">
        <?php include('search.php'); ?>
    </div>
    <div class="container properties_main_div">
        <form>
            <div class="properties_top_div">
                <div id="properties_top_header_div">
                    <!--<div id="properties_top_header_left_div">-->
                        <p style="padding-left: 20px;"><b>١ - ١٠</b> من <b>٢٢١</b> منزل للبيع في المهندسين</p>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-md-5 col-sm-5 col-xs-6 properties_header_cols">
                                    عرض 
                                    <select class="selectpicker" style="width: 10px;" data-style="btn" data-title="Select Type">
                                        <option>١٠</option> 
                                        <option>٢٠</option>
                                        <option>٣٠</option>
                                        <option>٤٠</option>
                                        <option>٥٠</option>
                                    </select>
                                    نتائج في الصفحة
                                </div>
                                <div class="col-lg-6 col-md-5 col-sm-5 col-xs-6 properties_header_cols  properties_header_cols2">
                                    ترتيب النتائج على حسب
                                    <select class="selectpicker" style="width: 10px;" data-style="btn" data-title="Select Type">
                                        <option>Price High - Low</option> 
                                        <option>Price Low - High</option>
                                        <option>City A - Z</option>
                                        <option>City Z - A</option>
                                        <option>Area High - Low</option>
                                        <option>Area Low - High</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div id="properties_bottom_div">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-sm-11 col-md-8 col-xs-12 properties_header_cols" id="properties_bottom_left_div">
                            <div class="properties_common_bottom_div">
                                <div class="checkbox properties_ckbx">
                                    <label>
                                      <input name="property_chkbx[]" type="checkbox"> 
                                    </label>
                                </div>
                                <div class="properties_img">
                                    <img src="<?= base_url();?>/application/static/images/sample_property.png"/>
                                </div>
                                <div class="properties_number">
                                    1
                                </div>
                                <div class="properties_info">
                                    <div class="properties_title">
                                        ٢٬٠٠٠٬٠٠٠ جنيه مصري <img class="properties_star_icon" src="<?= base_url();?>/application/static/images/icon_orange_star.png"/>
                                    </div>
                                    <div class="properties_content">
                                        مقدر الدفع الشهري: ٢٢٫٨٠٢ جنيه مصري <br>
                                        <b>٤</b> أسرة, <b>٤</b> حمام كامل, <b>١</b> حمام جزئي <br>
                                        <b>الكيلو ١٩، سيتي فيو، الطريق الصحراوي، طريق مصر - إسكندرية الصحراوي</b><br><br>

                                        <i>معلومات أكثر</i>
                                    </div>
                                </div>
                                <div class="properties_details_div">
                                    <div class="btn-group properties_details_btns_div">
                                        <button type="button" class="btn btn-default properties_btns">
                                            <a href="<?= base_url().'ar/';?>propertyDetails">
                                                <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                التفاصيل
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-default properties_btns"> 
                                            <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                            ٠ صور
                                        </button>
                                        <button type="button" class="btn btn-default properties_btns">
                                            <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_plus.png" style="width: 24px;"/>
                                            شارك
                                        </button>
                                    </div>
                                    <div class="properties_contact">
                                        <a href="#" class="properties_contact_btn">
                                            اتصال
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="properties_common_bottom_div">
                                <div class="checkbox properties_ckbx">
                                    <label>
                                      <input name="property_chkbx[]" type="checkbox"> 
                                    </label>
                                </div>
                                <div class="properties_img">
                                    <img src="<?= base_url();?>/application/static/images/sample_property.png"/>
                                </div>
                                <div class="properties_number">
                                    2
                                </div>
                                <div class="properties_info">
                                    <div class="properties_title">
                                        ٢٬٠٠٠٬٠٠٠ جنيه مصري <img class="properties_star_icon" src="<?= base_url();?>/application/static/images/icon_gray_star.png"/>
                                    </div>
                                    <div class="properties_content">
                                        مقدر الدفع الشهري: ٢٢٫٨٠٢ جنيه مصري <br>
                                        <b>٤</b> أسرة, <b>٤</b> حمام كامل, <b>١</b> حمام جزئي <br>
                                        <b>الكيلو ١٩، سيتي فيو، الطريق الصحراوي، طريق مصر - إسكندرية الصحراوي</b><br><br>

                                        <i>معلومات أكثر</i>
                                    </div>
                                </div>
                                <div class="properties_details_div">
                                    <div class="btn-group properties_details_btns_div">
                                        <button type="button" class="btn btn-default properties_btns">
                                            <a href="<?= base_url().'ar/';?>propertyDetails">
                                                <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                التفاصيل
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-default properties_btns"> 
                                            <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                            ٠ صور
                                        </button>
                                        <button type="button" class="btn btn-default properties_btns">
                                            <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_plus.png" style="width: 24px;"/>
                                            شارك
                                        </button>
                                    </div>
                                    <div class="properties_contact">
                                        <a href="#" class="properties_contact_btn">
                                            اتصال
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="properties_common_bottom_div">
                                <div class="checkbox properties_ckbx">
                                    <label>
                                      <input name="property_chkbx" type="checkbox"> 
                                    </label>
                                </div>
                                <div class="properties_img">
                                    <img src="<?= base_url();?>/application/static/images/sample_property.png"/>
                                </div>
                                <div class="properties_number">
                                    3
                                </div>
                                <div class="properties_info">
                                    <div class="properties_title">
                                        ٢٬٠٠٠٬٠٠٠ جنيه مصري <img class="properties_star_icon" src="<?= base_url();?>/application/static/images/icon_orange_star.png"/>
                                    </div>
                                    <div class="properties_content">
                                        مقدر الدفع الشهري: ٢٢٫٨٠٢ جنيه مصري <br>
                                        <b>٤</b> أسرة, <b>٤</b> حمام كامل, <b>١</b> حمام جزئي <br>
                                        <b>الكيلو ١٩، سيتي فيو، الطريق الصحراوي، طريق مصر - إسكندرية الصحراوي</b><br><br>

                                        <i>معلومات أكثر</i>
                                    </div>
                                </div>
                                <div class="properties_details_div">
                                    <div class="btn-group properties_details_btns_div">
                                        <button type="button" class="btn btn-default properties_btns">
                                            <a href="<?= base_url().'ar/';?>propertyDetails">
                                                <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                التفاصيل
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-default properties_btns"> 
                                            <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                            ٠ صور
                                        </button>
                                        <button type="button" class="btn btn-default properties_btns">
                                            <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_plus.png" style="width: 24px;"/>
                                            شارك
                                        </button>
                                    </div>
                                    <div class="properties_contact">
                                        <a href="#" class="properties_contact_btn">
                                            اتصال
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="properties_common_bottom_div">
                                <div class="checkbox properties_ckbx">
                                    <label>
                                      <input name="property_chkbx[]" type="checkbox">
                                    </label>
                                </div>
                                <div class="properties_img">
                                    <img src="<?= base_url();?>/application/static/images/sample_property.png"/>
                                </div>
                                <div class="properties_number">
                                    4
                                </div>
                                <div class="properties_info">
                                    <div class="properties_title">
                                        ٢٬٠٠٠٬٠٠٠ جنيه مصري <img class="properties_star_icon" src="<?= base_url();?>/application/static/images/icon_gray_star.png"/>
                                    </div>
                                    <div class="properties_content">
                                        مقدر الدفع الشهري: ٢٢٫٨٠٢ جنيه مصري <br>
                                        <b>٤</b> أسرة, <b>٤</b> حمام كامل, <b>١</b> حمام جزئي <br>
                                        <b>الكيلو ١٩، سيتي فيو، الطريق الصحراوي، طريق مصر - إسكندرية الصحراوي</b><br><br>

                                        <i>معلومات أكثر</i>
                                    </div>
                                </div>
                                <div class="properties_details_div">
                                    <div class="btn-group properties_details_btns_div">
                                        <button type="button" class="btn btn-default properties_btns">
                                            <a href="<?= base_url().'ar/';?>propertyDetails">
                                                <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                التفاصيل
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-default properties_btns"> 
                                            <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                            ٠ صور
                                        </button>
                                        <button type="button" class="btn btn-default properties_btns">
                                            <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_plus.png" style="width: 24px;"/>
                                            شارك
                                        </button>
                                    </div>
                                    <div class="properties_contact">
                                        <a href="#" class="properties_contact_btn">
                                            اتصال
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12 col-md-3 col-xs-3 properties_header_cols hidden-sm hidden-xs" id="properties_bottom_right_div">

                        </div>
                    </div>
                </div>
            </div>
            <div id="properties_compare_div">
                <button type="submit" class="btn btn-default properties_contact_btn" onclick="redirect('ar');">قارن</button>
                <!-- <a href="http://localhost/ColdwellBanker/index.php/controller_property/compare_properties/ar" class="properties_contact_btn"> -->
                    
                </a>
            </div>
        </form>
    </div>
    <div id="property_notifier">
        <?php include 'property_alert.php'; ?>
    </div>
    <?php include('footer.php'); ?>