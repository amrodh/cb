<?php include('header.php'); ?>
        <div class="container shareproperty_main_div">
            <div class="shareproperty_top_div">
                <?php echo $this->lang->line('profile_title'); ?>
                <div style="font-size: 12px;font-weight: normal;">
                    
                </div>
            </div>
            <div id="properties_bottom_div">
                <form role="form" name="editForm"  method="post" action="">
                    <div class="container profile_bottom_inner_div" style="">
                        <div class="row">
                            <div class="col-lg-2 profile_titles">
                                <?php echo $this->lang->line('profile_name'); ?>
                            </div>
                            <div class="col-lg-10 profile_content">
                                <div class="profileData"><?=$user->username;?></div>
                                <input type="text" id="profileUsername" name="username" class="hide" value="<?= $user->username;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 profile_titles">
                                <?php echo $this->lang->line('profile_email'); ?>
                            </div>
                            <div class="col-lg-10 profile_content">
                                <div class="profileData"><?=$user->email?></div>
                                <input type="email" id="profileEmail" name="email" class="hide" value="<?=$user->email?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 profile_titles">
                                <?php echo $this->lang->line('profile_location'); ?>
                            </div>
                            <div class="col-lg-10 profile_content">
                                <div class="profileData"><?=$user->location?></div>
                                <input type="text" id="profileLocation" name="location" class="hide" value="<?=$user->location?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 profile_titles">
                                <?php echo $this->lang->line('profile_phone'); ?>
                            </div>
                            <div class="col-lg-10 profile_content">
                                <div class="profileData"><?=$user->phone?></div>
                                <input type="text" id="profilePhone" name="phone" class="hide" value="<?=$user->phone?>">
                            </div>
                        </div>
                        <?php if (isset($updateError)) :?>
                        <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->lang->line('update_username'); ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($usernameError)) :?>
                        <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->lang->line('update_missing_username'); ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($emailError)) :?>
                        <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->lang->line('update_missing_email'); ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($locationError)) :?>
                        <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->lang->line('update_missing_location'); ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($phoneError)) :?>
                        <div class="row" style="width: 33%;margin: auto;margin-left:36%;">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->lang->line('update_missing_phone'); ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($updateEmailError)) :?>
                        <div class="row" style="width: 33%;margin: auto;margin-left:36%;">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->lang->line('update_email'); ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($emailUpdateMessage)) :?>
                        <div class="row" style="width: 65%;margin: auto;margin-left:33%;">
                            <div class="alert alert-info" role="alert">
                                <?php echo $this->lang->line('update_confirm_email'); ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($update)) :?>
                            <?php if ($update == true){?>
                            <div class="row" style="width: 33%;margin: auto;margin-left:36%;">
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->lang->line('update_success'); ?>
                                </div>
                            </div>
                            <?php }else{ ?>
                            <div class="row" style="width: 33%;margin: auto;margin-left:36%;">
                                <div class="alert alert-warning" role="alert">
                                    <?php echo $this->lang->line('update_failure'); ?>
                                </div>
                            </div>
                        <?php }endif ?>
                        <div class="row" style="width: 13%; margin: auto; margin-top: 20px;">
                            <!-- <button type="submit" class="btn btn-default profile_btn_submit">Edit</button> -->
                            <?php if ($user->is_valid == 1): ?>
                                <input type="button"  class="btn btn-defaut profile_btn_submit" value="<?php echo $this->lang->line('profile_button'); ?>">
                            <?php endif ?>
                            
                        </div>
                    </div>
                </form>
                <div class="container profile_bottom_inner_div" style="">
                    <div class="profile_titles">
                        <?php echo $this->lang->line('profile_title2'); ?>
                    </div>
                    <div id="profile_favs">
                        <table id="properties" style="border:none; background-color:white;" class="table table-striped table-bordered" border="0" cellspacing="0" width="100%">
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
                                <?php $count = 1;?>
                                    <?php if (is_array($favoritesArray)): ?>
                                        <?php foreach ($favoritesArray as $result) { ?>
                                            <tr>
                                                <td>
                                                <div class="properties_common_bottom_div">
                                                    <div class="checkbox properties_ckbx">
                                                        <label>
                                                            <input name="property_chkbx[]" type="checkbox"> 
                                                        </label>
                                                    </div>
                                                    <div class="propertyImages hide" id="img<?=$result->PropertyId; ?>">
                                                        <ul class="imagesList">
                                                                <?php foreach ($favoritesImages[$result->PropertyId]['src'] as $key => $image): ?>
                                                                    <li>
                                                                        <img src="<?= base_url();?>/application/static/upload/property_images/<?= $image; ?>">
                                                                    </li>
                                                                <?php endforeach ?>
                                                            </ul>
                                                       <!--  <?= $favoritesImages[$result->PropertyId]; ?> -->
                                                    </div>
                                                    <input type="hidden" name="property_address" class="property_address" value="<?php if ($result->LocationProject != ''): ?>
                                                                <?php echo $result->LocationProject; ?>,
                                                                <?php endif ?>
                                                                <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>">
                                                    <div class="properties_img">
                                                        <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>/application/static/images/sample_property.png"/></a>
                                                    </div>
                                                    <div class="properties_number" style="margin-left:27px;">
                                                        <?php echo $count; ?>
                                                    </div>
                                                    <div class="properties_info">
                                                        <div class="properties_title row" style="margin-left: 0; margin-right: 0;">
                                                            <div class="col-lg-11" style="float: left; padding:0;">
                                                                <b> <?php if ($result->LocationProject != ''): ?>
                                                                <?php echo $result->LocationProject; ?>,
                                                                <?php endif ?>
                                                                <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?></b>
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
                                                                <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_details.png"/>
                                                                <span id="imgCount"></span> <?php echo $this->lang->line('viewallproperties_images'); ?>
                                                            </button>
                                                            <button type="button" class="btn btn-default properties_btns properties_share_btn" value="<?= $result->PropertyId;?>">
                                                                <img class="properties_details_icons" src="<?= base_url();?>/application/static/images/icon_plus.png" style="width: 24px;"/>
                                                                <?php echo $this->lang->line('viewallproperties_share'); ?>
                                                            </button>
                                                        </div>
                                                        <div class="properties_share_div" id="properties_share_div<?= $result->PropertyId;?>">
                                                            <div class="row" style="margin: auto;width:46%;">
                                                                <!-- <div class="fb-share-button" data-layout="button" data-width="" data-href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"></div> -->
                                                            </div>
                                                            <div class="row" style="margin: auto;margin-top: 8%;width:46%;">
                                                                <!-- <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://localhost/ColdwellBanker/propertyDetails/<?= $result->PropertyId;?>" data-via="SaraNahal" data-count="none">Tweet</a> -->
                                                                <script>
                                                                // !function(d,s,id)
                                                                // {
                                                                //     var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
                                                                //     if(!d.getElementById(id)){
                                                                //         js=d.createElement(s);
                                                                //         js.id=id;
                                                                //         js.src=p+'://platform.twitter.com/widgets.js';
                                                                //         fjs.parentNode.insertBefore(js,fjs);
                                                                //     }
                                                                // }(document, 'script', 'twitter-wjs');
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
                            </tbody>
                        </table>    
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

        </div>
        <?php include('footer.php'); ?>

        <script>
            $(document).ready(function (){
                $('#properties').dataTable({
                    "order": [[ 1, "asc" ]]
                });

                $('.imgModal').click(function(event) {
                    var propertyId = $(this).attr('id');
                    var html_output ='';
                    var image_count = 0;
                    var flag = 1;

                    var main_image_src = $("#image_"+propertyId).attr('src');
                        $("#property_mainimage").attr('src', main_image_src);

                        $('.property_thumbnail > img').click(function (){
                           $('#property_mainimage').attr("src", $(this).attr("src"));
                        }) ;

                   $("#img"+propertyId+" .imagesList li").each(function(){
                        image_count++;

                        if(image_count == 1){
                            html_output += '<div class="item active"><div class="row">';
                        }

                        if(flag == 0){
                            html_output += '<div class="item"><div class="row">';
                            flag = 1;
                        }

                        html_output+= '<div class="property_thumbnail" style="margin-left:7%;"><img src="'+$(this).find('img').attr('src')+'" alt="Image" class="img-responsive"></a></div>';

                        if(image_count % 3 == 0 && flag == 1){
                            html_output += '</div></div>';
                            flag = 0;
                        }
                    });

                   if(image_count == 0){
                      $("#property_details_thumbnails").hide();
                   }

                   $("#carousal_div").html(html_output);
                });
               

               $(".propertyImages").each(function(){

                    var image_src = $(this).find(".imagesList > li:nth-child(1) > img").attr('src');
                    if(!image_src){
                        var id = $(this).attr('id');
                        var id = id.replace('img','');
                        $('#'+id).attr('disabled','disabled');
                        image_src = $("#url").val()+'/application/static/images/no_image.svg';
                    }
                    
                    var id = $(this).attr('id');
                    var id = id.replace('img','');

                    $("#image_"+id).attr('src',image_src);
                   
               });

               $("[name='properties_length']").change(function() {
                // alert('hi');
                   $.getScript($('#url').val()+"application/static/js/getImages.js");
               });

               $(".paginate_button").click(function() {
                // alert('hi');
                   $.getScript($('#url').val()+"application/static/js/getImages.js");
               });

               $(".imgModal").click(function(){
                    $.getScript($('#url').val()+"application/static/js/carousel.js");
               });

                $("#thead").css('display', 'none');
                $("#tfoot").css('display', 'none');  
            });
        </script>
