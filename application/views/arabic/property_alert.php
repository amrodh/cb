<div style="width: 100%;">
    <form id="property_alert_form">
        <div id="property_alert_header">
            <ul class="nav nav-tabs nav-justified property_alert_box" id="property_alert_tabs">
               <li class="active">
                  <a href="#alert" data-toggle="tab" style="padding: 6%;">
                      <span style="color:orange;" id"notifier"><b>
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
                              <option>Select District</option> 
                           </select>
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-3 col-sm-6 search_cols">
                           <div class="property_alert_col_title title_margin">
                               <?php echo $this->lang->line('propertyalert_subtitle3'); ?>
                           </div>
                           <select class="selectpicker" data-style="btn" data-title="Select Type">
                                <option value="0">إختار نوع العقد</option> 
                                <?php foreach ($serviceTypes as $type): ?>
                                    <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
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
                    <button type="submit" class="visible-lg visible-md btn btn-default property_alert_btn_submit" style="position: absolute; margin-right: 71.5%;">إرسال</button>
                    <div class="row property_alert_advanced" onclick="toggleVisibility2();" style="position: relative; width: 132px; float: right;margin-right: 0px;">
                        <?php echo $this->lang->line('searchhome_advanced'); ?><span id="property_alert_caret" class="caret"></span>
                    </div>
                </div>
                <div class="container property_alert_components">
                    <div class="row property_alert_bottom_row">
                        <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4 search_cols">
                            <div class="property_alert_col_title title_margin">
                                <?php echo $this->lang->line('propertyalert_subtitle5'); ?>
                            </div>
                            <select class="selectpicker" data-style="btn" data-title="Select Price">
                                <option>إختار السعر</option>
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
                               <?php echo $this->lang->line('propertyalert_subtitle6'); ?>
                           </div>
                           <select class="selectpicker" data-style="btn" data-title="Select Price">
                                <option>إختار المساحة</option>
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
                             <button type="submit" class="btn btn-default property_alert_btn_submit2 propertyAlertButton"><?php echo $this->lang->line('propertyalert_button'); ?></button>
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
    </form>
    </div>
