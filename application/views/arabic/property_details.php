<?php include('header.php'); ?>
<div id="images" class="hide">
    <ul class="imagesList">
        <?php foreach ($images['src'] as $key => $image): ?>
            <li>
                <img src="<?= base_url();?>/application/static/upload/property_images/<?= $image; ?>">
            </li>
        <?php endforeach ?>
    </ul>
<!--     <?= $images; ?> -->
</div>
        <div class="container" id="property_address_div">
            <h1><b> 
            <?php if ($searchResults->LocationProject != ''): ?>
                <?php echo $searchResults->PrpertyTypeStr;?> for <?php echo $searchResults->SalesTypeStr;?> <?php echo $searchResults->LocationProject; ?>, <?php echo $searchResults->LocationDistrict; ?>, <?php echo $searchResults->LocationCity; ?>
            <?php else: ?>
                <?php echo $searchResults->PrpertyTypeStr;?> for <?php echo $searchResults->SalesTypeStr;?> <?php echo $searchResults->LocationDistrict; ?>, <?php echo $searchResults->LocationCity; ?>
            <?php endif ?>
            </b></h1>
            <input type="hidden" name="unitType" id="unitType" value="<?php echo $searchResults->PrpertyTypeStr;?>">
        </div>
        <div class="container" id="property_details_container">
            <div id="property_tabs_header">
                <ul class="nav nav-tabs nav-justified" id="property_tabs">
                    <li class="active"><a href="#details" data-toggle="tab"><?php echo $this->lang->line('propertydetails_tab1'); ?></a></li>
                    <!-- <li><a href="#map" data-toggle="tab"><?php echo $this->lang->line('propertydetails_tab2'); ?></a></li> -->
                </ul>
            </div>

            <div class="tab-content property_details_body">
                <div class="tab-pane active" id="details">
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 property_details_cols">
                        <div id="property_details_images" class="property_borders" style="height:480px!important; width:535px!important">
                            <?php if (is_array($images['src'])): ?>
                                <div u="slides" style="cursor: move; position: absolute; width: 495px; height: 356px; overflow: hidden;">
                                    <?php foreach ($images['src'] as $key => $image): ?>
                                        <div>
                                            <img u="image" src="<?= base_url();?>/application/static/upload/property_images/<?= $image; ?>" />
                                            <img u="thumb" src="<?= base_url();?>/application/static/upload/property_images/<?= $image; ?>" />
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 185px; left: 25px;">
                                </span>
                                <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 185px; right: 25px">
                                </span>
                                <div u="thumbnavigator" class="jssort01" style="overflow: hidden; position: absolute; width: 495px; height: 100px; left:20px; bottom: 0px;">
                                    <div u="slides" style="cursor: move;">
                                        <div u="prototype" class="p" style="position: absolute; width: 72px; height: 72px; top: 0; left: 0;">
                                            <div class=w><div u="thumbnailtemplate" style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></div></div>
                                            <div class=c>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Thumbnail Item Skin End -->
                                </div>
                            <?php else: ?>
                                <img src="<?= base_url();?>/application/static/images/No_image.svg" class="img-responsive" style="width: 90%;margin: auto;">
                            <?php endif ?>
                        </div>
                        <div id="property_features_div" class="property_borders" style="margin-top: 9%;margin-right: -3%;width: 106%;">
                            <div class="property_titles">
                                <?php echo $this->lang->line('propertydetails_title3'); ?>
                            </div>
                            <div id="property_features_details">
                                <div class="property_features_divs">
                                    <div class="property_features_divs_title">
                                        مميزات عامة
                                    </div>
                                    <div class="property_features_divs_details">
                                    <?php if ($searchResults->BedRoomsNumber != 0): ?>
                                         غرف نوم: <?php echo $searchResults->BedRoomsNumber;?> 
                                        <?php if ($searchResults->BathRoomsNumber != 0): ?>
                                            , الحمامات: <?php echo $searchResults->BathRoomsNumber;?>
                                        <?php endif ?>
                                    <?php endif ?>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 property_details_cols" style="padding-left:0;">
                        <div id="property_description" class="property_borders">
                            <div class="property_titles">
                                <?php echo $this->lang->line('propertydetails_title1'); ?>
                            </div>
                            <div id="property_description_content">
                                <div class="row" style="margin-left: 0;">
                                    <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle1'); ?> </b> <?php echo $searchResults->PropertyId;?>
                                </div>
                                <div class="row" style="margin-left: 0;">
                                    <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle2'); ?> </b> <?php echo $searchResults->PrpertyTypeStr;?>
                                </div>
                                <div class="row" style="margin-left: 0;">
                                    <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle3'); ?> </b> <?php echo explode('.',$searchResults->TotalArea)[0];?> <?php echo $searchResults->AreaunitStr;?>s 
                                </div>
                                <!-- <div class="row" style="margin-left: 0;">
                                    <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle4'); ?> </b> <?php echo $searchResults->SalesTypeStr;?>
                                </div> -->
                                <div class="row" style="margin-left: 0;">
                                    <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle5'); ?> </b> <?php echo $searchResults->InteriorFinishing;?>
                                </div>
                                <div class="row" style="margin-left: 0;">
                                    <?php if ($searchResults->SalesTypeStr == 'Rent'): ?>
                                        <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle7'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $searchResults->RentCurrency.' '.number_format(explode('.',$searchResults->RentPrice)[0]); ?></span><br>
                                        <?php if ($searchResults->SalePrice[0] != 0): ?>
                                            <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle6'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $searchResults->SaleCurrency.' '.number_format(explode('.',$searchResults->SalePrice)[0]); ?></span>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <?php if ($searchResults->SalesTypeStr == 'Sale'): ?>
                                            <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle6'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $searchResults->SaleCurrency.' '.number_format(explode('.',$searchResults->SalePrice)[0]); ?></span>
                                        <?php else: ?>
                                            <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle6'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $searchResults->SaleCurrency.' '.number_format(explode('.',$searchResults->SalePrice)[0]); ?></span><br>
                                            <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle7'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $searchResults->RentCurrency.' '.number_format(explode('.',$searchResults->RentPrice)[0]); ?></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                   <!--  <?php //if ($searchResults->SalesTypeStr == 'Sale'): ?>
                                        <b style="color: #5a7baa;"><?php //echo $this->lang->line('propertydetails_subtitle6'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $searchResults->SaleCurrency.' '.number_format(explode('.',$searchResults->SalePrice)[0]); ?></span>
                                    <?php //else: ?>
                                        <b style="color: #5a7baa;"><?php //echo $this->lang->line('propertydetails_subtitle7'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $searchResults->RentCurrency.' '.number_format(explode('.',$searchResults->RentPrice)[0]); ?></span>
                                    <?php //endif ?> -->
                                </div>
                            </div>
                        </div>                        
                        <div id="property_contact" class="property_borders">
                            <div class="property_titles">
                                <?php echo $this->lang->line('propertydetails_title4'); ?>
                            </div>
                            <div id="property_contact_content">
                                <div class="row">
                                    <form class="form-inline" id="property_form" role="form">
                                        <div class="form-group" style="width:100%;">
                                            <div class="col-lg-4">
                                                <label for="property_first_name"><?php echo $this->lang->line('propertydetails_firstname'); ?></label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="firstName" id="property_first_name" placeholder="أدخل الاسم الأول">
                                            </div>
                                        </div>
                                        <div class="form-group" style="width:100%;">
                                            <div class="col-lg-4">
                                                <label for="property_last_name"><?php echo $this->lang->line('propertydetails_lastname'); ?></label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="lastName" id="property_last_name" placeholder="أدخل إسم العائلة:">
                                            </div>
                                        </div>
                                        <div class="form-group" style="width:100%;">
                                            <div class="col-lg-4">
                                                <label><?php echo $this->lang->line('propertydetails_email'); ?></label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="email" class="form-control" name="email" id="property_email" placeholder="أدخل البريد الالكتروني:">
                                            </div>
                                        </div>
                                        <div class="form-group" style="width:100%;">
                                            <div class="col-lg-4">
                                                <label for="property_phone"><?php echo $this->lang->line('propertydetails_phone'); ?></label>
                                            </div>
                                            <div class="col-lg-8"> 
                                                <input type="text" class="form-control" name="phone" id="property_phone" placeholder="أدخل رقم الهاتف:">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           <p> <?php echo $this->lang->line('propertydetails_interest'); ?> 
                                                <label class="checkbox-inline">
                                                   <input type="checkbox" id="inlineChkbx1" name="interest[]" value="buying"> <?php echo $this->lang->line('propertydetails_chkbx1'); ?>
                                                </label>
                                                <!-- <label class="checkbox-inline">
                                                   <input type="checkbox" id="inlineChkbx2" name="interest[]" value="selling"> <?php echo $this->lang->line('propertydetails_chkbx2'); ?>
                                                </label> -->
                                                <label class="checkbox-inline">
                                                   <input type="checkbox" id="inlineChkbx3" name="interest[]" value="renting"> <?php echo $this->lang->line('propertydetails_chkbx3'); ?>
                                                </label>
                                           </p>
                                        </div>
                                        <div class="form-group" style="width: 97%;">
                                            <p><?php echo $this->lang->line('propertydetails_text'); ?></p>
                                            <textarea class="form-control" name="comments" id="property_form_textarea" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit" class="btn btn-default property_btn" id="property_form_btn" onClick="" value="<?php echo $this->lang->line('propertydetails_button'); ?>">
                                        </div>
                                        <input type="hidden" id="propertyID" value="<?php echo $searchResults->PropertyId?>">
                                        <!-- <div class="form-group"> -->
                                            <p><?php echo $this->lang->line('propertydetails_footnote'); ?></p>
                                        <!-- </div> -->
                                        <?php if (isset($contactError)) :?>
                                        <div class="row" style="width: 100%;text-align:center;margin-left:0%;margin-top:2%;">
                                            <div class="alert alert-danger" role="alert">
                                               <?= $contactError; ?>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                            <?php if (isset($contactSuccess)): ?>
                                                <div class="row"  style="width: 94.5%;margin-left:3%;margin-top:2%;">
                                                    <div class="alert alert-success" role="alert" style="text-align: center;">
                                                        <?= $contactSuccess; ?>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </form>
                                </div>
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
                                        <?php echo $this->lang->line('propertydetails_calculator_title1'); ?>
                                    </div>
                                    <div class="property_calculator_data">
                                        <?php echo $this->lang->line('propertydetails_calculator_subtitle1'); ?> <a href="#calculatorTallModal" data-toggle="modal"> فتح الألة الحاسبة</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- <div class="tab-pane" id="map">

                </div> -->
            </div>
            <form>
            <div id="calculatorTallModal" class="modal modal-wide fade">
                <div class="modal-dialog">
                  <div class="calculator_modal_content modal-content">
                    <div class="calculator_modal_header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <img style="width: 6%; margin-right: 15px" src="<?= base_url();?>/application/static/images/icon_calculator.png">
                      <h4 class="calculator_modal_title"><?php echo $this->lang->line('propertydetails_calculator_title2'); ?> </h4>
                      <div style="font-size: 12px;margin-right: 65px;font-weight: lighter;">
                          <?php echo $this->lang->line('propertydetails_calculator_subtitle2'); ?>
                      </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6" style="border-left: 2px solid #5a7baa;">
                                <div class="calculator_col_title">
                                    <?php echo $this->lang->line('propertydetails_calculator_title3'); ?>
                                </div>
                                <div class="calculator_col_content">
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            <?php echo $this->lang->line('propertydetails_calculator_title4'); ?>
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="purchasePrice" id="purchasePrice" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            <?php echo $this->lang->line('propertydetails_calculator_title5'); ?>
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="downPayment" id="downPayment" placeholder="0" onChange="calculatePayment(this.form);">
                                        </div>
                                    </div>
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            <?php echo $this->lang->line('propertydetails_calculator_title6'); ?>
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="interestRate" id="interestRate" placeholder="0"><div style="margin-top: -25px;margin-right: 165px;"> %</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="calculator_col_title">
                                    <?php echo $this->lang->line('propertydetails_calculator_title7'); ?>
                                </div>
                                <div class="calculator_col_content">
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            <?php echo $this->lang->line('propertydetails_calculator_title8'); ?>
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="balance" id="balance" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            <?php echo $this->lang->line('propertydetails_calculator_title9'); ?>
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="totalPayment" id="totalPayment" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            <?php echo $this->lang->line('propertydetails_calculator_title10'); ?>
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
                                <?php echo $this->lang->line('propertydetails_calculator_title11'); ?>
                            </div>
                            <div class="calculator_inputs col-lg-7">
                                <input type="text" class="form-control" name="loanTerm" id="loanTerm" placeholder="5"> 
                                <div style="margin-top: -25px;margin-right: 70px;font-weight: lighter;font-size: 12px;"> سنة. (أقصى عدد سنوات للقرض هي 5 سنوات)</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="margin: auto;width: 185px;">
                        <div class="col-lg-12">
                            <input type="button" class="btn btn-default calculator_btn_submit" value="<?php echo $this->lang->line('propertydetails_calculator_button'); ?>" style="" onClick="cmdCalc_Click(this.form)">
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
            <!-- // <script type="text/javascript" src="<?= base_url();?>/application/static/js/script.js"></script> -->
            <script>
        $(function () {
          $('#property_tabs a:first').tab('show');
        });
        $(document).ready(function (){

            $('#property_form_btn').click(function(event) {
                var msg_length = $("#property_form_textarea").val().length;
                var email = $("#property_email").val();
                var phone = $("#property_phone").val();
                var language = $("#language").val();
                var serial = $("#propertyID").val();
                var unitType = $("#unitType").val();
                ga('send', 'event', 'ContactUs', 'Submit|Unit|'+serial+'|'+email+'|'+phone+'|'+msg_length+'|'+language+'|'+unitType, ' ContactUs');
                // alert($('#propertyID').val());return;
            });

            var _SlideshowTransitions = [
            //Fade in L
                {$Duration: 1200, x: 0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade out R
            //     , { $Duration: 1200, x: -0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            // //Fade in R
            //     , { $Duration: 1200, x: -0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            // //Fade out L
            //     , { $Duration: 1200, x: 0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

            // //Fade in T
            //     , { $Duration: 1200, y: 0.3, $During: { $Top: [0.3, 0.7] }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            // //Fade out B
            //     , { $Duration: 1200, y: -0.3, $SlideOut: true, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            // //Fade in B
            //     , { $Duration: 1200, y: -0.3, $During: { $Top: [0.3, 0.7] }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            // //Fade out T
            //     , { $Duration: 1200, y: 0.3, $SlideOut: true, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

            // //Fade in LR
            //     , { $Duration: 1200, x: 0.3, $Cols: 2, $During: { $Left: [0.3, 0.7] }, $ChessMode: { $Column: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            // //Fade out LR
            //     , { $Duration: 1200, x: 0.3, $Cols: 2, $SlideOut: true, $ChessMode: { $Column: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            // //Fade in TB
            //     , { $Duration: 1200, y: 0.3, $Rows: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Row: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            // //Fade out TB
            //     , { $Duration: 1200, y: 0.3, $Rows: 2, $SlideOut: true, $ChessMode: { $Row: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

            // //Fade in LR Chess
            //     , { $Duration: 1200, y: 0.3, $Cols: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            // //Fade out LR Chess
            //     , { $Duration: 1200, y: -0.3, $Cols: 2, $SlideOut: true, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            // //Fade in TB Chess
            //     , { $Duration: 1200, x: 0.3, $Rows: 2, $During: { $Left: [0.3, 0.7] }, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            // //Fade out TB Chess
            //     , { $Duration: 1200, x: -0.3, $Rows: 2, $SlideOut: true, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

            // //Fade in Corners
            //     , { $Duration: 1200, x: 0.3, y: 0.3, $Cols: 2, $Rows: 2, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $ChessMode: { $Column: 3, $Row: 12 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            // //Fade out Corners
            //     , { $Duration: 1200, x: 0.3, y: 0.3, $Cols: 2, $Rows: 2, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $SlideOut: true, $ChessMode: { $Column: 3, $Row: 12 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }

            // //Fade Clip in H
            //     , { $Duration: 1200, $Delay: 20, $Clip: 3, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            // //Fade Clip out H
            //     , { $Duration: 1200, $Delay: 20, $Clip: 3, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            // //Fade Clip in V
            //     , { $Duration: 1200, $Delay: 20, $Clip: 12, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            // //Fade Clip out V
            //     , { $Duration: 1200, $Delay: 20, $Clip: 12, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
                ];

            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                $ArrowKeyNavigation: true,                          //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 800,                                //Specifies default duration (swipe) for slide in milliseconds

                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                },

                $ThumbnailNavigatorOptions: {                       //[Optional] Options to specify and enable thumbnail navigator or not
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $SpacingX: 8,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 6,                             //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 200                          //[Optional] The offset position to park thumbnail
                }
            };

            var jssor_slider1 = new $JssorSlider$("property_details_images", options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$ScaleWidth(Math.max(Math.min(parentWidth, 800), 300));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end

//===================================================================================================================


           //  var main_image_src = $(".imagesList > li:nth-child(1) > img").attr('src');
           // if(main_image_src){
           //      $("#property_mainimage").attr('src', main_image_src);
           // }else{
           //      $("#property_mainimage").attr('src', $("#url").val()+'/application/static/images/No_image.svg');
           // }

           // //item_html = $("#carousal_div").html();


           // var html_output ='';
           // var image_count = 0;
           // var flag = 1;

           // $(".imagesList li").each(function(){
           //      image_count++;

           //      if(image_count == 1){
           //          html_output += '<div class="item active"><div class="row">';
           //      }

           //      if(flag == 0){
           //          html_output += '<div class="item"><div class="row">';
           //          flag = 1;
           //      }

           //      html_output+= '<div class="property_thumbnail"><img src="'+$(this).find('img').attr('src')+'" alt="Image" class="img-responsive"></a></div>';

           //      if(image_count % 3 == 0 && flag == 1){
           //          html_output += '</div></div>';
           //          flag = 0;
           //      }


           // });

           // if(image_count == 0){
           //    $("#property_details_thumbnails").hide();
           // }

           // $("#imgCount").html(image_count);

           // $("#carousal_div").html(html_output);
           

           // $('.property_thumbnail > img').click(function (){
           //     $('#property_mainimage').attr("src", $(this).attr("src"));
           // }) ;
        });
    </script>
    <?php include('footer.php'); ?>