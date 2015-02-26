<div class="container" style="width: 90%;">
    <div id="search_header">
        <ul class="nav nav-tabs nav-justified search_box" id="search_tabs">
           <!-- <li class="active"><a href="#home" data-toggle="tab"><?php echo $this->lang->line('search_tab1'); ?></a></li> -->
          <li <?php if(isset($_GET['lob']) && $_GET['lob'] == 1) echo 'class="active"'; ?> <?php if(isset($_GET['lob']) && $_GET['lob'] == 0) echo 'class="active"'; ?>>
              <a href="#residentials" data-toggle="tab"><?php echo $this->lang->line('search_tab2'); ?></a>
          </li>
          <li <?php if(isset($_GET['lob']) && ($_GET['lob'] == 2 || $_GET['lob'] == 4)) echo 'class="active"'; ?>>
              <a href="#commercials" data-toggle="tab"><?php echo $this->lang->line('search_tab3'); ?></a>
          </li>
        </ul>
    </div>
    <div class="tab-content search_body">
        <div class="tab-pane <?php if(isset($_GET['lob']) && $_GET['lob'] == 1) echo 'active'; ?> <?php if(isset($_GET['lob']) && $_GET['lob'] == 0) echo 'active'; ?>" id="residentials">
            <form id="search_form3" role="form" name="searchForm3" method="get" action="<?php echo base_url();?>en/viewAllProperties">
                <!-- <input type="hidden" name="districtName" value=""> -->
                <input type="hidden" name="lob" id="lob" value="1">
                <div class="container search_components">
                   <div class="row search_top_row">
                        <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                           <div class="search_box_col_title title_margin" id="search_title_district">
                               <?php echo $this->lang->line('search_drpdwn1'); ?>
                           </div>
                            <select class="selectpicker" id="search_city_2" name="city" data-style="btn" data-title="Select City" data-size="5">
                                <option value="0">Select City</option>
                                <option value="3" <?php if(isset($_GET['city']) && $_GET['lob'] == 1 && $_GET['city'] == 3) echo 'selected="selected"'; ?>>Greater Cairo</option>
                                <?php foreach ($cities as $city): ?>
                                    <?php 

                                      if(isset($_GET['city']) && $_GET['lob'] == 1 && $_GET['city'] == $city['id'])
                                        $selected = 'selected="selected"';
                                      else
                                        $selected = '';
                                     ?>
                                    <?php if ($city['name'] != 'Greater Cairo'): ?>
                                      <option value="<?= $city['id'] ?>" <?= $selected ?> ><?= $city['name'] ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                       </div>
                       <div id="districtContainer_2">
                         
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols" id="disabled_district_2">
                           <div class="search_box_col_title title_margin" id="disabled_district_title_2">
                               <?php echo $this->lang->line('search_drpdwn2'); ?>
                           </div>
                           <?php if (isset($_GET['district']) && $_GET['lob'] == 1 && $_GET['district'] != ''): ?>
                            <?php //printme($districts); ?>
                              <select class="selectpicker" id="search_disabled_district_2" name="district" data-style="btn" data-title="Select District" data-size="5">
                                  <?php foreach ($districtsCity as $district): ?>
                                      <?php if ($district['id'] == $_GET['district']): ?>
                                        <option value="<?= $district['id'] ?>" selected> <?= $district['name'] ?> </option>
                                      <?php else: ?>
                                        <option value="<?= $district['id'] ?>"> <?= $district['name'] ?> </option>
                                      <?php endif ?>
                                  <?php endforeach ?>
                              </select>
                           <?php else: ?>
                                <select class="selectpicker" id="search_disabled_district_2" name="district_disabled" data-style="btn" data-title="Select District" data-size="5" disabled>
                                    <option value="0">Select District</option> 
                                </select>
                           <?php endif ?>
                           <!-- <select class="selectpicker" id="search_disabled_district_2" name="district" data-style="btn" data-title="Select District" data-size="5">
                              <?php if (isset($_GET) && $_GET['lob'] == 1): ?>
                                <?php foreach ($districts as $district): ?>
                                  <?php if ($district['id'] == $_GET['district']): ?>
                                    <option value="<?= $district['id'] ?>"> <?= $district['name'] ?> </option>
                                  <?php endif ?>
                                <?php endforeach ?>
                              <?php else: ?>
                                <option>Select District</option> 
                              <?php endif ?>
                           </select> -->
                       </div>
                       <input type="hidden" name="project" value="">
                       <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                           <div class="search_box_col_title title_margin">
                               <?php echo $this->lang->line('search_drpdwn4'); ?>
                           </div>
                           <?php //printme($propertyType1); ?>
                           <select class="selectpicker" id="search_type_2" name="type" data-style="btn" data-title="Select Type" data-size="5">
                                <option value="0">Select Type</option> 
                                <?php foreach ($propertyType1 as $key => $type): ?>
                                   <?php 

                                      if(isset($_GET['type']) && $_GET['lob'] == 1 && $_GET['type'] == $type['property_id'])
                                        $selected = 'selected="selected"';
                                      else
                                        $selected = '';
                                    ?>
                                    <option value="<?= $type['property_id'] ?>" <?= $selected; ?>><?= $type['property_name'] ?></option>
                                <?php endforeach ?>
                           </select>
                       </div>
                       <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                           <div class="search_box_col_title title_margin">
                               <?php echo $this->lang->line('search_drpdwn3'); ?>
                           </div>
                           <select class="selectpicker" id="search_contractType_2" name="contractType" data-style="btn" data-title="Select Type" data-size="5">
                                

                                <option value="0" <?php if(isset($_GET['contractType']) && $_GET['lob'] == 1 && $_GET['contractType'] == 0) echo 'selected="selected"' ?>>Select Contract Type</option> 
                                <option value="Sale" <?php if(isset($_GET['contractType']) && $_GET['lob'] == 1 && $_GET['contractType'] == 'Sale') echo 'selected="selected"' ?>>Sale</option>
                                <option value="Rent" <?php if(isset($_GET['contractType']) && $_GET['lob'] == 1 && $_GET['contractType'] == 'Rent') echo 'selected="selected"' ?>>Rent</option>
                               
                           </select>
                       </div>
                   </div>
                    
                    <div class="row search_advanced" onclick="toggleVisibility();" style="position: relative; width: 21%;">
                        <?php echo $this->lang->line('searchhome_advanced'); ?><span class="caret" id="caret"></span>
                    </div>
                    <input type="submit" class="visible-lg visible-md btn btn-default search_btn_submit  searchButton" style="position: absolute;margin-left: 68%;margin-top: 1px;" name="searchSubmit3" value="<?php echo $this->lang->line('search_button'); ?>">
                </div>
                <div class="container search_components">
                    <div class="row search_bottom_row" id="bottom_row">
                        <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4 search_cols">
                           <div class="search_box_col_title title_margin">
                               <?php echo $this->lang->line('search_drpdwn5'); ?>
                           </div>
                           <select class="selectpicker" id="search_price_2" name="price" data-style="btn" data-title="Select Price" data-size="5">
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
                       <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 search_cols search_cols_margin">
                           <div class="search_box_col_title title_margin">
                               <?php echo $this->lang->line('search_drpdwn6'); ?>
                           </div>
                           <select class="selectpicker" id="search_area_2" name="area" data-style="btn" data-title="Select Price" data-size="5">
                                <option value="0">Select Area</option>
                                <option value="<50"> &#60;50 m<sup>2</sup></option>
                                <option value="100 - 200">100 - 200 m<sup>2</sup></option>
                                <option value="200 - 300">200 - 300 m<sup>2</sup></option>
                                <option value="300 - 400">300 - 400 m<sup>2</sup></option>
                                <option value="400 - 500">400 - 500 m<sup>2</sup></option>
                                <option value=">500"> &#62;500 m<sup>2</sup></option>
                           </select>
                       </div>
                   </div>
                   <div class="visible-xs visible-sm row" style="width: 150px;margin: auto;">
                       <div class="col-lg-12">
                            <input type="submit" class="btn btn-default search_btn_submit2 searchButton" name="searchSubmit3" value="<?php echo $this->lang->line('search_button'); ?>">
                       </div>
                   </div>
                </div>
            </form>
        </div>
        <div class="tab-pane <?php if(isset($_GET['lob']) && ($_GET['lob'] == 2 || $_GET['lob'] == 4)) echo 'active'; ?>" id="commercials">
            <form id="search_form4" role="form" name="searchForm4" method="get" action="<?php echo base_url();?>viewAllProperties">
              <!-- <input type="hidden" name="districtName" value=""> -->
              <input type="hidden" name="lob" id="lob" value="2">
              <div class="container search_components">
                 <div class="row search_top_row">
                      <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                         <div class="search_box_col_title title_margin" id="search_title_district">
                             <?php echo $this->lang->line('search_drpdwn1'); ?>
                         </div>
                          <select class="selectpicker" id="search_city_3" name="city" data-style="btn" data-title="Select City" data-size="5">
                              <option value="0">Select City</option>
                              <!-- <option value="3">Greater Cairo</option> -->
                              <option value="3" <?php if(isset($_GET['city']) && ($_GET['lob'] == 2 || $_GET['lob'] == 4) && $_GET['city'] == 3) echo 'selected="selected"'; ?>>Greater Cairo</option>
                              <?php foreach ($cities as $city): ?>
                                <?php 

                                      if(isset($_GET['city']) && ($_GET['lob'] == 2 || $_GET['lob'] == 4) && $_GET['city'] == $city['id'])
                                        $selected = 'selected="selected"';
                                      else
                                        $selected = '';
                                     ?>
                                  <?php if ($city['name'] != 'Greater Cairo'): ?>
                                    <option value="<?= $city['id'] ?>" <?= $selected ?>><?= $city['name'] ?></option>
                                  <?php endif ?>
                              <?php endforeach ?>
                          </select>
                     </div>
                     <div id="districtContainer_3">
                       
                     </div>
                     <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols" id="disabled_district_3">
                         <div class="search_box_col_title title_margin" id="disabled_district_title_3">
                             <?php echo $this->lang->line('search_drpdwn2'); ?>
                         </div>
                         <?php if (isset($_GET['district']) && ($_GET['lob'] == 2 || $_GET['lob'] == 4) && $_GET['district'] != ''): ?>
                              <select class="selectpicker" id="search_disabled_district_3" name="district_temp" data-style="btn" data-title="Select District" data-size="5">
                                  <?php foreach ($districtsCity as $district): ?>
                                      <?php if ($district['id'] == $_GET['district']): ?>
                                        <option value="<?= $district['id'] ?>" selected> <?= $district['name'] ?> </option>
                                      <?php else: ?>
                                        <option value="<?= $district['id'] ?>"> <?= $district['name'] ?> </option>
                                      <?php endif ?>
                                  <?php endforeach ?>
                              </select>
                         <?php else: ?>
                              <select class="selectpicker" id="search_disabled_district_3" name="district_disabled" data-style="btn" data-title="Select District" data-size="5" disabled>
                                  <option>Select District</option> 
                              </select>
                         <?php endif ?>
                        <!--  <select class="selectpicker" id="search_disabled_district_3" name="district" data-style="btn" data-title="Select District" data-size="5">
                            <?php if (isset($_GET) && $_GET['lob'] == 2): ?>
                                <?php foreach ($districts as $district): ?>
                                  <?php if ($district['id'] == $_GET['district']): ?>
                                    <option value="<?= $district['id'] ?>"> <?= $district['name'] ?> </option>
                                  <?php endif ?>
                                <?php endforeach ?>
                            <?php else: ?>
                                <option>Select District</option> 
                            <?php endif ?>
                         </select> -->
                     </div>
                     <input type="hidden" name="project" value="">
                     <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                         <div class="search_box_col_title title_margin">
                             <?php echo $this->lang->line('search_drpdwn4'); ?>
                         </div>
                         <select class="selectpicker" id="search_type_3" name="type" data-style="btn" data-title="Select Type" data-size="5">
                              <option value="0">Select Type</option> 
                              <?php foreach ($propertyType2 as $key => $type): ?>
                                 <?php 

                                      if(isset($_GET['type']) && ($_GET['lob'] == 2 || $_GET['lob'] == 4) && $_GET['type'] == $type['property_id'])
                                        $selected = 'selected="selected"';
                                      else
                                        $selected = '';
                                    ?>
                                    <option  value="<?= $type['property_id'] ?>" <?= $selected; ?>><?= $type['property_name'] ?></option>
                              <?php endforeach ?>
                         </select>
                     </div>
                     <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
                         <div class="search_box_col_title title_margin">
                             <?php echo $this->lang->line('search_drpdwn3'); ?>
                         </div>
                         <select class="selectpicker" id="search_contractType_3" name="contractType" data-style="btn" data-title="Select Type" data-size="5">
                               <option value="0" <?php if(isset($_GET['contractType']) && ($_GET['lob'] == 2 || $_GET['lob'] == 4) && $_GET['contractType'] == 0) echo 'selected="selected"' ?>>Select Contract Type</option> 
                                <option value="Sale" <?php if(isset($_GET['contractType']) && ($_GET['lob'] == 2 || $_GET['lob'] == 4) && $_GET['contractType'] == 'Sale') echo 'selected="selected"' ?>>Sale</option>
                                <option value="Rent" <?php if(isset($_GET['contractType']) && ($_GET['lob'] == 2 || $_GET['lob'] == 4) && $_GET['contractType'] == 'Rent') echo 'selected="selected"' ?>>Rent</option>
                         </select>
                     </div>
                 </div>
                  
                  <div class="row search_advanced" onclick="toggleVisibility();" style="position: relative;width: 30%;">
                      <?php echo $this->lang->line('searchhome_advanced'); ?><span class="caret" id="caret"></span>
                  </div>
                  <input type="submit" class="visible-lg visible-md btn btn-default search_btn_submit searchButton" style="position: absolute;margin-left: 68%;margin-top: 1px;" name="searchSubmit4" value="<?php echo $this->lang->line('search_button'); ?>">
              </div>
              <div class="container search_components">
                  <div class="row search_bottom_row" id="bottom_row">
                      <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4 search_cols">
                         <div class="search_box_col_title title_margin">
                             <?php echo $this->lang->line('search_drpdwn5'); ?>
                         </div>
                         <select class="selectpicker" id="search_price_3" name="price" data-style="btn" data-title="Select Price" data-size="5">
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
                     <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 search_cols search_cols_margin">
                         <div class="search_box_col_title title_margin">
                             <?php echo $this->lang->line('search_drpdwn6'); ?>
                         </div>
                         <select class="selectpicker" id="search_area_3" name="area" data-style="btn" data-title="Select Price" data-size="5">
                              <option value="0">Select Area</option>
                              <option value="<50"> &#60;50 m<sup>2</sup></option>
                              <option value="100 - 200">100 - 200 m<sup>2</sup></option>
                              <option value="200 - 300">200 - 300 m<sup>2</sup></option>
                              <option value="300 - 400">300 - 400 m<sup>2</sup></option>
                              <option value="400 - 500">400 - 500 m<sup>2</sup></option>
                              <option value=">500"> &#62;500 m<sup>2</sup></option>
                              <option value="1000">1000+ m<sup>2</sup></option>
                         </select>
                     </div>
                 </div>
                 <div class="visible-xs visible-sm row" style="width: 150px;margin: auto;">
                     <div class="col-lg-12">
                          <input type="submit" class="btn btn-default search_btn_submit2 searchButton" name="searchSubmit4" value="<?php echo $this->lang->line('search_button'); ?>">
                     </div>
                 </div>
              </div>
            </form>
        </div>
    </div>
</div>
    <script src="<?php echo base_url(); ?>application/static/js/bootstrap-select.min.js"></script>
    <script>
        $(function () {
           //$('.active a').tab('show');
           // $('#search_tabs a:first').tab('show');
//          $('.selectpicker').selectpicker();
        });
    </script>
