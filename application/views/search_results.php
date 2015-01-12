<div class="">
    <form role="form" id="compare_form" method="get" action="<?= base_url();?>compareProperties">
        <div class="properties_top_div">
            <div id="properties_top_header_div">
                <?php if ($totalResults !== 0): ?>
                    <?php if (isset($totalResults)) { echo $totalResults; }?>
                <?php endif ?>
                <?php if (isset($featured)): ?>
                    Featured Properties
                <?php else: ?>
                    <?php if (isset($commercial)): ?>
                        <?php if (isset($commercialSale)): ?>
                            Commercial buildings for Sale
                        <?php else: ?>
                            Commercial buildings for Rent
                        <?php endif ?>
                    <?php else: ?>
                        Homes for Sale and Rent
                    <?php endif ?>
                <?php endif ?>
                
            </div>
        </div>
        <div id="properties_bottom_div">
            <?php if (isset($noResults)) :?>
                <div class="row" style="width: 100%;text-align:center;margin-left:0%;margin-top:2%;">
                    <div class="alert alert-danger" role="alert">
                       <?= $noResults; ?>
                    </div>
                </div>
            <?php else: ?>

            <div class="container" style="width:100%;">
                <div class="row" style="width:100%;">
                    <div class="col-lg-9 col-sm-11 col-md-9 col-xs-12 properties_header_cols" id="properties_bottom_left_div">
                        <table id="properties" style="border:none;" class="table table-striped table-bordered" border="0" cellspacing="0" width="100%">
                            <thead id="thead">
                                <tr>
                                    <th></th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                     
                            <tfoot id="tfoot">
                                <tr>
                                    <th></th>
                                    <th>Count</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php if (isset($loggedIn)): ?>
                                    <?php $count = 1;?>
                                    <?php if (is_array($searchResults)): ?>
                                            <?php foreach ($searchResults as $result) { ?>
                                                <tr>
                                                    <td>
                                                    <div class="properties_common_bottom_div">
                                                        <div class="checkbox properties_ckbx">
                                                            <label>
                                                                <input name="property_chkbx[]" id="chk_<?= $result->PropertyId; ?>" type="checkbox" value="chk_<?= $result->PropertyId; ?>"> 
                                                            </label>
                                                        </div>
                                                        <div class="propertyImages hide" id="img<?=$result->PropertyId; ?>">
                                                            <ul class="imagesList">
                                                                <?php foreach ($images[$result->PropertyId]['src'] as $key => $image): ?>
                                                                    <li>
                                                                        <img src="<?= base_url();?>application/static/upload/property_images/<?= $image; ?>">
                                                                    </li>
                                                                <?php endforeach ?>
                                                            </ul>
                                                           <!--  <?php //$images[$result->PropertyId]['src']; 
                                                           ?>  -->
                                                        </div>
                                                        <!-- <input type="hidden" name="property_address" class="property_address" value="<?php if ($result->LocationProject != ''): ?>
                                                                    <?php echo $result->LocationProject; ?>,
                                                                    <?php endif ?>
                                                                    <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>"> -->
                                                        <div class="properties_img">
                                                            <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src'][0]; ?>"/></a>
                                                        </div>
                                                        <div class="properties_number">
                                                            <?php echo $count; ?>
                                                        </div>
                                                        <div class="properties_info">
                                                            <div class="properties_title row" style="margin-left: 0; margin-right: 0;">
                                                                <div class="col-lg-11" style="float: left; padding:0;">
                                                                   <a href="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>"> <b> 
                                                                        <?php if ($result->LocationProject != ''): ?>
                                                                            <?php echo $result->PrpertyTypeStr;?> for <?php echo $result->SalesTypeStr;?> <?php echo $result->LocationProject; ?>, <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>
                                                                        <?php else: ?>
                                                                            <?php echo $result->PrpertyTypeStr;?> for <?php echo $result->SalesTypeStr;?> <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>
                                                                        <?php endif ?>
                                                                  <!--  <?php if ($result->LocationProject != ''): ?>
                                                                    <?php echo $result->LocationProject; ?>,
                                                                    <?php endif ?>
                                                                    <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?></b> -->
                                                                    </a>
                                                                </div>
                                                                <div class="col-lg-1" style="">
                                                                    <?php if ($result->is_favorite == 1): ?>
                                                                        <img class="properties_star_icon_orange" onclick="favorites(<?= $result->PropertyId;?>, 'orange');" id="icon_<?= $result->PropertyId;?>" src="<?= base_url();?>/application/static/images/icon_orange_star.png"/>
                                                                    <?php else: ?>
                                                                        <img class="properties_star_icon_gray" onclick="favorites(<?= $result->PropertyId;?>, 'gray');" id="icon_<?= $result->PropertyId;?>" src="<?= base_url();?>/application/static/images/icon_gray_star.png"/>
                                                                    <?php endif ?>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="properties_content row" style="margin-left: 0; margin-right: 0;">
                                                                <?php if ($result->SalesTypeStr == 'Sale'): ?>
                                                                    <?php if (!isset($commercial)): ?>
                                                                        <b><?php echo $result->BedRoomsNumber; ?></b> Bedrooms<br>
                                                                    <?php endif ?>
                                                                    <?php echo $result->SaleCurrency.' '.number_format(explode('.',$result->SalePrice)[0]); ?>
                                                                <?php else: ?>     
                                                                    <?php if (!isset($commercial)): ?>                                               
                                                                        <b><?php echo $result->BedRoomsNumber; ?></b> Bedrooms<br>
                                                                    <?php endif ?>
                                                                    <?php echo $result->RentCurrency.' '.number_format(explode('.',$result->RentPrice)[0]); ?>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                        <div class="properties_details_div">
                                                            <div class="btn-group properties_details_btns_div">
                                                                <button type="button" class="btn btn-default properties_btns">
                                                                    <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>">
                                                                        <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                                        <?php echo $this->lang->line('viewallproperties_details'); ?>
                                                                    </a>
                                                                </button>
                                                                <button type="button" class="btn btn-default properties_btns imgModal" id="<?= $result->PropertyId; ?>" data-toggle="modal" data-target="#imagesModal"> 
                                                                    <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_gallery.jpg"/>
                                                                    <span id="imgCount"></span> <?php echo $this->lang->line('viewallproperties_images'); ?>
                                                                </button>
                                                                <button type="button" class="btn btn-default properties_btns properties_share_btn" value="<?= $result->PropertyId;?>">
                                                                    <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_plus.png" style="width: 24px;"/>
                                                                    <?php echo $this->lang->line('viewallproperties_share'); ?>
                                                                </button>
                                                            </div>
                                                            <div class="properties_share_div" id="properties_share_div<?= $result->PropertyId;?>">
                                                                <div class="row" style="margin: auto;width:46%;">
                                                                    <div class="fb-share-button" data-layout="button" data-width="" data-href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"></div>
                                                                </div>
                                                                <div class="row" style="margin: auto;margin-top: 8%;width:46%;">
                                                                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>" data-via="SaraNahal" data-count="none">Tweet</a>
                                                                    <script>
                                                                    !function(d,s,id)
                                                                    {
                                                                        var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
                                                                        if(!d.getElementById(id)){
                                                                            js=d.createElement(s);
                                                                            js.id=id;
                                                                            js.src=p+'://platform.twitter.com/widgets.js';
                                                                            fjs.parentNode.insertBefore(js,fjs);
                                                                        }
                                                                    }(document, 'script', 'twitter-wjs');
                                                                    </script>
                                                                    <!-- <a href="#"><img class="properties_details_share2" src="<?= base_url();?>/application/static/images/tw-share.png" style=""/></a> -->
                                                                </div>
                                                            </div>
                                                            <div class="properties_contact">
                                                                <a href="#contactModal" class="contact_button" id="<?php echo $result->PropertyId; ?>" style="text-decoration: none;color: white;" data-toggle="modal"> 
                                                                    <?php echo $this->lang->line('viewallproperties_contact'); ?>
                                                                </a>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </td>
                                                    <td class="hide">
                                                        <?=$count; ?>
                                                    </td>
                                                    </tr>
                                            <?php $count++; 
                                            } ?>
                                    <?php endif ?>
                                <?php else: ?>
                                    <?php $count = 1;?>
                                    <?php if (is_array($searchResults)): ?>
                                            <?php foreach ($searchResults as $result) { ?>
                                                <tr>
                                                    <td>
                                                    <div class="properties_common_bottom_div">
                                                        <div class="checkbox properties_ckbx">
                                                            <label>
                                                                <input name="property_chkbx[]" id="chk_<?= $result->PropertyId; ?>" type="checkbox" value="chk_<?= $result->PropertyId; ?>"> 
                                                            </label>
                                                        </div>
                                                        <div class="propertyImages hide" id="img<?=$result->PropertyId; ?>">
                                                            <ul class="imagesList">
                                                                <?php foreach ($images[$result->PropertyId]['src'] as $key => $image): ?>
                                                                    <li>
                                                                        <img src="<?= base_url();?>application/static/upload/property_images/<?= $image; ?>">
                                                                    </li>
                                                                <?php endforeach ?>
                                                            </ul>
                                                            <!--  <?php  //$images[$result->PropertyId]['src']; ?>  -->
                                                        </div>
                                                        <!-- <input type="hidden" name="property_address" class="property_address" value="<?php if ($result->LocationProject != ''): ?>
                                                                    <?php echo $result->LocationProject; ?>,
                                                                    <?php endif ?>
                                                                    <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>"> -->
                                                        <div class="properties_img">
                                                            <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src'][0]; ?>"/></a>
                                                        </div>
                                                        <div class="properties_number">
                                                            <?php echo $count; ?>
                                                        </div>
                                                        <div class="properties_info">
                                                            <div class="properties_title row" style="margin-left: 0; margin-right: 0;">
                                                                <div class="col-lg-11" style="float: left; padding:0;">
                                                                    <a href="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>"><b> 
                                                                        <?php if ($result->LocationProject != ''): ?>
                                                                            <?php echo $result->PrpertyTypeStr;?> for <?php echo $result->SalesTypeStr;?> <?php echo $result->LocationProject; ?>, <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>
                                                                        <?php else: ?>
                                                                            <?php echo $result->PrpertyTypeStr;?> for <?php echo $result->SalesTypeStr;?> <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>
                                                                        <?php endif ?>
                                                                   <!--  <?php if ($result->LocationProject != ''): ?>
                                                                    <?php echo $result->LocationProject; ?>,
                                                                    <?php endif ?>
                                                                    <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?> -->
                                                                    </b></a>
                                                                </div>
                                                                <!-- <div class="col-lg-1" style=""><img class="properties_star_icon" src="<?= base_url();?>/application/static/images/icon_orange_star.png"/></div> -->
                                                            </div>
                                                            <div class="properties_content row" style="margin-left: 0; margin-right: 0;">
                                                                <?php if ($result->SalesTypeStr == 'Sale'): ?>
                                                                    <?php if (!isset($commercial)): ?>
                                                                        <b><?php echo $result->BedRoomsNumber; ?></b> Bedrooms<br>
                                                                    <?php endif ?>
                                                                    <?php echo $result->SaleCurrency.' '.number_format(explode('.',$result->SalePrice)[0]); ?>
                                                                <?php else: ?>     
                                                                    <?php if (!isset($commercial)): ?>                                               
                                                                        <b><?php echo $result->BedRoomsNumber; ?></b> Bedrooms<br>
                                                                    <?php endif ?>
                                                                    <?php echo $result->RentCurrency.' '.number_format(explode('.',$result->RentPrice)[0]); ?>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                        <div class="properties_details_div">
                                                            <div class="btn-group properties_details_btns_div">
                                                                <button type="button" class="btn btn-default properties_btns">
                                                                    <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>">
                                                                        <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                                        <?php echo $this->lang->line('viewallproperties_details'); ?>
                                                                    </a>
                                                                </button>
                                                                <button type="button" class="btn btn-default properties_btns imgModal" id="<?= $result->PropertyId; ?>" data-toggle="modal" data-target="#imagesModal"> 
                                                                    <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_gallery.jpg"/>
                                                                    <span id="imgCount"></span> <?php echo $this->lang->line('viewallproperties_images'); ?>
                                                                </button>
                                                                <button type="button" class="btn btn-default properties_btns properties_share_btn" value="<?= $result->PropertyId;?>">
                                                                    <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_plus.png" style="width: 24px;"/>
                                                                    <?php echo $this->lang->line('viewallproperties_share'); ?>
                                                                </button>
                                                            </div>
                                                            <div class="properties_share_div" id="properties_share_div<?= $result->PropertyId;?>">
                                                                <div class="row" style="margin: auto;width:46%;">
                                                                    <div class="fb-share-button" data-layout="button" data-width="" data-href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"></div>
                                                                </div>
                                                                <div class="row" style="margin: auto;margin-top: 8%;width:46%;">
                                                                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://localhost/ColdwellBanker/propertyDetails/<?= $result->PropertyId;?>" data-via="SaraNahal" data-count="none">Tweet</a>
                                                                    <script>
                                                                    !function(d,s,id)
                                                                    {
                                                                        var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
                                                                        if(!d.getElementById(id)){
                                                                            js=d.createElement(s);
                                                                            js.id=id;
                                                                            js.src=p+'://platform.twitter.com/widgets.js';
                                                                            fjs.parentNode.insertBefore(js,fjs);
                                                                        }
                                                                    }(document, 'script', 'twitter-wjs');
                                                                    </script>
                                                                    <!-- <a href="#"><img class="properties_details_share2" src="<?= base_url();?>/application/static/images/tw-share.png" style=""/></a> -->
                                                                </div>
                                                            </div>
                                                            <div class="properties_contact">
                                                                <a href="#contactModal" class="contact_button" id="<?php echo $result->PropertyId; ?>" style="text-decoration: none;color: white;" data-toggle="modal"> 
                                                                    <?php echo $this->lang->line('viewallproperties_contact'); ?>
                                                                </a>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </td>
                                                    <td class="hide">
                                                        <?=$count; ?>
                                                    </td>
                                                    </tr>
                                            <?php $count++; 
                                            } ?>
                                    <?php endif ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-3 properties_header_cols hidden-sm hidden-xs" id="properties_bottom_right_div" style="padding-top: 19%;text-align: center;color: red;font-size: 200%;">
                        <div style="position: relative;width: 112%;height: 500px;margin-top:-86%;margin-left: -6%;border-radius: 10px;text-align: center;padding-top: 65%;font-size: 210%;background: rgba(0, 0, 0, 0.3);color: white;">
                            Coming Soon
                        </div>
                    </div>
                </div>
            </div>  
            <div id="properties_compare_div">
                <input type="submit" class="btn btn-default properties_contact_btn" id="compareSubmit" name="compareSubmit" onclick="return checkValidation();" value="<?php echo $this->lang->line('viewallproperties_button'); ?>">
                <!-- <a href="<?=base_url(); ?>compareProperties" class="" style="text-decoration: none;color: white;">
                    <?php echo $this->lang->line('viewallproperties_button'); ?>
                </a> -->
            </div>
            <?php endif ?>
            
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
                <div class="row hide" id="success_message" style="width: 100%;text-align:center;margin-left:0%;margin-top:2%;">
                    <div class="alert alert-success" role="alert">
                       Your Contact Info was inserted successsfully.
                    </div>
                </div>
                <div class="row hide" id="failure_message" style="width: 100%;text-align:center;margin-left:0%;margin-top:2%;">
                    <div class="alert alert-danger" role="alert">
                       Your Contact Info was not inserted successsfully. Please try again later.
                    </div>
                </div>
                <form class="form-inline" id="property_form" role="form" method="post">
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
                        <div class="col-lg-8">
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
                     <p><?php echo $this->lang->line('propertydetails_footnote'); ?></p>
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
                <img id="property_mainimage" src="">
                <div class="well property_well" style="margin-top:3%;">
                    <div class="carousel slide" id="property_carousel" style="">
                        <div class="carousel-inner" id="carousal_div">
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


