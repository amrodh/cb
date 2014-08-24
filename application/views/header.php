<html>
    <head>
    <title>ColdWell Banker</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/bootstrap-theme.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/admin.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/datepicker.css">
 
 <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jquery.min.js"></script>
 <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap.min.js"></script>
 
 <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.structure.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.theme.min.css">
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/admin.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/filter.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap-select.js"></script>
    
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>application/static/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/static/css/bootstrap-select.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>application/static/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>application/static/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link type="text/css" href="<?= base_url();?>/application/static/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="<?= base_url();?>/application/static/css/style.css" rel="stylesheet">
        <link href="<?= base_url();?>/application/static/css/jquery.bxslider.css" rel="stylesheet" />
        <link href="<?= base_url();?>/application/static/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,500,700" rel="stylesheet" type="text/css">
        <title>
            <?=$page_title?>
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
                <!--                <a href='<?= base_url();?>/application/static/index.php/controller_langswitch/switchLanguage/english'>English</a>-->
                <a href='<?= base_url();?>/application/static/'>English</a>
                <a href='<?= base_url();?>/application/static/index.php/controller_home/viewhome'>Arabic</a>
                <!--<a href='<?= base_url();?>/application/static/index.php/controller_langswitch/switchLanguage/arabic'>Arabic</a>-->
                <?php // anchor($this->lang->switch_uri('ar'),'Arabic'); ?>
                <a href="#tallModal" data-toggle="modal">Login</a> / <a href="<?= base_url();?>/application/static/index.php/controller_user/register/en">Register</a>
            </div>
        </div>
        <form class="form-inline" role="form" action="<?= base_url();?>/application/static/index.php/controller_user">
            <div id="tallModal" class="modal modal-wide fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Login now</h4>
                      <div style="font-size: 12px;">
                          Enter your username and password to login
                      </div>
                    </div>
                    <div class="modal-body" style="width: 37%;margin: auto;">
                        <div class="row">
                            <!--<div class="col-xs-12 col-lg-12 col-md-4 col-sm-4" style="margin: auto;">-->
                                 <div class="form-group login_form">
                                    <label for="username" class="shareproperty_titles">Username:</label>
                                    <input type="text" class="form-control" id="username" placeholder="Please enter username">
                                 </div>
                            <!--</div>-->
                        </div>
                        <div class="row">
                            <div class="form-group login_form">
                                <label for="password" class="shareproperty_titles">Password:</label>
                                <input type="password" class="form-control" style="margin-left: 3px;" id="password" placeholder="Please enter password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="margin: auto;width: 185px;">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-default search_btn_submit2" style="" onclick="">Go</button>
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
                        <a href="<?= base_url();?>/application/static/">
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
                    <ul class="nav navbar-nav navbar-right header_navbar">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">FIND A HOME
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="home_dropdown" style="margin-right: -60px;">
                                <li>
                                    <a href="<?= base_url();?>/application/static/index.php/controller_property">RESIDENTIAL COMPOUND</a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>/application/static/index.php/controller_property">PRE-OWNED PROPERTY</a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>/application/static/index.php/controller_property">RENTAL</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">COMMERCIAL
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="commercial_dropdown" style="margin-right: -25px;">
                                <li>
                                    <a href="">BUY</a>
                                </li>
                                <li>
                                    <a href="">RENT</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url();?>/application/static/index.php/controller_property/auction/en">AUCTIONS</a></li>
                        <li><a href="">TRAINING CENTER</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">SERVICES 
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="services_dropdown" style="margin-right: -76px;">
                                <li>
                                    <a href="<?= base_url();?>/application/static/index.php/controller_services/market_index/en">MARKET INDEX</a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>/application/static/index.php/controller_property/share_property/en">SHARE YOUR PROPERTY</a>
                                </li>
                                <li>
                                    <a href="#">FRANCHISE</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="">ABOUT US</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">CONTACT US
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="contact_dropdown" style="margin-right: -30px;">
                                <li>
                                    <a href="#">OFFICES</a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>/application/static/index.php/controller_careers">CAREERS</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div> 
            </nav>
        </div>
        