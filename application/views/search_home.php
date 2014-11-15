 <!--<div id="emptydiv" style="float: left;"> </div>-->
    <div class="container visible-md visible-lg hidden-sm hidden-xs" id="search_home_container" style="">
    <form id="search_form" role="form" name="searchForm1" method="post" action="<?php echo base_url();?>viewAllProperties">
        <div class="search_body2">
            <div id="home">
                    <div class="container search_components2" style="margin-top: 54px;">
                        <div class="row" id="search2_title">
                            <!-- FIND A HOME --><?php echo $this->lang->line('searchhome_title'); ?>
                        </div>
                        <input type="hidden" id="url" value="<?= base_url();?>">
                        <div class="row search_top_row">
                           <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                               <select class="selectpicker" name="lob" id="searchHome_lob" data-style="btn" data-title="Select Category" data-size="5">
                                    <option value="0">Select Category</option> 
                                    <option value="1">Residential</option>
                                    <option value="2">Commercial</option>
                                    <!-- <option value="3">Auctions</option>
                                    <option value="4">Commercial Projects</option> -->
                               </select>
                           </div>
                        </div>
                        <div class="row search_top_row" id="searchHome_type_select">
                            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols" id="propertyContainer">

                            </div>
                            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols" id="disabled_property">
                                <select class="selectpicker" name="type" id="searchHome_disabled_type" data-style="btn" data-title="Select Type" data-size="5" disabled>
                                    <option value="0">Select Type</option> 
                                </select>
                            </div>
                           <!-- <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                               <select class="selectpicker" name="type" id="searchHome_type" data-style="btn" data-title="Select Type" data-size="5">
                                    <option value="0">Select Type</option> 
                                    <?php foreach ($propertyType as $index => $type): ?>
                                        <option value="<?= $index; ?>"><?= $type ?></option>
                                    <?php endforeach ?>
                               </select>
                           </div> -->
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
                               <select class="selectpicker" name="district" id="searchhome_disabled_district" data-style="btn" data-title="Select District" data-size="5" disabled>
                                  <option value="0">Select District</option> 
                               </select>
                           </div>
                       </div>
                        <div class="row search_top_row">
                           <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                               <select class="selectpicker" name="contractType" id="searchHome_contractType" data-style="btn" data-title="Select Type" data-size="5">
                                    <option value="0">Select Contract Type</option> 
                                    <?php foreach ($serviceTypes as $type): ?>
                                        <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                                    <?php endforeach ?>
                               </select>
                           </div>
                        </div>
                        <div class="row search_advanced" onclick="toggleVisibility();" style="position: relative;">
                           <!--  Advanced Search --><?php echo $this->lang->line('searchhome_advanced'); ?> <span class="caret" id="caret"></span>
                        </div>
                    </div>
                    <div class="container search_components">
                        <div class="row search_bottom_row" id="bottom_row">
                            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                               <select class="selectpicker" name="price" id="searchHome_price" data-style="btn" data-title="Select Price" data-size="5">
                                    <option value="0">Select Price</option>
                                    <option value="100000 - 250000">100,000 - 250,000</option>
                                    <option value="250000 - 500000">250,000 - 500,000</option>
                                    <option value="500000 - 750000">500,000 - 750,000</option>
                                    <option value="750000 - 1000000">750,000 - 1,000,000</option>
                                    <option value="1000000 - 5000000">1,000,000 - 5,000,000</option>
                                    <option value="5000000 - 20000000">5,000,000 - 20,000,000</option>
                                    <option value="20000000">20,000,000+</option>
                               </select>
                           </div>
                        </div>
                        <div class="row search_bottom_row">
                           <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols search_cols_margin">
                               <select class="selectpicker" name="area" id="searchHome_area" data-style="btn" data-title="Select Price" data-size="5">
                                    <option value="0">Select Area</option>
                                    <option value="50 - 100">50 - 100 m<sup>2</sup></option>
                                    <option value="100 - 130">100 - 130 m<sup>2</sup></option>
                                    <option value="130 - 150">130 - 150 m<sup>2</sup></option>
                                    <option value="150 - 170">150 - 170 m<sup>2</sup></option>
                                    <option value="170 - 200">170 - 200 m<sup>2</sup></option>
                                    <option value="200 - 300">200 - 300 m<sup>2</sup></option>
                                    <option value="300 - 350">300 - 350 m<sup>2</sup></option>
                                    <option value="350 - 400">350 - 400 m<sup>2</sup></option>
                                    <option value="400 - 1000">400 - 1000 m<sup>2</sup></option>
                               </select>
                           </div>
                       </div>
                       <input type="hidden" name="districtName" value="">
                       <div class="row" style="width: 150px;margin: auto;">
                           <div class="col-lg-12">
                                <!-- <input type="submit" class="btn btn-default search_btn_submit2" value="<?php echo $this->lang->line('searchhome_button'); ?>" name="searchSubmit1"/> -->
                                <button type="submit" class="btn btn-default search_btn_submit2" style="" name="searchSubmit1"><?php echo $this->lang->line('searchhome_button'); ?></button>
                           </div>
                       </div>
                    </div>
            </div>
        </div>
        <input type="hidden" name="districtName" value="">
            <input type="hidden" name="lob_selected" id="lob_selected" value="">
    </form>
    </div>
    <script src="<?php echo base_url(); ?>application/static/js/bootstrap-select.min.js"></script>
    <script>
        $(function () {
          $('#search_tabs a:first').tab('show');
//          $('.selectpicker').selectpicker();
        });

    </script>