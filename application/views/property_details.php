<?php include('header.php'); ?>
<div id="images" class="hide">
    <?= $images; ?>
</div>
        <div class="container" id="property_address_div">
            <h1><b> 
            <?php if ($searchResults->LocationProject != ''): ?>
                <?php echo $searchResults->PrpertyTypeStr;?> for <?php echo $searchResults->SalesTypeStr;?> <?php echo $searchResults->LocationProject; ?>, <?php echo $searchResults->LocationDistrict; ?>, <?php echo $searchResults->LocationCity; ?>
            <?php else: ?>
                <?php echo $searchResults->PrpertyTypeStr;?> for <?php echo $searchResults->SalesTypeStr;?> <?php echo $searchResults->LocationDistrict; ?>, <?php echo $searchResults->LocationCity; ?>
            <?php endif ?>
            </b></h1>
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
                                <img id="property_mainimage" src="">
                            </div>
                            <div class="visible-xs hidden-lg hidden-md hidden-sm" id="property_image_btn_div">
                                <button type="button" class="btn btn-default property_btn">View More Images</button>
                            </div>
                            <div id="property_details_thumbnails" class="hidden-xs">
                                <p id="property_thumbnails_count">1 of <span id="imgCount"></span> Images</p>
                                <div class="well property_well">
                                    <div class="carousel slide" id="property_carousel">
                                        <div class="carousel-inner" id="carousal_div">
                                            
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
                                        Bedrooms: <?php echo $searchResults->BedRoomsNumber;?> 
                                        <?php if ($searchResults->BathRoomsNumber != 0): ?>
                                            , Bathrooms: <?php echo $searchResults->BathRoomsNumber;?>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <!-- <div class="property_features_divs">
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
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 property_details_cols">
                        <div id="property_description" class="property_borders">
                            <div class="property_titles">
                                <?php echo $this->lang->line('propertydetails_title1'); ?>
                            </div>
                            <div id="property_description_content">
                                <div class="row" style="margin-left: 0;">
                                    <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle1'); ?> </b> <?php echo $searchResults->UnitId;?>
                                </div>
                                <div class="row" style="margin-left: 0;">
                                    <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle2'); ?> </b> <?php echo $searchResults->PrpertyTypeStr;?>
                                </div>
                                <div class="row" style="margin-left: 0;">
                                    <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle3'); ?> </b> <?php echo explode('.',$searchResults->TotalArea)[0];?> <?php echo $searchResults->AreaunitStr;?>s
                                </div>
                                <div class="row" style="margin-left: 0;">
                                    <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle4'); ?> </b> <?php echo $searchResults->SalesTypeStr;?>
                                </div>
                                <div class="row" style="margin-left: 0;">
                                    <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle5'); ?> </b> <?php echo $searchResults->InteriorFinishing;?>
                                </div>
                                <div class="row" style="margin-left: 0;">
                                    <?php if ($searchResults->SalesTypeStr == 'Sale'): ?>
                                        <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle6'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $searchResults->SaleCurrency.' '.number_format(explode('.',$searchResults->SalePrice)[0]); ?></span>
                                    <?php else: ?>
                                        <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle7'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $searchResults->RentCurrency.' '.number_format(explode('.',$searchResults->RentPrice)[0]); ?></span>
                                    <?php endif ?>
                                </div>
                                <!-- Lorem ipsum dolor sit amet, consectetuer adipiscing elit,sed diam nonummy ni 
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad 
                                im veniam,quis nostrud exerci tation ullamcorper.. Lorem ipsum dolor sit amet, co
                                ectetuer adipiscing elit, sed diam nonummy nibh.. Lorem ipsum dolor sit amet, consectetuer adipiscing elit,sed diam nonummy ni 
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad 
                                im veniam, quis nostrud exerci tation ullamcorper..im veniam, <br>
                                Price: <b>EGP 2,000,000</b>. -->
                            </div>
                        </div>
                        <div id="property_contact" class="property_borders">
                            <div class="property_titles">
                                <?php echo $this->lang->line('propertydetails_title4'); ?>
                            </div>
                            <div id="property_contact_content">
                                <div class="row">
                                    <form class="form-inline" id="property_form" role="form" method="post" action="">
                                            <div class="form-group" style="width:100%;">
                                                <div class="col-lg-4">
                                                    <label for="property_first_name"><?php echo $this->lang->line('propertydetails_firstname'); ?></label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" name="firstName" id="property_first_name" placeholder="Enter First Name">
                                                </div>
                                            </div>
                                            <div class="form-group" style="width:100%;">
                                                <div class="col-lg-4">
                                                    <label for="property_last_name"><?php echo $this->lang->line('propertydetails_lastname'); ?></label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" name="lastName" id="property_last_name" placeholder="Enter Last Name">
                                                </div>
                                            </div>
                                            <div class="form-group" style="width:100%;">
                                                <div class="col-lg-4">
                                                    <label><?php echo $this->lang->line('propertydetails_email'); ?></label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="email" class="form-control" name="email" id="property_email" placeholder="Enter E-mail">
                                                </div>
                                            </div>
                                            <div class="form-group" style="width:100%;">
                                                <div class="col-lg-4">
                                                    <label for="property_phone"><?php echo $this->lang->line('propertydetails_phone'); ?></label>
                                                </div>
                                                <div class="col-lg-8"> 
                                                    <input type="text" class="form-control" name="phone" id="property_phone" placeholder="Enter Phone">
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
                                        <!-- <div> -->
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
                                        <?php echo $this->lang->line('propertydetails_calculator_subtitle1'); ?> <a href="#calculatorTallModal" data-toggle="modal"> Launch Calculator</a>
                                    </div>
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
                      <h4 class="calculator_modal_title"><?php echo $this->lang->line('propertydetails_calculator_title2'); ?></h4>
                      <div style="font-size: 12px;margin-left: 60px;font-weight: lighter;">
                          <?php echo $this->lang->line('propertydetails_calculator_subtitle2'); ?>
                      </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6" style="border-right: 2px solid #5a7baa;">
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
                                            <input type="text" class="form-control calculator_form_input" name="interestRate" id="interestRate" placeholder="0"><div style="margin-top: -28px;margin-left: 178px;"> %</div>
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
                                <div style="margin-top: -25px;margin-left: 70px;font-weight: lighter;font-size: 12px;"> Yrs. (Maximum loan terms is 5 yrs.)</div>
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
        <!-- // <script type="text/javascript" src="http://localhost/ColdwellBanker/js/script.js"></script> -->
        <script>
        $(function () {
          $('#property_tabs a:first').tab('show');
        });
        $(document).ready(function (){
           

           var main_image_src = $(".imagesList > li:nth-child(1) > img").attr('src');
           if(main_image_src){
                $("#property_mainimage").attr('src', main_image_src);
           }else{
                $("#property_mainimage").attr('src', $("#url").val()+'/application/static/images/sample_property_image.png');
           }

           //item_html = $("#carousal_div").html();


           var html_output ='';
           var image_count = 0;
           var flag = 1;

           $(".imagesList li").each(function(){
                image_count++;

                if(image_count == 1){
                    html_output += '<div class="item active"><div class="row">';
                }

                if(flag == 0){
                    html_output += '<div class="item"><div class="row">';
                    flag = 1;
                }

                html_output+= '<div class="property_thumbnail"><img src="'+$(this).find('img').attr('src')+'" alt="Image" class="img-responsive"></a></div>';

                if(image_count % 3 == 0 && flag == 1){
                    html_output += '</div></div>';
                    flag = 0;
                }


           });

           if(image_count == 0){
              $("#property_details_thumbnails").hide();
           }

           $("#imgCount").html(image_count);

           $("#carousal_div").html(html_output);
           
           $('.property_thumbnail > img').click(function (){
               $('#property_mainimage').attr("src", $(this).attr("src"));
           }) ;


        });

    </script>
    <?php include('footer.php'); ?>