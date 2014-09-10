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
                    <div class="col-lg-4 col-md-4 compare_cols">
                        <div class="properties_number compare_number">
                            ١
                        </div>
                        <div class="compare_img">
                            <img class="compare_images" src="<?= base_url();?>/application/static/images/sample_property_image.png"/>
                        </div>
                        <div class="compare_description">
                            <div class="compare_description_title">
                                <?php echo $this->lang->line('compare_title1'); ?>
                            </div>
                            <div class="compare_description_content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            </div>
                            <div class="compare_description_title">
                                <?php echo $this->lang->line('compare_title2'); ?>
                            </div>
                            <div class="compare_description_content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            </div>
                            <div class="compare_description_title">
                                <?php echo $this->lang->line('compare_title3'); ?>
                            </div>
                            <div class="compare_description_content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            </div>
                            <div class="compare_description_title">
                                <?php echo $this->lang->line('compare_title4'); ?>
                            </div>
                            <div class="compare_price">
                                <div class="compare_price_text">
                                    ٢٬٠٠٠٬٠٠٠ جنيه مصري
                                </div>
                                <div class="compare_contact_btn properties_contact">
                                    <a href="#" class="properties_contact_btn"><?php echo $this->lang->line('compare_contact'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 compare_cols">
                        <div class="properties_number compare_number">
                            ٢
                        </div>
                        <div class="compare_img">
                            <img class="compare_images" src="<?= base_url();?>/application/static/images/sample_property_image.png"/>
                        </div>   
                        <div class="compare_description">
                            <div class="compare_description_title">
                                <?php echo $this->lang->line('compare_title1'); ?>
                            </div>
                            <div class="compare_description_content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            </div>
                            <div class="compare_description_title">
                                <?php echo $this->lang->line('compare_title2'); ?>
                            </div>
                            <div class="compare_description_content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            </div>
                            <div class="compare_description_title">
                                <?php echo $this->lang->line('compare_title3'); ?>
                            </div>
                            <div class="compare_description_content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            </div>
                            <div class="compare_description_title">
                                <?php echo $this->lang->line('compare_title4'); ?>
                            </div>
                            <div class="compare_price">
                                <div class="compare_price_text">
                                    ٢٬٠٠٠٬٠٠٠ جنيه مصري
                                </div>
                                <div class="compare_contact_btn properties_contact">
                                    <a href="#" class="properties_contact_btn"><?php echo $this->lang->line('compare_contact'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 compare_cols">
                        <div class="properties_number compare_number">
                            ٣
                        </div>
                        <div class="compare_img">
                            <img class="compare_images" src="<?= base_url();?>/application/static/images/sample_property_image.png"/>
                        </div>
                        <div class="compare_description">
                            <div class="compare_description_title">
                                <?php echo $this->lang->line('compare_title1'); ?>
                            </div>
                            <div class="compare_description_content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            </div>
                            <div class="compare_description_title">
                                <?php echo $this->lang->line('compare_title2'); ?>
                            </div>
                            <div class="compare_description_content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            </div>
                            <div class="compare_description_title">
                                <?php echo $this->lang->line('compare_title3'); ?>
                            </div>
                            <div class="compare_description_content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            </div>
                            <div class="compare_description_title">
                                <?php echo $this->lang->line('compare_title4'); ?>
                            </div>
                            <div class="compare_price">
                                <div class="compare_price_text">
                                    ٢٬٠٠٠٬٠٠٠ جنيه مصري
                                </div>
                                <div class="compare_contact_btn properties_contact">
                                    <a href="#" class="properties_contact_btn"><?php echo $this->lang->line('compare_contact'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="compare_map">
                    <div id="compare_map_title">
                        <?php echo $this->lang->line('compare_map'); ?>
                    </div>
                    <div id="compare_map_img">
                        <img src="<?= base_url();?>/application/static/images/compare_map.png"/>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>