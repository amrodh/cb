<?php include('header.php'); ?>
        <form role="form" name="applyForm"  method="post" action="<?= base_url();?>uploadCV" enctype="multipart/form-data">
            <div class="container uploadcv_app_div">
                <div class="uploadcv_app_top_div">
                    <?php echo $this->lang->line('uploadcv_title'); ?>
                </div>
                <div id="uploadcv_app_bottom_div">
                    <div class="container" id="uploadcv_app_bottom_inner_div">
                        <?php if (!isset($loggedIn)): ?>
                            <div class="row">
                                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 uploadcv_app_cols">
                                    <div class="form-group">
                                        <label class="uploadcv_app_title" for="uploadcv_app_firstname"><?php echo $this->lang->line('uploadcv_input1'); ?></label>
                                        <input type="text" class="form-control" name="uploadcv_app_firstname" value="<?php if(isset($params)) echo $params['uploadcv_app_firstname']; ?>" id="uploadcv_app_firstname" placeholder="Enter Name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 uploadcv_app_cols">
                                    <div class="form-group">
                                        <label class="uploadcv_app_title" for="uploadcv_app_lastname"><?php echo $this->lang->line('uploadcv_input2'); ?></label>
                                        <input type="text" class="form-control" name="uploadcv_app_lastname" value="<?php if(isset($params)) echo $params['uploadcv_app_lastname']; ?>" id="uploadcv_app_lastname" placeholder="Enter Name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 uploadcv_app_cols">
                                    <div class="form-group">
                                        <label class="uploadcv_app_title" for="name"><?php echo $this->lang->line('uploadcv_input3'); ?></label>
                                        <input type="email" class="form-control" name="uploadcv_app_email" value="<?php if(isset($params)) echo $params['uploadcv_app_email']; ?>" id="uploadcv_app_email" placeholder="Enter Name" required>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="row">
                            <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4 uploadcv_app_cols">
                                <div class="form-group">
                                    <label for="uploadcv_app_uploadcv"><?php echo $this->lang->line('uploadcv_input4'); ?></label>
                                    <input type="file" name="userfile" id="uploadcv_app_uploadcv">
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
                        <?php if (isset($uploadSuccess)) :?>
                        <div class="row" style="width: 55%;margin: auto;margin-left:36%;">
                            <div class="alert alert-success" role="alert">
                                <?=$uploadSuccess; ?> 
                            </div>
                        </div>
                        <?php endif ?>
                        <div class="">
                            <input type="submit" class="btn btn-default search_btn_submit" name="submit" value="<?php echo $this->lang->line('uploadcv_button'); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php include('footer.php'); ?>