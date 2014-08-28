<html>
    <body>
        <?php include('header.php'); ?>
        <form>
            <div class="container uploadcv_app_div">
                <div class="uploadcv_app_top_div">
                    APPLY HERE
                </div>
                <div id="uploadcv_app_bottom_div">
                    <div class="container" id="uploadcv_app_bottom_inner_div">
                        <div class="row">
                            <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 uploadcv_app_cols">
                                <div class="form-group">
                                    <label class="uploadcv_app_title" for="uploadcv_app_firstname">First Name</label>
                                    <input type="text" class="form-control" name="uploadcv_app_firstname" id="uploadcv_app_firstname" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 uploadcv_app_cols">
                                <div class="form-group">
                                    <label class="uploadcv_app_title" for="uploadcv_app_middlename">Middle Name</label>
                                    <input type="text" class="form-control" name="uploadcv_app_middlename" id="uploadcv_app_middlename" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 uploadcv_app_cols">
                                <div class="form-group">
                                    <label class="uploadcv_app_title" for="uploadcv_app_lastname">Last Name</label>
                                    <input type="text" class="form-control" name="uploadcv_app_lastname" id="uploadcv_app_lastname" placeholder="Enter Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 uploadcv_app_cols">
                                <div class="form-group">
                                    <label class="uploadcv_app_title" for="name">E-mail</label>
                                    <input type="text" class="form-control" name="uploadcv_app_email" id="uploadcv_app_email" placeholder="Enter Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4 uploadcv_app_cols">
                                <div class="form-group">
                                    <label for="uploadcv_app_uploadcv">Upload Your CV</label>
                                    <input type="file" name="uploadcv_app_uploadcv" id="uploadcv_app_uploadcv">
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-default search_btn_submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php include('footer.php'); ?>
    </body>
</html>