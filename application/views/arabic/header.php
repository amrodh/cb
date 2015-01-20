<html>
    <head>
        <title>
            <?= $title;?>
        </title>
        <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/bootstrap-theme-ar.css"> -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/bootstrap-ar.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/plug-ins/380cb78f450/integration/bootstrap/3/dataTables.bootstrap.css">
       <!--  <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/admin.css"> -->

        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jssor.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jssor.slider.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap-ar.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/380cb78f450/integration/bootstrap/3/dataTables.bootstrap.js"></script>

        
        <link href="<?php echo base_url(); ?>application/static/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= base_url();?>/application/static/css/bootstrap-select.min.css" rel="stylesheet" />

       <!-- <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/admin.js"></script>-->
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap-select.js"></script>

        <!-- Custom Fonts -->
        <link type="text/css" href="<?= base_url();?>/application/static/css/style-ar.css" rel="stylesheet">
        <link href="<?= base_url();?>/application/static/css/jquery.bxslider.css" rel="stylesheet" />
        <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,500,700" rel="stylesheet" type="text/css">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="keywords" content=" real estate Egypt, real estate in Egypt, Egypt real estate, real estate agent Egypt, real estate for sale Egypt, real estate brokers Egypt, real estate agency Egypt, real estate property Egypt, real estate market Egypt, residential real estate Egypt, luxury real estate Egypt, buy real estate Egypt ">
    </head>

    <body> 
        <div id="top_div">
            <div id="icons_div" class="hidden-xs hidden-sm">
                <a href="http://www.linkedin.com/company/coldwell-banker-egypt">
                    <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_linkedin.png">
                </a>
                <a href="http://www.youtube.com/user/ColdWellBankerEgypt1">
                    <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_gmail.png">
                </a>
                <a href="https://www.facebook.com/ColdwellBankerEgypt">
                    <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_fb.png">
                </a>
                <a href="http://www.twitter.com/CB_Egypt">
                    <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_twitter.png">
                </a>
            </div>
            <div id="login_div">
                
                <?php if (isset($loggedIn)): ?>
                    <?php if (!isset($is_valid)): ?>
                        <button type="button" style="background-color: transparent;border: none;padding: 0;margin-top: -2%;" class="btn btn-default" title="مطلوب التحقق من الشخصية"  
                              data-container="body" data-toggle="popover" data-placement="bottom" 
                              data-content="يرجى الدخول على البريد الالكتروني للتحقق من الشخصية.">
                            <span style="margin-left:5%; color:white;" id"notifier"><b>
                                <span class="glyphicon glyphicon-exclamation-sign"></span>
                            </span>
                        </button>
                    <?php endif ?>
                    <span style="margin-right:5%;"><b><a style="color: white; text-decoration: none;font-family: 'Ubuntu';" href="<?= base_url();?>profile">
                        <span class="glyphicon glyphicon-user"></span> <?= $user->username; ?></a></b>
                    </span>
                    <label style="">
                        <span class="glyphicon glyphicon-log-out">
                        </span>
                        <form action="<?= base_url();?>logout" method="post" style="display:inline;">
                        <input type="hidden" id="query_string" name="query_string" value="<?= $_SERVER['QUERY_STRING'] ?>">
                        <input type="hidden" name="currentUrl" id="currentUrl" value="<?= $this->uri->uri_string; ?>">
                        <input type="submit" value="خروج" name="logoutSubmit" class="logoutSubmit">
                        </form>
                    </label>

                    <!-- <span><b><a style="color: white; text-decoration: none;" href="<?= base_url();?>profile"><?= $user->username; ?></a></b></span>
                    <a href="home/logout">Log Out</a> -->
                <?php else: ?>
                    <label for="" style="margin-right:3%;">
                        <span class="glyphicon glyphicon-log-in"></span>
                        <a href="#tallModal" data-toggle="modal"><?php echo $this->lang->line('home_login'); ?></a>
                    </label>
                     /
                     <label for="" style="margin-left:3%;">
                         <span class="glyphicon glyphicon-plus-sign"></span>
                         <a href="<?= base_url();?>ar/register"><?php echo $this->lang->line('home_register'); ?></a>
                     </label>
                    <!-- <a href="#tallModal" data-toggle="modal">دخول</a> / <a href="<?= base_url();?>register">تسجيل</a> -->
                <?php endif ?>
            </div>
            <div id="language">
                <label for="">
                    <span class="glyphicon glyphicon-globe"></span>
                    <?php //printme($uri);?>
                     <!-- <a href='<?= base_url().'en'.str_replace('ar', '',$uri)?>'>English</a>
                    <span>/</span> -->
                    <?php if ($uri == 'shareProperty'): ?>
                        <a style="font-family: 'Ubuntu';" href='<?= base_url().'en/'.$uri?>'>English</a>
                        <span>/</span>
                        <a href='<?= base_url().'ar/'.$uri?>'>عربي</a>
                    <?php else: ?>
                        <a href='<?= base_url().'en/'.str_replace('ar/', '',$uri)?>'>English</a>
                        <span>/</span>
                        <a href='<?= base_url().'ar/'.str_replace('ar/', '',$uri)?>'>عربي</a>
                    <?php endif ?>
                    <!-- <a href='<?= base_url().'ar'.str_replace('ar', '',$uri)?>'>عربي</a> -->
                </label>
            </div>
        </div>
        <?php if (isset($loginError)): ?>
            <input type="hidden" id="loginError" value="<?= $loginError; ?>">
        <?php endif ?>
        <form class="form-inline" role="form" action="<?= base_url();?>authenticate" method="post">
            <input type="hidden" name="currentUrl" value="<?= $this->uri->uri_string ?>">
            <input type="hidden" id="query_string" name="query_string" value="<?= $_SERVER['QUERY_STRING'] ?>">
        <div id="tallModal" class="modal modal-wide fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">إدخل الأن</h4>
                      <div style="font-size: 12px;">
                          <?php echo $this->lang->line('home_login_text'); ?>
                      </div>
                    </div>
                    <div class="modal-body" style="width: 30%;margin: auto;">
                        <div class="row">
                             <div class="form-group login_form">
                                <label style="width:100%" for="username" class="shareproperty_titles"><?php echo $this->lang->line('home_login_input1'); ?></label>
                                <input style="" type="text" name="username" value="<?php if(isset($login_username)) echo $login_username; ?>" class="form-control" id="username" placeholder="<?php echo $this->lang->line('home_login_placeholder1'); ?>" autofocus required>
                             </div>
                        </div>
                        <div class="row">
                            <div class="form-group login_form">
                                <label style="width:100%" for="password" class="shareproperty_titles"><?php echo $this->lang->line('home_login_input2'); ?></label>
                                <input style="" type="password" name="password" class="form-control" style="margin-left: 3px;" id="password" placeholder="<?php echo $this->lang->line('home_login_placeholder2'); ?>" required>
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
                            <a href="<?= base_url();?>ar/forgotPassword"><?php echo $this->lang->line('home_login_forgotpassword'); ?></a>
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
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown"><?php echo $this->lang->line('home_menu1'); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="home_dropdown" style="">
                                <li>
                                    <a href="<?= base_url();?>ar/viewAllProperties?lob=1&type=&city=&district=&contractType=Sale&price=0&area=0&project="><?php echo $this->lang->line('home_submenu1'); ?></a>
                                </li>
                                <li>
                                    <!-- <a href="<?= base_url();?>ar/viewAllProperties"><?php echo $this->lang->line('home_submenu2'); ?></a> -->
                                </li>
                                <li>
                                    <a href="<?= base_url();?>ar/viewAllProperties?lob=1&type=&city=&district=&contractType=Rent&price=0&area=0&project="><?php echo $this->lang->line('home_submenu3'); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown"><?php echo $this->lang->line('home_menu2'); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="commercial_dropdown" style="">
                                <li>
                                    <a href="<?=base_url();?>ar/viewAllProperties?lob=2&type=&city=&district=&contractType=Sale&price=0&area=0&project=">شراء</a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>ar/viewAllProperties?lob=2&type=&city=&district=&contractType=Rent&price=0&area=0&project=">تأجير</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li><a class="header_items_rtl" href="<?= base_url().'ar/';?>auction"><?php echo $this->lang->line('home_menu3'); ?></a></li> -->
                        <li><a href="<?= base_url().'ar/';?>trainingCenter" class="header_items_rtl"><?php echo $this->lang->line('home_menu4'); ?></a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown"><?php echo $this->lang->line('home_menu5'); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="services_dropdown" style="">
                                <!-- <li>
                                    <a href="<?= base_url().'ar/';?>marketIndex"><?php echo $this->lang->line('home_submenu6'); ?></a>
                                </li> -->
                                <li>
                                    <a href="<?= base_url().'ar/';?>shareProperty"><?php echo $this->lang->line('home_submenu7'); ?></a>
                                </li>
                                <!-- <li>
                                    <a href="#">FRANCHISE</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown"><?php echo $this->lang->line('home_menu6'); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="contact_dropdown" style="margin-right: 0%;">
                                <li>
                                    <a href="<?= base_url();?>ar/about"><?php echo $this->lang->line('home_submenu10'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>ar/franchise"><?php echo $this->lang->line('home_submenu11'); ?></a>
                                </li>
                            </ul>
                            <!-- <a href="<?= base_url();?>ar/about" class="header_items_rtl"><?php echo $this->lang->line('home_menu6'); ?></a> -->
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown"><?php echo $this->lang->line('home_menu7'); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="contact_dropdown" style="">
                                <li>
                                    <a href="<?= base_url();?>ar/offices"><?php echo $this->lang->line('home_submenu8'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= base_url().'ar/';?>careers"><?php echo $this->lang->line('home_submenu9'); ?></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div> 
            </nav>
        </div>
        