<?php include('header.php'); ?>
        <div class="container shareproperty_main_div">
            <div class="shareproperty_top_div">
                <?php echo $this->lang->line('profile_title'); ?>
                <div style="font-size: 12px;font-weight: normal;">
                    
                </div>
            </div>
            <div id="properties_bottom_div">
                <form role="form" name="editForm"  method="post" action="">
                    <div class="container" id="profile_bottom_inner_div" style="">
                        <div class="row">
                            <div class="col-lg-2 profile_titles">
                                <?php echo $this->lang->line('profile_name'); ?>
                            </div>
                            <div class="col-lg-10 profile_content">
                                <div class="profileData"><?=$user->username;?></div>
                                <input type="text" id="profileUsername" name="username" class="hide" value="<?= $user->username;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 profile_titles">
                                <?php echo $this->lang->line('profile_email'); ?>
                            </div>
                            <div class="col-lg-10 profile_content">
                                <div class="profileData"><?=$user->email?></div>
                                <input type="email" id="profileEmail" name="email" class="hide" value="<?=$user->email?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 profile_titles">
                                <?php echo $this->lang->line('profile_location'); ?>
                            </div>
                            <div class="col-lg-10 profile_content">
                                <div class="profileData"><?=$user->location?></div>
                                <input type="text" id="profileLocation" name="location" class="hide" value="<?=$user->location?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 profile_titles">
                                <?php echo $this->lang->line('profile_phone'); ?>
                            </div>
                            <div class="col-lg-10 profile_content">
                                <div class="profileData"><?=$user->phone?></div>
                                <input type="text" id="profilePhone" name="phone" class="hide" value="<?=$user->phone?>">
                            </div>
                        </div>
                        <?php if (isset($updateError)) :?>
                        <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->lang->line('update_username'); ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($usernameError)) :?>
                        <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->lang->line('update_missing_username'); ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($emailError)) :?>
                        <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->lang->line('update_missing_email'); ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($locationError)) :?>
                        <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->lang->line('update_missing_location'); ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($phoneError)) :?>
                        <div class="row" style="width: 33%;margin: auto;margin-left:36%;">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->lang->line('update_missing_phone'); ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($updateEmailError)) :?>
                        <div class="row" style="width: 33%;margin: auto;margin-left:36%;">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->lang->line('update_email'); ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($emailUpdateMessage)) :?>
                        <div class="row" style="width: 65%;margin: auto;margin-left:33%;">
                            <div class="alert alert-info" role="alert">
                                <?php echo $this->lang->line('update_confirm_email'); ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if (isset($update)) :?>
                            <?php if ($update == true){?>
                            <div class="row" style="width: 33%;margin: auto;margin-left:36%;">
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->lang->line('update_success'); ?>
                                </div>
                            </div>
                            <?php }else{ ?>
                            <div class="row" style="width: 33%;margin: auto;margin-left:36%;">
                                <div class="alert alert-warning" role="alert">
                                    <?php echo $this->lang->line('update_failure'); ?>
                                </div>
                            </div>
                        <?php }endif ?>
                        <div class="row" style="width: 13%; margin: auto; margin-top: 20px;">
                            <!-- <button type="submit" class="btn btn-default profile_btn_submit">عدل</button> -->
                            <?php if ($user->is_valid == 1): ?>
                                <input type="button"  class="btn btn-defaut profile_btn_submit" value="<?php echo $this->lang->line('profile_button'); ?>">
                            <?php endif ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php include('footer.php'); ?>