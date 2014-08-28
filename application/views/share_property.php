<!DOCTYPE html>
<html lang="en">
    <body>
        <?php include('header.php'); ?>
        <div class="container shareproperty_main_div">
            <div class="shareproperty_top_div">
                Share Your Property
            </div>
            <?php if (isset($loggedIn)): ?>
            <div id="properties_bottom_div">
                <div class="container" id="shareproperty_bottom_inner_div">
                    <div class="shareproperty_title">
                        Property Information
                    </div>
                    <form role="form" name="shareForm"  method="post" action="" enctype="multipart/form-data">
                    <div class="shareproperty_content">
                        <div class="row">
                            <div class="col-xs-12 col-lg-3 col-md-6 col-sm-6 search_cols search_cols_margin">
                                <?php //if (isset($params)) {printme ($params);} ?>
                                <div class="shareproperty_titles title_margin">
                                    Area
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
                                    Type
                                </div>
                                <select class="selectpicker" data-style="btn" data-title="Select Type" name="type">
                                     <option>Select Type</option> 
                                     <option <?php if (isset($params)){ if($params['type'] == 'Apartment'){ ?>selected="true" <?php }} ?> value="Apartment">Apartment</option>
                                     <option <?php if (isset($params)){ if($params['type'] == 'Building'){ ?>selected="true" <?php }} ?> value="Building">Building</option>
                                     <option <?php if (isset($params)){ if($params['type'] == 'Furnished Apartment'){ ?>selected="true" <?php }} ?> value="Furnished Apartment">Furnished Apartment</option>
                                     <option <?php if (isset($params)){ if($params['type'] == 'Office'){ ?>selected="true" <?php }} ?> value="Office">Office</option>
                                     <option <?php if (isset($params)){ if($params['type'] == 'Shop'){ ?>selected="true" <?php }} ?> value="Shop">Shop</option>
                                     <option <?php if (isset($params)){ if($params['type'] == 'Villa'){ ?>selected="true" <?php }} ?> value="Villa">Villa</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-lg-3 col-md-6 col-sm-6 search_cols search_cols_margin">
                                <div class="shareproperty_titles title_margin">
                                    Price
                                </div>
                                <select class="selectpicker" data-style="btn" data-title="Select Price" name="price">
                                     <option>Select Price</option>
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
                                    City
                                </div>
                                <select class="selectpicker" data-style="btn" data-title="Select City" name="city">
                                     <option>Select City</option>
                                     <option <?php if (isset($params)){ if($params['city'] == 'Cairo'){ ?>selected="true" <?php }} ?> value="Cairo">Cairo</option>
                                     <option <?php if (isset($params)){ if($params['city'] == 'Giza'){ ?>selected="true" <?php }} ?> value="Giza">Giza</option>
                                     <option <?php if (isset($params)){ if($params['city'] == 'Alexandria'){ ?>selected="true" <?php }} ?> value="Alexandria">Alexandria</option>
                                     <option <?php if (isset($params)){ if($params['city'] == 'Tanta'){ ?>selected="true" <?php }} ?> value="Tanta">Tanta</option>
                                </select>

                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols search_cols_margin">
                                <div class="shareproperty_titles title_margin" id="search_title_district">
                                    District
                                </div>
                                <select class="selectpicker" data-style="btn" data-title="Select District" name="district" disabled="disabled">
                                     <option>Select District</option>
                                     <option <?php if (isset($params)){ if($params['price'] == 'Mohandeseen'){ ?>selected="true" <?php }} ?> value="Mohandeseen">Mohandeseen</option>
                                     <option <?php if (isset($params)){ if($params['price'] == 'Maadi'){ ?>selected="true" <?php }} ?> value="Maadi">Maadi</option>
                                     <option <?php if (isset($params)){ if($params['price'] == 'Nasr City'){ ?>selected="true" <?php }} ?> value="Nasr City">Nasr City</option>
                                     <option <?php if (isset($params)){ if($params['price'] == 'Heliopolis'){ ?>selected="true" <?php }} ?> value="Helipolis">Heliopolis</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols search_cols_margin">
                                <div class="shareproperty_titles title_margin" id="search_title_district">
                                    Address
                                </div>
                                <textarea class="form-control" rows="2" name="address" id="address" value="<?php if(isset($params)) echo $params['address']; ?>"><?php if(isset($params)) echo $params['address']; ?></textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols">
                                <label for="features" class="shareproperty_titles">Features</label>
                                <textarea class="form-control" rows="3" name="features" id="features"value="<?php if(isset($params)) echo $params['features']; ?>"><?php if(isset($params)) echo $params['features']; ?></textarea>
                            </div>
                            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols">
                                <div class="form-group">
                                    <label for="uploadimage" class="shareproperty_titles">Upload Image</label>
                                    <input type="file" name="img[]"  multiple="multiple">
                                    <p style="font-size:11px;margin-top:1%;">You can select mutiple files if needed.</p>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($areaError)) :?>
                        <div class="row" style="width: 29%;margin: auto;margin-left:42%;">
                            <div class="alert alert-danger" role="alert">
                                Please Select Area
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($typeError)) :?>
                        <div class="row" style="width: 29%;margin: auto;margin-left:42%;">
                            <div class="alert alert-danger" role="alert">
                                Please Select Type
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($priceError)) :?>
                        <div class="row" style="width: 29%;margin: auto;margin-left:42%;">
                            <div class="alert alert-danger" role="alert">
                                Please Select Price
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($cityError)) :?>
                        <div class="row" style="width: 29%;margin: auto;margin-left:42%;">
                            <div class="alert alert-danger" role="alert">
                                Please Select City
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($districtError)) :?>
                        <div class="row" style="width: 29%;margin: auto;margin-left:42%;">
                            <div class="alert alert-danger" role="alert">
                                Please Select District
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($addressError)) :?>
                        <div class="row" style="width: 45%;margin: auto;margin-left:37%;">
                            <div class="alert alert-danger" role="alert">
                                Please insert property address
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($featuresError)) :?>
                        <div class="row" style="width: 45%;margin: auto;margin-left:37%;">
                            <div class="alert alert-danger" role="alert">
                                Please insert property features
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($insertPropertyError)) :?>
                        <div class="row" style="width: 45%;margin: auto;margin-left:37%;">
                            <div class="alert alert-danger" role="alert">
                                Error Inserting Property Data
                            </div>
                        </div>
                        <?php endif ?>
                        <div class="row" style="width: 13%; margin: auto; margin-top: 20px;">
                            <!-- <button type="submit" class="btn btn-default search_btn_submit">Submit</button> -->
                            <input type="submit" class="btn btn-default share_btn_submit" value="Submit" name="submit">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <?php else: ?>
                <div class="row" style="margin:4%;clear:both;">
                    <div class="col-lg-12 alert alert-warning" style="width:100%;height:40px;font-size:14px;" role="alert">
                       You need to login to share properties.
                    </div>
                </div>
            <?php endif ?>
            
        </div>
        <!-- // <script type="text/javascript" src="http://localhost/ColdwellBanker/js/script.js"></script> -->
        <?php include('footer.php'); ?>
    </body>
</html>