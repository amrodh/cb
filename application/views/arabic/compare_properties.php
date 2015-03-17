<?php include('header.php'); ?>
        <div class="container uploadcv_app_div">
            <div class="uploadcv_app_top_div" id="compare_top_divstyle">
                <?php echo $this->lang->line('compare_title'); ?>
                <div class="">
                    <ol class="breadcrumb compare_breadcrumb">
                        <li><a href="<?=base_url();?>ar"><?php echo $this->lang->line('compare_breadcrumb1'); ?></a></li>
                        <li><a href="<?=base_url();?>ar/viewAllProperties"><?php echo $this->lang->line('compare_breadcrumb2'); ?></a></li>
                        <li class="active"><?php echo $this->lang->line('compare_breadcrumb3'); ?></li>
                    </ol>
                </div>
            </div>
            <div id="compare_bottom_div">
                <div class="row">
                    <?php $count = 1; ?>
                    <?php foreach ($properties as $property): ?>
                        <?php if ($propertyCount == 3): ?>
                            <div class="col-lg-4 col-md-4 compare_cols">
                        <?php else: ?>
                            <div class="col-lg-6 col-md-6 compare_cols">
                        <?php endif ?>
                        
                            <div class="properties_number compare_number">
                                <?php echo $count; ?>
                            </div>
                            <div class="propertyImages hide" id="img<?=$property->PropertyId; ?>">
                                <?= $images[$property->PropertyId]; ?>
                            </div>
                            <div class="compare_img">
                                <?php if ($images[$property->PropertyId]['src'] != 'No_image.svg'): ?>
                                    <img class="compare_images" id="image_<?= $property->PropertyId;  ?>" src="<?= base_url();?>/application/static/upload/property_images/<?= $images[$property->PropertyId]['src'][0]; ?>"/>
                                <?php else: ?>
                                    <img class="compare_images" id="image_<?= $property->PropertyId;  ?>" src="<?= base_url();?>application/static/images/<?= $images[$property->PropertyId]['src']; ?>"/>
                                <?php endif ?>
                            </div>
                            <div class="compare_description">
                                <div class="compare_description_title" style="margin-bottom: 3%;">
                                    <?php 
                                        $propertyName = $property->PrpertyTypeStr.' for '.$property->SalesTypeStr.' '.$property->LocationProject.', '.$property->LocationDistrict.', '.$property->LocationCity;
                                        //$propertyName .= $propertyName;
                                        if(strlen($propertyName) > 52){
                                            $propertyName = substr($propertyName,0,48).'..';
                                        }
                                        echo $propertyName;
                                     ?>
                                    <!-- <?php echo $this->lang->line('compare_title1'); ?> -->
                                </div>
                                <div class="compare_description_content">
                                    <div class="row" style="margin-left: 0;">
                                        <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle1'); ?> </b> <?php echo $property->UnitId;?>
                                    </div>
                                    <div class="row" style="margin-left: 0;">
                                        <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle2'); ?> </b> <?php echo $property->PrpertyTypeStr;?>
                                    </div>
                                    <div class="row" style="margin-left: 0;">
                                        <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle3'); ?> </b> <?php echo explode('.',$property->TotalArea)[0];?> <?php echo $property->AreaunitStr;?>s
                                    </div>
                                    <div class="row" style="margin-left: 0;">
                                        <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle4'); ?> </b> <?php echo $property->SalesTypeStr;?>
                                    </div>
                                    <div class="row" style="margin-left: 0;">
                                        <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle5'); ?> </b> <?php echo $property->InteriorFinishing;?>
                                    </div>
                                    <!-- <div class="row" style="margin-left: 0;">
                                        <?php if ($property->SalesTypeStr == 'Sale'): ?>
                                            <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle6'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $property->SaleCurrency.' '.number_format(explode('.',$property->SalePrice)[0]); ?></span>
                                        <?php else: ?>
                                            <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle7'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $property->RentCurrency.' '.number_format(explode('.',$property->RentPrice)[0]); ?></span>
                                        <?php endif ?>
                                    </div> -->
                                    <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna -->
                                </div>
                                <div class="compare_description_title">
                                    <?php echo $this->lang->line('compare_title2'); ?>
                                </div>
                                <div class="compare_description_content" style="direction:ltr;">
                                    <?php if ($property->LocationProject != ''): ?>
                                        <?php echo $property->LocationProject; ?>, <?php echo $property->LocationDistrict; ?>, <?php echo $property->LocationCity; ?>
                                    <?php else: ?>
                                        <?php echo $property->LocationDistrict; ?>, <?php echo $property->LocationCity; ?>
                                    <?php endif ?>
                                    <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna -->
                                </div>
                                <div class="compare_description_title">
                                    <?php echo $this->lang->line('compare_title3'); ?>
                                </div>
                                <div class="compare_description_content">
                                    Bedrooms: <?php echo $property->BedRoomsNumber;?> 
                                    <?php if ($property->BathRoomsNumber != 0): ?>
                                        , Bathrooms: <?php echo $property->BathRoomsNumber;?>
                                    <?php endif ?>
                                    <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna -->
                                </div>
                                <div class="compare_description_title">
                                    <?php echo $this->lang->line('compare_title4'); ?>
                                </div>
                                <div class="row compare_price">
                                    <div class="compare_price_text">
                                        <?php if ($property->SalesTypeStr == 'Sale'): ?>
                                            <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle6'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $property->SaleCurrency.' '.number_format(explode('.',$property->SalePrice)[0]); ?></span>
                                        <?php else: ?>
                                            <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle7'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $property->RentCurrency.' '.number_format(explode('.',$property->RentPrice)[0]); ?></span>
                                        <?php endif ?>
                                        <!-- EGP 2,000,000 -->
                                    </div>
                                </div>
                                <div class="row compare_contact_btn properties_contact">
                                    <a href="#contactModal" class="contact_button" id="<?php echo $property->PropertyId; ?>" style="text-decoration: none;color: white;" data-toggle="modal"> 
                                        <?php echo $this->lang->line('viewallproperties_contact'); ?>
                                    </a>
                                    <!-- <a href="#" class="properties_contact_btn"><?php echo $this->lang->line('compare_contact'); ?></a> -->
                                </div>
                            </div>
                        </div>
                        <?php $count++; ?>
                    <?php endforeach ?>
                    </div>

                    <div id="compare_map">
                        <div id="compare_map_title">
                            <?php echo $this->lang->line('compare_map'); ?>
                        </div>
                        <div id="compare_map_img">
                            <img src="<?= base_url();?>/application/static/images/compare_map.png"/>
                        </div>
                        <div class="map_overlay" style="">
                            قريبا
                        </div>
                    </div>

                    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Contact</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row hide" id="success_message" style="width: 100%;text-align:center;margin-left:0%;margin-top:2%;">
                                        <div class="alert alert-success" role="alert">
                                           تم إدخال بياناتك بنجاح. سوف يتم الاتصال بك قريباً.
                                        </div>
                                    </div>
                                    <div class="row hide" id="failure_message" style="width: 100%;text-align:center;margin-left:0%;margin-top:2%;">
                                        <div class="alert alert-danger" role="alert">
                                           لم تدخل بياناتك بنجاح. رجاءً المحاولة في وقتٍ لاحقاً.
                                        </div>
                                    </div>
                                    <form class="form-inline" id="property_form" role="form">
                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label for="property_first_name"><?php echo $this->lang->line('propertydetails_firstname'); ?></label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="property_first_name" name="property_first_name" placeholder="<?php echo $this->lang->line('viewallproperties_placeholder1'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label for="property_last_name"><?php echo $this->lang->line('propertydetails_lastname'); ?></label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="property_last_name" name="property_last_name" placeholder="<?php echo $this->lang->line('viewallproperties_placeholder2'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label for="property_email"><?php echo $this->lang->line('propertydetails_email'); ?></label>
                                            </div>
                                            <div class="col-lg-8" style="padding-right: 2%;">
                                                <input type="email" class="form-control" id="property_email" name="property_email" placeholder="<?php echo $this->lang->line('viewallproperties_placeholder3'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label for="property_phone"><?php echo $this->lang->line('propertydetails_phone'); ?></label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="property_phone" name="property_phone" placeholder="<?php echo $this->lang->line('viewallproperties_placeholder4'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p> <?php echo $this->lang->line('propertydetails_interest'); ?> 
                                                <label class="checkbox-inline">
                                                   <input type="checkbox" id="inlineChkbx1" name="interest[]" value="buying"> <?php echo $this->lang->line('propertydetails_chkbx1'); ?>
                                                </label>
                                                <label class="checkbox-inline">
                                                   <input type="checkbox" id="inlineChkbx3" name="interest[]" value="renting"> <?php echo $this->lang->line('propertydetails_chkbx3'); ?>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="form-group" style="width: 97%;">
                                            <p><?php echo $this->lang->line('propertydetails_text'); ?></p>
                                            <textarea class="form-control" id="property_form_textarea" name="property_comments" rows="3"></textarea>
                                        </div>
                                        <input type="hidden" id="propertyID" name="propertyID" value="">
                                        <div class="form-group">
                                            <input type="button" class="btn btn-default property_btn" name="contact_submit" id="contact_form_btn" value="<?php echo $this->lang->line('propertydetails_button'); ?>">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>


        <script type="text/javascript">

           // $(".propertyImages").each(function(){

           //      var image_src = $(this).find(".imagesList > li:nth-child(1) > img").attr('src');
           //      if(!image_src){
           //          var id = $(this).attr('id');
           //          var id = id.replace('img','');
           //          $('#'+id).attr('disabled','disabled');
           //          image_src = $("#url").val()+'/application/static/images/no_image.svg';
           //      }
                
           //      var id = $(this).attr('id');
           //      var id = id.replace('img','');

           //      $("#image_"+id).attr('src',image_src);
               
           // });
        </script>


