<?php include('header.php'); ?>
    <div id="search_div">
        <?php include('search.php'); ?>
    </div>
    <input type="hidden" id="totalResults" name="totalResults" value="<?php if (isset($totalResults)) { echo $totalResults; }?>">
    <input type="hidden" id="lastResult" name="lastResult" value="0">
    <div class="container properties_main_div">
        <form>
            <div class="properties_top_div">
                <div id="properties_top_header_div">
                    <!--<div id="properties_top_header_left_div">-->
                        <?php if ($totalResults !== 0): ?>
                            <!-- <p style="padding-left: 20px;"><b><span id="startResult">1</span> - <?php if ($totalResults < 10): ?>
                                <span id="endResult" value=""><?php echo $totalResults; ?></span>
                            <?php else: ?>
                                <span id="endResult" value="">10</span>
                            <?php endif ?></b> من  --><b><?php if (isset($totalResults)) { echo $totalResults; }?></b> 
                        <?php endif ?>
                        <?php if (isset($commercial)): ?>
                            <?php if (isset($commercialSale)): ?>
                                ممتلكات تجارية للبيع
                            <?php else: ?>
                                ممتلكات تجارية للايجار
                            <?php endif ?>
                            <?php else: ?>
                                منازل للبيع والإيجار
                        <?php endif ?></p>
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
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-sm-11 col-md-8 col-xs-12 properties_header_cols" id="properties_bottom_left_div">
                                <table id="properties" style="border:none;" class="table table-striped table-bordered" border="0" cellspacing="0" width="50%">
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
                                                                  <input name="property_chkbx[]" type="checkbox"> 
                                                                </label>
                                                            </div>
                                                            <div class="propertyImages hide" id="img<?=$result->PropertyId; ?>">
                                                                <?= $images[$result->PropertyId]; ?>
                                                            </div>
                                                            <div class="properties_img">
                                                                <a href="<?= base_url();?>propertyDetails/<?= $result->PropertyId;?>"><img style="width:179px;height:127px;" id="image_<?= $result->PropertyId;  ?>" src="<?= base_url();?>/application/static/images/sample_property.png"/></a>
                                                            </div>
                                                            <div class="properties_number">
                                                                <?php echo $count; ?>
                                                            </div>
                                                            <div class="properties_info">
                                                                <div class="properties_title row" style="margin-left: 0; margin-right: 0;">
                                                                    <div class="col-lg-11" style="float: right; padding:0;">
                                                                        <b> <?php if ($result->LocationProject != ''): ?>
                                                                        <?php echo $result->LocationProject; ?>,
                                                                        <?php endif ?>
                                                                        <?php echo $result->LocationDistrict; ?>, <?php echo $result->LocationCity; ?></b>
                                                                    </div>
                                                                    <div class="col-lg-1" style=""><img class="properties_star_icon" src="<?= base_url();?>/application/static/images/icon_orange_star.png"/></div>
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
                                        <!-- <tr>
                                            <td>Tiger Nixon</td>
                                        </tr> -->

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-md-3 col-xs-3 properties_header_cols hidden-sm hidden-xs" id="properties_bottom_right_div">

                            </div>
                        </div>
                    </div>
                    <div id="properties_compare_div">
                        <!-- <button type="submit" class="btn btn-default properties_contact_btn" onclick="redirect('en');">Compare</button> -->
                        <a href="<?=base_url(); ?>compareProperties" class="" style="text-decoration: none;color: white;">
                            <?php echo $this->lang->line('viewallproperties_button'); ?>
                        </a>
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
                    <form class="form-inline" id="property_form" role="form">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label for="property_first_name"><?php echo $this->lang->line('propertydetails_firstname'); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="property_first_name" placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label for="property_last_name"><?php echo $this->lang->line('propertydetails_lastname'); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="property_last_name" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label for="property_email"><?php echo $this->lang->line('propertydetails_email'); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="email" class="form-control" id="property_email" placeholder="Enter E-mail">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label for="property_phone"><?php echo $this->lang->line('propertydetails_phone'); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="property_phone" placeholder="Enter Phone">
                            </div>
                        </div>
                        <div class="form-group" style="width: 97%;">
                            <p><?php echo $this->lang->line('propertydetails_text'); ?></p>
                            <textarea class="form-control" id="property_form_textarea" style="width:100%;" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default property_btn" id="contact_form_btn" onClick="cmdCalc_Click(this.form);"><?php echo $this->lang->line('propertydetails_button'); ?></button>
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


    <div id="property_notifier">
        <?php include 'property_alert.php'; ?>
    </div>
    <?php include('footer.php'); ?>

        <script>
        $(document).ready(function (){
            $('#properties').dataTable({"order": [[ 1, "asc" ]]});

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
