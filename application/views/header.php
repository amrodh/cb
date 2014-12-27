<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title><?= $title;?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/static/css/dataTables.bootstrap.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>application/static/js/dataTables.bootstrap.js"></script>
        <link href="<?php echo base_url(); ?>application/static/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= base_url();?>/application/static/css/bootstrap-select.min.css" rel="stylesheet" >
        <script type="text/javascript" src="<?php echo base_url(); ?>application/static/js/filter.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap-select.js"></script>
        <link type="text/css" href="<?= base_url();?>/application/static/css/style.css" rel="stylesheet">
        <link href="<?= base_url();?>/application/static/css/jquery.bxslider.css" rel="stylesheet">
    </head>
    <body> 
        <div id="top_div">
            <div id="icons_div" class="hidden-xs hidden-sm">
                <a href="">
                    <img alt="" class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_linkedin.png">
                </a>
                <a href="">
                    <img alt="" class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_gmail.png">
                </a>
                <a href="">
                    <img alt="" class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_fb.png">
                </a>
                <a href="">
                    <img alt="" class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_twitter.png">
                </a>
            </div>

            <div id="login_div">
                <?php if (isset($loggedIn)): ?>
                    <?php if (!isset($is_valid)): ?>
                        <button type="button" style="background-color: transparent;border: none;padding: 0;margin-top: -2%;" class="btn btn-default" title="Validation Required"  
                              data-container="body" data-toggle="popover" data-placement="bottom" 
                              data-content="Please login to your E-mail account to validate your account.">
                            <span style="margin-left:5%; color:white;" id"notifier"><b>
                                <span class="glyphicon glyphicon-exclamation-sign"></span>
                            </span>
                        </button>
                    <?php endif ?>
                    <span style="margin-left:5%;"><b><a style="color: white; text-decoration: none;" href="<?= base_url();?>profile">
                        <span class="glyphicon glyphicon-user"></span> <?= $user->username; ?></a></b>
                    </span>
                    <label style="margin-left:4%;">
                        <span class="glyphicon glyphicon-log-out">
                        </span>
                        <form action="<?= base_url();?>logout" method="post" style="display:inline;">
                        <!-- <input type="hidden" name="currentUrl" id="currentUrl" value="<?= $this->uri->uri_string; ?>"> -->
                        <input type="hidden" name="currentUrl" id="currentUrl" value="<?= $this->uri->uri_string; ?>">
                        <input type="submit" value="Log Out" name="logoutSubmit" class="logoutSubmit">
                        </form>
                    </label>
                    
                    
                <?php else: ?>
                    <label  style="margin-left:3%;">
                        <span class="glyphicon glyphicon-log-in"></span>
                        <a href="#tallModal" data-toggle="modal"><?php echo $this->lang->line('home_login'); ?></a>
                    </label>
                     /
                     <label style="margin-left:3%;">
                         <span class="glyphicon glyphicon-plus-sign"></span>
                         <a href="<?=base_url();?>register"><?php echo $this->lang->line('home_register'); ?></a>
                     </label>
                      
                <?php endif ?>
                
            </div>
            <div id="language">
                <label>
                    <span class="glyphicon glyphicon-globe"></span>
                    <?php if ($uri == 'trainingCenter'): ?>
                        <a href='<?= base_url().'en/'.$uri?>'>English</a>
                        <span>/</span>
                        <a style="font-family: droidarabickufi_regular;" href='<?= base_url().'ar/'.$uri?>'>عربي</a>
                    <?php else: ?>
                        <a href='<?= base_url().'en/'.str_replace('en', '',$uri)?>'>English</a>
                        <span>/</span>
                        <a style="font-family: droidarabickufi_regular;" href='<?= base_url().'ar/'.str_replace('en', '',$uri)?>'>عربي</a>
                    <?php endif ?>
                </label>
            </div>
        </div>
        <?php if (isset($loginError)): ?>
            <input type="hidden" id="loginError" value="<?= $loginError; ?>">
        <?php endif ?>
        <form class="form-inline" role="form"  method="post" action="<?= base_url();?>authenticate" style="margin-bottom: 1%;">
            <div id="tallModal" class="modal modal-wide fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&amp;times;</button>
                      <h4 class="modal-title">Login now</h4>
                      <div style="font-size: 12px;">
                          <?php echo $this->lang->line('home_login_text'); ?>
                      </div>
                    </div>
                    <div class="modal-body" style="width: 35%;margin: auto;">
                        <div class="row">
                             <div class="form-group login_form">
                                <label style="width:100%" for="username" class="shareproperty_titles"><?php echo $this->lang->line('home_login_input1'); ?></label>
                                <input style="float:left;width:100%;" type="text" name="username" value="<?php if(isset($login_username)) echo $login_username; ?>" class="form-control" id="username" placeholder="<?php echo $this->lang->line('home_login_placeholder1'); ?>" autofocus required>
                             </div>
                        </div>
                        <div class="row">
                            <div class="form-group login_form">
                                <label style="width:100%" for="password" class="shareproperty_titles"><?php echo $this->lang->line('home_login_input2'); ?></label>
                                <input style="float:left;width:100%;margin-left: 3px;" type="password" name="password" class="form-control" id="password" placeholder="<?php echo $this->lang->line('home_login_placeholder2'); ?>" required>
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
                            <input type="submit" style="float: right;margin-right: 20%;" class="btn btn-default search_btn_submit2" value="Go" name="submit">
                        </div>
                        <div class="col-lg-3" style="padding-top: 4%;">
                            <a href="<?= base_url();?>forgotPassword"><?php echo $this->lang->line('home_login_forgotpassword'); ?></a>
                        </div>
                        <!-- <input type="hidden" name="currentUrl" id="currentUrl" value="<?= $this->uri->uri_string; ?>"> -->
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </form>
        <div id="middle_div">
            <nav class="navbar" role="navigation">
                <div class="navbar-header">
                    <div class="navbar-brand">
                        <a href="<?= base_url();?>en">
                            <img alt="" class="logo" src="<?= base_url();?>/application/static/images/logo.png">
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
                            <a href="" class="dropdown-toggle a-dropdown" data-toggle="dropdown"><?php echo $this->lang->line('home_menu1'); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="home_dropdown" style="margin-right: -17.5%;">
                                <li>
                                    <a href="<?= base_url();?>en/viewAllProperties?lob=1&amp;type=&amp;city=&amp;district=&amp;contractType=Sale&amp;price=0&amp;area=0&amp;project="><?php echo $this->lang->line('home_submenu1'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>en/viewAllProperties?lob=1&amp;type=&amp;city=&amp;district=&amp;contractType=Rent&amp;price=0&amp;area=0&amp;project="><?php echo $this->lang->line('home_submenu3'); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle a-dropdown" data-toggle="dropdown"><?php echo $this->lang->line('home_menu2'); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="commercial_dropdown" style="margin-right: -16%;">
                                <li>
                                    <a href="<?=base_url();?>en/viewAllProperties?lob=2&amp;type=&amp;city=&amp;district=&amp;contractType=Sale&amp;price=0&amp;area=0&amp;project="><?php echo $this->lang->line('home_submenu4'); ?></a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>en/viewAllProperties?lob=2&amp;type=&amp;city=&amp;district=&amp;contractType=Rent&amp;price=0&amp;area=0&amp;project="><?php echo $this->lang->line('home_submenu5'); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url();?>en/trainingCenter"><?php echo $this->lang->line('home_menu4'); ?></a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle a-dropdown" data-toggle="dropdown"><?php echo $this->lang->line('home_menu5'); ?> 
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="services_dropdown" style="margin-right: -54.5%;">
                                <li>
                                    <a href="<?= base_url();?>en/shareProperty"><?php echo $this->lang->line('home_submenu7'); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle a-dropdown" data-toggle="dropdown"><?php echo $this->lang->line('home_menu6'); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown"  style="margin-right: -39.5%;">
                                <li>
                                    <a href="<?= base_url();?>en/about"><?php echo $this->lang->line('home_submenu10'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>en/franchise"><?php echo $this->lang->line('home_submenu11'); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle a-dropdown" data-toggle="dropdown"><?php echo $this->lang->line('home_menu7'); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" style="margin-right: -17.5%;">
                                <li>
                                    <a href="<?= base_url();?>en/offices"><?php echo $this->lang->line('home_submenu8'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>en/careers"><?php echo $this->lang->line('home_submenu9'); ?></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div> 
            </nav>
        </div>
        