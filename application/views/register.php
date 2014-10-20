<?php include('header.php'); ?>
        <div class="container shareproperty_main_div">
            <div class="shareproperty_top_div">
                <?php echo $this->lang->line('register_title'); ?>
                <div style="font-size: 12px;font-weight: normal;">
                    <?php echo $this->lang->line('register_subtitle'); ?>
                </div>
            </div>
            <form role="form" name="registerForm"  method="post" action="<?= base_url();?>register" onsubmit="return formValidation(); return false;">
            <div id="properties_bottom_div">
                <div class="container" id="shareproperty_bottom_inner_div" style="">
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                             <div class="form-group register_groups">
                                <label for="firstname" class="shareproperty_titles"><?php echo $this->lang->line('register_input1'); ?></label>
                                <input type="text" class="form-control register_textbx" name="first_name" title="First name must be more than 2 characters" id="firstname" pattern=".{3,}" placeholder="Please enter first name"
                                value="<?php if(isset($params)) echo $params['first_name']; ?>" autofocus required>
                             </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                            <div class="form-group register_groups">
                                <label for="lastname" class="shareproperty_titles"><?php echo $this->lang->line('register_input2'); ?></label>
                                <input type="text" class="form-control register_textbx" name="last_name" title="First name must be more than 2 characters" id="lastname" pattern="[.{3,}" placeholder="Please enter lastname"
                                value="<?php if(isset($params)) echo $params['last_name']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                             <div class="form-group register_groups">
                                <label for="username" class="shareproperty_titles"><?php echo $this->lang->line('register_input3'); ?></label>
                                <input type="text" class="form-control register_textbx" name="username" id="username" pattern=".{3,}" title="3 characters minimum" placeholder="Please enter userame" 
                                value="<?php if(isset($params)) echo $params['username']; ?>" required>
                             </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                            <div class="form-group register_groups">
                                <label for="email" class="shareproperty_titles"><?php echo $this->lang->line('register_input4'); ?></label>
                                <input type="email" class="form-control register_textbx" name="email" id="email" placeholder="Please enter e-mail" 
                                value="<?php if(isset($params)) echo $params['email']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                             <div class="form-group register_groups">
                                <label for="location" class="shareproperty_titles"><?php echo $this->lang->line('register_input5'); ?></label>
                                <input type="text" class="form-control register_textbx" name="location" id="location" placeholder="Please enter location" 
                                value="<?php if(isset($params)) echo $params['location']; ?>" required>
                             </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                            <div class="form-group register_groups">
                                <label for="phone" class="shareproperty_titles"><?php echo $this->lang->line('register_input6'); ?></label>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <select class="selectpicker" id="country_Code" style="width:15%;!important" name="country_Code" data-style="btn" data-title="Select Code" data-size="5">
                                            <option value="0">Code</option>
                                            <?php foreach ($countryCodes as $code): ?>
                                                <option value="<?= $code['id'] ?>"><pre><?= $code['id'];?>   <?= $code['name'] ?></pre></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control register_textbx" style="width: 100%" name="phone" id="phone" placeholder="Please enter phone number"
                                        value="<?php if(isset($params)) echo $params['phone']; ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                             <div class="form-group register_groups">
                                <label for="password" class="shareproperty_titles"><?php echo $this->lang->line('register_input7'); ?></label>
                                <input type="password" class="form-control register_textbx" name="password" id="password" placeholder="Enter password" required>
                             </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                            <div class="form-group register_groups">
                                <label for="confirmpassword" class="shareproperty_titles"><?php echo $this->lang->line('register_input8'); ?></label>
                                <input type="password" class="form-control register_textbx" name="confirmpassword" id="confirmpassword" placeholder="Enter password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                            <div class="form-group register_groups">
                                <label for="birthday" class="shareproperty_titles"><?php echo $this->lang->line('register_input9'); ?></label>
                                <input type="date" class="form-control register_textbx" name="birthday" id="birthday"
                                value="<?php if(isset($params)) echo $params['birthday']; ?>" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                            <div class="checkbox register_groups">
                                <label>
                                    <input type="checkbox" name="newsletter"> <?php echo $this->lang->line('register_chkbx'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="width: 32%;margin: auto;">
                        <div class="alert alert-danger" id="passwordAlert" role="alert">
                            <?php echo $this->lang->line('register_password_mismatch'); ?>
                        </div>
                    </div>
                    <?php if (isset($registrationError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->lang->line('register_username'); ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($firstNameError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->lang->line('register_missing_firstname'); ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($lastNameError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->lang->line('register_missing_lastname'); ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($usernameError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->lang->line('register_missing_username'); ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($emailError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->lang->line('register_missing_email'); ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($locationError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->lang->line('register_missing_location'); ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($phoneError)) :?>
                    <div class="row" style="width: 33%;margin: auto;margin-left:36%;">
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->lang->line('register_missing_phone'); ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($passwordError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->lang->line('register_missing_password'); ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <div class="row" style="width: 13%; float: right; margin-right: 12%;">
                        <input type="submit" class="btn btn-default register_btn_submit"  name="submit" value="<?php echo $this->lang->line('register_button'); ?>">
                    </div>
                </div>
            </div>
            </form>
        </div>
<?php include('footer.php'); ?>
