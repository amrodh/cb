<!DOCTYPE html>
<html lang="en">
    <body>
        <?php include('header.php'); ?>
        <div class="container shareproperty_main_div">
            <div class="shareproperty_top_div">
                Share Your Property
            </div>
            <div id="properties_bottom_div">
                <div class="container" id="shareproperty_bottom_inner_div">
                    <div class="shareproperty_title">
                        Property Information
                    </div>
                    <form role="form" name="shareForm"  method="post" action="">
                    <div class="shareproperty_content">
                        <div class="row">
                            <div class="col-xs-12 col-lg-3 col-md-6 col-sm-6 search_cols search_cols_margin">
                                <div class="shareproperty_titles title_margin">
                                    Area
                                </div>
                                <select class="selectpicker" data-style="btn" data-title="Select Area" id="area" name="area">
                                     <option selected="">Select Area</option>
                                     <option>50 m<sup>2</sup></option>
                                     <option>100 m<sup>2</sup></option>
                                     <option>130 m<sup>2</sup></option>
                                     <option>150 m<sup>2</sup></option>
                                     <option>170 m<sup>2</sup></option>
                                     <option>200 m<sup>2</sup></option>
                                     <option>300 m<sup>2</sup></option>
                                     <option>350 m<sup>2</sup></option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-lg-3 col-md-6 col-sm-6 search_cols search_cols_margin">
                                <div class="shareproperty_titles title_margin">
                                    Type
                                </div>
                                <select class="selectpicker" data-style="btn" data-title="Select Type" name="type">
                                     <option>Select Type</option> 
                                     <option>Apartment</option>
                                     <option>Building</option>
                                     <option>Furnished Apartment</option>
                                     <option>Office</option>
                                     <option>Shop</option>
                                     <option>Villa</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-lg-3 col-md-6 col-sm-6 search_cols search_cols_margin">
                                <div class="shareproperty_titles title_margin">
                                    Price
                                </div>
                                <select class="selectpicker" data-style="btn" data-title="Select Price" name="price">
                                     <option>Select Price</option>
                                     <option>100,000 - 250,000</option>
                                     <option>250,000 - 500,000</option>
                                     <option>500,000 - 750,000</option>
                                     <option>750,000 - 1,000,000</option>
                                     <option>1,000,000 - 2,000,000</option>
                                     <option>2,000,000 - 5,000,000</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-lg-3 col-md-6 col-sm-6 search_cols search_cols_margin">
                                <div class="shareproperty_titles title_margin" id="search_title_district">
                                    City
                                </div>
                                <select class="selectpicker" data-style="btn" data-title="Select City" name="city">
                                     <option>Select City</option>
                                     <option>Cairo</option>
                                     <option>Giza</option>
                                     <option>Alexandria</option>
                                     <option>Tanta</option>
                                </select>

                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols search_cols_margin">
                                <div class="shareproperty_titles title_margin" id="search_title_district">
                                    District
                                </div>
                                <select class="selectpicker" data-style="btn" data-title="Select District" name="district">
                                     <option>Select District</option>
                                     <option>Mohandeseen</option>
                                     <option>Maadi</option>
                                     <option>Nasr City</option>
                                     <option>Heliopolis</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols search_cols_margin">
                                <div class="shareproperty_titles title_margin" id="search_title_district">
                                    Address
                                </div>
                                <textarea class="form-control" rows="2" name="address" id="address"></textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols">
                                <label for="features" class="shareproperty_titles">Features</label>
                                <textarea class="form-control" rows="3" name="features" id="features"></textarea>
                            </div>
                            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols">
                                <div class="form-group">
                                    <label for="uploadimage" class="shareproperty_titles">Upload Image</label>
                                    <input type="file" name="uploadimage" id="uploadimage">
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
                        <div class="row" style="width: 13%; margin: auto; margin-top: 20px;">
                            <!-- <button type="submit" class="btn btn-default search_btn_submit">Submit</button> -->
                            <input type="submit" class="btn btn-default share_btn_submit" value="Submit" name="submit">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- // <script type="text/javascript" src="http://localhost/ColdwellBanker/js/script.js"></script> -->
        <?php include('footer.php'); ?>
    </body>
</html>