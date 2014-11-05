<?php include('header.php'); ?>
    <div id="market_index_body">
        <div class="container" id="market_index_top_div">
            <div class="row" id="market_index_overlay_div">
                <div class="row" id="market_index_top_row">
                    <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                        <div class="market_index_col_title title_margin">
                            <?php echo $this->lang->line('marketindex_title1'); ?>
                        </div>
                        <select class="selectpicker" name="lob" id="marketIndex_lob" data-style="btn" data-title="Select Category" data-size="5">
                            <option value="0">إختار الفئة</option> 
                            <option value="1">سكنية</option>
                            <option value="2">تجارية</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                        <div class="market_index_col_title title_margin">
                            <?php echo $this->lang->line('marketindex_title4'); ?>
                        </div>
                        <div id="market_propertyContainer">
                            
                        </div>
                        <div id="market_disabled_property">
                            <select class="selectpicker" id="marketIndex_disabled_property" name="marketIndex_propertyType" data-style="btn" data-title="Select Type" disabled>
                                <option value="0">إختار نوع العقار</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                        <div class="market_index_col_title title_margin">
                            <?php echo $this->lang->line('marketindex_title2'); ?>
                        </div>
                        <select class="selectpicker" name="marketIndex_district" data-style="btn" data-title="Select District">
                            <option value="0">إختار المنطقة</option> 
                            <?php foreach ($districts as $district): ?>
                                <option value="<?php echo $district['id']; ?>"><?= $district['name'];?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                        <div class="market_index_col_title title_margin">
                            <?php echo $this->lang->line('marketindex_title3'); ?>
                        </div>
                        <select class="selectpicker" name="marketIndex_contractType" data-style="btn" data-title="Select Type">
                            <option value="0">إختار نوع العقد</option> 
                            <option value="Sale">للبيع</option>
                            <option value="Rent">للايجار</option>
                        </select>
                    </div>
                </div>
                <div class="row" id="market_index_bottom_row">
                    <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6 market_index_cols right_border">
                        <div class="market_index_titles">
                            ٦٬٠٠٠ جنيه مصري
                        </div>
                        <div class="market_index_content">
                            <?php echo $this->lang->line('marketindex_subtitle1'); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6 market_index_cols right_border">
                        <div class="market_index_titles">
                            ١٢٬٠٠٠ جنيه مصري
                        </div>
                        <div class="market_index_content">
                            <?php echo $this->lang->line('marketindex_subtitle2'); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6 market_index_cols">
                        <div class="market_index_titles">
                            ١٠٬٠٠٠ جنيه مصري
                        </div>
                        <div class="market_index_content">
                            <?php echo $this->lang->line('marketindex_subtitle3'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <?php include 'property_alert.php'; ?>
        </div>
       <!--  // <script src="http://localhost/ColdwellBanker/js/bootstrap-select.min.js"></script>
        // <script src="http://localhost/ColdwellBanker/js/script.js"></script> -->
    </div>
<?php include('footer.php'); ?>  
