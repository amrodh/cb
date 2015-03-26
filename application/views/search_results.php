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
                        Commercial buildings for Sale and Rent
                       <!--  <?php if (isset($commercialSale)): ?>
                            Commercial buildings for Sale
                        <?php else: ?>
                            Commercial buildings for Rent
                        <?php endif ?> -->
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

            <div class="container" style="width:100%;padding-right:0;">
                <div class="row" style="width:100%;margin-right: 0;">
                    <div class="col-lg-9 col-sm-12 col-md-9 col-xs-12 properties_header_cols" id="properties_bottom_left_div">
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
                                                        </div>
                                                        <div class="hidden-lg hidden-md hidden-sm" style="/* float:right; */position: absolute;top: 10px;right: 10px;">
                                                            <?php if ($result->is_favorite == 1): ?>
                                                                <img class="properties_star_icon_orange" onclick="favorites(<?= $result->PropertyId;?>, 'orange');" id="icon1_<?= $result->PropertyId;?>" src="<?= base_url();?>/application/static/images/icon_orange_star.png"/>
                                                            <?php else: ?>
                                                                <img class="properties_star_icon_gray" onclick="favorites(<?= $result->PropertyId;?>, 'gray');" id="icon1_<?= $result->PropertyId;?>" src="<?= base_url();?>/application/static/images/icon_gray_star.png"/>
                                                            <?php endif ?>
                                                        </div>
                                                        <div class="properties_img">
                                                            <?php if (is_array($images[$result->PropertyId]['src'])): ?>
                                                                <?php if ($images[$result->PropertyId]['src'][0] != 'No_image.svg'): ?>
                                                                    <a href="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>"><img style="width:100%;object-fit: cover;margin: auto;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src'][0]; ?>"/></a>
                                                                <?php else: ?>
                                                                    <a href="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>"><img style="width:100%;object-fit: cover;margin: auto;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/images/<?= $images[$result->PropertyId]['src'][0]; ?>"/></a>
                                                                <?php endif ?>
                                                                <!-- <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src'][0]; ?>"/></a> -->
                                                            <?php else: ?>
                                                                <?php if ($images[$result->PropertyId]['src'] != 'No_image.svg'): ?>
                                                                    <a href="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>"><img style="width:100%;object-fit: cover;margin: auto;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src']; ?>"/></a>
                                                                <?php else: ?>
                                                                    <a href="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>"><img style="width:100%;object-fit: cover;margin: auto;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/images/<?= $images[$result->PropertyId]['src']; ?>"/></a>
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
                                                                <div class="" style="float: left; padding:0;width:90%;">
                                                                   <a href="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>">
                                                                        <?php if ($result->LocationProject != ''): ?>
                                                                            <?php echo $result->PrpertyTypeStr;?> for <?php echo $result->SalesTypeStr;?> <?php echo $result->LocationProject; ?>, <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>
                                                                        <?php else: ?>
                                                                            <?php echo $result->PrpertyTypeStr;?> for <?php echo $result->SalesTypeStr;?> <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>
                                                                        <?php endif ?>
                                                                    </a>
                                                                </div>
                                                                <div class="hidden-xs" style="float:right;">
                                                                    <?php if ($result->is_favorite == 1): ?>
                                                                        <img class="properties_star_icon_orange" onclick="favorites(<?= $result->PropertyId;?>, 'orange');" id="icon2_<?= $result->PropertyId;?>" src="<?= base_url();?>/application/static/images/icon_orange_star.png"/>
                                                                    <?php else: ?>
                                                                        <img class="properties_star_icon_gray" onclick="favorites(<?= $result->PropertyId;?>, 'gray');" id="icon2_<?= $result->PropertyId;?>" src="<?= base_url();?>/application/static/images/icon_gray_star.png"/>
                                                                    <?php endif ?>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="properties_content row" style="margin-left: 0; margin-right: 0;">
                                                                <?php if (!isset($commercial)): ?> 
                                                                    <?php if ($result->BedRoomsNumber != 0): ?>
                                                                        <b><?php echo $result->BedRoomsNumber; ?></b> Bedrooms<br>                                           
                                                                    <?php endif ?>  
                                                                <?php endif ?>
                                                                <?php if ($result->SalesTypeStr == 'Sale'): ?>
                                                                    <?php echo "Sale Price: ".$result->SaleCurrency.' '.number_format(explode('.',$result->SalePrice)[0]); ?>
                                                                    <?php if ($result->RentPrice[0] != 0): ?>
                                                                        <?php echo "Rent Price: ". $result->RentCurrency.' '.number_format(explode('.',$result->RentPrice)[0]);?>
                                                                    <?php endif ?> 
                                                                <?php else: ?>  
                                                                    <?php if ($result->SalesTypeStr == 'Rent'): ?>
                                                                        <?php echo "Rent Price: ".$result->RentCurrency.' '.number_format(explode('.',$result->RentPrice)[0]); ?>
                                                                        <?php if ($result->SalePrice[0] != 0): ?>
                                                                            <?php echo "Sale Price: ". $result->SaleCurrency.' '.number_format(explode('.',$result->SalePrice)[0]);?>
                                                                        <?php endif ?>
                                                                    <?php else: ?>
                                                                        <?php echo "Sale Price: ". $result->SaleCurrency.' '.number_format(explode('.',$result->SalePrice)[0])."<br>";?>
                                                                        <?php echo "Rent Price: ". $result->RentCurrency.' '.number_format(explode('.',$result->RentPrice)[0]);?>
                                                                    <?php endif ?>   
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                        <div class="properties_details_div">
                                                            <div class="btn-group properties_details_btns_div">
                                                                <button type="button" class="btn btn-default properties_btns">
                                                                    <a href="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>">
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
                                                                    <div id="fb-root"></div>
                                                                    <div class="fb-share-button" data-layout="button" data-href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"></div>
                                                                </div>
                                                                <div class="row" style="margin: auto;margin-top: 8%;width:46%;">
                                                                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>" data-via="" data-count="none">Tweet</a>
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
                                                                <a href="#contactModal" class="contact_button" id="<?php echo $result->PropertyId; ?>_<?php echo $result->PrpertyTypeStr;?>" style="text-decoration: none;color: white;" data-toggle="modal"> 
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
                                                        </div>
                                                        <div class="properties_img">

                                                            <?php if (is_array($images[$result->PropertyId]['src'])): ?>
                                                                <?php if ($images[$result->PropertyId]['src'][0] != 'No_image.svg'): ?>
                                                                    <a href="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>"><img style="width:100%;object-fit: cover;margin: auto;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src'][0]; ?>"/></a>
                                                                <?php else: ?>
                                                                    <a href="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>"><img style="width:100%;object-fit: cover;margin: auto;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/images/<?= $images[$result->PropertyId]['src'][0]; ?>"/></a>
                                                                <?php endif ?>
                                                                <!-- <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src'][0]; ?>"/></a> -->
                                                            <?php else: ?>
                                                                <?php if ($images[$result->PropertyId]['src'] != 'No_image.svg'): ?>
                                                                    <a href="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>"><img style="width:100%;object-fit: cover;margin: auto;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/upload/property_images/<?= $images[$result->PropertyId]['src']; ?>"/></a>
                                                                <?php else: ?>
                                                                    <a href="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>"><img style="width:100%;object-fit: cover;margin: auto;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>application/static/images/<?= $images[$result->PropertyId]['src']; ?>"/></a>
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
                                                                <div class="col-lg-11" style="float: left; padding:0;">
                                                                    <a href="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>">
                                                                        <?php if ($result->LocationProject != ''): ?>
                                                                            <?php echo $result->PrpertyTypeStr;?> for <?php echo $result->SalesTypeStr;?> <?php echo $result->LocationProject; ?>, <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>
                                                                        <?php else: ?>
                                                                            <?php echo $result->PrpertyTypeStr;?> for <?php echo $result->SalesTypeStr;?> <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?>
                                                                        <?php endif ?>
                                                                    </b></a>
                                                                </div>
                                                            </div>
                                                            <div class="properties_content row" style="margin-left: 0; margin-right: 0;">
                                                                <?php if (!isset($commercial)): ?>                                               
                                                                    <?php if ($result->BedRoomsNumber != 0): ?>
                                                                        <b><?php echo $result->BedRoomsNumber; ?></b> Bedrooms<br>                                           
                                                                    <?php endif ?>  
                                                                <?php endif ?>
                                                                <?php if ($result->SalesTypeStr == 'Sale'): ?>
                                                                    <?php echo "Sale Price: ".$result->SaleCurrency.' '.number_format(explode('.',$result->SalePrice)[0]); ?>
                                                                    <?php if ($result->RentPrice[0] != 0): ?>
                                                                        <?php echo "Rent Price: ". $result->RentCurrency.' '.number_format(explode('.',$result->RentPrice)[0]);?>
                                                                    <?php endif ?> 
                                                                <?php else: ?>  
                                                                    <?php if ($result->SalesTypeStr == 'Rent'): ?>
                                                                        <?php echo "Rent Price: ".$result->RentCurrency.' '.number_format(explode('.',$result->RentPrice)[0]); ?>
                                                                        <?php if ($result->SalePrice[0] != 0): ?>
                                                                            <?php echo "Sale Price: ". $result->SaleCurrency.' '.number_format(explode('.',$result->SalePrice)[0]);?>
                                                                        <?php endif ?>
                                                                    <?php else: ?>
                                                                        <?php echo "Sale Price: ". $result->SaleCurrency.' '.number_format(explode('.',$result->SalePrice)[0])."<br>";?>
                                                                        <?php echo "Rent Price: ". $result->RentCurrency.' '.number_format(explode('.',$result->RentPrice)[0]);?>
                                                                    <?php endif ?>   
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                        <div class="properties_details_div">
                                                            <div class="btn-group properties_details_btns_div">
                                                                <button type="button" class="btn btn-default properties_btns">
                                                                    <a href="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>">
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
                                                                    <div id="fb-root"></div>
                                                                    <div class="fb-share-button" data-layout="button" data-href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"></div>
                                                                </div>
                                                                <div class="row" style="margin: auto;margin-top: 8%;width:46%;">
                                                                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?= base_url();?>en/propertyDetails/<?= $result->PropertyId;?>" data-via="" data-count="none">Tweet</a>
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
                                                                <a href="#contactModal" class="contact_button" id="<?php echo $result->PropertyId; ?>_<?php echo $result->PrpertyTypeStr;?>" style="text-decoration: none;color: white;" data-toggle="modal"> 
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
                        <div style="position: relative;width: 114%;height: 500px;margin-top:-87%;margin-left: -7%;border-radius: 10px;text-align: center;padding-top: 80%;font-size: 180%;background: rgba(0, 0, 0, 0.3);color: white;">
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
                <div class="row hide" id="missing_data_msg" style="width: 100%;text-align:center;margin-left:0%;margin-top:2%;">
                    <div class="alert alert-danger" role="alert">
                       Please make sure you inserted your first name, last name and phone number.
                    </div>
                </div>
                <form class="form-inline" id="property_form" role="form" method="post">
                    <!-- <input type="hidden" name="unitType" id="unitType" value="<?php echo $searchResults->PrpertyTypeStr;?>"> -->
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label for="property_first_name"><?php echo $this->lang->line('propertydetails_firstname'); ?></label> <span style="color: red;">*</span>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="property_first_name" name="property_first_name" placeholder="<?php echo $this->lang->line('viewallproperties_placeholder1'); ?>" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label for="property_last_name"><?php echo $this->lang->line('propertydetails_lastname'); ?></label> <span style="color: red;">*</span>
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
                            <input type="email" class="form-control" id="property_email" name="property_email" placeholder="<?php echo $this->lang->line('viewallproperties_placeholder3'); ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label for="property_phone"><?php echo $this->lang->line('propertydetails_phone'); ?></label> <span style="color: red;">*</span>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="property_phone" name="property_phone" placeholder="<?php echo $this->lang->line('viewallproperties_placeholder4'); ?>" required>
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
                    <img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6022342869903&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" />
                    <div class="form-group" style="width: 97%;">
                        <p><?php echo $this->lang->line('propertydetails_text'); ?></p>
                        <textarea class="form-control" id="property_form_textarea" name="property_comments" rows="3"></textarea>
                    </div>
                    <input type="hidden" id="propertyID" name="propertyID" value="">
                    <input type="hidden" id="propertyType" name="propertyType" value="">
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

