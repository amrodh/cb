<?php include('header.php'); ?>
        <div class="container shareproperty_main_div">
            <div class="shareproperty_top_div">
                التسجيل
                <div style="font-size: 12px;font-weight: normal;">
                    أدخل معلوماتك الشخصية للتسجيل
                </div>
            </div>
            <form role="form" name="registerForm"  method="post" action="<?= base_url();?>ar/register" onsubmit="return formValidation(); return false;">
            <div id="properties_bottom_div">
                <div class="container" id="shareproperty_bottom_inner_div" style="">
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                             <div class="form-group register_groups">
                                <label for="firstname" class="shareproperty_titles">الاسم الأول</label>
                                <input type="text" class="form-control register_textbx" name="first_name" title="First name must be more than 2 characters" id="firstname" pattern=".{3,}" placeholder="رجاءً أدخل الاسم الاول"
                                value="<?php if(isset($params)) echo $params['first_name']; ?>" autofocus required>
                             </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                            <div class="form-group register_groups">
                                <label for="lastname" class="shareproperty_titles">إسم العائلة</label>
                                <input type="text" class="form-control register_textbx" name="last_name" title="First name must be more than 2 characters" id="lastname" pattern="[.{3,}" placeholder="رجاءً أدخل إسم العائلة"
                                value="<?php if(isset($params)) echo $params['last_name']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                             <div class="form-group register_groups">
                                <label for="username" class="shareproperty_titles">إسم المستخدم</label>
                                <input type="text" class="form-control register_textbx" name="username" id="username" pattern=".{3,}" title="3 characters minimum" placeholder="رجاءً أدخل إسم المستخدم" 
                                value="<?php if(isset($params)) echo $params['username']; ?>" required>
                             </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                            <div class="form-group register_groups">
                                <label for="email" class="shareproperty_titles">البريد الالكتروني</label>
                                <input type="email" class="form-control register_textbx" name="email" id="email" placeholder="رجاءً أدخل البريد الالكتروني" 
                                value="<?php if(isset($params)) echo $params['email']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                             <div class="form-group register_groups">
                                <label for="location" class="shareproperty_titles">العنوان</label>
                                <input type="text" class="form-control register_textbx" name="location" id="location" placeholder="رجاءً أدخل البريد العنوان" 
                                value="<?php if(isset($params)) echo $params['location']; ?>" required>
                             </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                            <div class="form-group register_groups">
                                <label for="phone" class="shareproperty_titles">رقم الهاتف</label>
                                <input type="text" class="form-control register_textbx" name="phone" id="phone" placeholder="رجاءً أدخل رقم الهاتف"
                                value="<?php if(isset($params)) echo $params['phone']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                             <div class="form-group register_groups">
                                <label for="password" class="shareproperty_titles">كلمة السر</label>
                                <input type="password" class="form-control register_textbx" name="password" id="password" placeholder="رجاءً أدخل كلمة السر" required>
                             </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-4 col-sm-4">
                            <div class="form-group register_groups">
                                <label for="confirmpassword" class="shareproperty_titles">تأكيد كلمة المرور</label>
                                <input type="password" class="form-control register_textbx" name="confirmpassword" id="confirmpassword" placeholder="رجاءً أدخل كلمة السر" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-right: 1.5%;">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="newsletter"> إشترك في النشرة الإخبارية
                            </label>
                        </div>
                    </div>
                    <div class="row" style="width: 32%;margin: auto;">
                        <div class="alert alert-danger" id="passwordAlert" role="alert">
                            كلمات السر ليست مطابقة
                        </div>
                    </div>
                    <?php if (isset($registrationError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            إسم المستخدم موجود بالفعل 
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($firstNameError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            رجاءً أدخل الاسم الاول
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($lastNameError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            رجاءً أدخل إسم العائلة
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($usernameError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            رجاءً أدخل إسم المستخدم
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($emailError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            رجاءً أدخل البريد الالكتروني
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($locationError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            رجاءً أدخل العنوان
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($phoneError)) :?>
                    <div class="row" style="width: 33%;margin: auto;margin-left:36%;">
                        <div class="alert alert-danger" role="alert">
                            رجاءً أدخل رقم الهاتف
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (isset($passwordError)) :?>
                    <div class="row" style="width: 29%;margin: auto;margin-left:37%;">
                        <div class="alert alert-danger" role="alert">
                            رجاءً أدخل كلمة السر
                        </div>
                    </div>
                    <?php endif ?>
                    <div class="row" style="width: 13%; float: right; margin-right: 12%;">
                        <input type="submit" class="btn btn-default register_btn_submit"  name="submit" value="سجل">
                    </div>
                </div>
            </div>
            </form>
        </div>
<?php include('footer.php'); ?>
