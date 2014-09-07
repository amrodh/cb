<?php include('header.php'); ?>
        <div class="container shareproperty_main_div">
            <div class="shareproperty_top_div">
                التسجيل
                <div style="font-size: 12px;font-weight: normal;">
                    أدخل معلوماتك الشخصية للتسجيل
                </div>
            </div>
            <form role="form" name="registerForm"  method="post" action="<?= base_url();?>register" onsubmit="return formValidation(); return false;">
            <div id="properties_bottom_div">
                <div class="container" id="shareproperty_bottom_inner_div" style="">
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                             <div class="form-group register_groups">
                                <label for="firstname" class="shareproperty_titles">الاسم الأول</label>
                                <input type="text" class="form-control register_textbx" name="first_name" title="First name must be more than 2 characters" id="firstname" pattern=".{3,}" placeholder="Please enter first name"
                                value="<?php if(isset($params)) echo $params['first_name']; ?>" autofocus required>
                             </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                            <div class="form-group register_groups">
                                <label for="lastname" class="shareproperty_titles">إسم العائلة</label>
                                <input type="text" class="form-control register_textbx" name="last_name" title="First name must be more than 2 characters" id="lastname" pattern="[.{3,}" placeholder="Please enter lastname"
                                value="<?php if(isset($params)) echo $params['last_name']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                             <div class="form-group register_groups">
                                <label for="username" class="shareproperty_titles">الاسم</label>
                                <input type="text" class="form-control register_textbx" name="username" id="username" pattern=".{3,}" title="3 characters minimum" placeholder="Please enter userame" 
                                value="<?php if(isset($params)) echo $params['username']; ?>" required>
                             </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                            <div class="form-group register_groups">
                                <label for="email" class="shareproperty_titles">البريد الالكتروني</label>
                                <input type="email" class="form-control register_textbx" name="email" id="email" placeholder="Please enter e-mail" 
                                value="<?php if(isset($params)) echo $params['email']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                             <div class="form-group register_groups">
                                <label for="location" class="shareproperty_titles">العنوان</label>
                                <input type="text" class="form-control register_textbx" name="location" id="location" placeholder="Please enter location" 
                                value="<?php if(isset($params)) echo $params['location']; ?>" required>
                             </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                            <div class="form-group register_groups">
                                <label for="phone" class="shareproperty_titles">رقم الهاتف</label>
                                <input type="text" class="form-control register_textbx" name="phone" id="phone" placeholder="Please enter phone number"
                                value="<?php if(isset($params)) echo $params['phone']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                             <div class="form-group register_groups">
                                <label for="password" class="shareproperty_titles">كلمة السر</label>
                                <input type="password" class="form-control register_textbx" name="password" id="password" placeholder="Enter password" required>
                             </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                            <div class="form-group register_groups">
                                <label for="confirmpassword" class="shareproperty_titles">تأكيد كلمة المرور</label>
                                <input type="password" class="form-control register_textbx" name="confirmpassword" id="confirmpassword" placeholder="Enter password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-left: 1.5%;">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="newsletter"> Subscribe for Newsletter
                            </label>
                        </div>
                    </div>
                    <div class="row" style="width: 32%;margin: auto;">
                        <div class="alert alert-danger" id="passwordAlert" role="alert">
                            Passwords do not match.
                        </div>
                    </div>
                    <?php if (isset($registrationError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            Username already exists 
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($firstNameError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            Please insert first name
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($lastNameError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            Please insert last name
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($usernameError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            Please insert username
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($emailError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            Please insert email
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($locationError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            Please insert location
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($phoneError)) :?>
                    <div class="row" style="width: 33%;margin: auto;margin-left:36%;">
                        <div class="alert alert-danger" role="alert">
                            Please insert phone number
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($passwordError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            Please insert password
                        </div>
                    </div>
                    <?php endif ?>
                    <div class="row" style="width: 13%; float: right; margin-right: 12%;">
                        <input type="submit" class="btn btn-default register_btn_submit"  name="submit" value="Submit">
                    </div>
                </div>
            </div>
            </form>
        </div>
<?php include('footer.php'); ?>
