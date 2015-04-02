<div class="tab-pane active" id="home">
<?php if (count($featuredProperties < 3)): ?>
    <div class="row newsletter_rows" style="margin: auto;">
<?php else: ?>
    <div class="row newsletter_rows">
<?php endif ?>
        <?php if (isset($featuredProperties) && $featuredProperties != false): ?>
            <?php $count = 1; ?>
            <?php foreach ($featuredProperties as $property): ?>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 newsletter_cols" style="">
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
                    </div>
                    <div class="featuredProperty_img">
                        <a href="<?= base_url();?>en/propertyDetails/<?= $property->PropertyId;?>"> <img class="compare_images" id="image_<?= $property->PropertyId;  ?>" src="<?= base_url();?>/application/static/images/sample_property.png"/></a>
                    </div>
                    <div class="compare_description">
                        <div class="compare_description_title">
                            <a href="<?= base_url();?>en/propertyDetails/<?= $property->PropertyId;?>"> <?php 
                                $propertyName = $property->PrpertyTypeStr.' for '.$property->SalesTypeStr.' '.$property->LocationProject.', '.$property->LocationDistrict.', '.$property->LocationCity;
                                if(strlen($propertyName) > 52){
                                    $propertyName = substr($propertyName,0,42).'..';
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
        <?php else: ?>
            Currently, there are no featured properties. Please check again later. 
        <?php endif ?>
    </div>
</div>
<?php if (isset($featuredProperties) && $featuredProperties != false): ?>
    <div class="container" style="width: 100%;">
        <div class="row">
            <div class="col-lg-6">
                <a style="display:block;text-align: center;  width: 75%;margin: auto;" href="<?= base_url()?>en/viewAllProperties?featured=true&amp;lob=1">
                    See More Residential Featured Properties
                </a>
            </div>
            <div class="col-xs-9 hidden-lg hidden-md hidden-sm visible-xs" id="separator">
            </div>
            <div class="col-lg-6">
                <a style="display:block;text-align: center;  width: 75%;margin: auto;" href="<?= base_url()?>en/viewAllProperties?featured=true&amp;lob=2">
                    See More Commercial Featured Properties
                </a>
            </div>
        </div>
    </div>
    <!-- <a style="text-align: right; float:right;" href="<?= base_url()?>en/viewAllProperties?featured=true&amp;lob=1">
        See More Residential Featured Properties
    </a>
    <a style="text-align: right; float:right; margin-right: 2%;" href="<?= base_url()?>en/viewAllProperties?featured=true&amp;lob=2">
        See More Commercial Featured Properties
    </a> -->
<?php  endif ?>

