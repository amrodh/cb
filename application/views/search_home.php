 <!--<div id="emptydiv" style="float: left;"> </div>-->
    <div class="container visible-md visible-lg hidden-sm hidden-xs" id="search_home_container" style="">
    <form id="search_form">
        <div class="search_body2">
            <div id="home">
                <div class="container search_components2" style="margin-top: 54px;">
                    <div class="row" id="search2_title">
                        <!-- FIND A HOME --><?php echo $this->lang->line('searchhome_title'); ?>
                    </div>
                    <input type="hidden" id="url" value="<?= base_url();?>">
                    <div class="row search_top_row">
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                           <select class="selectpicker" name="type" id="searchHome_type" data-style="btn" data-title="Select Type">
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
                    <div class="row search_top_row">
                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                            <select class="selectpicker" name="city" id="searchHome_city" data-style="btn" data-title="Select City" data-size="5">
                                <option value="0">Select City</option>
                                <?php foreach ($cities as $city): ?>
                                    <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                       </div>
                    </div>
                    <div class="row search_top_row">
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols" id="districtContainer">

                       </div>
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols" id="disabled_district">
                           <select class="selectpicker" id="searchhome_disabled_district" data-style="btn" data-title="Select District" data-size="5" disabled>
                              <option>Select District</option> 
                           </select>
                       </div>
                   </div>
                    <div class="row search_top_row">
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                           <select class="selectpicker" name="contractType" id="searchHome_contractType" data-style="btn" data-title="Select Type">
                                <option>Select Contract Type</option> 
                                <option>Apartment</option>
                                <option>Building</option>
                                <option>Furnished Apartment</option>
                                <option>Office</option>
                                <option>Shop</option>
                                <option>Villa</option>
                           </select>
                       </div>
                    </div>
                    <div class="row search_advanced" onclick="toggleVisibility();" style="position: relative;">
                       <!--  Advanced Search --><?php echo $this->lang->line('searchhome_advanced'); ?> <span class="caret"></span>
                    </div>
                </div>
                <div class="container search_components">
                    <div class="row search_bottom_row" id="bottom_row">
                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                           <select class="selectpicker" name="price" id="searchHome_price" data-style="btn" data-title="Select Price">
                                <option>Select Price</option>
                                <option>100,000 - 250,000</option>
                                <option>250,000 - 500,000</option>
                                <option>500,000 - 750,000</option>
                                <option>750,000 - 1,000,000</option>
                                <option>1,000,000 - 2,000,000</option>
                                <option>2,000,000 - 5,000,000</option>
                           </select>
                       </div>
                    </div>
                    <div class="row search_bottom_row">
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols search_cols_margin">
                           <select class="selectpicker" name="area" id="searchHome_area" data-style="btn" data-title="Select Price">
                                <option>Select Area</option>
                                <option>50 - 100 m<sup>2</sup></option>
                                <option>100 - 130 m<sup>2</sup></option>
                                <option>130 - 150 m<sup>2</sup></option>
                                <option>150 - 170 m<sup>2</sup></option>
                                <option>170 - 200 m<sup>2</sup></option>
                                <option>200 - 300 m<sup>2</sup></option>
                                <option>300 - 350 m<sup>2</sup></option>
                                <option>350 - 400 m<sup>2</sup></option>
                           </select>
                       </div>
                   </div>
                   <div class="row" style="width: 150px;margin: auto;">
                       <div class="col-lg-12">
                            <button type="submit" class="btn btn-default search_btn_submit2" style="" onclick="redirect();"><?php echo $this->lang->line('searchhome_button'); ?></button>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    <script src="<?php echo base_url(); ?>application/static/js/bootstrap-select.min.js"></script>
    <script>
        $(function () {
          $('#search_tabs a:first').tab('show');
//          $('.selectpicker').selectpicker();
        });
    </script>