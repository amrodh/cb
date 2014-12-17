<div class="tab-pane active" id="home">
	<div class="row newsletter_rows">
        <?php if (isset($featuredProperties)): ?>
            <?php $count = 1; ?>
            <?php foreach ($featuredProperties as $property): ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 newsletter_cols" style="">
                    <div class="properties_number compare_number">
                        <?php echo $count; ?>
                    </div>
                    <div class="propertyImages hide" id="img<?=$property->PropertyId; ?>">
                        <ul class="imagesList">
                            <?php foreach ($featuredImages[$property->PropertyId]['src'] as $key => $image): ?>
                                <li>
                                    <img src="<?= base_url();?>/application/static/upload/property_images/<?= $image; ?>">
                                </li>
                            <?php endforeach ?>
                        </ul>
                      <!--   <?= $featuredImages[$property->PropertyId]; ?> -->
                    </div>
                    <div class="featuredProperty_img">
                        <a href="<?= base_url();?>en/propertyDetails/<?= $property->PropertyId;?>"> <img class="compare_images" id="image_<?= $property->PropertyId;  ?>" src="<?= base_url();?>/application/static/images/sample_property.png"/></a>
                    </div>
                    <div class="compare_description">
                        <div class="compare_description_title">
                            <a href="<?= base_url();?>en/propertyDetails/<?= $property->PropertyId;?>"> <?php 
                                $propertyName = $property->PrpertyTypeStr.' for '.$property->SalesTypeStr.' '.$property->LocationProject.', '.$property->LocationDistrict.', '.$property->LocationCity;
                                //$propertyName .= $propertyName;
                                if(strlen($propertyName) > 52){
                                    $propertyName = substr($propertyName,0,48).'..';
                                }
                                echo $propertyName;
                             ?> 
                            </a>
                        </div>
                        <div class="compare_description_content">
                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle1'); ?> </b> <?php echo $property->UnitId;?>
                            </div>
                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle2'); ?> </b> <?php echo $property->PrpertyTypeStr;?>
                            </div>
                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle3'); ?> </b> <?php echo explode('.',$property->TotalArea)[0];?> <?php echo $property->AreaunitStr;?>s
                            </div>
                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle4'); ?> </b> <?php echo $property->SalesTypeStr;?>
                            </div>
                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle5'); ?> </b> <?php echo $property->InteriorFinishing;?>
                            </div>
                        </div>
                    </div>
                    <div class="compare_price">
                        <div class="compare_price_text" style="text-align:center;">
                            <?php if ($property->SalesTypeStr == 'Sale'): ?>
                                <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle6'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $property->SaleCurrency.' '.number_format(explode('.',$property->SalePrice)[0]); ?></span>
                            <?php else: ?>
                                <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle7'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $property->RentCurrency.' '.number_format(explode('.',$property->RentPrice)[0]); ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="compare_more">
                        <a href="<?= base_url();?>en/propertyDetails/<?= $property->PropertyId;?>">See more</a>
                    </div>
                </div>
                <?php $count++; ?>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>
<a style="text-align: right; float:right;" href="<?= base_url()?>en/viewAllProperties?featured=true&lob=1">See More Featured Properties</a>
