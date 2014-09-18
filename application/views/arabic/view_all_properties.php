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
                                                <?php echo $this->lang->line('viewallproperties_details'); ?>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-default properties_btns"  data-toggle="modal" data-target="#imagesModal"> 
                                            <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                            ٠ <?php echo $this->lang->line('viewallproperties_images'); ?>
                                        </button>
                                        <button type="button" class="btn btn-default properties_btns" id="properties_share_btn">
                                            <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_plus.png" style="width: 24px;"/>
                                            <?php echo $this->lang->line('viewallproperties_share'); ?>
                                        </button>
                                    </div>
                                    <div class="properties_share_div">
                                        <div class="row" style="margin: auto;">
                                            <a href="#"><img class="properties_details_share1" src="<?= base_url();?>/application/static/images/fb-share.png" style=""/></a>
                                        </div>
                                        <div class="row" style="margin: auto;margin-top: 8%;">
                                            <a href="#"><img class="properties_details_share2" src="<?= base_url();?>/application/static/images/tw-share.png" style=""/></a>
                                        </div>
                                    </div>
                                    <div class="properties_contact">
                                        <a href="#contactModal" class="properties_contact_btn" data-toggle="modal">
                                            <?php echo $this->lang->line('viewallproperties_contact'); ?>
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
                <!-- <button type="submit" class="btn btn-default properties_contact_btn" onclick="redirect('en');">Compare</button> -->
                <a href="<?=base_url(); ?>compareProperties" class="properties_contact_btn">
                    <?php echo $this->lang->line('viewallproperties_compare'); ?>
                </a>
            </div>
        </form>
    </div>

    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Contact</h4>
                </div>
                <div class="modal-body">
                    <form class="form-inline" id="property_form" role="form">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label for="property_first_name"><?php echo $this->lang->line('propertydetails_firstname'); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="property_first_name" placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label for="property_last_name"><?php echo $this->lang->line('propertydetails_lastname'); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="property_last_name" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label for="property_email"><?php echo $this->lang->line('propertydetails_email'); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="email" class="form-control" id="property_email" placeholder="Enter E-mail">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label for="property_phone"><?php echo $this->lang->line('propertydetails_phone'); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="property_phone" placeholder="Enter Phone">
                            </div>
                        </div>
                        <div class="form-group" style="width: 97%;">
                            <p><?php echo $this->lang->line('propertydetails_text'); ?></p>
                            <textarea class="form-control" id="property_form_textarea" style="width:100%;" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default property_btn" id="contact_form_btn" onClick="cmdCalc_Click(this.form);"><?php echo $this->lang->line('propertydetails_button'); ?></button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="imagesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Property Images</h4>
                    </div>
                    <div class="modal-body">
                        <img id="property_mainimage" src="<?= base_url();?>/application/static/images/sample_property_image.png">
                        <div class="well property_well" style="margin-top:3%;">
                            <div class="carousel slide" id="property_carousel" style="">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <div class="row">
                                            <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/tw-share.png" alt="Image" class="img-responsive"></a>
                                            </div>
                                            <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive"></a>
                                            </div>
                                            <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/tw-share.png" alt="Image" class="img-responsive"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="row">
                                            <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive"></a>
                                            </div>
                                            <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive"></a>
                                            </div>
                                            <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#property_carousel" data-slide="prev"><img src="<?= base_url();?>application/static/images/left_arrow.png">  </a>
                                <a class="right carousel-control" href="#property_carousel" data-slide="next"> <img src="<?= base_url();?>application/static/images/right_arrow.png"> </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>


    <div id="property_notifier">
        <?php include 'property_alert.php'; ?>
    </div>
    <?php include('footer.php'); ?>

        <script>
        $(document).ready(function (){
           $('.property_thumbnail > img').click(function (){
               $('#property_mainimage').attr("src", $(this).attr("src"));
           }) ;
        });
        </script>