<script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=409474675892587&version=v2.3";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> -->
<script>
$(document).ready(function (){

    $('.properties_share_btn').click(function(event) {
        // alert($(this).val());
        if ($('#properties_share_div'+ $(this).val()).css('display') == 'none'){
          $("#properties_share_div" + $(this).val()).slideDown("slow");
        }
        else{
          $("#properties_share_div" + $(this).val()).slideUp("slow");
        }
    });

    $('.contact_button').click(function(event) {
        var id = $(this).attr("id").split("_");
        $('#propertyType').val(id[1]);
        var type = id[1];
        id = id[0];
        $('#propertyID').val(id);
    });

// $('#contact_form_btn').click(function(event) {
//     var id = $(this).attr("id").split("_");
//                 var type = id[1];
//                 id = id[0];
//                 $('#propertyID').val(id);
//         var msg_length = $("#property_form_textarea").val().length;
//         var email = $("#property_email").val();
//         var phone = $("#property_phone").val();
//         var language = $("#currentLanguage").val();
//         var serial = $("#propertyID").val();
//         var string = 'Submit|Unit|'+serial+'|'+email+'|'+phone+'|'+msg_length+'|'+language+'|'+type;
//         // alert(string);return;
//         ga('send', 'event', 'ContactUs', string, 'SubmitUnit');
//    });

    $('#contact_form_btn').click(function(event) {
        var msg_length = $("#property_form_textarea").val().length;
        var language = $("#currentLanguage").val();
        var type = $('#propertyType').val();
        var firstname = $('#property_first_name').val();
        var lastname = $('#property_last_name').val();
        var email = $('#property_email').val();
        var phone = $('#property_phone').val();
        var comments = $('#property_form_textarea').val();
        var propertyID = $('#propertyID').val();
        var interests = new Array();
        var string = 'Submit|Unit|'+propertyID+'|'+email+'|'+phone+'|'+msg_length+'|'+language+'|'+type;
        // alert(string);
        

        $.each($("input[name='interest[]']:checked"), function() {
            interests.push($(this).val());
        });
        if (firstname == '' || lastname == '' || phone == '')
        {
            $("#missing_data_msg").removeClass('hide');
            jQuery("#missing_data_msg").delay(2000).fadeOut("slow",function(){
                $('#missing_data_msg').addClass('hide');
            });
        }else{
            if (!$("#missing_data_msg").hasClass('hide'))
            {
                $("#missing_data_msg").addClass('hide');
            }
            
          // alert(interests.val());return;
            var url = $("#url").val();
            // alert(url);
            url = url+"insertContact";
             $.ajax({
                type: "POST",
                url: url,
                data: { firstname: firstname, lastname: lastname, email:email, phone:phone, comments:comments, propertyID: propertyID, interests : interests }
              })
                .success(function( response ) {
                    if (response == 1){
                        ga('send', 'event', 'ContactUs', string, 'SubmitUnit');
                        window._fbq = window._fbq || [];
                        window._fbq.push(['track', '6022342869903', {'value':'0.00','currency':'USD'}]);
                        $('#success_message').removeClass('hide');
                        jQuery("#success_message").delay(2000).fadeOut("slow",function(){
                            $('#success_message').addClass('hide');
                            $('#property_form')[0].reset();
                        });
                    }else{
                        $('#failure_message').removeClass('hide');
                        jQuery("#failure_message").delay(2000).fadeOut("slow",function(){
                            $('#failure_message').addClass('hide');
                        });
                    }
                        
                    // alert(response);
                });
        }

        
    });

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
        $('#property_details_images').remove();
        
        $('#image_body').html('<div id="property_details_images" class="" style="height:480px!important; width:535px!important;padding-left:4%;">'+
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
   


   

   $("[name='properties_length']").change(function() {
       $.getScript($('#url').val()+"application/static/js/getImages.js");
   });

   $(".paginate_button").click(function() {
       $.getScript($('#url').val()+"application/static/js/getImages.js");
   });

   $("#thead").css('display', 'none');
   $("#tfoot").css('display', 'none');


   
});
</script>
