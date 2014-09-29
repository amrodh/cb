<div class="container" style="width: 65%;">
    <form id="search_form">
        <div id="search_header">
            <ul class="nav nav-tabs nav-justified search_box" id="search_tabs">
               <li class="active"><a href="#home" data-toggle="tab"><?php echo $this->lang->line('search_tab1'); ?></a></li>
               <li><a href="#residentials" data-toggle="tab"><?php echo $this->lang->line('search_tab2'); ?></a></li>
               <li><a href="#commercials" data-toggle="tab"><?php echo $this->lang->line('search_tab3'); ?></a></li>
            </ul>
        </div>
        <div class="tab-content search_body">
            <div class="tab-pane active" id="home">
                <div class="container search_components">
                   <div class="row search_top_row">
                        <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 search_cols">
                           <div class="search_box_col_title title_margin" id="search_title_district">
                               <?php echo $this->lang->line('search_drpdwn1'); ?>
                           </div>
                            <select class="selectpicker" id="search_city_1" name="city_1" data-style="btn" data-title="Select City" data-size="5">
                                <option value="0">Select City</option>
                                <?php foreach ($cities as $city): ?>
                                    <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                <?php endforeach ?>
                           </select>
                       </div>
                       <div id="districtContainer_1">
                         
                       </div>
                       <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 search_cols" id="disabled_district_1">
                           <div class="search_box_col_title title_margin" id="disabled_district_title_1">
                               <?php echo $this->lang->line('search_drpdwn2'); ?>
                           </div>
                           <select class="selectpicker" id="search_disabled_district_1" data-style="btn" data-title="Select District" data-size="5" disabled>
                              <option>Select District</option> 
                           </select>
                       </div>
                       <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 search_cols">
                           <div class="search_box_col_title title_margin">
                               <?php echo $this->lang->line('search_drpdwn3'); ?>
                           </div>
                           <select class="selectpicker" data-style="btn" data-title="Select Type" data-size="5">
                                <option value="0">إختار النوع</option> 
                                <?php $count = 0; ?>
                                <?php foreach ($propertyType1 as $type): ?>
                                    <option value="<?= $count ?>"><?= $type ?></option>
                                <?php $count++ ?>
                                <?php endforeach ?>
                           </select>
                       </div>
                   </div>
                    <div class="row search_advanced" onclick="toggleVisibility();" style="position: relative; width: 132px;">
                        <?php echo $this->lang->line('searchhome_advanced'); ?><span class="caret"></span>
                    </div>
                    <button type="submit" class="hidden-sm hidden-xs btn btn-default search_btn_submit" style="position: absolute;margin-left: 45%;margin-top: 17px;" onclick="redirect();">بحث</button>
                </div>
                <div class="container search_components">
                    <div class="row search_bottom_row" id="bottom_row">
                        <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 search_cols">
                           <div class="search_box_col_title title_margin">
                               <?php echo $this->lang->line('search_drpdwn5'); ?>
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
                       <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 search_cols search_cols_margin">
                           <div class="search_box_col_title title_margin">
                               <?php echo $this->lang->line('search_drpdwn6'); ?>
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
                   <div class="hidden-lg hidden-md row" style="width: 150px;margin: auto;">
                       <div class="col-lg-12">
                            <button type="submit" class="btn btn-default search_btn_submit2" style="" onclick="redirect();"><?php echo $this->lang->line('search_button'); ?></button>
                       </div>
                   </div>
                </div>
            </div>
            <div class="tab-pane" id="residentials">
                <div class="container search_components">
                   <div class="row search_top_row">
                        <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                           <div class="search_box_col_title title_margin" id="search_title_district">
                               <?php echo $this->lang->line('search_drpdwn1'); ?>
                           </div>
                            <select class="selectpicker" id="search_city_2" name="city_2" data-style="btn" data-title="Select City" data-size="5">
                                <option value="0">Select City</option>
                                <?php foreach ($cities as $city): ?>
                                    <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                       </div>
                       <!-- <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                           <div class="search_box_col_title title_margin" id="search_title_district">
                               المنطقة
                           </div>
                           
                       </div> -->
                       <div id="districtContainer_2">
                         
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols" id="disabled_district_2">
                           <div class="search_box_col_title title_margin" id="disabled_district_title_2">
                               <?php echo $this->lang->line('search_drpdwn2'); ?>
                           </div>
                           <select class="selectpicker" id="search_disabled_district_2" data-style="btn" data-title="Select District" data-size="5" disabled>
                              <option>Select District</option> 
                           </select>
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                           <div class="search_box_col_title title_margin">
                               <?php echo $this->lang->line('search_drpdwn3'); ?>
                           </div>
                           <select class="selectpicker" data-style="btn" data-title="Select Type" data-size="5">
                                <option value="0">إختار النوع</option> 
                                <?php $count = 0; ?>
                                <?php foreach ($propertyType1 as $type): ?>
                                    <option value="<?= $count ?>"><?= $type ?></option>
                                <?php $count++ ?>
                                <?php endforeach ?>
                           </select>
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                           <div class="search_box_col_title title_margin">
                              <?php echo $this->lang->line('search_drpdwn4'); ?>
                           </div>
                           <select class="selectpicker" data-style="btn" data-title="Select Type" data-size="5">
                                <option value="0">إختار النوع</option> 
                                <?php foreach ($serviceTypes as $type): ?>
                                    <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                                <?php endforeach ?>
                           </select>
                       </div>
                   </div>
                    
                    <div class="row search_advanced" onclick="toggleVisibility();" style="position: relative; width: 132px;">
                        <?php echo $this->lang->line('searchhome_advanced'); ?>  <span class="caret"></span>
                    </div>
                    <button type="submit" class="hidden-sm hidden-xs btn btn-default search_btn_submit" style="position: absolute;margin-left: 45%;margin-top: 17px;" onclick="redirect();"><?php echo $this->lang->line('search_button'); ?></button>
                </div>
                <div class="container search_components">
                    <div class="row search_bottom_row" id="bottom_row">
                        <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4 search_cols">
                           <div class="search_box_col_title title_margin">
                               <?php echo $this->lang->line('search_drpdwn5'); ?>
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
                       <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 search_cols search_cols_margin">
                           <div class="search_box_col_title title_margin">
                               <?php echo $this->lang->line('search_drpdwn6'); ?>
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
                   <div class="hidden-lg hidden-md row" style="width: 150px;margin: auto;">
                       <div class="col-lg-12">
                            <button type="submit" class="btn btn-default search_btn_submit2" style="" onclick="redirect();"><?php echo $this->lang->line('search_button'); ?></button>
                       </div>
                   </div>
                </div>
            </div>
            <div class="tab-pane" id="commercials">
                <div class="container search_components">
                   <div class="row search_top_row">
                        <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                           <div class="search_box_col_title title_margin" id="search_title_district">
                               <?php echo $this->lang->line('search_drpdwn1'); ?>
                           </div>
                            <select class="selectpicker" id="search_city_3" name="city_3" data-style="btn" data-title="Select City" data-size="5">
                                <option value="0">Select City</option>
                                <?php foreach ($cities as $city): ?>
                                    <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                       </div>
                       <div id="districtContainer_3">
                         
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols" id="disabled_district_3">
                           <div class="search_box_col_title title_margin" id="disabled_district_title_3">
                               <?php echo $this->lang->line('search_drpdwn2'); ?>
                           </div>
                           <select class="selectpicker" id="search_disabled_district_3" data-style="btn" data-title="Select District" data-size="5" disabled>
                              <option>Select District</option> 
                           </select>
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                           <div class="search_box_col_title title_margin">
                               <?php echo $this->lang->line('search_drpdwn3'); ?>
                           </div>
                           <select class="selectpicker" data-style="btn" data-title="Select Type" data-size="5">
                                <option value="0">إختار النوع</option> 
                                <?php $count = 0; ?>
                                <?php foreach ($propertyType2 as $type): ?>
                                    <option value="<?= $count ?>"><?= $type ?></option>
                                <?php $count++ ?>
                                <?php endforeach ?>
                           </select>
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                           <div class="search_box_col_title title_margin">
                              <?php echo $this->lang->line('search_drpdwn4'); ?>
                           </div>
                           <select class="selectpicker" data-style="btn" data-title="Select Type" data-size="5">
                                <option value="0">إختار النوع</option> 
                                <?php foreach ($serviceTypes as $type): ?>
                                    <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                                <?php endforeach ?>
                           </select>
                       </div>
                   </div>
                    
                    <div class="row search_advanced" onclick="toggleVisibility();" style="position: relative; width: 132px;">
                        <?php echo $this->lang->line('searchhome_advanced'); ?><span class="caret"></span>
                    </div>
                    <button type="submit" class="hidden-sm hidden-xs btn btn-default search_btn_submit" style="position: absolute;margin-left: 45%;margin-top: 17px;" onclick="redirect();">بحث</button>
                </div>
                <div class="container search_components">
                    <div class="row search_bottom_row" id="bottom_row">
                        <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4 search_cols">
                           <div class="search_box_col_title title_margin">
                               <?php echo $this->lang->line('search_drpdwn5'); ?>
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
                       <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 search_cols search_cols_margin">
                           <div class="search_box_col_title title_margin">
                               <?php echo $this->lang->line('search_drpdwn6'); ?>
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
                   <div class="hidden-lg hidden-md row" style="width: 150px;margin: auto;">
                       <div class="col-lg-12">
                            <button type="submit" class="btn btn-default search_btn_submit2" style="" onclick="redirect();"><?php echo $this->lang->line('search_button'); ?></button>
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
