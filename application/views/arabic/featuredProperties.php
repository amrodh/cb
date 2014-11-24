<!-- <div style="width: 100%; margin-top: 8%;">
    <div id="featuredProperty_header">
        <ul class="nav nav-tabs nav-justified property_alert_box" id="featuredProperty_tabs">
           <li class="active">
               <a href="#alert" data-toggle="tab">
                    <span style="color:orange;" id"notifier"><b>
                        <span class="glyphicon glyphicon-tower"></span>
                    </span>
                    <?php echo $this->lang->line('featured_title'); ?>
               </a>
           </li>
        </ul>
    </div>
    <div class="tab-content featuredProperty_body"> -->
        <div class="tab-pane active" id="home">
            <div class="row newsletter_rows">
                <?php if (isset($featuredProperties)): ?>
                    <?php $count = 1; ?>
                    <?php foreach ($featuredProperties as $property): ?>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 newsletter_cols" style="">
                            <div class="properties_number compare_number">
                                <?php echo $count; ?>
                            </div>
                            <div class="propertyImages hide" id="img<?=$property->PropertyId; ?>">
                                <?= $featuredImages[$property->PropertyId]; ?>
                            </div>
                            <div class="featuredProperty_img">
                                <a href="<?= base_url();?>ar/propertyDetails/<?= $property->PropertyId;?>"> <img class="compare_images" id="image_<?= $property->PropertyId;  ?>" src="<?= base_url();?>/application/static/images/sample_property.png"/></a>
                            </div>
                            <div class="compare_description">
                                <div class="compare_description_title">
                                    <a href="<?= base_url();?>en/propertyDetails/<?= $property->PropertyId;?>">
                                        <?php 
                                            $propertyName = $property->PrpertyTypeStr.' for '.$property->SalesTypeStr.' '.$property->LocationProject.', '.$property->LocationDistrict.', '.$property->LocationCity;
                                            //$propertyName .= $propertyName;
                                            if(strlen($propertyName) > 52){
                                                $propertyName = substr($propertyName,0,48).'..';
                                            }
                                            echo $propertyName;
                                         ?>
                                    </a>
                                   <!--  <?php if ($property->LocationProject != ''): ?>
                                        <?php echo $property->PrpertyTypeStr;?> for <?php echo $property->SalesTypeStr;?> <?php echo $property->LocationProject; ?>, <?php echo $property->LocationDistrict; ?>, <?php echo $property->LocationCity; ?>
                                    <?php else: ?>
                                        <?php echo $property->PrpertyTypeStr;?> for <?php echo $property->SalesTypeStr;?> <?php echo $property->LocationDistrict; ?>, <?php echo $property->LocationCity; ?>
                                    <?php endif ?> -->
                                    <!-- <?php echo $this->lang->line('compare_title1'); ?> -->
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
                                <a href="<?= base_url();?>en/propertyDetails/<?= $property->PropertyId;?>">عرض المزيد</a>
                            </div>
                        </div>
                        <?php $count++; ?>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
        <a style="text-align: left; float:left;" href="<?= base_url()?>ar/viewAllProperties?featured=true">عرض المزيد من العقارات المتميزة</a>
    <!-- </div>
</div>

<script type="text/javascript">

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
</script> -->