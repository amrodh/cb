<html>
    <head>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/bootstrap-theme-ar.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/bootstrap-ar.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/admin.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/datepicker.css">

        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap-ar.min.js"></script>

        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.structure.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.theme.min.css">
        <link href="<?php echo base_url(); ?>application/static/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= base_url();?>/application/static/css/bootstrap-select.min.css" rel="stylesheet" />

        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/admin.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/filter.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap-select.js"></script>

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>application/static/css/sb-admin.css" rel="stylesheet">
    

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url(); ?>application/static/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>application/static/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link type="text/css" href="<?= base_url();?>/application/static/css/style-ar.css" rel="stylesheet">
        <link href="<?= base_url();?>/application/static/css/jquery.bxslider.css" rel="stylesheet" />
        <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,500,700" rel="stylesheet" type="text/css">

        <title>
            Coldwell Banker
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>

    <body> 
        <div id="top_div">
            <div id="icons_div">
                <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_linkedin.png">
                <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_gmail.png">
                <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_fb.png">
                <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_twitter.png">
            </div>
            <div id="login_div">
                <a href='<?= base_url();?>'>English</a>
                <a href='<?= base_url();?>/application/static/index.php/controller_home/viewhome'>عربي</a>
                <?php if (isset($loggedIn)): ?>
                    <span><b><a style="color: white; text-decoration: none;" href="<?= base_url();?>profile"><?= $user->username; ?></a></b></span>
                    <a href="home/logout">Log Out</a>
                <?php else: ?>
                    <a href="#tallModal" data-toggle="modal">دخول</a> / <a href="<?= base_url();?>register">تسجيل</a>
                <?php endif ?>
<!--                <a href='http://localhost/ColdwellBanker/index.php/controller_langswitch/switchLanguage/english'>English</a>-->
                <!-- <a href='http://localhost/ColdwellBanker/'>English</a> -->
                <!--<a href='http://localhost/ColdwellBanker/index.php/controller_langswitch/switchLanguage/arabic'>Arabic</a>-->
                <?php // anchor($this->lang->switch_uri('ar'),'Arabic'); ?>
            </div>
        </div>
        <?php if (isset($loginError)): ?>
            <input type="hidden" id="loginError" value="<?= $loginError; ?>">
        <?php endif ?>
        <form class="form-inline" role="form" action="<?= base_url();?>authenticate">
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
                    <div class="modal-body" style="width: 43%;margin: auto;">
                        <div class="row">
                             <div class="form-group login_form">
                                <label style="width:100%" for="username" class="shareproperty_titles">الإسم:</label>
                                <input style="float:left;" type="text" name="username" value="<?php if(isset($login_username)) echo $login_username; ?>" class="form-control" id="username" placeholder="رجاءً أدخل الإسم" autofocus required>
                             </div>
                        </div>
                        <div class="row">
                            <div class="form-group login_form">
                                <label style="width:100%" for="password" class="shareproperty_titles">كلمة السر:</label>
                                <input style="float:left" type="password" name="password" class="form-control" style="margin-left: 3px;" id="password" placeholder="رجاءً أدخل كلمة السر" required>
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
                    <div class="modal-footer" style="margin: auto;width: 185px;">
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-default search_btn_submit2" value="إدخل<" name="submit">
                       </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </form>
        <div id="middle_div">
            <nav class="navbar" role="navigation">
                <div class="navbar-header">
                    <div class="navbar-brand">
                        <a href="<?=base_url(); ?>">
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
                                    <a href="<?= base_url();?>viewAllProperties">مجمع سكني</a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>viewAllProperties">عقارات مملوكة من قبل</a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>viewAllProperties">عقارات للتأجير</a>
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
                        <li><a class="header_items_rtl" href="<?= base_url();?>auction">المزادات التجارية</a></li>
                        <li><a href="" class="header_items_rtl">مركز التدريب</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown">الخدمات 
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="services_dropdown" style="">
                                <li>
                                    <a href="<?= base_url();?>marketIndex">مؤشر السوق</a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>shareProperty">إعلن عن الممتلكات الخاصة بك</a>
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
                                    <a href="<?= base_url();?>careers">الوظائف</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div> 
            </nav>
        </div>
        <!--<script src="<?= base_url();?>/application/static/js/jquery-1.11.0.min.js"></script>
        <script src="<?= base_url();?>/application/static/js/bootstrap-ar.min.js"></script>
        <script src="<?= base_url();?>/application/static/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="<?= base_url();?>/application/static/js/jquery.bxslider.min.js"></script>-->
        
<!--         <script>
//             $(document).ready(function() {
//                 $('.bxslider').bxSlider({
//                     auto:true
//                 });
//             });
            
//             var navHeight = $('.navbar-collapse').height();
//             $('.navbar-collapse').on('show.bs.collapse', function(){
//                 if($(this).height() != 0)
//                 {
//                     navHeight = $(this).height();
//                 }
//                 $('#middle_div').animate({
//                     'margin-bottom': parseInt($("#middle_div").css("margin-bottom")) + navHeight
//                    }, 300);
//             });
            
//             $('.navbar-collapse').on('hide.bs.collapse', function(){
//                 navHeight = $(this).height();
//                 $('#middle_div').animate({
//                   'margin-bottom': '23px'
//                  }, 300);
//               });
            
//         </script>
//     </body>
// </html>-->