<?php include('header.php'); ?>
        <div class="container" id="property_address_div">
            Kilo 19, City View, Sahrawy, Alex - Cairo Desert Road
        </div>
        <div class="container" id="property_details_container">
            <div id="property_tabs_header">
                <ul class="nav nav-tabs nav-justified" id="property_tabs">
                    <li class="active"><a href="#details" data-toggle="tab"><?php echo $this->lang->line('propertydetails_tab1'); ?></a></li>
                    <li><a href="#map" data-toggle="tab"><?php echo $this->lang->line('propertydetails_tab2'); ?></a></li>
                </ul>
            </div>

            <div class="tab-content property_details_body">
                <div class="tab-pane active" id="details">
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 property_details_cols">
                        <div id="property_details_images" class="property_borders">
                            <div id="property_details_mainimage">
                                <img id="property_mainimage" src="<?= base_url();?>/application/static/images/sample_property_image.png">
                            </div>
                            <div class="visible-xs hidden-lg hidden-md hidden-sm" id="property_image_btn_div">
                                <button type="button" class="btn btn-default property_btn">View More Images</button>
                            </div>
                            <div id="property_details_thumbnails" class="hidden-xs">
                                <p id="property_thumbnails_count">1 of 45 Images</p>
                                <div class="well property_well">
                                    <div class="carousel slide" id="property_carousel">
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <div class="row">
                                                    <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive"></a>
                                                    </div>
                                                    <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive"></a>
                                                    </div>
                                                    <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive"></a>
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
                        </div>
                        <div id="property_features_div" class="property_borders">
                            <div class="property_titles">
                                <?php echo $this->lang->line('propertydetails_title3'); ?>
                            </div>
                            <div id="property_features_details">
                                <div class="property_features_divs">
                                    <div class="property_features_divs_title">
                                        General
                                    </div>
                                    <div class="property_features_divs_details">
                                        Special Program: Previews
                                    </div>
                                </div>
                                <div class="property_features_divs">
                                    <div class="property_features_divs_title">
                                        Feature
                                    </div>
                                    <div class="property_features_divs_details">
                                        Garage Description: No Garage
                                    </div>
                                </div>
                                <div class="property_features_divs">
                                    <div class="property_features_divs_title">
                                        Amenities
                                    </div>
                                    <div class="property_features_divs_details">
                                        4+ Fireplaces
                                    </div>
                                </div>
                                <div class="property_features_divs">
                                    <div class="property_features_divs_title">
                                        Outdoor
                                    </div>
                                    <div class="property_features_divs_details">
                                        Style: Other Style
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 property_details_cols">
                        <div id="property_description" class="property_borders">
                            <div class="property_titles">
                                <?php echo $this->lang->line('propertydetails_title1'); ?>
                            </div>
                            <div id="property_description_content">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit,sed diam nonummy ni 
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad 
                                im veniam,quis nostrud exerci tation ullamcorper.. Lorem ipsum dolor sit amet, co
                                ectetuer adipiscing elit, sed diam nonummy nibh.. Lorem ipsum dolor sit amet, consectetuer adipiscing elit,sed diam nonummy ni 
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad 
                                im veniam, quis nostrud exerci tation ullamcorper..im veniam, <br>
                                Price: <b>EGP 2,000,000</b>.
                            </div>
                        </div>
                        <div id="property_calculator" class="property_borders">
                            <div id="property_calculator_title">
                                <?php echo $this->lang->line('propertydetails_title2'); ?>
                            </div>
                            <div id="property_calculator_content">
                                <div>
                                    <img src="<?= base_url();?>/application/static/images/icon_calculator.png"/>
                                </div>
                                <div id="property_calculator_details">
                                    <div class="property_titles">
                                        Monthly Payments
                                    </div>
                                    <div class="property_calculator_data">
                                        Understanding your monthly costs can help you plan ahead and make important housing decisions. <a href="#calculatorTallModal" data-toggle="modal"> Launch Calculator</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="property_contact" class="property_borders">
                            <p>
                                <?php echo $this->lang->line('propertydetails_title4'); ?>
                            </p>
                            <div id="property_contact_content">
                                <div class="row">
                                    <form class="form-inline" id="property_form" role="form">
                                            <div class="form-group">
                                                <label for="property_first_name"><?php echo $this->lang->line('propertydetails_firstname'); ?></label>
                                                <input type="text" class="form-control" id="property_first_name" placeholder="Enter First Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="property_last_name"><?php echo $this->lang->line('propertydetails_lastname'); ?></label>
                                                <input type="text" class="form-control" id="property_last_name" placeholder="Enter Last Name">
                                            </div>
                                            <div class="form-group"><?php echo $this->lang->line('propertydetails_email'); ?>E-mail</label>
                                                <input type="email" class="form-control" id="property_email" placeholder="Enter E-mail">
                                            </div>
                                            <div class="form-group">
                                                <label for="property_phone"><?php echo $this->lang->line('propertydetails_phone'); ?></label>
                                                <input type="text" class="form-control" id="property_phone" placeholder="Enter Phone">
                                            </div>
                                        <div class="form-group">
                                           <p> <?php echo $this->lang->line('propertydetails_interest'); ?> 
                                                <label class="checkbox-inline">
                                                   <input type="checkbox" id="inlineChkbx1"value="buying"> <?php echo $this->lang->line('propertydetails_chkbx1'); ?>
                                                </label>
                                                <label class="checkbox-inline">
                                                   <input type="checkbox" id="inlineChkbx2"value="selling"> <?php echo $this->lang->line('propertydetails_chkbx2'); ?>
                                                </label>
                                                <label class="checkbox-inline">
                                                   <input type="checkbox" id="inlineChkbx3"value="renting"> <?php echo $this->lang->line('propertydetails_chkbx3'); ?>
                                                </label>
                                           </p>
                                        </div>
                                        <div class="form-group" style="width: 97%;">
                                            <p><?php echo $this->lang->line('propertydetails_text'); ?></p>
                                            <textarea class="form-control" id="property_form_textarea" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default property_btn" id="property_form_btn" onClick="cmdCalc_Click(this.form);"><?php echo $this->lang->line('propertydetails_button'); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="tab-pane" id="map">

                </div>
            </div>
            <form>
            <div id="calculatorTallModal" class="modal modal-wide fade">
                <div class="modal-dialog">
                  <div class="calculator_modal_content modal-content">
                    <div class="calculator_modal_header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <img style="width: 6%;" src="<?= base_url();?>/application/static/images/icon_calculator.png">
                      <h4 class="calculator_modal_title">Monthly Payment Calculator</h4>
                      <div style="font-size: 12px;margin-left: 60px;font-weight: lighter;">
                          Input your loan and property information below.
                      </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6" style="border-right: 2px solid #5a7baa;">
                                <div class="calculator_col_title">
                                    Purchase Information
                                </div>
                                <div class="calculator_col_content">
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            Purchase Price:
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="purchasePrice" id="purchasePrice" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            Down Payment:
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="downPayment" id="downPayment" placeholder="0" onChange="calculatePayment(this.form);">
                                        </div>
                                    </div>
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            Interest Rate:
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="interestRate" id="interestRate" placeholder="0"><div style="margin-top: -28px;margin-left: 178px;"> %</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="calculator_col_title">
                                    Your Results
                                </div>
                                <div class="calculator_col_content">
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            Balance:
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="balance" id="balance" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            Total Payment:
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="totalPayment" id="totalPayment" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            Monthly Payment:
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="monthlyPayment" id="monthlyPayment" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="calculator_labels col-lg-2">
                                Loan Term:
                            </div>
                            <div class="calculator_inputs col-lg-7">
                                <input type="text" class="form-control" name="loanTerm" id="loanTerm" placeholder="5"> 
                                <div style="margin-top: -25px;margin-left: 70px;font-weight: lighter;font-size: 12px;"> Yrs. (Maximum loan terms is 5 yrs.)</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="margin: auto;width: 185px;">
                        <div class="col-lg-12">
                            <input type="button" class="btn btn-default calculator_btn_submit" value="Calculate" style="" onClick="cmdCalc_Click(this.form)">
                       </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            </form>
        </div>
        <div id="property_notifier">
            <?php include 'property_alert.php'; ?>
        </div>
        <!-- // <script type="text/javascript" src="http://localhost/ColdwellBanker/js/script.js"></script> -->
        <script>
        $(function () {
          $('#property_tabs a:first').tab('show');
        });
        $(document).ready(function (){
           $('.property_thumbnail > img').click(function (){
               $('#property_mainimage').attr("src", $(this).attr("src"));
           }) ;
        });
    </script>
    <?php include('footer.php'); ?>