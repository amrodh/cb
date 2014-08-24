<div style="width: 100%;">
    <form id="property_alert_form">
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
                            <select class="selectpicker" data-style="btn" data-title="Select City">
                                <option>Select City</option>
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
                           <select class="selectpicker" data-style="btn" data-title="Select District">
                                <option>Select District</option>
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
                       <div class="col-xs-12 col-lg-3 col-md-3 col-sm-6 search_cols">
                       <!--<div style="float: left;margin-right: 126px;margin-left: 167px;">-->
                            <div class="property_alert_col_title title_margin">
                                E-mail
                            </div>
                            <input type="text" name="alert_email" id="alert_email" placeholder="Your E-mail"/>
                             <!--<input type="submit" value="Subscribe" name="btn_subscribe" id="btn_subscribe">-->
                        </div>
                   </div>
                    <div class="row property_alert_advanced" onclick="toggleVisibility2();" style="position: relative; width: 132px;">
                        Advanced Filters <span id="property_alert_caret" class="caret"></span>
                    </div>
                    <button type="submit" class="visible-lg visible-md btn btn-default property_alert_btn_submit" style="position: absolute;margin-left: 71.5%;margin-top: 17px;">Notify Me</button>
                    <!--<button type="submit" class="btn btn-default property_alert_btn_submit" style="position: absolute;">Notify Me</button>-->
                </div>
                <div class="container property_alert_components">
                    <div class="row property_alert_bottom_row">
                        <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4 search_cols">
                            <div class="property_alert_col_title title_margin">
                                Price Range
                            </div>
                            <select class="selectpicker" data-style="btn" data-title="Select Price">
                                <option>Select Price</option>
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
                           <select class="selectpicker" data-style="btn" data-title="Select Price">
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
                    <div class="visible-xs visible-sm row" style="width: 150px;margin: auto;">
                        <div class="col-lg-12">
                             <button type="submit" class="btn btn-default property_alert_btn_submit2">Notify Me</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/static/js/script.js"></script>
    <script>
//        $(function () {
//          $('#search_tabs a:first').tab('show');
//        });
    </script>