<!-- <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> -->
<script>
$(document).ready(function (){

    $('#properties').dataTable({
        "order": [[ 1, "asc" ]]
    });


    var addresses = [];
    var count = 0;

    // $(".property_address").each(function(){
    //     address = $(this).val();
    //     address = $.trim(address);
    //     address = address.replace(/ /g,'');
    //     addresses[count] = address;
    //     count++;
    // }); 

    // alert(addresses[0]);
     var addresses = ['Norway', 'Africa', 'Asia','North America','South America'];

    // var map;
    // var elevator;
    // var myOptions = {
    //     zoom: 1,
    //     center: new google.maps.LatLng(0, 0),
    //     mapTypeId: 'terrain'
    // };
    // map = new google.maps.Map($('#properties_bottom_right_div')[0], myOptions);

    // for (var x = 0; x < addresses.length; x++) {
    //     $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
    //         var p = data.results[0].geometry.location
    //         var latlng = new google.maps.LatLng(p.lat, p.lng);
    //         new google.maps.Marker({
    //             position: latlng,
    //             map: map
    //         });

    //     });
    // }


    $('.imgModal').click(function(event) {
        var propertyId = $(this).attr('id');
        var html_output ='';
        var image_count = 0;
        var flag = 1;
        var main_image_src = $("#image_"+propertyId).attr('src');
            $("#property_mainimage").attr('src', main_image_src);

       $("#img"+propertyId+" .imagesList li").each(function(){
            image_count++;

            if(image_count == 1){
                html_output += '<div class="item active"><div class="row">';
            }

            if(flag == 0){
                html_output += '<div class="item"><div class="row">';
                flag = 1;
            }

            html_output+= '<div class="property_thumbnail" style="margin-left:7%;"><img src="'+$(this).find('img').attr('src')+'" alt="Image" class="img-responsive"></div>';

            if(image_count % 3 == 0 && flag == 1){
                html_output += '</div></div>';
                flag = 0;
            }
        });

       if(image_count == 0){
          $("#property_details_thumbnails").hide();
       }

       $("#carousal_div").html(html_output);
       $.getScript($('#url').val()+"application/static/js/carousel.js");
    });
   
    
            // $('.property_thumbnail > img').click(function (){
            //     // alert('hello1');
            //    // $('#property_mainimage').attr("src", $(this).attr("src"));
            //    alert($('#property_mainimage').attr("src"));
            // }) ;



   $('.contact_button').click(function(event) {
        $('#propertyID').val($(this).attr('id'));
       // alert($('#propertyID').val());return;
   });

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

   $("[name='properties_length']").change(function() {
       $.getScript($('#url').val()+"application/static/js/getImages.js");
   });


   $(".paginate_button").click(function() {
    // alert('hi1');
       $.getScript($('#url').val()+"application/static/js/getImages.js");
   });

   // $(".imgModal").click(function(){
        
   // });

   $("#thead").css('display', 'none');
   $("#tfoot").css('display', 'none');


   
});
</script>
