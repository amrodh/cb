<html>
    <head>
        <title>
            Coldwell Banker
        </title>
        <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/bootstrap-theme-ar.css"> -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/bootstrap-ar.min.css">
       <!--  <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/admin.css"> -->

        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap-ar.min.js"></script>

        
        <link href="<?php echo base_url(); ?>application/static/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= base_url();?>/application/static/css/bootstrap-select.min.css" rel="stylesheet" />

        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/admin.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap-select.js"></script>

        <!-- Custom Fonts -->
        <link type="text/css" href="<?= base_url();?>/application/static/css/style-ar.css" rel="stylesheet">
        <link href="<?= base_url();?>/application/static/css/jquery.bxslider.css" rel="stylesheet" />
        <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,500,700" rel="stylesheet" type="text/css">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>

    <body> 
        <div id="top_div">
            <div id="icons_div">
                <a href="">
                    <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_linkedin.png">
                </a>
                <a href="">
                    <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_gmail.png">
                </a>
                <a href="">
                    <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_fb.png">
                </a>
                <a href="">
                    <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_twitter.png">
                </a>
            </div>
            <div id="login_div">
                <label for="">
                    <span class="glyphicon glyphicon-globe"></span>
                     <!-- <a href='<?= base_url().'en'.str_replace('ar', '',$uri)?>'>English</a>
                    <span>/</span> -->
                    <?php if ($uri == 'shareProperty'): ?>
                        <a href='<?= base_url().'en/'.$uri?>'>English</a>
                        <span>/</span>
                        <a href='<?= base_url().'ar/'.$uri?>'>عربي</a>
                    <?php else: ?>
                        <a href='<?= base_url().'en/'.str_replace('ar', '',$uri)?>'>English</a>
                        <span>/</span>
                        <a href='<?= base_url().'ar/'.str_replace('ar', '',$uri)?>'>عربي</a>
                    <?php endif ?>
                    <!-- <a href='<?= base_url().'ar'.str_replace('ar', '',$uri)?>'>عربي</a> -->
                </label>
                <?php if (isset($loggedIn)): ?>
                    <span style="margin-right:5%;"><b><a style="color: white; text-decoration: none;" href="<?= base_url();?>profile">
                        <span class="glyphicon glyphicon-user"></span> <?= $user->username; ?></a></b>
                    </span>
                    <label style="">
                        <span class="glyphicon glyphicon-log-out">
                        </span>
                        <form action="<?= base_url();?>logout" method="post" style="display:inline;">
                        <input type="hidden" name="currentUrl" value="<?= $this->uri->uri_string; ?>">
                        <input type="submit" value="خروج" name="logoutSubmit" class="logoutSubmit">
                        </form>
                    </label>

                    <!-- <span><b><a style="color: white; text-decoration: none;" href="<?= base_url();?>profile"><?= $user->username; ?></a></b></span>
                    <a href="home/logout">Log Out</a> -->
                <?php else: ?>
                    <label for="" style="margin-right:3%;">
                        <span class="glyphicon glyphicon-log-in"></span>
                        <a href="#tallModal" data-toggle="modal"><?php echo $this->lang->line('login'); ?></a>
                    </label>
                     /
                     <label for="" style="margin-left:3%;">
                         <span class="glyphicon glyphicon-plus-sign"></span>
                         <a href="<?= base_url();?>ar/register">تسجيل</a>
                     </label>
                    <!-- <a href="#tallModal" data-toggle="modal">دخول</a> / <a href="<?= base_url();?>register">تسجيل</a> -->
                <?php endif ?>
            </div>
        </div>
        <?php if (isset($loginError)): ?>
            <input type="hidden" id="loginError" value="<?= $loginError; ?>">
        <?php endif ?>
        <form class="form-inline" role="form" action="<?= base_url();?>authenticate" method="post">
            <input type="hidden" name="currentUrl" value="<?= $this->uri->uri_string ?>">
        <div id="tallModal" class="modal modal-wide fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">إدخل الأن</h4>
                      <div style="font-size: 12px;">
                          أدخل الاسم وكلمة السر للدخول
                      </div>
                    </div>
                    <div class="modal-body" style="width: 30%;margin: auto;">
                        <div class="row">
                             <div class="form-group login_form">
                                <label style="width:100%" for="username" class="shareproperty_titles">الإسم:</label>
                                <input style="" type="text" name="username" value="<?php if(isset($login_username)) echo $login_username; ?>" class="form-control" id="username" placeholder="رجاءً أدخل الإسم" autofocus required>
                             </div>
                        </div>
                        <div class="row">
                            <div class="form-group login_form">
                                <label style="width:100%" for="password" class="shareproperty_titles">كلمة السر:</label>
                                <input style="" type="password" name="password" class="form-control" style="margin-left: 3px;" id="password" placeholder="رجاءً أدخل كلمة السر" required>
                            </div>
                        </div>
                        <div class="row">
                            <?php if (isset($loginErrorType)): ?>
                                <div class="alert alert-danger" role="alert">
                                        <?= $loginError;?>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-9">
                            <input type="submit" style="float: left;margin-left: 20%;" class="btn btn-default search_btn_submit2" value="إدخل" name="submit">
                        </div>
                        <div class="col-lg-3" style="padding-top: 4%;">
                            <a href="<?= base_url();?>ar/forgotPassword">نسيت كلمة المرور</a>
                        </div>
                    </div>
                    <!-- <div class="modal-footer" style="margin: auto;width: 185px;">
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-default search_btn_submit2" value="إدخل<" name="submit">
                       </div>
                    </div> -->
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </form>
        <div id="middle_div">
            <nav class="navbar" role="navigation">
                <div class="navbar-header">
                    <div class="navbar-brand">
                        <a href="<?=base_url(); ?>ar">
                            <img class="logo" src="<?= base_url();?>/application/static/images/logo.png">
                        </a>
                    </div>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse bs-navbar-collapse">
                    <ul class="nav navbar-nav navbar-left header_navbar">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown">العثور على منزل
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="home_dropdown" style="">
                                <li>
                                    <a href="<?= base_url().'ar/';?>viewAllProperties">مجمع سكني</a>
                                </li>
                                <li>
                                    <a href="<?= base_url().'ar/';?>viewAllProperties">عقارات مملوكة من قبل</a>
                                </li>
                                <li>
                                    <a href="<?= base_url().'ar/';?>viewAllProperties">عقارات للتأجير</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown">التجارية
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="commercial_dropdown" style="">
                                <li>
                                    <a href="">BUY</a>
                                </li>
                                <li>
                                    <a href="">RENT</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="header_items_rtl" href="<?= base_url().'ar/';?>auction">المزادات التجارية</a></li>
                        <li><a href="" class="header_items_rtl">مركز التدريب</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown">الخدمات 
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="services_dropdown" style="">
                                <li>
                                    <a href="<?= base_url().'ar/';?>marketIndex">مؤشر السوق</a>
                                </li>
                                <li>
                                    <a href="<?= base_url().'ar/';?>shareProperty">إعلن عن الممتلكات الخاصة بك</a>
                                </li>
                                <!-- <li>
                                    <a href="#">FRANCHISE</a>
                                </li> -->
                            </ul>
                        </li>
                        <li><a href="" class="header_items_rtl">من نحن</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown">إتصل بنا
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="contact_dropdown" style="">
                                <li>
                                    <a href="#">المكاتب</a>
                                </li>
                                <li>
                                    <a href="<?= base_url().'ar/';?>careers">الوظائف</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div> 
            </nav>
        </div>
        <!--<script src="<?= base_url();?>/application/static/js/jquery-1.11.0.min.js"></script>
        <script src="<?= base_url();?>/application/static/js/bootstrap-ar.min.js"></script>
        <script src="<?= base_url();?>/application/static/js/bootstrap-select.min.js"></script>-->
        <script type="text/javascript" src="<?= base_url();?>/application/static/js/jquery.bxslider.min.js"></script>
        
         <script>
            $(document).ready(function() {
                $('.bxslider').bxSlider({
                    auto:true
                });
            });
            
            var navHeight = $('.navbar-collapse').height();
            $('.navbar-collapse').on('show.bs.collapse', function(){
                if($(this).height() != 0)
                {
                    navHeight = $(this).height();
                }
                $('#middle_div').animate({
                    'margin-bottom': parseInt($("#middle_div").css("margin-bottom")) + navHeight
                   }, 300);
            });
            
            $('.navbar-collapse').on('hide.bs.collapse', function(){
                navHeight = $(this).height();
                $('#middle_div').animate({
                  'margin-bottom': '23px'
                 }, 300);
              });
            
         </script>