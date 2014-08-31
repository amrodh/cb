 <!--<div id="emptydiv" style="float: left;"> </div>-->
    <div class="container visible-md visible-lg hidden-sm hidden-xs" id="search_home_container" style="">
    <form id="search_form">
        <div class="search_body2">
            <div id="home">
                <div class="container search_components2" style="margin-top: 54px;">
                    <div class="row" id="search2_title">
                        FIND A HOME
                    </div>
                    <div class="row search_top_row">
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                       <select class="form-control searchHome_select" name="type">
                          <option>Select Type</option> 
                          <option>Apartment</option>
                          <option>Building</option>
                          <option>Furnished Apartment</option>
                          <option>Office</option>
                          <option>Shop</option>
                          <option>Villa</option>
                       </select>
                           <!-- <select class="selectpicker" name="type" data-style="btn" data-title="Select Type">
                                <option>Select Type</option> 
                                <option>Apartment</option>
                                <option>Building</option>
                                <option>Furnished Apartment</option>
                                <option>Office</option>
                                <option>Shop</option>
                                <option>Villa</option>
                           </select> -->
                       </div>
                    </div>
                    <div class="row search_top_row">
                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                            <select class="form-control searchHome_select" name="city">
                                <option>Select City</option>
                                <option>Cairo</option>
                                <option>Giza</option>
                                <option>Alexandria</option>
                                <option>Tanta</option>
                                <option>Mahala</option>
                                <option>Qena</option>
                            </select>
                            <!-- <select class="selectpicker" data-style="btn" data-title="Select City">
                                <option>Select City</option>
                                <option>Cairo</option>
                                <option>Giza</option>
                                <option>Alexandria</option>
                                <option>Tanta</option>
                                <option>Mahala</option>
                                <option>Qena</option>
                            </select> -->
                       </div>
                    </div>
                    <div class="row search_top_row">
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                            <select class="form-control searchHome_select" name="district">
                                <option>Select District</option>
                                <option>Mohandeseen</option>
                                <option>Maadi</option>
                                <option>Nasr City</option>
                                <option>Heliopolis</option>
                            </select>
                           <!-- <select class="selectpicker" data-style="btn" data-title="Select District">
                                <option>Select District</option>
                                <option>Mohandeseen</option>
                                <option>Maadi</option>
                                <option>Nasr City</option>
                                <option>Heliopolis</option>
                           </select> -->
                       </div>
                   </div>
                    <div class="row search_top_row">
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                            <select class="form-control searchHome_select" name="contractType">
                                <option>Select Contract Type</option> 
                                <option>Apartment</option>
                                <option>Building</option>
                                <option>Furnished Apartment</option>
                                <option>Office</option>
                                <option>Shop</option>
                                <option>Villa</option>
                            </select>
                           <!-- <select class="selectpicker" data-style="btn" data-title="Select Type">
                                <option>Select Contract Type</option> 
                                <option>Apartment</option>
                                <option>Building</option>
                                <option>Furnished Apartment</option>
                                <option>Office</option>
                                <option>Shop</option>
                                <option>Villa</option>
                           </select> -->
                       </div>
                    </div>
                    <div class="row search_advanced" onclick="toggleVisibility();" style="position: relative;">
                        Advanced Search <span class="caret"></span>
                    </div>
                    <!--<button type="submit" class="visible-lg visible-md btn btn-default search_btn_submit" style="position: absolute;margin-left: 45%;margin-top: 17px;" onclick="redirect();">Search</button>-->
                    <!--<button type="submit" class="visible-sm visible-xs btn btn-default search_btn_submit" style="position: absolute;margin-left: 45%;margin-top: 17px;" onclick="redirect();">Search</button>-->
                </div>
                <div class="container search_components">
                    <div class="row search_bottom_row" id="bottom_row">
                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                            <select class="form-control searchHome_select" name="price">
                                <option>Select Price</option>
                                <option>100,000 - 250,000</option>
                                <option>250,000 - 500,000</option>
                                <option>500,000 - 750,000</option>
                                <option>750,000 - 1,000,000</option>
                                <option>1,000,000 - 2,000,000</option>
                                <option>2,000,000 - 5,000,000</option>
                            </select>
                           <!-- <select class="selectpicker" data-style="btn" data-title="Select Price">
                                <option>Select Price</option>
                                <option>100,000 - 250,000</option>
                                <option>250,000 - 500,000</option>
                                <option>500,000 - 750,000</option>
                                <option>750,000 - 1,000,000</option>
                                <option>1,000,000 - 2,000,000</option>
                                <option>2,000,000 - 5,000,000</option>
                           </select> -->
                       </div>
                    </div>
                    <div class="row search_bottom_row">
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols search_cols_margin">
                           <select class="form-control searchHome_select" name="area">
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
                           <!-- <select class="selectpicker" data-style="btn" data-title="Select Price">
                                <option>Select Area</option>
                                <option>50 - 100 m<sup>2</sup></option>
                                <option>100 - 130 m<sup>2</sup></option>
                                <option>130 - 150 m<sup>2</sup></option>
                                <option>150 - 170 m<sup>2</sup></option>
                                <option>170 - 200 m<sup>2</sup></option>
                                <option>200 - 300 m<sup>2</sup></option>
                                <option>300 - 350 m<sup>2</sup></option>
                                <option>350 - 400 m<sup>2</sup></option>
                           </select> -->
                       </div>
                   </div>
                   <div class="row" style="width: 150px;margin: auto;">
                       <div class="col-lg-12">
                            <button type="submit" class="btn btn-default search_btn_submit2" style="" onclick="redirect();">Search</button>
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