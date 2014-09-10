<?php include('header.php'); ?>
        <div class="container shareproperty_main_div">
            <div class="shareproperty_top_div">
                <?php echo $this->lang->line('shareproperty_title'); ?>
            </div>
            <?php if(isset($insertProcess) && $insertProcess) : ?>
                <div class="row"  style="width: 70%;margin-left:32%;margin-top:2%;">
                    <div class="alert alert-success" role="alert">
                        Property inserted successfully.
                    </div>
                </div>
            <?php endif ?>

            <?php if(isset($insertProcess) && !$insertProcess) : ?>
                <div class="row"  style="width: 70%;margin-left:32%;margin-top:2%;">
                    <div class="alert alert-danger" role="alert">
                        Property insertion failed, Please try again.
                    </div>
                </div>
            <?php endif ?>

            <?php if (isset($loggedIn)): ?>
                <?php if (isset($is_valid)): ?>
                    <div id="properties_bottom_div">
                        <div class="container" id="shareproperty_bottom_inner_div">
                            <div class="shareproperty_title">
                                <?php echo $this->lang->line('shareproperty_subtitle'); ?>
                            </div>
                            <form role="form" name="shareForm"  method="post" action="" enctype="multipart/form-data">
                            <div class="shareproperty_content">
                                <div class="row">
                                    <div class="col-xs-12 col-lg-3 col-md-6 col-sm-6 search_cols search_cols_margin">
                                        <div class="shareproperty_titles title_margin">
                                            <?php echo $this->lang->line('shareproperty_input1'); ?>
                                        </div>
                                        <select class="selectpicker" data-style="btn" data-title="Select Price">
                                             <option <?php if (isset($params)){ if($params['area'] == '50'){ ?>selected="true" <?php };} ?> value="50">50 m<sup>2</sup></option>
                                             <option <?php if (isset($params)){ if($params['area'] == '100'){ ?>selected="true" <?php };} ?> value="100">100 m<sup>2</sup></option>
                                             <option <?php if (isset($params)){ if($params['area'] == '130'){ ?>selected="true" <?php };} ?> value="130">130 m<sup>2</sup></option>
                                             <option <?php if (isset($params)){ if($params['area'] == '150'){ ?>selected="true" <?php };} ?> value="150">150 m<sup>2</sup></option>
                                             <option <?php if (isset($params)){ if($params['area'] == '170'){ ?>selected="true" <?php };} ?> value="170">170 m<sup>2</sup></option>
                                             <option <?php if (isset($params)){ if($params['area'] == '200'){ ?>selected="true" <?php };} ?> value="200">200 m<sup>2</sup></option>
                                             <option <?php if (isset($params)){ if($params['area'] == '300'){ ?>selected="true" <?php };} ?> value="300">300 m<sup>2</sup></option>
                                             <option <?php if (isset($params)){ if($params['area'] == '350'){ ?>selected="true" <?php };} ?> value="350">350 m<sup>2</sup></option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-lg-3 col-md-6 col-sm-6 search_cols search_cols_margin">
                                        <div class="shareproperty_titles title_margin">
                                            <?php echo $this->lang->line('shareproperty_input2'); ?>
                                        </div>
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
                                    <div class="col-xs-12 col-lg-3 col-md-6 col-sm-6 search_cols search_cols_margin">
                                        <div class="shareproperty_titles title_margin">
                                            <?php echo $this->lang->line('shareproperty_input3'); ?>
                                        </div>
                                        <select class="selectpicker" data-style="btn" data-title="Select Price">
                                             <option>إختار السعر</option>
                                             <option <?php if (isset($params)){ if($params['price'] == '100,000 - 250,000'){ ?>selected="true" <?php }} ?> value="100,000 - 250,000">100,000 - 250,000</option>
                                             <option <?php if (isset($params)){ if($params['price'] == '250,000 - 500,000'){ ?>selected="true" <?php }} ?> value="250,000 - 500,000">250,000 - 500,000</option>
                                             <option <?php if (isset($params)){ if($params['price'] == '500,000 - 750,000'){ ?>selected="true" <?php }} ?> value="500,000 - 750,000">500,000 - 750,000</option>
                                             <option <?php if (isset($params)){ if($params['price'] == '750,000 - 1,000,000'){ ?>selected="true" <?php }} ?> value="750,000 - 1,000,000">750,000 - 1,000,000</option>
                                             <option <?php if (isset($params)){ if($params['price'] == '1,000,000 - 2,000,000'){ ?>selected="true" <?php }} ?> value="1,000,000 - 2,000,000">1,000,000 - 2,000,000</option>
                                             <option <?php if (isset($params)){ if($params['price'] == '2,000,000 - 5,000,000'){ ?>selected="true" <?php }} ?> value="2,000,000 - 5,000,000">2,000,000 - 5,000,000</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-lg-3 col-md-6 col-sm-6 search_cols search_cols_margin">
                                        <div class="shareproperty_titles title_margin" id="search_title_district">
                                            <?php echo $this->lang->line('shareproperty_input4'); ?>
                                        </div>
                                        <select class="selectpicker" data-style="btn" data-title="Select City" id="shareProperty_city" name="city" data-size="5">
                                             <option value="0">Select City</option>
                                            <?php foreach ($cities as $city): ?>
                                                <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px;">
                                    <div id="shareProperty_districtContainer">
                                     
                                    </div>
                                    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols search_cols_margin">
                                        <div class="shareproperty_titles title_margin" id="search_title_district">
                                            <?php echo $this->lang->line('shareproperty_input6'); ?>
                                        </div>
                                        <textarea class="form-control" rows="2" name="address" id="address"></textarea>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols">
                                        <label for="features" class="shareproperty_titles"><?php echo $this->lang->line('shareproperty_input7'); ?></label>
                                        <textarea class="form-control" rows="3" name="features" id="features" value="<?php if(isset($params)) echo $params['features']; ?>"><?php if(isset($params)) echo $params['features']; ?></textarea>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols">
                                        <div class="form-group">
                                            <label for="uploadimage" class="shareproperty_titles"><?php echo $this->lang->line('shareproperty_input8'); ?></label>
                                            <input type="file" name="img[]"  multiple="multiple">
                                            <p style="font-size:11px;margin-top:1%;">يمكنك إختيار صور متعددة</p>
                                        </div>
                                    </div>
                                </div>
                                <?php if (isset($insertError)) :?>
                                <div class="row" style="width: 70%;margin-left:32%;margin-top:2%;">
                                    <div class="alert alert-danger" role="alert">
                                       <?= $insertError; ?>
                                    </div>
                                </div>
                                <?php endif ?>
                                <div class="row" style="width: 13%; margin: auto; margin-top: 20px;">
                                    <input type="submit" class="btn btn-default share_btn_submit" value="<?php echo $this->lang->line('shareproperty_button'); ?>" name="submit">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="row" style="margin:4%;clear:both;">
                        <div class="col-lg-12 alert alert-warning" style="width:100%;text-align:center;font-size:14px;" role="alert">
                           يجب التحقق من صحة الحساب عن طريق الدخول على البريد الالكتروني وتأكيد الحساب.
                        </div>
                    </div>
                    <?php endif ?>
            <?php else: ?>
                <div class="row" style="margin:4%;clear:both;">
                    <div class="col-lg-12 alert alert-warning" style="width:100%;height:40px;padding-top:1%;font-size:14px;" role="alert">
                       يجب تسجيل الدخول للاعلان عن الممتلكات
                    </div>
                </div>
            <?php endif ?>
        </div>
        <!-- // <script type="text/javascript" src="http://localhost/ColdwellBanker/js/script.js"></script> -->
        <?php include('footer.php');