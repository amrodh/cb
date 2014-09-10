<?php include('header.php'); ?>
    <div id="market_index_body">
        <div class="container" id="market_index_top_div">
            <div class="row" id="market_index_overlay_div">
                <div class="row" id="market_index_top_row">
                    <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                        <div class="market_index_col_title title_margin">
                            <?php echo $this->lang->line('marketindex_title1'); ?>
                        </div>
                        <select class="selectpicker" data-style="btn" data-title="Select Type">
                             <option>Select Type</option> 
                             <option>Apartment</option>
                             <option>Building</option>
                             <option>Furnished Apartment</option>
                             <option>Office</option>
                             <option>Shop</option>
                             <option>Villa</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                        <div class="market_index_col_title title_margin">
                            <?php echo $this->lang->line('marketindex_title2'); ?>
                        </div>
                        <select class="selectpicker" data-style="btn" data-title="Select Type">
                             <option>Select Type</option> 
                             <option>Apartment</option>
                             <option>Building</option>
                             <option>Furnished Apartment</option>
                             <option>Office</option>
                             <option>Shop</option>
                             <option>Villa</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                        <div class="market_index_col_title title_margin">
                            <?php echo $this->lang->line('marketindex_title3'); ?>
                        </div>
                        <select class="selectpicker" data-style="btn" data-title="Select Type">
                             <option>Select Type</option> 
                             <option>Apartment</option>
                             <option>Building</option>
                             <option>Furnished Apartment</option>
                             <option>Office</option>
                             <option>Shop</option>
                             <option>Villa</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                        <div class="market_index_col_title title_margin">
                            <?php echo $this->lang->line('marketindex_title4'); ?>
                        </div>
                        <select class="selectpicker" data-style="btn" data-title="Select Type">
                             <option>Select Type</option> 
                             <option>Apartment</option>
                             <option>Building</option>
                             <option>Furnished Apartment</option>
                             <option>Office</option>
                             <option>Shop</option>
                             <option>Villa</option>
                        </select>
                    </div>
                </div>
                <div class="row" id="market_index_bottom_row">
                    <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6 market_index_cols right_border">
                        <div class="market_index_titles">
                            6,000 EGP
                        </div>
                        <div class="market_index_content">
                            <?php echo $this->lang->line('marketindex_subtitle1'); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6 market_index_cols right_border">
                        <div class="market_index_titles">
                            12,000 EGP
                        </div>
                        <div class="market_index_content">
                            <?php echo $this->lang->line('marketindex_subtitle2'); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6 market_index_cols">
                        <div class="market_index_titles">
                            10,000 EGP
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
        // <!-- <script src="http://localhost/ColdwellBanker/js/bootstrap-select.min.js"></script>
        // <script src="http://localhost/ColdwellBanker/js/script.js"></script> -->
    </div>
        <?php include('footer.php'); ?>
    </body>
</html>
