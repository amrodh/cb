
        <?php include('header.php'); ?>
        <div id="search_div">
            <?php include('search.php'); ?>
        </div>
        <div class="container properties_main_div">
            <form>
                <div class="properties_top_div">
                    <div id="properties_top_header_div">
                        <!--<div id="properties_top_header_left_div">-->
                            <p style="padding-left: 20px;"><b>1 - 10</b> of <b>221</b> Homes for Sale in Mohandeseen</p>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-5 col-sm-5 col-xs-6 properties_header_cols">
                                        View 
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" id="properties_limit_dropdown">10</button>
                                            <button type="button" class="btn btn-default dropdown-toggle" 
                                               data-toggle="dropdown" style="height: 34px;">
                                               <span class="caret"></span>
                                               <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu properties_limit_drpdwn" role="menu">
                                               <li>10</li>
                                               <li>20</li>
                                               <li>30</li>
                                               <li>40</li>
                                               <li>50</li>
                                            </ul>
                                        </div>
                                        results per page
                                    </div>
                                    <div class="col-lg-6 col-md-5 col-sm-5 col-xs-6 properties_header_cols">
                                        Sort Results By
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" id="properties_sorting_dropdown">Price High - Low</button>
                                            <button type="button" class="btn btn-default dropdown-toggle properties_sort_btn"
                                               data-toggle="dropdown" style="height: 34px;">
                                               <span class="caret"></span>
                                               <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu properties_sort_drpdwn" role="menu">
                                               <li>Price High - Low</li>
                                               <li>Price Low - High</li>
                                               <li>City A - Z</li>
                                               <li>City Z - A</li>
                                               <li>Area High - Low</li>
                                               <li>Area Low - Low</li>
                                            </ul>
                                        </div>
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
                                            EGP 2,000,000 <img class="properties_star_icon" src="<?= base_url();?>/application/static/images/icon_orange_star.png"/>
                                        </div>
                                        <div class="properties_content">
                                            Est.Mo/Payment: EGP 22,802 <br>
                                            <b>4</b> Bed, <b>4</b> Full Bath, <b>1</b> Partial Bath <br>
                                            <b>Kilo 19, City View, Sahrawy, Alex - Cairo Desert Road</b><br><br>

                                            <i>More info if available</i>
                                        </div>
                                    </div>
                                    <div class="properties_details_div">
                                        <div class="btn-group properties_details_btns_div">
                                            <button type="button" class="btn btn-default properties_btns">
                                                <a href="<?= base_url();?>propertyDetails">
                                                    <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                    Details
                                                </a>
                                            </button>
                                            <button type="button" class="btn btn-default properties_btns"> 
                                                <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                0 Images
                                            </button>
                                            <button type="button" class="btn btn-default properties_btns">
                                                <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_plus.png" style="width: 24px;"/>
                                                Share
                                            </button>
                                        </div>
                                        <div class="properties_contact">
                                            <a href="#" class="properties_contact_btn">
                                                Contact
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
                                            EGP 2,000,000 <img class="properties_star_icon" src="<?= base_url();?>/application/static/images/icon_gray_star.png"/>
                                        </div>
                                        <div class="properties_content">
                                            Est.Mo/Payment: EGP 22,802<br>
                                            <b>4</b> Bed, <b>4</b> Full Bath, <b>1</b> Partial Bath <br>
                                            <b>kilo 19, City View, Sahrawy, Alex - Cairo Desert Road</b><br><br>

                                            <i>More info if available</i>
                                        </div>
                                    </div>
                                    <div class="properties_details_div">
                                        <div class="btn-group properties_details_btns_div">
                                            <button type="button" class="btn btn-default properties_btns">
                                                <a href="<?= base_url();?>propertyDetails">
                                                    <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                    Details
                                                </a>
                                            </button>
                                            <button type="button" class="btn btn-default properties_btns"> 
                                                <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                0 Images
                                            </button>
                                            <button type="button" class="btn btn-default properties_btns">
                                                <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_plus.png" style="width: 24px;"/>
                                                Share
                                            </button>
                                        </div>
                                        <div class="properties_contact">
                                            <a href="#" class="properties_contact_btn">
                                                Contact
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
                                            EGP 2,000,000 <img class="properties_star_icon" src="<?= base_url();?>/application/static/images/icon_orange_star.png"/>
                                        </div>
                                        <div class="properties_content">
                                            Est.Mo/Payment: EGP 22,802<br>
                                            <b>4</b> Bed, <b>4</b> Full Bath, <b>1</b> Partial Bath <br>
                                            <b>kilo 19, City View, Sahrawy, Alex - Cairo Desert Road</b><br><br>

                                            <i>More info if available</i>
                                        </div>
                                    </div>
                                    <div class="properties_details_div">
                                        <div class="btn-group properties_details_btns_div">
                                            <button type="button" class="btn btn-default properties_btns">
                                                <a href="<?= base_url();?>propertyDetails">
                                                    <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                    Details
                                                </a>
                                            </button>
                                            <button type="button" class="btn btn-default properties_btns"> 
                                                <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                0 Images
                                            </button>
                                            <button type="button" class="btn btn-default properties_btns">
                                                <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_plus.png" style="width: 24px;"/>
                                                Share
                                            </button>
                                        </div>
                                        <div class="properties_contact">
                                            <a href="#" class="properties_contact_btn">
                                                Contact
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
                                            EGP 2,000,000 <img class="properties_star_icon" src="<?= base_url();?>/application/static/images/icon_gray_star.png"/>
                                        </div>
                                        <div class="properties_content">
                                            Est.Mo/Payment: EGP 22,802  <br>
                                            <b>4</b> Bed, <b>4</b> Full Bath, <b>1</b> Partial Bath <br>
                                            <b>kilo 19, City View, Sahrawy, Alex - Cairo Desert Road</b><br><br>

                                            <i>More info if available</i>
                                        </div>
                                    </div>
                                    <div class="properties_details_div">
                                        <div class="btn-group properties_details_btns_div">
                                            <button type="button" class="btn btn-default properties_btns">
                                                <a href="<?= base_url();?>propertyDetails">
                                                    <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                    Details
                                                </a>
                                            </button>
                                            <button type="button" class="btn btn-default properties_btns"> 
                                                <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                0 Images
                                            </button>
                                            <button type="button" class="btn btn-default properties_btns">
                                                <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_plus.png" style="width: 24px;"/>
                                                Share
                                            </button>
                                        </div>
                                        <div class="properties_contact">
                                            <a href="#" class="properties_contact_btn">
                                                Contact
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
                    <button type="submit" class="btn btn-default properties_contact_btn" onclick="redirect('en');">Compare</button>
<!--                    <a href="http://localhost/ColdwellBanker/index.php/controller_property/compare_properties" class="properties_contact_btn">
                        Compare
                    </a>-->
                </div>
            </form>
        </div>
        <div id="property_notifier">
            <?php include 'property_alert.php'; ?>
        </div>
        
        <!-- // <script type="text/javascript" src="http://localhost/ColdwellBanker/js/script.js"></script> -->
        <?php include('footer.php'); ?>
