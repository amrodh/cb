<div style="width: 100%;">
    <!-- <form id="property_alert_form"> -->
        <div id="property_alert_header">
            <ul class="nav nav-tabs nav-justified property_alert_box" id="property_alert_tabs">
               <li class="active"><a href="#alert" data-toggle="tab">PROPERTY ALERT</a></li>
            </ul>
        </div>
        <div class="tab-content property_alert_body">
            <div class="tab-pane active" id="home">
                <div class="container property_alert_components">
                   <div class="row property_alert_top_row">
                        <div class="col-xs-12 col-lg-3 col-md-3 col-sm-6 property_alert_cols">
                            <div class="property_alert_col_title title_margin" id="property_alert_title_district">
                                City
                            </div>
                            <select class="selectpicker" id="propertyAlert_city" data-style="btn" data-title="Select City">
                                <option value="0">Select City</option>
                                <option>Cairo</option>
                                <option>Giza</option>
                                <option>Alexandria</option>
                                <option>Tanta</option>
                                <option>Mahala</option>
                                <option>Qena</option>
                            </select>
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-3 col-sm-6 search_cols">
                           <div class="property_alert_col_title title_margin" id="property_alert_title_district">
                               District
                           </div>
                           <select class="selectpicker" id="propertyAlert_district" data-style="btn" data-title="Select District">
                                <option value="0">Select District</option>
                                <option>Mohandeseen</option>
                                <option>Maadi</option>
                                <option>Nasr City</option>
                                <option>Heliopolis</option>
                           </select>
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-3 col-sm-6 search_cols">
                           <div class="property_alert_col_title title_margin">
                               Contract Type
                           </div>
                           <select class="selectpicker" id="propertyAlert_type" data-style="btn" data-title="Select Type">
                                <option value="0">Select Type</option> 
                                <option>Apartment</option>
                                <option>Building</option>
                                <option>Furnished Apartment</option>
                                <option>Office</option>
                                <option>Shop</option>
                                <option>Villa</option>
                           </select>
                       </div>
                       <?php if (!isset($loggedIn)): ?>
                         <div class="col-xs-12 col-lg-3 col-md-3 col-sm-6 search_cols">
                            <div class="property_alert_col_title title_margin">
                                E-mail
                            </div>
                            <input type="text" name="alert_email" id="alert_email" placeholder="Your E-mail"/>
                        </div>
                        <?php endif ?>
                      
                   </div>
                    <div class="row property_alert_advanced" onclick="toggleVisibility2();" style="position: relative; width: 132px;">
                        Advanced Filters <span id="property_alert_caret" class="caret"></span>
                    </div>
                    <button type="submit" class="visible-lg visible-md btn btn-default property_alert_btn_submit propertyAlertButton" style="position: absolute;margin-left: 71.5%;margin-top: 17px;">Notify Me</button>
                     
                </div>
                <div class="container property_alert_components">
                    <div class="row property_alert_bottom_row">
                        <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4 search_cols">
                            <div class="property_alert_col_title title_margin">
                                Price Range
                            </div>
                            <select class="selectpicker" id="propertyAlert_price" data-style="btn" data-title="Select Price">
                                <option value="0">Select Price</option>
                                <option>100,000 - 250,000</option>
                                <option>250,000 - 500,000</option>
                                <option>500,000 - 750,000</option>
                                <option>750,000 - 1,000,000</option>
                                <option>1,000,000 - 2,000,000</option>
                                <option>2,000,000 - 5,000,000</option>
                           </select>
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4 search_cols search_cols_margin">
                           <div class="property_alert_col_title title_margin">
                               Area Range
                           </div>
                           <select class="selectpicker" id="propertyAlert_area" data-style="btn" data-title="Select Price">
                                <option value="0">Select Area</option>
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
                    <input type="hidden" id="tmp__nm" value="<?php if(isset($loggedIn)) echo $user->username; ?>">
                    <div class="visible-xs visible-sm row" style="width: 150px;margin: auto;">
                        <div class="col-lg-12">
                             <button type="button"  class="btn btn-default property_alert_btn_submit2 propertyAlertButton">Notify Me</button>
                        </div>
                    </div>
                    <div class="row" style="width: 52%;margin: auto;clear:both;">
                        <div class="alert alert-danger hide" id="propertyAlertError" role="alert">
                            City, District and Contract Type are required
                        </div>
                    </div>
                    <div class="row" style="width: 52%;margin: auto;clear:both;">
                        <div class="alert alert-success hide" id="propertyAlertSuccess" role="alert">
                            Subscribed successfully
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </form> -->
    </div>
    <script>
//        $(function () {
//          $('#search_tabs a:first').tab('show');
//        });
    </script>