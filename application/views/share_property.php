
        <?php include('header.php'); ?>
        <div class="container shareproperty_main_div">
            <div class="shareproperty_top_div">
                <?php echo $this->lang->line('shareproperty_title'); ?>
            </div>
            <?php if(isset($insertProcess) && $insertProcess) : ?>
                <div class="row"  style="width: 94.5%;margin-left:3%;margin-top:2%;">
                    <div class="alert alert-success" role="alert" style="text-align: center;">
                        <?php echo $this->lang->line('shareProperty_success'); ?>
                    </div>
                </div>
            <?php endif ?>

            <?php if(isset($insertProcess) && !$insertProcess) : ?>
                <div class="row"  style="width: 94.5%;margin-left:3%;margin-top:2%;">
                    <div class="alert alert-danger" role="alert" style="text-align: center;">
                        <?php echo $this->lang->line('shareProperty_failure'); ?>
                    </div>
                </div>
            <?php endif ?>

            <?php if(isset($imageFlag)) : ?>
                <div class="row"  style="width: 94.5%;margin-left:3%;margin-top:2%;">
                    <div class="alert alert-danger" role="alert" style="text-align: center;">
                        Images should be of these formats: jpg, jpeg or png.
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
                                        <?php //if (isset($params)) {printme ($params);} ?>
                                        <div class="shareproperty_titles title_margin">
                                            <?php echo $this->lang->line('shareproperty_input1'); ?>
                                        </div>
                                        <select class="selectpicker" data-style="btn" data-title="Select Area" id="area" name="area">
                                             <option>Select Area</option>
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
                                            <?php echo $this->lang->line('shareproperty_input9'); ?>
                                        </div>
                                        <select class="selectpicker" data-style="btn" data-title="Select Area" id="shareProperty_lob" name="shareProperty_lob">
                                            <option value="0">Select Category</option>
                                            <option value="1">Residential</option>
                                            <option value="2">Commercial</option>
                                            <option value="3">Auctions</option>
                                            <option value="4">Commercial Projects</option>
                                        </select>
                                    </div>
                                    <div id="shareProperty_propertyContainer">
                                        
                                    </div>
                                    <div class="col-xs-12 col-lg-3 col-md-6 col-sm-6 search_cols search_cols_margin" id="shareProperty_disabled_property">
                                        <div class="shareproperty_titles title_margin">
                                            <?php echo $this->lang->line('shareproperty_input2'); ?>
                                        </div>
                                        <select class="selectpicker" data-style="btn" data-title="Select Type" name="shareProperty_type" disabled id="shareProperty_disabled_type">
                                             <option>Select Type</option> 
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-lg-3 col-md-6 col-sm-6 search_cols search_cols_margin">
                                        <div class="shareproperty_titles title_margin">
                                            <?php echo $this->lang->line('shareproperty_input3'); ?>
                                        </div>
                                        <select class="selectpicker" data-style="btn" data-title="Select Price" name="price">
                                             <option>Select Price</option>
                                             <option <?php if (isset($params)){ if($params['price'] == '100,000 - 250,000'){ ?>selected="true" <?php }} ?> value="100,000 - 250,000">100,000 - 250,000</option>
                                             <option <?php if (isset($params)){ if($params['price'] == '250,000 - 500,000'){ ?>selected="true" <?php }} ?> value="250,000 - 500,000">250,000 - 500,000</option>
                                             <option <?php if (isset($params)){ if($params['price'] == '500,000 - 750,000'){ ?>selected="true" <?php }} ?> value="500,000 - 750,000">500,000 - 750,000</option>
                                             <option <?php if (isset($params)){ if($params['price'] == '750,000 - 1,000,000'){ ?>selected="true" <?php }} ?> value="750,000 - 1,000,000">750,000 - 1,000,000</option>
                                             <option <?php if (isset($params)){ if($params['price'] == '1,000,000 - 2,000,000'){ ?>selected="true" <?php }} ?> value="1,000,000 - 2,000,000">1,000,000 - 2,000,000</option>
                                             <option <?php if (isset($params)){ if($params['price'] == '2,000,000 - 5,000,000'){ ?>selected="true" <?php }} ?> value="2,000,000 - 5,000,000">2,000,000 - 5,000,000</option>
                                             <option <?php if (isset($params)){ if($params['price'] == '5,000,000 - 20,000,000'){ ?>selected="true" <?php }} ?> value="5,000,000 - 20,000,000">5,000,000 - 20,000,000</option>
                                             <option <?php if (isset($params)){ if($params['price'] == '20,000,000+'){ ?>selected="true" <?php }} ?> value="20,000,000+">20,000,000+</option>
                                        </select>
                                    </div>
                                    <!-- <div class="col-xs-12 col-lg-3 col-md-6 col-sm-6 search_cols search_cols_margin">
                                        <div class="shareproperty_titles title_margin" id="search_title_district">
                                            <?php echo $this->lang->line('shareproperty_input4'); ?>
                                        </div>
                                        <select class="selectpicker" data-style="btn" data-title="Select City" id="shareProperty_city" name="city" data-size="5">
                                             <option value="0">Select City</option>
                                            <?php foreach ($cities as $city): ?>
                                                <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>

                                    </div> -->
                                </div>
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols search_cols_margin">
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
                                    <div id="shareProperty_districtContainer">
                                     
                                    </div>
                                    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols search_cols_margin" id="disabled_district_5">
                                        <div class="shareproperty_titles title_margin" id="search_title_district">
                                            District
                                        </div>
                                        <select class="selectpicker" data-style="btn" id="shareProperty_disabled_district" data-title="Select District" data-size="5" disabled>
                                             <option>Select District</option>
                                             <?php foreach ($districts as $item): ?>
                                            <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols search_cols_margin">
                                        <div class="shareproperty_titles title_margin" id="search_title_district">
                                            <?php echo $this->lang->line('shareproperty_input6'); ?>
                                        </div>
                                        <textarea class="form-control" rows="3" name="address" id="address" value="<?php if(isset($params)) echo $params['address']; ?>"><?php if(isset($params)) echo $params['address']; ?></textarea>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols">
                                        <label for="features" style="margin-bottom: 0;" class="shareproperty_titles"><?php echo $this->lang->line('shareproperty_input7'); ?></label>
                                        <textarea class="form-control" rows="3" name="features" id="features" value="<?php if(isset($params)) echo $params['features']; ?>"><?php if(isset($params)) echo $params['features']; ?></textarea>
                                    </div>
                                    
                                </div>
                                <div class="row" style="margin-top: 20px;"> 
                                    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols">
                                        <div class="form-group">
                                            <label for="uploadimage" class="shareproperty_titles"><?php echo $this->lang->line('shareproperty_input8'); ?></label>
                                            <!-- <input type="file" name="img[]" multiple="multiple"> -->
                                            <input type="file" name="img[]" id="file">
                                            <input type="button" id="add_more" class="upload" value="Add More Files"/>
                                            <!-- <p style="font-size:11px;margin-top:1%;">You can select mutiple files if needed.</p> -->
                                        </div>
                                    </div>
                                </div>
                                <?php if (isset($insertError)) :?>
                                <div class="row" style="width: 100%;text-align:center;margin-left:0%;margin-top:2%;">
                                    <div class="alert alert-danger" role="alert">
                                       <?= $insertError; ?>
                                    </div>
                                </div>
                                <?php endif ?>
                                <div class="row" style="width: 13%; margin: auto; margin-top: 20px;">
                                    <!-- <button type="submit" class="btn btn-default search_btn_submit">Submit</button> -->
                                    <input type="submit" class="btn btn-default share_btn_submit" value="<?php echo $this->lang->line('shareproperty_button'); ?>" name="submit">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row" style="margin:4%;clear:both;">
                        <div class="col-lg-12 alert alert-warning" style="width:100%;text-align:center;font-size:14px;" role="alert">
                           <?php echo $this->lang->line('shareProperty_validate_account'); ?>
                        </div>
                    </div>
                <?php endif ?>
            <?php else: ?>
                <div class="row" style="margin:4%;clear:both;">
                    <div class="col-lg-12 alert alert-warning" style="width:100%;text-align:center;font-size:14px;" role="alert">
                       <?php echo $this->lang->line('shareProperty_login'); ?>
                    </div>
                </div>
            <?php endif ?>
            
        </div>

        <script type="text/javascript">
            // $(function() {
            //     $('#image_upload').uploadify({
            //         'swf'      : '<?php echo base_url(); ?>application/views/uploadify.swf',
            //         'uploader' : '<?php echo base_url(); ?>application/views/uploadify.php'
            //         // Put your options here
            //     });
            // });
        </script>

        <!-- // <script type="text/javascript" src="http://localhost/ColdwellBanker/js/script.js"></script> -->
        <?php include('footer.php'); ?>

