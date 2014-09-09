<html>
    <head>
        <title>ColdWell Banker</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/admin.css">

        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap.min.js"></script>

        
        <link href="<?php echo base_url(); ?>application/static/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= base_url();?>/application/static/css/bootstrap-select.min.css" rel="stylesheet" />
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/admin.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/filter.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap-select.js"></script>
    
       
    

       

        <link type="text/css" href="<?= base_url();?>/application/static/css/style.css" rel="stylesheet">
        <link href="<?= base_url();?>/application/static/css/jquery.bxslider.css" rel="stylesheet" />
        
        <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,500,700" rel="stylesheet" type="text/css">
        <title>
            <?=$page_title?>
        </title>
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
                    <?php if ($uri == 'trainingCenter'): ?>
                        <a href='<?= base_url().'en/'.$uri?>'>English</a>
                        <span>/</span>
                        <a href='<?= base_url().'ar/'.$uri?>'>عربي</a>
                    <?php else: ?>
                        <a href='<?= base_url().'en/'.str_replace('en', '',$uri)?>'>English</a>
                        <span>/</span>
                        <a href='<?= base_url().'ar/'.str_replace('en', '',$uri)?>'>عربي</a>
                    <?php endif ?>
                </label>
               
                <?php if (isset($loggedIn)): ?>
                    <span style="margin-left:5%;"><b><a style="color: white; text-decoration: none;" href="<?= base_url();?>profile">
                        <span class="glyphicon glyphicon-user"></span> <?= $user->username; ?></a></b>
                    </span>
                    <label style="margin-left:4%;">
                        <span class="glyphicon glyphicon-log-out">
                        </span>
                        <form action="<?= base_url();?>logout" method="post" style="display:inline;">
                        <input type="hidden" name="currentUrl" value="<?= $this->uri->uri_string; ?>">
                        <input type="submit" value="Log Out" name="logoutSubmit" class="logoutSubmit">
                        </form>
                    </label>
                    
                <?php else: ?>
                    <label for="" style="margin-left:3%;">
                        <span class="glyphicon glyphicon-log-in"></span>
                        <a href="#tallModal" data-toggle="modal"><?php echo $this->lang->line('login'); ?></a>
                    </label>
                     /
                     <label for="" style="margin-left:3%;">
                         <span class="glyphicon glyphicon-plus-sign"></span>
                         <a href="register">Register</a>
                     </label>
                      
                <?php endif ?>
                
            </div>
        </div>
        <?php if (isset($loginError)): ?>
            <input type="hidden" id="loginError" value="<?= $loginError; ?>">
        <?php endif ?>
        <form class="form-inline" role="form"  method="post" action="<?= base_url();?>authenticate">
        <input type="hidden" name="currentUrl" value="<?= $this->uri->uri_string ?>">
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
                    <div class="modal-body" style="width:65%;margin-left:33%;">
                        <div class="row">
                             <div class="form-group login_form">
                                <label style="width:100%" for="username" class="shareproperty_titles">Username:</label>
                                <input style="float:left;" type="text" name="username" value="<?php if(isset($login_username)) echo $login_username; ?>" class="form-control" id="username" placeholder="Please enter username" autofocus required>
                             </div>
                        </div>
                        <div class="row">
                            <div class="form-group login_form">
                                <label style="width:100%" for="password" class="shareproperty_titles">Password:</label>
                                <input style="float:left" type="password" name="password" class="form-control" style="margin-left: 3px;" id="password" placeholder="Please enter password" required>
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
                            <a href="<?= base_url();?>forgotPassword">Forgot Password?</a>
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
                        <a href="<?= base_url();?>en">
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
                                    <a href="<?= base_url();?>en/viewAllProperties">RESIDENTIAL COMPOUND</a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>en/viewAllProperties">PRE-OWNED PROPERTY</a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>en/viewAllProperties">RENTAL</a>
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
                        <li><a href="<?= base_url();?>en/auction">AUCTIONS</a></li>
                        <li><a href="<?= base_url();?>en/trainingCenter">TRAINING CENTER</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">SERVICES 
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="services_dropdown" style="margin-right: -76px;">
                                <li>
                                    <a href="<?= base_url();?>en/marketIndex">MARKET INDEX</a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>en/shareProperty">SHARE YOUR PROPERTY</a>
                                </li>
                               <!--  <li>
                                    <a href="#">FRANCHISE</a>
                                </li> -->
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
                                    <a href="<?= base_url();?>en/careers">CAREERS</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div> 
            </nav>
        </div>
        