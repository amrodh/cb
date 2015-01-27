<div class="">
	<form role="form" id="compare_form" method="post" action="<?= base_url();?>ar/compareProperties">
            <div class="properties_top_div">
                <div id="properties_top_header_div">
                    <?php if ($totalResults !== 0): ?>
                        <?php if (isset($totalResults)) { echo $totalResults; }?>
                    <?php endif ?>
                    <?php if (isset($featured)): ?>
                        العقارات المميزة
                    <?php else: ?>
                        <?php if (isset($commercial)): ?>
                            <?php if (isset($commercialSale)): ?>
                                ممتلكات تجارية للبيع
                            <?php else: ?>
                                ممتلكات تجارية للايجار
                            <?php endif ?>
                            <?php else: ?>
                                منازل للبيع والإيجار
                        <?php endif ?>
                    <?php endif ?>
                </div>
            </div>
            <div id="properties_bottom_div">
                <?php if (isset($noResults)): ?>
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
                                                <?php if ($resultCount < 10): ?>
                                                    <?php $end = $resultCount; ?>
                                                <?php else: ?>
                                                    <?php $end = 10; ?>
                                                <?php endif ?>
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
                                                                            <img src="<?= base_url();?>/application/static/upload/property_images/<?= $image; ?>">
                                                                        </li>
                                                                    <?php endforeach ?>
                                                                </ul>
                                                                <!--  <?= $images[$result->PropertyId]['src']; ?>  -->
                                                            </div>
                                                            <!-- <input type="hidden" name="property_address" class="property_address" value="<?php if ($result->LocationProject != ''): ?>
                                                                    <?php echo $result->LocationProject; ?>,
                                                                    <?php endif ?>
                                                                    <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>"> -->
                                                            <div class="properties_img">
                                                                <?php if (is_array($images[$result->PropertyId]['src'])): ?>
                                                                    <?php if ($images[$result->PropertyId]['src'][0] != 'No_image.svg'): ?>
                                                                        <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src'][0]; ?>"/></a>
                                                                    <?php else: ?>
                                                                        <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/images/<?= $images[$result->PropertyId]['src'][0]; ?>"/></a>
                                                                    <?php endif ?>
                                                                    <!-- <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src'][0]; ?>"/></a> -->
                                                                <?php else: ?>
                                                                    <?php if ($images[$result->PropertyId]['src'] != 'No_image.svg'): ?>
                                                                        <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src']; ?>"/></a>
                                                                    <?php else: ?>
                                                                        <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/images/<?= $images[$result->PropertyId]['src']; ?>"/></a>
                                                                    <?php endif ?>
                                                                    <!-- <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src']; ?>"/></a> -->
                                                                <?php endif ?>
                                                            </div>
                                                            <?php if (strlen($count)>2): ?>
                                                                <div class="properties_number" style="width:37px;">
                                                                    <?php echo $count; ?>
                                                                </div>
                                                            <?php else: ?>
                                                                <?php if (strlen($count)>3): ?>
                                                                    <div class="properties_number" style="width:45px;">
                                                                        <?php echo $count; ?>
                                                                    </div>
                                                                <?php else: ?>
                                                                    <div class="properties_number" style="">
                                                                        <?php echo $count; ?>
                                                                    </div>
                                                                <?php endif ?>
                                                            <?php endif ?>
                                                            <div class="properties_info">
                                                                <div class="properties_title row" style="margin-left: 0; margin-right: 0;">
                                                                    <div class="col-lg-11" style="float: right; padding:0;">
                                                                        <a href="<?= base_url();?>ar/propertyDetails/<?= $result->PropertyId;?>"><b> 
                                                                       <!--  <?php if ($result->LocationProject != ''): ?>
                                                                        <?php echo $result->LocationProject; ?>,
                                                                        <?php endif ?>
                                                                        <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?> -->
                                                                        <?php if ($result->LocationProject != ''): ?>
                                                                            <?php echo $result->PrpertyTypeStr;?> for <?php echo $result->SalesTypeStr;?> <?php echo $result->LocationProject; ?>, <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>
                                                                        <?php else: ?>
                                                                            <?php echo $result->PrpertyTypeStr;?> for <?php echo $result->SalesTypeStr;?> <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>
                                                                        <?php endif ?>
                                                                        </b></a>
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
                                                                        <a href="<?= base_url();?>ar/propertyDetails/<?= $result->PropertyId;?>">
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
                                                                        <div class="fb-share-button" data-layout="button" data-width="" data-href="<?= base_url();?>ar/propertyDetails/<?= $result->PropertyId;?>"></div>
                                                                    </div>
                                                                    <div class="row" style="margin: auto;margin-top: 8%;width:46%;">
                                                                        <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=base_url(); ?>propertyDetails/<?= $result->PropertyId;?>" data-via="SaraNahal" data-count="none">Tweet</a>
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
                                                                    <a href="#contactModal" class="" style="text-decoration: none;color: white;s" data-toggle="modal"> 
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
                                                    <?php //endif ?>
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
                                                                                    <img src="<?= base_url();?>/application/static/upload/property_images/<?= $image; ?>">
                                                                                </li>
                                                                            <?php endforeach ?>
                                                                        </ul>
                                                                        <!--  <?= $images[$result->PropertyId]['src']; ?>  -->
                                                                    </div>
                                                                    <!-- <input type="hidden" name="property_address" class="property_address" value="<?php if ($result->LocationProject != ''): ?>
                                                                                <?php echo $result->LocationProject; ?>,
                                                                                <?php endif ?>
                                                                                <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>"> -->
                                                                    <div class="properties_img">
                                                                        <?php if (is_array($images[$result->PropertyId]['src'])): ?>
                                                                            <?php if ($images[$result->PropertyId]['src'][0] != 'No_image.svg'): ?>
                                                                                <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src'][0]; ?>"/></a>
                                                                            <?php else: ?>
                                                                                <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/images/<?= $images[$result->PropertyId]['src'][0]; ?>"/></a>
                                                                            <?php endif ?>
                                                                            <!-- <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src'][0]; ?>"/></a> -->
                                                                        <?php else: ?>
                                                                            <?php if ($images[$result->PropertyId]['src'] != 'No_image.svg'): ?>
                                                                                <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src']; ?>"/></a>
                                                                            <?php else: ?>
                                                                                <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/images/<?= $images[$result->PropertyId]['src']; ?>"/></a>
                                                                            <?php endif ?>
                                                                            <!-- <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src']; ?>"/></a> -->
                                                                        <?php endif ?>
                                                                    </div>
                                                                    <?php if (strlen($count)>2): ?>
                                                                        <div class="properties_number" style="width:37px;">
                                                                            <?php echo $count; ?>
                                                                        </div>
                                                                    <?php else: ?>
                                                                        <?php if (strlen($count)>3): ?>
                                                                            <div class="properties_number" style="width:45px;">
                                                                                <?php echo $count; ?>
                                                                            </div>
                                                                        <?php else: ?>
                                                                            <div class="properties_number" style="">
                                                                                <?php echo $count; ?>
                                                                            </div>
                                                                        <?php endif ?>
                                                                    <?php endif ?>
                                                                    <div class="properties_info">
                                                                        <div class="properties_title row" style="margin-left: 0; margin-right: 0;">
                                                                            <div class="col-lg-11" style="float: right; padding:0;">
                                                                                <a href="<?= base_url();?>ar/propertyDetails/<?= $result->PropertyId;?>"><b> 
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
                                                                                <a href="<?= base_url();?>ar/propertyDetails/<?= $result->PropertyId;?>">
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
                                            <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-md-3 col-xs-3 properties_header_cols hidden-sm hidden-xs" id="properties_bottom_right_div">
                                <div style="position: relative;width: 112%;height: 500px;margin-right: -6%;border-radius: 10px;text-align: center;padding-top: 80%;font-size: 380%;background: rgba(0, 0, 0, 0.3);color: white;">
                                    قريبا
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div id="properties_compare_div">
                        <input type="submit" class="btn btn-default properties_contact_btn" id="compareSubmit" name="compareSubmit" onclick="return checkValidation();" value="<?php echo $this->lang->line('viewallproperties_button'); ?>">
                        <!-- <button type="submit" class="btn btn-default properties_contact_btn" onclick="redirect('en');">Compare</button> -->
                       <!--  <a href="<?=base_url(); ?>compareProperties" class="" style="text-decoration: none;color: white;">
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

    <div class="modal fade" id="imagesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Property Images</h4>
                </div>
                <div class="modal-body" id="image_body">
                    <div id="property_details_images" class="" style="height:480px!important; width:535px!important">
                        <div id="image_gallery" u="slides" style="cursor: move; position: absolute; width: 495px; height: 356px; overflow: hidden;">
                       <!--      <?php //foreach ($images[$result->PropertyId]['src'] as $key => $image): ?>
                                <div>
                                    <img u="image" src="<?= base_url();?>/application/static/upload/property_images/<?= $image; ?>" />
                                    <img u="thumb" src="<?= base_url();?>/application/static/upload/property_images/<?= $image; ?>" />
                                </div>
                            <?php //endforeach ?> -->
                        </div>
                        <span id="first_span" u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 185px; left: 25px;">
                        </span>
                        <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 185px; right: 25px">
                        </span>
                        <div u="thumbnavigator" class="jssort01" style="overflow: hidden; position: absolute; width: 495px; height: 100px; left:20px; bottom: 0px;">
                            <div id="slides" u="slides" style="cursor: move;">
                                <div u="prototype" class="p" style="position: absolute; width: 72px; height: 72px; top: 0; left: 0;">
                                    <div class=w><div u="thumbnailtemplate" style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></div></div>
                                    <div class=c>
                                    </div>
                                </div>
                            </div>
                            <!-- Thumbnail Item Skin End -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
                <input type="hidden" value="<?= base_url();?>" id="base_url">
            </div>
        </div>
    </div>


    <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
        <script>
        $(document).ready(function (){
            $('#properties').dataTable({
                order: [[ 1, "asc" ]],
                language: {
                    search: "بحث:", 
                    paginate: {
                        first:      "الاخيرة",
                        previous:   "السابقة",
                        next:       "القادمة",
                        last:       "الاخيرة"
                    },
                    lengthMenu: "عرض _MENU_ نتيجة", 
                    info: "عرض _START_ إلى _END_ من _TOTAL_ نتيجة"
                }

            });

            $('.imgModal').click(function(event) {
                $('#property_details_images').remove();
                $('#image_body').html('<div id="property_details_images" class="" style="height:480px!important; width:535px!important;padding-right:4%;">'+
                    '<div id="image_gallery" u="slides" style="cursor: move; position: absolute; width: 495px; height: 356px; overflow: hidden;">'+
                                        '</div>'+
                            '<span id="first_span" u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 185px; left: 25px;">'+
                            '</span>'+
                            '<span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 185px; right: 25px">'+
                            '</span>'+
                            '<div u="thumbnavigator" class="jssort01" style="overflow: hidden; position: absolute; width: 495px; height: 100px; left:20px; bottom: 0px;">'+
                                '<div id="slides" u="slides" style="cursor: move;">'+
                                    '<div u="prototype" class="p" style="position: absolute; width: 72px; height: 72px; top: 0; left: 0;">'+
                                        '<div class=w><div u="thumbnailtemplate" style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></div></div>'+
                                        '<div class=c>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '</div>');
                var propertyId = $(this).attr('id');
                var html_output ='';
                var image_count = 0;
                var flag = 1;
                var url = $('#base_url').val();
                $("#img"+propertyId+" .imagesList li").each(function(){
                    html_output += '<div><img u="image" src="'+$(this).find('img').attr('src')+'"/>';
                    html_output += '<img u="thumb" src="'+$(this).find('img').attr('src')+'"/>';
                    html_output += '</div>'
                });
                $("#image_gallery").html(html_output);
                var _SlideshowTransitions = [
                        {$Duration: 1200, x: 0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
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
            });

            

            $('.contact_button').click(function(event) {
                    $('#propertyID').val($(this).attr('id'));
                   // alert($('#propertyID').val());return;
            });

           $("[name='properties_length']").change(function() {
               $.getScript($('#url').val()+"application/static/js/getImages.js");
           });

           $(".paginate_button").click(function() {
               $.getScript($('#url').val()+"application/static/js/getImages.js");
           });

           $(".imgModal").click(function(){
                $.getScript($('#url').val()+"application/static/js/carousel.js");
           });

           $("#thead").css('display', 'none');
           $("#tfoot").css('display', 'none');


        });
        </script>