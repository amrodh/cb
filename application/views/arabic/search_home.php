  <div class="container hidden-sm hidden-xs" id="search_home_container" style="">
    <form id="search_form">
        <div class="search_body2">
            <div id="home">
                <div class="container search_components2" style="margin-top: 54px;">
                    <div class="row" id="search2_title">
                        العثور على منزل
                    </div>
                    <div class="row search_top_row">
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
                           <select class="selectpicker" data-style="btn" data-title="Select Type">
                                <option>إختار النوع</option> 
                                <option>شقة</option>
                                <option>بناء</option>
                                <option>شقة مفروشة</option>
                                <option>مكتب</option>
                                <option>محل</option>
                                <option>فيلا</option>
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
                           <select class="selectpicker" data-style="btn" data-title="Select Type">
                                <option>إختار نوع العقد</option> 
                                <option>شقة</option>
                                <option>بناء</option>
                                <option>شقة مفروشة</option>
                                <option>مكتب</option>
                                <option>محل</option>
                                <option>فيلا</option>
                           </select>
                       </div>
                    </div>
                    <div class="row search_advanced" onclick="toggleVisibility();" style="position: relative;">
                        بحث بالتفصيل <span class="caret"></span>
                    </div>
                </div>
                <div class="container search_components">
                    <div class="row search_bottom_row" id="bottom_row">
                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols">
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
                    </div>
                    <div class="row search_bottom_row">
                       <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 search_cols search_cols_margin">
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
                   <div class="row" style="width: 150px;margin: auto;">
                       <div class="col-lg-12">
                            <button type="submit" class="btn btn-default search_btn_submit2" style="" onclick="redirect();">بحث</button>
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
