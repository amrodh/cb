      <div id="property_alert_header">
            <ul class="nav nav-tabs nav-justified property_alert_box" id="property_alert_tabs">
               <li class="active">
                  <a href="#alert" data-toggle="tab" style="color:#eb7f00!important;">
                      <span style="color:#eb7f00;" id"notifier"><b>
                          <span class="glyphicon glyphicon-bell"></span>
                      </span>
                      <?php echo $this->lang->line('propertyalert_title'); ?>
                  </a>
               </li>
            </ul>
        </div>
        <div class="tab-content property_alert_body">
            <div class="tab-pane active" id="home">
                <div class="container property_alert_components">
                   <div class="row property_alert_top_row">
                        <div class="col-xs-12 col-lg-3 col-md-3 col-sm-6 property_alert_cols">
                            <div class="property_alert_col_title title_margin" id="property_alert_title_district">
                                <?php echo $this->lang->line('propertyalert_subtitle1'); ?>
                            </div>
                            <select class="selectpicker" id="propertyAlert_city" name="alert_city" data-style="btn" data-title="Select City" data-size="5">
                                <option  value="0">اختيار المدينة</option>
                                <?php foreach ($cities as $city): ?>
                                    <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                       </div>
                       <div id="districtContainer_4">
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-3 col-sm-6 search_cols" id="disabled_district_4">
                           <div class="property_alert_col_title title_margin" id="disabled_district_title_4">
                               <?php echo $this->lang->line('search_drpdwn2'); ?>
                           </div>
                           <select class="selectpicker" id="propertyAlert_disabled_district" data-style="btn" data-title="Select District" data-size="5" disabled>
                              <option>إختار المنطقة</option> 
                           </select>
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-3 col-sm-6 search_cols">
                           <div class="property_alert_col_title title_margin">
                               <?php echo $this->lang->line('propertyalert_subtitle8'); ?>
                           </div>
                           <select class="selectpicker" id="propertyAlert_propertyType" name="alert_propertyType" data-style="btn" data-title="Select Type" data-size="5">
                                <option value="0">إختار نوع العقار</option> 
                                <?php foreach ($propertyType1 as $type): ?>
                                    <option value="<?= $type['property_name'] ?>"><?= $type['property_name'] ?></option>
                                <?php endforeach ?>
                           </select>
                       </div>
                       <?php if (!isset($loggedIn)): ?>
                         <div class="col-xs-12 col-lg-3 col-md-3 col-sm-6 search_cols">
                            <div class="property_alert_col_title title_margin">
                                <?php echo $this->lang->line('propertyalert_subtitle7'); ?>
                            </div>
                            <input type="text" name="alert_email" id="alert_email" placeholder="بريدك الأكتروني"/>
                        </div>
                        <?php endif ?>
                   </div>
                    <!-- <button type="submit" class="visible-lg visible-md btn btn-default property_alert_btn_submit" style="position: absolute; margin-right: 71.5%;">إرسال</button> -->
                    <div class="row property_alert_advanced" onclick="toggleVisibility2();" style="position: relative; width: 100%; float: right;margin-right: 0px;">
                        <?php echo $this->lang->line('searchhome_advanced'); ?><span id="caret" class="caret"></span>
                    </div>
                    <button type="submit" class="visible-lg visible-md btn btn-default property_alert_btn_submit propertyAlertButton" style="position: absolute;margin-left: 71.5%;margin-top: 17px;">إرسال</button>
                </div>
                <div class="container property_alert_components">
                    <div class="row property_alert_bottom_row">

                        <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4 search_cols">
                           <div class="property_alert_col_title title_margin">
                               <?php echo $this->lang->line('propertyalert_subtitle3'); ?>
                           </div>
                           <select class="selectpicker" data-style="btn" data-title="Select Type">
                                <option value="0">إختار نوع العقد</option> 
                                <option value="1">بيع</option>
                                <option value="2">إيجار</option>
                           </select>
                        </div>
                        <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4 search_cols">
                            <div class="property_alert_col_title title_margin">
                                <?php echo $this->lang->line('propertyalert_subtitle5'); ?>
                            </div>
                            <select class="selectpicker" data-style="btn" data-title="Select Price">
                                <option>إختار السعر</option>
                                <option value="100000 - 250000">100,000 - 250,000</option>
                                <option value="250000 - 500000">250,000 - 500,000</option>
                                <option value="500000 - 750000">500,000 - 750,000</option>
                                <option value="750000 - 1000000">750,000 - 1,000,000</option>
                                <option value="1000000 - 2000000">1,000,000 - 2,000,000</option>
                                <option value="2000000 - 5000000">2,000,000 - 5,000,000</option>
                                <option value="20000000">20,000,000+</option>
                           </select>
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4 search_cols search_cols_margin">
                           <div class="property_alert_col_title title_margin">
                               <?php echo $this->lang->line('propertyalert_subtitle6'); ?>
                           </div>
                           <select class="selectpicker" data-style="btn" data-title="Select Price">
                                <option>إختار المساحة</option>
                                <option value="<50"> &#60;50 &sup2;</option>
                                <option value="100 - 200">100 - 200 m&sup2;</option>
                                <option value="200 - 300">200 - 300 m&sup2;</option>
                                <option value="300 - 400">300 - 400 m&sup2;</option>
                                <option value="400 - 500">400 - 500 m&sup2;</option>
                                <option value=">500"> &#62;500 m&sup2;</option>
                                
                           </select>
                       </div>
                   </div>
                   <input type="hidden" id="tmp__nm" value="<?php if(isset($loggedIn)) echo $user->username; ?>">
                    <div class="visible-xs visible-sm row" style="width: 150px;margin: auto;">
                        <div class="col-lg-12">
                             <button type="button" class="btn btn-default property_alert_btn_submit2 propertyAlertButton"><?php echo $this->lang->line('propertyalert_button'); ?></button>
                        </div>
                    </div>
                    <div class="row" style="width: 52%;margin: auto;clear:both;">
                        <div class="alert alert-danger hide" id="propertyAlertError" role="alert">
                            <?php echo $this->lang->line('propertyAlert_missing_data'); ?>
                        </div>
                    </div>
                    <div class="row" style="width: 52%;margin: auto;clear:both;">
                        <div class="alert alert-success hide" id="propertyAlertSuccess" role="alert">
                            <?php echo $this->lang->line('propertyAlert_success'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
