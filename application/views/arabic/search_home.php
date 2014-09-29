  <div class="container hidden-sm hidden-xs" id="search_home_container" style="">
    <form id="search_form">
        <div class="search_body2">
            <div id="home">
                <div class="container search_components2" style="margin-top: 54px;">
                    <div class="row" id="search2_title">
                        <!-- العثور على منزل --><?php echo $this->lang->line('searchhome_title'); ?>
                    </div>
                    <div class="row search_top_row">
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
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
                    <!-- <div class="row search_top_row">
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                           <select class="selectpicker" data-style="btn" data-title="Select District">
                                <option>إختار المنطقة</option>
                                <option>المهندسين</option>
                                <option>المعادي</option>
                                <option>مدينة نصر</option>
                                <option>مصر الجديدة</option>
                           </select>
                       </div>
                   </div> -->
                    <div class="row search_top_row">
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                           <select class="selectpicker" data-style="btn" data-title="Select Type" data-size="5">
                                <option value="0">إختار نوع العقد</option> 
                                <?php foreach ($serviceTypes as $type): ?>
                                    <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                                <?php endforeach ?>
                           </select>
                       </div>
                    </div>
                    <div class="row search_advanced" onclick="toggleVisibility();" style="position: relative;">
                        <!-- بحث بالتفصيل --> <?php echo $this->lang->line('searchhome_advanced'); ?><span class="caret"></span>
                    </div>
                </div>
                <div class="container search_components">
                    <div class="row search_bottom_row" id="bottom_row">
                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                           <select class="selectpicker" data-style="btn" data-title="Select Price" data-size="5">
                                <option>إختار السعر</option>
                                <option value="100000 - 250000">100,000 - 250,000</option>
                                <option value="250000 - 500000">250,000 - 500,000</option>
                                <option value="500000 - 750000">500,000 - 750,000</option>
                                <option value="750000 - 1000000">750,000 - 1,000,000</option>
                                <option value="1000000 - 2000000">1,000,000 - 2,000,000</option>
                                <option value="2000000 - 5000000">2,000,000 - 5,000,000</option>
                                <option value="5000000 - 10000000">2,000,000 - 10,000,000</option>
                           </select>
                       </div>
                    </div>
                    <div class="row search_bottom_row">
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols search_cols_margin">
                           <select class="selectpicker" data-style="btn" data-title="Select Price" data-size="5">
                                <option>إختار المساحة</option>
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
