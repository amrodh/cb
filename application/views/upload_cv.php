<html>
    <body>
        <?php include('header.php'); ?>
        <form role="form" name="applyForm"  method="post" action="<?= base_url();?>uploadCV">
            <div class="container uploadcv_app_div">
                <div class="uploadcv_app_top_div">
                    APPLY HERE
                </div>
                <div id="uploadcv_app_bottom_div">
                    <div class="container" id="uploadcv_app_bottom_inner_div">
                        <?php if (!isset($loggedIn)): ?>
                            <div class="row">
                                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 uploadcv_app_cols">
                                    <div class="form-group">
                                        <label class="uploadcv_app_title" for="uploadcv_app_firstname">First Name</label>
                                        <input type="text" class="form-control" name="uploadcv_app_firstname" value="<?php if(isset($params)) echo $params['uploadcv_app_firstname']; ?>" id="uploadcv_app_firstname" placeholder="Enter Name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 uploadcv_app_cols">
                                    <div class="form-group">
                                        <label class="uploadcv_app_title" for="uploadcv_app_lastname">Last Name</label>
                                        <input type="text" class="form-control" name="uploadcv_app_lastname" value="<?php if(isset($params)) echo $params['uploadcv_app_lastname']; ?>" id="uploadcv_app_lastname" placeholder="Enter Name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 uploadcv_app_cols">
                                    <div class="form-group">
                                        <label class="uploadcv_app_title" for="name">E-mail</label>
                                        <input type="email" class="form-control" name="uploadcv_app_email" value="<?php if(isset($params)) echo $params['uploadcv_app_email']; ?>" id="uploadcv_app_email" placeholder="Enter Name" required>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="row">
                            <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4 uploadcv_app_cols">
                                <div class="form-group">
                                    <label for="uploadcv_app_uploadcv">Upload Your CV</label>
                                    <input type="file" name="uploadcv_app_uploadcv" id="uploadcv_app_uploadcv">
                                </div>
                            </div>
                        </div>
                        <?php if (isset($uploadError)) :?>
                    <div class="row" style="width: 55%;margin: auto;margin-left:36%;">
                        <div class="alert alert-danger" role="alert">
                            <?=$uploadError; ?> 
                        </div>
                    </div>
                    <?php endif ?>
                        <div class="">
                            <input type="submit" class="btn btn-default search_btn_submit" name="submit" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php include('footer.php'); ?>
    </body>
</html>